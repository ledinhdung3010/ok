@extends('layout.app')

@section('title', 'Company')
@push('style')
    <style>
        @media (max-width: 768px) {
            .out{
                font-size: 27px !important;
            }
             .content{
            padding-bottom: 0 !important;
        }
        }
       
    </style>
@endpush
@section('content')
    <div class="content ">
        <div class="content_inner  ">
            <!-- Google tag (gtag.js) -->

            <div class="full_width">
                <div class="full_width_inner" >
                    <div      class="vc_row wpb_row section vc_row-fluid " style=' text-align:left;'>
                        <div class=" full_section_inner clearfix">
                            <div class="wpb_column vc_column_container vc_col-sm-12" id="ourstory">
                                <div class="vc_column-inner ">
                                    <div class="wpb_wrapper">
                                        <div class="wpb_text_column wpb_content_element ">
                                            <div class="wpb_wrapper">
                                                <div>
                                                    <p><span class="out" style="font-size: 36px;"><span style="color: #e24725; font-family: Montserrat !important; letter-spacing: 3px;">Về chúng tôi</span></span></p>
                                                    <p><img class="wp-image-16634 aligncenter" src="{{asset('assets/images/logo-cty.jfif')}}" alt="" width="521" height="296" /></p>
                                                </div>

                                                <div style="margin: 10px 0">
                                                    {!! $company['description'] !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div      class="vc_row wpb_row section vc_row-fluid " style=' text-align:left;'>
                        <div class=" full_section_inner clearfix">
                            <div class="wpb_column vc_column_container vc_col-sm-12">
                                <div class="vc_column-inner " style="display: none !important">
                                    <div class="wpb_wrapper">
                                        <div class="vc_empty_space"   ><span
                                                class="vc_empty_space_inner">
                              <span class="empty_space_image"  ></span>
                              </span>
                                        </div>
                                        <div class="vc_empty_space"   ><span
                                                class="vc_empty_space_inner">
                              <span class="empty_space_image"  ></span>
                              </span>
                                        </div>
                                        <div class="vc_empty_space"  ><span
                                                class="vc_empty_space_inner">
                              <span class="empty_space_image"  ></span>
                              </span>
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
@endsection
