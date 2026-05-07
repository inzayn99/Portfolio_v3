@extends('frontend.layouts.app')
@section('meta')
    @include('frontend.includes.meta')
@endsection
@section('content')
    <!-- Banner  -->
    <section class="banner" style="background-image:url({{ $category->banner_image }});">
        <div class="container">
            <div class="banner-wrap">
                <h2 class="wow fadeInUp" data-wow-delay=".3s">{{ $category->page_title }}</h2>
            </div>
        </div>
    </section>
    <!-- Banner End  -->

    <!-- Gallery Page  -->
    <section class="gallery-page mt1 mb1">
        <div class="container">
            <div class="row">
                @foreach ($albums as $index => $data)
                    <div class="col-lg-3 col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="{{ 0.3 + $index * 0.1 }}s">
                        <div class="gallery-page-wrap">
                            <div class="gallery-page-img">
                                <img src="{{ $data->album_cover }}" alt="{{ $data->album_title }}">
                            </div>
                            <div class="gallery-page-content">
                                <a href="{{ route('image', $data->title_slug) }}">
                                    <i class="las la-image"></i>
                                </a>
                                <h3><a href="{{ route('image', $data->title_slug) }}">{{ $data->album_title }}</a></h3>
                                {{-- <span>11 Photos</span> --}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Gallery Page End  -->
@endsection
