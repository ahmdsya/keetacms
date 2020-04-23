@extends('layout.master')
@section('content')
	<!-- ##### Blog Area Start ##### -->
    <div class="blog-area section-padding-0-80" style="margin-top: 40px;">
        <div class="container">
            <div class="row">
                @if(count($search) >= 1)
                <div class="col-12 col-lg-12" style="margin-bottom: -70px;">
                    <div class="section-heading">
                        <h6>Search : {{$pencarian}}  ({{$search->total()}})</h6>
                    </div>
                </div>
                @else
                <div class="col-12 col-lg-12" style="margin-bottom: -70px;">
                    <div class="section-heading">
                        <h6>Tidak ada data terkait untuk pencarian : {{$pencarian}}</h6>
                    </div>
                </div>
                @endif
                <div class="col-12 col-lg-8">
                    <div class="blog-posts-area">
                        <!-- Single Featured Post -->
                        @foreach($search as $data)
                        <div class="single-blog-post featured-post mb-30">
                            <div class="post-thumb">
                                <a href="{{route('frontend.single.post', [$data->id, $data->slug])}}"><img src="{{asset($data->gambar)}}" alt=""></a>
                            </div>
                            <div class="post-data">
                                <a href="{{route('frontend.category.post', $data->nama)}}" class="post-catagory">{{$data->nama}}</a>
                                <a href="{{route('frontend.single.post', [$data->id, $data->slug])}}" class="post-title">
                                    <h6>{{$data->judul}}</h6>
                                </a>
                                <div class="post-meta">
                                    <!-- <p class="post-author">By <a href="#">Christinne Williams</a></p> -->
                                    {!! substr($data->isi,0,500) !!}...
                                    <!-- Post Like & Post Comment -->
                                    <div class="d-flex align-items-center">
                                        <a href="#" class="post-like"><img src="{{themes('img/core-img/like.png')}}" alt=""> <span>{{$data->hits}}</span></a>
                                        <a href="#" class="post-comment"><img src="{{themes('img/core-img/chat.png')}}" alt=""> <span>{{commentCount($data->id)}}</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>

                    {{$search->links()}}

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