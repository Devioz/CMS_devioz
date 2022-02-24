<?php
session_start();
include '../../bd/server.php';   

if(!isset($_SESSION['user'])){ 
    echo '<script> window.location="/adminlte.io/themes/v3/pages/acc_design/index.php"; </script>';
} 

								

	

    $data = array('labels' => array(), 'datasets' => array());
    $data['datasets'][0] = array( 
        'backgroundColor'=> "rgba(210, 214, 222, 1)",
        'borderColor'=> "rgba(210, 214, 222, 1)",
        'data'=> array(),
        'label'=> "Promedio total",
        'pointColor'=> "rgba(210, 214, 222, 1)",
        'pointHighlightFill'=> "#fff",
        'pointHighlightStroke'=> "rgba(220,220,220,1)",
        'pointRadius'=> false,
        'pointStrokeColor'=> "#c1c7d1"
        );

    $data['datasets'][1] = array( 
        'backgroundColor'=> "rgba(60,141,188,0.9)",
        'borderColor'=> "rgba(60,141,188,0.8)",
        'data'=> array(),
        'label'=> "Promedio usuario",
        'pointColor'=> "#3b8bba",
        'pointHighlightFill'=> "#fff",
        'pointHighlightStroke'=> "rgba(60,141,188,1)",
        'pointRadius'=> false,
        'pointStrokeColor'=> "rgba(60,141,188,1)"
        );    
        
    if ($fecha=$_POST['r'] == "t1"){

        $sql = "EXEC dbo.usp_PromedioEventos_Usuario '".$_SESSION['usuario']."'";
        $result = sqlsrv_query( $conn, $sql );


        $data['datasets'][0]['label'] = "Promedio total";
        $data['datasets'][1]['label'] = "Promedio usuario";


        while ($row=sqlsrv_fetch_array($result)) {
            $data['labels'][] = $row[1];
            array_push($data['datasets'][0]['data'],$row[2]); // promedio general
            array_push($data['datasets'][1]['data'],$row[3]); // promedio usuario        
        }

        // Reporte por tiempo en segundos
    }elseif ($_POST['r'] == "t2"){
        $data['datasets'][0]['label'] = "Promedio total";
        $data['datasets'][1]['label'] = "Minutos usuario";
        $result_p = sqlsrv_query( $conn, "EXEC dbo.usp_TiempoEvento_Promedio '".$_POST['fecha']."';" );

        while ($row=sqlsrv_fetch_array($result_p)) {
            $data['labels'][] = $row[0];
            array_push($data['datasets'][0]['data'],$row[1]); // promedio general
        }
        $result_u = sqlsrv_query( $conn, "EXEC dbo.usp_TiempoEvento_Usuario '".$_SESSION['usuario']."','".$_POST['fecha']."';" );
        while ($row=sqlsrv_fetch_array($result_u)) {
            array_push($data['datasets'][1]['data'],$row[1]); // minutos usuario
        }
    }elseif($_POST['r'] == "t3"){                
        $usuario = $_SESSION['usuario'];
        $fecha = $_POST['fecha'];
        $id_evento = $_POST['idEvento'];
        $horas_dia = 10;
        $hora_inicio = 9;

        $data['datasets'][0]['label'] = "Tiempo del usuario";

        $sql = "EXEC usp_TiempoEventoDiario_Usuario ?,?,?,?,?";
        $result = sqlsrv_query($conn,$sql, array($usuario,$fecha,$id_evento,$horas_dia,$hora_inicio));
 

        if( $result === false ) {
            if( ($errors = sqlsrv_errors() ) != null) {
                foreach( $errors as $error ) {
                    echo "SQLSTATE: ".$error[ 'SQLSTATE']."<br />";
                    echo "code: ".$error[ 'code']."<br />";
                    echo "message: ".$error[ 'message']."<br />";
                }
            }
        }

        while ($row=sqlsrv_fetch_array($result)) {
            //var_dump($row);
            //echo $row['Hora'].'<br/>';
            $data['labels'][] = $row['Hora'];
            array_push($data['datasets'][0]['data'],$row['segundos']); 
        }
        unset($data['datasets'][1]);
       
        $data['datasets'][0]['pointBorderColor'] = '#007bff';
        $data['datasets'][0]['pointBackgroundColor'] = '#007bff';
        $data['datasets'][0]['borderWidth'] = 7;
        $data['datasets'][0]['pointRadius'] = true;
        
    }


	echo  json_encode($data);



?>

