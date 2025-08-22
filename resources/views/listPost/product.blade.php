@extends('layout.app')

@section('title', $title)
@push('style')
    <style>
        @media (max-width: 768px) {
            #imageHolder{
                top: 10%;
                height: 200px !important;
            }
        }

    </style>
@endpush
@section('content')
    <div class="content ">
        <div class="content_inner  ">

            <div class="full_width">
                <div class="full_width_inner" >
                    <div id="about"     class="vc_row wpb_row section vc_row-fluid " style=' text-align:left;'>
                        <div class=" full_section_inner clearfix">
                            <div class="wpb_column vc_column_container vc_col-sm-12">
                                <div class="vc_column-inner ">
                                    @foreach($groupedProducts as $categoryName => $products)
                                    <div class="wpb_wrapper">
                                        <div class="wpb_text_column wpb_content_element ">
                                            <div class="wpb_wrapper">
                                                <p>
                                                    <strong><span style="color: #e24725; font-family: Montserrat; letter-spacing: 3px;font-size: 22px;font-weight: bold">{{ $categoryName }}</span></strong>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="vc_empty_space"  style="height: 30px" ><span
                                                class="vc_empty_space_inner">
                                          <span class="empty_space_image"  ></span>
                                          </span>
                                        </div>
                                        <br />
                                        <div class='projects_holder_outer v5 portfolio_with_space portfolio_standard'>
                                            <div class='projects_holder portfolio_main_holder clearfix v5 standard portfolio_full_image '>

                                                @foreach($products as $value)
                                                    <article class='mix portfolio_category_615 portfolio_category_69 ' style=''>
                                                        <div class="item_holder slow_zoom">
                                                            <div class="icons_holder"></div>
                                                            <a itemprop="url" class="portfolio_link_class" title="{{$value->title}}" href="{{ route('detailProduct', ['slug' => $value->slug]) }}"></a>

                                                            <div style="background-color: rgba(255,255,255,0.89)" class="portfolio_shader"></div>
                                                            @php
                                                                $images = explode(',', $value->image); // Tách chuỗi thành mảng
        $firstImage = $images[0]; // Lấy ảnh đầu tiên trong mảng

                                                            @endphp
                                                            <div class="image_holder"><span class="image"><img width="3000" height="3000" src="{{asset($firstImage)}}" class="attachment-full size-full wp-post-image" alt="" srcset="" sizes="(max-width: 3000px) 100vw, 3000px" /></span></div>
                                                        </div>
                                                        <div class='portfolio_description ' style=background-color:#ffffff;'>
                                                            <h5 style="text-align: center" itemprop="name" class="portfolio_title entry_title"><a itemprop="url" href="{{route('detailProduct', ['slug' => $value->slug])}}" target="_self" >{{$value->title}}</a></h5>
                                                        </div>
                                                    </article>
                                                @endforeach


                                            </div>
                                        </div>
                                        <div class="separator  transparent   " style="margin-top: 60px;margin-bottom: 60px;"></div>
                                        <p>


                                        <div class="separator  transparent   " style="margin-top: 20px;margin-bottom: 20px;"></div>
                                        <p>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <br />
                        </div>
                    </div>
                </div>
            </div>
            <div class="qode-inter-page-navigation-holder">
                <div class="qode-inter-page-navigation-inner">
                    <div class="qode-inter-page-navigation-prev">
                    </div>
                    <div class="qode-inter-page-navigation-next">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')

@endpush
