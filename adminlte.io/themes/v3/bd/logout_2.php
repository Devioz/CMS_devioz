<?php
session_start();



require 'server.php';


                    $usuario = $_SESSION["user"];
                    $nombres = $_SESSION['Nombres'];
                    $apaterno = $_SESSION["Apaterno"];
                    $amaterno = $_SESSION["Amaterno"];
                    $nombresCompletos = $_SESSION['Nombres']." ".$_SESSION['Apaterno']." ".$_SESSION['Amaterno'];	
								
							  /* Set up the parameterized query. */  
							  $tsql = "
                              SET LANGUAGE SPANISH
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
                              ,'Desconexion'
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
							 $stmt = sqlsrv_query($conn, $tsql, $params);  
							 if ($stmt) {  
                                echo "Finalizar Sesion"; 
							 } else {  
								 echo "Fallo Registro de ingreso.\n";  
								 die(print_r(sqlsrv_errors(), true));  
							 }

















session_destroy();
echo 'Cerraste sesión';
echo '<script> window.location="../../../../../index.html"; </script>';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Saliendo...</title>
	<meta charset="utf-8">
</head>
<body>
<script language="javascript">location.href = "../../../../../index.html";</script>
</body>
</html>