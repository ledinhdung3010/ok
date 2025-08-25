@extends('layout.app')

@section('title', $title)

@push('style')
    <style>
        /* Ẩn block chèn khoảng trắng của WPBakery nếu không cần */
        .vc_empty_space { display: none !important; }

        /* Giảm khoảng cách dọc tổng thể */
        .content { padding-bottom: 24px; }
        .full_width_inner { padding-top: 0; }

        /* Tinh chỉnh khoảng cách cho portfolio */
        .projects_holder_outer { margin-bottom: 16px; }
        .projects_holder.portfolio_main_holder { gap: 16px; }
        .portfolio_description { margin-top: 8px; padding: 8px 0; }

        /* Sửa style ảnh/khung ảnh cho đồng đều */
        .image_holder .image { display: block; }
        .image_holder .image img {
            display: block;
            width: 100%;
            height: auto;
            object-fit: cover;
        }

        /* Mobile */
        @media (max-width: 768px) {
            .content { padding-bottom: 0 !important; }
            .projects_holder.portfolio_main_holder { gap: 12px; }
            .portfolio_description { margin-top: 6px; padding: 6px 0; }
        }

    </style>
@endpush

@section('content')
    <div class="content">
        <div class="content_inner">
            <div class="full_width">
                <div class="full_width_inner">
                    <div id="about" class="vc_row wpb_row section vc_row-fluid" style="text-align:left;">
                        <div class="full_section_inner clearfix">

                            <div class="wpb_column vc_column_container vc_col-sm-12">
                                <div class="vc_column-inner">
                                    <div class="wpb_wrapper">

                                        {{-- Nếu cần giữ chỗ, có thể để lại nhưng đã ẩn bằng CSS ở trên --}}
                                        <div class="vc_empty_space">
                    <span class="vc_empty_space_inner">
                      <span class="empty_space_image"></span>
                    </span>
                                        </div>

                                        <div class="projects_holder_outer v5 portfolio_with_space portfolio_standard">
                                            <div class="projects_holder portfolio_main_holder clearfix v5 standard portfolio_full_image">
                                                @foreach($post as $value)
                                                    @php
                                                        $images = explode(',', $value->image); // Tách chuỗi thành mảng
                                                        $firstImage = trim($images[0] ?? '');  // Ảnh đầu tiên
                                                    @endphp

                                                    <article class="mix portfolio_category_615 portfolio_category_69">
                                                        <div class="item_holder slow_zoom">
                                                            <div class="icons_holder"></div>

                                                            <a itemprop="url"
                                                               class="portfolio_link_class"
                                                               title="{{ $value->title }}"
                                                               href="{{ route('detailPost', ['slug' => $value->slug]) }}">
                                                            </a>

                                                            <div class="portfolio_shader" style="background-color: rgba(255,255,255,0.89)"></div>

                                                            <div class="image_holder">
                              <span class="image">
                                <img
                                    width="3000"
                                    height="3000"
                                    src="{{ asset($firstImage) }}"
                                    class="attachment-full size-full wp-post-image"
                                    alt="{{ $value->title }}"
                                    sizes="(max-width: 3000px) 100vw, 3000px"
                                />
                              </span>
                                                            </div>
                                                        </div>

                                                        <div class="portfolio_description" style="background-color:#ffffff;">
                                                            <h5 class="portfolio_title entry_title" itemprop="name" style="text-align:center;">
                                                                <a itemprop="url"
                                                                   href="{{ route('detailPost', ['slug' => $value->slug]) }}"
                                                                   target="_self">
                                                                    {{ $value->title }}
                                                                </a>
                                                            </h5>
                                                        </div>
                                                    </article>
                                                @endforeach
                                            </div>
                                        </div>

                                    </div> <!-- .wpb_wrapper -->
                                </div>
                            </div>

                        </div> <!-- .full_section_inner -->
                    </div>
                </div>
            </div>

            <div class="qode-inter-page-navigation-holder">
                <div class="qode-inter-page-navigation-inner">
                    <div class="qode-inter-page-navigation-prev"></div>
                    <div class="qode-inter-page-navigation-next"></div>
                </div>
            </div>

        </div>
    </div>
@endsection

@push('script')
@endpush
