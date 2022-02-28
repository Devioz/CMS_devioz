<?php

function getObjeto($tableName){
	global $conn;
	$obj = new stdClass();
	$sql = "SELECT name FROM sys.columns WHERE object_id = OBJECT_ID('".$tableName."')";
	$result = sqlsrv_query($conn, $sql, array($tableName));
	while ($row=sqlsrv_fetch_object($result)) {
		//$obj->id_usuario; //= $row->name;
		$obj->{$row->name} = null;
		//var_dump($obj->id_usuario);
	}
	return $obj;
}

?>
