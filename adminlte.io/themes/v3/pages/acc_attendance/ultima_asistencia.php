
<?php
session_start();
include '../../bd/server.php';   

if(!isset($_SESSION['user'])) 

    { echo '<script> window.location="/adminlte.io/themes/v3/pages/acc_design/index.php"; </script>';} 

?>


<?php 


include '../../bd/server.php';  

$subEstado=$_POST['subEstado'];

	$sql="select TOP 1 
		a.[usuario],		
		a.[id_marcacion],		
		a.[id_estadosMarcacion],
		b.estado_inicio_fin 
		from dbo.z_LOG_ACCESOS a
		join dbo.[00_19_EstadosMarcacion] b on b.id_estadosMarcacion = a.id_estadosMarcacion
		where usuario = '".$_SESSION['usuario']."' and a.id_marcacion not in (1)
		order by id_log desc;		
	";


	$result = sqlsrv_query( $conn, $sql );


	// echo $result;

	$array = array();

	while ($ver=sqlsrv_fetch_array($result)) {
		$usuario = $ver[0];
		$id_marcacion = $ver[1];
		$id_estadosMarcacion = $ver[2];
		$estado_inicio_fin = $ver[3];
		// echo var	_dump($ver);

		$array = array(
					'usuario'=>$usuario,
					'marcacion'=>$id_marcacion,
					'submarcacion'=>$id_estadosMarcacion,
					'est_ini_fin'=>$estado_inicio_fin
				);
		//echo $usuario;
	}

	// echo $array;

	echo json_encode($array);



?>

