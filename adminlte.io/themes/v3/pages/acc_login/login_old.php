

<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


	session_start();
	include '../../bd/server.php';
	if(isset($_SESSION['user'])){
	echo '<script> window.location="../acc_design/index.php"; </script>';
	}
?>




<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from adminlte.io/themes/v3/pages/examples/login-v2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 24 Oct 2021 06:03:16 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ingrese | Portal Unificado</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h1"><b>Portal</b> Unificado</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Regístrese para iniciar su sesión</p>

      <form action="../../bd/validate.php" method="post">
        <div class="input-group mb-3">
          <input type="name" class="form-control" placeholder="Usuario" name="user">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
       
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Contraseña" name="pw">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        
        <div class="row">
        
        </div>
     

      <div class="social-auth-links text-center mt-2 mb-3">
      <button type="submit" class="btn btn-block btn-primary" name="login">Ingresar</button>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fas fa-exclamation"></i> Olvide mi Contraseña
        </a>
      </div>
      </form>
      <!-- /.social-auth-links -->

      
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>

<!-- Mirrored from adminlte.io/themes/v3/pages/examples/login-v2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 24 Oct 2021 06:03:16 GMT -->
</html>
