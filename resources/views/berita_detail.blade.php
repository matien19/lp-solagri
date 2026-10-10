@extends('layout.main')
@section('content')
<!-- Page Title -->
<div class="page-title dark-background" data-aos="fade"
    style="background-image: url({{ asset('assets/img/bgg.png') }});">
    <div class="container position-relative">
        <h1>Berita / Kegiatan</h1>
        <nav class="breadcrumbs">
            <ol>
                <li><a href="{{ route('beranda') }}">Home</a></li>
                <li class="current">Berita / Kegiatan</li>
            </ol>
        </nav>
    </div>
</div><!-- End Page Title -->
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <section id="blog-details" class="blog-details section">
                <div class="container">
                    <article class="article">
                        <div class="post-img d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
                            <img src="{{ $berita->img ? asset($berita->img) : asset('assets/img/default-berita.jpg') }}"
                                alt="{{ $berita->judul }}" class="img-fluid w-50"
                                style="max-width: 50%; object-fit: cover;">
                        </div>
                        <h2 class="title">{{ $berita->judul }}</h2>
                        <div class="meta-top">
                            <ul>
                                <li class="d-flex align-items-center">
                                    <i class="bi bi-clock"></i>
                                    <a href="{{ route('berita.detail', ['slug' => $berita->slug]) }}">
                                        <!-- Tanggal Dinamis -->
                                        <time datetime="{{ $berita->created_at->format('Y-m-d') }}">
                                            {{ $berita->created_at->format('M d, Y') }}
                                        </time>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="content">
                            {!! $berita->deskripsi !!}
                        </div>
                    </article>
                </div>
            </section>
        </div>

        <div class="col-lg-4 sidebar">
            <div class="widgets-container">
                {{-- <div class="search-widget widget-item">
                    <h3 class="widget-title">Search</h3>
                    <form action="">
                        <input type="text" name="keyword" placeholder="Cari berita...">
                        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
                    </form>
                </div> --}}
                <div class="recent-posts-widget-2 widget-item">
                    <h3 class="widget-title">Recent Posts</h3>

                    <!-- Perulangan Berita Terbaru -->
                    @forelse($recent_berita as $recent)
                    <div class="post-item">
                        <h4>
                            <a href="{{ route('berita.detail', ['slug' => $recent->slug]) }}">
                                {{ $recent->judul }}
                            </a>
                        </h4>
                        <time datetime="{{ $recent->created_at->format('Y-m-d') }}">
                            {{ $recent->created_at->format('M d, Y') }}
                        </time>
                    </div><!-- End recent post item-->
                    @empty
                    <div class="post-item">
                        <p class="text-muted">Belum ada berita lainnya.</p>
                    </div>
                    @endforelse

                </div>
            </div>
        </div>
    </div>
</div>
@endsection