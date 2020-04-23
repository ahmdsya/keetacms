@extends('layout.master')
@section('content')

    @if(count($artikels) >= 3)
    <!-- ##### Featured Post Area Start ##### -->
    <div class="featured-post-area" style="margin-top: 40px;">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12" style="margin-bottom: -70px;">
                    <div class="section-heading">
                        <h6>Artikel Terpopuler</h6>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-8">
                    <div class="row">

                        @foreach(trandingPost(1,0) as $trandingPost)
                        <!-- Single Featured Post -->
                        <div class="col-12 col-lg-7">
                            <div class="single-blog-post featured-post">
                                <div class="post-thumb">
                                    <a href="{{route('frontend.single.post', [$trandingPost->id,$trandingPost->slug])}}"><img src="{{ asset($trandingPost->gambar) }}" alt=""></a>
                                </div>
                                <div class="post-data">
                                    <a href="{{route('frontend.category.post', $trandingPost->kslug)}}" class="post-catagory">{{$trandingPost->nama}}</a>
                                    <a href="{{route('frontend.single.post', [$trandingPost->id,$trandingPost->slug])}}" class="post-title">
                                        <h6>{{$trandingPost->judul}}</h6>
                                    </a>
                                    <div class="post-meta">
                                        <!-- <p class="post-author">By <a href="#">Christinne Williams</a></p> -->
                                        {!! substr($trandingPost->isi,0,500) !!}...
                                        <!-- Post Like & Post Comment -->
                                        <div class="d-flex align-items-center">
                                            <a href="#" class="post-like"><img src="{{ themes('img/core-img/like.png') }}" alt=""> <span>{{$trandingPost->hits}}</span></a>
                                            <a href="#" class="post-comment"><img src="{{ themes('img/core-img/chat.png') }}" alt=""> <span>{{commentCount($trandingPost->id)}}</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                        <div class="col-12 col-lg-5">
                            @foreach(trandingPost(2,1) as $trandingPost)
                            <!-- Single Featured Post -->
                            <div class="single-blog-post featured-post-2">
                                <div class="post-thumb">
                                    <a href="{{route('frontend.single.post', [$trandingPost->id,$trandingPost->slug])}}"><img src="{{ asset($trandingPost->gambar) }}" alt=""></a>
                                </div>
                                <div class="post-data">
                                    <a href="{{route('frontend.category.post', $trandingPost->kslug)}}" class="post-catagory">{{$trandingPost->nama}}</a>
                                    <div class="post-meta">
                                        <a href="{{route('frontend.single.post', [$trandingPost->id,$trandingPost->slug])}}" class="post-title">
                                            <h6>{{$trandingPost->judul}}</h6>
                                        </a>
                                        <!-- Post Like & Post Comment -->
                                        <div class="d-flex align-items-center">
                                            <a href="#" class="post-like"><img src="{{ themes('img/core-img/like.png') }}" alt=""> <span>{{$trandingPost->hits}}</span></a>
                                            <a href="#" class="post-comment"><img src="{{ themes('img/core-img/chat.png') }}" alt=""> <span>{{commentCount($trandingPost->id)}}</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4">
                    <!-- Single Featured Post -->
                    @foreach(latePost(6) as $latePost)
                    <div class="single-blog-post small-featured-post d-flex">
                        <div class="post-thumb">
                            <a href="{{route('frontend.single.post', [$latePost->id, $latePost->slug])}}"><img src="{{ asset($latePost->gambar) }}" alt="" style="height: 90px;"></a>
                        </div>
                        <div class="post-data">
                            <a href="{{route('frontend.category.post', $latePost->kslug)}}" class="post-catagory">{{$latePost->nama}}</a>
                            <div class="post-meta">
                                <a href="{{route('frontend.single.post', [$latePost->id, $latePost->slug])}}" class="post-title">
                                    <h6>{{$latePost->judul}}</h6>
                                </a>
                                <p class="post-date"><span>{{ date('F d, Y' , strtotime($latePost->created_at)) }}</span></p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Featured Post Area End ##### -->
    @endif

    <!-- ##### Popular News Area Start ##### -->
    <div class="popular-news-area section-padding-80-50">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="section-heading">
                        <h6>Artikel Terbaru</h6>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-8">
                    <div class="row">
                        @foreach($artikels as $artikel)
                        <!-- Single Post -->
                        <div class="col-12 col-lg-6">
                            <div class="single-blog-post style-3">
                                <div class="post-thumb">
                                    <a href="{{route('frontend.single.post', [$artikel->id,$artikel->slug])}}"><img src="{{ asset($artikel->gambar) }}" alt=""></a>
                                </div>
                                <div class="post-data">
                                    <a href="{{route('frontend.category.post', $artikel->kslug)}}" class="post-catagory">{{$artikel->nama}}</a>
                                    <a href="{{route('frontend.single.post', [$artikel->id,$artikel->slug])}}" class="post-title">
                                        <h6>
                                            {{$artikel->judul}}
                                        </h6>
                                    </a>
                                    <div class="post-meta d-flex align-items-center">
                                        <a href="#" class="post-like"><img src="{{ themes('img/core-img/like.png') }}" alt=""> <span>{{$artikel->hits}}</span></a>
                                        <a href="#" class="post-comment"><img src="{{ themes('img/core-img/chat.png') }}" alt=""> <span>{{commentCount($artikel->id)}}</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div style="margin: 30px;">
                        {{$artikels->links()}}
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="popular-news-widget mb-50">
                        <h3>Popular Post</h3>
                        <!-- Single Popular Blog -->
                        @foreach(popularPost(4) as $popularPost => $popular)
                        <div class="single-popular-post">
                            <a href="{{route('frontend.single.post', [$popular->id, $popular->slug])}}">
                                <h6><span>{{$popularPost+1}}.</span>{{$popular->judul}}</h6>
                            </a>
                            <p>{{ date('F d, Y' , strtotime($popular->created_at)) }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Popular News Area End ##### -->

@endsection