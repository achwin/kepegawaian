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
	
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>