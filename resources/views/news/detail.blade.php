@extends('layout.app')
@section('title', $new->title)
@push('style')
    <link rel="stylesheet" href="{{ asset('wp-content/plugins/WP-ProGrid/assets/css/front-end/frontend-style092c.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('wp-content/plugins/WP-ProGrid/assets/css/layouts/style092c.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('wp-content/plugins/WP-ProGrid/assets/css/framework/bootstrap092c.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('wp-content/plugins/WP-ProGrid/assets/css/font-awesome092c.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('wp-content/plugins/WP-ProGrid/assets/css/tooltip/tipsy092c.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('wp-content/plugins/WP-ProGrid/assets/css/front-end/search_framework/style.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('wp-content/plugins/WP-ProGrid/assets/css/front-end/multiselect/bootstrap-multiselect.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('wp-content/plugins/WP-ProGrid/assets/css/front-end/extra-button/extra-style.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('wp-content/plugins/WP-ProGrid/assets/css/front-end/scroll/tinyscroller.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('wp-content/plugins/WP-ProGrid/assets/css/chosen/chosen8a54.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('wp-content/plugins/WP-ProGrid/assets/css/front-end/bx-slider/jquery.bxslider.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('wp-content/plugins/WP-ProGrid/assets/css/front-end/owl-slider/owl.carousel.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('wp-content/plugins/WP-ProGrid/assets/css/front-end/owl-slider/owl.theme.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('wp-content/plugins/WP-ProGrid/assets/css/lightbox/lightbox.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('wp-content/plugins/WP-ProGrid/assets/css/front-end/jQueryUi/jquery-ui-slider.min.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('wp-content/plugins/WP-ProGrid/assets/css/front-end/popup/style.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('wp-content/plugins/WP-ProGrid/assets/css/back-end/form-step/jquery.steps8a54.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('wp-content/plugins/WP-ProGrid/assets/css/front-end/form-step/tab-style092c.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('wp-content/plugins/WP-ProGrid/assets/css/custom.css') }}" type="text/css" media="all">
    <style id='pw-pl-custom-style-inline-css' type='text/css'>
        @import url(https://fonts.googleapis.com/css?family=Lora:700|Lora:regular);
        /*WIDGET BUTTON OPTION*/
        .widget-btn  {background:!important;color:#ffffff!important;}
        .widget-btn:hover  {background:!important;color:#ffffff!important;}
        /*
        //////////////////////TOOLTIP STYLE///////////////////
        */
        .woo-tipsy-arrow-e{border-left-color:#333333!important;}
        .woo-tipsy-arrow-s{border-top-color:#333333!important;}
        .woo-tipsy-arrow-n{border-bottom-color:#333333!important;}
        .woo-tipsy-inner{background-color:#333333!important;}
        .woo-tipsy-inner{color:#ffffff!important;}
        /*
        //////////////////////QUICK VIEW STYLE///////////////////
        */
        .popup_quickview , .popup_sendto{background-color:#ffffff!important;}
        .b-modal{background-color:#333333!important;}
        .woo-quick-title a{color:#e24725;font-size:20px;font-family:"Lora";}
        .woo-quick-title a:hover{color:#e24725;}
        .woo-quick-price{}
        .woo-quick-excerpt{color:#e24725;font-size:13px;}
        .woo-quick-cat a , .woo-quick-tag a {color:#e24725;font-size:18px;font-family:"Lora";}
        .woo-quick-cat a , .woo-quick-tag a {color:#e24725;}
        .woo-quick-rating .wg-star-rating , .woo-quick-rating .wg-woocommerce-review-link  {color:#e24725;font-size:13px!important;}
        /*TABLE BUTTON OPTION*/
        .woo-quick-add .woo-addcard-btn a , .popup_sendto .search-submit  {background:!important;color:#ffffff!important;}
        .woo-quick-add .woo-addcard-btn a:hover, .popup_sendto .search-submit:hover {background:!important;color:#ffffff!important;}
        /*
        //////////////////////PAGINATION STYLE//////////////////
        */
        #pagination-cnt_500 .pagination > li > span {background:#ffffff;color:#333333;border-color:#7C7C7C!important;}
        #pagination-cnt_500 .pagination > li > span:hover {background:#ffffff;color:#141414;border-color:#7C7C7C!important;}
        #pagination-cnt_500 .pagination > .active > span , #pagination-cnt_500 .pagination > .active > span:hover{background:#8e8e8e!important;color:#ffffff!important;}
        /*Show More*/
        .showmore-btn.pw_pl_load_more_500 {background:#ffffff!important;color:#333333!important;border-color:#7C7C7C!important;}
        .showmore-btn.showmore-btn.pw_pl_load_more_500:hover {background:#ffffff!important;color:#141414!important;border-color:#7C7C7C!important;}
        /*SEARCH QUERY STYLE*/
        #pw_general_ad_grid_result_500_yoursearch  span{color:#727272!important;font-size:10px!important;}
        #pw_general_ad_grid_result_500_yoursearch  span.ys_items {color:#3d3d3d!important;font-size:10px!important;}
        /*
        //////////////////////TABLE STYLES////////////////
        */
        .wg-table-_500 thead tr th{background-color: #fc5b5b;color: #fc5b5b;
        }
        .wg-table-_500 tr:nth-child(even) , .wg-table-_500 tr:nth-child(odd){background-color: #fc5b5b!important;
        }
        .wg-table-_500 tr:nth-child(even):hover , .wg-table-_500 tr:nth-child(odd):hover{background-color: #fc5b5b!important;
        }
        .wg-table-_500 td {border-left-color:#fc5b5b!important;
            border-top-color:#fc5b5b!important;}
        .wg-table-_500 .woo-product-delprice del , .wg-table-_500 .woo-product-price{}
        .wg-table-_500 .woo-product-title a{color:#e24725!important;font-size:20px;font-family:"Lora";}
        .wg-table-_500 .woo-product-title a:hover{color:#e24725!important;}
        .wg-table-_500 .woo-product-desc{color:#e24725;font-size:13px;}
        .wg-table-_500 .woo-product-category a,.wg-table-_500 .woo-meta a,.wg-table-_500 .woo-meta{color:#e24725!important;font-size:18px!important;font-family:"Lora";}
        .wg-table-_500 .woo-product-category a:hover,
        .wg-table-_500 .woo-meta a:hover{color:#e24725!important;}
        .wg-table-_500, .wg-table-_500 .wg-star-rating ,.wg-table-_500 .wg-woocommerce-review-link  {color:#e24725;font-size:13px!important;}
        /*TABLE BUTTON OPTION*/
        .wg-table-_500 .woo-addfav-btn.back-btn a ,.wg-table-_500 .woo-addcard-btn.back-btn a, .wg-table-_500 .woo-btns.back-btn   {background:!important;color:#ffffff!important;}
        .wg-table-_500 .woo-addfav-btn.back-btn a:hover ,.wg-table-_500 .woo-addcard-btn.back-btn a:hover , .wg-table-_500 .woo-btns.back-btn:hover {background:!important;color:#ffffff!important;}
        .wg-table-_500 .woo-addfav-btn.outline-btn a ,.wg-table-_500 .woo-addcard-btn.outline-btn a, .wg-table-_500 .woo-btns.outline-btn {border-color:!important;color:#ffffff!important;}
        .wg-table-_500 .woo-addfav-btn.outline-btn a:hover ,.wg-table-_500 .woo-addcard-btn.outline-btn a:hover {background:!important;border-color:!important;color:#ffffff!important;}
        /*TABLE FAV OPTION*/
        .wg-table-_500 .woo-addfav-btn i.pw-general-ad-search-unfavorite{}
        .wg-table-_500 .woo-addfav-btn:hover i.pw-general-ad-search-unfavorite{}
        .wg-table-_500 .woo-addfav-btn i.pw-general-ad-search-favorite{}
        .wg-table-_500 .woo-addfav-btn:hover i.pw-general-ad-search-favorite{}
        .wg-table-_500 .woo-banner.sale-banner{}
        .wg-table-_500 .woo-banner.feature-banner{}
        /*TABELE RADIUS*/
        .wg-table-_500 thead tr th:first-child{ }
        .wg-table-_500 thead tr th:last-child { }
        .wg-table-_500 tbody tr:last-child td:first-child{ }
        .wg-table-_500 tbody tr:last-child td:last-child { }
        /*BOXED STYlE EFFECT 3,4,5*/
        .wg-boxed-_500 svg path{fill:rgba(,,,0.9);}
        /*BOXED STYlE EFFECT 1,2*/
        .wg-boxed-_500 .woo-boxed-eff-one .woo-overlay-cnt , .wg-boxed-_500 .woo-boxed-eff-two .woo-overlay-cnt ,.wg-boxed-_500 div.woo-gst-effect-effect7 div.woo-mask::before ,.wg-boxed-_500 div.woo-gst-effect-effect8 div.woo-mask::before ,.wg-boxed-_500 div.woo-gst-effect-effect9 div.woo-mask:hover,.wg-boxed-_500 div.woo-gst-effect-effect10 div.woo-mask:hover, .wg-boxed-_500 div.woo-gst-effect-effect11 div.woo-mask:hover,.wg-boxed-_500 div.woo-gst-effect-effect12 div.woo-mask::before ,.wg-boxed-_500 div.woo-gst-effect-effect13 div.woo-mask::before ,.wg-boxed-_500 div.woo-gst-effect-effect14 div.woo-mask::before{background:rgba(,,,0.9);	}
        /*BOXED STYlE TEXT STYLE*/
        .wg-boxed-_500 .woo-product-delprice del , .wg-boxed-_500 .woo-product-price{}
        .wg-boxed-_500 .woo-product-title a{color:#e24725!important;font-size:20px!important;font-family:"Lora";}
        .wg-boxed-_500 .woo-banner.sale-banner, .wg-boxed-_500 .woo-banner.sale-banner a ,.wg-boxed-_500 .woo-banner.feature-banner ,.wg-boxed-_500 .woo-btns > div , .wg-boxed-_500 .woo-btns > div a {color:#e24725!important; border-color:#e24725!important;}
        .wg-boxed-_500 .woo-btns div:hover {border-color:#e24725!important;}
        .wg-boxed-_500 .woo-btns div:hover i , .wg-boxed-_500 .woo-btns div:hover a:before{color:#e24725!important;}
        .wg-boxed-_500 .woo-product-title a:hover , .wg-boxed-_500 .woo-banner.sale-banner a:hover{color:#e24725!important;}
        .wg-boxed-_500 .woo-product-desc{color:#e24725!important;font-size:13px!important;}
        .wg-boxed-_500 .woo-product-category a , .wg-boxed-_500 .woo-meta-comment a , .wg-boxed-_500 .woo-meta a, .wg-boxed-_500 .woo-meta , .wg-boxed-_500 .woo-banner.sale-banner , .wg-boxed-_500 .woo-banner.feature-banner {color:#e24725!important;font-size:18px!important;font-family:"Lora";}
        .wg-boxed-_500 .woo-product-category a:hover, .wg-boxed-_500 .woo-meta-comment a:hover, .wg-boxed-_500 .woo-meta a:hover, .wg-boxed-_500 .woo-banner.sale-banner a:hover {color:#e24725!important;}
        .wg-boxed-_500 , .wg-boxed-_500 .wg-star-rating ,.wg-boxed-_500 .wg-woocommerce-review-link  {color:#e24725!important;font-size:13px!important;}
        /*BOXED STYLE MARGIN AND PADDING AND RADIUS*/
        .wg-boxed-_500 > div {margin-top:10px!important;margin-bottom:10px!important;padding-left:px!important;padding-right:px!important;}
        .wg-boxed-_500 .woo-product-cnt {border-top-width:0px!important;border-bottom-width:0px!important;border-right-width:0px!important;border-left-width:0px!important;border-color:#ffffff!important;border-style:solid!important;}
        .wg-boxed-_500 .woo-product-cnt , .wg-boxed-_500 img , .wg-boxed-_500 .woo-product-cnt .woo-overlay-cnt{}
        .wg-boxed-_500 .woo-product-cnt.woo-boxed-eff-three .woo-banner.sale-banner {}
        .wg-boxed-_500 .woo-product-cnt.woo-boxed-eff-three .woo-banner.feature-banner {}
        .wg-boxed-_500  .woo-product-cnt.woo-boxed-eff-three .woo-btns {}
        .wg-boxed-_500 .woo-product-cnt.woo-boxed-eff-one .woo-overlay-cnt{}
        .wg-boxed-_500 .woo-product-cnt.woo-boxed-eff-two .woo-banner.sale-banner {}
        .wg-boxed-_500  .woo-product-cnt.woo-boxed-eff-two .woo-banner.feature-banner {}
        /*BOXED SHADOW STYLES*/
        /*BOXED GENERAL STYLES*/
        .wg-boxed-_500 .woo-banner.sale-banner ,.wg-boxed-_500 .woo-banner.feature-banner , .wg-boxed-_500 .woo-btns {background:rgba(,,,0.9)!important;}
        .wg-boxed-_500 .woo-banner.sale-banner{}
        .wg-boxed-_500 .woo-banner.feature-banner{}
        /*BOXED FAV OPTION*/
        .wg-boxed-_500 .woo-addfav i.pw-general-ad-search-unfavorite{}
        .wg-boxed-_500 .woo-addfav:hover i.pw-general-ad-search-unfavorite{}
        .wg-boxed-_500 .woo-addfav i.pw-general-ad-search-favorite{}
        .wg-boxed-_500 .woo-addfav:hover i.pw-general-ad-search-favorite{}
        /*
        ///////////////////// GRID STYLE ///////////////////////
        */
        .wg-grid-_500 .woo-product-cnt {background:#ffffff!important;}
        .wg-grid-_500 .woo-product-cnt:hover {background:!important;}
        /*GRID STYlE TEXT STYLE*/
        .wg-grid-_500 .woo-product-delprice del , .wg-grid-_500 .woo-product-price{}
        .wg-grid-_500 .woo-product-title a{color:#e24725!important;font-size:20px!important;font-family:"Lora";}
        .wg-grid-_500 .woo-banner.sale-banner ,.wg-grid-_500 .woo-banner.feature-banner ,.wg-grid-_500 .woo-btns > div , .wg-grid-_500 .woo-btns > div a {color:#e24725!important; border-color:#e24725!important;}
        .wg-grid-_500 .woo-btns > div a:hover i {color:#e24725!important;}
        .wg-grid-_500 .woo-product-title a:hover{color:#e24725!important;}
        .wg-grid-_500 .woo-product-desc{color:#e24725!important;font-size:13px!important;}
        .wg-grid-_500 .woo-product-category a , .wg-grid-_500 .woo-banner a ,.wg-grid-_500 .woo-banner , .wg-grid-_500 .woo-meta a {color:#e24725!important;font-size:18px!important;font-family:"Lora";}
        .wg-grid-_500 .woo-product-category a:hover, .wg-grid-_500 .woo-meta a:hover, .wg-grid-_500 .woo-banner a:hover {color:#e24725!important;}
        .wg-grid-_500 , .wg-grid-_500 .wg-star-rating ,.wg-grid-_500 .wg-woocommerce-review-link  {color:#e24725!important;font-size:13px!important;}
        /*GRID STYLE MARGIN AND PADDING AND RADIUS*/
        .wg-grid-_500 > div {margin-top:10px!important;margin-bottom:10px!important;padding-left:px!important;padding-right:px!important;}
        .wg-grid-_500 .woo-product-cnt {padding-top:0px!important;padding-bottom:0px!important;padding-right:0px!important;padding-left:0px!important;}
        .wg-grid-_500 .woo-product-cnt {border-top-width:0px!important;border-bottom-width:0px!important;border-right-width:0px!important;border-left-width:0px!important;border-color:#ffffff!important;border-style:solid!important;}
        .wg-grid-_500 .woo-product-cnt {}
        .wg-grid-_500 .woo-product-cnt.wg-bottom-desc .woo-overlay-cnt , .wg-grid-_500 .woo-product-cnt.wg-bottom-desc img, .wg-grid-_500 .woo-product-cnt.wg-bottom-desc .woo-thumb-cnt {}
        /*GRID GENERAL STYLES*/
        .wg-grid-_500 .woo-banner.sale-banner ,.wg-grid-_500 .woo-banner.feature-banner  {background:rgba(255,255,255,0.9)!important;}
        /*GRID STYlE OVERLAY*/
        .wg-grid-_500 .woo-overlay-cnt    {background:rgba(,,,0.9);	}
        /*GRID BUTTON OPTION*/
        .wg-grid-_500 .woo-addfav-btn.back-btn a ,.wg-grid-_500 .woo-addcard-btn.back-btn a, .wg-grid-_500 .woo-btns.back-btn   {background:!important;color:#ffffff!important;}
        .wg-grid-_500 .woo-addfav-btn.back-btn a:hover ,.wg-grid-_500 .woo-addcard-btn.back-btn a:hover , .wg-grid-_500 .woo-btns.back-btn:hover {background:!important;color:#ffffff!important;}
        .wg-grid-_500 .woo-addfav-btn.outline-btn a ,.wg-grid-_500 .woo-addcard-btn.outline-btn a, .wg-grid-_500 .woo-btns.outline-btn {border-color:!important;color:#ffffff!important;}
        .wg-grid-_500 .woo-addfav-btn.outline-btn a:hover ,.wg-grid-_500 .woo-addcard-btn.outline-btn a:hover {background:!important;border-color:!important;color:#ffffff!important;}
        /*GRID FAV OPTION*/
        .wg-grid-_500 .woo-addfav-btn i.pw-general-ad-search-unfavorite{}
        .wg-grid-_500 .woo-addfav-btn:hover i.pw-general-ad-search-unfavorite{}
        .wg-grid-_500 .woo-addfav-btn i.pw-general-ad-search-favorite{}
        .wg-grid-_500 .woo-addfav-btn:hover i.pw-general-ad-search-favorite{}
        /*GRID SHADOW STYLES*/
        /*LIST STYlE TEXT STYLE*/
        .wg-list-_500 .woo-product-cnt {background:#ffffff!important;}
        .wg-list-_500 .woo-product-cnt:hover {background:!important;}
        .wg-list-_500 .woo-product-delprice del , .wg-list-_500 .woo-product-price{}
        .wg-list-_500 .woo-product-title a{color:#e24725!important;font-size:20px!important;font-family:"Lora";}
        .wg-list-_500 .woo-banner.sale-banner ,.wg-list-_500 .woo-banner.feature-banner ,.wg-list-_500 .woo-btns > div , .wg-list-_500 .woo-btns > div a {color:#e24725!important; border-color:#e24725!important;}
        .wg-list-_500 .woo-btns > div a:hover i {color:#e24725!important;}
        .wg-list-_500 .woo-product-title a:hover{color:#e24725!important;}
        .wg-list-_500 .woo-product-desc{color:#e24725!important;font-size:13px!important;}
        .wg-list-_500 .woo-product-category a,.wg-list-_500 .woo-meta a,.wg-list-_500 .woo-meta {color:#e24725!important;font-size:18px!important;font-family:"Lora";}
        .wg-list-_500 .woo-product-category a:hover,.wg-list-_500 .woo-meta a:hover{color:#e24725!important;}
        .wg-list-_500  , .wg-list-_500 .wg-star-rating ,.wg-list-_500 .wg-woocommerce-review-link  {color:#e24725!important;font-size:13px!important;}
        /*LIST STYLE MARGIN AND PADDING AND RADIUS*/
        .wg-list-_500 > div {margin-top:10px!important;margin-bottom:10px!important;}
        .wg-list-_500 .woo-product-cnt {padding-top:0px!important;padding-bottom:0px!important;padding-right:0px!important;padding-left:0px!important;}
        .wg-list-_500 .woo-product-cnt {border-top-width:0px!important;border-bottom-width:0px!important;border-right-width:0px!important;border-left-width:0px!important;border-color:#ffffff!important;border-style:solid!important;}
        .wg-list-_500 .woo-product-cnt {}
        .wg-list-_500 .woo-banner.sale-banner {}
        /*LIST GENERAL STYLES*/
        .wg-list-_500 .woo-banner.sale-banner ,.wg-list-_500 .woo-banner.feature-banner  {background:rgba(255,255,255,0.9)!important;}
        .wg-list-_500 .woo-banner.sale-banner{}
        .wg-list-_500 .woo-banner.feature-banner{}
        /*LIST STYlE OVERLAY*/
        .wg-list-_500 .woo-overlay-cnt {background:rgba(,,,0.9);	}
        /*LIST BUTTON OPTION*/
        .wg-list-_500 .woo-addfav-btn.back-btn a ,.wg-list-_500 .woo-addcard-btn.back-btn a, .wg-list-_500 .woo-btns.back-btn   {background:!important;color:#ffffff!important;}
        .wg-list-_500 .woo-addfav-btn.back-btn a:hover ,.wg-list-_500 .woo-addcard-btn.back-btn a:hover , .wg-list-_500 .woo-btns.back-btn:hover {background:!important;color:#ffffff!important;}
        .wg-list-_500 .woo-addfav-btn.outline-btn a ,.wg-list-_500 .woo-addcard-btn.outline-btn a, .wg-list-_500 .woo-btns.outline-btn {border-color:!important;color:#ffffff!important;}
        .wg-list-_500 .woo-addfav-btn.outline-btn a:hover ,.wg-list-_500 .woo-addcard-btn.outline-btn a:hover {background:!important;border-color:!important;color:#ffffff!important;}
        /*TABLE FAV OPTION*/
        .wg-list-_500 .woo-addfav-btn i.pw-general-ad-search-unfavorite{}
        .wg-list-_500 .woo-addfav-btn:hover i.pw-general-ad-search-unfavorite{}
        .wg-list-_500 .woo-addfav-btn i.pw-general-ad-search-favorite{}
        .wg-list-_500 .woo-addfav-btn:hover i.pw-general-ad-search-favorite{}
        /*GRID SHADOW STYLES*/
        /*COLORED STYlE TEXT STYLE*/
        .wg-colored-_500 .woo-product-cnt {background:#ffffff!important;}
        .wg-colored-_500 .woo-product-delprice del , .wg-colored-_500 .woo-product-price{}
        .wg-colored-_500 .woo-product-title a{color:#e24725!important;font-size:20px!important;font-family:"Lora";}
        .wg-colored-_500 .woo-btns > div , .wg-colored-_500 .woo-btns > div a {color:#e24725!important; border-color:#e24725!important;}
        .wg-colored-_500 .woo-btns > div a:hover i  {color:#e24725!important;}
        .wg-colored-_500 .woo-product-title a:hover{color:#e24725!important;}
        .wg-colored-_500 .woo-product-desc{color:#e24725!important;font-size:13px!important;}
        .wg-colored-_500 .woo-product-category a,.wg-colored-_500 .woo-meta a,.wg-colored-_500 .woo-meta{color:#e24725!important;font-size:18px!important;font-family:"Lora";}
        .wg-colored-_500 .woo-product-category a:hover,.wg-colored-_500 .woo-meta a:hover{color:#e24725!important;}
        .wg-colored-_500, .wg-colored-_500 .wg-star-rating ,.wg-colored-_500 .wg-woocommerce-review-link   {color:#e24725!important;font-size:13px!important;}
        .wg-colored-_500 .woo-banner.sale-banner   {}
        .wg-colored-_500 .woo-banner.feature-banner   {}
        /*colored STYLE MARGIN AND PADDING AND RADIUS*/
        .wg-colored-_500 > div {margin-top:10px!important;margin-bottom:10px!important;padding-left:px!important;padding-right:px!important;}
        .wg-colored-_500 .woo-product-cnt {padding-top:0px!important;padding-bottom:0px!important;padding-right:0px!important;padding-left:0px!important;}
        .wg-colored-_500 .woo-product-cnt {border-top-width:0px!important;border-bottom-width:0px!important;border-right-width:0px!important;border-left-width:0px!important;border-color:#ffffff!important;border-style:solid!important;}
        .wg-colored-_500 .woo-product-cnt , wg-colored-_500 .woo-product-cnt img{}
        .wg-colored-_500 .woo-product-cnt .woo-overlay-cnt {}
        .wg-colored-_500 .woo-product-cnt .woo-banner.feature-banner {}
        .wg-colored-_500 .woo-product-cnt .woo-banner.sale-banner {}
        /*COLORED SHADOW STYLES*/
        /*colored FAV OPTION*/
        .wg-colored-_500 .woo-addfav i.pw-general-ad-search-unfavorite{}
        .wg-colored-_500 .woo-addfav:hover i.pw-general-ad-search-unfavorite{}
        .wg-colored-_500 .woo-addfav i.pw-general-ad-search-favorite{}
        .wg-colored-_500 .woo-addfav:hover i.pw-general-ad-search-favorite{}
        .loading-cnt{background:#ffffff !important;}
        .woo-grid-style .woo-desc-cnt .woo-product-title a{
            color:#e24725!important ;
        }
        @media (max-width: 768px) {
            .woo-grid-style .woo-desc-cnt .woo-product-desc{
                margin: 0 !important;
            }
            .touch .content {
                padding: 0 !important;
                margin-top: 120px !important;
            }
        }
    </style>
@endpush
@section('content')
    <div class="content " style="min-height: 400px !important;">
        <div class="content_inner  ">
            <!-- Google tag (gtag.js) -->
            <div class="container">
                <div class="container_inner default_template_holder" >
                    <div class="blog_single blog_holder">
                        <article id="post-19621" class="post-19621 post type-post status-publish format-standard has-post-thumbnail hentry category-design tag-design-boom">
                            <div class="post_content_holder" id="post_default_holder" >
                                <div id="post_image" style="    text-align: center;
                        ">						<img width="70%" src="{{asset('storage/'.$new->image)}}" class="attachment-full size-full wp-post-image" alt=""  sizes="(max-width: 2250px) 100vw, 2250px" />								</div>
                                <div class="post_text" id="text_default">
                                    <div class="post_text_inner">
                                        <h2 itemprop="name" class="entry_title">
                              <span style="font-size:23px;font-family: Montserrat !important;" itemprop="dateCreated" class="date entry_date updated">
                                 {{ $new->created_at->format('d-m-Y') }}
                                 <meta itemprop="interactionCount" content="UserComments: 0"/>
                              </span>
                                        </h2>
                                        <p style="font-size: 38px;font-family: Montserrat !important;
                              line-height: 38px;
                              font-weight: 600;line-height:40px;padding: 20px 0;
                              ">{{$new->title}}</p>

                                        <div id="post"     class="vc_row wpb_row section vc_row-fluid " style=' text-align:left;'>
                                           {!! $new->desc !!}
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div id="previous">PREVIOUS POST</div>
                            <script type="text/javascript">
                                jQuery(document).ready(function(){
                                    jQuery("#searh_form_toggle_content_500").show();
                                });
                            </script>
                            <div  class="search_form_toggle_cnt" id="searh_form_toggle_content_500">
                                <form id="pw_general_ad_grid_form_500" class="gt-searchform" action="#" method="post">
                                    <div class="woo-row">
                                        <input type="hidden" name="pw_sf_switch_fields" id="pw_sf_switch_fields" value=""><input type="hidden" name="pw_sf_post_type" id="pw_sf_post_type_500" value="post"><input type="hidden" name="pw_sf_rand_id" id="pw_sf_rand_id_500" value="_500"><input type="hidden" name="pw_sf_part" id="pw_sf_part" value="pw_general_ad_grid"><input type="hidden" name="pw_sf_display_type" id="pw_sf_display_type_500" value="style_1"><input type="hidden" name="pw_sf_grid_type" id="pw_sf_grid_type_500" value="grid"><input type="hidden" name="pw_sf_post_per_page" id="pw_sf_post_per_page" value="3"><input type="hidden" name="pw_sf_pagination_type" id="pw_sf_pagination_type" value="no_pagination"><input type="hidden" name="pw_sf_pagination_paged" id="pw_sf_pagination_paged_500" value="1"><input type="hidden" name="pw_sf_pagination_total_page" id="pw_sf_pagination_total_page_500" value=""><input type="hidden" name="pw_sf_target_element_id" id="pw_sf_target_element_id" value="pw_general_ad_grid_result_500"><input type="hidden" name="pw_sf_taxonomy" id="pw_sf_taxonomy" value=""><input type="hidden" name="pw_sf_taxonomy_id" id="pw_sf_taxonomy_id" value=""><input type="hidden" name="pw_sf_order" id="pw_sf_order_500" value="DESC" /><input type="hidden" name="pw_sf_shortcode_id" id="pw_sf_shortcode_id" value="17002"/>
                                    </div>
                                </form>
                            </div>
                            <div class="main-container-wrapper">
                                <div  class="woo-row woogrid woo-grid-style woo-grid-style-equal-height   wg-grid-_500" id="pw_general_ad_grid_result_500"></div>
                            </div>
                            <!--main-container-wrapper -->
                            <div class="main-container-wrapper">
                                <div id="pw_general_ad_grid_result_455_yoursearch" class="selected-result"></div>
                                <div id="pw_general_ad_grid_result_455_temp" style="display:none"></div>
                                <div class="woo-row woogrid woo-grid-style woo-grid-style-equal-height   wg-grid-_455" id="pw_general_ad_grid_result_455" style="display: block;">
                                    @foreach($nextPosts as $value)
                                        <div class="woo-col-md-4 woo-col-sm-4 woo-col-xs-12 grid-col">
                                            <div class="woo-product-cnt woo-grid-eff wg-bottom-desc">
                                                <div class="woo-thumb-cnt">
                                                    <a href="{{route('detailNews',['slug'=>$value->slug])}}" target="_self">
                                                        <div class="thumb-divback thumb-2-1 no_effect" style="background:url({{asset('storage/'.$value->image)}});">
                                                            <img src="{{asset('storage/'.$value->image)}}" alt="Bộ sưu tập MÂY từ vật liệu thủ công mỹ nghệ | LAITA Design">
                                                        </div>
                                                    </a>
                                                    <div class="woo-overlay-cnt thumb-2-1 no_effect">
                                                        <div class="woo-btns woo-squaricon">
                                                            <div class="woo-quickviewbtn" original-title="Quick View"><i class="fa fa-eye" data-property-id="19611"></i></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="woo-desc-cnt" >
                                                    <div class="woo-banner feature-banner" style="padding-top: 15px;
                                    margin-bottom: -15px;
                                    ">06.09.21</div>
                                                    <h3  class="woo-product-title"><a href="{{route('detailNews',['slug'=>$value->slug])}}" target="_self">{{$value->title}}</a></h3>
                                                    <div class="woo-product-desc">{{$value->sort}}...</div>
                                                </div>
                                                <!--- woo-desc-cnt-->
                                            </div>
                                        </div>
                                    @endforeach


                                </div>
                            </div>
                            <!-- Element to pop up -->
                            <div id="pw_general_ad_search_popup_main" style="display:none">
                     <span class="pw_general_ad_search_popup_button pw_general_ad_search_popup_close b-close">
                     <span><i class="fa fa-times"></i></span>
                     </span>
                                <div id="pw_general_ad_search_popup_content"></div>
                            </div>
                            <div id="back"><a href="/new"><span>BACK TO NEWS<span></a></div>
                            <div class="single_tags clearfix">
                                <div class="tags_text">
                                    <h5>Tags:</h5>
                                    <a href="../tag/design-boom/index.html" rel="tag">design boom</a>
                                </div>
                            </div>
                        </article>
                        <br/><br/>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
