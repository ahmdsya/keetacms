@extends('layouts.master')
@section('tittle', __('Dashboard - KeetaCMS Admin'))
@section('konten')

  <!-- Main content -->
    <section class="content">
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-home"></i> {{ __('SELAMAT DATANG')}}</h4>
            {{ __('Keeta CMS adalah Content Managament System yang dapat digunakan untuk membuat Web Blog atau Web Portal berita.')}}
      </div>
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{count($artikel)}}</h3>

              <p>{{ __('Artikel')}}</p>
            </div>
            <div class="icon">
              <i class="fa fa-newspaper-o"></i>
            </div>
            <a href="{{route('artikel.index')}}" class="small-box-footer">{{ __('Selengkapnya')}} <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{count($halaman)}}</h3>

              <p>{{ __('Halaman')}}</p>
            </div>
            <div class="icon">
              <i class="fa fa-clone"></i>
            </div>
            <a href="{{route('halaman.index')}}" class="small-box-footer">{{ __('Selengkapnya')}} <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{count($admin)}}</h3>

              <p>{{ __('Pengguna')}}</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="{{route('admin.show')}}" class="small-box-footer">{{ __('Selengkapnya')}} <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-md-8">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">{{ __('Artikel Terpopuler')}}</h3>
            </div>
            <div class="box-body">
              <ul class="products-list product-list-in-box">
                @foreach(trandingPost(3,0) as $trandingPost)
                <li class="item">
                  <div class="product-img">
                    <img src="{{asset($trandingPost->gambar)}}" style="width: 100px;height: 58px;margin-right: 25px;">
                  </div>
                  <div class="product-info">
                    <span class="label label-warning">{{$trandingPost->nama}}</span><br>
                    <a href="{{route('frontend.single.post', [$trandingPost->id,$trandingPost->slug])}}" target="blank" class="product-title">{{ substr($trandingPost->judul,0,95) }}</a>
                    <span class="product-description">
                        {{ date('F d, Y' , strtotime($trandingPost->created_at)) }}
                    </span>
                  </div>
                </li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>

        <div class="col-md-4">

          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-bars"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">{{ __('Kategori')}}</span>
              <span class="info-box-number">{{count($kategori)}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->

          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-comments-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">{{ __('Komentar')}}</span>
              <span class="info-box-number">{{count($komentar)}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->

          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-desktop"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">{{ __('Tema')}}</span>
              <span class="info-box-number">{{count($tema)}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->

        </div>
      </div>
    </section>

@endsection