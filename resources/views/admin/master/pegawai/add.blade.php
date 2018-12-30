@extends('adminlte::layouts.app')

@section('htmlheader_title')
Tambah data pegawai
@endsection

@section('contentheader_title')
Tambah data pegawai
@endsection

@section('code-header')

<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>
<link rel="stylesheet" href="{{ asset('/css/dropzone.css') }}">

@endsection

@section('main-content')
<link rel="stylesheet" type="text/css" href="{{asset('css/datepicker.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
	.form-group label{
		text-align: left !important;
	}
</style>

	@foreach (['danger', 'warning', 'success', 'info'] as $msg)
	@if(Session::has('alert-' . $msg))
<div class="alert alert-{{ $msg }}">
	<p class="" style="border-radius: 0">{{ Session::get('alert-' . $msg) }}</p>
</div>
	{!!Session::forget('alert-' . $msg)!!}
	@endif
	@endforeach


<div class="row">
	<div class="col-md-12">
		<div class="">

			@if (count($errors) > 0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
			<br>
			<form id="inputData" method="post" action="{{url('master/pegawai/add')}}" enctype="multipart/form-data"  class="form-horizontal">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="form-group">
					<label for="nama" class="col-sm-2 control-label">NIP</label>
					<div class="col-md-8">
						<input type="text" class="form-control input-lg" id="nip" value="(Auto)" disabled required>
					</div>
				</div>
				<div class="form-group">
					<label for="nama" class="col-sm-2 control-label">Password</label>
					<div class="col-md-8">
						<input type="password" class="form-control input-lg" id="password" name="password" required>
					</div>
				</div>
				<div class="form-group">
					<label for="nama" class="col-sm-2 control-label">Nama</label>
					<div class="col-md-8">
						<input type="text" class="form-control input-lg" id="name" name="name" placeholder="Contoh: Rizqy" required>
					</div>
				</div>
				<div class="form-group">
					<label for="nama" class="col-sm-2 control-label">Pekerjaan</label>
					<div class="col-md-8">
						<input type="text" class="form-control input-lg" id="pekerjaan" name="pekerjaan" placeholder="Contoh: Programmer" required>
					</div>
				</div>
				<div class="form-group">
					<label for="distrik" class="col-sm-2 control-label">Jabatan</label>
					<div class="col-md-8">
						<select class="form-control input-lg" name="jabatan_id">
							@foreach($positions as $position)
								<option value="{{$position->id}}">{{$position->name}}</option>
							@endforeach
						</select>
					</div>
				</div>
				
				<div class="form-group">
					<label for="nama" class="col-sm-2 control-label">Nomor HP</label>
					<div class="col-md-8">
						<input type="text" class="form-control input-lg" id="no_hp" name="no_hp" placeholder="Contoh: 08123221222" required>
					</div>
				</div>

				<div class="form-group">
					<label for="nama" class="col-sm-2 control-label">Foto</label>
					<div class="col-md-8">
						<input type="file" class="form-control input-lg" id="foto" name="foto" accept=".png,.jpeg,.jpg" required>
					</div>
				</div>

				<div class="form-group text-center">
					<div class="col-md-8 col-md-offset-2">
					<button type="submit" class="btn btn-primary btn-lg">
							Simpan
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection

@section('code-footer')

@endsection

