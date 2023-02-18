@php use Carbon\Carbon; @endphp
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
    <section class=" blog_area single-post-area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 posts-list">
                    <div class="single-post row">
                        <div class="col-lg-12">
                            <div class="feature-img">
                                <img class="img-fluid"
                                     src="{{ asset('images/berita/'. $berita->image) }}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-3  col-md-3">
                            <div class="blog_info text-right">
                                <ul class="blog_meta list">
                                    <li><a href="#">{{ $berita->name }}<i class="lnr lnr-user"></i></a>
                                    </li>
                                    <li>
                                        <a href="#">{{ Carbon::parse($berita->created_at)->diffForHumans() }}
                                            <i
                                                class="lnr lnr-calendar-full"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9 blog_details">
                            <h2>{{ $berita->title }}</h2>
                            <p>{!! $berita->body !!}</p>
                        </div>
                    </div>
                    <div class="navigation-area">
                        <div class="row">
                            @if($prev != null)
                                <div
                                    class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                                    <div class="thumb">
                                        <a href="{{ url('/berita/'. $prev->slug) }}"><img
                                                class="img-fluid"
                                                src="{{asset('assets/landingpage/img/blog/prev.jpg')}}"
                                                alt=""></a>
                                    </div>
                                    <div class="arrow">
                                        <a href="{{ url('/berita/'. $prev->slug) }}"><span
                                                class="lnr text-white lnr-arrow-left"></span></a>
                                    </div>
                                    <div class="detials">
                                        <p>Prev Post</p>
                                        <a href="{{$prev->slug}}">
                                            <h4>{{$prev->title}}</h4>
                                        </a>
                                    </div>
                                </div>
                            @endif
                            @if($next != null)
                                <div
                                    class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                                    <div class="detials">
                                        <p>Next Post</p>
                                        <a href="{{ url('/berita/'. $next->slug) }}">
                                            <h4>{{$next->title}}</h4>
                                        </a>
                                    </div>
                                    <div class="arrow">
                                        <a href="{{ url('/berita/'. $next->slug) }}"><span
                                                class="lnr text-white lnr-arrow-right"></span></a>
                                    </div>
                                    <div class="thumb">
                                        <a href="{{ url('/berita/'. $next->slug) }}">
                                            <img class="img-fluid"
                                                 src="{{asset('assets/landingpage/img/blog/next.jpg')}}"
                                                 alt="">
                                        </a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">Berita Terbaru</h3>
                            @foreach($news as $data)
                                <div class="media post_item">
                                    <img src="{{ asset('images/berita/'. $data->image)}}" width="100px"
                                         alt="post">
                                    <div class="media-body">
                                        <a href="blog-details.html">
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
