<?php
session_start();
include '../../bd/server.php'; 

$sql = "SELECT id,imagen,titulo,descripcion,enlace FROM dbo.secciones;";

$result = sqlsrv_query( $conn, $sql );

$array = array();
//print_r(error_get_last());
//exit;
$html='<div class="row service-area pt-70">';
while ($ver=sqlsrv_fetch_array($result)) {

    $id = $ver["id"];   
    $imagen = $ver["imagen"];
    $titulo = $ver["titulo"];
    $descripcion = $ver["descripcion"];
    $enlace = $ver["enlace"];

    $array[] = array(
        'id'=>$id,
        'imagen'=>$imagen,
        'descripcion'=>$descripcion,
        'enlace'=>$enlace,
    );

    $div='
        <div class="col-12 col-md-12 col-lg-3 mb-40 service align-items-stretch mb-3" id="seccion_'.$id.'">
            <div class="card h-100">
                <div class="card-header border-0 ui-sortable-handle" style="cursor: move;">
                    <h3 class="card-title d-none">
                        <i class="far fa-calendar-alt"></i>
                        Calendar
                    </h3>
                    <div class="card-tools">
                        <div class="btn-group">
                            <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" data-offset="-52">
                                <i class="fas fa-bars"></i>
                            </button>
                            <div class="dropdown-menu" role="menu">
                                <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-imagen" data-identificador="'.$id.'">Cambiar imagen</a>
                                <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-titulo" data-identificador="'.$id.'">Cambiar titulo</a>
                                <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-descripcion" data-identificador="'.$id.'">Cambiar descripcion</a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-enlace" data-identificador="'.$id.'">Cambiar enlace</a>
                            </div>
                        </div>
                        <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-success btn-sm" data-card-widget="remove" data-identificador="'.$id.'">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="service-icon">
                        <img style="width:190px;height:190px" class="" src="../../public/secciones/'.$imagen.'" alt="" />
                    </div>
                    <div class="service-cont">
                        <h3>'.$titulo.'</h3>
                        <p>'.$descripcion.'</p>
                        <a class="more-btn" href="'.$enlace.'">Ver info</a>
                    </div>
                </div>
            </div>
        </div>';

    $html=$html.$div;
    //$array[]=$ver;
    //$marcacion = $ver["marcacion"];   
}
$html=$html.'</div>';
        // echo var_dump($ver);

//echo json_encode($array);        
echo $html;
?>