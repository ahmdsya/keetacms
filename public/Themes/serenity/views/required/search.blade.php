@extends('layout.master')
@section('breadcrumb_tittle', __('Search : ').$pencarian)
@section('breadcrumb_map', $pencarian)
@section('content')

          <div class="row">
          @foreach($search as $artikel)
          <div class="col-lg-4  col-md-6 d-flex align-items-stretch mt-4" data-aos="fade-up">
            <article class="entry">

              <div class="entry-img">
                <img src="{{ asset($artikel->gambar) }}" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <a href="{{route('frontend.single.post', [$artikel->id,$artikel->slug])}}">{{$artikel->judul}}</a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="icofont-tag"></i> <a href="{{route('frontend.category.post', $artikel->slug)}}">{{$artikel->nama}}</a></li>
                  <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a href="{{route('frontend.single.post', [$artikel->id,$artikel->slug])}}"><time datetime="2020-01-01">{{ date('F d, Y' , strtotime($artikel->created_at)) }}</time></a></li>
                </ul>
              </div>

              <div class="entry-content">
                {!! substr($artikel->isi,0,200) !!}
                <div class="read-more">
                  <a href="{{route('frontend.single.post', [$artikel->id,$artikel->slug])}}">{{ __('Selengkapnya')}}</a>
                </div>
              </div>

            </article>
          </div>
          @endforeach

        </div>

        <!-- <div class="blog-pagination" data-aos="fade-up">
          <ul class="justify-content-center">
            <li class="disabled"><i class="icofont-rounded-left"></i></li>
            <li><a href="#">1</a></li>
            <li class="active"><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#"><i class="icofont-rounded-right"></i></a></li>
          </ul>
        </div>-->
@endsection