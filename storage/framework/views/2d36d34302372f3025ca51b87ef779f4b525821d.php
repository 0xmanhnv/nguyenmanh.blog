<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Nguyễn Mạnh | Đăng nhập</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="<?php echo e(asset('admin_nguyenmanh/bower_components/bootstrap/dist/css/bootstrap.min.css')); ?>">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo e(asset('admin_nguyenmanh/bower_components/font-awesome/css/font-awesome.min.css')); ?>">
        <!-- Ionicons -->
        <link rel="stylesheet" href="<?php echo e(asset('admin_nguyenmanh/bower_components/Ionicons/css/ionicons.min.css')); ?>">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo e(asset('admin_nguyenmanh/dist/css/AdminLTE.min.css')); ?>">
        <!-- iCheck -->
        <link rel="stylesheet" href="<?php echo e(asset('admin_nguyenmanh/plugins/iCheck/square/blue.css')); ?>">

        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
          <div class="login-logo">
            <a href="/"><b>Nguyễn</b>Mạnh</a>
          </div>
          <!-- /.login-logo -->
          <div class="login-box-body">
            <p class="login-box-msg">Đăng nhập để vào trang admin</p>

            <form class="form-horizontal" method="POST" action="<?php echo e(route('admin.login')); ?>">
                <?php echo e(csrf_field()); ?>

                <div class="form-group has-feedback <?php echo e($errors->has('username') ? ' has-error' : ''); ?>">
                    <input id="username" type="text" class="form-control" name="username" value="<?php echo e(old('username')); ?>" required autofocus placeholder="Email, Username, ... ">
                    <?php if($errors->has('username')): ?>
                        <span class="help-block">
                            <?php echo e($errors->first('username')); ?>

                        </span>
                    <?php endif; ?>
                </div>
                <div class="form-group has-feedback <?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                    <input id="password" type="password" class="form-control" name="password" required placeholder="Password">
                    <?php if($errors->has('password')): ?>
                        <span class="help-block">
                            <?php echo e($errors->first('password')); ?>

                        </span>
                    <?php endif; ?>
                </div>

                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>> Remember Me
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Đăng nhập</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <div class="social-auth-links text-center">
              <p>- OR -</p>
              <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
                Facebook</a>
              <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
                Google+</a>
            </div>
            <!-- /.social-auth-links -->

            <a class="btn btn-link" href="<?php echo e(route('password.request')); ?>">
                Quên mật khẩu?
            </a>
            

          </div>
          <!-- /.login-box-body -->
        </div>
        <!-- /.login-box -->

        <!-- jQuery 3 -->
        <script src="<?php echo e(asset('admin_nguyenmanh/bower_components/jquery/dist/jquery.min.js')); ?>"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="<?php echo e(asset('admin_nguyenmanh/bower_components/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>
        <!-- iCheck -->
        <script src="<?php echo e(asset('admin_nguyenmanh/plugins/iCheck/icheck.min.js')); ?>"></script>
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
</html>

