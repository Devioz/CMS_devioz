<?php
ini_set('display_errors', 1);
//session_start();
include '../../bd/server.php';   

if(!isset($_SESSION['user'])) 

    { echo '<script> window.location="/adminlte.io/themes/v3/pages/acc_design/index.php"; </script>';} 

?>
<?php





?>
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Registrar usuarios</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                    <li class="breadcrumb-item active">Registrar usuario</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid"><!-- div container -->
            <div class="row"> 

			<div class="card card-secondary card-tabs" style="width:100%"><!-- card headers -->
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="tab-user-register" data-toggle="pill" href="#tab-register" role="tab" aria-controls="tab-register" aria-selected="true"><i class="fas fa-user fa-lg"></i> Registrar</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="tab-user-import" data-toggle="pill" href="#tab-importar" role="tab" aria-controls="tab-importar" aria-selected="false"><i class="fas fa-file-excel fa-lg"></i> Importar</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="tab-user-list" data-toggle="pill" href="#custom-tabs-two-settings" role="tab" aria-controls="custom-tabs-two-settings" aria-selected="false"><i class="fas fa-users fa-lg"></i> Listado</a>
                  </li>
                </ul>
              </div><!-- card header (fin) -->
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-two-tabContent">

                  <div class="tab-pane fade active show" id="tab-register" role="tabpanel" aria-labelledby="tab-user-register"><!-- tab 1 -->

                            <!-- general form elements -->
                            <div class="card card-light">
                                <div class="card-header">
                                    <h3 class="card-title" id="regTitle"><i class="fas fa-plus-circle fa-lg"></i> Nuevo usuario</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->

                                
                                <div class="card-body">



                                    <form id="frmRegister">
                                        <fieldset class="form-group border p-3">
                                            <legend class="w-auto px-2 ">Datos personales</legend>

                                            <div class="form-row">

                                                <div class="form-group col-sm-4">
                                                    <label for="dev_reg_Nombres">Nombres</label>                                                
                                                    <input type="text" class="form-control" name="dev_reg_Nombres" id="dev_reg_Nombres" placeholder="Nombres" required="required">
                                                
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label for="dev_reg_ApPaterno">Apellido paterno</label>                                                    
                                                    <input type="text" class="form-control" name="dev_reg_ApPaterno" id="dev_reg_ApPaterno" placeholder="Apellido paterno" required="required">                                                
                                                </div> 
                                                <div class="form-group col-sm-4">
                                                    <label for="dev_reg_ApMaterno">Apellido materno</label>                                                   
                                                    <input type="text" class="form-control" name="dev_reg_ApMaterno" id="dev_reg_ApMaterno" placeholder="Apellido materno" required="required">                                                   
                                                </div> 
                                                <div class="form-group col-sm-4">
                                                    <label for="dev_reg_id_tipodocumento">Tipo de documento</label>
                                                    <select class="form-control" id="dev_reg_id_tipodocumento" name="dev_reg_id_tipodocumento"></select> 
                                                </div> 
                                                <div class="form-group col-sm-4">
                                                    <label for="dev_reg_NumDocumento">Número de documento</label>                                                    
                                                    <input type="text" class="form-control" id="dev_reg_NumDocumento" name="dev_reg_NumDocumento" placeholder="Número de documento">
                                                </div> 
                                                <div class="form-group col-sm-4">
                                                    <label for="dev_reg_Genero">Sexo</label>                                                  
                                                    <select class="form-control" id="dev_reg_Genero" name="dev_reg_Genero"></select>
                                                </div> 
                                                <div class="form-group col-sm-4">
                                                    <label for="dev_reg_Fecha_nacimiento">Fecha de nacimiento</label>                                                   
                                                    <input type="text" class="form-control" id="dev_reg_Fecha_nacimiento" name="dev_reg_Fecha_nacimiento" placeholder="Fecha de nacimiento">                                                    
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label for="dev_reg_id_estado_civil">Estado civil</label>                                                   
                                                    <select class="form-control" id="dev_reg_id_estado_civil" name="dev_reg_id_estado_civil"></select>
                                                </div> 
                                            </div>
                                            
                                            
                                        </fieldset>

                                        <fieldset class="form-group border p-3">
                                            <legend class="w-auto px-2 ">Datos de contacto</legend>
                                            <div class="form-row">
                                                <div class="form-group col-sm-4">
                                                    <label for="dev_reg_Telefono">Teléfono</label>                                 
                                                    <input type="text" class="form-control" id="dev_reg_Telefono" name="dev_reg_Telefono" placeholder="Teléfono">                                                    
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label for="dev_reg_Celular">Celular</label>
                                                    <input type="text" class="form-control" id="dev_reg_Celular" name="dev_reg_Celular" placeholder="Celular">
                                                </div> 
                                                <div class="form-group col-sm-4">
                                                    <label for="dev_reg_Telefono_referencia">Teléfono de referencia</label>
                                                    <input type="text" class="form-control" id="dev_reg_Telefono_referencia" name="dev_reg_Telefono_referencia" placeholder="Teléfono de referencia">
                                                </div> 
                                                <div class="form-group col-sm-4">
                                                    <label for="dev_reg_Preguntar_por">Preguntar por</label>
                                                    <input type="text" class="form-control" id="dev_reg_Preguntar_por" name="dev_reg_Preguntar_por" placeholder="Preguntar por">
                                                </div> 
                                                <div class="form-group col-sm-4">
                                                    <label for="dev_reg_Correo_personal">Correo personal</label>
                                                    <input type="email" class="form-control" id="dev_reg_Correo_personal" name="dev_reg_Correo_personal" placeholder="Correo personal">
                                                </div> 
                                                <div class="form-group col-sm-4">
                                                <label for="dev_reg_Correo_institucional">Correo institucional</label>
                                                    <input type="email" class="form-control" id="dev_reg_Correo_institucional" name="dev_reg_Correo_institucional" placeholder="Correo institucional">
                                                </div>                                                                                                
                                            </div>                                                                                        
                                        </fieldset>

                                        <fieldset class="form-group border p-3">
                                            <legend class="w-auto px-2 ">Domicilio</legend>
                                            <div class="form-row">
                                                <div class="form-group col-sm-4">
                                                    <label for="selDepartamento">Departamento</label>                                 
                                                    <select class="form-control" id="selDepartamento" name="selDepartamento"></select>                                                   
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label for="selProvincia">Provincia</label>
                                                    <select class="form-control" id="selProvincia" name="selProvincia"></select> 
                                                </div> 
                                                <div class="form-group col-sm-4">
                                                    <label for="dev_reg_id_ubigeo">Distrito</label>
                                                    <select class="form-control" id="dev_reg_id_ubigeo" name="dev_reg_id_ubigeo"></select> 
                                                </div> 
                                                <div class="form-group col-sm-4">
                                                    <label for="dev_reg_Direccion">Dirección</label>
                                                    <input type="text" class="form-control" id="dev_reg_Direccion" name="dev_reg_Direccion" placeholder="Dirección">
                                                </div>                                                                                                                                              
                                            </div>                                                                                        
                                        </fieldset>

                                        <fieldset class="form-group border p-3">
                                            <legend class="w-auto px-2 ">Usuario de sistema</legend>
                                            <div class="form-row">
                                                <div class="form-group col-sm-4">
                                                    <label for="dev_reg_id_perfil">Perfil</label>
                                                    <select class="form-control" id="dev_reg_id_perfil" name="dev_reg_id_perfil" required="required"></select>
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label for="dev_reg_id_cargo">Cargo</label>
                                                    <select class="form-control" id="dev_reg_id_cargo" name="dev_reg_id_cargo" required="required"></select>
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label for="dev_reg_id_funcion">Funcion</label>
                                                    <select class="form-control" id="dev_reg_id_funcion" name="dev_reg_id_funcion" required="required"></select>
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label for="inputEmail3">Usuario</label>                                 
                                                    <input type="text" class="form-control" name="inUsuario" id="inUsuario" placeholder="Ingrese usuario" required="required">                                                
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label for="inputEmail3">Contraseña</label>
                                                    <input type="password" class="form-control" name="inContrasena" id="inContrasena" placeholder="Ingrese contraseña" required="required">
                                                </div>                                                                                                                                                                                                                                              
                                            </div>                                                                                        
                                        </fieldset>                                        
                                        
                                    </form>                                    
                                   
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="button" class="btn btn-primary col-md-5" id="regSubmit">Registrar</button>
                                    <button type="button" class="btn btn-danger col-md-5" style="display:none;" id="regButton">Cancelar</button>
                                </div>
                                
                            </div>
                            <!-- /.card -->
                  

                </div><!--fin tab 1 -->

                <!-- tab 2-->
                <div class="tab-pane fade" id="tab-importar" role="tabpanel" aria-labelledby="tab-user-list">

                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">importación de usuarios en <b>Excel</b></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->                        
                        <div class="card-body">
                            <form method="post" id="frmUpload" action="/" enctype="multipart/form-data" role="form" accept-charset="utf-8">
                                <div class="form-group">
                                    <label class="col-lg-2 col-md-4 col-sm-12 col-xs-12 control-label">Archivo (.xlsx)*</label>
                                    <input type="file" name="inFile"  id="inFile" placeholder="Archivo (.xlsx)">
                                    <br><br>
                                    <button type="submit" class="btn btn-success">Importar Datos</button>
                                </div>
                            </form> 
                            <div class="row">
                                <div class="form-group" style="border-top: 1px solid;">
                                    <label class="col-lg-6 col-md-6 col-sm-12 col-xs-12 control-label">Descargar formato de importación</label>
                                    <button type="button" id="btnDescargarF" class="btn"><i class="fas fa-file-excel fa-3x"></i></button>
                                    
                                    
                                </div>
                            </div>                  

                        </div>
                    </div>                

                </div>

                  <!-- tab 3-->
                  <div class="tab-pane fade" id="custom-tabs-two-settings" role="tabpanel" aria-labelledby="tab-user-list">
                                       
                    <div class="row">
                        <div class="col-12">
                            

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Usuarios</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="tbUsuarios" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>id_usuario</th>
                                            <th>usuario</th>
                                            <th>nombres</th>
                                            <th>Apaterno</th>
                                            <th>Amaterno</th>
                                            <th>cargo</th>
                                            <th>funcion</th>
                                            <th>perfil</th>
                                            <th>usuario_reg</th>
                                            <th>creado</th>                                    
                                            <th>Opciones</th>                                    
                                        </tr>
                                        </thead>
                                        <tbody>
                                        
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>id_usuario</th>
                                            <th>usuario</th>
                                            <th>nombres</th>
                                            <th>Apaterno</th>
                                            <th>Amaterno</th>
                                            <th>cargo</th>
                                            <th>funcion</th>
                                            <th>perfil</th>
                                            <th>usuario_reg</th>
                                            <th>creado</th>
                                            <th>Opciones</th> 
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                            
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                  </div>
                    <!-- / -->
                                     


                </div>
              </div>
              <!-- /.card -->
            </div>


            </div> 
        </div><!-- div container (fin)-->
    </section>
</div>

<script language="JavaScript">


 function loadListas(){ 
    arrLista = [];
    arrLista["Perfil"] = "#dev_reg_id_perfil";
    arrLista["Cargo"] = "#dev_reg_id_cargo";
    arrLista["Funcion"] = "#dev_reg_id_funcion";
    arrLista["TipoDocumento"] = "#dev_reg_id_tipodocumento";
    arrLista["Sexo"] = "#dev_reg_Genero";
    arrLista["Departamento"] = "#selDepartamento";
    arrLista["EstadoCivil"] = "#dev_reg_id_estado_civil";
   
     $.ajax({
          type:"POST",
          url:"lista_global.php",
          data:{'t':'register_all'},
          success:function(d){
              result = jQuery.parseJSON(d);
           
              $.each(result, function(i,v){
                  $(arrLista[i]).html(v);
              })
            //$(sel).html(r);                
          },error:function(){
            msgBox('warning','warning',"error al cargar las listas");
            
          }
    });

 }

 function getUsuarios(){
     var data;
      $.ajax({
          type:"POST",
          url:"lista_global.php",
          async:false,
          data:{'t':'users'},
          success:function(re){
           data = JSON.parse(re);
          },error:function(){
            console.log("error generado en el servidor: ");
          }
        });
        return data;
 }

 function activarUsuario(t,obj){
      $.ajax({
          type:"POST",
          url:"register.php",
          data:{'method': 'estado', 'type' : t , 'k' :obj.data("idusuario")},
          success:function(re){
           data = JSON.parse(re);
           if(data.status){
            loadUsuarios();
            msgBox('success','Exitoso',data.msg);
           }else{
            msgBox('warning','Advertencia',data.msg);
           }
          },error:function(){
            msgBox('warning','Advertencia',"error generado en el servidor ");
          }
        });
 }

function loadUsuarios(){
 
    $("#tbUsuarios").dataTable().fnDestroy();
    $("#tbUsuarios").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      //dom: 'Bfrtip',
      dom:"<'row'<'col-sm-12 col-md-6'B><'col-sm-12 col-md-6'f>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
      "ajax":  {
          'method':'post',
          'data':{'t':'users'},
          'url':"lista_global.php"
      },
      "columns" : [
			{
				"data" : "id_usuario", visible: false
			},{
				"data" : "usuario"
			},{
				"data" : "nombres"
			},{
				"data" : "Apaterno"
			},{
				"data" : "Amaterno"
			},{
				"data" : "cargo"
			},{
				"data" : "funcion"
			},{
				"data" : "nombre_perfil"
			},{
				"data" : "usuario_reg"
			},{
				"data" : "created_at"
			},{
				"data" : "buttons"
			}
		]
        ,"language": {
				"url": "../../public/cdn/datatable.spanish.lang"
			} 
    });//.buttons().container().appendTo('#tbUsuarios_wrapper .col-md-6:eq(1)'); 
    
    $("#regSubmit").click(function(e){
        var frm = $("#frmRegister");
        //frm.preventDefault();
        //var formData = new FormData(frm);
        var formData = frm.serializeArray();
           console.log(formData);
        

        /*Swal.fire({
                icon:  'success',
                title:  'test',
                text: 'Por registrar'
            })
            return;*/
            formData.push({"name":"method", "value":"r"});
            //formData.append("method","r");
        $.ajax({
          type:"POST",
          url:"register.php",
          enctype: 'multipart/form-data',
          //data:{'method':'r', data: 'formData'},
          data: formData,
          //contentType: false, 
            //processData: false
          success:function(re){
            var result = JSON.parse(re);
            $("#frmRegister")[0].reset(); 
            //return;
            Swal.fire({
                icon: result.status ? 'success' : 'warning',
                title: result.status ? 'Bien hecho' : 'Verifique la informacion',
                text: result.msg
            })

          },error:function(){
            Swal.fire({
                icon:  'warning',
                title: 'error generado en el servidor:',
                text: result.msg
            })
        
          }
        });    

    })    
}

function setFormRegister(reg){
    if(reg){
        $("#regTitle").html('<i class="fas fa-plus-circle fa-lg"></i> Nuevo usuario');
        $("#regSubmit").html("Registrar");
        $("#regButton").hide();
        $("#inUsuario").prop("disabled",false);
    }else{
        $("#regTitle").html('<i class="fas fa-edit fa-lg"></i> Editar usuario');
        $("#regSubmit").html("Modificar");
        $("#regButton").show();
        $("#inUsuario").prop("disabled",true);
    }
}

function restartForm(){
    $("#regButton").hide();
    setFormRegister(true);
    $("#frmUpload")[0].reset();
    $("#hdiduser").val("");
}

$(document).on("click","#regButton",function(){
    restartForm();
})

$(document).on("click","button.activarusuario",function(){
    activarUsuario(1,$(this))
})

$(document).on("click","button.desactivarusuario",function(){
    activarUsuario(0,$(this))
})

$(document).on("click","button.eliminarUsuario",function(){

    $.ajax({
          type:"POST",
          url:"register.php",
          data:{'method': 'delete', 'k' :$(this).data("idusuario")},
          success:function(re){
           data = JSON.parse(re);
           if(data.status){
            loadUsuarios();
            msgBox('success','Exitoso',data.msg);
           }else{
            msgBox('warning','Advertencia',data.msg);
           }
          },error:function(){
            msgBox('warning','Advertencia',"error generado en el servidor ");
          }
        });

})

$(document).on("click","button.editarUsuario",function(){

    $.ajax({
      type:"POST",
      url:"lista_global.php",
      data:{'t': 'user', 'k' :$(this).data("idusuario")},
      success:function(re){
       data = JSON.parse(re);
       if(data.status){
            msgBox('success','Registro obtenido','Puede editar la información del usuario');
            setFormRegister(false);
           $("#tab-user-register").tab("show");
           
           $("#hdiduser").val(data.data.id_usuario);
           $("#inNombres").val(data.data.nombres);
           $("#inApPaterno").val(data.data.Apaterno);
           $("#inApMaterno").val(data.data.Amaterno);
           $("#inUsuario").val(data.data.usuario);          
           $("#selPerfil").val(data.data.perfil);
           $("#selCargo").val(data.data.perfil);
           $("#selFuncion").val(data.data.perfil);
           
           
       }else{
        msgBox('warning','Advertencia',"No se obtuvieron los datos del usuario");
        setFormRegister(true);
        
       }
      },error:function(){
        msgBox('warning','Advertencia',"error generado en el servidor ");
      }
    });

})

// ubigeos
$(document).on("change","#selDepartamento",function(){
    var obj = $(this);
    var sel = $("#selProvincia");
    $("#dev_reg_id_ubigeo").html("");
    sel.html("");
    $.ajax({
      type:"POST",
      url:"lista_global.php",
      data:{'t' :'Provincia', 'ccdd' :obj.val()},
      success:function(re){
       sel.html(re);
      },error:function(){
        msgBox('warning','Advertencia',"error generado en el servidor ");
      }
    });
})

$(document).on("change","#selProvincia",function(){
    var obj = $(this);
    var sel = $("#dev_reg_id_ubigeo");
    sel.html("");
    $.ajax({
      type:"POST",
      url:"lista_global.php",
      data:{'t' :'Distrito', 'ccpp' :obj.val()},
      success:function(re){
       sel.html(re);
      },error:function(){
        msgBox('warning','Advertencia',"error generado en el servidor ");
      }
    });
})


$(document).ready(function(){
    loadListas();
    /*loadListas("#selPerfil","Perfil");
    loadLista("#selCargo","Cargo");
    loadLista("#selFuncion","Funcion");*/
    
    loadUsuarios();

    $("#frmUpload").submit(function(e){
        e.preventDefault();
        /*var formData = $( this ).serializeArray();
        console.log(formData);*/
        
        var formData = new FormData();
        var files = $('#inFile')[0].files;
        
        if(files.length > 0 ){
            formData.append('file',files[0]);

            $.ajax({
            type:"POST",
            url:"register.php",
            data:formData,
            contentType: false,
            processData: false,
            success:function(re){console.log(re);
                var result = JSON.parse(re);
                if(result.status)
                    {$("#frmUpload")[0].reset();} 
                //return;
                Swal.fire({
                    icon: result.status ? 'success' : 'warning',
                    title: result.status ? 'Bien hecho' : 'Verifique la informacion',
                    text: result.msg
                })

            },error:function(){
                console.log("error generado en el servidor ");
            }
            });    
        }else{
                Swal.fire({
                    icon: 'warning',
                    title: 'Verifique la informacion',
                    text: 'Seleccione un archivo'
                })            
        }

    })

    $("#btnDescargarF").click(function(e){
        window.open("../../public/formato_importacion_usuarios.xlsx", '_blank');

    })


});

</script>
<style>
#tbUsuarios_wrapper > div:eq(0){
    background-color:red !important;
    width:50% !important;
}
#tbUsuarios_wrapper div:eq(1){
    width:50% !important;
}
a.nav-link.active{
    color:#000 !important;
}

</style>