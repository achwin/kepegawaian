<?php $__env->startSection('code-header'); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('htmlheader_title'); ?>
Data Jabatan
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
Data Jabatan
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
  <a data-toggle="modal" data-target="#myModal" type="button" class="btn btn-success btn-md" >
    <i class="fa fa-plus-square"></i> Tambah jabatan</a>
</div>
<div style="overflow: auto">
<table id="myTable" class="table table-striped table-bordered" cellspacing="0">
  <thead>
    <tr>
      <th>No.</th>
      <th>Jabatan</th>
      <th>Tanggal dibuat</th>
      <th>Aksi</th>
    </tr>
</thead>
  <tbody>
   <?php $__empty_1 = true; $__currentLoopData = $positions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $position): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?> 
    <tr>
      <td><?php echo e($i+1); ?></td>
      <td><?php echo e($position->name); ?></td>
      <td><?php echo e($position->created_at); ?></td>
      <td style="width: 10%;">
        <a style="margin-bottom: 5px;" data-target="#editModal" onclick="setIdJabatan(<?php echo e($position->id); ?>,<?php echo e(json_encode($position->name)); ?>)" data-toggle="modal" class="btn btn-sm btn-warning">Edit</a>
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

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Tambah jabatan</h4>
        </div>
        <form id="inputData" method="post" action="<?php echo e(url('master/jabatan/add')); ?>" enctype="multipart/form-data"  class="form-horizontal">
        <div class="modal-body">
          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
          <div class="form-group">
            <label for="name">Nama jabatan:</label>
            <input type="text" class="form-control" id="name" name="name" required="">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-default">Submit</button>
        </div>
      </form>
      </div>
    </div>
  </div>

<div class="modal fade" id="editModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit jabatan</h4>
        </div>
        <form id="inputData" method="post" action="<?php echo e(url('master/jabatan/edit')); ?>" enctype="multipart/form-data" class="form-horizontal">
        <div class="modal-body">
          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
          <input type="hidden" name="jabatan_id" id="jabatan_id">
          <div class="form-group">
            <label for="name">Nama jabatan:</label>
            <input type="text" class="form-control" id="jabatan_nama" name="name" required="">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-default">Submit</button>
        </div>
      </form>
      </div>
    </div>
  </div>
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
  function setIdJabatan(id,jabatan_nama) {
    document.getElementById('jabatan_id').value = id;
    document.getElementById('jabatan_nama').value = jabatan_nama;
  }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>