@extends('layout.main')
@push('css')
<style>
    /* --- Visi Misi Section (Layout Gambar Kiri & Teks Kanan) --- */
    .visi-misi-section {
        position: relative;
        /* Ganti gambar latar ini sesuai keinginan Anda */
        background-image: url('../img/hero_1.jpg');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        /* Efek Parallax */
        padding: 80px 0;
        overflow: hidden;
    }

    .visi-misi-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(17, 101, 48, 0.9) 0%, rgba(10, 40, 20, 0.95) 100%);
        z-index: 1;
    }

    /* Animasi Gambar Melayang di Kolom Kiri */

    @keyframes floatImage {
        0% {
            transform: translateY(0px);
        }

        50% {
            transform: translateY(-20px);
        }

        100% {
            transform: translateY(0px);
        }
    }

    /* Kartu Kaca (Glassmorphism) di Kolom Kanan */
    .glass-card {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(15px);
        -webkit-backdrop-filter: blur(15px);
        border: 1px solid rgba(255, 255, 255, 0.15);
        border-radius: 20px;
        padding: 40px;
        color: #ffffff;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        transition: all 0.3s ease;
    }

    .glass-card:hover {
        background: rgba(255, 255, 255, 0.08);
        border-color: rgba(255, 255, 255, 0.3);
    }

    .glass-card .card-title {
        color: #ffffff;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .glass-card .card-text {
        line-height: 1.7;
        color: rgba(255, 255, 255, 0.9);
    }

    /* Gaya Khusus untuk Daftar Berangka (Ordered List) */
    .card-list-ordered {
        padding-left: 20px;
    }

    .card-list-ordered li {
        font-size: 1.05rem;
        margin-bottom: 12px;
        line-height: 1.6;
        color: rgba(255, 255, 255, 0.9);
        padding-left: 10px;
    }

    /* Memberi warna aksen pada angka daftar (1, 2, 3...) */
    .card-list-ordered li::marker {
        color: #a3e635;
        font-weight: bold;
        font-size: 1.2rem;
    }

    /* --- Tambahan CSS untuk Misi Grid --- */

    /* Penomoran transparan besar di samping teks Misi */
    .mission-number {
        font-size: 4rem;
        font-weight: 800;
        line-height: 0.8;
        color: transparent;
        -webkit-text-stroke: 2px rgba(163, 230, 53, 0.4);
        /* Garis tepi warna hijau neon */
        margin-right: 25px;
        opacity: 0.8;
        transition: all 0.3s ease;
    }

    /* Efek saat kartu misi disorot mouse */
    .glass-card:hover .mission-number {
        color: rgba(163, 230, 53, 0.2);
        /* Nomor sedikit menyala */
        -webkit-text-stroke: 2px rgba(163, 230, 53, 0.8);
    }

    /* Lencana (Badge) bergaya kaca untuk Judul Misi */
    .glass-badge {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .img-portrait {
        width: 100%;
        max-width: 100%;
        aspect-ratio: 3 / 4;
        object-fit: cover;
        object-position: top;
    }

    /* TEAM SECTION */

    .team-section {
        position: relative;
        background: #ffffff;
        padding: 90px 0 !important;
    }


    /* Section Label */
    .team-label {
        display: inline-block;
        padding: 6px 15px;
        border-radius: 50px;
        background: rgba(17, 101, 48, 0.08);
        color: var(--accent-color);
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 2px;
    }


    /* Section Description */
    .team-section .section-title p {
        max-width: 600px;
        margin: 10px auto 0;

        font-size: 15px;
    }


    /*  TEAM CARD */

    .team-member-item {
        position: relative;
        height: 100%;
        padding: 30px 25px;
        text-align: center;
        background: #ffffff;
        border: 1px solid rgba(0, 0, 0, 0.07);
        border-radius: 20px;
        box-shadow:
            0 8px 30px rgba(0, 0, 0, 0.06);
        transition:
            transform 0.35s ease,
            box-shadow 0.35s ease,
            border-color 0.35s ease;
    }

    .team-member-item:hover {
        transform: translateY(-8px);
        border-color: rgba(17, 101, 48, 0.18);
        box-shadow:
            0 18px 40px rgba(0, 0, 0, 0.10);
    }


    /* PHOTO */
    .team-image {
        position: relative;
        width: 170px;
        height: 170px;
        margin: 0 auto 25px;
        padding: 5px;
        border-radius: 50%;
        background: linear-gradient(135deg,
                var(--accent-color),
                #a3e635);

        transition: transform 0.35s ease;
    }


    .team-image::before {
        content: "";
        position: absolute;
        inset: -6px;
        border-radius: 50%;
        border: 1px solid rgba(17, 101, 48, 0.12);
        z-index: -1;
    }

    .team-member-item:hover .team-image {
        transform: scale(1.04);
    }

    .team-image img {
        width: 100%;
        height: 100%;
        display: block;
        object-fit: cover;
        object-position: top;
        border-radius: 50%;
        background: #f5f7f5;
    }

    /*TEAM INFO*/
    .team-info h3 {
        margin: 0 0 8px;
        color: var(--heading-color);
        font-size: 20px;
        font-weight: 700;
    }


    .team-info span {
        display: inline-block;
        color: var(--accent-color);
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 1.5px;
    }

    /*  MOBILE */
    @media (max-width: 767px) {

        .team-section {
            padding: 70px 0 !important;
        }

        .team-member-item {
            padding: 25px 20px;
        }

        .team-image {
            width: 145px;
            height: 145px;
        }
    }
</style>
@endpush
@section('content')
<!-- Page Title -->
<div class="page-title dark-background" data-aos="fade"
    style="background-image: url({{ asset('assets/img/bgg.png') }});">
    <div class="container position-relative">
        <h1>Profil Perusahaan</h1>
        <nav class="breadcrumbs">
            <ol>
                <li><a href="index.html">Home</a></li>
                <li class="current">Profil Perusahaan</li>
            </ol>
        </nav>
    </div>
</div>
<section id="about-3" class="about-3 section">
    <div class="container">
        <div class="row gy-4 justify-content-between align-items-center">

            <div class="col-lg-6 order-lg-2 position-relative" data-aos="zoom-out">
                <img src="{{ asset('assets/img/thum.png') }}" alt="Image" class="img-fluid rounded image-3d-effect">
                <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#mp4VideoModal"
                    class="pulsating-play-btn">
                    <span class="play"><i class="bi bi-play-fill"></i></span>
                </a>
            </div>

            <div class="col-lg-5 order-lg-1" data-aos="fade-up" data-aos-delay="100">
                <h2 class="content-title mb-4">CV Solusi Agribisnis</h2>

                <p class="mb-3" style="font-size: 1.05rem; line-height: 1.7;">
                    <strong>CV. Solusi Agribisnis</strong> hadir mengedepankan <span
                        class="text-success fw-bold">digitalisasi
                        dan modernisasi</span> sektor agribisnis Indonesia demi hasil yang lebih optimal.
                </p>

                <p class="mb-3" style="font-size: 1rem; color: #555;">
                    Berada di bawah naungan <strong>CV. Terang Bulan Sejahtera</strong>, kami berdedikasi menjembatani
                    kesenjangan antara praktik pertanian tradisional dan adopsi teknologi mutakhir masa kini.
                </p>

                <div class="p-3 mb-4 rounded"
                    style="background-color: #f8f9fa; border-left: 4px solid var(--accent-color);">
                    <p class="mb-0 fst-italic" style="font-size: 0.95rem; color: #444;">
                        <i class="bi bi-quote text-success fs-5 me-1"></i> Kami percaya bahwa masa depan perkebunan dan
                        perdagangan modern berakar kuat pada keputusan yang didorong oleh data akurat serta regulasi
                        yang tepat.
                    </p>
                </div>

                <p>
                    <a href="https://wa.me/628197959415?text=Halo%2C%20selamat%20siang.%20Saya%20tertarik%20untuk%20membeli%20bibit.%20Apakah%20bibitnya%20masih%20tersedia,%20Terima%20kasih."
                        target="_blank" class="btn btn-success btn-cta shadow-sm px-4 py-2"
                        style="border-radius: 50px;">
                        <i class="bi bi-whatsapp me-2"></i> Hubungi Kami
                    </a>
                </p>
            </div>
        </div>
    </div>
</section>
<!-- /About 3 Section -->
<!-- Modal untuk Video MP4 -->
<div class="modal fade" id="mp4VideoModal" tabindex="-1" aria-labelledby="mp4VideoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <!-- Header Modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="mp4VideoModalLabel">Video Profil Perusahaan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Body Modal (Tempat Video MP4) -->
            <div class="modal-body p-0">
                <div class="ratio ratio-16x9">
                    <iframe src="https://www.youtube.com/embed/IKK3CAjpBg4"
                        title="Company Profile CV. Solusi Agribisnis (SOLAGRI)"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>
            </div>

        </div>
    </div>
</div>

<section id="visi-misi-style" class="py-5 bg-white text-dark">
    <div class="container py-4">

        <!-- Header Section -->
        <div class="text-center mb-5" data-aos="fade-down">
            <div class="d-inline-block text-uppercase fw-bold text-muted small mb-2" style="letter-spacing: 2px;">
                FOCUSED AND FUTURE READY
            </div>
            <h2 class="fw-bold display-6 text-dark">Visi, Misi & Tujuan Perusahaan</h2>
            <div class="mx-auto mt-2" style="width: 80px; height: 4px; background-color: var(--accent-color);"></div>
        </div>

        <div class="row align-items-center gy-5">

            <!-- Kolom Kiri: Konten Teks -->
            <div class="col-lg-6" data-aos="fade-right">
                <h3 class="fw-bold fs-4 mb-3 text-dark">Visi Kami</h3>
                <p class="text-secondary mb-4" style="line-height: 1.8; font-size: 1.05rem;">
                    "Mempercepat, membuka peluang bisnis anda dibeli pemerintah, dan permudahan administrasi
                    agribisnis."
                </p>

                <h3 class="fw-bold fs-4 mb-3 text-dark">Misi & Komitmen</h3>
                <p class="text-secondary mb-3" style="line-height: 1.7;">
                    Menjadi mitra strategis utama dalam melegalkan dan mendigitalisasi industri sektor perdagangan dan
                    jasa
                    konsultasi agribisnis.
                </p>

                <!-- Daftar Poin Tujuan / Keunggulan -->
                <ul class="list-unstyled mt-3">
                    <li class="d-flex align-items-start mb-2">
                        <i class="bi bi-check-circle-fill text-info me-2 mt-1"></i>
                        <span class="text-secondary"><strong>Aman:</strong> Memiliki landasan hukum yang kuat dan
                            kredibel.</span>
                    </li>
                    <li class="d-flex align-items-start mb-2">
                        <i class="bi bi-check-circle-fill text-info me-2 mt-1"></i>
                        <span class="text-secondary"><strong>Terjangkau:</strong> Akses layanan dan administrasi yang
                            efisien.</span>
                    </li>
                    <li class="d-flex align-items-start mb-2">
                        <i class="bi bi-check-circle-fill text-info me-2 mt-1"></i>
                        <span class="text-secondary"><strong>Terpercaya:</strong> Memastikan produk agribisnis siap
                            menjangkau
                            pasar yang lebih luas.</span>
                    </li>
                </ul>
            </div>

            <div class="col-lg-6 position-relative" data-aos="fade-left">
                <div class="position-absolute"
                    style="top: -20px; right: 20px; width: 120px; height: 20px; background-color: var(--accent-color); z-index: 1;">
                </div>

                <div class="position-relative overflow-hidden shadow-sm rounded" style="z-index: 2;">
                    <img src="{{ asset('assets/img/visi.jpg') }}"
                        alt="Agribusiness Solution" class="img-fluid w-100 object-fit-cover" style="min-height: 380px;">
                </div>

                <div class="position-absolute"
                    style="bottom: -20px; left: 20px; width: 150px; height: 20px; background-color: var(--accent-color); z-index: 1;">
                </div>
            </div>

        </div>

    </div>
</section>

<!-- Team Section -->
<section class="team-section py-5 bg-white" id="team">
    <!-- Section Title -->
    <div class="container section-title text-center mb-5" data-aos="fade-up">
        <span class="team-label">
            TIM SOLAGRI
        </span>
        <h2 class="fw-bold text-dark mt-2">
            Tim Kami
        </h2>
        <p class="text-muted">
            Didukung oleh tim profesional untuk memberikan solusi terbaik.
        </p>
    </div>
    <!-- End Section Title -->

    <div class="container">
        <div class="row justify-content-center g-4">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="team-member-item">
                    <div class="team-image">
                        <img src="{{ asset('assets/img/team/angel.png') }}" alt="Angel Indah">
                    </div>
                    <div class="team-info">
                        <h3>
                            Angel Indah
                        </h3>
                        <span>
                            SENIOR CONSULTANT
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="team-member-item">
                    <div class="team-image">
                        <img src="{{ asset('assets/img/team/isnanda.png') }}" alt="Isnanda Ageng">
                    </div>
                    <div class="team-info">
                        <h3>
                            Isnanda Ageng
                        </h3>
                        <span>
                            JUNIOR CONSULTANT
                        </span>
                    </div>
                </div>
            </div>


            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="team-member-item">
                    <div class="team-image">
                        <img src="{{ asset('assets/img/team/nasywa.png') }}" alt="Nasywa Azzahra">
                    </div>
                    <div class="team-info">
                        <h3>
                            Nasywa Azzahra
                        </h3>
                        <span>
                            MARKETING 1
                        </span>
                    </div>
                </div>
            </div>

        </div>
        <div class="row justify-content-center g-4 mt-4">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="team-member-item">
                    <div class="team-image">
                        <img src="{{ asset('assets/img/team/citra.png') }}" alt="Citra Afilia">
                    </div>
                    <div class="team-info">
                        <h3>
                            Citra Afilia
                        </h3>
                        <span>
                            MARKETING 2
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="team-member-item">
                    <div class="team-image">
                        <img src="{{ asset('assets/img/team/anindya.png') }}" alt="Anindya">
                    </div>
                    <div class="team-info">
                        <h3>
                            Anindya
                        </h3>
                        <span>
                            TECHNICAL TEAM
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="team-member-item">
                    <div class="team-image">
                        <img src="{{ asset('assets/img/team/lydia.png') }}" alt="Lydia">
                    </div>
                    <div class="team-info">
                        <h3>
                            Lydia
                        </h3>
                        <span>
                            TECHNICAL TEAM
                        </span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- /Team Section -->

@endsection
@push('js')

@endpush