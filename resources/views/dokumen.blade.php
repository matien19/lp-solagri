@extends('layout.main')
@push('css')
@endpush
@section('content')
<!-- Page Title -->
<div class="page-title dark-background" data-aos="fade"
    style="background-image: url(https://images.unsplash.com/photo-1620200423727-8127f75d7f53?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D);">
    <div class="container position-relative">
        <h1>Dokumen Perusahaan</h1>
        <nav class="breadcrumbs">
            <ol>
                <li><a href="index.html">Home</a></li>
                <li class="current">Dokumen Perusahaan</li>
            </ol>
        </nav>
    </div>
</div><!-- End Page Title -->
<section id="documents" class="documents section py-5">
    <div class="container">

        <div class="section-title text-center mb-5" data-aos="fade-up">
            <h2>Dokumen Perusahaan</h2>
            <p> berkas profil dan dokumen resmi kami di sini.</p>
        </div>

        <div class="row gy-4" id="dokumen-container">

        </div>
    </div>
</section>

@endsection
@push('js')
<script>
    const dataDokumen = [
      {
        title: "SK Kemenkumham",
        image: "./assets/img/dokumen/sk.png",
        link: "./assets/img/dokumen/sk.png",
        delay: 100
      },
      {
        title: "Akta Notaris",
        image: "./assets/img/dokumen/notaris.png",
        link: "./assets/img/dokumen/notaris.png",
        delay: 200
      },
      {
        title: "NIB Perusahaan",
        image: "./assets/img/dokumen/sertifikat_standar.png",
        link: "./assets/img/dokumen/sertifikat_standar.png",
        delay: 300
      },
      {
        title: "NPWP",
        image: "./assets/img/dokumen/npwp.png",
        link: "./assets/img/dokumen/npwp.png",
        delay: 400
      }
    ];

    const container = document.getElementById('dokumen-container');

    container.innerHTML = dataDokumen.map(item => `
  <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="${item.delay}">
    <!-- Tambahkan d-flex flex-column h-100 agar tinggi card rata -->
    <div class="text-center d-flex flex-column h-100 p-3 border rounded shadow-sm">
      
      <!-- Wrapper gambar agar tinggi area gambar konsisten (misal: 220px) -->
      <div class="mb-3 d-flex align-items-center justify-content-center" style="height: 220px;">
        <img src="${item.image}" alt="${item.title}" class="img-fluid" style="max-height: 200px; object-fit: contain;">
      </div>

      <h4 class="mt-2 fs-5">${item.title}</h4>
      
      <!-- mt-auto akan memaksa tombol turun ke posisi paling bawah secara sejajar -->
      <a href="${item.link}" target="_blank" class="btn btn-outline-success btn-sm w-100 mt-auto">Preview</a>
      
    </div>
  </div>
`).join('');
</script>

@endpush