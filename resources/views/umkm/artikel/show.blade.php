@extends('layouts.umkm.app')

@section('title', 'View Article')

@section('content')
<section class="section view-article">
    <div class="container">
        <h1>{{ $article->judul }}</h1>
        <img src="{{ $article->gambar }}" alt="Image of {{ $article->judul }}" class="img-fluid mb-3">
        <p>{{ $article->deskripsi }}</p>
        <p><strong>Published on:</strong> {{ $article->tanggal }}</p>
        <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-warning">Edit</a>
        <form action="{{ route('articles.destroy', $article->id) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
</section>
@endsection
