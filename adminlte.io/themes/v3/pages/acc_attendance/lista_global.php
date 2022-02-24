<?php
session_start();
include '../../bd/server.php';   

if(!isset($_SESSION['user'])) 

    { echo '<script> window.location="/adminlte.io/themes/v3/pages/acc_design/index.php"; </script>';} 

?>


<?php 
include '../../bd/server.php'; 

$data = null;
$html = "<option value ='0'> - Seleccione- </option>";
if($_POST['t'] == 'Evento'){
	$sql = "SELECT id_estadosMarcacion, trim(replace(estadosMarcacion,'Inicio de ','')) as Evento FROM [00_19_EstadosMarcacion] where estado_inicio_fin = 1 and estado = 1 and id_estadosMarcacion<> 1 order by id_estadosMarcacion";
                        
	$result = sqlsrv_query( $conn, $sql );
    
	while ($row=sqlsrv_fetch_array($result)) {
        $html.= "<option value ='".$row["id_estadosMarcacion"]."'>".$row["Evento"] ."</option>";
	}
    $data = $html;
}
elseif($_POST['t'] == 'Perfil'){
	$sql = "SELECT [perfil],[nombre_perfil] FROM [dbo].[z_PERFIL] order by [nombre_perfil]";
                        
	$result = sqlsrv_query( $conn, $sql );

	while ($row=sqlsrv_fetch_array($result)) {
        $html.= "<option value ='".$row["perfil"]."'>".$row["nombre_perfil"] ."</option>";
	}
    $data = $html;
}
elseif($_POST['t'] == 'Cargo'){
	$sql = "SELECT [id_cargo],[cargo] FROM [dbo].[00_02_Cargo] order by [cargo]";
                        
	$result = sqlsrv_query( $conn, $sql );

	while ($row=sqlsrv_fetch_array($result)) {
        $html.= "<option value ='".$row["id_cargo"]."'>".$row["cargo"] ."</option>";
	}
    $data = $html;
}
elseif($_POST['t'] == 'Funcion'){
	$sql = "SELECT [id_funcion],[funcion] FROM [dbo].[00_05_Funcion] order by [funcion]";
                        
	$result = sqlsrv_query( $conn, $sql );

	while ($row=sqlsrv_fetch_array($result)) {
        $html.= "<option value ='".$row["id_funcion"]."'>".$row["funcion"] ."</option>";
	}
    $data = $html;
}
elseif($_POST['t'] == 'users'){
	$sql = "SELECT  id_usuario,usuario,pw,nombres,Apaterno,Amaterno,cargo,funcion,nombre_perfil,perfil,usuario_reg,created_at, activo FROM [dbo].[z_USUARIO] where eliminado is null order by id_usuario";
                        
	$result = sqlsrv_query( $conn, $sql );
	$data = array("data"=>array());
	while ($row=sqlsrv_fetch_object($result)) {
//var_dump($row); //die();
		if($row->activo == '1'){
			$btn='btn-danger';
			$icon='fa fa-ban';
			$title='DESACTIVAR';
			$class='desactivarusuario';
			//$text = 'DESACTIVAR';
		}else{
			$btn='btn-success';
			$icon='fa fa-check';
			$title='ACTIVAR';
			$class='activarusuario';
			//$text = 'ACTIVAR';
		}
		unset($row->activo);
		$boton = '';
		$boton = '<button class="'.$class.' btn '.$btn.' btn-md" title="'.$title.'" data-idusuario="'.$row->id_usuario.'"><i class="fa fa-'.$icon.'" aria-hidden="true"></i></button> ';
		$boton .= '<button class="editarUsuario btn btn-warning btn-md" title="Editar" data-idusuario="'.$row->id_usuario.'"><i class="fa fa-pencil-alt" aria-hidden="true"></i></button> ';
		$boton .= '<button class="eliminarUsuario btn btn-default btn-md" title="Eliminar" data-idusuario="'.$row->id_usuario.'"><i class="fa fa-trash" aria-hidden="true"></i></button>';

		$row->buttons = $boton;
		//$row= array_merge($row, (object)["buttons" => $boton]);
        $data["data"][] = $row;
	}
    $data = json_encode($data);
}
elseif($_POST['t'] == 'user'){
	$sql = "SELECT  id_usuario,usuario,pw,nombres,Apaterno,Amaterno,cargo,funcion,nombre_perfil,perfil,usuario_reg,created_at, activo FROM [dbo].[z_USUARIO] where id_usuario =?;";
                        
	$result = sqlsrv_query( $conn, $sql, array($_POST['k']) );
	$data = array("data"=>array());
	while ($row=sqlsrv_fetch_object($result)) {

		$data["data"] =$row;
	}
	$data["status"] = 1;
    $data = json_encode($data);
}
    echo $data;
?>