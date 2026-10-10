<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Bibit;
use App\Models\Jasa;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $total_berita = Berita::count();
        $total_bibit = Bibit::count();
        $total_jasa = Jasa::count();
        
        $berita_terbaru = Berita::latest()->take(4)->get();
        return view('admin.beranda', compact('total_berita', 'total_bibit', 'total_jasa', 'berita_terbaru'));
    }
}
