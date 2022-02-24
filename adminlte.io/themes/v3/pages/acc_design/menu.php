<?php
session_start();


include '../../bd/server.php';  
include '../../bd/inactive_registro.php'; 

$data = array(
    'status'=>0,
    'msg'=> null,
    'data' => [], 
    'html' => ''
);

 function getMenu1($arrMenu){
    $html = "";  
    $navItem_1 = null;
    foreach ($arrMenu as $row) {
      if($navItem_1 != $row["id"]){

      $html .= '<li class="nav-item" >';
      $html .='<a href="../../index2.html" class="nav-link nav-nivel1" data-idnivel="'. $row["id"] .'" >';
      $html .='<img class="" src="../..' . $row['icono']. '"/>';
      $html .='<p>'. $row['nombre'] . '</p>';
      $html .='</a>';
      $html .='</li>';        
 
      }
      $navItem_1 = $row["id"];
    
    }
    return $html;
}

function getMenu2($arrMenu,$nivel1){

    $arrNivel2 = array();
    $html = "";

    foreach ($arrMenu as $row) {

        if($nivel1 == $row["id"]){
            array_push($arrNivel2,$row);              
        }
    }

    if(count($arrNivel2) > 0){

        $navItem_1 = 0;
        $navItem_2 = 0;
        $nivel2 = false;
        $c = 0;
        $html .= '<li class="nav-item"><a href="#" class="nav-retornar"><i class="fas fa-arrow-left"></i> Regresar</a></li>';         
            
        foreach ($arrNivel2 as $row) {
            $c++;

            if($navItem_1 != $row["id"]){

                /*
                <li class="nav-item" style="border-bottom: 1px solid #fff;">
                <a href="../../index2.html" class="nav-link disabled">
                <i class="fas fa-angle-double-right"></i>
                <p><?php echo $row['nombre']; ?></p>
                </a>
                </li>*/

            }

            if($navItem_2 != $row["id_nivel2"]){
        
                $html .= '<li class="nav-item">';
                $html .= '<a href="#" class="nav-link">';
                $html .= '<i class="nav-icon fas fa-tachometer-alt"></i>';
                $html .= '<p> '. $row['nombre_nivel2']. '<i class="right fas fa-angle-left"></i> </p>';
                $html .= '</a>';
                $html .= '<ul class="nav nav-treeview">';
                
            } 

            $html .= '<li class="nav-item">';
            $html .= '<a href="../../index.html" class="nav-link">  <i class="far fa-circle nav-icon"></i> <p>' . $row['nombre_nivel3'] . '</p> </a>';
            $html .= '</li>';

            if( !isset($arrNivel2[$c]) || ($arrNivel2[$c]["id_nivel2"] != $row["id_nivel2"]) ) {   
                $html .= '</ul>'; 
                $html .= '</li>';
            }

            $navItem_1 = $row["id"];
            $navItem_2 = $row["id_nivel2"];
        }  
    }
    return $html;
}



if(!isset($_SESSION['user'])) {
    echo '<script> window.location="../../../../../index.html"; </script>';
}
elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    
    if($_POST['method'] == 'load'){
        if(!is_array($_SESSION["menu_nivel"]) || $_SESSION["menu_nivel"]["n"] == 1){
            $_SESSION["menu_nivel"]["n"] = 1;
            $data['html'] = getMenu1($_SESSION["menu"]);
        }else if($_SESSION["menu_nivel"]["n"] == 2){//var_dump($_SESSION["menu_nivel"]); die();
            $data['html'] = getMenu2($_SESSION["menu"],$_SESSION["menu_nivel"]["id"]);          
        }
        
    }else if($_POST['method'] == 'n1'){
        $_SESSION["menu_nivel"]["n"] = 1;
        $data['html'] = getMenu1($_SESSION["menu"]);
    }else if($_POST['method'] == 'n2'){
        $_SESSION["menu_nivel"]["n"] = 2;
        $_SESSION["menu_nivel"]["id"] = $_POST['n1'];//var_dump($_SESSION["menu_nivel"]); die();
        $data['html'] = getMenu2($_SESSION["menu"],$_POST['n1']);
    }
    echo json_encode( $data);

}
?>