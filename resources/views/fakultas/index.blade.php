@extends('layouts.app')
@section('title', 'fakultas')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">@yield('title')</div>

                <div class="card-body">



                    <a href="/fakultas/create" class="btn btn-success">Buat Data Baru</a>
                    <hr>

                    @include('alert')

                    <table class="table table-bordered" id="users-table">
                        <thead>
                            <tr>
                                <th width="70">Kode Fakultas</th>
                                <th>Nama Fakultas</th>
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
        ajax: '/fakultas/json',
        columns: [
            { data: 'kode_fakultas', name: 'kode_fakultas' },
            { data: 'nama_fakultas', name: 'nama_fakultas' },
            { data: 'action', nama: 'action' }
        ]
    });
});
</script>
@endpush
