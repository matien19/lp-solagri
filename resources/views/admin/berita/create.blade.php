<!-- Cek apakah ini proses Edit atau Tambah -->
@php
$isEdit = isset($berita);
$title = $isEdit ? 'Edit Data Berita' : 'Tambah Data Berita';
$actionUrl = $isEdit ? route('admin.berita.update', $berita->id) : route('admin.berita.store');
@endphp

@extends('layout_admin.main')
@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">{{ $title }}</h5>
    </div>
    <div class="card-body">

        <form action="{{ $actionUrl }}" method="POST" enctype="multipart/form-data">
            @csrf

            @if($isEdit)
            @method('PUT')
            @endif

            <div class="row g-3">
                <!-- Field Judul -->
                <div class="col-12">
                    <label class="form-label">Judul Berita</label>
                    <input type="text" class="form-control" name="judul"
                        value="{{ old('judul', $berita->judul ?? '') }}" required>
                </div>

                <!-- Field Gambar -->
                <div class="col-12">
                    <label class="form-label">Gambar
                    </label>
                    <small class="text-danger">(maksimal 2mb untuk file gambar)</small>
                    <input type="file" class="form-control mb-2" name="img" accept="image/*" {{ !$isEdit ? 'required'
                        : '' }}>

                    @if($isEdit && $berita->img)
                    <img src="{{ asset($berita->img) }}" alt="Preview" width="200" class="img-thumbnail rounded">
                    @endif
                </div>

                <!-- Field Deskripsi dengan CKEditor -->
                <div class="col-12">
                    <label class="form-label">Isi Berita</label>
                    <textarea name="deskripsi" id="editor"
                        rows="10">{{ old('deskripsi', $berita->deskripsi ?? '') }}</textarea>
                </div>
            </div>

            <div class="mt-4 text-end">
                <a href="{{ route('admin.berita') }}" class="btn btn-secondary me-2">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan Berita</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<!-- Panggil CDN CKEditor 5 -->
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        ClassicEditor
            .create(document.querySelector('#editor'), {
                toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', '|', 'undo', 'redo' ]
            })
            .catch(error => {
                console.error(error);
            });
    });
</script>
@endpush