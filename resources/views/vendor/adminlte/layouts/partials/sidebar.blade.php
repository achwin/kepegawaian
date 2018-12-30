<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">            
            <li
            @if($page == 'dashboard')
            {!! 'class="active"'!!}
            @endif
            >
                <a href="{{ url('home') }}"><i class='fa fa-home'></i> <span>Dashboard</span></a>
            </li>
            @if(Auth::user()->employee->position->name == 'Supervisor')
            <li
            @if($page == 'master')
            {!! 'class="active"'!!}
            @endif
             class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>Data master</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{url('master/jabatan')}}">Jabatan</a></li>
                    <li><a href="{{url('master/pegawai')}}">Pegawai</a></li>
                </ul>
            </li>
            <li
            @if($page == 'history-absensi')
            {!! 'class="active"'!!}
            @endif
            >
                <a href="{{ url('history-absensi') }}"><i class='fa fa-pencil'></i> <span>History Absensi</span></a>
            </li>
            @endif
            <!-- <li
            @if($page == 'export')
            {!! 'class="active"'!!}
            @endif
            >
                <a href="{{ url('export') }}"><i class='fa fa-print'></i> <span>Export</span></a>
            </li> -->
        </ul><!-- /.sidebar-menu
    </section>
    <!-- /.sidebar -->
</aside>
