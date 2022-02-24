
<?php
session_start();
include '../../bd/server.php';   

if(!isset($_SESSION['user'])) 

    { echo '<script> window.location="/adminlte.io/themes/v3/pages/acc_design/index.php"; </script>';} 

?>


<?php 

    $fecha_hoy=date('Y-m-d');

	$sql = "select 
            a.[usuario],
            a.[Fecha],
            a.[Hora],
            a.[Estado],
            a.[id_marcacion],
            b.[marcacion],
            a.[id_estadosMarcacion],
            c.[estadosMarcacion],
            c.estado_inicio_fin 
            from dbo.z_LOG_ACCESOS a
            left join dbo.[00_18_Marcacion] b on b.id_marcacion = a.id_marcacion
            join dbo.[00_19_EstadosMarcacion] c on c.id_estadosMarcacion = a.id_estadosMarcacion
            where a.usuario = '".$_SESSION['usuario']."' and 
                a.id_marcacion = 1 and
                a.Fecha = '".$fecha_hoy."'	  
            order by a.id_log asc;";
                        
	$result = sqlsrv_query( $conn, $sql );


	$array = array();

	while ($ver=sqlsrv_fetch_array($result)) {

        // echo var_dump($ver);

        $ini_fin = $ver["estado_inicio_fin"];   
        $hora = $ver["Hora"];

        $array[] = array(
            'ini_fin'=>$ini_fin,
            'hora'=>$hora
        );

	}

    echo json_encode($array);


?>

