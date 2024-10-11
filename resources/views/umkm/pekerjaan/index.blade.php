@extends('layouts.umkm.app')

@section('title', 'Project')

@section('content')
<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Daftar Pekerjaan</h5>
                    <a href="{{ route('umkm.pekerjaan.create') }}" class="btn btn-success">
                        <i class="fas fa-plus"></i> Tambah Data
                    </a>
                </div>

                <div class="card-body">
                    <table id="pekerjaanTable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                {{-- <th>ID</th> --}}
                                <th>Posisi</th>
                                <th>Deskripsi</th>
                                <th>Tanggal</th>
                                <th>Tempat Bekerja</th>
                                <th>Kategori</th>
                                <th>Aksi</th> <!-- Action Column -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pekerjaan as $data)
                            <tr>
                                {{-- <td>{{ $data->id }}</td> --}}
                                <td>{{ $data->posisi }}</td>
                                <td>{{ $data->deskripsi }}</td>
                                <td>{{ $data->tanggal }}</td>
                                <td>{{ $data->tempat_bekerja }}</td>
                                <td>{{ $data->kategori }}</td>
                                <td>
                                    <!-- Action buttons -->
                                    <a href="{{ route('umkm.pekerjaan.show', $data->id) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i> Detail
                                    </a>
                                    <a href="{{ route('umkm.pekerjaan.edit', $data->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('umkm.pekerjaan.destroy', $data->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah anda yakin ingin menghapus pekerjaan ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function() {
        $('#pekerjaanTable').DataTable();
    });
</script>
@endsection
