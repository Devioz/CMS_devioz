<?php
session_start();
include '../../bd/server.php';   

if(!isset($_SESSION['user'])) 

    { echo '<script> window.location="/adminlte.io/themes/v3/pages/acc_design/index.php"; </script>';} 

?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header d-none">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Portada</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"><a href="#">Inicio</a></li>
            
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content pl-0 pr-0">
      <div class="container-fluid pl-0 pr-0">
        <div class="row">
          <div class="col-md-3 d-none">

          

            <!-- Profile Image -->
            <!--<div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="../../dist/img/call/analista.png"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?php echo $_SESSION['Nombres']." ".$_SESSION['Apaterno']." ".$_SESSION['Amaterno'];  ?> </h3>

                <p class="text-muted text-center"><?php echo $_SESSION['cargo'];  ?></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Cargo</b> <a class="float-right"><?php echo $_SESSION['cargo'];  ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Funcion</b> <a class="float-right"><?php echo $_SESSION['funcion'];  ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Perfil</b> <a class="float-right"><?php echo $_SESSION['nombre_perfil'];  ?></a>
                  </li>
                </ul>

                <a href="#" class="btn btn-success btn-block"><b>Perfil</b></a>

                
                <a href="/adminlte.io/themes/v3/pages/acc_attendance/attendance.php" class="btn btn-primary btn-block"><b>Asistencia</b></a>
                <a href="/adminlte.io/themes/v3/pages/acc_attendance/register.php" class="btn btn-primary btn-block"><b>Registrar usuario</b></a>
                -->
              <!--</div>
               /.card-body 
            </div>
             /.card -->

            <!-- About Me Box -->
            <!--<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Accesos Directos</h3>
              </div>
               /.card-header -->
              <!--<div class="card-body">
              <strong><a href="/adminlte.io/themes/v3/pages/acc_attendance/attendance.php" class="nav-link"><i class="fas fa-book mr-1"></i> Asistencia</a></strong>
                <p class="text-muted"> Registre su asistencia</p>

                <hr>

   
                <strong><a href="/adminlte.io/themes/v3/pages/acc_attendance/register.php" class="nav-link"><i class="fas fa-user mr-1"></i> Usuarios</a></strong>
                <p class="text-muted">Listar, editar los usuarios del sistema</p>

                <hr>
               
                <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                <p class="text-muted">
                  <span class="tag tag-danger">UI Design</span>
                  <span class="tag tag-success">Coding</span>
                  <span class="tag tag-info">Javascript</span>
                  <span class="tag tag-warning">PHP</span>
                  <span class="tag tag-primary">Node.js</span>
                </p>-->

                <!--
                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>
                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                -->
              <!--</div>
               /.card-body -->
            <!--</div>-->
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-12">

            <div class="modal fade" id="modal-imagen"data-identificador="">
              <div class="modal-dialog">
                <div class="modal-content"><!-- bg-primary-->
                  <div class="modal-header">
                    <h4 class="modal-title">Modificar Imagen</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body p-0">
                    
                    <!--inicio de imagen avatar-->
                    <div class="card card-primary card-outline mb-0" >
                      <div class="card-body box-profile">
                        <div class="text-center">
                          <img class="profile-user-img img-fluid img-circle"
                              src="../../dist/img/call/analista.png"
                              alt="User profile picture">
                        </div>
                      </div>
                    </div>
                    <!--fin de imagen avatar-->


                    <div class="custom-file mb-2 mt-2">
                      <input type="file" class="custom-file-input" id="customFile" accept="image/*">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                   

                  </div>
                  <div class="modal-footer justify-content-between">
                    <div>
                      <button type="button" class="btn btn-outline-light" id="btn-frm-modal-imagen">Guardar cambios</button>
                      <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>
                    </div>
                    
                    
                  </div>

                </div>
              </div>
            </div>

            <div class="modal fade" id="modal-titulo" data-identificador="">
              <div class="modal-dialog">
                <div class="modal-content"><!-- bg-primary-->
                  <div class="modal-header">
                    <h4 class="modal-title">Modificar Titulo</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body p-3">
                    <div class="form-group">
                      <label for="frm-modal-enlace">Titulo</label>
                      <input type="text" class="form-control" id="frm-modal-titulo" name="frm-modal-titulo" placeholder="Ingrese titulo">
                    </div>

                  </div>
                  <div class="modal-footer justify-content-between">
                    <div>
                      <button type="button" class="btn btn-outline-light" id="btn-frm-modal-titulo">Guardar cambios</button>
                      <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>
                    </div>
                    
                    
                  </div>
                </div>
              </div>
            </div>

            <div class="modal fade" id="modal-descripcion">
              <div class="modal-dialog">
                <div class="modal-content"><!-- bg-primary-->
                  <div class="modal-header">
                    <h4 class="modal-title">Modificar Descripcion</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body p-3">
                   
                    <div class="form-group">
                      <label>Descripcion</label>
                      <textarea class="form-control" rows="3" placeholder="Ingrese descripcion ..." id="frm-modal-descripcion"></textarea>
                    </div>

                  </div>

                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" id="btn-frm-modal-descripcion">Guardar cambios</button>
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>
                  </div>

                </div>
              </div>
            </div>

            <div class="modal fade" id="modal-enlace">
              <div class="modal-dialog">
                <div class="modal-content"><!-- bg-primary-->
                  <div class="modal-header">
                    <h4 class="modal-title">Modificar Enlace</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body p-3">
                    
                    <div class="form-group">
                      <label for="frm-modal-enlace">Enlace (ingrese http:// o https:// a su enlace)</label>
                      <input type="text" class="form-control" id="frm-modal-enlace" name="frm-modal-enlace" placeholder="Ingrese enlace o direccion url">
                    </div>

                  </div>
                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" id="btn-frm-modal-enlace">Guardar cambios</button>
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>
                    
                  </div>
                </div>
              </div>
            </div>

            <div class="modal fade" id="modal-perfil">
                <div class="modal-dialog">
                  <div class="modal-content"><!-- bg-primary-->
                    <div class="modal-header d-none">
                      <h4 class="modal-title">Primary Modal</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body p-0">
                      
                      <div class="card card-primary card-outline mb-0" >
                        <div class="card-body box-profile">
                          <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle"
                                src="../../dist/img/call/analista.png"
                                alt="User profile picture">
                          </div>
                          <h3 class="profile-username text-center"><?php echo $_SESSION['Nombres']." ".$_SESSION['Apaterno']." ".$_SESSION['Amaterno'];  ?> </h3>

                          <p class="text-muted text-center"><?php echo $_SESSION['cargo'];  ?></p>

                          <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                              <b>Cargo</b> <a class="float-right"><?php echo $_SESSION['cargo'];  ?></a>
                            </li>
                            <li class="list-group-item">
                              <b>Funcion</b> <a class="float-right"><?php echo $_SESSION['funcion'];  ?></a>
                            </li>
                            <li class="list-group-item">
                              <b>Perfil</b> <a class="float-right"><?php echo $_SESSION['nombre_perfil'];  ?></a>
                            </li>
                          </ul>
                          <!--<a href="#" class="btn btn-success btn-block"><b>Perfil</b></a>-->
                          <h4 class="modal-title">Presentismo</h4>

                          <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                            <li class="nav-item">
                              <a class="nav-link active nav-link-2" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" 
                              role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Marcacion</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link nav-link-2" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" 
                              role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Registros personales</a>
                            </li> 
                                
                          </ul>

                          <div class="tab-content" id="custom-tabs-one-tabContent">
                    <!-- 
                      tab MARCACIONES ===================================================================0
                   -->
                            <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                              
                              <a href="/adminlte.io/themes/v3/pages/acc_attendance/attendance.php" class="btn btn-primary btn-block"><b>Asistencia</b></a>
                            </div>
                    
                            <div class="tab-pane fade show " id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                              
                            <a href="/adminlte.io/themes/v3/pages/acc_attendance/register.php" class="btn btn-primary btn-block"><b>Registrar usuario</b></a>
                            </div>
                  
                          </div>

                
                          
                          
                
                        </div>



                      </div>



                    </div>
                    <div class="modal-footer justify-content-between d-none">
                      <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-outline-light">Save changes</button>
                    </div>
                  </div>
                </div>
              </div>

            <!--integracion del template CHANGE-->
            <div class="fat-nav"></div>

            <header class="header-container position-absolute">
            <div class="container">
            <div class="header-area d-flex flex-wrap justify-content-between">
            <!--<div class="logo">
            <a href="index-2.html"><img src="../../dist/img/AdminLTELogo.png" alt="" width="216" height="39" /></a>
            </div>-->
              <div class="menu-area d-flex flex-wrap">
                <nav class="main-menu">
                  <ul class="nav">
                  <li class="current-menu-item menu-item-has-children"><a href="index-2.html">Inicio</a>
                    <ul>
                      <li><a href="index-2.html">Home One</a></li>
                      <li><a href="index-3.html">Home Two</a></li>
                      <li><a href="index-4.html">Home Three</a></li>
                    </ul>
                  </li>
                  <li><a href="about.html">Acerca de</a></li>
                  <li><a href="token-sale.html">Accesos</a></li>
                  <li class="menu-item-has-children" ><a href="#">Torres</a>
                    <ul style="width:300px;" >
                      <li><a href="about.html">Process Management TL - IBM</a></li>
                      <li><a href="team.html">IBM - BO - Batch Operations</a></li>
                      <li><a href="token-sale.html">IBM - DMS - Cloud</a></li>
                      <li><a href="faq.html">IBM - M&D - Middleware DB</a></li>
                      <li><a href="road-map.html">IBM - M&D - Middleware WAS/MQ/MB</a></li>
                      <li><a href="404.html">IBM - MFS - Mainframe Server</a></li>
                      <li><a href="term-condition.html">IBM - MRS - Midrange Server AIX</a></li>
                      <li><a href="privacy-policy.html">IBM - T&S - Tools & Standds</a></li>
                      <li><a href="privacy-policy.html">IBM - Midrange WIN</a></li>
                      <li><a href="privacy-policy.html">MW File Tranfer</a></li>
                      <li><a href="privacy-policy.html">MW Database</a></li>
                      <li><a href="privacy-policy.html">MW Execution Framework</a></li>
                      <li><a href="privacy-policy.html">MW Front End</a></li>
                      <li><a href="privacy-policy.html">MW Integration</a></li>
                    </ul>
            </li>
            <li><a href="road-map.html">Calendario</a></li>
            <li class="menu-item-has-children"><a href="#">Blog</a>
            <ul>
            <li><a href="blog-1.html">Blog One</a></li>
            <li><a href="blog-2.html">Blog Two</a></li>
            <li><a href="blog-single.html">Blog single</a></li>
            </ul>
            </li>
            <li><span class="pl-3 pr-3"></span></li>
            <li><span class="pl-3 pr-3"></span></li>
            <li><span class="pl-3 pr-3"></span></li>
            <li><span class="pl-3 pr-3"></span></li>
            <li><span class="pl-3 pr-3"></span></li>
            <li><span class="pl-3 pr-3"></span></li>
            
            </ul>
            </nav>
            <div class="header-right" >
            <div class="device-btn ">
            <!--<button type="button" class=" btn-primary" data-toggle="modal" data-target="#modal-perfil">
              Perfil
            </button>-->
              <a href="#" class=" btn-primary" data-toggle="modal" data-target="#modal-perfil">Perfil</a>
            </div>
            </div>
            </div>
            </div>
            </div>
            </header>

            

            <div class="banner-container " >
            <div class="container">
            <div class="row banner-content-area justify-content-between">
            <div class="col-12 col-md-6 col-lg-6 banner-content">
            <div class="banner-cont-info text-white wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
            <h5 class="text-white">Actividades que se desarrollan durante los procesos de transformación para ayudar a concretar la adopción del cambio.</h5>
            <h1 class="text-white">Change Management</h1>
            <p class="text-white">Desde la perspectiva de las personas es necesario considerar que la adopción del cambio es un proceso con etapas.</p>
            <a class="crp-btn text-white" href="#">Leer más</a>
            </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6">
            <div class="banner-cont-img wow fadeInRight" data-wow-duration="1s" data-wow-delay=".3s">
            <img src="../../public/img/banner/hero-banner.png" alt="">
            </div>
            </div>
            </div>
            </div>
            </div>

           
            

            <div class="service-container">
              
              <div class="container">

                <button type="button" class="crp-btn btn btn-sm new-event-btn">
                  <i class="fas fa-calendar-plus"></i><span class="pl-2">Agregar seccion</span>
                </button>

                <!--<button class="crp-btn  new-event-btn">>Agregar seccion</button>-->

                <br>

                <div class=" modelo-evento-nuevo d-none">
                    <div class="col-12 col-md-12 col-lg-3 mb-40 service align-items-stretch">
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
                                <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-imagen">Cambiar imagen</a>
                                <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-titulo">Cambiar titulo</a>
                                <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-descripcion">Cambiar descripcion</a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-enlace">Cambiar enlace</a>
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
                            <img style="width:190px;height:190px" src="../../public/img/icon/1.png" alt=""  />
                          </div>
                          <div class="service-cont">
                            <h3>CM-AgilOps-Grupos-Horarios-Vacaciones</h3>
                            <p>Morbi pellentesque congue felis molestie tristique. Aenean rhoncus leo a posuere ullamcorper.</p>
                            <a class="more-btn" href="#">Read More</a>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
                
                  

                  <!--modelo qe se duplica al crear nuevo evento-->
                  

                  <!--cargar por ajax aqui-->
                  <div class="caja-eventos">
                   
                  </div>
                  <!--fin d e modelo a duplicar para evento nuevo-->
                  
                  
                  
                </div>
              </div>
            </div><!--service container-->

            


           

           

          


            <!--<table width="76%" border="0" align="center" cellspacing="0" cellpadding="3" class="tableWidth">
              <tr>
              <td id="subTitle">HTTrack Website Copier - Open Source offline browser</td>
              </tr>
            </table>-->
            
            <!--<img src="/konecta.jpg" alt="" width="100%" height="100%" />-->
           
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>



