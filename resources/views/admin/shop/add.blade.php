@extends('adminlte::layouts.app')

@section('htmlheader_title')
Input data pelanggan
@endsection

@section('contentheader_title')
Input data pelanggan
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
			<form id="inputData" method="post" action="{{url('shops/add-shop')}}" enctype="multipart/form-data"  class="form-horizontal">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="form-group">
					<label for="nama" class="col-sm-2 control-label">Nama toko</label>
					<div class="col-md-8">
						<input type="text" class="form-control input-lg" id="nama" name="nama" placeholder="Contoh: Toko Rizqy" required>
					</div>
				</div>
				<div class="form-group">
					<label for="alamat" class="col-sm-2 control-label">Alamat</label>
					<div class="col-md-8">
						<textarea class="form-control input-lg" id="alamat" name="alamat" placeholder="Contoh: Gunung Anyar Tengah" required></textarea>
					</div>
				</div>
				<div class="form-group">
					<label for="distrik" class="col-sm-2 control-label">Distrik</label>
					<div class="col-md-8">
						<select class="form-control input-lg" name="distrik">
							<option value="Surabaya Timur">Surabaya Timur</option>
							<option value="Surabaya Utara">Surabaya Utara</option>
							<option value="Surabaya Barat">Surabaya Barat</option>
							<option value="Surabaya Selatan">Surabaya Selatan</option>
							<option value="Surabaya Pusat">Surabaya Pusat</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="lamaCust" class="col-sm-2 control-label">Mulai menjadi customer</label>
					<div class="col-md-8">
						<!-- <select class="form-control input-lg" name="lamaCust">
							<option value="0-3 bln">0-3 bulan</option>
							<option value="4-6 bln">4-6 bulan</option>
							<option value="7-9 bln">7-9 bln</option>
							<option value="10-12 bln">10-12 bulan</option>
							<option value="1-2 th">1-2 tahun</option>
							<option value="2-3 th">2-3 tahun</option>
							<option value=">3 th">>3 tahun</option>
						</select> -->
					
						<!-- <input type="text" class="form-control input-lg" id="datepicker" name="lamaCust" placeholder="" required> -->
					<div class="input-group">

            <span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar" aria-hidden="true"></i></span>

            <input class="form-control input-lg" name="lamaCust" data-toggle="datepicker" autocomplete="off">

            </div> 
                	</div>
				</div>
				<div class="form-group">
					<label for="tipeToko" class="col-sm-2 control-label">Tipe toko</label>
					<div class="col-md-8">
						<select class="form-control input-lg" name="tipeToko">
							<option value="Toko kelontong">Toko kelontong</option>
							<option value="Off-price Retailer">Off-price Retailer</option>
							<option value="Toko Khusus">Toko Khusus</option>
							<option value="Grosir">Grosir</option>
							<option value="Minimarket">Minimarket</option>
							<option value="Supermarket">Supermarket</option>
							<option value="Hypermarket">Hypermarket</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="avgSales" class="col-sm-2 control-label">Rata-rata penjualan</label>
					<div class="col-md-8">
						<input type="text" class="form-control input-lg" id="avgSales" name="avgSales" placeholder="Contoh: 1000000" onkeypress="var key = event.keyCode || event.charCode; return ((key  >= 48 && key  <= 57) || key == 8);"; required>
					</div>
				</div>

				<!-- <div class="form-group">
					<label for="pembayaran" class="col-sm-2 control-label">Pembayaran</label>
					<div class="col-md-8">
						<select class="form-control input-lg" name="pembayaran">
							<option value="Lancar">Lancar</option>
							<option value="Tidak">Tidak lancar</option>
						</select>
					</div>
				</div>
 -->
				<div class="form-group">
					<label for="npwporktp" class="col-sm-2 control-label">NPWP atau KTP</label>
					<div class="col-md-8">
						<input type="text" class="form-control input-lg" id="npwporktp" name="npwporktp" placeholder="Contoh: 52151300396" required>
					</div>
				</div>
				
				<div class="form-group">
					<label for="aksesKirim" class="col-sm-2 control-label">Akses kirim</label>
					<div class="col-md-8">
						<select class="form-control input-lg" name="aksesKirim">
							<option value="Tidak bisa dilalui kendaraan">Tidak bisa dilalui kendaraan</option>
							<option value="Roda 2">Roda 2</option>
							<option value="Motor Roda 3">Motor Roda 3</option>
							<option value="Mobil Box">Mobil Box</option>
							<option value="Truck Box">Truck Box</option>
							<option value="Wing Box">Wing Box</option>
							<option value="Truck Container">Truck Container</option>
						</select>
					</div>
				</div>

				<!-- <div class="form-group">
					<label for="kategori" class="col-sm-2 control-label">Kategori</label>
					<div class="col-md-8">
						<select class="form-control input-lg" name="kategori">
							<option value="Bumbu">Bumbu</option>
							<option value="Snack">Snack</option>
							<option value="Bhn Kue">Bahan Kue</option>
							<option value="Tk Obat">Toko Obat</option>
							<option value="Kosmetik">Kosmetik</option>
							<option value="Klontong">Klontong</option>
						</select>
					</div>
				</div> -->

				<div class="form-group">
					<label for="produkMasuk" class="col-sm-2 control-label">Produk yang sudah masuk</label>
					<div class="col-md-8">
						<div class="checkbox">
						  <label><input name="produkMasuk[]" type="checkbox" value="Unicharm">Unicharm</label>
						</div>
						<div class="checkbox">
						  <label><input name="produkMasuk[]" type="checkbox" value="Beiersdorf">Beiersdorf</label>
						</div>
						<div class="checkbox">
						  <label><input name="produkMasuk[]" type="checkbox" value="Nutrifood">Nutrifood</label>
						</div>
						<div class="checkbox">
						  <label><input name="produkMasuk[]" type="checkbox" value="Unican">Unican</label>
						</div>
						<div class="checkbox">
						  <label><input name="produkMasuk[]" type="checkbox" value="Arnotts">Arnotts</label>
						</div>
						<div class="checkbox">
						  <label><input name="produkMasuk[]" type="checkbox" value="Danone">Danone</label>
						</div>
						<div class="checkbox">
						  <label><input name="produkMasuk[]" type="checkbox" value="LOI">LOI</label>
						</div>
					</div>
				</div>

				<!-- <div class="form-group">
					<label for="potensi" class="col-sm-2 control-label">Potensi outlet bisa jual</label>
					<div class="col-md-8">
						<select class="form-control input-lg" name="potensi">
							<option value="Besar">Besar</option>
							<option value="Tidak">Tidak</option>
						</select>
					</div>
				</div> -->

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
<script src="{{asset('/js/jquery-2.1.1.js')}}"></script> 
<script src="{{asset('js/datepicker.js')}}"></script>
<script type="text/javascript">

  $(document).ready(function() {

    $('[data-toggle="datepicker"]').datepicker({

      format: 'yyyy-mm-dd'

    });

    });

</script>

@endsection

