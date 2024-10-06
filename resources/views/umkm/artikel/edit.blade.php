@extends('layouts.umkm.app')

@section('title', 'Edit Article')

@section('content')
<section class="section edit-article">
    <div class="container">
        <h1>Edit Article</h1>
        <form action="{{ route('articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="judul" class="form-label">Title</label>
                <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul', $article->judul) }}" required>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Description</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5" required>{{ old('deskripsi', $article->deskripsi) }}</textarea>
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Image</label>
                <input type="file" class="form-control" id="gambar" name="gambar">
                <img src="{{ $article->gambar }}" alt="Current image" class="img-fluid mt-2" width="200">
            </div>
            <div class="mb-3">
                <label for="tanggal" class="form-label">Publish Date</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ old('tanggal', $article->tanggal) }}" required>
            </div>
            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
</section>
@endsection
