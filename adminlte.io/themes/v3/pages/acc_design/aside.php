<?php
session_start();
include '../../bd/server.php';   

if(!isset($_SESSION['user'])) 

    { echo '<script> window.location="/adminlte.io/themes/v3/pages/acc_design/index.php"; </script>';} 

?>
<style type="text/css">

.main-sidebar {
    background-image: linear-gradient(to right, #4b545c,#4b545c) !important;
    /*background-image: linear-gradient(to right, #4b545c,#0A3431) !important;*/
}

</style>

<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Portal unificado22</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../dist/img/call/analista.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['Nombres']." ".$_SESSION['Apaterno']." ".$_SESSION['Amaterno'];  ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">

      <ul class="nav nav-pills nav-sidebar flex-column" id="ulMenu" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <!--<li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p> Dashboard <i class="right fas fa-angle-left"></i> </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../../index.html" class="nav-link">  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../../index2.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v2</p>
                </a>
              </li>
            </ul>
            <li class="nav-item">
              <a href="../../index2.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Dashboard v2</p>
              </a>              
            </li>-->

<?php 
$arr =  array();
foreach ($_SESSION["menuuu"] as $row) {
  if($navItem_1 != $row["id"]){
?>
  <li class="nav-item" >
  <a href="../../index2.html" class="nav-link ">
    <img class="" src="../..<?php  echo $row['icono']; ?>"/> 
    <p><?php echo $row['nombre']; ?></p>
  </a>
</li>

<?php
  }
  $navItem_1 = $row["id"];
  if(!isset($arr[$row["nombre_nivel1"]])){
    $arr[$row["nombre_nivel1"]] = array();
    $arr[$row["nombre_nivel1"]][] = $row;
  }else{
    $arr[$row["nombre_nivel1"]][] = $row;
  }

}

//var_dump($arr); die();

?>




<?php
              $navItem_1 = 0;
              $navItem_2 = 0;
              $nivel2 = false;
              $c = 0;
foreach ($_SESSION["menus"] as $row) {
  $c++;

  if($navItem_1 != $row["id"]){
?>
      <li class="nav-item" style="border-bottom: 1px solid #fff;">
        <a href="../../index2.html" class="nav-link disabled">
          <i class="fas fa-angle-double-right"></i>
          <p><?php echo $row['nombre']; ?></p>
        </a>
      </li>
<?php 

  }
  

    if($navItem_2 != $row["id_nivel2"]){


?>
        <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p> <?php echo $row['nombre_nivel2']; ?> <i class="right fas fa-angle-left"></i> </p>
            </a>
            <ul class="nav nav-treeview">

<?php } ?>

              <li class="nav-item">
                <a href="../../index.html" class="nav-link">  <i class="far fa-circle nav-icon"></i> <p><?php echo $row['nombre_nivel3']; ?></p> </a>
              </li>

<?php if( !isset($_SESSION["menu"][$c]) || ($_SESSION["menu"][$c]["id_nivel2"] != $row["id_nivel2"]) ) {   ?>
            </ul> 
</li>

<?php
 }


$navItem_1 = $row["id"];
$navItem_2 = $row["id_nivel2"];
?>

                       

<?php

                

                  }                
                ?>

          </ul>





      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <script type="text/javascript" >

    function loadMenu(){
      var el = $("#ulMenu");
      $.ajax({
          type:"POST",
          url:BASE_URL + "pages/acc_design/"+"menu.php",
          data:{'method': 'load'},
          success:function(re){
           data = JSON.parse(re);
           if(data.html != ""){
            el.html(data.html);
            //msgBox('success','Exitoso',data.msg);
           }else{
            msgBox('warning','Advertencia',"No cargó el menú");
           }
          },error:function(){
            msgBox('warning','Advertencia',"error generado en el servidor ");
          }
        });

    }

    function loadMenu_n1(){
      var el = $("#ulMenu");
      $.ajax({
          type:"POST",
          url:BASE_URL + "pages/acc_design/"+"menu.php",
          data:{'method': 'n1'},
          success:function(re){
           data = JSON.parse(re);
           if(data.html != ""){
            el.html(data.html);
            //msgBox('success','Exitoso',data.msg);
           }else{
            msgBox('warning','Advertencia',"No cargó el menú");
           }
          },error:function(){
            msgBox('warning','Advertencia',"error generado en el servidor ");
          }
        });

    }



    function loadMenu_n2(d){
      var el = $("#ulMenu");
      $.ajax({
          type:"POST",
          url: BASE_URL + "pages/acc_design/"+"menu.php",
          data:{'method': 'n2', 'n1':d},
          success:function(re){
           data = JSON.parse(re);
           if(data.html != ""){
            el.html(data.html);
            //msgBox('success','Exitoso',data.msg);
           }else{
            msgBox('warning','Advertencia',"No cargó el menú");
           }
          },error:function(){
            msgBox('warning','Advertencia',"error generado en el servidor ");
          }
        });

    }

    $(document).ready(function(){

      loadMenu();
      console.log(BASE_URL);

    })

    $(document).on("click","a.nav-nivel1",function(e){
      e.preventDefault();
      loadMenu_n2($(this).data("idnivel"));


    })

    $(document).on("click","a.nav-retornar",function(e){
      e.preventDefault();
      loadMenu_n1();


    })


    

  </script>