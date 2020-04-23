@extends('layout.master')
@section('content')
	<!-- ##### Blog Area Start ##### -->
    <div class="blog-area section-padding-0-80" style="margin-top: 40px;">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12" style="margin-bottom: -70px;">
                    <div class="section-heading">
                        <h6>Kategori : {{$category->nama}}  ({{$categoryPost->total()}})</h6>
                    </div>
                </div>
                <div class="col-12 col-lg-8">
                    <div class="blog-posts-area">
                        <!-- Single Featured Post -->
                        @foreach($categoryPost as $catPost)
                        <div class="single-blog-post featured-post mb-30">
                            <div class="post-thumb">
                                <a href="{{route('frontend.single.post', [$catPost->id, $catPost->slug])}}"><img src="{{asset($catPost->gambar)}}" alt=""></a>
                            </div>
                            <div class="post-data">
                                <a href="{{route('frontend.category.post', $category->slug)}}" class="post-catagory">{{$category->nama}}</a>
                                <a href="{{route('frontend.single.post', [$catPost->id, $catPost->slug])}}" class="post-title">
                                    <h6>{{$catPost->judul}}</h6>
                                </a>
                                <div class="post-meta">
                                    <!-- <p class="post-author">By <a href="#">Christinne Williams</a></p> -->
                                    {!! substr($catPost->isi,0,500) !!}...
                                    <!-- Post Like & Post Comment -->
                                    <div class="d-flex align-items-center">
                                        <a href="#" class="post-like"><img src="{{themes('img/core-img/like.png')}}" alt=""> <span>{{$catPost->hits}}</span></a>
                                        <a href="#" class="post-comment"><img src="{{themes('img/core-img/chat.png')}}" alt=""> <span>{{commentCount($catPost->id)}}</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>

                    {{$categoryPost->links()}}

                    <!-- <nav aria-label="Page navigation example">
                        <ul class="pagination mt-50">
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                            <li class="page-item"><a class="page-link" href="#">5</a></li>
                            <li class="page-item"><a class="page-link" href="#">...</a></li>
                            <li class="page-item"><a class="page-link" href="#">10</a></li>
                        </ul>
                    </nav> -->
                </div>
                @include('partial._sidebar')
            </div>
        </div>
    </div>
    <!-- ##### Blog Area End ##### -->
@endsection