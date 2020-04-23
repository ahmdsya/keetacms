@extends('layout.master')
@section('breadcrumb_tittle', __('Post Detail'))
@section('breadcrumb_map', $singlePost->judul)
@section('content')

    <div class="row">

          <div class="col-lg-8 entries">

            <article class="entry entry-single">

              <div class="entry-img">
                <img src="{{asset($singlePost->gambar)}}" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <a href="{{route('frontend.single.post', [$singlePost->id,$singlePost->slug])}}">{{$singlePost->judul}}</a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a href="#"><time datetime="2020-01-01">{{ date('F d, Y' , strtotime($singlePost->created_at)) }}</time></a></li>
                  <li class="d-flex align-items-center"><i class="icofont-eye"></i> <a href="#">{{$singlePost->hits}} Views</a></li>
                  <li class="d-flex align-items-center"><i class="icofont-comment"></i> <a href="#">{{commentCount($singlePost->id)}} Comments</a></li>
                </ul>
              </div>

              <div class="entry-content">
                
                {!! $singlePost->isi !!}

              <div class="entry-footer clearfix">
                <div class="float-left">
                  <i class="icofont-folder"></i>
                  <ul class="cats">
                    <li><a href="{{route('frontend.category.post', $singlePost->kslug)}}">{{$singlePost->nama}}</a></li>
                  </ul>

                </div>

              </div>

            </article><!-- End blog entry -->

            @include('partial._comment')

          </div><!-- End blog entries list -->

          @include('partial._sidebar')

        </div>

@endsection