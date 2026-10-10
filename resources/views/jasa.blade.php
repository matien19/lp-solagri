@extends('layout.main')
@push('css')
<style>
    .product-card {
        background: #fff;
        border-radius: 15px;
        border: 1px solid #f0f0f0;
        transition: all 0.3s ease;
        height: 100%;
        cursor: pointer;
    }

    .product-card:hover {
        border-color: var(--accent-color);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
        transform: translateY(-5px);
    }

    .product-card img {
        width: 120px;
        transition: transform 0.4s ease;
    }

    .product-card:hover img {
        transform: scale(1.1);
    }

    .product-title {
        color: var(--heading-color);
        font-weight: 600;
        margin-top: 10px;
    }

    .btn-outline-success {
        border: 2px solid var(--accent-color);
        color: var(--accent-color);
        padding: 8px 20px;
        border-radius: 50px;
        transition: 0.3s;
    }

    .btn-outline-success:hover {
        background-color: var(--accent-color);
        color: white;
    }

    /* Styling untuk Menu Navigasi Bundling / Kategori */
    .service-nav-tabs .nav-link {
        color: var(--heading-color);
        font-weight: 600;
        border: 2px solid #e0e0e0;
        border-radius: 50px;
        padding: 10px 25px;
        transition: all 0.3s ease;
        background: #fff;
    }

    .service-nav-tabs .nav-link.active {
        background-color: var(--accent-color);
        color: white;
        border-color: var(--accent-color);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .badge-category {
        position: absolute;
        top: 15px;
        right: 15px;
        z-index: 2;
        font-size: 0.75rem;
        padding: 5px 10px;
        border-radius: 20px;
    }
</style>
@endpush
@section('content')
<div class="page-title dark-background" data-aos="fade"
    style="background-image: url({{ asset('assets/img/bgg.png') }});">
    <div class="container position-relative">
        <h1>Jasa</h1>
        <nav class="breadcrumbs">
            <ol>
                <li><a href="index.html">Home</a></li>
                <li class="current">Jasa</li>
            </ol>
        </nav>
    </div>
</div><!-- End Page Title -->

<!-- Layanan Produk Section -->
<section id="produk-layanan" class="produk-layanan section py-5">

    <!-- Kategori / Menu Bundling & Reguler -->
    <div class="container mb-4">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <ul class="nav nav-pills service-nav-tabs justify-content-center gap-3" id="serviceCategoryTab"
                    role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="btn-bundling" type="button"
                            onclick="switchCategory('bundling')">
                            <i class="bi bi-box-seam me-2"></i>Paket Bundling
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="btn-reguler" type="button" onclick="switchCategory('reguler')">
                            <i class="bi bi-list-check me-2"></i>Jasa Reguler
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Search Bar -->
    <div class="container mb-4">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="input-group shadow-sm">
                    <span class="input-group-text bg-white border-end-0"><i class="bi bi-search"></i></span>
                    <input type="text" id="searchInput" class="form-control border-start-0"
                        placeholder="Cari layanan atau paket bundling...">
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row g-4" id="productGrid">
        </div>
        <div class="text-center mt-4">
            <button id="loadMore" class="btn btn-primary px-4 py-2 rounded-pill">Muat Lebih Banyak</button>
        </div>
    </div>

    <div class="modal fade" id="productModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" id="modalBody"></div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('js')
<script>
    const products = [
      {
        "id": 101,
        "nama": "Paket Bundling Legalitas Usaha & Perizinan Berusaha (OSS & NIB)",
        "desk": "Paket hemat komprehensif untuk mendirikan badan usaha secara legal, mencakup pembuatan akun OSS dan penerbitan Nomor Induk Berusaha (NIB) secara cepat dan resmi.",
        "img": "./assets/img/logo_layanan/bundling.png",
        "list_layanan": "Pembuatan Akun OSS, Penerbitan NIB Resmi, Pendampingan Klasifikasi KBLI, Konsultasi Legalitas Awal",
        "kategori": "bundling",
        "created_at": "2026-08-20T10:00:00.000000Z",
        "updated_at": "2026-08-20T10:00:00.000000Z"
      },
      {
        "id": 102,
        "nama": "Paket Bundling Standarisasi Produk & Sertifikasi Mutu (Halal & BPOM)",
        "desk": "Paket khusus bagi pelaku usaha makanan, minuman, dan obat-obatan untuk mendapatkan sertifikasi halal sekaligus izin edar resmi dari BPOM.",
        "img": "",
        "list_layanan": "Pengajuan & Pendampingan Sertifikat Halal, Uji Laboratorium Produk, Pengurusan Izin Edar BPOM, Verifikasi Bahan Baku",
        "kategori": "bundling",
        "created_at": "2026-08-20T11:00:00.000000Z",
        "updated_at": "2026-08-20T11:00:00.000000Z"
      },
      {
        "id": 103,
        "nama": "Paket Bundling Pengadaan Pemerintah & Ekspor (E-Catalog, TKDN & Ekspor)",
        "desk": "Solusi lengkap bagi perusahaan yang ingin memperluas jangkauan pasar ke sektor pengadaan barang dan jasa pemerintah (LKPP/LPSE) serta pasar internasional.",
        "img": "",
        "list_layanan": "Pendaftaran & Optimalisasi E-Catalog LKPP/LPSE, Pengukuran & Sertifikasi TKDN, Pengurusan Dokumen Kepabeanan & Ekspor Impor",
        "kategori": "bundling",
        "created_at": "2026-08-20T12:00:00.000000Z",
        "updated_at": "2026-08-20T12:00:00.000000Z"
      },

      {
        "id": 1,
        "nama": "Layanan Pendampingan Perizinan Pupuk",
        "desk": "Mendampingi proses pengurusan dan kelengkapan perizinan edar serta legalitas produk pupuk secara resmi.",
        "img": "./assets/img/logo_layanan/izin_pupuk.jpg",
        "list_layanan": "Pengurusan izin edar, Legalitas produk pupuk, Pendampingan dokumen",
        "kategori": "reguler",
        "created_at": "2026-08-12T12:07:07.000000Z",
        "updated_at": "2026-08-15T05:22:14.000000Z"
      },
      {
        "id": 2,
        "nama": "Layanan Pendampingan Sertifikasi Halal",
        "desk": "Bimbingan lengkap proses pengajuan hingga terbitnya sertifikat halal untuk produk usaha Anda.",
        "img": "",
        "list_layanan": "Pengajuan sertifikat halal, Pendampingan bahan & proses, Verifikasi halal",
        "kategori": "reguler",
        "created_at": "2026-08-12T12:07:07.000000Z",
        "updated_at": "2026-08-15T05:22:14.000000Z"
      },
      {
        "id": 3,
        "nama": "Layanan Pendampingan Sertifikasi SNI",
        "desk": "Memastikan produk memenuhi Standar Nasional Indonesia melalui proses pendampingan yang terarah.",
        "img": "",
        "list_layanan": "Pengujian standar produk, Standarisasi SNI, Pendampingan uji lab",
        "kategori": "reguler",
        "created_at": "2026-08-15T05:23:22.000000Z",
        "updated_at": "2026-08-15T05:23:22.000000Z"
      },
      {
        "id": 4,
        "nama": "Layanan Pendampingan Sistem OSS",
        "desk": "Solusi mudah perizinan berusaha dan integrasi sistem Online Single Submission (OSS).",
        "img": "",
        "list_layanan": "Integrasi sistem OSS, Perizinan berusaha, Konsultasi sistem",
        "kategori": "reguler",
        "created_at": "2026-08-15T05:39:11.000000Z",
        "updated_at": "2026-08-16T06:19:15.000000Z"
      },
      {
        "id": 5,
        "nama": "Layanan Pendampingan Penerbitan NIB",
        "desk": "Pengurusan cepat Nomor Induk Berusaha (NIB) sebagai identitas resmi legalitas operasional perusahaan.",
        "img": "",
        "list_layanan": "Penerbitan NIB, Legalitas operasional perusahaan, Pendaftaran akun OSS",
        "kategori": "reguler",
        "created_at": "2026-08-16T05:43:23.000000Z",
        "updated_at": "2026-08-16T05:43:23.000000Z"
      },
      {
        "id": 6,
        "nama": "Layanan Pendampingan Sertifikasi TKDN",
        "desk": "Pengukuran dan pengurusan Tingkat Komponen Dalam Negeri guna mendukung pengadaan barang dan jasa.",
        "img": "",
        "list_layanan": "Pengukuran TKDN, Sertifikasi komponen dalam negeri, Pengadaan barang dan jasa",
        "kategori": "reguler",
        "created_at": "2026-08-16T05:54:21.000000Z",
        "updated_at": "2026-08-16T06:16:24.000000Z"
      },
      {
        "id": 7,
        "nama": "Layanan Pendampingan Pendaftaran Merek & HKI",
        "desk": "Perlindungan aset intelektual dan pendaftaran hak kekayaan intelektual (HKI) untuk merek usaha.",
        "img": "",
        "list_layanan": "Pendaftaran merek, Hak Kekayaan Intelektual (HKI), Perlindungan aset",
        "kategori": "reguler",
        "created_at": "2026-08-16T05:54:21.000000Z",
        "updated_at": "2026-08-16T06:16:24.000000Z"
      },
      {
        "id": 8,
        "nama": "Pendampingan E-Catalog",
        "desk": "Pengelolaan, pendaftaran, dan optimalisasi produk agar tayang serta bersaing di LKPP / LPSE.",
        "img": "",
        "list_layanan": "Pendaftaran e-catalog, Optimalisasi produk LKPP, LPSE",
        "kategori": "reguler",
        "created_at": "2026-08-16T05:54:21.000000Z",
        "updated_at": "2026-08-16T06:16:24.000000Z"
      },
      {
        "id": 9,
        "nama": "Pendampingan Legalitas Mutu Produk",
        "desk": "Standarisasi kualitas produk serta fasilitasi pengujian laboratorium secara komprehensif.",
        "img": "",
        "list_layanan": "Standarisasi kualitas, Pengujian laboratorium, Jaminan mutu",
        "kategori": "reguler",
        "created_at": "2026-08-16T05:54:21.000000Z",
        "updated_at": "2026-08-16T06:16:24.000000Z"
      },
      {
        "id": 10,
        "nama": "Pendampingan Ekspor Impor",
        "desk": "Pengurusan dokumen kepabeanan, koordinasi dengan Kemendag, hingga perizinan karantina.",
        "img": "",
        "list_layanan": "Dokumen kepabeanan, Koordinasi Kemendag, Perizinan karantina",
        "kategori": "reguler",
        "created_at": "2026-08-16T05:54:21.000000Z",
        "updated_at": "2026-08-16T06:16:24.000000Z"
      },
      {
        "id": 11,
        "nama": "Pendampingan Sertifikat ISO 9001",
        "desk": "Penerapan Sistem Manajemen Mutu berstandar internasional untuk meningkatkan kredibilitas bisnis.",
        "img": "",
        "list_layanan": "Sistem Manajemen Mutu, ISO 9001, Kredibilitas bisnis",
        "kategori": "reguler",
        "created_at": "2026-08-16T05:54:21.000000Z",
        "updated_at": "2026-08-16T06:16:24.000000Z"
      },
      {
        "id": 12,
        "nama": "Pendampingan Izin Edar BPOM",
        "desk": "Mendampingi proses pengujian hingga terbitnya izin edar Badan Pengawas Obat dan Makanan.",
        "img": "",
        "list_layanan": "Pengujian produk, Izin edar BPOM, Registrasi pangan/obat",
        "kategori": "reguler",
        "created_at": "2026-08-16T05:54:21.000000Z",
        "updated_at": "2026-08-16T06:16:24.000000Z"
      }
    ];

    let currentCategory = 'bundling';
    let displayedCount = 4;
    const grid = document.getElementById('productGrid');

    function switchCategory(category) {
      currentCategory = category;
      displayedCount = 4; // Reset hitungan load more saat pindah kategori

      // Update styling tombol tab
      document.getElementById('btn-bundling').classList.toggle('active', category === 'bundling');
      document.getElementById('btn-reguler').classList.toggle('active', category === 'reguler');

      renderProducts(document.getElementById('searchInput').value);
    }

    function renderProducts(filter = "") {
      grid.innerHTML = "";

      // Filter berdasarkan kategori yang aktif dan kata kunci pencarian
      const filtered = products.filter(p =>
        p.kategori === currentCategory &&
        p.nama.toLowerCase().includes(filter.toLowerCase())
      );

      const itemsToDisplay = filtered.slice(0, displayedCount);

      if (itemsToDisplay.length === 0) {
        grid.innerHTML = `
          <div class="col-12 text-center py-5">
            <p class="text-muted">Tidak ada data layanan atau paket yang ditemukan.</p>
          </div>
        `;
        document.getElementById('loadMore').style.display = 'none';
        return;
      }

      itemsToDisplay.forEach(p => {
        const badgeClass = p.kategori === 'bundling' ? 'bg-success text-white' : 'bg-secondary text-white';
        const badgeText = p.kategori === 'bundling' ? 'Bundling' : 'Reguler';

        grid.innerHTML += `
        <div class="col-lg-3 col-md-6">
            <div class="product-card text-center p-3 position-relative" onclick="showModal(${p.id})">
              <span class="badge badge-category ${badgeClass}">${badgeText}</span>
              <img src="${p.img ? '/' + p.img : '{{ asset("assets/img/bibit/produk.jpg") }}'}" class="img-fluid mb-3 w-100" style="height: 200px; object-fit: cover; border-radius: 12px;" />
              <h6 class="product-title">${p.nama}</h6>
            </div>
        </div>
        `;
      });

      // Sembunyikan atau tampilkan tombol "Muat Lebih Banyak"
      if (displayedCount >= filtered.length) {
        document.getElementById('loadMore').style.display = 'none';
      } else {
        document.getElementById('loadMore').style.display = 'block';
      }
    }

    function showModal(id) {
      const p = products.find(item => item.id === id);

      document.getElementById('modalTitle').innerText = p.kategori === 'bundling' ? 'Detail Paket Bundling' : 'Jasa / Layanan Reguler';

      const customDesc = `
        <div class="mb-3 text-center w-50 mx-auto">
            <img src="${p.img ? '/' + p.img : '{{ asset("assets/img/bibit/produk.jpg") }}'}" class="img-fluid" style="max-width: 100%; height: auto; border-radius: 12px;" />
            <br>
            <h5 class="mt-2">${p.nama}</h5>
            <span class="badge ${p.kategori === 'bundling' ? 'bg-success' : 'bg-secondary'} px-3 py-1 mt-1 text-uppercase">${p.kategori}</span>
        </div>
        <div class="row mt-3">
            <p class="text-dark">${p.desk}</p>
        </div>
        <div class="row mt-3">
            <h6 class="text-dark">Rincian Paket & Layanan :</h6>
            <ol class="ms-3 text-dark">
                ${p.list_layanan
          ? p.list_layanan.split(',').map(layanan => `<li class="mb-1">${layanan.trim()}</li>`).join('')
          : '<li><i>Tidak ada rincian layanan</i></li>'
        }
            </ol>
        </div>
        <div class="row mt-3">
            <p class="text-dark">Untuk informasi lebih lanjut dapat klik tombol di bawah ini:</p>
            <div class="col-12">
                <a href="https://wa.me/6281231900339" target="_blank" class="btn btn-success"><i class="bi bi-whatsapp"></i> Hubungi via WhatsApp</a>
            </div>
        </div>
        `.trim();

      document.getElementById('modalBody').innerHTML = customDesc;
      new bootstrap.Modal(document.getElementById('productModal')).show();
    }

    document.getElementById('searchInput').addEventListener('input', (e) => renderProducts(e.target.value));

    document.getElementById('loadMore').addEventListener('click', () => {
      displayedCount += 4;
      renderProducts(document.getElementById('searchInput').value);
    });

    renderProducts();
</script>
@endpush