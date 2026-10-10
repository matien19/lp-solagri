@extends('layout_admin.main')
@section('content')
<div class="row g-2 mb-4">
    <div class="col-auto">
        <h2 class="mb-0">Data Berita</h2>
    </div>
</div>
<div id="beritas" data-list='{"valueNames":["judul","deskripsi"],"page":10,"pagination":true}'>
    <div class="mb-4">
        <div class="row g-3">
            <div class="col-auto">
                <!-- Arahkan ke halaman Create (bukan modal) -->
                <a href="{{ route('admin.berita.create') }}" class="btn btn-primary btn-sm btn-tambah">
                    <span class="fas fa-plus me-2"></span> Tambah Data
                </a>
            </div>
            <div class="col-auto">
                <div class="search-box">
                    <form class="position-relative">
                        <!-- Ubah placeholder pencarian -->
                        <input class="form-control search-input search" type="search" placeholder="Cari data berita..."
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
                            data-sort="judul">JUDUL</th>
                        <th class="sort align-middle ps-4" scope="col" data-sort="deskripsi" style="width:400px;">
                            DESKRIPSI</th>
                        <th class="sort align-middle text-end ps-3" scope="col" style="width:100px;">AKSI</th>
                    </tr>
                </thead>
                <tbody class="list" id="beritas-table-body">
                    @foreach($data as $item)
                    <tr class="position-static">

                        <!-- Gambar Cover -->
                        <td class="align-middle white-space-nowrap">
                            <span class="border border-translucent rounded-3 p-1 d-inline-block">
                                <img src="{{ $item->img ? asset($item->img) : asset('assets/img/default-berita.jpg') }}"
                                    alt="{{ $item->judul }}" width="100" class="img-fluid"
                                    style="object-fit: cover; max-height: 80px;" />
                            </span>
                        </td>

                        <!-- Judul Berita -->
                        <td class="judul align-middle ps-4">
                            <p class="fw-bold line-clamp-2 mb-0 text-body-emphasis">
                                {{ $item->judul }}
                            </p>
                        </td>

                        <!-- Deskripsi Berita (Teks Singkat) -->
                        <td class="deskripsi align-middle ps-4 text-body-secondary">
                            <p class="line-clamp-3 mb-0">
                                <!-- Gunakan html_entity_decode untuk mengubah &nbsp; dkk menjadi teks biasa -->
                                {{ \Illuminate\Support\Str::limit(html_entity_decode(strip_tags($item->deskripsi)), 80)
                                }}
                            </p>
                        </td>

                        <!-- Aksi -->
                        <td class="align-middle white-space-nowrap text-end pe-0">
                            <div class="d-flex align-items-center justify-content-end">

                                <a href="{{ route('admin.berita.edit', $item->id) }}"
                                    class="btn btn-sm btn-icon btn-secondary me-2" title="Edit">
                                    <span class="fas fa-edit"></span>
                                </a>

                                <button class="btn btn-sm btn-icon btn-secondary" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Hapus"
                                    onclick="confirmDelete('{{ route('admin.berita.delete', $item->id) }}')">
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
    });
</script>
@endpush