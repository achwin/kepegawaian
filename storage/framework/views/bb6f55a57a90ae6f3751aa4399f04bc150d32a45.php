<?php $__env->startSection('htmlheader_title'); ?>
	Halaman Awal
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('main-content'); ?>
<style>
	.btn-xl {
    padding: 21px 54px;
    font-size: 30px;
    border-radius: 30px;
    width:30%;    }
</style>
	<div class="container-fluid spark-screen">
		<div class="row" style="background-color: white; border-radius: 10px; height: -webkit-fill-available" >
			<div class="" style="display: flex; align-items: center; justify-content: center; margin-bottom: 2rem; margin-top: 2rem;">
				<button type="button" class="btn btn-primary" style="padding: 21px 54px; font-size: 30px; border-radius: 20px; width:30%;"><i class="fa fa-plus-square"></i> Input Toko</button>
				<!-- Default box -->
				<!-- /.box -->
			</div>
			<div style="display: flex; align-items: center; justify-content: center; margin-bottom: 2rem;">
				<button type="button" class="btn btn-warning" style="padding: 21px 54px; font-size: 30px; border-radius: 20px;"><i class="fa fa-briefcase"></i> Olah Pemberian Kredit</button>
			</div>
			<div style="display: flex; align-items: center; justify-content: center; margin-bottom: 2rem;">
				<button type="button" class="btn btn-success" style="padding: 21px 54px; font-size: 30px; border-radius: 20px; width:30%;"><i class="fa fa-history"></i> Kelola Histori</button>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>