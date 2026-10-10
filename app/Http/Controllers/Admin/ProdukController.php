<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bibit;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class ProdukController extends Controller
{
    public function index()
    {
        $data = Bibit::all();
        return view('admin.produk', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'perusahaan' => 'nullable|string',
            'varietas' => 'nullable|string',
            'stok' => 'nullable|integer',
            'harga' => 'nullable|integer',
            'lokasi' => 'nullable|string',
            'minimal_order' => 'nullable|integer',
            'img' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->except('_token');

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();
            $safeName = Str::slug($request->nama);
            $filename = time() . '_' . $safeName . '.' . $extension;
            $path = $file->storeAs('produk', $filename, 'public');
            $data['img'] = 'storage/produk/' . $filename;
        }

        Bibit::create($data);
        return back()->with('success', 'Data berhasil ditambahkan!');
    }

    public function update(Request $request, String $id)
    {
        $request->validate([
            'nama' => 'required|string',
            'perusahaan' => 'nullable|string',
            'varietas' => 'nullable|string',
            'stok' => 'nullable|integer',
            'harga' => 'nullable|integer',
            'lokasi' => 'nullable|string',
            'minimal_order' => 'nullable|integer',
            'img' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $bibit = Bibit::findOrFail($id);
        $data = $request->except(['_token', '_method']);

        if ($request->hasFile('img')) {
            if ($bibit->img && file_exists(public_path($bibit->img))) {
                unlink(public_path($bibit->img));
            }

            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();
            $safeName = Str::slug($request->nama);
            $filename = time() . '_' . $safeName . '.' . $extension;
            $path = $file->storeAs('produk', $filename, 'public');

            if (!file_exists(public_path('storage/produk'))) {
                mkdir(public_path('storage/produk'), 0755, true);
            }
            $request->file('img')->storeAs('public/produk', $filename);

            $data['img'] = 'storage/produk/' . $filename;
        }

        $bibit->update($data);
        return back()->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy(String $id)
    {
        $bibit = Bibit::findOrFail($id);
        if ($bibit->img && file_exists(public_path($bibit->img))) {
            unlink(public_path($bibit->img));
        }
        $bibit->delete();
        return back()->with('success', 'Data berhasil dihapus!');
    }
}
