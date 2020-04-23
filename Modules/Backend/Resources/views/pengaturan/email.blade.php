@extends('layouts.master')
@section('tittle', __('Pengaturan Email - KeetaCMS Admin'))
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
          <h3 class="box-title">{{ __('Pengaturan Email')}}</h3>

        </div>
        <div class="box-body"> 
        	<div style="margin-left: 50px;margin-right: 50px;">         	
          	<table class="table table-striped">
          		<thead>
          			<tr>
          				<th width="220">KEY</th>
          				<th>VALUE</th>
          				<th width="100">ACTION</th>
          			</tr>
          		</thead>
          		<tbody>
          			@foreach($pengaturan as $setting)
          			<tr>
          				<th>{{$setting->key}}</th>
          				<td>{{($setting->value)}}</td>
          				<td>
          					<button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-{{$setting->id}}">Ubah</button>
          				</td>
          			</tr>

          			<!-- MODAL -->
          			<div class="modal fade" id="modal-{{$setting->id}}">
	                    <div class="modal-dialog">
	                      <div class="modal-content">
	                        <div class="modal-header">
	                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                            <span aria-hidden="true">&times;</span></button>
	                          <h4 class="modal-title">{{ __('Ubah Pengaturan')}}</h4>
	                        </div>
	                        <form method="POST" action="{{route('email.update', $setting->id)}}">
	                            @csrf
	                            @method('PUT')
	                        <div class="modal-body">
	                          	<div class="form-group">
		                          <label for="key">{{ __('KEY')}}</label>
		                          	<input type="text" id="key" name="key" class="form-control" value="{{$setting->key}}" readonly="">
	                        	</div>
	                        	<div class="form-group">
		                          <label for="value">{{ __('VALUE')}}</label>
		                          	<input type="text" id="value" name="value" class="form-control" value="{{$setting->value}}">
	                        	</div>
	                        </div>
	                        <div class="modal-footer">
	                          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">{{ __('Batal')}}</button>
	                          <button type="submit" class="btn btn-primary">{{ __('Simpan')}}</button>
	                        </div>
	                        </form>
	                      </div>
	                      <!-- /.modal-content -->
	                    </div>
	                    <!-- /.modal-dialog -->
	                  </div>
	                  <!-- /.modal -->

          			@endforeach
          		</tbody>
          	</table>
          	</div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
  </section>

@endsection