@extends('layout.main')
@push('css')
<style>
    .social-section {
        position: relative;
        overflow: hidden;
        padding: 90px 0 !important;

        background:
            radial-gradient(circle at 0% 100%,
                rgba(71, 155, 92, 0.18),
                transparent 35%),
            linear-gradient(135deg,
                #0d3b20 0%,
                #12552c 50%,
                #0a2917 100%);
    }

    /* Dekorasi background */
    .social-section::before {
        content: "";
        position: absolute;
        width: 280px;
        height: 280px;
        border-radius: 50%;

        top: -140px;
        right: -80px;

        background: rgba(255, 255, 255, 0.04);
    }

    .social-section::after {
        content: "";
        position: absolute;
        width: 220px;
        height: 220px;
        border-radius: 50%;

        bottom: -120px;
        left: -70px;

        background: rgba(255, 255, 255, 0.035);
    }

    .social-section .container {
        position: relative;
        z-index: 2;
    }

    .social-header {
        max-width: 650px;
        margin: 0 auto 50px;
        text-align: center;
    }

    .social-label {
        display: inline-flex;
        align-items: center;
        gap: 7px;

        padding: 7px 16px;

        border-radius: 50px;

        background: rgba(255, 255, 255, 0.10);
        border: 1px solid rgba(255, 255, 255, 0.15);

        color: #d8f3df;

        font-size: 13px;
        font-weight: 600;
        letter-spacing: 0.5px;
    }

    .social-label i {
        font-size: 14px;
    }

    .social-title {
        margin-top: 18px;
        margin-bottom: 12px;

        color: #ffffff;

        font-size: 38px;
        font-weight: 700;
    }

    .social-title span {
        color: #a9dfb5;
    }

    .social-description {
        margin: 0;

        color: rgba(255, 255, 255, 0.72);

        font-size: 15px;
        line-height: 1.7;
    }


    .social-card {
        position: relative;

        height: 100%;
        min-height: 250px;

        padding: 30px;

        border-radius: 18px;

        background: rgba(255, 255, 255, 0.08);

        border: 1px solid rgba(255, 255, 255, 0.13);

        transition:
            transform 0.35s ease,
            background 0.35s ease,
            box-shadow 0.35s ease,
            border-color 0.35s ease;

        overflow: hidden;
    }

    .social-card:hover {
        transform: translateY(-8px);

        background: rgba(255, 255, 255, 0.12);

        border-color: rgba(255, 255, 255, 0.25);

        box-shadow: 0 18px 40px rgba(0, 0, 0, 0.20);
    }


    .social-icon {
        width: 58px;
        height: 58px;

        display: flex;
        align-items: center;
        justify-content: center;

        margin-bottom: 24px;

        border-radius: 15px;

        background: rgba(255, 255, 255, 0.10);

        border: 1px solid rgba(255, 255, 255, 0.12);

        color: #ffffff;

        font-size: 27px;

        transition: 0.35s ease;
    }

    .social-card:hover .social-icon {
        transform: scale(1.08);
    }



    .social-platform {
        display: block;

        margin-bottom: 7px;

        color: rgba(255, 255, 255, 0.55);

        font-size: 12px;
        font-weight: 600;

        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .social-username {
        margin: 0 0 12px;

        color: #ffffff;

        font-size: 18px;
        font-weight: 700;
    }

    .social-text {
        min-height: 48px;

        margin-bottom: 22px;

        color: rgba(255, 255, 255, 0.65);

        font-size: 13px;
        line-height: 1.6;
    }

    .social-link {
        display: inline-flex;
        align-items: center;
        gap: 8px;

        padding: 9px 15px;

        border-radius: 8px;

        background: rgba(255, 255, 255, 0.09);

        color: #ffffff !important;

        font-size: 12px;
        font-weight: 600;

        text-decoration: none;

        transition: 0.3s ease;
    }

    .social-link i {
        font-size: 13px;

        transition: transform 0.3s ease;
    }

    .social-link:hover {
        background: #ffffff;

        color: #145c2d !important;
    }

    .social-link:hover i {
        transform: translate(3px, -3px);
    }


    .instagram-card .social-icon {
        background: linear-gradient(135deg,
                rgba(225, 48, 108, 0.22),
                rgba(131, 58, 180, 0.22));
    }

    .tiktok-card .social-icon {
        background: rgba(0, 0, 0, 0.20);
    }

    .threads-card .social-icon {
        background: rgba(0, 0, 0, 0.20);
    }

    .youtube-card .social-icon {
        background: rgba(255, 0, 0, 0.18);
    }

    /* =========================================
   RESPONSIVE
========================================= */

    @media (max-width: 768px) {

        .social-section {
            padding: 70px 0 !important;
        }

        .social-title {
            font-size: 30px;
        }

        .social-description {
            padding: 0 15px;
            font-size: 14px;
        }

        .social-card {
            min-height: auto;
        }

    }
</style>
@endpush
@section('content')
<!-- Page Title -->
<div class="page-title dark-background" data-aos="fade"
    style="background-image: url({{ asset('assets/img/bgg.png') }});">
    <div class="container position-relative">
        <h1>Kontak</h1>
        <nav class="breadcrumbs">
            <ol>
                <li><a href="{{ route('beranda') }}">Home</a></li>
                <li class="current">Kontak</li>
            </ol>
        </nav>
    </div>
</div><!-- End Page Title -->

<!-- Contact Section -->
<section id="contact" class="contact section">
    <div class="section-title text-center mb-5" data-aos="fade-up">
        <p>Lokasi Kami</p>
    </div>
    <div class="mb-5">
        <iframe style="width: 100%; height: 400px;"
            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3103.426965034792!2d106.8030427!3d-6.29302658!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f1e4f62c0bf5%3A0xd3e1c01edc3f6d5!2sSovereign%20Plaza%2C%20RT.1%2FRW.2%2C%20Cilandak%20Bar.%2C%20Kec.%20Cilandak%2C%20Kota%20Jakarta%20Selatan%2C%20Daerah%20Khusus%20Ibukota%20Jakarta%2012430!5e1!3m2!1sid!2sid!4v1783855233046!5m2!1sid!2sid"
            allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
    </div><!-- End Google Maps -->
</section><!-- /Contact Section -->
<section id="media-sosial" class="social-section">
    <div class="container">
        <!-- Header -->
        <div class="social-header" data-aos="fade-up">
            <span class="social-label">
                <i class="bi bi-share-fill"></i>
                Media Sosial
            </span>

            <h2 class="social-title">
                Ikuti <span>Solagri</span>
            </h2>

            <p class="social-description">
                Dapatkan informasi terbaru, aktivitas, dan berbagai
                informasi menarik dari Solagri melalui media sosial kami.
            </p>

        </div>
        <!-- Social Media Cards -->
        <div class="row g-4">
            <!-- Instagram -->
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="social-card instagram-card">
                    <div class="social-icon">
                        <i class="bi bi-instagram"></i>
                    </div>
                    <span class="social-platform">
                        Instagram
                    </span>

                    <h5 class="social-username">
                        @solagriconsultant
                    </h5>

                    <p class="social-text">
                        Ikuti aktivitas dan informasi terbaru Solagri
                        melalui Instagram.
                    </p>
                    <!-- 
              <a href="#" target="_blank" class="social-link">
                Kunjungi Instagram
                <i class="bi bi-arrow-up-right"></i>
              </a> -->

                </div>
            </div>
            <!-- TikTok -->
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">

                <div class="social-card tiktok-card">

                    <div class="social-icon">
                        <i class="bi bi-tiktok"></i>
                    </div>

                    <span class="social-platform">
                        TikTok
                    </span>

                    <h5 class="social-username">
                        solagriconsultant
                    </h5>

                    <p class="social-text">
                        Temukan konten informatif dan menarik
                        dari Solagri.
                    </p>

                    <!-- <a href="#" target="_blank" class="social-link">
                Kunjungi TikTok
                <i class="bi bi-arrow-up-right"></i>
              </a> -->

                </div>

            </div>
            <!-- Threads -->
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="social-card threads-card">
                    <div class="social-icon">
                        <i class="bi bi-at"></i>
                    </div>
                    <span class="social-platform">
                        Threads
                    </span>
                    <h5 class="social-username">
                        @solagriconsultant
                    </h5>

                    <p class="social-text">
                        Ikuti percakapan dan informasi terbaru
                        bersama Solagri.
                    </p>

                    <!-- <a href="#" target="_blank" class="social-link">
                Kunjungi Threads
                <i class="bi bi-arrow-up-right"></i>
              </a> -->
                </div>
            </div>

            <!-- YouTube -->
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                <div class="social-card youtube-card">
                    <div class="social-icon">
                        <i class="bi bi-youtube"></i>
                    </div>
                    <span class="social-platform">
                        YouTube
                    </span>
                    <h5 class="social-username">
                        Solagri TV
                    </h5>
                    <p class="social-text">
                        Saksikan video, informasi, dan aktivitas
                        Solagri di Solagri TV.
                    </p>
                    <!-- <a href="#" target="_blank" class="social-link">
                Kunjungi YouTube
                <i class="bi bi-arrow-up-right"></i>
              </a> -->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('js')
@endpush