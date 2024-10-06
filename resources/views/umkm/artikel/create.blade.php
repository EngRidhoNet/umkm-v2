@extends('layouts.umkm.app')

@section('title', 'Create Article')

@section('content')
<section class="section create-article">
    <div class="container-fluid p-5"> <!-- Menggunakan container-fluid untuk layar penuh dan padding 5 -->
        <div class="row justify-content-center">
            <div class="col-lg-10"> <!-- Memperbesar col agar lebih lebar pada layar penuh -->
                <div class="card shadow-lg rounded-lg overflow-hidden"> <!-- Menambahkan shadow-lg dan rounded-lg -->
                    <div class="card-header bg-primary text-white text-center py-3">
                        <h3>Create New Article</h3>
                    </div>
                    <div class="card-body p-4"> <!-- Menambahkan padding untuk ruang di dalam card -->
                        <form action="{{ route('umkm.artikel.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-4">
                                <label for="judul" class="form-label">Title</label>
                                <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul') }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="deskripsi" class="form-label">Description</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5" required>{{ old('deskripsi') }}</textarea>
                            </div>
                            <div class="mb-4">
                                <label for="gambar" class="form-label">Image</label>
                                <input type="file" class="form-control" id="gambar" name="gambar" required>
                            </div>
                            <div class="mb-4">
                                <label for="tanggal" class="form-label">Publish Date</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ old('tanggal') }}" required>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary px-5">Create</button> <!-- Button dengan padding lebih -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- <!-- CKEditor 5 -->
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
<script>
    // Inisialisasi CKEditor 5 pada textarea dengan id 'deskripsi'
    ClassicEditor
        .create( document.querySelector( '#deskripsi' ) )
        .catch( error => {
            console.error( error );
        } );
</script> --}}
@endsection
