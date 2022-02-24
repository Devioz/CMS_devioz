<?php
	

//$serverName = "DESKTOP-PH9J3JU\SQLEXPRESS"; //serverName\instanceName
$serverName = "192.168.1.122"; //serverName\instanceName
$connectionInfo = 

               array( 
                         "Database"=>"Portal", 
                         "UID"=>"Devioz", 
                         "PWD"=>"Devioz10++",
                         "CharacterSet" => "UTF-8"
                    );
                    $conn = sqlsrv_connect( $serverName, $connectionInfo);
                    
if( $conn === false ) {
     die( print_r( sqlsrv_errors(), true));
}




?>
