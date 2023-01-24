@php use Carbon\Carbon;use Illuminate\Support\Str; @endphp
@extends('Page.layout.app')

@push('title')
    <title>Little Ambulance | Berita</title>
@endpush

@section('content')
    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Berita</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Blog Area =================-->
    <section class="blog_area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog_left_sidebar">
                        @foreach($berita as $data)
                            @foreach($data->user as $user)
                                <article class="row blog_item">
                                    <div class="col-md-3">
                                        <div class="blog_info text-right">
                                            <ul class="blog_meta list">
                                                <li><a href="#">{{ $user->name }}<i class="lnr lnr-user"></i></a></li>
                                                <li>
                                                    <a href="#">{{ Carbon::parse($data->created_at)->diffForHumans() }}
                                                        <i class="lnr lnr-calendar-full"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    @endforeach
                                    <div class="col-md-9">
                                        <div class="blog_post">
                                            <a href="{{url('/berita/'. $data->slug)}}">
                                                <img src="{{asset('images/berita/'. $data->image)}}" alt="">
                                            </a>
                                            <div class="blog_details">
                                                <a href="{{url('/berita/'. $data->slug)}}">
                                                    <h2>{{ $data->title }}</h2>
                                                </a>
                                                <p>{!! Str::limit($data->body, 250, '...') !!}</p>
                                                <a href="{{url('/berita/'. $data->slug)}}" class="white_bg_btn">Baca
                                                    Selengkapnya</a>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                            {{ $berita->links() }}
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">Berita Terbaru</h3>
                            @foreach($news as $data)
                                <div class="media post_item">
                                    <img src="{{ asset('images/berita/'. $data->image)}}" width="100px" alt="post">
                                    <div class="media-body">
                                        <a href="{{url('/berita/'. $data->slug)}}">
                                            <h3>{{ $data->title }}</h3>
                                        </a>
                                        <p>{{ Carbon::parse($data->created_at)->diffForHumans() }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->

@endsection
