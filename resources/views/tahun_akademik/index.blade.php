@extends('layouts.app')
@section('title', 'Tahun Akademik')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">@yield('title')</div>

                <div class="card-body">



                    <a href="/tahunakademik/create" class="btn btn-success">Buat Data Baru</a>
                    <hr>

                    @include('alert')

                    <table class="table table-bordered" id="users-table">
                        <thead>
                            <tr>
                                <th width="160">Kode Tahun Akademik</th>
                                <th>Nama Tahun Akademik</th>
                                <th>Status</th>
                                <th width="53">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@push('scripts')
<script>
$(function() {
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/tahunakademik/json',
        columns: [
            { data: 'kode_tahun_akademik', name: 'kode_tahun_akademik' },
            { data: 'nama_tahun_akademik', name: 'nama_tahun_akademik' },
            { data: 'status', name: 'status' },
            { data: 'action', nama: 'action' }
        ]
    });
});
</script>
@endpush
