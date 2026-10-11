<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jasa;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class JasaController extends Controller
{
    public function index()
    {
        $data = Jasa::all();
        return view('admin.jasa', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'desk' => 'required|string',
            'list_layanan' => 'required|string',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'kategori' => 'required|string|max:255',
        ]);
        $data = $request->only(['nama', 'desk', 'list_layanan', 'kategori']);

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();
            $safeName = Str::slug($request->nama);
            $filename = time() . '_' . $safeName . '.' . $extension;
            $path = $file->storeAs('jasa', $filename, 'public');
            $data['img'] = 'storage/jasa/' . $filename;
        }

        // Simpan ke database
        Jasa::create($data);

        return redirect()->back()->with('success', 'Data jasa berhasil ditambahkan!');
    }

    /**
     * Mengupdate data jasa yang sudah ada.
     */
    public function update(Request $request, String $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'desk' => 'required|string',
            'list_layanan' => 'required|string',
            'kategori' => 'required|string|max:255',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $jasa = Jasa::findOrFail($id);
        $data = $request->only(['nama', 'desk', 'list_layanan', 'kategori']);

        if ($request->hasFile('img')) {
            if ($jasa->img && file_exists(public_path($jasa->img))) {
                unlink(public_path($jasa->img));
            }

            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();
            $safeName = Str::slug($request->nama);
            $filename = time() . '_' . $safeName . '.' . $extension;
            $path = $file->storeAs('jasa', $filename, 'public');

            if (!file_exists(public_path('storage/jasa'))) {
                mkdir(public_path('storage/jasa'), 0755, true);
            }
            $request->file('img')->storeAs('public/jasa', $filename);

            $data['img'] = 'storage/jasa/' . $filename;
        }

        $jasa->update($data);

        return redirect()->back()->with('success', 'Data jasa berhasil diperbarui!');
    }

    public function destroy(String $id)
    {
        $jasa = Jasa::findOrFail($id);
        if ($jasa->img && file_exists(public_path($jasa->img))) {
            unlink(public_path($jasa->img));
        }
        $jasa->delete();
        return back()->with('success', 'Data berhasil dihapus!');
    }
}
