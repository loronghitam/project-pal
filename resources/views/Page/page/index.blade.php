@php
    use Carbon\Carbon;
    use Carbon\CarbonInterface;
@endphp

@extends('Page.layout.app')

@push('title')
    <title>Little Ambulance</title>
@endpush

@section('content')
    <!-- start banner Area -->
    <section class="banner-area">
        <div class="container">
            <div class="row fullscreen align-items-center justify-content-start">
                <div class="col-lg-12">
                    <div class="active-banner-slider owl-carousel section_gap" id="satu">
                        <!-- single-slide -->
                        @foreach($main as $data)
                            <div class="row single-slide align-items-center d-flex animate__zoomInUp">
                                <div class="col-lg-6 col-md-6">
                                    <div class="banner-content">
                                        <h1>{{ $data->title }}</h1>
                                        <p>{!! $data->body !!}</p>
                                        <div class="add-bag d-flex align-items-center">
                                            <a class="add-btn" onclick="create()"><span
                                                    class="lnr lnr-cross"></span></a>
                                            <span class="add-text text-uppercase">Donate</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <div class="banner-img">
                                        <img class="img-fluid" src="{{asset ('images/program/'. $data->image)}}" alt="">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->

    <!-- start features Area -->
    <section class="features-area section_gap">
        <div class="container">
            <div class="row features-inner">
                <!-- single features -->
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="single-features">
                        <div class="f-icon">
                            <img src="{{asset('assets/landingpage/img/features/f-icon1.png')}}" alt="">
                        </div>
                        <h6>Ambulance Gratis</h6>
                    </div>
                </div>
                <!-- single features -->
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="single-features">
                        <div class="f-icon">
                            <img src="{{asset('assets/landingpage/img/features/f-icon2.png')}}" alt="">
                        </div>
                        <h6>Tabung Oksigen Gratis</h6>
                    </div>
                </div>
                <!-- single features -->
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="single-features">
                        <div class="f-icon">
                            <img src="{{asset('assets/landingpage/img/features/f-icon3.png')}}" alt="">
                        </div>
                        <h6>24/7 Support</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end features Area -->

    <!-- start product Area -->
    <div class="col-lg-12">
        <section class="active-product-area owl-carousel owl-theme owl-loaded section_gap" id="dua">
            <!-- single product slide -->
            <div class="single-product-slider">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 text-center">
                            <div class="section-title">
                                <h1>Program</h1>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et
                                    dolore
                                    magna aliqua.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- single product -->
                        @foreach($program as $data)
                            <div class="col-lg-4 col-md-6">
                                <div class="single-product">
                                    <a href="{{url('/program/'. $data->slug)}}">
                                        <img class="img-fluid" src="{{('images/program/'. $data->image)}}" alt="">
                                    </a>

                                    <div class="product-details">
                                        <a href="{{url('/program/'. $data->slug)}}">
                                            <h5>{{ $data->title }}</h5>
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
                </div>
            </div>
            <!-- single product slide -->
            <div class="single-product-slider">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 text-center">
                            <div class="section-title">
                                <h1>Berita</h1>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et
                                    dolore
                                    magna aliqua.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($berita as $data)
                            <!-- single product -->
                            <div class="col-lg-3 col-md-6">
                                <div class="single-product">
                                    <a href="{{url('berita/'. $data->slug)}}">
                                        <img class="img-fluid" src="{{ asset('images/berita/'. $data->image) }}" alt="">
                                    </a>
                                    <div class="product-details">
                                        <a href="{{url('berita/'. $data->slug)}}">
                                            <h6>{{ $data->title }}</h6>
                                        </a>
                                        <div class="price">
                                            <h6>$150.00</h6>
                                            <h6 class="l-through">$210.00</h6>
                                        </div>
                                        <div class="prd-bottom">
                                            <a href="{{url('berita/'. $data->slug)}}" class="social-info">
                                                <span class="lnr lnr-move"></span>
                                                <p class="hover-text">view more</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- end product Area -->
    @include('Page.components.modal')
@endsection

@push('script')
    @include('Page.components.scriptdetails')
    @include('Page.components.dropify')
    <script>
        var owl = $('#satu');
        owl.owlCarousel({
            items: 1,
            margin: 10,
            loop: true,
            autoplay: true,
            autoplayTimeout: 15000,
        });
        $('.play').on('click', function () {
            owl.trigger('play.owl.autoplay', [1000])
        })
        $('.stop').on('click', function () {
            owl.trigger('stop.owl.autoplay')
        })

        var owl2 = $('#dua');
        owl2.owlCarousel({
            items: 1,
            center: true,
        });

    </script>
@endpush

