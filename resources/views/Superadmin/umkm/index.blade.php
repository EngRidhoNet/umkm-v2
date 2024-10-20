@extends('layouts.admin.app')

@section('title', 'UMKM')

@section('content')
<section class="section dashboard">
    <div class="row">
        <!-- Left side columns -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data UMKM</h4>
                    <a href="{{ route('superadmin.umkm.create') }}" class="btn btn-primary float-right">Tambah UMKM</a>
                </div>
                <div class="card-body">
                    <table id="umkmTable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama UMKM</th>
                                <th>Kategori UMKM</th>
                                {{-- <th>Foto Profil</th>
                                <th>Foto Sampul</th> --}}
                                <th>Deskripsi</th>
                                {{-- <th>Kategori</th> --}}
                                <th>Provinsi</th>
                                <th>Kota</th>
                                <th>Kecamatan</th>
                                <th>Kode Pos</th>
                                <th>Alamat</th>
                                {{-- <th>Informasi Pemilik</th>
                                <th>Informasi Bisnis</th> --}}
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($umkm as $umkm)
                            <tr>
                                <td>{{ $umkm->id }}</td>
                                <td>{{ $umkm->nama_umkm }}</td>
                                <td>{{ $umkm->kategori }}</td>
                                {{-- <td>
                                    <img src="{{ asset('storage/app/public/umkm/foto_profil/' . $umkm->foto_profil) }}" alt="Foto Profil" width="50" height="50">
                                </td>
                                <td>
                                    <img src="{{ asset('storage/' . $umkm->foto_sampul) }}" alt="Foto Sampul" width="100" height="50">
                                </td> --}}
                                <td>{{ $umkm->deskripsi }}</td>
                                <td>{{ $umkm->provinsi }}</td>
                                <td>{{ $umkm->kota }}</td>
                                <td>{{ $umkm->kecamatan }}</td>
                                <td>{{ $umkm->kode_pos }}</td>
                                <td>{{ $umkm->alamat }}</td>
                                {{-- <td>{{ $umkm->informasi_pemilik }}</td>
                                <td>{{ $umkm->informasi_bisnis }}</td> --}}
                                <td>
                                    <a href="{{ route('superadmin.umkm.show', $umkm->id) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href=" {{ route('superadmin.umkm.edit', $umkm->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('superadmin.umkm.destroy', $umkm->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                            <i class="fas fa-trash"></i>
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
    $('#umkmTable').DataTable();
});
</script>
@endsection
