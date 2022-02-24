
<?php
session_start();
include '../../bd/server.php';   

if(!isset($_SESSION['user'])) 

    { echo '<script> window.location="/adminlte.io/themes/v3/pages/acc_design/index.php"; </script>';} 

?>


<?php 


include '../../bd/server.php';  

$subEstado=$_POST['subEstado'];

$cierre = $_POST['cierre'];

// echo $cierre;									

if($cierre === 'true'){
	$sql = "	SELECT a.[id_estadosMarcacion]
					,a.[id_marcacion]
					,a.[estadosMarcacion]
				FROM dbo.[00_19_EstadosMarcacion] a
				WHERE id_estadosMarcacion IN (SELECT TOP 1 a.[id_estadosMarcacion] + 1
											FROM dbo.z_LOG_ACCESOS a
											JOIN dbo.[00_19_EstadosMarcacion] b ON b.id_estadosMarcacion = a.id_estadosMarcacion
											WHERE usuario = '".$_SESSION['usuario']."'
											ORDER BY id_log desc) 
					";
}else{
		$sql="	SELECT 
				a.[id_estadosMarcacion]
				,a.[id_marcacion]
				,a.[estadosMarcacion]
			FROM [dbo].[00_19_EstadosMarcacion] a
			join dbo.[00_19_EstadosMarcacion] c on c.id_estadosMarcacion = a.id_estadosMarcacion
			WHERE a.[id_marcacion]='$subEstado' and c.estado_inicio_fin in ('1')		
	";
}

// echo $sql; 

	$result = sqlsrv_query( $conn, $sql );


	$cadena="<select class='form-control' id='lista2' name='lista2'>";

	$cadena.="<option value='0'>Seleccionar</option>";
	while ($ver=sqlsrv_fetch_array($result)) {
		$cadena=$cadena.'<option value='.$ver[0].'>'.($ver[2]).'</option>';
	}

	echo  $cadena."</select>"	;



?>

