@extends('layouts.master')
@section('tittle', __('Menu Manager - KeetaCMS Admin'))
@section('konten')

  <section class="content">
  	<div class="row">
  		<div class="col-md-12">
  			@if(session('sukses'))
	        <div class="alert alert-success alert-dismissible">
	            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	              {{session('sukses')}}
			</div>
			@endif
  		</div>
  		<div class="col-md-4">
		      <!-- /.box -->
	          <div class="box box-solid">
	            <div class="box-header with-border">
	              <h3 class="box-title">{{ __('Tambah Menu')}}</h3>
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body">
	              <div class="box-group" id="accordion">
	                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
	                <div class="panel box box-primary">
	                  <div class="box-header with-border">
	                    <h4 class="box-title">
	                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
	                        {{ __('Tautan')}}
	                      </a>
	                    </h4>
	                  </div>
	                  <div id="collapseOne" class="panel-collapse collapse in">
	                    <div class="box-body">
	                      <form method="POST" action="{{route('menu.store')}}">
			                @csrf
			                <input type="hidden" id="id">
			                <input type="hidden" name="type" value="Tautan">
			            	<div class="form-group">
			            		<label for="menu">{{ __('Menu')}}</label>
				            	<input type="text" id="menu" name="menu" class="form-control" placeholder="Beranda" required>
				            </div>
				            <div class="form-group">
				            	<label for="link">{{ __('Link')}}</label>
				            	<input type="text" id="link" class="form-control" name="link" placeholder="http://example.com/" required>
				            </div>
			              <button type="submit" id="submit" class="btn btn-primary btn-sm pull-right">{{ __('Tambah')}}</button>
			              </form>
	                    </div>
	                  </div>
	                </div>
	                <div class="panel box box-success">
	                  <div class="box-header with-border">
	                    <h4 class="box-title">
	                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
	                        {{ __('Halaman')}}
	                      </a>
	                    </h4>
	                  </div>
	                  <div id="collapseTwo" class="panel-collapse collapse">
	                    <div class="box-body">
	                    	<form method="POST" action="{{route('menu.store')}}">
			                @csrf
			                  <input type="hidden" name="type" value="Halaman">
		                      <div class="form-group">
				              @foreach($halaman as $h)
				                <label>
				                  <input type="checkbox" class="flat-red" value="{{$h->id}}" name="halaman[]">
				                   {{$h->judul}}
				                </label> <br>
				              @endforeach
				              </div>
				              <button type="submit" class="btn btn-primary btn-sm pull-right">{{ __('Tambah')}}</button>
				            </form>
	                    </div>
	                  </div>
	                </div>
	                <div class="panel box box-warning">
	                  <div class="box-header with-border">
	                    <h4 class="box-title">
	                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
	                        {{ __('Kategori')}}
	                      </a>
	                    </h4>
	                  </div>
	                  <div id="collapseThree" class="panel-collapse collapse">
	                    <div class="box-body">
	                    	<form method="POST" action="{{route('menu.store')}}">
			                @csrf
			                  <input type="hidden" name="type" value="Kategori">
		                      <div class="form-group">
				              @foreach($kategori as $k)
				                <label>
				                  <input type="checkbox" class="flat-red" value="{{$k->id}}" name="kategori[]">
				                   {{$k->nama}}
				                </label> <br>
				              @endforeach
				              </div>
				              <button type="submit" class="btn btn-primary btn-sm pull-right">{{ __('Tambah')}}</button>
				            </form>
	                    </div>
	                  </div>
	                </div>
	              </div>
	            </div>
	            <!-- /.box-body -->
	          </div>
	          <!-- /.box -->
  		</div>
  		<div class="col-md-8">
  			<div class="box">
		        <div class="box-header with-border">
		          <h3 class="box-title">{{ __('Atur Menu')}}</h3>
		        </div>
		        <div class="box-body">
		        	<div class="dd" id="nestable" style="width: 100%;margin-bottom: 20px;">
						{!! $getNestable !!}
					</div>
                	<form method="POST" action="{{route('menu.update', 0)}}">
		        	@csrf
		        	@method('PUT')
						<input type="hidden" name="data" id="nestable-output">
		        		<button type="submit" class="btn btn-primary btn-sm" id="save">{{ __('Simpan')}}</button>
		        	</form>
		        </div>
		        <!-- /.box-body -->
		    </div>
		      <!-- /.box -->
  		</div>
  	</div>
  </section>

@endsection