<?php
session_start();


// session_start(); //esto ya lo tenia en el login o porque lo inicias 
include '../../bd/server.php';  
include '../../bd/inactive_registro.php'; 
//include '../../bd/inactive.php'; 



if(isset($_SESSION['user'])) {

  include '../acc_design/header.php';

  include '../acc_design/nav.php';
  
  include '../acc_design/aside.php';
  
  include 'index.php';
  
  include '../acc_design/footer.php';
  



}else{
	echo '<script> window.location="../../../../../index.html"; </script>';
}

	?>
