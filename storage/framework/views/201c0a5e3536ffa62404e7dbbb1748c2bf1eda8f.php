<?php $__env->startSection('code-header'); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('htmlheader_title'); ?>
Detail Pemberian Kredit
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
Detail Pemberian Kredit
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
  <a href="<?php echo e(url('kelola-pemberian-kredit/export/'.$credit_id)); ?>" type="button" class="btn btn-success btn-md" >
    <i class="fa fa-print"></i> Export as excel</a>
</div>
<div style="overflow: auto">
<table id="myTable" class="table table-striped table-bordered" cellspacing="0">
  <thead>
    <tr>
      <th>No.</th>
      <th>Nama toko</th>
      <th>Lama Menjadi Cust.</th>
      <th>Tipe Toko</th>
      <th>Rata2 Penjualan</th>
      <th>Akses Kirim</th>
      <th>Skor</th>
      <th>Status</th>
      <th>Jumlah kredit yang diberikan</th>
    </tr>
</thead>
  <tbody>
   <?php $__empty_1 = true; $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?> 
    <tr>
      <td style="width: 5px"><?php echo e($i+1); ?></td>
      <td><?php echo e($result->toko->nama); ?></td>
      <td><?php echo e($result->toko->lamaCust); ?></td>
      <td><?php echo e($result->toko->tipeToko); ?></td>
      <td>Rp. <?php echo e(number_format($result->toko->avgSales, 0, ',', '.')); ?></td>
      <td><?php echo e($result->toko->aksesKirim); ?></td>
      <td>
        <?php echo e($result->score); ?>

      </td>
      <td style="width: 15px">
        <?php if($result->status == 'Kredit'): ?>
          <span class="label bg-blue"><?php echo e($result->status); ?></span>
        <?php else: ?>
          <span class="label bg-red"><?php echo e($result->status); ?></span>
        <?php endif; ?>
      </td>
      <td>
        <?php if($result->status == 'Kredit'): ?>
        Rp. <?php echo e(number_format($result->target_growth, 0, ',', '.')); ?>

        <?php else: ?>
        -
        <?php endif; ?>
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