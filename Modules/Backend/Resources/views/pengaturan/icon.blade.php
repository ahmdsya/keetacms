@extends('layouts.master')
@section('tittle', __('Pengaturan Icon - KeetaCMS Admin'))
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
          <h3 class="box-title">{{ __('Pengaturan Icon')}}</h3>

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
          				@if($setting->key == 'web_favicon')
          				<td><img src="{{asset('backend/img/'.$setting->value)}}" width="50" height="50"></td>
          				@else
          				<td><img src="{{asset('backend/img/'.$setting->value)}}" width="300" height="100"></td>
          				@endif
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
	                        <form method="POST" action="{{route('icon.update', $setting->id)}}" enctype="multipart/form-data">
	                            @csrf
	                            @method('PUT')
	                        <div class="modal-body">
	                          	<div class="form-group">
		                          <label for="key">{{ __('KEY')}}</label>
		                          	<input type="text" id="key" name="key" class="form-control" value="{{$setting->key}}" readonly="">
	                        	</div>
	                        	<div class="form-group">
	                        		<label for="key">{{ __('VALUE')}}</label>
	                        		@if($setting->key == 'web_favicon')
		                        	<input type="file" class="form-control" name="value" id="gambar" value="{{$setting->value}}" 
				      					onchange="favicon(this);">
				      				<img id="ShowFavicon" src="{{asset('backend/img/'.$setting->value)}}" style="margin-top: 25px;" width="50" height="50">
				      				@else
				      				<input type="file" class="form-control" name="value" id="gambar" value="{{$setting->value}}" 
				      					onchange="logo(this);">
				      				<img id="ShowLogo" src="{{asset('backend/img/'.$setting->value)}}" style="margin-top: 25px;" width="300" height="100">
				      				@endif
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

  <script>
  function favicon(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#ShowFavicon')
                    .attr('src', e.target.result)
                    // .width(250)
                    // .height(250);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    function logo(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#ShowLogo')
                    .attr('src', e.target.result)
                    // .width(250)
                    // .height(250);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

@endsection