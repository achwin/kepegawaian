<?php $__env->startSection('code-header'); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('htmlheader_title'); ?>
Data Pelanggan
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
Data Pelanggan
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
  <a href="<?php echo e(url('shops/add-shop')); ?>" type="button" class="btn btn-success btn-md" >
    <i class="fa fa-plus-square"></i> Tambah data pelanggan</a>
</div>
<div style="overflow: auto">
<table id="myTable" class="table table-striped table-bordered" cellspacing="0">
  <thead>
    <tr>
      <th>No.</th>
      <th>Nama</th>
      <th>Alamat</th>
      <th>Distrik</th>
      <th>Lama customer</th>
      <th>Tipe toko</th>
      <th>Rata2 penjualan</th>
      <th>NPWP/KTP</th>
      <th>Akses kirim</th>
      <th>Produk masuk</th>
      <th>Aksi</th>
    </tr>
</thead>
  <tbody>
   <?php $__empty_1 = true; $__currentLoopData = $shops; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $shop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?> 
    <tr>
      <td><?php echo e($i+1); ?></td>
      <td><?php echo e($shop->nama); ?></td>
      <td><?php echo e($shop->alamat); ?></td>
      <td><?php echo e($shop->distrik); ?></td>
      <td><?php echo e($shop->lamaCust); ?></td>
      <td><?php echo e($shop->tipeToko); ?></td>
      <td>Rp. <?php echo e(number_format($shop->avgSales, 0, ',', '.')); ?></td>
      <td><?php echo e($shop->npwporktp); ?></td>
      <td><?php echo e($shop->aksesKirim); ?></td>
      <td><?php echo e($shop->produkMasuk); ?></td>
      <td style="width: 10%;">
        <a style="margin-bottom: 5px;" href="<?php echo e('shops/edit/'.$shop->id); ?>" class="btn btn-sm btn-warning">Edit</a>
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