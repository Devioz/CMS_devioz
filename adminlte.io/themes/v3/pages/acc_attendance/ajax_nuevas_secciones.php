<?php
session_start();
include '../../bd/server.php'; 

$sql = "Insert into dbo.secciones(imagen,titulo,descripcion,enlace) VALUES (? , ? , ?,?); SELECT @@IDENTITY as id;";
$params = array("1.png",'','','');
$stmt = sqlsrv_query( $conn, $sql, $params);
$next_result = sqlsrv_next_result($stmt); 
$row = sqlsrv_fetch_array($stmt);
$minuevoid=$row["id"];
$id=$minuevoid;
//$array = array();
//print_r(error_get_last());
//exit;
$imagen=$titulo=$descripcion=$enlace="";
$imagen="1.png";

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
                        <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
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
echo $div;
?>