
<?php
session_start();
include '../../bd/server.php';   

if(!isset($_SESSION['user'])) 

    { echo '<script> window.location="/adminlte.io/themes/v3/pages/acc_design/index.php"; </script>';} 

?>


<?php 

    $fecha=$_POST['fecha'];
    // $fecha_search=date('Y-m-d');

	$sql = "SELECT a.id_marcacion, b.marcacion,a.id_estadosMarcacion, c.estadosMarcacion, a.Fecha_Hora,a.Fecha,Hora,c.estado_inicio_fin
    FROM dbo.z_LOG_ACCESOS a
    left join dbo.[00_18_Marcacion] b on b.id_marcacion = a.id_marcacion
    join dbo.[00_19_EstadosMarcacion] c on c.id_estadosMarcacion = a.id_estadosMarcacion
    where id_log in (select 
                    a.id_log
                    from dbo.z_LOG_ACCESOS a
                    left join dbo.[00_18_Marcacion] b on b.id_marcacion = a.id_marcacion
                    join dbo.[00_19_EstadosMarcacion] c on c.id_estadosMarcacion = a.id_estadosMarcacion
                    where a.usuario = '".$_SESSION['usuario']."' and 
                        --  a.id_marcacion = 1 and
                            a.Fecha = '".$fecha."')
    order by Hora asc;";

    // echo $sql; exit();
                        
	$result = sqlsrv_query( $conn, $sql );


	$array = array();

	while ($ver=sqlsrv_fetch_array($result)) {

        // echo var_dump($ver);

        $marcacion = $ver["marcacion"];   
        $estadosMarcacion = $ver["estadosMarcacion"];
        $Fecha = $ver["Fecha"];
        $Hora = $ver["Hora"];

        $array[] = array(
            'marcacion'=>$marcacion,
            'estadosMarcacion'=>$estadosMarcacion,
            'Fecha'=>$Fecha,
            'Hora'=>$Hora,
        );

	}
    echo json_encode($array);


?>

