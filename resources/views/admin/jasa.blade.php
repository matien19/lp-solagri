@extends('layout_admin.main')
@section('content')
<div class="row g-2 mb-4">
    <div class="col-auto">
        <h2 class="mb-0">Data Jasa</h2>
    </div>
</div>
<div id="jasas" data-list='{"valueNames":["nama","desk","list_layanan"],"page":10,"pagination":true}'>
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
                        <input class="form-control search-input search" type="search" placeholder="Cari data jasa..."
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
                        <th class="sort white-space-nowrap align-middle fs-10" scope="col" style="width:70px;"></th>
                        <th class="sort white-space-nowrap align-middle ps-4" scope="col" style="width:250px;"
                            data-sort="nama">NAMA JASA</th>
                        <th class="sort align-middle ps-4" scope="col" data-sort="desk" style="width:300px;">
                            DESKRIPSI</th>
                        <th class="sort align-middle ps-4" scope="col" data-sort="list_layanan" style="width:250px;">
                            DAFTAR LAYANAN</th>
                        <th class="sort align-middle text-end ps-3" scope="col" style="width:100px;">AKSI</th>
                    </tr>
                </thead>
                <tbody class="list" id="jasas-table-body">
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

                        <!-- Nama Jasa -->
                        <td class="nama align-middle ps-4">
                            <p class="fw-bold line-clamp-2 mb-0 text-body-emphasis">
                                {{ $item->nama }}
                            </p>
                        </td>

                        <!-- Deskripsi -->
                        <td class="desk align-middle ps-4 text-body-secondary">
                            <!-- Menggunakan Str::limit agar deskripsi panjang tidak merusak tampilan tabel -->
                            <p class="line-clamp-3 mb-0">
                                {{ \Illuminate\Support\Str::limit($item->desk, 80) }}
                            </p>
                        </td>

                        <!-- Daftar Layanan -->
                        <td class="list_layanan align-middle ps-4 text-body-secondary">
                            <ol class="mb-0 ps-3">
                                @foreach(explode(',', $item->list_layanan) as $layanan)
                                    <li class="line-clamp-1">{{ trim($layanan) }}</li>
                                @endforeach
                            </ol>
                        </td>

                        <!-- Aksi -->
                        <td class="align-middle white-space-nowrap text-end pe-0">
                            <div class="d-flex align-items-center justify-content-end">
                                <!-- Tombol Edit dengan atribut data terbaru -->
                                <button class="btn btn-sm btn-icon btn-secondary me-2 btn-edit" title="Edit"
                                    data-bs-toggle="modal" data-bs-target="#modalForm" data-id="{{ $item->id }}"
                                    data-nama="{{ $item->nama }}" data-desk="{{ $item->desk }}"
                                    data-list_layanan="{{ $item->list_layanan }}">
                                    <span class="fas fa-edit"></span>
                                </button>

                                <!-- Tombol Hapus (Pastikan route-nya disesuaikan ke route delete jasa Anda) -->
                                <button class="btn btn-sm btn-icon btn-secondary" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Delete"
                                    onclick="confirmDelete('{{ route('admin.jasa.delete', $item->id) }}')">
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
                <h5 class="modal-title" id="modalFormLabel">Tambah Data Jasa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formJasa" method="POST" enctype="multipart/form-data">
                @csrf
                <div id="methodContainer"></div>

                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label">Nama Jasa</label>
                            <input type="text" class="form-control" name="nama" id="inputNama" required>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Deskripsi</label>
                            <textarea class="form-control" name="desk" id="inputDesk" rows="4" required></textarea>
                        </div>

                        <div class="col-12">
                            <label class="form-label" for="inputListLayanan">Daftar Layanan</label>
                            <input class="form-control" type="text" name="list_layanan" id="inputListLayanan" required>
                            <small class="text-muted" style="display: block; margin-top: -0.5rem;">Ketik nama layanan lalu tekan <b>Enter</b> untuk menambahkan.</small>
                        </div>

                        <div class="col-12">
                            <label class="form-label">note :<small class="text-danger">(maksimal 2mb untuk file gambar)</small></label>
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
<script src="{{ asset('template/vendors/choices/choices.min.js') }}"></script>
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

        const layananElement = document.getElementById('inputListLayanan');
        const choicesInstance = new Choices(layananElement, {
            removeItemButton: true,
            delimiter: ',',          // Memisahkan item saat user mengetik koma
            editItems: true,         // (Opsional) User bisa mengedit tag dengan backspace
            maxItemCount: -1,        // Tidak ada batasan jumlah tag
            placeholder: true,
            placeholderValue: 'Pilih atau ketik layanan...',
        });
        const modalForm = document.getElementById('modalForm');
    
        modalForm.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget; 
            const form = document.getElementById('formJasa');
            const modalTitle = document.getElementById('modalFormLabel');
            const methodContainer = document.getElementById('methodContainer');
            
            form.reset();
            
            choicesInstance.removeActiveItems(); 
            
            if (button.classList.contains('btn-edit')) {
                modalTitle.textContent = 'Edit Data Jasa';
                
                let id = button.getAttribute('data-id');
                form.action = `/admin/jasa/${id}`; 
                methodContainer.innerHTML = '<input type="hidden" name="_method" value="PUT">';
                
                document.getElementById('inputNama').value = button.getAttribute('data-nama');
                document.getElementById('inputDesk').value = button.getAttribute('data-desk');
                
                let listLayanan = button.getAttribute('data-list_layanan');
                
                if (listLayanan) {
                    let arrayLayanan = listLayanan.split(',').map(item => item.trim()).filter(item => item !== "");
                    
                    choicesInstance.setValue(arrayLayanan);
                }
                
            } else {
                modalTitle.textContent = 'Tambah Data Jasa';
                form.action = `{{ route('admin.jasa.store') }}`; 
                methodContainer.innerHTML = ''; 
            }
        });
    });
</script>
@endpush