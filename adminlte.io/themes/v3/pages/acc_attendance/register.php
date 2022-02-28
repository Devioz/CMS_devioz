<?php
//session_start();
ini_set('display_errors', 1);

include '../../bd/server.php';  
include '../../bd/inactive_registro.php';
include 'global.php';   


if(!isset($_SESSION['user'])) {
    echo '<script> window.location="../../../../../index.html"; </script>';
}
elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = array('status'=>0, 'msg'=> null, 'data' => []);
    if($_POST['method'] == 'r'){
        $prefijo ='dev_reg_';
        $perfil = getObjeto("z_USUARIO_PERFIL");
        $usuario = getObjeto("z_USUARIO");

        unset($perfil->id_persona);
        //unset($perfil->usuario_reg);
        unset($perfil->created_at);
        unset($perfil->usuario_mod);
        unset($perfil->updated_at);
        unset($perfil->activo);
        unset($perfil->eliminado);

        foreach($perfil as $i => $v){
            $perfil->{$i} = $_POST[$prefijo.$i] ?? NULL;
        }
        $perfil->usuario_reg = $_SESSION["id_user"];


        $sql = "EXEC usp_Registrar_Usuario_perfil ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?";
        $result = sqlsrv_query($conn,$sql,(array)$perfil);

        if( $result === false ) {
            if( ($errors = sqlsrv_errors() ) != null) {
                foreach( $errors as $error ) {
                    $data['msg'] = "SQLSTATE: ".$error[ 'SQLSTATE'].". code: ".$error[ 'code'].". message: ".$error[ 'message'];                
                }
            }
        }else{
            while ($row=sqlsrv_fetch_array($result)) {
                //$data['status'] = $row['status'];
                //$data['msg'] = $row['msg'];
                $usuario->id_usuario_perfil = $row['ID'];

                $sql = "EXEC usp_Registrar_Usuario ?,?,?,?,?,?";
                $result = sqlsrv_query($conn,$sql,array($usuario->id_usuario_perfil,$usuario->id_perfil,$usuario->id_cargo,$usuario->id_funcion,$usuario->usuario,$usuario->contrasena,$usuario->usuario_reg));
        
                if( $result === false ) {
                    if( ($errors = sqlsrv_errors() ) != null) {
                        foreach( $errors as $error ) {
                            $data['msg'] = "SQLSTATE: ".$error[ 'SQLSTATE'].". code: ".$error[ 'code'].". message: ".$error[ 'message'];                
                        }
                    }
                }else{
                    while ($row=sqlsrv_fetch_array($result)) {
                        $data['status'] = $row['status'];
                        $data['msg'] = $row['msg'];
                    }        
                }
        

            }        
        }

        foreach($usuario as $i => $v){
            $usuario->{$i} = $_POST[$prefijo.$i] ?? NULL;
        }
        $usuario->usuario_reg = $_SESSION["id_user"];
        
        foreach($_POST['data'] as $i){
            $arrData[] = $i['value'];
        }
        /*$arrData[] = $_POST['']['inNombres'];
        $arrData[] = $_POST['inApPaterno'];
        $arrData[] = $_POST['inApMaterno'];
        $arrData[] = $_POST['selPerfil'];
        $arrData[] = $_POST['selCargo'];
        $arrData[] = $_POST['selFuncion'];
        $arrData[] = $_POST['inUsuario'];
        $arrData[] = $_POST['inContrasena'];*/
        $arrData[] = $_SESSION['user'];
  


    }
    else if(isset($_FILES["file"])){
        ob_start();
        require_once '../../lib/PHPExcel/PHPExcel.php';
        
        //header("content-type:application/csv;charset=utf-8");


        //$filename = $_FILES['file']['name'];
        //$filename = "konecta_usuarios_".$_SESSION['user']."_".date("YmdHis").".xlsx";
        $filename = "usuarios_".$_SESSION['user']."_".date("YmdHis").".xlsx";
        //$filename = basename($_FILES['file']['name']);


        $location = "../../upload/".$filename;
        $iFileType = pathinfo($location,PATHINFO_EXTENSION);
        $iFileType = strtolower($iFileType);
     
        $valid_extensions = array("xlsx","xls");
        //mb_convert_encoding($_FILES['file']['tmp_name'], 'SJIS', 'UTF-8');
        //var_dump( $file);

        

        if(in_array($iFileType, $valid_extensions)) {
           
            if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
                
                ob_end_clean();
                //die("termina: ".$location);
                $inputFileType = PHPExcel_IOFactory::identify($location);
                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($location);

                $sheet = $objPHPExcel->getSheet(0); 
                $maxRow = $sheet->getHighestRow(); 
                $highestColumn = $sheet->getHighestColumn();
                $maxColNumber = PHPExcel_Cell::columnIndexFromString($highestColumn);

                $campos = array();
                $no_campos = array();
                for ($col = 0; $col < $maxColNumber; $col++){
                    $campos[] = trim(strtoupper($sheet->getCellByColumnAndRow($col,1)->getValue()));
                }

                /*$sql = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'z_USUARIO' and COLUMN_NAME not in('Id','id_usuario','usuario_reg','created_at','updated_at');";
                $result = sqlsrv_query($conn,$sql);
                while ($row=sqlsrv_fetch_array($result)) {
                    if(!in_array($row[0],$campos)){
                        $no_campos[] = $row[0];
                    }
                }*/

                $parametros = array('NOMBRES', 'APATERNO','AMATERNO','PERFIL','CARGO','FUNCION','USUARIO','CONTRASENA');
                foreach( $parametros as $item ){
                    if(!in_array($item,$campos)){
                        $no_campos[] = $item;
                    }                    
                }

                
                if(count($no_campos)>0){
                    $data['msg'] = 'El archivo requiere los siguientes campos: '. implode(', ',$no_campos);
                }else{
                    $registrados = 0;
                    $no_registrados = array();

                    for($row = 2; $row <= $maxRow; $row++){
                        $arrData = array();
                        $arrData[] = $sheet->getCellByColumnAndRow(array_search('NOMBRES', $campos),$row)->getValue();
                        $arrData[] = $sheet->getCellByColumnAndRow(array_search('APATERNO', $campos),$row)->getValue();
                        $arrData[] = $sheet->getCellByColumnAndRow(array_search('AMATERNO', $campos),$row)->getValue();
                        $id_perfil = $sheet->getCellByColumnAndRow(array_search('PERFIL', $campos),$row)->getValue();
                        $arrData[] = trim(substr($id_perfil,0,strpos($id_perfil,'-')));
                        $id_cargo = $sheet->getCellByColumnAndRow(array_search('CARGO', $campos),$row)->getValue();
                        $arrData[] = trim(substr($id_cargo,0,strpos($id_cargo,'-')));
                        $id_funcion = $sheet->getCellByColumnAndRow(array_search('FUNCION', $campos),$row)->getValue();
                        $arrData[] = trim(substr($id_funcion,0,strpos($id_funcion,'-')));
                        $arrData[] = $sheet->getCellByColumnAndRow(array_search('USUARIO', $campos),$row)->getValue();
                        $arrData[] = $sheet->getCellByColumnAndRow(array_search('CONTRASENA', $campos),$row)->getValue();
                        $arrData[] = $_SESSION['user'];                        

                        $sql = "EXEC usp_Registrar_Usuario ?,?,?,?,?,?,?,?,?";
                        $result = sqlsrv_query($conn,$sql, $arrData);

                //var_dump($result); die();
                        if( $result === false ) {
                            if( ($errors = sqlsrv_errors() ) != null) {
                                foreach( $errors as $error ) {
                                    $data['msg'] = "SQLSTATE: ".$error[ 'SQLSTATE'].". code: ".$error[ 'code'].". message: ".$error[ 'message'];                
                                }
                            }
                        }
                        else{
                            while ($row2=sqlsrv_fetch_array($result)) {
                                if($row2['status']){
                                    $registrados++;
                                }else{
                                    $no_registrados[] = $sheet->getCellByColumnAndRow(array_search('USUARIO', $campos),$row)->getValue();
                                }                                                              
                            }        
                        } 
                 
                    }
                    $data['msg'] .= 'Se registraron: '. $registrados .' usuario(s)';
                    if(count($no_registrados>0)){
                        $data['msg'] .='. No se registraron los siguientes usuarios: ' .implode(', ',$no_registrados);
                    } 
                }
                


            }else{
                $data['msg'] = 'Error al importar el archivo al servidor';
            }
        }else{
            $data['msg'] = 'Archivo no soportado';
        }

    }else if($_POST['method'] == 'activar'){
        $sql = "update [dbo].[z_USUARIO] set activo = ?, [updated_at] = getdate() where activo = 0 and id_usuario = ?";
        $result = sqlsrv_query($conn,$sql, array(1,$_POST['k']));

        if( $result === false ) {
            if( ($errors = sqlsrv_errors() ) != null) {
                foreach( $errors as $error ) {
                    $data['msg'] = "SQLSTATE: ".$error[ 'SQLSTATE'].". code: ".$error[ 'code'].". message: ".$error[ 'message'];                
                }
            }
        }else{
            $updt=sqlsrv_rows_affected($result); 
            if($updt > 0){
                $data['status'] = 1;
                $data['msg'] = "Se activó el usuario";
            }else{
                $data['msg'] = "No se pudo activar el usuario";
            }     
        }

    }else if($_POST['method'] == 'estado'){
        $sql = "update [dbo].[z_USUARIO] set activo = ?, [updated_at] = getdate() where activo = ? and id_usuario = ?";
        $result = sqlsrv_query($conn,$sql, array($_POST['type'], $_POST['type'] ? "0": "1",$_POST['k']));

        if( $result === false ) {
            if( ($errors = sqlsrv_errors() ) != null) {
                foreach( $errors as $error ) {
                    $data['msg'] = "SQLSTATE: ".$error[ 'SQLSTATE'].". code: ".$error[ 'code'].". message: ".$error[ 'message'];                
                }
            }
        }else{
            $updt=sqlsrv_rows_affected($result); 
            if($updt > 0){
                $data['status'] = 1;
                $data['msg'] = "Se ". ($_POST['type'] ? " activó  ": " desactivó ") ." el usuario";
            }else{
                $data['msg'] = "No se ". ($_POST['type'] ? " activó ": " activó ") ." el usuario";
            }     
        }        

    }else if($_POST['method'] == 'delete'){
        $sql = "update [dbo].[z_USUARIO] set eliminado = 1, [updated_at] = getdate() where eliminado is null and id_usuario = ?";
        $result = sqlsrv_query($conn,$sql, array($_POST['k']));

        if( $result === false ) {
            if( ($errors = sqlsrv_errors() ) != null) {
                foreach( $errors as $error ) {
                    $data['msg'] = "SQLSTATE: ".$error[ 'SQLSTATE'].". code: ".$error[ 'code'].". message: ".$error[ 'message'];                
                }
            }
        }else{
            $updt=sqlsrv_rows_affected($result); 
            if($updt > 0){
                $data['status'] = 1;
                $data['msg'] = "Se eliminó el usuario";
            }else{
                $data['msg'] = "No se eliminó el usuario";
            }     
        }        

    }

    echo json_encode($data);
    
    
}else{
	


    include '../acc_design/header.php';

    include '../acc_design/nav.php';
    
    include '../acc_design/aside.php';
    
    //vista
    include 'register_view.php';
    
    include '../acc_design/footer.php';

}

	?>


