<?php
session_start();
include '../../bd/server.php';

$identificador=$_REQUEST["identificador"];
$accion=$_REQUEST["accion"];
$tabla="dbo.secciones";
$campo=trim($_REQUEST["columna"]);
$valor=$_REQUEST["valor"];
switch($accion){
    case "update":
        if($campo=="imagen")
        {
            //aqui recuperar e insertar la imagen
            if (move_uploaded_file($_FILES["file"]["tmp_name"], "../../public/secciones/".$_FILES['file']['name'])) {
                //more code here...
                //echo "images/".$_FILES['file']['name'];
                $sql="Update ".$tabla." set ".$campo."='".$_FILES['file']['name']."' where id='".$identificador."'";
                //echo $sql;
            }
            //print_r(error_get_last());
        }else{
            if($campo=='enlace'){
                $valor = $valor;
                $findme   = 'http://';
                $pos = strpos($valor, 'http://');
                $pos2 = strpos($valor, 'https://');
                if ($pos === false && $pos2 === false) {
                    $valor="http://".$valor;
                }
            }
            $sql="Update ".$tabla." set ".$campo."='".$valor."' where id='".$identificador."'";
        }
        //echo $sql."<br>"; 
        $result = sqlsrv_query( $conn, $sql );
        echo "1";
        break;
    case "eliminar":
        if($identificador!='')
        {
            $sql="delete from ".$tabla." where id='".$identificador."'";
            $result = sqlsrv_query( $conn, $sql );
            echo "1";
        }
        break;
}

?>