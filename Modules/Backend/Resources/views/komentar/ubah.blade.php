@extends('layouts.master')
@section('tittle', __('Ubah Komentar - KeetaCMS Admin'))
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
          <h3 class="box-title">{{ __('Ubah Komentar')}}</h3>

        </div>
        <form class="form-horizontal" method="POST" action="{{route('komentar.update', $komentar->id)}}">
        	@csrf
        	@method('PUT')
        <div class="box-body">
        	<div class="form-group">
				<label for="nama" class="col-sm-2 control-label">Nama</label>

			<div class="col-sm-6">
				<input type="text" class="form-control" id="nama" name="nama" value="{{$komentar->nama}}">
			</div>
			</div>
			<div class="form-group">
				<label for="email" class="col-sm-2 control-label">Email</label>

			<div class="col-sm-6">
				<input type="email" class="form-control" id="email" name="email" value="{{$komentar->email}}">
			</div>
			</div>
			<div class="form-group">
				<label for="website" class="col-sm-2 control-label">Website</label>

			<div class="col-sm-6">
				<input type="text" class="form-control" id="website" name="website" value="{{$komentar->website}}">
			</div>
			</div>
			<div class="form-group">
				<label for="website" class="col-sm-2 control-label">Komentar</label>

			<div class="col-sm-6">
				<textarea class="form-control" name="content">{{$komentar->content}}</textarea>
			</div>
			</div>
			<div class="form-group">
				<label for="website" class="col-sm-2 control-label">Status</label>

			<div class="col-sm-6">
				<select class="form-control" name="publikasi">
					<option value="1" {{($komentar->publikasi == 1 ? 'selected' : '')}}>Publish</option>
					<option value="0" {{($komentar->publikasi == 0 ? 'selected' : '')}}>Pending</option>
				</select>
			</div>
			</div>
			<div class="form-group">
				<label for="website" class="col-sm-2 control-label"></label>

			<div class="col-sm-6">
				<button type="submit" class="btn btn-sm btn-primary">Simpan</button>
				<a href="{{route('komentar.index')}}" class="btn btn-sm btn-warning">Kembali</a>
			</div>
			</div>
        </div>
    	</form>
      </div>
  </section>

@endsection