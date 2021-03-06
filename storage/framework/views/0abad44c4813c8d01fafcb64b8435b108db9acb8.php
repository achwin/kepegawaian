<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <?php if(! Auth::guest()): ?>
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?php echo e(Gravatar::get($user->email)); ?>" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p><?php echo e(Auth::user()->name); ?></p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> <?php echo e(trans('adminlte_lang::message.online')); ?></a>
                </div>
            </div>
        <?php endif; ?>

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">            
            <li
            <?php if($page == 'dashboard'): ?>
            <?php echo 'class="active"'; ?>

            <?php endif; ?>
            >
                <a href="<?php echo e(url('home')); ?>"><i class='fa fa-home'></i> <span>Dashboard</span></a>
            </li>
            
<!--             <li
            <?php if($page == 'kasir'): ?>
            <?php echo 'class="active"'; ?>

            <?php endif; ?>
            >
                <a href="<?php echo e(url('transaksi/add-transaksi')); ?>"><i class='fa fa-money'></i> <span>Kasir</span></a>
            </li> -->
            <li
            <?php if($page == 'input-data'): ?>
            <?php echo 'class="active"'; ?>

            <?php endif; ?>
            >
                <a href="<?php echo e(url('input-data')); ?>"><i class='fa fa-plus'></i> <span>Input data</span></a>
            </li> 
            <li
            <?php if($page == 'data-siswa'): ?>
            <?php echo 'class="active"'; ?>

            <?php endif; ?>
            >
                <a href="<?php echo e(url('data-siswa')); ?>"><i class='fa fa-pencil'></i> <span>Data siswa</span></a>
            </li>
            <li
            <?php if($page == 'export'): ?>
            <?php echo 'class="active"'; ?>

            <?php endif; ?>
            >
                <a href="<?php echo e(url('export')); ?>"><i class='fa fa-print'></i> <span>Export</span></a>
            </li>
        </ul><!-- /.sidebar-menu
    </section>
    <!-- /.sidebar -->
</aside>
