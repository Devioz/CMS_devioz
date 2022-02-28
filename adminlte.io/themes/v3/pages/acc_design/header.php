<?php
//session_start();
include '../../bd/server.php';   

if(!isset($_SESSION['user'])) 

    { echo '<script> window.location="/adminlte.io/themes/v3/pages/acc_design/index.php"; </script>';} 

?>

<!-- 
* Copyright 2018 Luis De Tomas
-->
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from adminlte.io/themes/v3/pages/examples/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 24 Oct 2021 06:03:13 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Portal | Unificado</title>

  <style type="text/css">
	/*

body {
	margin: 0;  padding: 0;  margin-bottom: 15px;  margin-top: 8px;
	background: #77b;
}
body, td {
	font: 14px "Trebuchet MS", Verdana, Arial, Helvetica, sans-serif;
	}

#subTitle {
	background: #000;  color: #fff;  padding: 4px;  font-weight: bold; 
	}

#siteNavigation a, #siteNavigation .current {
	font-weight: bold;  color: #448;
	}
#siteNavigation a:link    { text-decoration: none; }
#siteNavigation a:visited { text-decoration: none; }

#siteNavigation .current { background-color: #ccd; }

#siteNavigation a:hover   { text-decoration: none;  background-color: #fff;  color: #000; }
#siteNavigation a:active  { text-decoration: none;  background-color: #ccc; }


a:link    { text-decoration: underline;  color: #00f; }
a:visited { text-decoration: underline;  color: #000; }
a:hover   { text-decoration: underline;  color: #c00; }
a:active  { text-decoration: underline; }

#pageContent {
	clear: both;
	border-bottom: 6px solid #000;
	padding: 10px;  padding-top: 20px;
	line-height: 1.65em;
	background-image: url(backblue.gif);
	background-repeat: no-repeat;
	background-position: top right;
	}

#pageContent, #siteNavigation {
	background-color: #ccd;
	}


.imgLeft  { float: left;   margin-right: 10px;  margin-bottom: 10px; }
.imgRight { float: right;  margin-left: 10px;   margin-bottom: 10px; }

hr { height: 1px;  color: #000;  background-color: #000;  margin-bottom: 15px; }

h1 { margin: 0;  font-weight: bold;  font-size: 2em; }
h2 { margin: 0;  font-weight: bold;  font-size: 1.6em; }
h3 { margin: 0;  font-weight: bold;  font-size: 1.3em; }
h4 { margin: 0;  font-weight: bold;  font-size: 1.18em; }

.blak { background-color: #000; }
.hide { display: none; }


.tblRegular       { border-collapse: collapse; }
.tblRegular td    { padding: 6px;  background-image: url(fade.gif);  border: 2px solid #99c; }
.tblHeaderColor, .tblHeaderColor td { background: #99c; }
.tblNoBorder td   { border: 0; }


*/
.tableWidth { min-width: 400px; }
</style>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
  <!-- Font Awesome -->
  <!--<link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">-->
  <link rel="stylesheet" href="../../plugins/fontawesome-pro/css/fontawesome.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="../../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">

  <link rel="stylesheet" href="../../plugins/jquery.fatNav/css/jquery.fatNav.css" />
  <link rel="stylesheet" href="../../plugins/animate/css/animate.css" />

  <!--style cryptu-->
  <link rel="stylesheet" href="../../plugins/cryptu/css/style.css" />

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>


<!-- InputMask -->
<script src="../../plugins/moment/moment.min.js"></script>
<script src="../../plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="../../dist/js/demo.js"></script> -->
<!-- SweetAlert2 -->
<script src="../../plugins/sweetalert2/sweetalert2.min.js"></script>


<!-- DataTables  & Plugins -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!--custom input file-->
<script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

<!-- propias -->
<script type="text/javascript"> var BASE_URL = "<?php echo '//'.$_SERVER['HTTP_HOST'] . '/adminlte.io/themes/v3/';?>"; </script>
<script src="../../public/js/basic.js"></script>
</head>