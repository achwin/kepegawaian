@extends('adminlte::layouts.app')

@section('code-header')


@endsection

@section('htmlheader_title')
Data Jabatan
@endsection

@section('contentheader_title')
Data Jabatan
@endsection

@section('main-content')

<br>
<!-- include summernote css/js-->
<div class="flash-message" style="margin-left: -16px;margin-right: -16px; margin-top: 13px;">
  @foreach (['danger', 'warning', 'success', 'info'] as $msg)
  @if(Session::has('alert-' . $msg))
<div class="alert alert-{{ $msg }}">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <p class="" style="border-radius: 0">{{ Session::get('alert-' . $msg) }}</p>
</div>
  {!!Session::forget('alert-' . $msg)!!}
  @endif
  @endforeach
</div>
<div style="margin-bottom: 10px">
  <a data-toggle="modal" data-target="#myModal" type="button" class="btn btn-success btn-md" >
    <i class="fa fa-plus-square"></i> Tambah jabatan</a>
</div>
<div style="overflow: auto">
<table id="myTable" class="table table-striped table-bordered" cellspacing="0">
  <thead>
    <tr>
      <th>No.</th>
      <th>Jabatan</th>
      <th>Tanggal dibuat</th>
      <th>Aksi</th>
    </tr>
</thead>
  <tbody>
   @forelse($positions as $i => $position) 
    <tr>
      <td>{{ $i+1 }}</td>
      <td>{{$position->name}}</td>
      <td>{{$position->created_at}}</td>
      <td style="width: 10%;">
        <a style="margin-bottom: 5px;" data-target="#editModal" onclick="setIdJabatan({{$position->id}},{{json_encode($position->name)}})" data-toggle="modal" class="btn btn-sm btn-warning">Edit</a>
      </td>
    </tr>
     @empty
        <tr>
          <td colspan="8"><center>Belum ada data</center></td>
        </tr>
    @endforelse
  </tbody>
</table>
</div>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Tambah jabatan</h4>
        </div>
        <form id="inputData" method="post" action="{{url('master/jabatan/add')}}" enctype="multipart/form-data"  class="form-horizontal">
        <div class="modal-body">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="form-group">
            <label for="name">Nama jabatan:</label>
            <input type="text" class="form-control" id="name" name="name" required="">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-default">Submit</button>
        </div>
      </form>
      </div>
    </div>
  </div>

<div class="modal fade" id="editModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit jabatan</h4>
        </div>
        <form id="inputData" method="post" action="{{url('master/jabatan/edit')}}" enctype="multipart/form-data" class="form-horizontal">
        <div class="modal-body">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="jabatan_id" id="jabatan_id">
          <div class="form-group">
            <label for="name">Nama jabatan:</label>
            <input type="text" class="form-control" id="jabatan_nama" name="name" required="">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-default">Submit</button>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>
  
@endsection

@section('code-footer')
<script type="text/javascript">
  $(document).ready(function(){
      $('#myTable').DataTable({
        destroy: true,
        "ordering": true
      });
    });
  function setIdJabatan(id,jabatan_nama) {
    document.getElementById('jabatan_id').value = id;
    document.getElementById('jabatan_nama').value = jabatan_nama;
  }
</script>
@endsection