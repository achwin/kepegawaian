<?php $__env->startSection('code-header'); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('htmlheader_title'); ?>
History Pemberian Kredit
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
History Pemberian Kredit
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>

<br>
<!-- include summernote css/js-->
<div class="flash-message" style="margin-left: -16px;margin-right: -16px; margin-top: 13px;">
  <?php $__currentLoopData = ['danger', 'warning', 'success', 'info']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <?php if(Session::has('alert-' . $msg)): ?>
<div class="alert alert-<?php echo e($msg); ?>">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <p class="" style="border-radius: 0"><?php echo e(Session::get('alert-' . $msg)); ?></p>
</div>
  <?php echo Session::forget('alert-' . $msg); ?>

  <?php endif; ?>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<div style="margin-bottom: 10px">
  <a href="<?php echo e(url('kelola-pemberian-kredit/add')); ?>" type="button" class="btn btn-success btn-md" >
    <i class="fa fa-plus-square"></i> Olah Pemberian Kredit</a>
</div>
<div style="overflow: auto">
<table id="myTable" class="table table-striped table-bordered" cellspacing="0">
  <thead>
    <tr>
      <th style="width: 5%; text-align: center;">No.</th>
      <th style="text-align: center;">Tanggal</th>
      <th style="text-align: center;">Aksi</th>
    </tr>
</thead>
  <tbody>
   <?php $__empty_1 = true; $__currentLoopData = $credits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $credit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?> 
    <tr>
      <td style="text-align: center;"><?php echo e($i+1); ?></td>
      <td style=""><?php echo e(App\Helpers\GeneralHelper::indonesianDateFormat($credit->created_at)); ?></td>
      <td style="width: 10%; white-space: nowrap;">
        <a style="margin-bottom: 5px;" href="<?php echo e('kelola-pemberian-kredit/detail/'.$credit->id); ?>" class="btn btn-sm btn-primary">Detail</a>
        <a style="margin-bottom: 5px;" href="" class="btn btn-sm btn-danger">Delete</a>
      </td>
    </tr>
     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <tr>
          <td colspan="8"><center>Belum ada data</center></td>
        </tr>
    <?php endif; ?>
  </tbody>
</table>
</div>
  
<?php $__env->stopSection(); ?>

<?php $__env->startSection('code-footer'); ?>
<script type="text/javascript">
  $(document).ready(function(){
      $('#myTable').DataTable({
        destroy: true,
        "ordering": true
      });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>