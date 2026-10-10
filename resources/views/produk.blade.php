@extends('layout.main')
@push('css')
<style>
    .product-card {
        background: #fff;
        border-radius: 15px;
        border: 1px solid #f0f0f0;
        transition: all 0.3s ease;
        height: 100%;
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

    .product-card {
        border: 1px solid #e0e0e0;
        border-radius: 12px;
        transition: all 0.3s ease;
        background: #fff;
        cursor: pointer;
        height: 100%;
    }

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        border-color: #007bff;
    }

    .product-title {
        font-weight: 600;
        margin-top: 15px;
    }
</style>
@endpush
@section('content')
<!-- Page Title -->
<div class="page-title dark-background" data-aos="fade"
    style="background-image: url({{ asset('assets/img/bgg.png') }});">
    <div class="container position-relative">
        <h1>Produk</h1>
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
    <div class="container mb-4">
        <div class="input-group">
            <span class="input-group-text"><i class="bi bi-search"></i></span>
            <input type="text" id="searchInput" class="form-control" placeholder="Cari varietas produk...">
        </div>
    </div>

    <section id="produk-layanan" class="produk-layanan section py-5">
        <div class="container">
            <div class="row g-4" id="productGrid">
            </div>
            <div class="text-center mt-4">
                <button id="loadMore" class="btn btn-primary">Muat Lebih Banyak</button>
            </div>
        </div>
    </section>

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
        "id": 1,
        "nama": "Bibit Kelapa Sawit",
        "perusahaan": "CV Solusi Agribisnis",
        "varietas": "DxP PPKS 540",
        "stok": 2500,
        "harga": 45000,
        "lokasi": "Medan, Sumatera Utara",
        "minimal_order": 100,
        "img": "./assets/img/bibit/bibit.jpg",
        "created_at": "2026-08-11T07:58:13.000000Z",
        "updated_at": "2026-08-13T06:30:49.000000Z"
      },
      {
        "id": 3,
        "nama": "aaabbb11122",
        "perusahaan": "111222",
        "varietas": "111122",
        "stok": 111122,
        "harga": 1111122,
        "lokasi": "lokasii111222",
        "minimal_order": 111122,
        "img": "",
        "created_at": "2026-08-12T10:11:20.000000Z",
        "updated_at": "2026-08-16T06:30:13.000000Z"
      },
      {
        "id": 4,
        "nama": "aaa",
        "perusahaan": "asd",
        "varietas": "asd dsadas sadsadsa sadsadsa asdsadsa asdsadsa sadsadsa",
        "stok": 223,
        "harga": 22232,
        "lokasi": "asdds",
        "minimal_order": 2134,
        "img": "",
        "created_at": "2026-08-16T06:29:55.000000Z",
        "updated_at": "2026-08-16T06:29:55.000000Z"
      },
      {
        "id": 6,
        "nama": "aaabbb11122332",
        "perusahaan": "1112223",
        "varietas": "1111223",
        "stok": 1111223,
        "harga": 11111223,
        "lokasi": "wq",
        "minimal_order": 1111223,
        "img": "",
        "created_at": "2026-08-16T06:36:16.000000Z",
        "updated_at": "2026-08-16T06:36:16.000000Z"
      },
      {
        "id": 7,
        "nama": "aaabbb11122332",
        "perusahaan": "1112223",
        "varietas": "1111223",
        "stok": 1111223,
        "harga": 11111223,
        "lokasi": "wq",
        "minimal_order": 1111223,
        "img": "",
        "created_at": "2026-08-16T06:36:16.000000Z",
        "updated_at": "2026-08-16T06:36:16.000000Z"
      }
    ];

    let displayedCount = 4;
    const grid = document.getElementById('productGrid');

    function renderProducts(filter = "") {
      grid.innerHTML = "";
      const filtered = products.filter(p => p.nama.toLowerCase().includes(filter.toLowerCase()));

      filtered.slice(0, displayedCount).forEach(p => {
        grid.innerHTML += `
      <div class="col-lg-3 col-md-6">
        <div class="product-card text-center p-3" onclick="showModal(${p.id})">
          <img src="${p.img ? '/' + p.img : '{{ asset("assets/img/bibit/produk.jpg") }}'}" class="img-fluid mb-3 w-100" style="height: 200px; object-fit: cover; border-radius: 12px;" />
          <h6 class="product-title">${p.nama}</h6>
        </div>
      </div>
    `;
      });
    }

    function showModal(id) {
      const p = products.find(item => item.id === id);

      document.getElementById('modalTitle').innerText = 'Bibit ';

      const customDesc = `
        <div class="mb-3 text-center w-25 mx-auto">
            <img src="${p.img ? '/' + p.img : '{{ asset("assets/img/bibit/produk.jpg") }}'}" class="img-fluid" style="max-width: 100%; height: auto; border-radius: 12px;" />
            <br>
            <h5 class="mt-2">${p.nama}</h5>
        </div>
        
        <table class="table table-borderless table-sm mb-0">
            <tbody>
            <tr>
                <td style="width: 20%; padding-left: 0;"><b>Perusahaan</b></td>
                <td style="width: 5%;">:</td>
                <td>${p.perusahaan}</td>
            </tr>
            <tr>
                <td style="padding-left: 0;"><b>Varietas</b></td>
                <td>:</td>
                <td>${p.varietas}</td>
            </tr>
            <tr>
                <td style="padding-left: 0;"><b>Harga</b></td>
                <td>:</td>
                <td>${p.harga}</td>
            </tr>
            <tr>
                <td style="padding-left: 0;"><b>Stok</b></td>
                <td>:</td>
                <td>${p.stok}</td>
            </tr>
            <tr>
                <td style="padding-left: 0;"><b>Lokasi</b></td>
                <td>:</td>
                <td>${p.lokasi}</td>
            </tr>
            <tr>
                <td style="padding-left: 0;"><b>Minimal Order</b></td>
                <td>:</td>
                <td>${p.minimal_order}</td>
            </tr>
            </tbody>
        </table>

        <div class="row mt-3">
            <h5 class="text-dark">Cara Pemesanan</h5>
            <p class="text-dark">Ketik: nama_alamat pengiriman_jumlah kebutuhan_jenis varietas yang dipilih_waktu pengiriman</p>
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