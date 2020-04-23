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
                                <a href="#"><img src="{{asset($singlePost->gambar)}}" alt=""></a>
                            </div>
                            <div class="post-data">
                                <a href="{{route('frontend.category.post', $singlePost->kslug)}}" class="post-catagory">{{$singlePost->nama}}</a>
                                <a href="#" class="post-title">
                                    <h6>{{$singlePost->judul}}</h6>
                                </a>
                                <div class="post-meta">
                                    <!-- <p class="post-author">By <a href="#">Christinne Williams</a></p> -->
                                    {!! $singlePost->isi !!}
                                    <div class="newspaper-post-like d-flex align-items-center justify-content-between">
                                        <!-- Tags -->
                                        <!-- <div class="newspaper-tags d-flex">
                                            <span>Tags:</span>
                                            <ul class="d-flex">
                                                <li><a href="#">finacial,</a></li>
                                                <li><a href="#">politics,</a></li>
                                                <li><a href="#">stock market</a></li>
                                            </ul>
                                        </div> -->

                                        <!-- Post Like & Post Comment -->
                                        <div class="d-flex align-items-center post-like--comments">
                                            <a href="#" class="post-like"><img src="{{themes('img/core-img/like.png')}}" alt=""> <span>{{$singlePost->hits}}</span></a>
                                            <a href="#" class="post-comment"><img src="{{themes('img/core-img/chat.png')}}" alt=""> <span>{{commentCount($singlePost->id)}}</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="section-heading">
                            <h6>Related</h6>
                        </div>

                        <div class="row">
                            @foreach(relatedPost($singlePost->kategori, 2) as $relatedPost)
                            <!-- Single Post -->
                            <div class="col-12 col-md-6">
                                <div class="single-blog-post style-3 mb-80">
                                    <div class="post-thumb">
                                        <a href="{{route('frontend.single.post', [$relatedPost->id,$relatedPost->slug])}}"><img src="{{ asset($relatedPost->gambar) }}" alt=""></a>
                                    </div>
                                    <div class="post-data">
                                        <a href="{{route('frontend.category.post', $relatedPost->kslug)}}" class="post-catagory">{{$relatedPost->nama}}</a>
                                        <a href="{{route('frontend.single.post', [$relatedPost->id,$relatedPost->slug])}}" class="post-title">
                                            <h6>{{$relatedPost->judul}}</h6>
                                        </a>
                                        <div class="post-meta d-flex align-items-center">
                                            <a href="#" class="post-like"><img src="{{themes('img/core-img/like.png')}}" alt=""> <span>{{$relatedPost->hits}}</span></a>
                                            <a href="#" class="post-comment"><img src="{{themes('img/core-img/chat.png')}}" alt=""> <span>{{commentCount($relatedPost->id)}}</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        
                        @if(setting('show_comment') == 'Y')
                            @if($singlePost->show_comment == 1)
                                @include('partial._comment')
                            @endif
                        @endif

                    </div>
                </div>

                @include('partial._sidebar')

            </div>
        </div>
    </div>
    <!-- ##### Blog Area End ##### -->

@endsection