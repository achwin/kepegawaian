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
            <?php if(Auth::user()->employee->position->name == 'Supervisor'): ?>
            <li
            <?php if($page == 'master'): ?>
            <?php echo 'class="active"'; ?>

            <?php endif; ?>
             class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>Data master</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo e(url('master/jabatan')); ?>">Jabatan</a></li>
                    <li><a href="<?php echo e(url('master/pegawai')); ?>">Pegawai</a></li>
                </ul>
            </li>
            <li
            <?php if($page == 'history-absensi'): ?>
            <?php echo 'class="active"'; ?>

            <?php endif; ?>
            >
                <a href="<?php echo e(url('history-absensi')); ?>"><i class='fa fa-pencil'></i> <span>History Absensi</span></a>
            </li>
            <li
            <?php if($page == 'tasks'): ?>
            <?php echo 'class="active"'; ?>

            <?php endif; ?>
            >
                <a href="<?php echo e(url('tasks')); ?>"><i class='fa fa-pencil'></i> <span>List Task</span></a>
            </li>
            <?php endif; ?>
            <!-- <li
            <?php if($page == 'export'): ?>
            <?php echo 'class="active"'; ?>

            <?php endif; ?>
            >
                <a href="<?php echo e(url('export')); ?>"><i class='fa fa-print'></i> <span>Export</span></a>
            </li> -->
        </ul><!-- /.sidebar-menu
    </section>
    <!-- /.sidebar -->
</aside>
