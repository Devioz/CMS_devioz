<?php
ini_set('display_errors', 1);
session_start();
include '../../bd/server.php';   
include 'global.php';   

if(!isset($_SESSION['user'])) 

    { echo '<script> window.location="/adminlte.io/themes/v3/pages/acc_design/index.php"; </script>';} 

?>


<?php 
include '../../bd/server.php'; 

$data = null;
$html = "<option value ='0'> - Seleccione- </option>";
 
function getEvento($t = null){
	global $conn;
	global $html;
	$arr = array();
	$sql = "SELECT id_estadosMarcacion, trim(replace(estadosMarcacion,'Inicio de ','')) as Evento FROM [00_19_EstadosMarcacion] where estado_inicio_fin = 1 and estado = 1 and id_estadosMarcacion<> 1 order by id_estadosMarcacion";
                       
	$result = sqlsrv_query( $conn, $sql );
	if($t == "html"){
		while ($row=sqlsrv_fetch_array($result)) {
			$html.= "<option value ='".$row["id_estadosMarcacion"]."'>".$row["Evento"] ."</option>";
		}
		return $html;
	}else{
		while ($row=sqlsrv_fetch_array($result)) {
			$arr[] = $row;
		}
		return $arr;
	}
}

function getPerfil($t = null){
	global $conn;
	$html_ = $GLOBALS['html'];
	$arr = array();
	$sql = "SELECT [perfil],[nombre_perfil] FROM [dbo].[z_PERFIL] order by [nombre_perfil]";
                       
	$result = sqlsrv_query( $conn, $sql );
	if($t == "html"){
		while ($row=sqlsrv_fetch_array($result)) {
			$html_.= "<option value ='".$row["perfil"]."'>".$row["nombre_perfil"] ."</option>";
		}
		return $html_;
	}else{
		while ($row=sqlsrv_fetch_array($result)) {
			$arr[] = $row;
		}
		return $arr;
	}
}

function getCargo($t = null){
	global $conn;
	$html_ = $GLOBALS['html'];
	$arr = array();
	$sql = "SELECT [id_cargo],[cargo] FROM [dbo].[00_02_Cargo] order by [cargo]";
                       
	$result = sqlsrv_query( $conn, $sql );
	if($t == "html"){
		while ($row=sqlsrv_fetch_array($result)) {
			$html_.= "<option value ='".$row["id_cargo"]."'>".$row["cargo"] ."</option>";
		}
		return $html_;
	}else{
		while ($row=sqlsrv_fetch_array($result)) {
			$arr[] = $row;
		}
		return $arr;
	}
}

function getFuncion($t = null){
	global $conn;
	$html_ = $GLOBALS['html'];
	$arr = array();
	$sql = "SELECT [id_funcion],[funcion] FROM [dbo].[00_05_Funcion] order by [funcion]";
                       
	$result = sqlsrv_query( $conn, $sql );
	if($t == "html"){
		while ($row=sqlsrv_fetch_array($result)) {
			$html_.= "<option value ='".$row["id_funcion"]."'>".$row["funcion"] ."</option>";
		}
		return $html_;
	}else{
		while ($row=sqlsrv_fetch_array($result)) {
			$arr[] = $row;
		}
		return $arr;
	}
}

function getTipoDocumento($t = null){
	global $conn;
	$html_ = $GLOBALS['html'];
	$arr = array();
	$sql = "SELECT [IdTipodocumento],[Nombre] FROM [dbo].[01_02_TipoDcumento] order by [IdTipodocumento]";
                       
	$result = sqlsrv_query( $conn, $sql );
	if($t == "html"){
		while ($row=sqlsrv_fetch_array($result)) {
			$html_.= "<option value ='".$row["IdTipodocumento"]."'>".$row["Nombre"] ."</option>";
		}
		return $html_;
	}else{
		while ($row=sqlsrv_fetch_array($result)) {
			$arr[] = $row;
		}
		return $arr;
	}
}

function getSexo($t = null){
	$html_ = $GLOBALS['html'];
	$arr = array(
		"F" => "Mujer",
		"H" => "Hombre"
	);
	if($t == "html"){
		foreach ($arr as $i => $v) {
			$html_.= "<option value ='".$i."'>".$v."</option>";
		}
		return $html_;
	}else{		
		return $arr;
	}
}

function getEstadoCivil($t = null){
	$html_ = $GLOBALS['html'];
	$arr = array(
		1 => "Soltero(a)",
		2 => "Casado(a)",
		3 => "Divorciado(a)",
		4 => "Viudo(a)"
	);
	if($t == "html"){
		foreach ($arr as $i => $v) {
			$html_.= "<option value ='".$i."'>".$v."</option>";
		}
		return $html_;
	}else{		
		return $arr;
	}
}

function getDepartamento($t = null){
	global $conn;
	$html_ = $GLOBALS['html'];
	$arr = array();
	$sql = "SELECT id_departamento, departamento FROM [dbo].[00_15_Departamento] ORDER BY [id_departamento]";
                       
	$result = sqlsrv_query( $conn, $sql );
	if($t == "html"){
		while ($row=sqlsrv_fetch_array($result)) {
			$html_.= "<option value ='".$row["id_departamento"]."'>".$row["departamento"] ."</option>";
		}
		return $html_;
	}else{
		while ($row=sqlsrv_fetch_array($result)) {
			$arr[] = $row;
		}
		return $arr;
	}
}

function getProvincia($ccdd,$t = null){
	global $conn;
	$html_ = $GLOBALS['html'];
	$arr = array();
	$sql = " SELECT distinct id_provincia,provincia FROM  [dbo].[01_01_Ubigeo] WHERE id_departamento = ".$ccdd;
                       
	$result = sqlsrv_query( $conn, $sql );
	if($t == "html"){
		while ($row=sqlsrv_fetch_array($result)) {
			$html_.= "<option value ='".$row["id_provincia"]."'>".$row["provincia"] ."</option>";
		}
		return $html_;
	}else{
		while ($row=sqlsrv_fetch_array($result)) {
			$arr[] = $row;
		}
		return $arr;
	}
}

function getDistrito($ccpp,$t = null){
	global $conn;
	$html_ = $GLOBALS['html'];
	$arr = array();
	$sql = "  SELECT  id_ubigeo,distrito FROM  [dbo].[01_01_Ubigeo] WHERE id_provincia = ".$ccpp;
                       
	$result = sqlsrv_query( $conn, $sql );
	if($t == "html"){
		while ($row=sqlsrv_fetch_array($result)) {
			$html_.= "<option value ='".$row["id_ubigeo"]."'>".$row["distrito"] ."</option>";
		}
		return $html_;
	}else{
		while ($row=sqlsrv_fetch_array($result)) {
			$arr[] = $row;
		}
		return $arr;
	}
}

if($_POST['t'] == 'Evento'){
	$data = getEvento("html");
}
elseif($_POST['t'] == 'Perfil'){
    $data = getPerfil("html");
}
elseif($_POST['t'] == 'Cargo'){
	$data = getCargo("html");
}
elseif($_POST['t'] == 'Funcion'){
	$data = getFuncion("html");
}
elseif($_POST['t'] == 'Provincia'){
	//$data = json_encode(getObjeto('z_USUARIO')); 
	$data = getProvincia($_POST["ccdd"],"html");
}
elseif($_POST['t'] == 'Distrito'){
	$data = getDistrito($_POST["ccpp"],"html");
}
elseif($_POST['t'] == 'register_all'){
	$data["Perfil"] = getPerfil("html");
	$data["Cargo"] = getCargo("html");
	$data["Funcion"] = getFuncion("html");
	$data["TipoDocumento"] = getTipoDocumento("html");
	$data["Sexo"] = getSexo("html");
	$data["Departamento"] = getDepartamento("html");
	$data["EstadoCivil"] = getEstadoCivil("html");
	$data = json_encode($data);
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