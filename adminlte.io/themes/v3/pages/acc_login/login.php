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

<html lang="es"><head>
    <meta charset="utf-8">
    <title>Color Admin | Login v2</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
    <meta content="" name="description">
    <meta content="" name="author">
    
    <link href="../../plugins/seantheme/css/vendor.min.css" rel="stylesheet">
    <link href="../../plugins/seantheme/css/app.min.css" rel="stylesheet">
    <link href="../../plugins/seantheme/css/ionicons.min.css" rel="stylesheet">
    <style type="text/css">
      .btn-success {
        background-color: #0A3431 !important;
        border-color: #0A3431 !important;
    }
    </style>
    </head>
    <body class="pace-done pace-top"><div class="pace pace-inactive"><div class="pace-progress" data-progress-text="100%" data-progress="99" style="transform: translate3d(100%, 0px, 0px);">
      <div class="pace-progress-inner"></div>
    </div>
    <div class="pace-activity"></div></div>
    
    <div id="loader" class="app-loader loaded">
    <span class="spinner"></span>
    </div>
    
    
    <div id="app" class="app">
    
    <div class="login login-v2 fw-bold">
    
    <div class="login-cover">
    <div class="login-cover-img" style="background-image: url(../../plugins/seantheme/img/login-bg-12.jpg)" data-id="login-cover-image"></div>
    <div class="login-cover-bg"></div>
    </div>
    
    
    <div class="login-container">
    
    <div class="login-header">
    <div class="brand">
    <div class="d-flex align-items-center">
    <span class="logo"><i class="ion-ios-cloud"></i></span> <b>Portal</b> Unificado
    </div>
    <small>Inicie sesión</small>
    </div>
    <div class="icon">
    <i class="fa fa-lock"></i>
    </div>
    </div>
    
    
    <div class="login-content">
      <form action="../../bd/validate.php" method="post">
        <div class="form-floating mb-20px">
          <input type="text" class="form-control fs-13px h-45px border-0" placeholder="Usuario" name="user">
          <label for="emailAddress" class="d-flex align-items-center text-gray-600 fs-13px">Usuario</label>
        </div>
        <div class="form-floating mb-20px">
          <input type="password" class="form-control fs-13px h-45px border-0" placeholder="Contraseña" name="pw">
          <label for="emailAddress" class="d-flex align-items-center text-gray-600 fs-13px">Contraseña</label>
        </div>
        <div class="form-check mb-20px">
          <input class="form-check-input border-0" type="checkbox" value="1" id="rememberMe">
          <label class="form-check-label fs-13px text-gray-500" for="rememberMe">
          Recordarme
          </label>
        </div>
        <div class="mb-20px">
          <button type="submit" class="btn btn-success d-block w-100 h-45px btn-lg" name="login">Iniciar sesión</button>
        </div>
        <div class="text-gray-500">
          ¿No recuerda su contraseña? Click <a href="javascript:;" class="text-white">aquí</a> para recuperar.
        </div>
      </form>
    </div>
    
    </div>
    
    </div>
    
    
    <div class="login-bg-list clearfix">
    <div class="login-bg-list-item active"><a href="javascript:;" class="login-bg-list-link" data-toggle="login-change-bg" data-img="../../plugins/seantheme/img/login-bg-17.jpg" style="background-image: url(../../plugins/seantheme/img/login-bg-17.jpg)"></a></div>
    <div class="login-bg-list-item"><a href="javascript:;" class="login-bg-list-link" data-toggle="login-change-bg" data-img="../../plugins/seantheme/img/login-bg-16.jpg" style="background-image: url(../../plugins/seantheme/img/login-bg-16.jpg)"></a></div>
    <div class="login-bg-list-item"><a href="javascript:;" class="login-bg-list-link" data-toggle="login-change-bg" data-img="../../plugins/seantheme/img/login-bg-15.jpg" style="background-image: url(../../plugins/seantheme/img/login-bg-15.jpg)"></a></div>
    <div class="login-bg-list-item"><a href="javascript:;" class="login-bg-list-link" data-toggle="login-change-bg" data-img="../../plugins/seantheme/img/login-bg-14.jpg" style="background-image: url(../../plugins/seantheme/img/login-bg-14.jpg)"></a></div>
    <div class="login-bg-list-item"><a href="javascript:;" class="login-bg-list-link" data-toggle="login-change-bg" data-img="../../plugins/seantheme/img/login-bg-13.jpg" style="background-image: url(../../plugins/seantheme/img/login-bg-13.jpg)"></a></div>
    <div class="login-bg-list-item"><a href="javascript:;" class="login-bg-list-link" data-toggle="login-change-bg" data-img="../../plugins/seantheme/img/login-bg-12.jpg" style="background-image: url(../../plugins/seantheme/img/login-bg-12.jpg)"></a></div>
    </div>
    
    
    <div class="theme-panel">
    <a href="javascript:;" data-toggle="theme-panel-expand" class="theme-collapse-btn"><i class="fa fa-cog"></i></a>
    <div class="theme-panel-content ps ps--active-y" data-scrollbar="true" data-height="100%" data-init="true" style="height: 100%;">
    <h5>App Settings</h5>
    
    <div class="theme-list">
    <div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-red" data-theme-class="theme-red" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Red" data-bs-original-title="" title="">&nbsp;</a></div>
    <div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-pink" data-theme-class="theme-pink" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Pink" data-bs-original-title="" title="">&nbsp;</a></div>
    <div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-orange" data-theme-class="theme-orange" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Orange" data-bs-original-title="" title="">&nbsp;</a></div>
    <div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-yellow" data-theme-class="theme-yellow" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Yellow" data-bs-original-title="" title="">&nbsp;</a></div>
    <div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-lime" data-theme-class="theme-lime" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Lime" data-bs-original-title="" title="">&nbsp;</a></div>
    <div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-green" data-theme-class="theme-green" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Green" data-bs-original-title="" title="">&nbsp;</a></div>
    <div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-teal" data-theme-class="theme-teal" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Teal" data-bs-original-title="" title="">&nbsp;</a></div>
    <div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-cyan" data-theme-class="theme-cyan" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Cyan" data-bs-original-title="" title="">&nbsp;</a></div>
    <div class="theme-list-item active"><a href="javascript:;" class="theme-list-link bg-blue" data-theme-class="" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Default" data-bs-original-title="" title="">&nbsp;</a></div>
    <div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-purple" data-theme-class="theme-purple" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Purple" data-bs-original-title="" title="">&nbsp;</a></div>
    <div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-indigo" data-theme-class="theme-indigo" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Indigo" data-bs-original-title="" title="">&nbsp;</a></div>
    <div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-black" data-theme-class="theme-gray-600" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Black" data-bs-original-title="" title="">&nbsp;</a></div>
    </div>
    
    <div class="theme-panel-divider"></div>
    <div class="row mt-10px">
    <div class="col-8 control-label text-dark fw-bold">
    <div>Dark Mode <span class="badge bg-primary ms-1 py-2px position-relative" style="top: -1px;">NEW</span></div>
    <div class="lh-14">
    <small class="text-dark opacity-50">
    Adjust the appearance to reduce glare and give your eyes a break.
    </small>
    </div>
    </div>
    <div class="col-4 d-flex">
    <div class="form-check form-switch ms-auto mb-0">
    <input type="checkbox" class="form-check-input" name="app-theme-dark-mode" id="appThemeDarkMode" value="1">
    <label class="form-check-label" for="appThemeDarkMode">&nbsp;</label>
    </div>
    </div>
    </div>
    <div class="theme-panel-divider"></div>
    
    <div class="row mt-10px align-items-center">
    <div class="col-8 control-label text-dark fw-bold">Header Fixed</div>
    <div class="col-4 d-flex">
    <div class="form-check form-switch ms-auto mb-0">
    <input type="checkbox" class="form-check-input" name="app-header-fixed" id="appHeaderFixed" value="1" checked="">
    <label class="form-check-label" for="appHeaderFixed">&nbsp;</label>
    </div>
    </div>
    </div>
    <div class="row mt-10px align-items-center">
    <div class="col-8 control-label text-dark fw-bold">Header Inverse</div>
    <div class="col-4 d-flex">
    <div class="form-check form-switch ms-auto mb-0">
    <input type="checkbox" class="form-check-input" name="app-header-inverse" id="appHeaderInverse" value="1">
    <label class="form-check-label" for="appHeaderInverse">&nbsp;</label>
    </div>
    </div>
    </div>
    <div class="row mt-10px align-items-center">
    <div class="col-8 control-label text-dark fw-bold">Sidebar Fixed</div>
    <div class="col-4 d-flex">
    <div class="form-check form-switch ms-auto mb-0">
    <input type="checkbox" class="form-check-input" name="app-sidebar-fixed" id="appSidebarFixed" value="1" checked="">
    <label class="form-check-label" for="appSidebarFixed">&nbsp;</label>
    </div>
    </div>
    </div>
    <div class="row mt-10px align-items-center">
    <div class="col-8 control-label text-dark fw-bold">Sidebar Grid</div>
    <div class="col-4 d-flex">
    <div class="form-check form-switch ms-auto mb-0">
    <input type="checkbox" class="form-check-input" name="app-sidebar-grid" id="appSidebarGrid" value="1">
    <label class="form-check-label" for="appSidebarGrid">&nbsp;</label>
    </div>
    </div>
    </div>
    <div class="row mt-10px align-items-center">
    <div class="col-md-8 control-label text-dark fw-bold">Gradient Enabled</div>
    <div class="col-md-4 d-flex">
    <div class="form-check form-switch ms-auto mb-0">
    <input type="checkbox" class="form-check-input" name="app-gradient-enabled" id="appGradientEnabled" value="1">
    <label class="form-check-label" for="appGradientEnabled">&nbsp;</label>
    </div>
    </div>
    </div>
    
    
    <div class="theme-panel-divider"></div>
    <a href="https://seantheme.com/color-admin/documentation/" class="btn btn-dark d-block w-100 rounded-pill mb-10px" target="_blank"><b>Documentation</b></a>
    <a href="javascript:;" class="btn btn-default d-block w-100 rounded-pill" data-toggle="reset-local-storage"><b>Reset Local Storage</b></a>
    <div class="ps__rail-x" style="left: 0px; bottom: -623px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 623px; height: 351px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 152px; height: 85px;"></div></div></div>
    </div>
    
    
    <a href="javascript:;" class="btn btn-icon btn-circle btn-primary btn-scroll-to-top" data-toggle="scroll-to-top"><i class="fa fa-angle-up"></i></a>
    
    </div>
    
    
    <!--<script async="" src="https://www.google-analytics.com/analytics.js"></script>-->
    <script src="../../plugins/seantheme/js/vendor.min.js" type="text/javascript"></script>
    <script src="../../plugins/seantheme/js/app.min.js" type="text/javascript"></script>
    
    
    <script src="../../plugins/seantheme/js/login-v2.demo.js" type="text/javascript"></script>
    
 
    <!--
    <script defer="" src="https://static.cloudflareinsights.com/beacon.min.js/v652eace1692a40cfa3763df669d7439c1639079717194" integrity="sha512-Gi7xpJR8tSkrpF7aordPZQlW2DLtzUlZcumS8dMQjwDHEnw9I7ZLyiOj/6tZStRBGtGgN6ceN6cMH8z7etPGlw==" data-cf-beacon="{&quot;rayId&quot;:&quot;6e1417490b7f56b2&quot;,&quot;version&quot;:&quot;2021.12.0&quot;,&quot;r&quot;:1,&quot;token&quot;:&quot;4db8c6ef997743fda032d4f73cfeff63&quot;,&quot;si&quot;:100}" crossorigin="anonymous"></script>
      -->
    </body></html>