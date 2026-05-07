@extends('frontend.layouts.app')
@section('meta')
    @include('frontend.includes.meta')
@endsection
@section('content')
    <!-- Banner  -->
    <section class="banner" style="background-image:url({{ $image->album_cover ?? asset('uploads/nobanner.jpg') }});">
        <div class="container">
            <div class="banner-wrap">
                <h2 class="wow fadeInUp" data-wow-delay=".3s">Album / {{ $image->album_title }}</h2>
            </div>
        </div>
    </section>
    <!-- Banner End  -->

    <!-- Gallery Details  -->
    <section class="gallery-details mt1 mb1">
        <div class="container">
            <ul id="program-gallery" class="row">
                @foreach ($image->image as $item)
                    <li class="col-lg-3 col-md-4 col-sm-6"
                        data-src="{{ $item->album_images ?? asset('uploads/noimage.jpg') }}">
                        <div class="program-gallery-wrap wow fadeInUp" data-wow-delay=".2s">
                            <img src="{{ $item->album_images ?? asset('uploads/noimage.jpg') }}">
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
    <!-- Gallery Details End  -->
@endsection
