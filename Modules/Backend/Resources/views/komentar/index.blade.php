@extends('layouts.master')
@section('tittle', __('Komentar - KeetaCMS Admin'))
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
        <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">{{ __('Komentar')}}</h3>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>NO</th>
                  <th>Komentar</th>
                  <th>Tanggal/Waktu</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($komentar as $kom => $k)
                  <tr>
                    <td width="50">{{$kom+1}}</td>
                    <td width="500">
                    	{{$k->nama.' - '.$k->email}} <br>
                    	Artikel : <a href="{{route('artikel.edit', $k->aid)}}">{{$k->judul}}</a>
                    </td>
                    <td>{{$k->created_at}}</td>
                    <td>{{($k->publikasi == 1 ? 'Publish' : 'Pending')}}</td>
                    <td width="150">
                      <form method="POST" action="{{route('komentar.destroy', $k->id)}}">
                      <a href="{{route('komentar.edit', $k->id)}}" class="btn btn-primary btn-xs">Ubah</a>
                      <a href="{{route('admin.balas.index', $k->id)}}" class="btn btn-warning btn-xs">Balas</a>
                        @csrf
                        @method('DELETE')
                      <input type="submit" class="btn btn-danger btn-xs" value="Hapus">
                      </form>
                    </td>
                  </tr>
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