@extends('layouts.master')
@section('tittle', __('Artikel - KeetaCMS Admin'))
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
              <h3 class="box-title">{{ __('Artikel')}}</h3>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>NO</th>
                  <th>Judul</th>
                  <th>Author</th>
                  <th>Status</th>
                  <th>Publikasi</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($artikel as $ar => $a)
                  <tr>
                    <td width="50">{{$ar+1}}</td>
                    <td width="500">{{$a->judul}}</td>
                    <td>{{$a->name}}</td>
                    <td>{{$a->status}}</td>
                    <td>{{$a->created_at}}</td>
                    <td width="100">
                      <form method="POST" action="{{route('artikel.destroy', $a->id)}}">
                      <a href="{{route('artikel.edit', $a->id)}}" class="btn btn-primary btn-xs">Ubah</a>
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