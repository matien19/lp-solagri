<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Bibit;
use App\Models\Jasa;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $berita_terbaru = Berita::latest()->take(3)->get();
        return view('beranda', compact('berita_terbaru'));
    }

    public function profil()
    {
        return view('profil');
    }

    public function dokumen()
    {
        return view('dokumen');
    }

    public function produk()
    {
        $data = Bibit::all();
        return view('produk', compact('data'));
    }

    public function jasa()
    {
        $data = Jasa::all();
        return view('jasa', compact('data'));
    }

    public function berita()
    {
        $informasi = Berita::where('kategori', 'informasi')
            ->orderByDesc('created_at')
            ->paginate(6, ['*'], 'informasi_page')
            ->appends(['tab' => 'informasi']);
        $kegiatan = Berita::where('kategori', 'kegiatan')
            ->orderByDesc('created_at')
            ->paginate(6, ['*'], 'kegiatan_page')
            ->appends(['tab' => 'kegiatan']);
        $activeTab = in_array(request('tab'), ['informasi', 'kegiatan'], true)
            ? request('tab')
            : 'informasi';

        return view('berita', compact('informasi', 'kegiatan', 'activeTab'));
    }

    public function beritaDetail(String $slug)
    {
        $berita = Berita::where('slug', $slug)->firstOrFail();

        $recent_berita = Berita::where('id', '!=', $berita->id)
            ->latest()
            ->take(5)
            ->get();
        return view('berita_detail', compact('berita', 'recent_berita'));
    }

    public function kontak()
    {
        return view('kontak');
    }
}
