@extends('layout.master')
@section('breadcrumb_tittle', __('Page Detail'))
@section('breadcrumb_map', $singlePage->judul)
@section('content')

    <div class="row">

          <div class="col-lg-8 entries">

            <article class="entry entry-single">

              <div class="entry-img">
                <img src="{{asset($singlePage->gambar)}}" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <a href="#">{{$singlePage->judul}}</a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a href="#"><time datetime="2020-01-01">{{ date('F d, Y' , strtotime($singlePage->created_at)) }}</time></a></li>
                </ul>
              </div>

              <div class="entry-content">
                
                {!! $singlePage->isi !!}

            </article><!-- End blog entry -->

          </div><!-- End blog entries list -->

          @include('partial._sidebar')

        </div>

@endsection