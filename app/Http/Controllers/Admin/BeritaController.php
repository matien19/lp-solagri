<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    public function index()
    {
        $data = Berita::all();
        return view('admin.berita.index', compact('data'));
    }

    public function create()
    {
        return view('admin.berita.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'img' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = $request->only(['judul', 'deskripsi']);

        $slug = Str::slug($request->judul);
        $original_slug = $slug;
        $counter = 1;

        // 2. Cek ke database, selama slug tersebut sudah ada, tambahkan angka di belakangnya
        while (Berita::where('slug', $slug)->exists()) {
            $slug = $original_slug . '-' . $counter;
            $counter++;
        }
        $data['slug'] = $slug;

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();
            $safeName = $slug;
            $filename = time() . '_' . $safeName . '.' . $extension;
            $file->storeAs('berita', $filename, 'public');
            $data['img'] = 'storage/berita/' . $filename;
        }

        Berita::create($data);

        return redirect()->route('admin.berita')->with('success', 'Berita berhasil ditambahkan!');
    }

    /**
     * Menampilkan halaman Form untuk EDIT data
     */
    public function edit(String $id)
    {
        $berita = Berita::findOrFail($id);
        return view('admin.berita.create', compact('berita'));
    }

    public function update(Request $request, String $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $berita = Berita::findOrFail($id);

        $data = $request->only(['judul', 'deskripsi']);

        // Update slug jika judul diubah
        $slug = Str::slug($request->judul);
        $original_slug = $slug;
        $counter = 1;

        // 2. Cek ke database, selama slug tersebut sudah ada, tambahkan angka di belakangnya
        while (Berita::where('slug', $slug)->exists()) {
            $slug = $original_slug . '-' . $counter;
            $counter++;
        }
        $data['slug'] = $slug;

        if ($request->hasFile('img')) {
            if ($berita->img && file_exists(public_path($berita->img))) {
                unlink(public_path($berita->img));
            }

            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();
            $safeName = $slug;
            $filename = time() . '_' . $safeName . '.' . $extension;

            if (!file_exists(public_path('storage/berita'))) {
                mkdir(public_path('storage/berita'), 0755, true);
            }

            $file->storeAs('berita', $filename, 'public');

            $data['img'] = 'storage/berita/' . $filename;
        }

        $berita->update($data);

        return redirect()->route('admin.berita')->with('success', 'Berita berhasil diperbarui!');
    }

    public function destroy(String $id)
    {
        $berita = Berita::findOrFail($id);
        if ($berita->img && file_exists(public_path($berita->img))) {
            unlink(public_path($berita->img));
        }
        $berita->delete();
        return back()->with('success', 'Data berhasil dihapus!');
    }
}
