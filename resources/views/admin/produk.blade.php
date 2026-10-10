@extends('layout_admin.main')
@section('content')
<div class="row g-2 mb-4">
    <div class="col-auto">
        <h2 class="mb-0">Data Bibit</h2>
    </div>
</div>
<div id="products"
    data-list='{"valueNames":["product","perusahaan","price","varietas","stok","min_order"],"page":10,"pagination":true}'>
    <div class="mb-4">
        <div class="row g-3">
            <div class="col-auto">
                <!-- Tombol Tambah memanggil modal -->
                <button class="btn btn-primary btn-sm btn-tambah" data-bs-toggle="modal" data-bs-target="#modalForm">
                    <span class="fas fa-plus me-2"></span> Tambah Data
                </button>
            </div>
            <div class="col-auto">
                <div class="search-box">
                    <form class="position-relative">
                        <input class="form-control search-input search" type="search" placeholder="Cari data bibit..."
                            aria-label="Search" />
                        <span class="fas fa-search search-box-icon"></span>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div
        class="mx-n4 px-4 mx-lg-n6 px-lg-6 bg-body-emphasis border-top border-bottom border-translucent position-relative top-1">
        <div class="table-responsive scrollbar mx-n1 px-1">
            <table class="table fs-9 mb-0">
                <thead>
                    <tr>
                        <th class="sort white-space-nowrap align-middle fs-10" scope="col" style="width:100px;"></th>
                        <th class="sort white-space-nowrap align-middle ps-4" scope="col" style="width:250px;"
                            data-sort="product">NAMA PRODUK</th>
                        <th class="sort align-middle ps-4" scope="col" data-sort="perusahaan" style="width:200px;">
                            PERUSAHAAN</th>
                        <th class="sort align-middle text-end ps-4" scope="col" data-sort="price" style="width:120px;">
                            HARGA</th>
                        <th class="sort align-middle ps-4" scope="col" data-sort="varietas" style="width:200px;">
                            VARIETAS</th>
                        <th class="sort align-middle ps-3" scope="col" data-sort="stok" style="width:100px;">STOK</th>
                        <th class="sort align-middle ps-3" scope="col" data-sort="min_order" style="width:120px;">MIN
                            ORDER</th>
                        <th class="sort align-middle ps-3" scope="col" style="width:100px;">AKSI</th>
                    </tr>
                </thead>
                <tbody class="list" id="products-table-body">
                    @foreach($data as $item)
                    <tr class="position-static">

                        <!-- Gambar -->
                        <td class="align-middle white-space-nowrap">
                            <span class="border border-translucent rounded-3 p-1 d-inline-block">
                                <img src="{{ $item->img ? asset($item->img) : asset('assets/img/bibit/produk.jpg') }}"
                                    alt="{{ $item->nama }}" width="100" class="img-fluid"
                                    style="object-fit: cover; max-height: 80px;" />
                            </span>
                        </td>

                        <!-- Nama Produk (Update dari name ke nama) -->
                        <td class="product align-middle ps-4">
                            <p class="fw-bold line-clamp-3 mb-0 text-body-emphasis">
                                {{ $item->nama }}
                            </p>
                        </td>

                        <!-- Perusahaan -->
                        <td class="perusahaan align-middle ps-4 text-body-secondary">
                            {{ $item->perusahaan }}
                        </td>

                        <!-- Harga -->
                        <td class="price align-middle white-space-nowrap text-end fw-bold text-body-tertiary ps-4">
                            Rp {{ number_format($item->harga, 0, ',', '.') }}
                        </td>

                        <!-- Varietas -->
                        <td class="varietas align-middle text-body-quaternary fs-9 ps-4 fw-semibold"
                            style="max-width: 250px; white-space: normal;">
                            {{ $item->varietas }}
                        </td>

                        <!-- Stok -->
                        <td class="stok align-middle review pb-2 ps-3">
                            {{ $item->stok }}
                        </td>

                        <!-- Minimal Order -->
                        <td class="min_order align-middle review pb-2 ps-3">
                            {{ $item->minimal_order }}
                        </td>

                        <!-- Aksi -->
                        <td class="align-middle white-space-nowrap pe-0">
                            <div class="d-flex align-items-center justify-content-between">
                                <!-- Tombol Edit dengan atribut data terbaru -->
                                <button class="btn btn-sm btn-icon btn-secondary me-2 btn-edit" title="Edit"
                                    data-bs-toggle="modal" data-bs-target="#modalForm" data-id="{{ $item->id }}"
                                    data-nama="{{ $item->nama }}" data-perusahaan="{{ $item->perusahaan }}"
                                    data-harga="{{ $item->harga }}" data-varietas="{{ $item->varietas }}"
                                    data-stok="{{ $item->stok }}" data-min_order="{{ $item->minimal_order }}"
                                    data-lokasi="{{ $item->lokasi }}">
                                    <span class="fas fa-edit"></span>
                                </button>

                                <!-- Tombol Hapus -->
                                <button class="btn btn-sm btn-icon btn-secondary" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Delete"
                                    onclick="confirmDelete('{{ route('admin.produk.delete', $item->id) }}')">
                                    <span class="fas fa-trash-alt"></span>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="row align-items-center justify-content-between py-2 pe-0 fs-9">
            <div class="col-auto d-flex">
                <p class="mb-0 d-none d-sm-block me-3 fw-semibold text-body" data-list-info="data-list-info"></p>
                <a class="fw-semibold" href="#!" data-list-view="*">View all<span class="fas fa-angle-right ms-1"
                        data-fa-transform="down-1"></span></a>
                <a class="fw-semibold d-none" href="#!" data-list-view="less">View Less<span
                        class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
            </div>
            <div class="col-auto d-flex">
                <button class="page-link" data-list-pagination="prev"><span class="fas fa-chevron-left"></span></button>
                <ul class="mb-0 pagination"></ul>
                <button class="page-link pe-0" data-list-pagination="next"><span
                        class="fas fa-chevron-right"></span></button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Form -->
<div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="modalFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalFormLabel">Tambah Data Bibit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formBibit" method="POST" enctype="multipart/form-data">
                @csrf
                <div id="methodContainer"></div>

                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Nama Produk</label>
                            <input type="text" class="form-control" name="nama" id="inputNama" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Perusahaan</label>
                            <input type="text" class="form-control" name="perusahaan" id="inputPerusahaan">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Varietas</label>
                            <input type="text" class="form-control" name="varietas" id="inputVarietas">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Harga (Rp)</label>
                            <input type="number" class="form-control" name="harga" id="inputHarga" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Stok</label>
                            <input type="number" class="form-control" name="stok" id="inputStok">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Minimal Order</label>
                            <input type="number" class="form-control" name="minimal_order" id="inputMinOrder">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Lokasi</label>
                            <textarea class="form-control" name="lokasi" id="inputLokasi" rows="2"></textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Gambar Produk <small class="text-danger">(maksimal 2mb untuk file gambar)</small></label>
                            <input type="file" class="form-control" name="img" accept="image/*">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        if (typeof autoShowSessionAlert === "function") {
            autoShowSessionAlert({
                success: "{{ session('success') }}",
                error: "{{ session('error') }}",
                warning: "{{ session('warning') }}",
                info: "{{ session('info') }}"
            });
        }
    });

    const modalForm = document.getElementById('modalForm');
    
    modalForm.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget; 
        const form = document.getElementById('formBibit');
        const modalTitle = document.getElementById('modalFormLabel');
        const methodContainer = document.getElementById('methodContainer');
        
        if (button.classList.contains('btn-edit')) {
            modalTitle.textContent = 'Edit Data Bibit';
            
            let id = button.getAttribute('data-id');
            form.action = `/admin/produk/${id}`; 
            
            methodContainer.innerHTML = '<input type="hidden" name="_method" value="PUT">';
            
            document.getElementById('inputNama').value = button.getAttribute('data-nama');
            document.getElementById('inputPerusahaan').value = button.getAttribute('data-perusahaan');
            document.getElementById('inputVarietas').value = button.getAttribute('data-varietas');
            document.getElementById('inputHarga').value = button.getAttribute('data-harga');
            document.getElementById('inputStok').value = button.getAttribute('data-stok');
            document.getElementById('inputMinOrder').value = button.getAttribute('data-min_order');
            document.getElementById('inputLokasi').value = button.getAttribute('data-lokasi');
            
        } else {
            modalTitle.textContent = 'Tambah Data Produk';
            form.action = `{{ route('admin.produk.store') }}`; 
            methodContainer.innerHTML = ''; 
            form.reset(); 
        }
    });
</script>
@endpush