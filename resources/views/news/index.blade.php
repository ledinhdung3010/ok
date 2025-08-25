@extends('layout.app')

@section('title', 'News')
@push('style')
    <style>
        @media (max-width: 768px) {
            .post_info{
                margin-top: 20px !important;
            }
            .content{
                padding-bottom: 0 !important;
            }
            .blog_holder article{
                margin-bottom: 20px !important;
            }
        }


    </style>
@endpush
@section('content')
    <div class="content ">
        <div class="content_inner  ">
            <!-- Google tag (gtag.js) -->
            <div class="container">
                <div class="container_inner default_template_holder clearfix">
                    <div class="blog_holder blog_large_image">
                        @foreach($news as $value)
                            <article id="post-19621" class="post-19621 post type-post status-publish format-standard has-post-thumbnail hentry category-design tag-design-boom">
                                <div class="post_content_holder" style="border-bottom: 1px solid #e24725;
               margin: auto;
               ">
                                    <div class="row" id="post_row_all" style="margin-top:0px;margin-bottom:20px;display: flex;height:100%;">
                                        <div class="col-sm-3" >
                                            <div class="post_image">
                                                <a  style="width:100%;" itemprop="url" href="{{route('detailNews',['slug'=>$value->slug])}}" title="{{$value->title}}">
                                                    <img  src="{{asset('storage/'.$value->image)}}" class="attachment-large size-large wp-post-image" alt=""  sizes="(max-width: 1024px) 100vw, 1024px" />						</a>
                                            </div>
                                        </div>
                                        <div class="col-sm-9" id="news" style="width:60%; margin-left:5%;">
                                            <div class="post_text_inner" >
                                                <h2 itemprop="name" class="entry_title"> <a itemprop="url" href="{{route('detailNews',['slug'=>$value->slug])}}" title="10 iF design award 2021 winners that boost creativity in home offices">{{$value->title}}</a></h2>
                                                <p style="margin-top: 20px !important;" itemprop="description" class="post_excerpt">{{$value->sort}}... <a style="font-weight:600;" itemprop="url" href="{{route('detailNews',['slug'=>$value->slug])}}"  >read more</a></p>
                                            </div>
                                            <div class="post_info" style="margin-top: 40px">
                        <span class="source" style="
                           font-weight: 400;"><span>Nguồn:</span> <span style='text-transform: capitalize;'>CREATIVE INTELLIGENT SOLUTIONS</span></span> | <span class="time" style=""> {{ $value->created_at->format('d-m-Y') }}
</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
