@extends('layout_admin.main')
@section('content')
<!-- Sesuaikan dengan nama layout admin Anda -->
<div class="pb-5">

    <!-- Header Dashboard -->
    <div class="row g-4 mb-4">
        <div class="col-12">
            <h2 class="mb-2">Dashboard Utama</h2>
            <h5 class="text-body-tertiary fw-semibold">
                Selamat datang kembali, Admin! Berikut adalah ringkasan sistem Anda hari ini.
            </h5>
        </div>
    </div>

    <!-- Statistik Cards -->
    <div class="row g-4 mb-4">
        <div class="col-sm-6 col-md-4">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body d-flex align-items-center">
                    <div class="bg-primary bg-opacity-10 p-3 rounded-3 me-3">
                        <i class="fas fa-newspaper text-primary fs-3"></i>
                    </div>
                    <div>
                        <h6 class="text-body-secondary mb-1">Total Berita</h6>
                        <h2 class="mb-0 fw-bold">{{ $total_berita ?? 0 }}</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-4">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body d-flex align-items-center">
                    <div class="bg-warning bg-opacity-10 p-3 rounded-3 me-3">
                        <i class="fas fa-list text-warning fs-3"></i>
                    </div>
                    <div>
                        <h6 class="text-body-secondary mb-1">Total Layanan / Jasa</h6>
                        <h2 class="mb-0 fw-bold">{{ $total_jasa ?? 0 }}</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-4">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body d-flex align-items-center">
                    <div class="bg-success bg-opacity-10 p-3 rounded-3 me-3">
                        <i class="fas fa-seedling text-success fs-3"></i>
                    </div>
                    <div>
                        <h6 class="text-body-secondary mb-1">Total Bibit</h6>
                        <h2 class="mb-0 fw-bold">{{ $total_bibit ?? 0 }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">

        <!-- Kolom Kanan: Berita Terbaru -->
        <div class="col-12 col-xl-12">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-white border-bottom py-3 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Berita Terbaru Terbit</h5>
                    <a href="{{ route('admin.berita') }}" class="btn btn-sm btn-link">Lihat Semua</a>
                </div>
                <div class="card-body p-0">
                    <div class="list-group list-group-flush">

                        @if(isset($berita_terbaru) && $berita_terbaru->count() > 0)
                        @foreach($berita_terbaru as $berita)
                        <div class="list-group-item d-flex align-items-center py-3">
                            <img src="{{ $berita->img ? asset($berita->img) : asset('assets/img/default-berita.jpg') }}"
                                alt="" class="rounded" style="width: 50px; height: 50px; object-fit: cover;">
                            <div class="ms-3 overflow-hidden">
                                <h6 class="mb-1 text-truncate">{{ $berita->judul }}</h6>
                                <small class="text-muted"><i class="far fa-clock me-1"></i> {{
                                    $berita->created_at->diffForHumans() }}</small>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <div class="list-group-item text-center py-4 text-muted">
                            Belum ada data berita.
                        </div>
                        @endif

                    </div>
                </div>
            </div>
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
</script>
@endpush