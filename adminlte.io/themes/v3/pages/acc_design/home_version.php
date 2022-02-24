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

                          <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                            <li class="nav-item">
                              <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" 
                              role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Marcacion</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" 
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

            

            <div class="banner-container">
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
                <div class="row service-area pt-70">

                  <!--modelo qe se duplica al crear nuevo evento-->
                  <div class=" modelo-evento-nuevo d-none">
                    <div class="col-12 col-md-12 col-lg-3 mb-40 service">
                      <div class="card">
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
                                <a href="#" class="dropdown-item">Cambiar imagen</a>
                                <a href="#" class="dropdown-item">Cambiar titulo</a>
                                <a href="#" class="dropdown-item">Cambiar descripcion</a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item">Cambiar enlace</a>
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
                            <img src="../../public/img/icon/1.png" alt="" width="118" height="120" />
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

                  <div class="lista_eventos_div">
                    
                  </div>
                  <!--fin d e modelo a duplicar para evento nuevo-->
                  <div class="col-12 col-md-12 col-lg-3 mb-40 service">
                    <div class="card">
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
                              <a href="#" class="dropdown-item">Cambiar imagen</a>
                              <a href="#" class="dropdown-item">Cambiar titulo</a>
                              <a href="#" class="dropdown-item">Cambiar descripcion</a>
                              <div class="dropdown-divider"></div>
                              <a href="#" class="dropdown-item">Cambiar enlace</a>
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
                          <img src="../../public/img/icon/1.png" alt="" width="118" height="120" />
                        </div>
                        <div class="service-cont">
                          <h3>CM-AgilOps-Grupos-Horarios-Vacaciones</h3>
                          <p>Morbi pellentesque congue felis molestie tristique. Aenean rhoncus leo a posuere ullamcorper.</p>
                          <a class="more-btn" href="#">Read More</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--corte flujo new evento-->
                  <div class="col-12 col-md-12 col-lg-3 mb-40 service">
                    <div class="card">
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
                              <a href="#" class="dropdown-item">Cambiar imagen</a>
                              <a href="#" class="dropdown-item">Cambiar titulo</a>
                              <a href="#" class="dropdown-item">Cambiar descripcion</a>
                              <div class="dropdown-divider"></div>
                              <a href="#" class="dropdown-item">Cambiar enlace</a>
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
                          <img src="../../public/img/icon/1.png" alt="" width="118" height="120" />
                        </div>
                        <div class="service-cont">
                          <h3>CM-AgilOps-Grupos-Horarios-Vacaciones</h3>
                          <p>Morbi pellentesque congue felis molestie tristique. Aenean rhoncus leo a posuere ullamcorper.</p>
                          <a class="more-btn" href="#">Read More</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--corte flujo eevnto-->
                  
                  <div class="col-12 col-md-12 col-lg-3 mb-40 service wow zoomIn d-none" data-wow-duration="1s" data-wow-delay=".3s">

                  

                    <div class="service-info">
                      <div class="" style="right:0;position:relative;float:right;padding-bottom:15px;">
                        <div class="btn-group">
                          <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" data-offset="-52">
                            <i class="fas fa-bars"></i>
                          </button>

                          <div class="dropdown-menu" role="menu">
                            <a href="#" class="dropdown-item">Add new event</a>
                            <a href="#" class="dropdown-item">Clear events</a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">View calendar</a>
                          </div>

                        </div>
                        <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                          <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                          <i class="fas fa-times"></i>
                        </button>
                      </div><!--btn-group-->

                      <div class="clearfix"><br></div>

                      <div class="service-icon">
                        <img src="../../public/img/icon/1.png" alt="" width="118" height="120" />
                      </div>
                      
                      <div class="service-cont">
                     
                        <h3>CM-AgilOps-Grupos-Horarios-Vacaciones</h3>
                        <p>Morbi pellentesque congue felis molestie tristique. Aenean rhoncus leo a posuere ullamcorper.</p>
                        <a class="more-btn" href="#">Read More</a>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-md-12 col-lg-3 mb-40 service wow zoomIn d-none" data-wow-duration="1s">
                    <div class="service-info">
                      <div class="service-icon">
                        <img src="../../public/img/icon/2.png" alt="" width="118" height="120" />
                      </div>

                      <div class="service-cont">
                        <h3>CM-Asignacion-GdC-Ops-Release-AgilOps</h3>
                        <p>Morbi pellentesque congue felis molestie tristique. Aenean rhoncus leo a posuere ullamcorper.</p>
                        <a class="more-btn" href="#">Read More</a>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-md-12 col-lg-3 mb-40 service wow zoomIn d-none" data-wow-duration="1s" data-wow-delay="0.5s">
                    <div class="service-info">
                      <div class="service-icon">
                        <img src="../../public/img/icon/3.png" alt="" width="118" height="120" />
                      </div>
                      <div class="service-cont">
                        <h3>CM-Capacitaciones Continuas</h3>
                        <p>Morbi pellentesque congue felis molestie tristique. Aenean rhoncus leo a posuere ullamcorper.</p>
                        <a class="more-btn" href="#">Read More</a>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-md-12 col-lg-3 mb-40 service wow zoomIn d-none" data-wow-duration="1s" data-wow-delay="0.5s">
                    <div class="service-info">
                      <div class="service-icon">
                        <img src="../../public/img/icon/4.png" alt="" width="118" height="120" />
                      </div>
                      <div class="service-cont">
                        <h3>CM-Comite-Pases-Produccion</h3>
                        <p>Morbi pellentesque congue felis molestie tristique. Aenean rhoncus leo a posuere ullamcorper.</p>
                        <a class="more-btn" href="#">Read More</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div><!--service container-->

            <div id="section0" class="invented-container overflow-hidden">
            <div class="container">
            <div class="row invented-area pt-70 pb-40 mb-pt-45 justify-content-between">
            <div class="col-12 col-md-6 col-lg-6">
            <div class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
            <img src="../../public/img/about/about.png" alt="" class="w-100" />
            </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6 invented-cont wow fadeInUp" data-wow-duration="1s" data-wow-delay=".7s">
            <h3>Sobre nosotros</h3>
            <h2>We complete every project with extra care for you</h2>
            <p>Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Suspendisse eu accumsan libero. Nullam vulputate arcu tellus, ut placerat libero convallis hendrerit.</p>
            <p>Praesent dui leo, rhoncus non interdum sit amet, lobortis eu elit. Vivamus eu libero vitae purus eleifend rhoncus. Nullam vel tempus nulla. Donec bibendum bibendum ipsum id maximus.</p>
            <a class="crp-btn text-white" href="#">Learn More</a>
            </div>
            </div>
            </div>
            </div>

            <section class="crp-inventment-container overflow-hidden">
            <div class="container">
            <div class="row pt-20 pb-90 mb-pb-20">
            <div class="col-12 col-md-12 col-lg-8 mb-pb-0">
            <div class="crp-inventment-content pt-110 mb-pt-40 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".7s">
            <h3>Why Choose Cryptu</h3>
            <h2>Best trusted cryto currency online platform in the world</h2>
            <p>Suspendisse finibus mattis nunc non aliquet. Curabitur eleifend quam quis sapien lacinia, non maximus elit molestie. Sed sed diam at enim lacinia varius in in libero. Donec nec felis porta, posuere dui tincidunt, porttitor felis. Fusce pharetra laoreet eros, quis dictum nisi elementum vel.</p>
            <div class="crp-inv-col-area">
            <div class="crp-inv-col">
            <div class="crp-inv-col-row">
            <div class="crp-inv-col-icon">
            <i class="fal fa-analytics"></i>
            </div>
            <div class="crp-inv-col-cont">
            <h4>Data Protection</h4>
            <p> Donec porta efficitur sapien eu cursus porttitor nisl maximus. </p>
            </div>
            </div>
            </div>
            <div class="crp-inv-col">
            <div class="crp-inv-col-row">
            <div class="crp-inv-col-icon">
            <i class="fal fa-user-headset"></i>
            </div>
            <div class="crp-inv-col-cont">
            <h4>24/7 Support</h4>
            <p>Donec porta efficitur sapien eu cursus porttitor nisl maximus.</p>
            </div>
            </div>
            </div>
            <div class="crp-inv-col">
            <div class="crp-inv-col-row">
            <div class="crp-inv-col-icon">
            <i class="fal fa-globe"></i>
            </div>
            <div class="crp-inv-col-cont">
            <h4>Live Exchange Rate</h4>
            <p>Donec porta efficitur sapien eu cursus porttitor nisl maximus.</p>
            </div>
            </div>
            </div>
            <div class="crp-inv-col">
            <div class="crp-inv-col-row">
            <div class="crp-inv-col-icon">
            <i class="fal fa-shield-check"></i>
            </div>
            <div class="crp-inv-col-cont">
            <h4>Security Protection</h4>
            <p>Donec porta efficitur sapien eu cursus porttitor nisl maximus.</p>
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
            </section>

            <div class="features-bns-container overflow-hidden">
            <div class="container">
            <div class="row justify-content-between pt-110 pb-70 mb-pt-50 mb-pb-30">
            <div class="col-12 col-md-5 wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".3s">
            <img src="../../public/img/feature.png" alt="" width="600" height="768" />
            </div>
            <div class="col-12 col-md-6 features-bns-right mb-pt-10 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".7s">
            <div class="features-bns-cont">
            <h3>Our Best Features</h3>
            <h2>Cryptu provide best features for you</h2>
            <p>Integer faucibus dignissim quam. Fusce sollicitudin dictum sem. Phasellus commodo eros quis eros fermentum.</p>
            <div class="features-bns-area">
            <div class="features-bns-col-row">
            <div class="features-bns-col-icon">
            <i class="fal fa-sack-dollar"></i>
            </div>
            <div class="features-bns-col-cont">
            <h4>Payment Methods</h4>
            <p>In ante est, placerat ut odio et, rhoncus sodales nunc. Ut ligula lacus, ultrices ut accumsan sed, iaculis nec lectus gravida id elit ac. </p>
            </div>
            </div>
            <div class="features-bns-col-row">
            <div class="features-bns-col-icon">
            <i class="fal fa-warehouse"></i>
            </div>
            <div class="features-bns-col-cont">
            <h4>Registered Company</h4>
            <p>In ante est, placerat ut odio et, rhoncus sodales nunc. Ut ligula lacus, ultrices ut accumsan sed, iaculis nec lectus gravida id elit ac. </p>
            </div>
            </div>
            <div class="features-bns-col-row">
            <div class="features-bns-col-icon">
            <i class="fal fa-wallet"></i>
            </div>
            <div class="features-bns-col-cont">
            <h4>Crypto Currency Investment</h4>
            <p>In ante est, placerat ut odio et, rhoncus sodales nunc. Ut ligula lacus, ultrices ut accumsan sed, iaculis nec lectus gravida id elit ac. </p>
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>

            <div class="crp-happenning-container overflow-hidden">
            <div class="container">
            <div class="row justify-content-between pt-110 pb-110 mb-pt-60 mb-pb-60 crp-happenning-content">
            <div class="col-12 col-md-5 crp-happenning-left wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
            <h3>Sale Token</h3>
            <h2>Future digit mining crypto currency</h2>
            <p>
            Nulla vitae mauris vitae urna commodo tristique malesuada eu quam. Fusce mattis a tortor vel finibus. Nunc nec orci ex. Nulla eleifend fermentum purus sit amet ultrices. Duis viverra id nisl eu condimentum. Nullam maximus vel nunc ac imperdiet. Sed mauris ipsum, varius nec turpis finibus, luctus laoreet risus.
            </p>
            <p>
            Nullam mollis eget mauris ut posuere. Phasellus nec commodo neque. Sed pulvinar lobortis tellus, vitae auctor lacus ullamcorper a. Donec iaculis porta urna et sodales. I
            </p>
            </div>
            <div class="col-12 col-md-6 crp-happenning-right wow fadeInUp" data-wow-duration="1s" data-wow-delay=".7s">
            <div class="clockdiv-area">
            <div id="clock" class="d-flex flex-wrap">
            <div class="clockdiv_column">
            <div class="clocktimes">
            <span id="days"></span>
            <small>Days</small>
            </div>
            </div>
            <div class="clockdiv_column">
            <div class="clocktimes">
            <span id="hours"></span>
            <small>Hours</small>
            </div>
            </div>
            <div class="clockdiv_column">
            <div class="clocktimes">
            <span id="mins"></span>
            <small>Mins</small>
            </div>
            </div>
            <div class="clockdiv_column">
            <div class="clocktimes">
            <span id="secs"></span>
            <small>Secs</small>
            </div>
            </div>
            </div>
            </div>
            <div class="token-amount-area d-flex flex-wrap justify-content-between">
            <div class="token-amount-col">
            <h5>Start Date</h5>
            <p>JUNE 08, 2021 - 24.00 PM GMT</p>
            </div>
            <div class="token-amount-col">
            <h5>End Date</h5>
            <p>JUNE 20, 2021 - 24.00 PM GMT</p>
            </div>
            <div class="token-amount-col">
            <h5>Token amount</h5>
            <p>5,000,000.000 ICC</p>
            </div>
            <div class="token-amount-col">
            <h5>Exchange Rate</h5>
            <p>1 ETH = 2000 ICC, 1 BTC = 3000 ICC</p>
            </div>
            <div class="token-amount-col">
            <h5>Token Currencies</h5>
            <p>ETH, BTC, LTC</p>
            </div>
            <div class="token-amount-col">
            <h5>Minimum Amount</h5>
            <p>20 ETH / BTC</p>
            </div>
            </div>
            <a class="crp-btn text-white" href="#">Buy Now</a>
            </div>
            </div>
            </div>
            </div>

            <div class="container">
            <div class="row pt-110 pb-50 mb-pt-60 mb-pb-0">
            <div class="col-12 big-title text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
            <h3>Token Details</h3>
            <h2>Token Distribution</h2>
            </div>
            </div>
            <div class="chart-container d-flex flex-wrap pb-110 mb-pb-60 mb-pt-20">
            <div class="chart-col wow zoomIn" data-wow-duration="1s" data-wow-delay="0.5s">
            <div class="chart-token d-flex flex-wrap align-items-center justify-content-sm-center justify-content-lg-start mb-50">
            <div class="chart-cycle">
            <canvas id="chart1" width="300" height="300"></canvas>
            <div class="chart-icon"></div>
            </div>
            <div class="chart-point">
            <div>
            <div class="sale-item">
            <div class="sale-item-color">
            <span></span>
            </div>
            <div class="sale-item-cont">
            <strong>10%</strong>
            <small>Top Cummunity</small>
            </div>
            </div>
            <div class="sale-item">
            <div class="sale-item-color color-green">
            <span></span>
            </div>
            <div class="sale-item-cont">
            <strong>08%</strong>
            <small>Reserved Fund</small>
            </div>
            </div>
            <div class="sale-item">
            <div class="sale-item-color color-blue">
            <span></span>
            </div>
            <div class="sale-item-cont">
            <strong>12%</strong>
            <small>Advisor Team</small>
            </div>
            </div>
            <div class="sale-item">
            <div class="sale-item-color color-yellow">
            <span></span>
            </div>
            <div class="sale-item-cont">
            <strong>50%</strong>
            <small>Sold Globaly</small>
            </div>
            </div>
            <div class="sale-item">
            <div class="sale-item-color color-burnt">
            <span></span>
            </div>
            <div class="sale-item-cont">
            <strong>20%</strong>
            <small>Financial</small>
            </div>
            </div>
            </div>
            </div>
            </div>
            <h3>Token Distribution</h3>
            </div>
            <div class="chart-col wow zoomIn" data-wow-duration="1s" data-wow-delay="0.5s">
            <div class="chart-token d-flex flex-wrap align-items-center order-lg-2 justify-content-lg-end justify-content-sm-center justify-content-md-center mb-pt-10 mb-50">
            <div class="chart-cycle d-flex order-lg-2">
            <div class="chart-cycle">
            <canvas id="chart2" width="300" height="300"></canvas>
            <div class="chart-icon"></div>
            </div>
            </div>
            <div class="chart-point d-flex order-lg-1">
            <div class="sale-right-text">
            <div class="sale-item">
            <div class="sale-item-color">
            <span></span>
            </div>
            <div class="sale-item-cont">
            <strong>20%</strong>
            <small>Top Cummunity</small>
            </div>
            </div>
            <div class="sale-item">
            <div class="sale-item-color color-green">
            <span></span>
            </div>
            <div class="sale-item-cont">
            <strong>50%</strong>
            <small>Reserved Fund</small>
            </div>
            </div>
            <div class="sale-item">
            <div class="sale-item-color color-blue">
            <span></span>
            </div>
            <div class="sale-item-cont">
            <strong>25%</strong>
            <small>Advisor Team</small>
            </div>
            </div>
            <div class="sale-item">
            <div class="sale-item-color color-yellow">
            <span></span>
            </div>
            <div class="sale-item-cont">
            <strong>15%</strong>
            <small>Sold Globaly</small>
            </div>
            </div>
            <div class="sale-item">
            <div class="sale-item-color color-burnt">
            <span></span>
            </div>
            <div class="sale-item-cont">
            <strong>7%</strong>
            <small>Financial</small>
            </div>
            </div>
            </div>
            </div>
            </div>
            <h3 class="text-end">Sale Contribution</h3>
            </div>
            </div>
            </div>



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



