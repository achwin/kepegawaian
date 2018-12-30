<?php $__env->startSection('htmlheader_title'); ?>
Edit data pegawai
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
Edit data pegawai
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
			<form id="inputData" method="post" action="<?php echo e(url('master/pegawai/edit/'.$employee->id)); ?>" enctype="multipart/form-data"  class="form-horizontal">
				<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
				<div class="form-group">
					<label for="nama" class="col-sm-2 control-label">NIP</label>
					<div class="col-md-8">
						<input type="text" class="form-control input-lg" id="nip" value="<?php echo e($employee->nip); ?>" disabled required>
					</div>
				</div>
				<div class="form-group">
					<label for="nama" class="col-sm-2 control-label">Password</label>
					<div class="col-md-8">
						<input type="password" class="form-control input-lg" id="password" name="password">
						<small>Kosongi jika tidak ingin mengubah password</small>
					</div>
				</div>
				<div class="form-group">
					<label for="nama" class="col-sm-2 control-label">Nama pegawai</label>
					<div class="col-md-8">
						<input type="text" class="form-control input-lg" id="name" name="name" value="<?php echo e($employee->name); ?>" placeholder="Contoh: Rizqy" required>
					</div>
				</div>
				<div class="form-group">
					<label for="nama" class="col-sm-2 control-label">Pekerjaan</label>
					<div class="col-md-8">
						<input type="text" class="form-control input-lg" id="pekerjaan" name="pekerjaan" placeholder="Contoh: Programmer" required value="<?php echo e($employee->pekerjaan); ?>">
					</div>
				</div>
				<div class="form-group">
					<label for="distrik" class="col-sm-2 control-label">Jabatan</label>
					<div class="col-md-8">
						<select class="form-control input-lg" name="jabatan_id">
							<?php $__currentLoopData = $positions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $position): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<option <?php echo ($employee->jabatan_id == $position->id ? 'selected' : ''); ?> value="<?php echo e($position->id); ?>"><?php echo e($position->name); ?></option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</select>
					</div>
				</div>
				
				<div class="form-group">
					<label for="nama" class="col-sm-2 control-label">Nomor HP</label>
					<div class="col-md-8">
						<input type="text" class="form-control input-lg" id="no_hp" name="no_hp" placeholder="Contoh: 08123221222" value="<?php echo e($employee->no_hp); ?>" required>
					</div>
				</div>

				<div class="form-group">
					<label for="nama" class="col-sm-2 control-label">Foto</label>
					<div class="col-md-8">
						<input type="file" class="form-control input-lg" id="foto" name="foto" accept=".png,.jpeg,.jpg">
						<img src="<?php echo e(asset('/img/'.$employee->foto)); ?>" alt="Not found" style="height: 100px;width: 100px;">
					</div>
				</div>
				<div class="form-group">
					<label for="nama" class="col-sm-2 control-label">Aktif</label>
					<div class="col-md-8">
						<div class="checkbox">
		                  <label>
		                    <input type="checkbox" name="is_active" value="y" <?php echo $employee->is_active == 'y' ? 'checked' : ''; ?>> Ya
		                  </label>
		                </div>
					</div>
                </div>
				<div class="form-group">
					<div class="col-md-8 col-md-offset-2">
					<button type="submit" class="btn btn-primary btn-lg pull-right">
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