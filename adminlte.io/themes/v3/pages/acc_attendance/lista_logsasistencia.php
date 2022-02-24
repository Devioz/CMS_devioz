
<?php
session_start();
include '../../bd/server.php';   

if(!isset($_SESSION['user'])) 

    { echo '<script> window.location="/adminlte.io/themes/v3/pages/acc_design/index.php"; </script>';} 

?>


<?php 


include '../../bd/server.php';  

	$sql = "select 
                a.[usuario],
                a.[Fecha_Hora],
                a.[Estado],
                a.[id_marcacion],
                b.[marcacion],
                a.[id_estadosMarcacion],
                c.[estadosMarcacion],
                c.estado_inicio_fin 
            from dbo.z_LOG_ACCESOS a
            left join dbo.[00_18_Marcacion] b on b.id_marcacion = a.id_marcacion
            join dbo.[00_19_EstadosMarcacion] c on c.id_estadosMarcacion = a.id_estadosMarcacion
            where a.usuario = '".$_SESSION['usuario']."'
            order by a.id_log desc";
    

	$result = sqlsrv_query( $conn, $sql );


	$array = array();

	while ($ver=sqlsrv_fetch_array($result)) {

        // echo var_dump($ver);

        $estado = $ver[2];
        $marcacion = $ver[4];
        $estadosMarcacion = $ver[6];

        // $fecha = $ver[2];
        $fecha = json_encode($ver[1]);
        // $hora = json_encode($ver[2]);

        $array[] = array(
            'estado'=>$estado,
            'marcacion'=>$marcacion,
            'estadoMarca'=>$estadosMarcacion,
            'fecha'=>$fecha,
            // 'hora'=>$hora
        );

        // echo var_dump($ver); 

	}

	// echo  $cadena.="</tr>"	;
    // echo var_dump($array);
    echo json_encode($array);


?>

