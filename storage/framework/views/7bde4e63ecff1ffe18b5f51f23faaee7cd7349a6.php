<?php $__env->startSection('htmlheader_title'); ?>
Tambah data karyawan
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
Tambah data karyawan
<?php $__env->stopSection(); ?>

<?php $__env->startSection('code-header'); ?>

<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>
<link rel="stylesheet" href="<?php echo e(asset('/css/dropzone.css')); ?>">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/datepicker.css')); ?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
	.form-group label{
		text-align: left !important;
	}
</style>

	<?php $__currentLoopData = ['danger', 'warning', 'success', 'info']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<?php if(Session::has('alert-' . $msg)): ?>
<div class="alert alert-<?php echo e($msg); ?>">
	<p class="" style="border-radius: 0"><?php echo e(Session::get('alert-' . $msg)); ?></p>
</div>
	<?php echo Session::forget('alert-' . $msg); ?>

	<?php endif; ?>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<div class="row">
	<div class="col-md-12">
		<div class="">

			<?php if(count($errors) > 0): ?>
			<div class="alert alert-danger">
				<ul>
					<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<li><?php echo e($error); ?></li>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</ul>
			</div>
			<?php endif; ?>
			<br>
			<form id="inputData" method="post" action="<?php echo e(url('master/karyawan/add')); ?>" enctype="multipart/form-data"  class="form-horizontal">
				<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
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
							<?php $__currentLoopData = $positions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $position): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<option value="<?php echo e($position->id); ?>"><?php echo e($position->name); ?></option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('code-footer'); ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('adminlte::layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>