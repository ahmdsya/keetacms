@extends('layout.master')
@section('content')

    <!-- ##### Blog Area Start ##### -->
    <div class="blog-area section-padding-0-80" style="margin-top: 40px;">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="blog-posts-area">

                        <!-- Single Featured Post -->
                        <div class="single-blog-post featured-post single-post">
                            <div class="post-thumb">
                                <a href="#"><img src="{{asset($singlePage->gambar)}}" alt=""></a>
                            </div>
                            <div class="post-data">
                                <a href="#" class="post-title">
                                    <h6>{{$singlePage->judul}}</h6>
                                </a>
                                <div class="post-meta">
                                    <!-- <p class="post-author">By <a href="#">Christinne Williams</a></p> -->
                                    {!! $singlePage->isi !!}
                                    <div class="newspaper-post-like d-flex align-items-center justify-content-between">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @include('partial._sidebar')

            </div>
        </div>
    </div>
    <!-- ##### Blog Area End ##### -->

@endsection