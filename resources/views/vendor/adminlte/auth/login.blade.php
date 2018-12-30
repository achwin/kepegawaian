@extends('adminlte::layouts.auth')

@section('htmlheader_title')
    Log in
@endsection

@section('content')
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
          <a href="#"><b>Sistem</b> Kepegawaian</a>
        </div>
        <p class="login-box-msg">Silahkan login dengan NIP anda</p>
        <div class="card">
          <div class="card-body login-card-body">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> {{ trans('adminlte_lang::message.someproblems') }}<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
              <form action="{{ url('/login') }}" method="post">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
    @include('adminlte::layouts.partials.scripts_auth')

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

@endsection
