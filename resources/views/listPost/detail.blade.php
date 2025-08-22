@extends('layout.app')

@section('title', $post->title??$post->name)

@push('style')
    <style>
        @media (max-width: 768px) {
            #imageHolder{
                top: 10%;
                height: 200px !important;
            }
            #gcolmobile{
                display: block !important;
            }
            #gcol1{
                display: none !important;
            }
            .pfdetailtext{
                margin-top: 80px;
            }
        }
        #gcolmobile{
            display: none;
        }
        #gcol1{
            display: flex;
        }

    </style>
    <style type="text/css" id="wp-custom-css">
        /* Force all text to black on the Store page */
        .page-id-21288 {
            color: #000000 !important;
        }
        .page-id-21288 p,
        .page-id-21288 h1,
        .page-id-21288 h2,
        .page-id-21288 h3,
        .page-id-21288 h4,
        .page-id-21288 h5,
        .page-id-21288 h6,
        .page-id-21288 span,
        .page-id-21288 a,
        .page-id-21288 li,
        .page-id-21288 div,
        .page-id-21288 strong {
            color: #000000 !important;
        }
        .pfdetailtext{
            padding-bottom: 50px;
        }
    </style>
    <link rel="stylesheet" href="{{asset('wp-content/themes/Laita/templates/pfslide/swiper-bundle.min.css')}}">
    <link rel="stylesheet" href="{{asset('wp-content/themes/Laita/templates/pfslide/slide.css')}}">

@endpush
@section('content')
    <div class="content ">
        <div class="content_inner  ">
            <!-- Google tag (gtag.js) -->

            <div class="container">
                <div class="container_inner default_template_holder clearfix" >
                    <div class="portfolio_single portfolio_template_1">
                        <div class="two_columns_66_33 clearfix portfolio_container">
                            <div style="display: table;width: 100%;padding-bottom: 48px;">
                                <h6 class="pftitle" style="font-size: 36px;text-transform: capitalize;font-weight: 400;display:table-cell;">{{$post->title}}</h6>
                                <h6 class="pfback" style="margin-top: 12px; font-size: 16px; text-align: left; line-height: 0px; letter-spacing: 3px; font-weight: 300; text-align: right; position: absolute; top: 0; right: 0;">
                                    <a style="text-transform: initial; font-weight: 400;" href="{{ url()->previous() }}">Trở lại</a>
                                </h6>

                            </div>
                            <div class="portfolio_navigation " style="display:none;">
                                <div class="portfolio_prev" style="   margin-top: 25px;  letter-spacing: 2px;">
                                    <a href="../rc2/index.html" rel="prev">PREV</a>
                                </div>
                                <div class="portfolio_next" style="      margin-top: 25px;  letter-spacing: 2px;">
                                    <a href="../16-3/index.html" rel="next">NEXT</a>
                                </div>
                            </div>
                            <script src='{{asset('cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js')}}'></script><script  src="script.html"></script>
                            <div class="gcol1" id="gcol1">
                                <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2 swiper-initialized swiper-horizontal swiper-pointer-events">
                                    <div class="swiper-wrapper" >
                                        @php
                                            // Chuyển chuỗi '1,2,3' thành mảng
                                            $images = explode(',', $post->image);
                                        @endphp

                                        @foreach($images as $image)
                                            <div class="swiper-slide" style="background-image:url('{{ asset( $image) }}')"></div>
                                        @endforeach

                                    </div>
                                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                                </div>
                                <div thumbsslider="" class="swiper mySwiper swiper-initialized swiper-horizontal swiper-pointer-events swiper-free-mode swiper-thumbs">
                                    <div class="swiper-wrapper" >
                                        @php
                                            // Chuyển chuỗi '1,2,3' thành mảng
                                            $images = explode(',', $post->image);
                                        @endphp

                                        @foreach($images as $image)
                                            <div class="swiper-slide" style="background-image:url('{{ asset( $image) }}')"></div>
                                        @endforeach
                                    </div>
                                    <!-- Add Arrows -->
                                    <div>
                                        <div class="swiper-button-next"></div>
                                        <div class="swiper-button-prev"></div>
                                    </div>
                                </div>
                                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                            </div>
                            <div class="gcolmobile" id="gcolmobile">
                                <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwipermobile swiper-initialized swiper-horizontal swiper-pointer-events">
                                    <div class="swiper-wrapper" >
                                        @php
                                            // Chuyển chuỗi '1,2,3' thành mảng
                                            $images = explode(',', $post->image);
                                        @endphp

                                        @foreach($images as $image)
                                            <div class="swiper-slide" style="background-image:url('{{ asset( $image) }}')"></div>
                                        @endforeach
                                    </div>
                                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                                </div>
                                <div thumbsslider="" class="swiper mySwiperthumbmobile swiper-initialized swiper-horizontal swiper-pointer-events swiper-free-mode swiper-thumbs">
                                    <div class="swiper-wrapper" >
                                        @php
                                            // Chuyển chuỗi '1,2,3' thành mảng
                                            $images = explode(',', $post->image);
                                        @endphp

                                        @foreach($images as $image)
                                            <div class="swiper-slide" style="background-image:url('{{ asset( $image) }}')"></div>
                                        @endforeach
                                    </div>
                                </div>
                                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                            </div>
                            <!-- Swiper JS -->
                            <script src="{{asset('unpkg.com/swiper%4011.2.10/swiper-bundle.min.js')}}"></script>
                            <!-- Initialize Swiper -->
                            <script>
                                var swiper = new Swiper(".mySwiper", {
                                    spaceBetween: 10,
                                    slidesPerView: 3,
                                    freeMode: true,
                                    direction:'vertical',
                                    watchSlidesProgress: true,
                                    navigation: {
                                        nextEl: ".swiper-button-next",
                                        prevEl: ".swiper-button-prev",
                                    },
                                });
                                var swiper2 = new Swiper(".mySwiper2", {
                                    spaceBetween: 20,
                                    freeMode: true,
                                    watchSlidesVisibility: true,
                                    watchSlidesProgress: true,
                                    navigation: {
                                        nextEl: ".swiper-button-next",
                                        prevEl: ".swiper-button-prev",
                                    },

                                    thumbs: {
                                        swiper: swiper,
                                    },
                                });

                                var swiper = new Swiper(".mySwiperthumbmobile", {
                                    spaceBetween: 10,
                                    slidesPerView: 3,
                                    freeMode: true,
                                    direction:'horizontal',
                                    watchSlidesProgress: true,
                                    navigation: {
                                        nextEl: ".swiper-button-next",
                                        prevEl: ".swiper-button-prev",
                                    },
                                });
                                var swiper2 = new Swiper(".mySwipermobile", {
                                    spaceBetween: 20,
                                    freeMode: true,
                                    watchSlidesVisibility: true,
                                    watchSlidesProgress: true,
                                    thumbs: {
                                        swiper: swiper,
                                    },
                                });



                            </script>
                            <div class="pfdetailtext">
                                <div class="column_inner">
                                    <div class="portfolio_detail portfolio_single_no_follow clearfix">
                                        <div class="row">
                                           {!! $post->description??$post->desc !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- Link Swiper's CSS -->

                </div>
            </div>
        </div>
    </div>

@endsection
@push('script')
    <script src='{{asset('cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js')}}'></script>
    <script  src="{{asset('wp-content/themes/Laita/templates/pfslide/slidescript.js')}}"></script>
@endpush
