@extends('layouts.header')

@section('content')
<div class="container py-5" >
    <h1 class="mb-4">Project Berdasarkan Kategori</h1>

    <div class="row">
        @foreach($categories as $category)
            <div class="col-md-4 mb-4">
                <div class="card h-100" style="border-radius: 15px; padding: 20px;">
                    <div class="card-header text-white" style="background: linear-gradient(to right, #0DBDE5, #2DB08B); border-radius: 15px; padding: 20px;">
                        <h5 class="mb-0">{{ $category }}</h5>
                    </div>
                    <div class="card-body">
                        @if($projects->has($category))
                            <ul class="list-group list-group-flush">
                                @foreach($projects[$category] as $project)
                                    <li class="list-group-item">
                                        <h6>{{ $project->posisi }}</h6>
                                        <p class="mb-1">{{ $project->tempat_bekerja }}</p>
                                        <a href="{{ route('mahasiswa.pekerjaan.show', $project->id) }}" class="btn btn-primary btn-sm">View Details</a>
                                        {{-- <a href="" class="btn btn-primary btn-sm">View Details</a> --}}
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p>No projects in this category.</p>
                        @endif
                    </div>
                    {{-- <div class="card-footer text-center">
                        <a href="#" class="btn btn-secondary btn-sm">See All in {{ $category }}</a> --}}
                        {{-- <a href="{{ route('projects.category', $category) }}" class="btn btn-secondary btn-sm">See All in {{ $category }}</a> --}}
                    {{-- </div> --}}
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
