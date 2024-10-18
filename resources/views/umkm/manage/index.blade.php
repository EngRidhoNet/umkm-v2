@extends('layouts.umkm.app')

@section('title', 'Manage Project UMKM')

@section('content')
    <section class="section dashboard">
        <div class="container">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Manage Project UMKM</h5>
                    <table id="applyTable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Posisi</th>
                                <th>Nama</th>
                                {{-- <th>Deskripsi Diri</th>
                                <th>Jurusan</th>
                                <th>Pengalaman Organisasi</th>
                                <th>Pengalaman Kerja</th> --}}
                                <th>Status</th>
                                <th>Tanggal Apply</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($applies as $apply)
                                <tr>
                                    <td>{{ $apply->user->name ?? 'N/A' }}</td>
                                    <td>{{ $apply->project->posisi ?? 'N/A' }}</td>
                                    <td>{{ $apply->nama ?? 'N/A' }}</td>
                                    {{-- <td>{{ $apply->deskripsi_diri ?? 'N/A' }}</td>
                                    <td>{{ $apply->jurusan ?? 'N/A' }}</td>
                                    <td>{{ $apply->pengalaman_organisasi ?? 'N/A' }}</td>
                                    <td>{{ $apply->pengalaman_kerja ?? 'N/A' }}</td> --}}
                                    <td>
                                        <select class="form-select"
                                            onchange="updateStatus({{ $apply->id }}, this.value)">
                                            <option value="pending" {{ $apply->status == 'pending' ? 'selected' : '' }}>
                                                Pending</option>
                                            <option value="accepted" {{ $apply->status == 'accepted' ? 'selected' : '' }}>
                                                Accepted</option>
                                            <option value="rejected" {{ $apply->status == 'rejected' ? 'selected' : '' }}>
                                                Rejected</option>
                                            <option value="active" {{ $apply->status == 'active' ? 'selected' : '' }}>
                                                Active</option>
                                            <option value="completed"
                                                {{ $apply->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                        </select>
                                    </td>
                                    <td>{{ $apply->created_at->format('d M Y') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <script>
        function updateStatus(applyId, newStatus) {
            $.ajax({
                url: "{{ route('apply.updateStatus') }}", // Define your route
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}", // CSRF token for security
                    id: applyId,
                    status: newStatus
                },
                success: function(response) {
                    // Optionally show a success message or update the UI
                    var successAlert = '<div class="alert alert-success alert-dismissible fade show" role="alert">' +
                        'Status updated successfully!' +
                        '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
                        '</div>';
                    $('.container').prepend(successAlert);
                },
                error: function(xhr) {
                    // Handle errors
                    var errorAlert = '<div class="alert alert-danger alert-dismissible fade show" role="alert">' +
                        'Error updating status: ' + xhr.responseText +
                        '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
                        '</div>';
                    $('.container').prepend(errorAlert);
                }
            });
        }
    </script>
    <script>
        $(document).ready(function() {
            var table = $('#applyTable').DataTable({
                responsive: true,
                language: {
                    search: "Cari:",
                    lengthMenu: "Tampilkan _MENU_ entri",
                    info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                    infoEmpty: "Menampilkan 0 sampai 0 dari 0 entri",
                    infoFiltered: "(disaring dari _MAX_ total entri)",
                    paginate: {
                        first: "Pertama",
                        last: "Terakhir",
                        next: "Selanjutnya",
                        previous: "Sebelumnya"
                    },
                }
            });
        });
    </script>
@endsection
