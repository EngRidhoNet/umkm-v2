@extends('layouts.header')

@section('content')
    <div class="container py-5">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card" style="border-radius: 15px;">
                    <div class="card-header text-white"
                        style="background: linear-gradient(to right, #0DBDE5, #2DB08B); border-radius: 15px;">
                        <h3 class="mb-0">{{ $project->posisi }}</h3>
                    </div>

                    <div class="card-body">
                        <p><strong>Tempat Bekerja: </strong>{{ $project->tempat_bekerja }}</p>
                        {{-- <p><strong>Lokasi: </strong>{{ $project->lokasi }}</p> --}}
                        <p><strong>Deskripsi: </strong>{{ $project->deskripsi }}</p>
                        <p><strong>Kategori: </strong>{{ $project->kategori }}</p>
                        {{-- <p><strong>Tanggal: </strong>{{ $project->formatted_tanggal }}</p> --}}
                        <p><strong>Posted by: </strong>{{ $project->user->name }}</p>
                        <a href="{{ route('mahasiswa.pekerjaan') }}" class="btn btn-secondary">Back to Projects</a>
                        <!-- Apply Button -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#applyModal">Apply</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Apply Modal -->
    <div class="modal fade" id="applyModal" tabindex="-1" aria-labelledby="applyModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="applyModalLabel">Apply for {{ $project->posisi }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('apply.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="dokumen" class="form-label">Upload Dokumen (CV, etc.)</label>
                            <input type="file" class="form-control" id="dokumen" name="dokumen" required>
                        </div>
                        <input type="hidden" name="id_user" value="{{ auth()->user()->id }}">
                        <input type="hidden" name="id_project" value="{{ $project->id }}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit Application</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var applyButton = document.querySelector('[data-bs-target="#applyModal"]');
            var applyModal = new bootstrap.Modal(document.getElementById('applyModal'));

            applyButton.addEventListener('click', function() {
                applyModal.show();
            });
        });
    </script>
@endsection
