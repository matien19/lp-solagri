@extends('layout.main')
@push('css')
<style>
    /* =========================
     HERO SECTION
  ========================= */
    #hero-section {
        position: relative;
        min-height: 100vh;
        overflow: hidden;
        background: url('./assets/img/hero.jpg') center center / cover no-repeat;
    }

    /* Overlay background */
    #hero-section .hero-overlay {
        position: absolute;
        inset: 0;
        z-index: 0;
        background: linear-gradient(90deg,
                rgba(12, 45, 35, 0.72) 0%,
                rgba(12, 45, 35, 0.48) 45%,
                rgba(12, 45, 35, 0.10) 100%);
    }

    /* Container */
    #hero-section .hero-container {
        position: relative;
        z-index: 1;
        min-height: 100vh;
        display: flex;
        align-items: center;
    }

    /* Kolom teks */
    #hero-section .hero-content {
        transition-delay: 0.3s;
    }

    /* Panel teks */
    #hero-section .hero-text-panel {
        position: relative;
        overflow: hidden;
        padding: 45px 50px;
        background: rgba(9, 45, 35, 0.72);
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
        border: 1px solid rgba(255, 255, 255, 0.12);
        border-radius: 0 30px 30px 0;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.20);
    }

    /* Garis aksen */
    #hero-section .hero-text-panel::before {
        content: "";
        position: absolute;
        left: 0;
        top: 40px;
        bottom: 40px;
        width: 5px;
        background: #ffc107;
        border-radius: 0 5px 5px 0;
    }

    /* Judul */
    #hero-section .hero-title {
        color: #ffffff;
        font-family: var(--heading-font);
        font-size: clamp(2.2rem, 5vw, 3.2rem);
        font-weight: 700;
        line-height: 1.2;
        margin-bottom: 1.2rem;
        text-shadow: 0 2px 6px rgba(0, 0, 0, 0.35);
    }

    /* Deskripsi */
    #hero-section .hero-description {
        max-width: 650px;
        color: rgba(255, 255, 255, 0.92);
        font-family: var(--default-font);
        font-size: clamp(1rem, 2vw, 1.15rem);
        line-height: 1.7;
        margin-bottom: 2rem;
        text-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
    }

    /* Tombol umum */
    #hero-section .hero-btn {
        border-radius: 10px;
        padding: 0.5rem 1.5rem;
        font-size: 1.1rem;
    }

    /* Tombol Produk */
    #hero-section .btn-produk {
        background-color: #ffc107;
        border: 2px solid #ffc107;
        color: #111111;
    }

    #hero-section .btn-produk:hover {
        background-color: #ffca2c;
        border-color: #ffca2c;
        color: #111111;
        transform: translateY(-2px);
    }

    /* Tombol Hubungi */
    #hero-section .btn-contact {
        border: 2px solid rgba(255, 255, 255, 0.9);
        background-color: rgba(255, 255, 255, 0.08);
        color: #ffffff;
        backdrop-filter: blur(4px);
    }

    #hero-section .btn-contact:hover {
        background-color: rgba(255, 255, 255, 0.18);
        border-color: #ffffff;
        color: #ffffff;
        transform: translateY(-2px);
    }

    #hero-section .hero-btn {
        transition: all 0.25s ease;
    }

    /* =========================
     RESPONSIVE MOBILE
  ========================= */
    @media (max-width: 768px) {

        #hero-section {
            background-position: center center;
        }

        #hero-section .hero-container {
            padding-top: 80px;
            padding-bottom: 50px;
        }

        #hero-section .hero-text-panel {
            padding: 35px 25px;
            border-radius: 20px;
        }

        #hero-section .hero-text-panel::before {
            top: 25px;
            bottom: 25px;
            width: 4px;
        }

        #hero-section .hero-title {
            font-size: 2rem;
        }

        #hero-section .hero-description {
            font-size: 1rem;
        }

        #hero-section .hero-btn {
            font-size: 1rem;
            padding: 0.5rem 1.2rem;
        }
    }

    /* =========================================================
   MODERN SERVICES SECTION
========================================================= */

    #services {
        position: relative;
        padding: 90px 0;
        background:
            radial-gradient(circle at 10% 10%, rgba(25, 135, 84, 0.06), transparent 30%),
            radial-gradient(circle at 90% 90%, rgba(255, 193, 7, 0.05), transparent 30%),
            #ffffff;
    }


    /* =========================
   SECTION TITLE
========================= */

    .service-section-title {
        max-width: 850px;
        margin-bottom: 55px;
    }

    .service-section-title .service-eyebrow {
        display: inline-block;
        margin-bottom: 12px;
        padding: 7px 16px;
        border-radius: 50px;

        background: rgba(25, 135, 84, 0.08);
        color: #198754;

        font-size: 0.78rem;
        font-weight: 700;
        letter-spacing: 1.5px;
    }

    .service-section-title h2 {
        margin-bottom: 15px;

        color: #173b2d;
        font-size: clamp(2rem, 4vw, 2.8rem);
        font-weight: 800;
        line-height: 1.2;
    }

    .service-section-title h2::after {
        content: "";
        display: block;

        width: 60px;
        height: 4px;

        margin: 18px auto 0;

        background: #ffc107;
        border-radius: 10px;
    }

    .service-section-title p {
        max-width: 700px;
        margin: 18px auto 0;

        color: #6c757d;
        font-size: 1rem;
        line-height: 1.8;
    }


    /* =========================
   GRID
========================= */

    #services .row {
        row-gap: 28px !important;
    }


    /* =========================
   SERVICE CARD
========================= */

    #services .service-item {
        position: relative;

        height: 100%;
        max-width: none;

        padding: 35px 28px 30px;

        background: #ffffff;

        border: 1px solid rgba(25, 135, 84, 0.10);
        border-radius: 22px;

        text-align: center;

        box-shadow:
            0 8px 25px rgba(24, 70, 50, 0.06);

        overflow: hidden;

        transition:
            transform 0.35s ease,
            box-shadow 0.35s ease,
            border-color 0.35s ease;
    }


    /* Garis hijau bagian atas */

    #services .service-item::before {
        content: "";

        position: absolute;

        top: 0;
        left: 50%;

        width: 0;
        height: 4px;

        background: #198754;

        transform: translateX(-50%);

        transition: width 0.35s ease;
    }


    /* Background dekorasi */

    #services .service-item::after {
        content: "";

        position: absolute;

        width: 130px;
        height: 130px;

        right: -70px;
        bottom: -70px;

        border-radius: 50%;

        background: rgba(25, 135, 84, 0.045);

        transition: transform 0.4s ease;
    }


    /* Hover */

    #services .service-item:hover {
        transform: translateY(-10px);

        border-color: rgba(25, 135, 84, 0.22);

        box-shadow:
            0 20px 45px rgba(24, 70, 50, 0.13);
    }

    #services .service-item:hover::before {
        width: 70%;
    }

    #services .service-item:hover::after {
        transform: scale(2);
    }


    /* =========================
   NUMBER
========================= */

    #services .service-item .number {
        position: absolute;

        top: 16px;
        right: 16px;

        display: flex;
        align-items: center;
        justify-content: center;

        width: 38px;
        height: 38px;

        border-radius: 50%;

        background: #f1f8f4;
        color: #198754;

        font-size: 0.78rem;
        font-weight: 800;

        z-index: 3;

        transition: all 0.3s ease;
    }

    #services .service-item:hover .number {
        background: #198754;
        color: #ffffff;

        transform: rotate(8deg) scale(1.08);
    }


    /* =========================
   IMAGE / ICON
========================= */

    #services .service-item-img {
        position: relative;
        z-index: 2;

        width: 105px;
        height: 105px;

        margin: 5px auto 25px;

        object-fit: cover;

        padding: 9px;

        background: #ffffff;

        border: 1px solid rgba(25, 135, 84, 0.12);

        border-radius: 24px;

        box-shadow:
            0 8px 20px rgba(25, 135, 84, 0.10);

        transition:
            transform 0.4s ease,
            box-shadow 0.4s ease,
            border-radius 0.4s ease;
    }

    #services .service-item:hover .service-item-img {
        transform: translateY(-5px) scale(1.07);

        border-radius: 50%;

        box-shadow:
            0 12px 28px rgba(25, 135, 84, 0.18);
    }


    /* =========================
   CONTENT
========================= */

    #services .service-item-content {
        position: relative;
        z-index: 2;

        display: flex;
        flex-direction: column;

        height: calc(100% - 130px);
    }


    /* =========================
   HEADING
========================= */

    #services .service-heading {
        min-height: 58px;

        margin-bottom: 12px;

        color: #173b2d;

        font-size: 1.05rem;
        font-weight: 750;

        line-height: 1.45;

        transition: color 0.3s ease;
    }

    #services .service-item:hover .service-heading {
        color: #198754;
    }


    /* =========================
   DESCRIPTION
========================= */

    #services .service-item-content p {
        margin-bottom: 0;

        color: #6c757d;

        font-size: 0.91rem;
        line-height: 1.75;
    }


    /* =========================
   OPTIONAL CTA
========================= */

    #services .service-item .service-link {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;

        margin-top: 20px;

        color: #198754;

        font-size: 0.85rem;
        font-weight: 700;

        text-decoration: none;

        transition: gap 0.3s ease;
    }

    #services .service-item:hover .service-link {
        gap: 12px;
    }


    /* =========================
   TABLET
========================= */

    @media (max-width: 991px) {

        #services {
            padding: 75px 0;
        }

        #services .service-item {
            padding: 32px 25px 28px;
        }

    }


    /* =========================
   MOBILE
========================= */

    @media (max-width: 767px) {

        #services {
            padding: 65px 0;
        }

        .service-section-title {
            margin-bottom: 40px;
            padding: 0 15px;
        }

        .service-section-title h2 {
            font-size: 2rem;
        }

        .service-section-title p {
            font-size: 0.92rem;
        }

        #services .service-item {
            padding: 32px 25px 28px;

            border-radius: 20px;
        }

        #services .service-item-img {
            width: 95px;
            height: 95px;
        }

        #services .service-heading {
            min-height: auto;

            font-size: 1rem;
        }

    }


    /* =========================
   VERY SMALL MOBILE
========================= */

    @media (max-width: 400px) {

        #services .service-item {
            padding: 30px 20px 25px;
        }

        #services .service-item-img {
            width: 88px;
            height: 88px;
        }

        #services .service-item .number {
            width: 34px;
            height: 34px;

            font-size: 0.7rem;
        }

    }

    /* Logo Marquee */
    .marquee-wrapper {
        overflow: hidden;
        white-space: nowrap;
    }

    .logo-marquee {
        flex-shrink: 0;
        animation: scroll-marquee 30s linear infinite;
    }

    .logo-marquee img {
        filter: grayscale(100%) opacity(70%);
        transition: all 0.3s ease-in-out;
    }

    .logo-marquee img:hover {
        filter: grayscale(0%) opacity(100%);
    }

    @keyframes scroll-marquee {
        0% {
            transform: translateX(0);
        }

        100% {
            transform: translateX(-100%);
        }
    }

    .marquee-wrapper:hover .logo-marquee {
        animation-play-state: paused;
    }

    .image-3d-effect {
        border: 5px solid #ffffff;
        box-shadow: 0 10px 30px rgba(17, 101, 48, 0.15);
        transition: all 0.4s ease-in-out;
    }

    .image-3d-effect:hover {
        transform: translateY(-15px) scale(1.03);

        box-shadow: 0 25px 50px rgba(17, 101, 48, 0.3);
    }

    .transition-hover {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .transition-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08) !important;
    }

    .statistics-section {
        background: linear-gradient(to bottom, #65847b 45%, #f7f9fa 45%);
        padding: 60px 0;
        position: relative;
    }

    .stats-card {
        background-color: #ffffff;
        border-radius: 25px;
        padding: 60px 30px;
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.05);
    }

    .stats-card .stat-item h2 {
        color: #179373;
        font-size: 3.5rem;
        font-weight: 800;
        margin-bottom: 5px;
    }

    .stats-card .stat-item p {
        color: #7d8b96;
        font-size: 1.1rem;
        font-weight: 500;
        margin-bottom: 0;
    }

    @media (max-width: 768px) {
        .stats-card {
            padding: 40px 20px;
        }

        .stats-card .stat-item {
            margin-bottom: 30px;
        }

        .stats-card .col-lg-3:last-child .stat-item {
            margin-bottom: 0;
        }
    }


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
<style>
    .floating-whatsapp {
        position: fixed;
        right: 25px;
        bottom: 80px;
        width: 60px;
        height: 60px;
        background-color: #25d366;
        color: #ffffff;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 32px;
        text-decoration: none;
        z-index: 9999;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.25);
        transition: all 0.3s ease;
    }

    .floating-whatsapp:hover {
        background-color: #20ba5a;
        color: #ffffff;
        transform: scale(1.1);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
    }

    /* Animasi berdenyut */
    .floating-whatsapp::before {
        content: "";
        position: absolute;
        width: 100%;
        height: 100%;
        border-radius: 50%;
        border: 2px solid #25d366;
        animation: whatsapp-pulse 2s infinite;
    }

    @keyframes whatsapp-pulse {
        0% {
            transform: scale(1);
            opacity: 0.8;
        }

        70% {
            transform: scale(1.35);
            opacity: 0;
        }

        100% {
            transform: scale(1.35);
            opacity: 0;
        }
    }

    /* Tampilan HP */
    @media (max-width: 768px) {
        .floating-whatsapp {
            width: 55px;
            height: 55px;
            right: 18px;
            bottom: 70px;
            font-size: 28px;
        }
    }
</style>
@endpush
@section('content')
<!-- Hero Section -->
<section class="py-0 position-relative" id="hero-section">
    <!-- Overlay -->
    <div class="hero-overlay"></div>
    <!-- Content -->
    <div class="container hero-container">
        <div class="row w-100 align-items-center">
            <div class="col-12 col-lg-8 col-xl-7 px-3 hero-content hero-anim-slide-up">
                <!-- Panel teks -->
                <div class="hero-text-panel">
                    <!-- Judul -->
                    <h1 class="hero-title">
                        Mari Bangun Kerja Sama
                        <br>
                        yang Lebih Terstruktur
                    </h1>
                    <!-- Deskripsi -->
                    <p class="hero-description">
                        CV. Solusi Agribisnis dapat menjadi mitra strategis Anda
                        untuk pengembangan usaha yang profesional, terencana,
                        dan berkelanjutan.
                    </p>
                    <!-- Button -->
                    <div class="d-flex flex-wrap gap-3">
                        <a href="jasa.html" class="btn btn-lg fw-bold shadow hero-btn btn-produk">
                            Layanan Kami
                        </a>
                        <a href="contact.html" class="btn btn-lg fw-bold hero-btn btn-contact">
                            Hubungi Kami
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="about-3" class="about-3 section">
    <div class="container">
        <div class="row gy-4 justify-content-between align-items-center">

            <div class="col-lg-6 order-lg-2 position-relative" data-aos="zoom-out">
                <img src="./assets/img/thum.png" alt="Image" class="img-fluid rounded image-3d-effect">
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
                    Berada di bawah naungan <strong>CV. Terang Bulan Sejahtera</strong>, kami berdedikasi
                    menjembatani
                    kesenjangan antara praktik pertanian tradisional dan adopsi teknologi mutakhir masa kini.
                </p>

                <div class="p-3 mb-4 rounded"
                    style="background-color: #f8f9fa; border-left: 4px solid var(--accent-color);">
                    <p class="mb-0 fst-italic" style="font-size: 0.95rem; color: #444;">
                        <i class="bi bi-quote text-success fs-5 me-1"></i> Kami percaya bahwa masa depan perkebunan
                        dan
                        perdagangan modern berakar kuat pada keputusan yang didorong oleh data akurat serta regulasi
                        yang tepat.
                    </p>
                </div>

                <p>
                    <a href="https://wa.me/6281231900339?text=Halo%2C%20selamat%20siang.%20Saya%20tertarik%20untuk%20membeli%20bibit.%20Apakah%20bibitnya%20masih%20tersedia,%20Terima%20kasih."
                        target="_blank" class="btn btn-success btn-cta shadow-sm px-4 py-2"
                        style="border-radius: 50px;">
                        <i class="bi bi-whatsapp me-2"></i> Hubungi Kami
                    </a>
                </p>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="mp4VideoModal" tabindex="-1" aria-labelledby="mp4VideoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="mp4VideoModalLabel">Video Profil Perusahaan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

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

<!-- Services Section -->
<section id="services" class="services section">

    <!-- Section Title -->
    <div class="container section-title service-section-title" data-aos="fade-up">
        <span class="service-eyebrow">SOLUSI PROFESIONAL UNTUK BISNIS ANDA</span>

        <h2>Jasa dan Layanan Kami</h2>

        <p>
            Kami menyediakan berbagai layanan pendampingan profesional untuk membantu
            kebutuhan legalitas, sertifikasi, perizinan, hingga pengembangan usaha Anda.
        </p>
    </div>

    <!-- Services Content -->
    <div class="content">
        <div class="container">

            <!-- Card akan dibuat otomatis oleh JavaScript -->
            <div id="service-list" class="row g-4"></div>

        </div>
    </div>

</section>
<!-- End Services Section -->

<section id="clients" class="clients section py-5" style="background-color: var(--surface-color);">

    <div class="container section-title" data-aos="fade-up">
        <h2>Klien dan Kerja Sama</h2>
        <h5>Mitra terpercaya yang telah tumbuh dan berkembang bersama kami</h5>
    </div>
    <div class="container-fluid overflow-hidden bg-success py-5" data-aos="fade-up">

        <div class="marquee-wrapper d-flex w-100">

            <div class="marquee d-flex gap-5 align-items-center logo-marquee px-4">
                <div><img src="./assets/img/mitra/1.png" height="75" alt="" loading="eager" title="MADU BARU"></div>
                <div><img src="./assets/img/mitra/2.png" height="75" alt="" loading="eager" title="JHLGROW"></div>
                <div><img src="./assets/img/mitra/3.png" height="75" alt="" loading="eager" title="BIOREKA"></div>
                <div><img src="./assets/img/mitra/4.png" height="75" alt="" loading="eager" title="ICM"></div>
                <div><img src="./assets/img/mitra/5.png" height="75" alt="" loading="eager" title="ALAM HIJAU SELARAS">
                </div>
                <div><img src="./assets/img/mitra/6.png" height="75" alt="" loading="eager" title="-"></div>
                <div><img src="./assets/img/mitra/7.png" height="75" alt="" loading="eager" title="DNM"></div>
                <div><img src="./assets/img/mitra/8.png" height="75" alt="" loading="eager" title="KURNIA AGRO LESTARI">
                </div>
                <div><img src="./assets/img/mitra/1.png" height="75" alt="" loading="eager" title="MADU BARU"></div>
                <div><img src="./assets/img/mitra/2.png" height="75" alt="" loading="eager" title="JHLGROW"></div>
                <div><img src="./assets/img/mitra/3.png" height="75" alt="" loading="eager" title="BIOREKA"></div>
                <div><img src="./assets/img/mitra/4.png" height="75" alt="" loading="eager" title="ICM"></div>
                <div><img src="./assets/img/mitra/5.png" height="75" alt="" loading="eager" title="ALAM HIJAU SELARAS">
                </div>
                <div><img src="./assets/img/mitra/6.png" height="75" alt="" loading="eager" title="-"></div>
                <div><img src="./assets/img/mitra/7.png" height="75" alt="" loading="eager" title="DNM"></div>
                <div><img src="./assets/img/mitra/8.png" height="75" alt="" loading="eager" title="KURNIA AGRO LESTARI">
                </div>
            </div>

            <div aria-hidden="true" class="marquee d-flex gap-5 align-items-center logo-marquee px-4">
                <div><img src="./assets/img/mitra/1.png" height="75" alt="" loading="eager" title="MADU BARU"></div>
                <div><img src="./assets/img/mitra/2.png" height="75" alt="" loading="eager" title="JHLGROW"></div>
                <div><img src="./assets/img/mitra/3.png" height="75" alt="" loading="eager" title="BIOREKA"></div>
                <div><img src="./assets/img/mitra/4.png" height="75" alt="" loading="eager" title="ICM"></div>
                <div><img src="./assets/img/mitra/5.png" height="75" alt="" loading="eager" title="ALAM HIJAU SELARAS">
                </div>
                <div><img src="./assets/img/mitra/6.png" height="75" alt="" loading="eager" title="-"></div>
                <div><img src="./assets/img/mitra/7.png" height="75" alt="" loading="eager" title="DNM"></div>
                <div><img src="./assets/img/mitra/8.png" height="75" alt="" loading="eager" title="KURNIA AGRO LESTARI">
                </div>
                <div><img src="./assets/img/mitra/1.png" height="75" alt="" loading="eager" title="MADU BARU"></div>
                <div><img src="./assets/img/mitra/2.png" height="75" alt="" loading="eager" title="JHLGROW"></div>
                <div><img src="./assets/img/mitra/3.png" height="75" alt="" loading="eager" title="BIOREKA"></div>
                <div><img src="./assets/img/mitra/4.png" height="75" alt="" loading="eager" title="ICM"></div>
                <div><img src="./assets/img/mitra/5.png" height="75" alt="" loading="eager" title="ALAM HIJAU SELARAS">
                </div>
                <div><img src="./assets/img/mitra/6.png" height="75" alt="" loading="eager" title="-"></div>
                <div><img src="./assets/img/mitra/7.png" height="75" alt="" loading="eager" title="DNM"></div>
                <div><img src="./assets/img/mitra/8.png" height="75" alt="" loading="eager" title="KURNIA AGRO LESTARI">
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Why Us & Statistics Combined Section (Full-width left alignment) -->
<section id="why-us-stats" class="py-5 position-relative overflow-hidden" style="background-color: #f8f9fa;">
    <div class="container-fluid px-0">
        <div class="row g-0 align-items-center">

            <!-- Kolom Gambar Agribisnis HD (Mentok Kiri, Tanpa Shadow/3D, Lengkungan di Pojok Kanan Atas) -->
            <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
                <div class="position-relative w-100">
                    <img src="https://images.unsplash.com/photo-1605000797499-95a51c5269ae?q=80&w=1171&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        class="img-fluid w-100" alt="Pertanian dan Agribisnis Modern HD"
                        style="object-fit: cover; height: 500px; border-radius: 0 180px 0 0; display: block;">
                </div>
            </div>

            <!-- Kolom Konten & Statistik (Kanan dengan Padding agar rapi) -->
            <div class="col-lg-6 px-4 px-lg-5 py-4" data-aos="fade-left" data-aos-delay="200">
                <div class="text-start pb-2">
                    <h5 class="text-success fw-bold text-uppercase tracking-wider mb-2" style="font-size: 0.9rem;">
                        Kenapa
                        Memilih Kami?</h5>
                    <h2 class="fw-bold mb-3" style="color: var(--heading-color); font-size: 2.2rem; line-height: 1.3;">
                        Mitra
                        Terpercaya <span style="color: var(--accent-color);">Agribisnis Anda</span></h2>
                    <p class="text-muted mb-4" style="line-height: 1.7;">
                        Kami menghadirkan solusi menyeluruh untuk masa depan pertanian yang didorong oleh standar
                        kualitas
                        ketat, inovasi teknologi modern, serta dukungan tim ahli profesional dari hulu hingga hilir.
                    </p>
                </div>

                <!-- Fitur Keunggulan Singkat -->
                <div class="features-list mb-4">
                    <div class="d-flex align-items-start mb-3">
                        <div class="flex-shrink-0 text-success fs-4 me-3">
                            <i class="bi bi-check-circle-fill"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1" style="color: var(--heading-color);">Kualitas Produk & Benih
                                Terjamin</h6>
                            <p class="text-muted small mb-0">Melewati standar kontrol kualitas ketat untuk hasil
                                panen optimal.
                            </p>
                        </div>
                    </div>

                    <div class="d-flex align-items-start mb-3">
                        <div class="flex-shrink-0 text-success fs-4 me-3">
                            <i class="bi bi-check-circle-fill"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1" style="color: var(--heading-color);">Inovasi Smart Farming</h6>
                            <p class="text-muted small mb-0">Mengintegrasikan teknologi terkini demi efisiensi
                                produksi pertanian.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Kotak-kotak Statistik di Bawah Deskripsi -->
                <div class="row g-3">

                    <!-- Stat Item 1 -->
                    <div class="col-6 col-md-3">
                        <div class="bg-white p-3 text-center rounded-4 border border-light h-100 transition-hover">
                            <h3 class="fw-bold text-success mb-1" style="font-size: 1.6rem;"><span class="count-up"
                                    data-target="250">0</span>+</h3>
                            <p class="text-muted small mb-0 fw-semibold">Produk</p>
                        </div>
                    </div>

                    <!-- Stat Item 2 -->
                    <div class="col-6 col-md-3">
                        <div class="bg-white p-3 text-center rounded-4 border border-light h-100 transition-hover">
                            <h3 class="fw-bold text-success mb-1" style="font-size: 1.6rem;"><span class="count-up"
                                    data-target="50">0</span></h3>
                            <p class="text-muted small mb-0 fw-semibold">Klien & Mitra</p>
                        </div>
                    </div>

                    <!-- Stat Item 3 -->
                    <div class="col-6 col-md-3">
                        <div class="bg-white p-3 text-center rounded-4 border border-light h-100 transition-hover">
                            <h3 class="fw-bold text-success mb-1" style="font-size: 1.6rem;"><span class="count-up"
                                    data-target="1200">0</span>+</h3>
                            <p class="text-muted small mb-0 fw-semibold">Bibit Unggul</p>
                        </div>
                    </div>

                    <!-- Stat Item 4 -->
                    <div class="col-6 col-md-3">
                        <div class="bg-white p-3 text-center rounded-4 border border-light h-100 transition-hover">
                            <h3 class="fw-bold text-success mb-1" style="font-size: 1.6rem;"><span class="count-up"
                                    data-target="10">0</span>+</h3>
                            <p class="text-muted small mb-0 fw-semibold">Pengalaman</p>
                        </div>
                    </div>

                </div>
                <!-- /Kotak-kotak Statistik -->

            </div>

        </div>
    </div>
</section>
<!-- /Why Us & Statistics Combined Section -->


<section id="recent-posts" class="recent-posts section">

    <div class="container section-title" data-aos="fade-up">
        <h2>Kegiatan / Berita</h2>
        <h6>Kegiatan Terbaru kami</h6>
    </div>
    <div class="container">

        <div class="row gy-5">
            @forelse($berita_terbaru as $item)
            <!-- Delay animasi ditambahkan secara dinamis: 100, 200, 300, dst -->
            <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                <div class="post-item position-relative h-100">

                    <div class="post-img position-relative overflow-hidden">
                        <!-- Gambar Dinamis dengan Fallback Default -->
                        <img src="{{ $item->img ? asset($item->img) : asset('assets/img/default-berita.jpg') }}"
                            class="img-fluid w-100" alt="{{ $item->judul }}" style="height: 250px; object-fit: cover;">

                        <!-- Tanggal Dinamis -->
                        <span class="post-date">{{ $item->created_at->format('F d') }}</span>
                    </div>

                    <div class="post-content d-flex flex-column" style="flex-grow: 1;">
                        <!-- Judul Dinamis -->
                        <h3 class="post-title">{{ $item->judul }}</h3>

                        <div class="meta d-flex align-items-center mb-auto">
                            <span class="px-3 text-black-50"></span>
                            <div class="d-flex align-items-center">
                                <i class="bi bi-folder2"></i> <span class="ps-2">Berita & Kegiatan</span>
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
            <div class="col-12 text-center" data-aos="fade-up" data-aos-delay="100">
                <p class="text-muted">Belum ada kegiatan atau berita terbaru yang dipublikasikan.</p>
            </div>

            @endforelse

        </div>
    </div>
</section>
<a href="https://wa.me/6281231900339?text=Halo%20CV.%20Solusi%20Agribisnis,%20saya%20ingin%20mendapatkan%20informasi%20lebih%20lanjut."
    target="_blank" rel="noopener noreferrer" class="floating-whatsapp" aria-label="Hubungi kami melalui WhatsApp"
    title="Hubungi kami melalui WhatsApp">

    <i class="bi bi-whatsapp"></i>
</a>
@endsection
@push('js')
<script>
    document.addEventListener('DOMContentLoaded', function () {
      setTimeout(function () {
        document.getElementById("hero-section").classList.add("is-animated");
      }, 100);
      var videoModal = document.getElementById('mp4VideoModal');
      var videoElement = document.getElementById('companyVideo');

      videoModal.addEventListener('hidden.bs.modal', function () {
        videoElement.pause();
        videoElement.currentTime = 0;
      });

      const animationDuration = 2000;
      const animateCountUp = (el) => {
        const target = parseInt(el.getAttribute("data-target"));
        const startTime = performance.now();

        const updateCount = (currentTime) => {
          const elapsedTime = currentTime - startTime;
          const progress = Math.min(elapsedTime / animationDuration, 1);

          const easeOutQuart = 1 - Math.pow(1 - progress, 4);

          const currentCount = Math.floor(easeOutQuart * target);
          el.innerText = currentCount;

          if (progress < 1) {
            requestAnimationFrame(updateCount);
          } else {
            el.innerText = target;
          }
        };

        requestAnimationFrame(updateCount);
      };

      const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            const counters = entry.target.querySelectorAll(".count-up");
            counters.forEach(counter => animateCountUp(counter));

            observer.unobserve(entry.target);
          }
        });
      }, { threshold: 0.5 }); // threshold 0.5 berarti animasi mulai saat 50% section terlihat

      const statsSection = document.querySelector("#why-us-stats");
      if (statsSection) {
        observer.observe(statsSection);
      }

      // Batas 100 karakter untuk judul postingan
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
<script>
    const services = [
      {
        number: "01",
        image: "./assets/img/logo_layanan/izin_pupuk.jpg",
        title: "Layanan Pendampingan Perizinan Pupuk",
        description:
          "Mendampingi proses pengurusan dan kelengkapan perizinan edar serta legalitas produk pupuk secara resmi."
      },

      {
        number: "02",
        image: "./assets/img/logo_layanan/halal.jpg",
        title: "Layanan Pendampingan Sertifikasi Halal",
        description:
          "Bimbingan lengkap proses pengajuan hingga terbitnya sertifikat halal untuk produk usaha Anda."
      },

      {
        number: "03",
        image: "./assets/img/logo_layanan/sni.jpg",
        title: "Layanan Pendampingan Sertifikasi SNI",
        description:
          "Memastikan produk memenuhi Standar Nasional Indonesia melalui proses pendampingan yang terarah."
      },

      {
        number: "04",
        image: "./assets/img/logo_layanan/oss.png",
        title: "Layanan Pendampingan Sistem OSS",
        description:
          "Solusi mudah perizinan berusaha dan integrasi sistem Online Single Submission (OSS)."
      },

      {
        number: "05",
        image: "./assets/img/logo_layanan/nib.png",
        title: "Layanan Pendampingan Penerbitan NIB",
        description:
          "Pengurusan cepat Nomor Induk Berusaha (NIB) sebagai identitas resmi legalitas operasional perusahaan."
      },

      {
        number: "06",
        image: "./assets/img/logo_layanan/tkdn.png",
        title: "Layanan Pendampingan Sertifikasi TKDN",
        description:
          "Pengukuran dan pengurusan Tingkat Komponen Dalam Negeri guna mendukung pengadaan barang dan jasa."
      },

      {
        number: "07",
        image: "./assets/img/logo_layanan/merk_hki.png",
        title: "Layanan Pendampingan Pendaftaran Merek & HKI",
        description:
          "Perlindungan aset intelektual dan pendaftaran hak kekayaan intelektual (HKI) untuk merek usaha."
      },

      {
        number: "08",
        image: "./assets/img/logo_layanan/e_katalog.jpg",
        title: "Pendampingan E-Catalog",
        description:
          "Pengelolaan, pendaftaran, dan optimalisasi produk agar tayang serta bersaing di LKPP / LPSE."
      },

      {
        number: "09",
        image: "./assets/img/logo_layanan/legalitas_mutu.jpg",
        title: "Pendampingan Legalitas Mutu Produk",
        description:
          "Standarisasi kualitas produk serta fasilitasi pengujian laboratorium secara komprehensif."
      },

      {
        number: "10",
        image: "./assets/img/logo_layanan/ekspor_impor.jpg",
        title: "Pendampingan Ekspor Impor",
        description:
          "Pengurusan dokumen kepabeanan, koordinasi dengan Kemendag, hingga perizinan karantina."
      },

      {
        number: "11",
        image: "./assets/img/logo_layanan/sertif_IPO.jpg",
        title: "Pendampingan Sertifikat ISO 9001",
        description:
          "Penerapan Sistem Manajemen Mutu berstandar internasional untuk meningkatkan kredibilitas bisnis."
      },

      {
        number: "12",
        image: "./assets/img/logo_layanan/edar_bpom.jpg",
        title: "Pendampingan Izin Edar BPOM",
        description:
          "Mendampingi proses pengujian hingga terbitnya izin edar Badan Pengawas Obat dan Makanan."
      }
    ];



    const serviceList = document.getElementById("service-list");

    serviceList.innerHTML = services.map((service, index) => {

      return `
      <div
        class="col-12 col-md-6 col-lg-3 d-flex align-items-stretch"
        data-aos="fade-up"
        data-aos-delay="${100 + (index % 4) * 50}"
      >

        <div class="service-item w-100">

          <!-- Nomor -->
          <span class="number">
            ${service.number}
          </span>

          <!-- Gambar -->
          <img
            src="${service.image}"
            alt="${service.title}"
            class="img-fluid service-item-img"
            loading="lazy"
          >

          <!-- Content -->
          <div class="service-item-content">

            <h3 class="service-heading">
              ${service.title}
            </h3>

            <p>
              ${service.description}
            </p>

          </div>

        </div>

      </div>
    `;

    }).join("");

</script>
@endpush