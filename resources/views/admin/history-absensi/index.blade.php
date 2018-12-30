@extends('adminlte::layouts.app')

@section('code-header')


@endsection

@section('htmlheader_title')
History Absensi Pegawai
@endsection

@section('contentheader_title')
History Absensi Pegawai
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
  <form action="{{url('history-absensi/search')}}" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="row">
    <div class="col-md-3">
    <select class="form-control" name="bulan">
      <option>Pilih bulan</option>
      <option value="1" {!! $bulan == '1' ? 'selected' : '' !!}>Januari</option>
      <option value="2" {!! $bulan == '2' ? 'selected' : '' !!}>Februari</option>
      <option value="3" {!! $bulan == '3' ? 'selected' : '' !!}>Maret</option>
      <option value="4" {!! $bulan == '4' ? 'selected' : '' !!}>April</option>
      <option value="5" {!! $bulan == '5' ? 'selected' : '' !!}>Mei</option>
      <option value="6" {!! $bulan == '6' ? 'selected' : '' !!}>Juni</option>
      <option value="7" {!! $bulan == '7' ? 'selected' : '' !!}>Juli</option>
      <option value="8" {!! $bulan == '8' ? 'selected' : '' !!}>Agustus</option>
      <option value="9" {!! $bulan == '9' ? 'selected' : '' !!}>September</option>
      <option value="10" {!! $bulan == '10' ? 'selected' : '' !!}>Oktober</option>
      <option value="11" {!! $bulan == '11' ? 'selected' : '' !!}>November</option>
      <option value="12" {!! $bulan == '12' ? 'selected' : '' !!}>Desember</option>
    </select>
    </div>
    <div class="col-md-3">
      <select class="form-control" name="tahun">
      <option>Pilih tahun</option>
      <option value="2018" {!! $tahun == '2018' ? 'selected' : '' !!}>2018</option>
      <option value="2019" {!! $tahun == '2019' ? 'selected' : '' !!}>2019</option>
    </select>
    </div>
  <div class="col-md-3">
  <button type="submit" class="btn btn-success">
      Search
    </button>
  </div>
  </div>
  </form>
</div>
<div style="overflow: auto">
  <div class="nav-tabs-custom">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Datang</a></li>
                <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Pulang</a></li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                  <table id="myTable" class="table table-striped table-bordered" cellspacing="0">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Pekerjaan</th>
                        <th>Tanggal</th>
                        <th>Pukul</th>
                      </tr>
                  </thead>
                    <tbody>
                     @forelse($datang as $i => $d) 
                      <tr>
                        <td>{{ $i+1 }}</td>
                        <td>{{$d->nip}}</td>
                        <td>{{$d->employee->name}}</td>
                        <td>{{$d->employee->position->name}}</td>
                        <td>{{$d->employee->pekerjaan}}</td>
                        <td>{{App\Helpers\GeneralHelper::indonesianDateFormat($d->tanggal)}}</td>
                        <td>{{$d->pukul}}</td>
                      </tr>
                       @empty
                          <tr>
                            <td colspan="8"><center>Belum ada data</center></td>
                          </tr>
                      @endforelse
                    </tbody>
                  </table>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_2">
                  <table id="myTable" class="table table-striped table-bordered" cellspacing="0">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Tanggal</th>
                        <th>Pukul</th>
                      </tr>
                  </thead>
                    <tbody>
                     @forelse($pulang as $i => $p) 
                      <tr>
                        <td>{{ $i+1 }}</td>
                        <td>{{$p->nip}}</td>
                        <td>{{$p->employee->name}}</td>
                        <td>{{$p->employee->position->name}}</td>
                        <td>{{App\Helpers\GeneralHelper::indonesianDateFormat($p->tanggal)}}</td>
                        <td>{{$p->pukul}}</td>
                      </tr>
                       @empty
                          <tr>
                            <td colspan="8"><center>Belum ada data</center></td>
                          </tr>
                      @endforelse
                    </tbody>
                  </table>
                </div>
              </div>
              <!-- /.tab-content -->
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
</script>
@endsection