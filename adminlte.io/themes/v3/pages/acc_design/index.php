
<?php
session_start();

if(isset($_SESSION['user'])) {

	include 'index_.php';
	//include 'index_version.php';

}else{
	echo '<script> window.location="../../../../../index.html"; </script>';
}

	?>
