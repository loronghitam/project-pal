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

    <!--================Single Product Area =================-->
    <div class="product_image_area">
        <div class="container">
            <div class="row s_product_inner">
                <div class="col-lg-6">
                    <div class="">
                        <div class="single-prd-item">
                            <img class="img-fluid" src="{{url('images/program/'. $program->image)}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="s_product_text">
                        <h3>{{ $program->title }}</h3>
                        @php
                            $end = Carbon::parse($program->end_program)->diffForHumans(Carbon::now(),
                            ['syntax' => CarbonInterface::DIFF_RELATIVE_TO_NOW, 'parts' => 3]);
                        @endphp
                        <h6>{{ $end }}</h6>
                        <ul class="list">
                            <div class="price">
                                <h3>Terkumpul : Rp. {{ number_format($program->collected) }}</h3>
                                <div class="percentage mb-2">
                                    <div class="progress">
                                        <div class="progress-bar color-1" role="progressbar"
                                             style="width: {{ floor($program->collected / $program->funding * 100)}}%"
                                             aria-valuenow="0" aria-valuemin="0"
                                             aria-valuemax="100">{{ floor($program->collected / $program->funding * 100)}}
                                            %
                                        </div>
                                    </div>
                                </div>
                                <h3>Target : Rp. {{ number_format($program->funding) }}</h3>
                            </div>
                        </ul>
                        <p>{!! $program->body !!}</p>
                        @if($program->status == 'Aktif')
                            <div class="card_area d-flex align-items-center">
                                <a class="primary-btn text-white" onclick="create()">Donasi</a>
                            </div>
                        @else
                            <div class="card_area d-flex align-items-center">
                                <a class="primary-btn">Donasi Berkahir</a>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--================End Single Product Area =================-->

    <!--================Product Description Area =================-->
    <section class="product_description_area">
        <div class="container">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                       aria-controls="home" aria-selected="true">Description</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                       aria-controls="contact"
                       aria-selected="false">Donasi Terakhir</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <p>{!! $program->body !!}</p>
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="comment_list">
                                @foreach($user as $data)
                                    <div class="review_item">
                                        <div class="media">
                                            <div class="media-body">
                                                <h4>{{$data->name}}</h4>
                                                <h5>{{ Carbon::parse($data->created_at) }}</h5>
                                                <a class="reply_btn">Rp. {{ $data->amount }}</a>
                                            </div>
                                        </div>
                                        <p>Terima kasih telah berdonasi</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Product Description Area =================-->
    @include('Page.components.modaldetails')

@endsection

@push('script')
    @include('Page.components.scriptdetails')
    @include('Page.components.dropify')
@endpush
