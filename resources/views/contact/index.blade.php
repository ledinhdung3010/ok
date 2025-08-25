@extends('layout.app')

@section('title', 'Trang chủ')
@push('style')
    <style>
        table td{
            text-align: left !important;
            padding-left: 0 !important;
        }
        #homepage{
            margin-top: 0 !important;
        }
        .content {
            padding-bottom: 50px !important;
        }
        @media(max-width:768px){
             .content {
            padding-bottom: 0px !important;
        }
        }
    </style>
@endpush
@section('content')
    <div class="content ">
        <div class="content_inner  ">
            <!-- Google tag (gtag.js) -->
            				<script>
                var page_scroll_amount_for_sticky = 440;
            </script>
            <div class="full_width">
                <div class="full_width_inner" >
                    <div id="contactpage"     class="vc_row wpb_row section vc_row-fluid " style=' text-align:left;'>
                        <div class=" full_section_inner clearfix">
                            <div class="wpb_column vc_column_container vc_col-sm-4" id="aboutcol1">
                                <div class="vc_column-inner ">
                                    <div class="wpb_wrapper">
                                        <div class="vc_empty_space"   ><span
                                                class="vc_empty_space_inner">
                        <span class="empty_space_image"  ></span>
                        </span>
                                        </div>
                                        <div class="wpb_text_column wpb_content_element ">
                                            <div class="wpb_wrapper">
                                                <p><span style="color: #e24725; font-family: 'Montserrat', sans-serif !important; font-size: 14pt; font-weight: 600;">CREATIVE INTELLIGENT SOLUTIONS</span></p>
                                            </div>
                                        </div>
                                        <div class="vc_empty_space"  ><span
                                                class="vc_empty_space_inner">
                        <span class="empty_space_image"  ></span>
                        </span>
                                        </div>
                                        <div class="wpb_text_column wpb_content_element ">
                                            <div class="wpb_wrapper">
                                                <p style="padding: 10px 0"><span style="color: #e24725; font-family: 'Montserrat', sans-serif !important; font-weight: 400; font-size: 12pt;">42 Trần Quý Khoách, Phường Tân Định, Quận 1, Hồ Chí Minh</span></p>

                                            </div>
                                        </div>
                                        <div class="vc_empty_space"  ><span
                                                class="vc_empty_space_inner">
                        <span class="empty_space_image"  ></span>
                        </span>
                                        </div>
                                        <div class="wpb_text_column wpb_content_element ">
                                            <div class="wpb_wrapper">
                                                <table >
                                                    <tbody>
                                                    <tr >
                                                        <td >
                                                            <span style="color: #e24725; font-family: Montserrat, sans-serif !important; font-weight: 400; font-size: 12pt;">Email        </span></p>
                                                            <p>&nbsp;
                                                        </td>
                                                        <td >
                                                            <a href="mailto:crist.int.info@gmail.com"><span style="font-weight: 600; font-size: 12pt; font-family: Montserrat, sans-serif !important;">crist.int.info@gmail.com</span></a></p>

                                                            <p>&nbsp;
                                                        </td>
                                                    </tr>
                                                    <tr >
                                                        <td >
                                                            <span style="color: #e24725; font-family: 'Montserrat', sans-serif !important; font-weight: 400; font-size: 12pt;">Phone </span></p>
                                                        </td>
                                                        <td > <a href="tel:+84949079010"><span style="color: #e24725; font-family: 'Montserrat', sans-serif !important; font-weight: 600; font-size: 12pt;">(+84) 949079010</span></a></td>
                                                    </tr>

{{--                                                    <tr >--}}
{{--                                                        <td ><span style="color: #e24725; font-family: 'Montserrat', sans-serif !important; font-weight: 400; font-size: 12pt;">Instagram       </span></td>--}}
{{--                                                        <td ><a href="https://www.instagram.com/laitadesign/"><span style="font-weight: 600; font-size: 12pt; font-family: 'Montserrat', sans-serif !important;">Laita Design</span></a><span style="font-weight: 600; font-size: 12pt; font-family: 'Montserrat', sans-serif !important;"> <span style="color: #e24725; font-family: 'Montserrat', sans-serif !important; font-weight: 600; font-size: 12pt;">/</span><strong> </strong></span><a href="https://www.instagram.com/laitastore/"><span style="font-weight: 600; font-size: 12pt; font-family: 'Montserrat', sans-serif !important;">Laita Store</span></a></td>--}}
{{--                                                    </tr>--}}
{{--                                                    <tr >--}}
{{--                                                        <td ><span style="color: #e24725; font-family: 'Montserrat', sans-serif !important;"><span style="font-weight: 400; font-size: 12pt; font-family: 'Montserrat', sans-serif !important;">Facebook        </span></span></td>--}}
{{--                                                        <td ><span style="color: #e24725; font-family: 'Montserrat', sans-serif !important;"><a href="https://www.facebook.com/laitadesignstudio"><span style="font-weight: 600; font-size: 12pt; font-family: 'Montserrat', sans-serif !important;">Laita Design</span></a><span style="font-weight: 600; font-size: 12pt; font-family: 'Montserrat', sans-serif !important;"> <span style="color: #e24725; font-family: 'Montserrat', sans-serif !important; font-weight: 600; font-size: 12pt;">/</span><strong> </strong></span><a href="https://www.facebook.com/laitastore/"><span style="font-weight: 600; font-size: 12pt; font-family: 'Montserrat', sans-serif !important;">Laita Store</span></a></span></td>--}}
{{--                                                    </tr>--}}
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="wpb_column vc_column_container vc_col-sm-8" id="aboutcol2">
                                <div class="vc_column-inner ">
                                    <div class="wpb_wrapper">
                                        <div      class="vc_row wpb_row section vc_row-fluid vc_inner " style=' text-align:left;'>
                                            <div class=" full_section_inner clearfix">
                                                <div class="wpb_column vc_column_container vc_col-sm-2">
                                                    <div class="vc_column-inner ">
                                                        <div class="wpb_wrapper"></div>
                                                    </div>
                                                </div>
                                                <div class="wpb_column vc_column_container vc_col-sm-10">
                                                    <div class="vc_column-inner ">
                                                        <div class="wpb_wrapper">
                                                            <div class="wpb_gmaps_widget wpb_content_element" >
                                                                <div class="wpb_wrapper">
                                                                    <div class="wpb_map_wraper">
                                                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.233444484706!2d106.68542447586884!3d10.793424358878275!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317528d277a56259%3A0x4492e84ef0494763!2zNDIgVHLhuqduIFF1w70gS2hvw6FjaCwgUGjGsOG7nW5nIFTDom4gxJDhu4tuaCwgUXXhuq1uIDEsIEjhu5MgQ2jDrSBNaW5oLCBWaWV0bmFt!5e0!3m2!1sen!2s!4v1755827371806!5m2!1sen!2s" width="400px" height="300px"   style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="homepage"     class="vc_row wpb_row section vc_row-fluid " style=' text-align:left;'>
                        <div class=" full_section_inner clearfix">
                            <div class="wpb_column vc_column_container vc_col-sm-12">
                                <div class="vc_column-inner " style="display: none !important;">
                                    <div class="wpb_wrapper">
                                        <div class="vc_empty_space"   ><span
                                                class="vc_empty_space_inner">
                        <span class="empty_space_image"  ></span>
                        </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div      class="vc_row wpb_row section vc_row-fluid " style=' text-align:left;'>
                        <div class=" full_section_inner clearfix">
                            <div class="wpb_column vc_column_container vc_col-sm-12">
                                <div class="vc_column-inner " style="display: none !important;">
                                    <div class="wpb_wrapper"></div>
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
