@extends('Admin.Layout.app')

@push('style')
    @include('Admin.Components.style.datatables')
@endpush

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Basic Tables</h4>
        <div class="card">
            <div class="table-responsive text-nowrap">
                <table class="table table-hover table-sm p-1" id="table">
                    <thead class="table-light">
                    <tr>
                        <th width="5%">No</th>
                        <th>Daftar</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Nama Program</th>
                        <th width="20%">Status</th>
                        <th width="10%">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>

    @include('Admin.Components.Modal.Admin.UserJoin.edit')
@endsection

@push('script')
    @include($script)
    @include('Admin.Components.script.datatables')
    @include('Admin.Components.script.dropify')
@endpush
