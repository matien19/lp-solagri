@extends('layout.main')
@push('css')
<style>
    .recent-posts .post-item {
        display: flex;
        flex-direction: column;
        height: 100%;
        max-width: 400px;
        margin: 0 auto;
    }

    .recent-posts .post-item .post-img {
        height: 250px;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #f8f9fa;
    }

    .recent-posts .post-item .post-img img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        transition: transform 0.5s ease;
    }

    .recent-posts .post-item .post-content {
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .recent-posts .post-item .readmore {
        margin-top: auto;
    }

    .recent-posts .post-item:hover .post-img img {
        transform: scale(1.05);
    }

    .recent-posts .post-item .post-title {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;

        line-height: 1.5;
    }
</style>
@endpush
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
</div>

<section id="recent-posts" class="recent-posts section">
    <div class="container section-title" data-aos="fade-up">
        <h2>Kegiatan / Berita</h2>
    </div>

    <div class="container">
        <div class="row gy-5">

            <!-- Mulai Perulangan Data Berita -->
            @forelse($data as $item)
            <div class="col-xl-4 col-md-6">
                <div class="post-item position-relative h-100" data-aos="fade-up" data-aos-delay="100">

                    <div class="post-img position-relative overflow-hidden">
                        <!-- Menampilkan Gambar (dengan fallback default jika kosong) -->
                        <img src="{{ $item->img ? asset($item->img) : asset('assets/img/default-berita.jpg') }}"
                            class="img-fluid" alt="{{ $item->judul }}"
                            style="width: 100%; height: 250px; object-fit: cover;">

                        <!-- Menampilkan Tanggal Format: 17 July -->
                        <span class="post-date">{{ $item->created_at->format('F d') }}</span>
                    </div>

                    <div class="post-content d-flex flex-column" style="flex-grow: 1;">
                        <!-- Menampilkan Judul -->
                        <h3 class="post-title">{{ $item->judul }}</h3>

                        <div class="meta d-flex align-items-center mb-auto">
                            <span class="px-3 text-black-50"></span>
                            <div class="d-flex align-items-center">
                            </div>
                        </div>

                        <hr>

                        <!-- Link menuju detail berita berdasarkan slug -->
                        <a href="{{ route('berita.detail', $item->slug) }}" class="readmore stretched-link mt-auto">
                            <span>Read More</span><i class="bi bi-arrow-right"></i>
                        </a>
                    </div>

                </div>
            </div><!-- End post item -->

            @empty
            <!-- Tampilan jika belum ada berita di database -->
            <div class="col-12 text-center">
                <p>Belum ada berita atau kegiatan yang diterbitkan.</p>
            </div>
            @endforelse
            <!-- Akhir Perulangan -->

        </div>
    </div>
</section>

<!-- Section Pagination -->
<section id="blog-pagination" class="blog-pagination section">
    <div class="container">
        <div class="d-flex justify-content-center">
            {{ $data->links('pagination::bootstrap-5') }}
        </div>
    </div>
</section>
@endsection
@push('js')
<script>
    document.addEventListener("DOMContentLoaded", function () {
      const titles = document.querySelectorAll('.post-title');
      const maxLength = 100; // Batas maksimal karakter

      titles.forEach(title => {
        const text = title.innerText;

        if (text.length > maxLength) {
          title.innerText = text.substring(0, maxLength) + '.. selengkapnya';
        }
      });
    });
</script>
@endpush