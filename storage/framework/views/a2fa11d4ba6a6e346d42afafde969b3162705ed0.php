<?php $__env->startSection('code-header'); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('htmlheader_title'); ?>
History Absensi Pegawai
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
History Absensi Pegawai
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
  <form action="<?php echo e(url('history-absensi/search')); ?>" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
    <div class="row">
    <div class="col-md-3">
    <select class="form-control" name="bulan">
      <option>Pilih bulan</option>
      <option value="1" <?php echo $bulan == '1' ? 'selected' : ''; ?>>Januari</option>
      <option value="2" <?php echo $bulan == '2' ? 'selected' : ''; ?>>Februari</option>
      <option value="3" <?php echo $bulan == '3' ? 'selected' : ''; ?>>Maret</option>
      <option value="4" <?php echo $bulan == '4' ? 'selected' : ''; ?>>April</option>
      <option value="5" <?php echo $bulan == '5' ? 'selected' : ''; ?>>Mei</option>
      <option value="6" <?php echo $bulan == '6' ? 'selected' : ''; ?>>Juni</option>
      <option value="7" <?php echo $bulan == '7' ? 'selected' : ''; ?>>Juli</option>
      <option value="8" <?php echo $bulan == '8' ? 'selected' : ''; ?>>Agustus</option>
      <option value="9" <?php echo $bulan == '9' ? 'selected' : ''; ?>>September</option>
      <option value="10" <?php echo $bulan == '10' ? 'selected' : ''; ?>>Oktober</option>
      <option value="11" <?php echo $bulan == '11' ? 'selected' : ''; ?>>November</option>
      <option value="12" <?php echo $bulan == '12' ? 'selected' : ''; ?>>Desember</option>
    </select>
    </div>
    <div class="col-md-3">
      <select class="form-control" name="tahun">
      <option>Pilih tahun</option>
      <option value="2018" <?php echo $tahun == '2018' ? 'selected' : ''; ?>>2018</option>
      <option value="2019" <?php echo $tahun == '2019' ? 'selected' : ''; ?>>2019</option>
    </select>
    </div>
  <div class="col-md-3">
  <button type="submit" class="btn btn-success">
      Search
    </button>
  </div>
  </div>
  </form>
</div>
<div style="overflow: auto">
  <div class="nav-tabs-custom">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Datang</a></li>
                <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Pulang</a></li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                  <table id="myTable" class="table table-striped table-bordered" cellspacing="0">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Pekerjaan</th>
                        <th>Tanggal</th>
                        <th>Pukul</th>
                      </tr>
                  </thead>
                    <tbody>
                     <?php $__empty_1 = true; $__currentLoopData = $datang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?> 
                      <tr>
                        <td><?php echo e($i+1); ?></td>
                        <td><?php echo e($d->nip); ?></td>
                        <td><?php echo e($d->employee->name); ?></td>
                        <td><?php echo e($d->employee->position->name); ?></td>
                        <td><?php echo e($d->employee->pekerjaan); ?></td>
                        <td><?php echo e(App\Helpers\GeneralHelper::indonesianDateFormat($d->tanggal)); ?></td>
                        <td><?php echo e($d->pukul); ?></td>
                      </tr>
                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                          <tr>
                            <td colspan="8"><center>Belum ada data</center></td>
                          </tr>
                      <?php endif; ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_2">
                  <table id="myTable" class="table table-striped table-bordered" cellspacing="0">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Tanggal</th>
                        <th>Pukul</th>
                      </tr>
                  </thead>
                    <tbody>
                     <?php $__empty_1 = true; $__currentLoopData = $pulang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?> 
                      <tr>
                        <td><?php echo e($i+1); ?></td>
                        <td><?php echo e($p->nip); ?></td>
                        <td><?php echo e($p->employee->name); ?></td>
                        <td><?php echo e($p->employee->position->name); ?></td>
                        <td><?php echo e(App\Helpers\GeneralHelper::indonesianDateFormat($p->tanggal)); ?></td>
                        <td><?php echo e($p->pukul); ?></td>
                      </tr>
                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                          <tr>
                            <td colspan="8"><center>Belum ada data</center></td>
                          </tr>
                      <?php endif; ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <!-- /.tab-content -->
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
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>