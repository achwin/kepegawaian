@extends('adminlte::layouts.app')

@section('code-header')


@endsection

@section('htmlheader_title')
Data Pegawai
@endsection

@section('contentheader_title')
Data Pegawai
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
  <a href="{{url('master/pegawai/add')}}" type="button" class="btn btn-success btn-md" >
    <i class="fa fa-plus-square"></i> Tambah data pegawai</a>
</div>
<div style="overflow: auto">
<table id="myTable" class="table table-striped table-bordered" cellspacing="0">
  <thead>
    <tr>
      <th>No.</th>
      <th>Nama</th>
      <th>Jabatan</th>
      <th>NIP</th>
      <th>Pekerjaan</th>
      <th>No HP</th>
      <th>Foto</th>
      <th>Aksi</th>
    </tr>
</thead>
  <tbody>
   @forelse($employees as $i => $employee) 
    <tr>
      <td>{{ $i+1 }}</td>
      <td>{{$employee->name}}</td>
      <td>{{$employee->position->name}}</td>
      <td>{{$employee->nip}}</td>
      <td>{{$employee->pekerjaan}}</td>
      <td>{{$employee->no_hp}}</td>
      <td><img src="{{asset('/img/'.$employee->foto)}}" alt="Not found" style="height: 100px;width: 100px;"></td>
     <td style="width: 10%;">
        <a style="margin-bottom: 5px;" href="{{'pegawai/edit/'.$employee->id}}" class="btn btn-sm btn-warning">Edit</a>
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
  
@endsection

@section('code-footer')
<script type="text/javascript">
  $(document).ready(function(){
      $('#myTable').DataTable({
        destroy: true,
        "ordering": true
      });
    });
</script>
@endsection