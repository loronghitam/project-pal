@extends('Page.layout.app')

@push('title')
    <title>Little Ambulance | Bergabung</title>
@endpush

@section('content')
    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Bergabung</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!-- Start related-product Area -->
    <section class="related-product-area section_gap">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="section-title">
                        <h1>Jadi volunteer</h1>
                        <p>Tambah orang tambah kebahagiaan</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        @foreach($bergabung as $data)
                            <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                                <div class="single-related-product d-flex">
                                    <a href="#" onclick="details( {{$data->id}})"><img
                                            src="{{asset('images/joinus/'. $data->image)}}" width="70px" alt=""></a>
                                    <div class="desc">
                                        <a href="#" class="title"
                                           onclick="details({{$data->id}})">{{ $data->title }}</a>
                                        <div class="price">
                                            <p>{!! $data->body !!}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <div class="align-content-center">
                        {{ $bergabung->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End related-product Area -->
    @include('Page.components.Joinus.modaldetails')
    @include('Page.components.Joinus.modaljoin')
@endsection

@push('script')
    @include('Page.components.Joinus.script')
    @include('Page.components.Joinus.dropify')
@endpush
