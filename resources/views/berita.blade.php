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

    .news-nav-tabs .nav-link {
        color: var(--heading-color);
        font-weight: 600;
        border: 2px solid #e0e0e0;
        border-radius: 50px;
        padding: 10px 25px;
        transition: all 0.3s ease;
        background: #fff;
    }

    .news-nav-tabs .nav-link.active {
        background-color: var(--accent-color);
        color: #fff;
        border-color: var(--accent-color);
    }
</style>
@endpush
@section('content')
<!-- Page Title -->
<div class="page-title dark-background" data-aos="fade"
    style="background-image: url({{ asset('assets/img/bgg.png') }});">
    <div class="container position-relative">
        <h1>informasi / kegiatan</h1>
        <nav class="breadcrumbs">
            <ol>
                <li><a href="{{ route('beranda') }}">Home</a></li>
                <li class="current">informasi / kegiatan</li>
            </ol>
        </nav>
    </div>
</div>

<section id="recent-posts" class="recent-posts section">
    <div class="container section-title" data-aos="fade-up">
        <h2>Informasi / Kegiatan</h2>
    </div>

    @php
    $categories = [
        'informasi' => ['label' => 'Informasi', 'data' => $informasi],
        'kegiatan' => ['label' => 'Kegiatan', 'data' => $kegiatan],
    ];
    @endphp

    <div class="container mb-4">
        <ul class="nav nav-pills news-nav-tabs justify-content-center gap-3" id="newsCategoryTab" role="tablist">
            @foreach($categories as $category => $tab)
            <li class="nav-item" role="presentation">
                <button class="nav-link {{ $activeTab === $category ? 'active' : '' }}" id="{{ $category }}-tab"
                    data-bs-toggle="pill" data-bs-target="#{{ $category }}-pane" type="button" role="tab"
                    aria-controls="{{ $category }}-pane" aria-selected="{{ $activeTab === $category ? 'true' : 'false' }}">
                    {{ $tab['label'] }}
                </button>
            </li>
            @endforeach
        </ul>
    </div>

    <div class="container tab-content" id="newsCategoryTabContent">
        @foreach($categories as $category => $tab)
        <div class="tab-pane fade {{ $activeTab === $category ? 'show active' : '' }}" id="{{ $category }}-pane"
            role="tabpanel" aria-labelledby="{{ $category }}-tab" tabindex="0">
            <div class="row gy-5">
                @forelse($tab['data'] as $item)
                <div class="col-xl-4 col-md-6">
                    <div class="post-item position-relative h-100" data-aos="fade-up" data-aos-delay="100">
                        <div class="post-img position-relative overflow-hidden">
                            <img src="{{ $item->img ? asset($item->img) : asset('assets/img/default-berita.jpg') }}"
                                class="img-fluid" alt="{{ $item->judul }}"
                                style="width: 100%; height: 250px; object-fit: cover;">
                            <span class="post-date">{{ $item->created_at->format('F d') }}</span>
                        </div>

                        <div class="post-content d-flex flex-column" style="flex-grow: 1;">
                            <h3 class="post-title">{{ $item->judul }}</h3>
                            <div class="meta d-flex align-items-center mb-auto">
                                <span class="px-3 text-black-50"></span>
                            </div>
                            <hr>

                            <a href="{{ route('berita.detail', $item->slug) }}"
                                class="readmore stretched-link mt-auto">
                                <span>Read More</span><i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center">
                    <p>Belum ada {{ strtolower($tab['label']) }} yang diterbitkan.</p>
                </div>
                @endforelse
            </div>

            <section class="blog-pagination section mt-5">
                <div class="d-flex justify-content-center">
                    {{ $tab['data']->appends(['tab' => $category])->links('pagination::bootstrap-5') }}
                </div>
            </section>
        </div>
        @endforeach
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