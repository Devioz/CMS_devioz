<?php
session_start();
include '../../bd/server.php';   

if(!isset($_SESSION['user'])) 

    { echo '<script> window.location="/adminlte.io/themes/v3/pages/acc_design/index.php"; </script>';} 

?>


<?php 

//Recojemos el parámetro
$valor1=$_POST['lista1'];
$valor2=$_POST['lista2'];

?>


<?php
	

                    $usuario = $_SESSION["user"];
                    $nombres = $_SESSION['Nombres'];
                    $apaterno = $_SESSION["Apaterno"];
                    $amaterno = $_SESSION["Amaterno"];
                    $nombresCompletos = $_SESSION['Nombres']." ".$_SESSION['Apaterno']." ".$_SESSION['Amaterno']	;
                 
								
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
                              ,'Marcacion Interna'
                              ,'$valor1'
                              ,''
                              ,'$valor2'
                              ,''
                              )
                              SET LANGUAGE ENGLISH


                              UPDATE [z_LOG_ACCESOS]

                              SET
                              [marcacion] = C.[marcacion],
                              [estadosMarcacion] = B.[estadosMarcacion]


                              FROM [z_LOG_ACCESOS] A

                              INNER JOIN [dbo].[00_19_EstadosMarcacion] B
                              ON A.[id_estadosMarcacion] = B.[id_estadosMarcacion]

                              INNER JOIN [dbo].[00_18_Marcacion] C
                              ON A.[id_marcacion] = C.[id_marcacion]



                              WHERE A.id_log = (SELECT TOP 1 id_log FROM [z_LOG_ACCESOS] ORDER BY id_log DESC )







                              "; 
								$stmt = sqlsrv_query($conn, $tsql); 
                
								if ($stmt) {  
									echo 1; 
								} else {  
									echo 0;  
									die(print_r(sqlsrv_errors(), true));  
								}  

                



?>