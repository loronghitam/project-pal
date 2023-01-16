@php use Illuminate\Support\Str; @endphp
@extends('Admin.Layout.app')

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title text-primary">Selamat
                                    datang {{ Str::title(auth()->user()->name) }}</h5>
                                <p class="mb-4">
                                    Semoga lelah menjadi lillah
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-5 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                                <img
                                    src="{{asset('assets/admin/assets/img/illustrations/man-with-laptop-light.png')}}"
                                    height="140"
                                    alt="View Badge User"
                                    data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                    data-app-light-img="illustrations/man-with-laptop-light.png"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 order-1 text-center">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <span class="fw-semibold d-block mb-1">Total Berita</span>
                                <h3 class="card-title mb-2">{{$news}}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <span class="fw-semibold d-block mb-1">Total Program Aktif</span>
                                <h3 class="card-title text-nowrap mb-1">{{ $programsON }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <span class=" fw-semibold d-block mb-1">Total Program Berakhir</span>
                                <h3 class="card-title text-nowrap mb-2">{{ $programsOFF }}</h3>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <!-- Transactions -->
            <div class="col-md-12 col-lg-12 order-2 mb-4">
                <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <a class="nav-link display-6" href="#">Transaski Terbaru </a>
                    </div>
                    <div class="card-body">
                        <ul class="p-0 m-0">
                            @foreach($donate as $data)
                                <li class="d-flex mb-4 pb-1">
                                    <div
                                        class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                        <div class="me-2">
                                            <small class="text-muted d-block mb-1">{{$data->name}}</small>
                                            <h6 class="mb-0">{{$data->title}}</h6>
                                        </div>
                                        <div class="user-progress d-flex align-items-center gap-1">
                                            <span class="text-muted">Rp. </span>
                                            <h6 class="mb-0">{{ number_format($data->amount) }}</h6>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <!--/ Transactions -->
        </div>
    </div>
@endsection
