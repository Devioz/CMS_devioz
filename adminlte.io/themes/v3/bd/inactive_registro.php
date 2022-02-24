

<?php
	session_start();  //aqui ya lo estas validando en el login ... 
?>

<?php

// Máxima duración de sesión activa en hora
define( 'MAX_SESSION_TIEMPO', 60 * 30 );

// Controla cuando se ha creado y cuando tiempo ha recorrido 
if ( isset( $_SESSION[ 'ULTIMA_ACTIVIDAD' ] ) && 
     ( time() - $_SESSION[ 'ULTIMA_ACTIVIDAD' ] > MAX_SESSION_TIEMPO ) ) {

    // Si ha pasado el tiempo sobre el limite destruye la session
    destruir_sessionn();
}

$_SESSION[ 'ULTIMA_ACTIVIDAD' ] = time();

// Función para destruir y resetear los parámetros de sesión
function destruir_sessionn() {

/* Connect to the local server using Windows Authentication and  
								specify the AdventureWorks database as the database in use. */  
								$serverName = "DESKTOP-PH9J3JU\SQLEXPRESS";  
								$connectionInfo = array(
									"Database"=>"Portal", 
									"UID"=>"Devioz", 
									"PWD"=>"Devioz10++",
									"CharacterSet" => "UTF-8");  
								$conn = sqlsrv_connect($serverName, $connectionInfo);
								if ($conn === false) { 
									echo "Could not connect.\n";  
									die(print_r(sqlsrv_errors(), true));  
								}  
								

                    $usuario = $_SESSION["user"];
                    $nombres = $_SESSION['Nombres'];
                    $apaterno = $_SESSION["Apaterno"];
                    $amaterno = $_SESSION["Amaterno"];
                    $nombresCompletos = $_SESSION['Nombres']." ".$_SESSION['Apaterno']." ".$_SESSION['Amaterno']	;											
                    
                    
								
							  /* Set up the parameterized query. */  
							  $tsql = "SET LANGUAGE SPANISH
							  INSERT INTO [dbo].[z_LOG_ACCESOS]   
							   ([usuario]
							  ,[nombres]
							  ,[Apaterno]
							  ,[Amaterno]
							  ,[Apellidos_Nombres]
							  ,[Periodo]
							  ,[Anio]
							  ,[Mes]
							  ,[Semana_ISO]
							  ,[Semana_Mes]
							  ,[Dia_Semana]
							  ,[Fecha_Hora]
							  ,[Fecha]
							  ,[Hora]
							  ,[Estado] 
							  ,[id_marcacion]
                              ,[marcacion]
                              ,[id_estadosMarcacion]
                              ,[estadosMarcacion]
							  )
							VALUES   
							('$usuario'
							,'$nombres'
							,'$apaterno'
							,'$amaterno'
							,'$nombresCompletos'
							,FORMAT(GETDATE(),'yyyyMM')
							,DATENAME(YEAR,GETDATE()) 
							,DATENAME(MONTH,GETDATE()) 
							,CONCAT('Semana',' ',FORMAT(DATEPART(ISO_WEEK, GETDATE()),'00'))
							,CONCAT('Semana',' ',FORMAT(DATEDIFF(WW, DATEADD( DD, DAY(GETDATE()) * -1, GETDATE()) +1, GETDATE())+1,'00'))
							,DATENAME(DW,GETDATE())                             
							,GETDATE()
							,CONVERT(DATE,GETDATE())
							,CAST(GETDATE() AS TIME(0))
							,'Cierre por Inactividad'
							,''
                            ,''
                            ,''
                            ,''
							)
							SET LANGUAGE ENGLISH
                            ";  
							  /* Set parameter values.   
							  $params = array(
                         $_SESSION["user"]
												,$_SESSION['Nombres']
							  					,$_SESSION["Apaterno"]
												,$_SESSION["Amaterno"]
												,$_SESSION['Nombres']." ".$_SESSION['Apaterno']." ".$_SESSION['Amaterno']												
												,date('Y',  strtotime('-1 hours'))
												,date('F',  strtotime('-1 hours'))
												,'Semana'." ".date('W',  strtotime('-1 hours'))
												,date('l',  strtotime('-1 hours'))
												,date('Y-m-d H:i:s', strtotime('-1 hours')) 
												,date('Y-m-d', strtotime('-1 hours'))
												,date('H:i:s', strtotime('-1 hours'))
												,$_POST['marcacion']
											  ); 	
							  */
							  /* Prepare and execute the query. */  
								$stmt = sqlsrv_query($conn, $tsql);  
								if ($stmt) {  
									echo '<script> window.location="/adminlte.io/themes/v3/bd/logout.php"; </script>';;  
								} else {  
									echo "Fallo Registro de ingreso.\n";  
									die(print_r(sqlsrv_errors(), true));  
								}






}


?>





