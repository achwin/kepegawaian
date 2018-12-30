<?php $__env->startSection('htmlheader_title'); ?>
    Log in
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
          <a href="#"><b>Sistem</b> Kepegawaian</a>
        </div>
        <p class="login-box-msg">Silahkan login dengan NIP anda</p>
        <div class="card">
          <div class="card-body login-card-body">
            <?php if(count($errors) > 0): ?>
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> <?php echo e(trans('adminlte_lang::message.someproblems')); ?><br><br>
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>
              <form action="<?php echo e(url('/login')); ?>" method="post">
              <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
              <div class="form-group has-feedback">
                <input type="text" name="username" class="form-control" placeholder="Username" autocomplete="off" autofocus>
                <span class="fa fa-user form-control-feedback"></span>
              </div>
              <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" placeholder="Password" autocomplete="off">
                <span class="fa fa-lock form-control-feedback"></span>
              </div>
              <button type="submit" name="login" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </form>

          </div>
        </div>
      </div>
    <?php echo $__env->make('adminlte::layouts.partials.scripts_auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
</body>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::layouts.auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>