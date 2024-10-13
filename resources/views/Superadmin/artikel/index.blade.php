@extends('layouts.admin.app')

@section('title', 'Artikel')
@section('content')
<section class="section dashboard">
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-12">
                <a href="{{ route('superadmin.artikel.create') }}" class="btn btn-primary">Tambah Artikel</a>
            </div>
        </div>
        <div class="row">
            @foreach($artikel as $article)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ Storage::url($article->foto) }}" class="card-img-top" alt="Gambar {{ $article->judul }}" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ route('superadmin.artikel.show', $article->id) }}" class="text-decoration-none text-dark">{{ Str::limit($article->judul, 50) }}</a>
                        </h5>
                        <p class="card-text">{{$article->isi}}</p>
                    </div>
                    <div class="card-footer bg-white">
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">{{ $article->tanggal }}</small>
                            <div>
                                <a href="{{ route('superadmin.artikel.edit', $article->id) }}" class="btn btn-outline-primary btn-sm me-2">Edit</a>
                                <form action="{{ route('superadmin.artikel.destroy', $article->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Yakin ingin menghapus artikel ini?')">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<style>
    .card {
        transition: transform 0.2s;
    }
    .card:hover {
        transform: translateY(-5px);
    }
    .card-title a:hover {
        color: #007bff !important;
    }
</style>
@endsection
