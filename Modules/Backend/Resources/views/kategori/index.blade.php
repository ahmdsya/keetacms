@extends('layouts.master')
@section('tittle', __('Kategori - KeetaCMS Admin'))
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
        <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">{{ __('Tambah Kategori')}}</h3>
            </div>
            <div class="box-body">
              <form method="POST" action="{{route('kategori.store')}}">
                @csrf
            	<div class="form-group">
            		<label for="kategori">{{ __('Tambah Kategori')}}</label>
	            	<input type="text" id="kategori" name="nama" class="form-control" required>
	            </div>
	            <div class="form-group">
	            	<label for="deskripsi">{{ __('Deskripsi')}}</label>
	            	<textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>
	            </div>
              <button type="submit" class="btn btn-primary">{{ __('Tambah')}}</button>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
      </div>

      <div class="col-md-8">
        <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">{{ __('Kategori')}}</h3>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>NO</th>
                  <th>Kategori</th>
                  <th>Deskripsi</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($kategori as $ka => $k)
                  <tr>
                    <td>{{$ka+1}}</td>
                    <td>{{$k->nama}}</td>
                    <td>{{$k->deskripsi}}</td>
                    <td>
                      <form method="POST" action="{{route('kategori.destroy', $k->id)}}">
                      <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modal-{{$k->id}}">Ubah</button>
                        @csrf
                        @method('DELETE')
                      <input type="submit" class="btn btn-danger btn-xs" value="Hapus">
                      </form>
                    </td>
                  </tr>

                  <div class="modal fade" id="modal-{{$k->id}}">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title">{{ __('Ubah Kategori')}}</h4>
                        </div>
                        <form method="POST" action="{{route('kategori.update', $k->id)}}">
                            @csrf
                            @method('PUT')
                        <div class="modal-body">
                          <div class="form-group">
                          <label for="kategori">{{ __('Tambah Kategori')}}</label>
                          <input type="text" id="kategori" name="nama" class="form-control" value="{{$k->nama}}" required>
                        </div>
                        <div class="form-group">
                          <label for="deskripsi">{{ __('Deskripsi')}}</label>
                          <textarea class="form-control" id="deskripsi" name="deskripsi">{{$k->deskripsi}}</textarea>
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
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
      </div>
    </div>
  </section>

@endsection