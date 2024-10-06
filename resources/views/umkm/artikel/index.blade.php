@extends('layouts.umkm.app')

@section('title', 'Artikel')

@section('content')
<section class="section dashboard">
    <div class="container">
        <div class="row mb-3">
            <div class="col-md-12">
                <a href="{{ route('umkm.artikel.create') }}" class="btn btn-primary">Tambah Artikel</a>
            </div>
        </div>
        <div class="row">
            @foreach($artikel as $article)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="{{ $article->gambar }}" class="card-img-top" alt="Gambar {{ $article->judul }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $article->judul }}</h5>
                        <p class="card-text">{{ Str::limit($article->deskripsi, 100) }}</p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Published on {{ $article->tanggal }}</small>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
