@extends('Admin.Layout.app')

@push('style')
    @include('Admin.Components.style.datatables')
@endpush

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card mb-4">
            <div class="card-body">
                <form action="{{ url('/export') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-md-4">
                            <label for="firstName" class="form-label">Tanggal Awal</label>
                            <input
                                class="form-control"
                                type="date"
                                id="username"
                                name="awal"
                                autofocus
                            />
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="lastName" class="form-label">Name</label>
                            <input class="form-control" type="date" name="akhir" id="name"/>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="exampleFormControlSelect2" class="form-label">Category</label>
                            <select
                                multiple
                                class="form-select"
                                id="exampleFormControlSelect2"
                                aria-label="Multiple select example"
                                name="category[]"
                            >
                                <option selected>Semua</option>
                                @foreach($program as $data)
                                    <option value="{{ $data->title }}">{{ $data->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-3 text-center">
                            <button type="submit" class="btn btn-primary">Export</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection

