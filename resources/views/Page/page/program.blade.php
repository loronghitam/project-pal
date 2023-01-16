@php
    use Carbon\Carbon;
    use Carbon\CarbonInterface;
@endphp

@extends('Page.layout.app')

@push('title')
    <title>Little Ambulance | Program</title>
@endpush

@section('content')

    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Donasi Online</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->
    <div class="container section_gap">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <!-- Start Best Seller -->
                <section class="lattest-product-area pb-40 category-list">
                    <div class="row">
                        @foreach($program as $data)
                            <!-- single product -->
                            <div class="col-lg-4 col-md-6">
                                <div class="single-product">
                                    <a href="{{url('/program/'. $data->slug)}}">
                                        <img class="img-fluid" src="{{ asset('images/program/'.$data->image) }}" alt="">
                                    </a>
                                    <div class="product-details">
                                        <a href="{{url('/program/'. $data->slug)}}">
                                            <h6 id="title">{{$data->title}}</h6>
                                        </a>
                                        @php
                                            $end = Carbon::parse($data->end_program)->diffForHumans(Carbon::now(),
                                            ['syntax' => CarbonInterface::DIFF_RELATIVE_TO_NOW, 'parts' => 3]);
                                        @endphp
                                        <p>{{ $end }}</p>
                                        <div class="price">
                                            <h6>Terkumpul : Rp. {{ number_format($data->collected) }}</h6>
                                            <div class="percentage">
                                                <div class="progress">
                                                    <div class="progress-bar color-1" role="progressbar"
                                                         style="width: {{ floor($data->collected / $data->funding * 100)}}%"
                                                         aria-valuenow="0" aria-valuemin="0"
                                                         aria-valuemax="100">{{ floor($data->collected / $data->funding * 100)}}
                                                        %
                                                    </div>
                                                </div>
                                            </div>
                                            <h6>Target : Rp. {{ number_format($data->funding) }}</h6>
                                        </div>
                                        <div class="prd-bottom">
                                            @if($data->status == 'Aktif')
                                                <a class="social-info" onclick="create()">
                                                    <span class="lnr lnr-heart"></span>
                                                    <p class="hover-text">Donasi</p>
                                                </a>
                                            @else
                                                <a class="social-info">
                                                    <p class="hover-text">Close</p>
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section>
                <!-- End Best Seller -->
                <!-- Start Filter Bar -->
                <div class="align-items-center">
                    {{ $program->links() }}
                </div>
                <!-- End Filter Bar -->
            </div>
        </div>
    </div>
    @include('Page.components.modal')
@endsection

@push('script')
    @include('Page.components.script')
    @include('Page.components.dropify')
@endpush
