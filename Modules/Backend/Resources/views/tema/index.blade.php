@extends('layouts.master')
@section('tittle', __('Tema - KeetaCMS Admin'))
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
          <h3 class="box-title" style="margin-right: 15px;">{{ __('Tema')}}</h3>
          <div class="pull-right">
            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-default">{{ __('Upload')}}</button>
          </div>
        </div>

        <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">{{ __('Upload Tema')}}</h4>
              </div>
              <form method="POST" action="{{route('tema.store')}}" enctype="multipart/form-data">
              	@csrf
              <div class="modal-body">
                <div class="form-group">
                  <label for="inputFile">{{ __('Pilih File')}}</label>
                  <input type="file" name="fileTheme" id="inputFile">

                  <p class="help-block">{{ __('File dalam bentuk zip.')}}</p>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">{{ __('Tutup')}}</button>
                <button type="submit" class="btn btn-primary">{{ __('Upload')}}</button>
              </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <div class="box-body">
        	<div class="row">
        		<div class="col-md-12">
        			<div class="card-deck">
        			  @foreach($tema as $t)
    					  <div class="card col-md-3">
    					    <img src="{{ asset($t->screenshot)}}" width="250" height="250" class="card-img-top" alt="...">
    					    <div class="card-footer" style="margin-top: 20px;">
    					      <form method="POST" action="{{route('tema.update', $t->id)}}">
    					      <a href="#" class="text-title text-bold">{{strtoupper($t->nama)}}</a>
    					      	@csrf
    					      	@method('PUT')
    					      <button type="button" class="btn btn-danger btn-xs pull-right" data-toggle="modal" data-target="#modal-{{$t->id}}" style="margin-left: 5px;">
    					      	{{ __('Hapus')}}
    					      </button>
                    @if($t->status == '0')
    					      <button type="submit" class=" btn btn-primary btn-xs pull-right">{{ __('Aktifkan')}}</button>
                    @endif
    					      </form>
    					    </div>
    					  </div>

                <div class="modal fade" id="modal-{{$t->id}}">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">{{ __('Hapus Tema')}}</h4>
                      </div>
                      <form method="POST" action="{{route('tema.destroy', $t->id)}}">
                        @csrf
                        @method('DELETE')
                        <h2 class="text-center">Anda akan menghapus Tema {{strtoupper($t->nama)}}</h2>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">{{ __('Tutup')}}</button>
                        <button type="submit" class="btn btn-danger">{{ __('Hapus')}}</button>
                      </div>
                      </form>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
    					  @endforeach
					    </div>
        		</div>
			     </div>
        </div>
        <!-- /.box-body -->
        <!-- <div class="box-footer">
          Footer
        </div> -->
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
  </section>

@endsection