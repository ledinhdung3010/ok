@extends('layout.app')

@section('title', 'Trang chủ')
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
            <!-- Google tag (gtag.js) -->
           				<script>
                var page_scroll_amount_for_sticky = 300;
            </script>
            <div class="full_width">
                <div class="full_width_inner" >
                    <div id="homepage"  data-q_id="#about"    class="vc_row wpb_row section vc_row-fluid " style=' padding-bottom:100px; text-align:center;'>
                        <div class=" full_section_inner clearfix">
                            <div class="wpb_column vc_column_container vc_col-sm-12">
                                <div class="vc_column-inner ">
                                    <div class="wpb_wrapper">
                                        <div class="wpb_raw_code wpb_content_element wpb_raw_html" >
                                            <div class="wpb_wrapper">
                                                <div id="home">
                                                    <ul>
                                                        <li>
                                                            <a href="/thiet-ke-san-pham">
                                                                Thiết kế sản phẩm
                                                                <div id="imageHolder"><img src="wp-content/uploads/2023/02/MG_9031-1.jpg"></div>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="/thiet-ke-y-tuong">
                                                                Thiết kế ý tưởng
                                                                <div id="imageHolder"><img src="wp-content/uploads/2023/03/02a-2.jpg"></div>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="/ban-san-pham">
                                                                Bán sản phẩm
                                                                <div id="imageHolder"><img src="wp-content/uploads/2023/03/sanpha,.jpg"></div>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="/ban-y-tuong">
                                                                Bán ý tưởng
                                                                <div id="imageHolder"><img src="wp-content/uploads/2023/02/ytuong.webp"></div>
                                                            </a>
                                                        </li>
                                                        <ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
    </div>
@endsection
@push('script')

@endpush
