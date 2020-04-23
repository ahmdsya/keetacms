@extends('layouts.master')
@section('tittle', __('Balas Komentar - KeetaCMS Admin'))
@section('konten')

  <section class="content">
  	@if(session('sukses'))
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              {{session('sukses')}}
          </div>
          @endif
    <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">{{ __('Balas Komentar')}}</h3>

        </div>
        <form class="form-horizontal" method="POST" action="{{route('admin.balas.komentar', $komentar->id)}}">
        	@csrf
        <div class="box-body">
        	<input type="hidden" name="post_id" value="{{$komentar->post_id}}">
        	<div class="form-group">
				<label for="nama" class="col-sm-2 control-label">Nama</label>

			<div class="col-sm-6">
				<input type="text" class="form-control" id="nama" value="{{$komentar->nama}}" readonly>
			</div>
			</div>
			<div class="form-group">
				<label for="email" class="col-sm-2 control-label">Email</label>

			<div class="col-sm-6">
				<input type="email" class="form-control" id="email" value="{{$komentar->email}}" readonly>
			</div>
			</div>
			<div class="form-group">
				<label for="website" class="col-sm-2 control-label">Website</label>

			<div class="col-sm-6">
				<input type="text" class="form-control" id="website" value="{{$komentar->website}}" readonly>
			</div>
			</div>
			<div class="form-group">
				<label for="website" class="col-sm-2 control-label">Komentar</label>

			<div class="col-sm-6">
				<textarea class="form-control" readonly>{{$komentar->content}}</textarea>
				<hr>
			</div>
			</div>
			<div class="form-group">
				<label for="website" class="col-sm-2 control-label">Balas Komentar</label>

			<div class="col-sm-6">
				<textarea class="form-control" name="content" placeholder="Balas komentar..."></textarea>
			</div>
			</div>
			<div class="form-group">
				<label for="website" class="col-sm-2 control-label"></label>

			<div class="col-sm-6">
				<button type="submit" class="btn btn-sm btn-primary">Balas</button>
				<a href="{{route('komentar.index')}}" class="btn btn-sm btn-warning">Kembali</a>
			</div>
			</div>
        </div>
    	</form>
      </div>
  </section>

@endsection