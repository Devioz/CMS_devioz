<?php
session_start();
include '../../bd/server.php';   

if(!isset($_SESSION['user'])) 

    { echo '<script> window.location="/adminlte.io/themes/v3/pages/acc_design/index.php"; </script>';} 

?>


<!-- jQuery -->
<!-- <script src="../../plugins/jquery/jquery.min.js"></script> -->
<!-- Bootstrap 4 -->
<!-- <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script> -->
<script src="../../plugins/chart.js/Chart.min.js"></script>
<script language="JavaScript">

    //- BAR CHART -   
    var jrChar = null;  
    function epoch_to_hh_mm_ss(epoch) {
      return new Date(epoch*1000).toISOString().substr(12, 7)
    }
    
    function mostrarRepEvento(rp){
      var arrReporte = [], arrChart = [];
      arrReporte['t1'] = 'PROMEDIO DE EVENTOS (últimos 30 días)';
      arrReporte['t2'] = "TIEMPO POR EVENTO RESPECTO AL PROMEDIO GENERAL";
      arrReporte['t3'] = "CURVA DE TIEMPO POR EVENTO: ";
      arrChart['t1'] = 'bar';
      arrChart['t2'] = "bar";
      arrChart['t3'] = "line";
      var barChartCanvas = $('#barChartEvento').get(0).getContext('2d');
      var dpost = {'r':rp, 'fecha':$("#fecha_evento3").val()};
      if(dpost.fecha == "" || dpost.fecha == null){
        Swal.fire({
          icon: 'warning',
          title: 'Faltan datos',
          text: 'Seleccione una fecha válida.'
        })
        return;
      }else  if(rp == "0"){
        Swal.fire({
          icon: 'warning',
          title: 'Faltan datos',
          text: 'Seleccione una reporte válido.'
        })
        return;
      }else  if(rp == "t3"){
        var selEvento = $("#selTipoEvento");
        if(selEvento.val() == ""){
          Swal.fire({
          icon: 'warning',
          title: 'Faltan datos',
          text: 'Seleccione una tipo de evento.'
          })
          return;
        }
        dpost.idEvento = selEvento.val();
      }
      var areaChartData;
      $.ajax({
        type:"POST",
        data:dpost,
        url:"rep_evento.php",

        success:function(r){
          if(jrChar != null){
            jrChar.destroy();
          }
          
            var conta = 0;
            areaChartData = JSON.parse(r);
        
          
          var barChartData = $.extend(true, {}, areaChartData);
          var temp0 = areaChartData.datasets[0];
          barChartData.datasets[0] = temp0;

          if(rp != "t3"){
            var temp1 = areaChartData.datasets[1];          
            barChartData.datasets[1] = temp1
          }

          var barChartOptions = {
            responsive              : true,
            maintainAspectRatio     : false,
            datasetFill             : false,
            scaleOverride           : true,
            scaleSteps              : 8,
            scaleStepWidth          : 1800,
            scaleStartValue         : 0,
            maintainAspectRatio     : false,            
            scales: {
              yAxes: [{
                ticks: {
                  userCallback: function(v) { return epoch_to_hh_mm_ss(v)+' Hrs.' },
                  stepSize: 30 * 60
                }
              }]
            },
            tooltips: {
              callbacks: {
                label: function(tooltipItem, data) {
                  return data.datasets[tooltipItem.datasetIndex].label + ': ' + epoch_to_hh_mm_ss(tooltipItem.yLabel) +' Hrs.' ;
                }
              }
            },
            title:  {
                  display: true,
                  text: arrReporte[rp]
              }            
          }

          jrChar = new Chart(barChartCanvas, {
            type: arrChart[rp],
            plugins:[{
              tooltip: {
                enabled:true,
                visible: true
              },
              
            }],         
            data: barChartData,
            options: barChartOptions
          })               
          
        

        }
      });
    }

  $(document).ready(function(){
    mueveReloj();
    validarMarcacionJornada();
    mostrarListaAsistencia();
    obtenerUltimaAsistencia();

    $("#btnReporte").click(function(){
      mostrarRepEvento($("#selTipoReporte").val());
    });

    $("#selTipoReporte").change(function(){
      var sel = $("#selTipoEvento");
      if($(this).val() == "t3"){
        
        sel.parent('div').show();
        sel.removeAttr('disabled');
        sel.html("");

        $.ajax({
          type:"POST",
          url:"lista_global.php",
          data:{'t':'Evento'},
          success:function(r){
            sel.html(r);                
          }
        });


      }else{
        sel.parent('div').hide();
        sel.attr('disabled');
      }
    });


    
    $("#btn-ini").prop('disabled',true);
    $("#btn-fin").prop('disabled',true);
    $("#lista1").prop('disabled',true);
    $("#lista2").prop('disabled',true);

    
      //Date picker
    $('#reservationdate').datetimepicker({
      format: 'Y-M-D'
    });
    $('#reservationdate2,#reservationdate3').datetimepicker({
      format: 'Y-M-D'
    });


    $('#btn_enviar').click(function(){
      var formData = new FormData($("#formEnvioDatos")[0]);
      
      formData.append("lista1", $('#lista1').val());
      formData.append("lista2", $('#lista2').val());

      registrarMarcacion(formData);
    });

  })
</script>




  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Asistencia</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../acc_design/index.php">Inicio</a></li>
              <li class="breadcrumb-item active">Asistencia</li>
            </ol>
            <form name="form_reloj">
              <input type="text" name="reloj" size="10" style="background-color : Black; color : White; font-family : Verdana, Arial, Helvetica; font-size : 8pt; text-align : center;" onfocus="window.document.form_reloj.reloj.blur()">
            </form>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

   
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->



        <div class="card card-info">



          <div class="card-header">
            <h3 class="card-title">Modulo de Marcacion</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>




          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
               
                      <label>Inicio de Marcacion</label>

                      
                        <div>
                            <td>
                              <button type="button" id="btn-ini-jor" class="btn btn-block btn-secondary">Inicio</button>
                            </td>
                        </div>

                        <div class="form-group">
                         <br>
                          <td>
                            <button type="button" id="btn-ini" class="btn btn-block btn-default"></button>
                          </td>
                        </div>


                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">
               
                      <label>Fin de Marcacion</label>

                      
                        <div>
                            <td>
                              <button type="button" id="btn-fin-jor" class="btn btn-block btn-secondary">Fin</button>
                            </td>
                        </div>

                        <div class="form-group">
                         <br>
                          <td>
                            <button type="button" id="btn-fin" class="btn btn-block btn-default"></button>
                          </td>
                        </div>


                <!-- /.form-group -->
              </div>
             
            </div>



            

            <div class="row">
              <div class="col-md-6">
               
                      <label>Seleccionar Estado</label>


                      <!-- <form action="enviar.php" method="post"> -->

                      <form id="formEnvioDatos" >

                                        <div class="form-group">
                                          
                                          <select class="form-control select2" style="width: 100%;" id="lista1" name="lista1">
                                            <option selected="selected" value="0">Seleccionar</option>
                                            <option value="2">Capacitacion y Reunion</option>
                                            <option value="3">Coaching</option>
                                            <option value="4">Feedback</option>
                                            <option value="5">OJT</option>
                                            <option value="6">Incidencias</option>
                                            <option value="7">Refrigerio</option>  
                                            <option value="8">Salud - Asistencia Medica</option>
                                            <option value="9">SS-HH</option>                           
                                          </select>
                                        </div>

                                      
                                <!-- /.form-group -->
                              </div>
                              <!-- /.col -->
                              <div class="col-md-6">
                              <label>Seleccionar Sub-Estado</label>
                                    <div class="form-group" id="select2lista"></div>
                              </div>
                         

                            </div>  

                            <div class="row">
                              <div class="col-md-6">
                                           
                                      
                                            </form>

                                            <div>
                                                <td>
                                                <button   class="btn btn-block btn-primary " name="btn_enviar" id="btn_enviar">Registrar</button>
                                                </td>
                                            </div>

                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                  
              <label>&nbsp;</label>

              <br>        
               
              </div>
             
            </div>  


            <script type="text/javascript">

              $("#btn-ini-jor").click(function(){
                marcarJornada(1);
              })
              $("#btn-fin-jor").click(function(){
                marcarJornada(2);
              })
              $('#lista1').change(function(){
                recargarLista();
              });

              
              // .change(function(){
              //   console.log($("#reservationdate input").val());
              //   $('#example1').dataTable( {
              //     search: {
              //       "search": $("#reservationdate input").val()
              //     }
              //   } );
              // });

              // $("#mostrar_evento").click(function(){
               
                
              // })

              function registrarMarcacion(formData,jornada=false,ini_fin){
                                 

                  if(jornada==true){
                    // no validamos check
                    var tex_est_sel = "";
                    var tex_est_sel2 = "";
                    if(ini_fin==1){
                      tex_est_sel = "Inicio de Jornada"
                    }else{
                      tex_est_sel = "Fin de Jornada"
                    }
                  }else{
                    var tex_est_sel =  $("#lista1 option:selected").text();
                    var tex_est_sel2 =  $("#lista2 option:selected").text();

                    var lis1 =  $("#lista1 option:selected").val();
                    var lis2 =  $("#lista2 option:selected").val();

                    if(lis1 == '0'){
                      Swal.fire({
                        icon: 'warning',
                        title: 'Debe seleccionar estado',
                        // text: 'Puede revisar su registro.',
                        allowOutsideClick: false,
                      });
                      return false;
                    }

                    if(lis2 == '0'){
                      Swal.fire({
                        icon: 'warning',
                        title: 'Debe seleccionar subestado',
                        // text: 'Puede revisar su registro.',
                        allowOutsideClick: false,
                      })
                      
                      return false;
                    }
                  }
                  

                  Swal.fire({
                    title: '¿Desea registrar el estado '+tex_est_sel+'?',
                    text: tex_est_sel2,
                    icon: 'warning',
                    showCancelButton: true,
                    allowOutsideClick: false,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Marcar Asistencia'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      $.ajax({
                        url: 'enviar.php',  
                        type: 'POST',
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(data){
                          console.log(data);
                          if(data==1){
                            Swal.fire({
                              icon: 'success',
                              title: 'Bien hecho',
                              text: 'Puede revisar su registro.',
                              allowOutsideClick: false,
                            }).then((result)=>{
                              if (result.isConfirmed) {
                                window.location.reload()
                              }
                            })
                          }else{
                            Swal.fire({
                              icon: 'error',
                              title: 'Ocurrio un error!',
                              text: 'Porfavor comunicarse con sistemas.'
                            })
                          }
                        }				
                      });
                    }
                  })
              }
              function recargarLista(activar_cierre=false){
                $.ajax({
                  type:"POST",
                  url:"datos.php",
                  data:{
                    subEstado : $('#lista1').val(),
                    cierre : activar_cierre
                  },//"subEstado=" + $('#lista1').val()+"&",
                  success:function(r){
                    $('#select2lista').html(r);
                  }
                });
              }
              function obtenerUltimaAsistencia(){
                $.ajax({
                  type:"POST",
                  url:"ultima_asistencia.php",
                  // data:"subEstado=" + $('#lista1').val(),
                  success:function(r){
                    var respuesta = JSON.parse(r);
                    
                    if(respuesta.est_ini_fin==="1"){
                      recargarLista(true)
                      $("#lista1").val(respuesta.marcacion);
                      $("#lista1").prop('disabled',true);
                      $("#btn-fin-jor").prop('disabled',true);
                      // let cerrar = parseInt(respuesta.submarcacion)+1;
                      // console.log(cerrar);
                      // $("#lista2").val(cerrar.toString());
                    }

                  }
                });
              }
              function mostrarListaAsistencia(){
                var t = $("#example1").DataTable({
                  // "responsive": true, 
                  // "lengthChange": false, 
                  // "autoWidth": false,
                  dom: 'Bfrtip',
                  buttons: [
                    "copy", "csv", "excel", "pdf"
                  ],
                  language: {
                    "search":"Buscar:",
                    "info":"Mostrando _START_ de _END_ , total _TOTAL_ entradas",
                    "paginate": {
                        "first":      "Primero",
                        "last":       "Ultimo",
                        "next":       "Siguiente",
                        "previous":   "Anterior"
                    },
                    // "infoEmpty":"Showing 0 to 0 of 0 entries",
                  }
                });
          
                var counter = 1;

                $.ajax({
                  type:"POST",
                  url:"lista_logsasistencia.php",
                  // data:"subEstado=" + $('#lista1').val(),
                  success:function(r){
                    // console.log(r);
                    // var resultado = JSON.parse(r);
                    // var conta = '';
                    // console.log(resultado);

                    $.each(JSON.parse(r),function(k,v){
                      // console.log(r);
                      var fecha = JSON.parse(v.fecha).date;

                      t.row.add( [
                        counter,
                        v.estado,
                        fecha.substring(0, 19),
                        v.marcacion,
                        v.estadoMarca
                      ] ).draw( false );
              
                      counter++;
                    })
                  
                  }
                });
              }
              function marcarJornada(num_jor){

                if(num_jor==1){
                  var formData = new FormData($("#formEnvioDatos")[0]);
                  
                  formData.append("lista1", 1);
                  formData.append("lista2", 1);
  
                  registrarMarcacion(formData,true,1);
                }else{
                  var formData = new FormData($("#formEnvioDatos")[0]);
                  
                  formData.append("lista1", 1);
                  formData.append("lista2", 2);
  
                  registrarMarcacion(formData,true,2);
                }
                
              }
              function validarMarcacionJornada(){
                $.ajax({
                  type:"POST",
                  url:"marca_jornada.php",
                  // data:"subEstado=" + $('#lista1').val(),
                  success:function(r){
                      var conta = 0;
                    $.each(JSON.parse(r),function(k,v){
                      // console.log(v.hora.date);
                      var hora = v.hora.date;
                      if(v.ini_fin==0){
                        $("#btn-fin").text( hora.substring(11, 19));
                        $("#btn-ini-jor").prop('disabled',true);
                        $("#btn-fin-jor").prop('disabled',true);
                        $("#lista1").prop('disabled',true);
                        $("#lista2").prop('disabled',true);
                        $("#btn_enviar").prop('disabled',true);
                      }else if(v.ini_fin==1 ){
                        $("#btn-ini").text( hora.substring(11, 19));
                        $("#btn-ini-jor").prop('disabled',true);
                        $("#lista1").prop('disabled',false);
                      }

                    })                   
                  }
                });
              }
              function mueveReloj(){
                momentoActual = new Date()
                hora = momentoActual.getHours()
                minuto = momentoActual.getMinutes()
                segundo = momentoActual.getSeconds()

                str_segundo = new String (segundo)
                if (str_segundo.length == 1)
                  segundo = "0" + segundo

                str_minuto = new String (minuto)
                if (str_minuto.length == 1)
                  minuto = "0" + minuto

                str_hora = new String (hora)
                if (str_hora.length == 1)
                  hora = "0" + hora

                horaImprimible = hora + " : " + minuto + " : " + segundo

                document.form_reloj.reloj.value = horaImprimible

                setTimeout("mueveReloj()",1000)
              }

              function mostrar_evento(){
                var fecha_evento = $("#fecha_evento").val();

                if(!fecha_evento){
                  Swal.fire({
                    icon: 'warning',
                    title: 'Debe seleccionar una fecha evento!',
                    text: 'Porfavor comunicarse con sistemas.'
                  })
                  return false;
                }

                $.ajax({
                  type:"POST",
                  url:"lista_eventos.php",
                  data:{
                    fecha:fecha_evento
                  },
                  success:function(r){
                    var resultado = JSON.parse(r);
                    $("#evento2 tbody").empty();
                    var counter = 1;
                    var conta = "";

                    let json_marca = {
                      INI_mar : [],
                      FIN_mar : []
                    };
                    
                    $.each(resultado,function(k,v){

                      if(v.estadosMarcacion.split('Inicio de ')[1]){
                        json_marca.INI_mar.push({
                          marca: v.estadosMarcacion.split('Inicio de ')[1],
                          fecha_ini: v.Fecha,
                          hora_ini: v.Hora,
                        })
                      }
                      if(v.estadosMarcacion.split('Fin de ')[1]){
                        json_marca.FIN_mar.push({
                          marca:v.estadosMarcacion.split('Fin de ')[1],
                          fecha_fin: v.Fecha,
                          hora_fin: v.Hora,
                        })
                      }
                      if(v.estadosMarcacion.split('Final de ')[1]){
                        json_marca.FIN_mar.push({
                          marca: v.estadosMarcacion.split('Final de ')[1],
                          fecha_fin: v.Fecha,
                          hora_fin: v.Hora,
                        })
                      }
                      
                    });
                    
                    let json_union_marca = {}
                
                    json_marca.INI_mar.find((data)=>{
                      if(!json_union_marca.hasOwnProperty(data.marca)){
                        json_union_marca[data.marca] = {                           
                          ini: [],
                          fin: []
                        }
                        
                        var fecha = data.fecha_ini.date;
                        var hora = data.hora_ini.date;

                        json_union_marca[data.marca].ini.push({
                          fecha_ini :fecha.substring(0, 10),
                          hora_ini :hora.substring(11, 19)
                        })
                      }

                      json_marca.FIN_mar.find((data2)=>{   
                        
                        var fecha2 = data2.fecha_fin.date;
                        var hora2 = data2.hora_fin.date;

                        if(data.marca === data2.marca){
                          json_union_marca[data2.marca].fin.push({  
                            fecha_fin :fecha2.substring(0, 10),
                            hora_fin :hora2.substring(11, 19)
                          })
                        } 
                      })

                    });

                    for(var key in json_union_marca){
                      var marca = key;
                      var fecha_ini= json_union_marca[key].ini[0].fecha_ini;
                      var fecha_fin= "";
                      var hora_ini= json_union_marca[key].ini[0].hora_ini;
                      var hora_fin= "00:00:00";
                      var duracion = "";
                      if(json_union_marca[key].fin[0]){
                        fecha_fin = json_union_marca[key].fin[0].fecha_fin;
                        hora_fin = json_union_marca[key].fin[0].hora_fin;

                        var hora1 = (hora_fin).split(":"),
                            hora2 = (hora_ini).split(":"),
                            t1 = new Date(),
                            t2 = new Date();
                        
                        t1.setHours(hora1[0], hora1[1], hora1[2]);
                        t2.setHours(hora2[0], hora2[1], hora2[2]);
                        
                        //Aquí hago la resta
                        t1.setHours(t1.getHours() - t2.getHours(), t1.getMinutes() - t2.getMinutes(), t1.getSeconds() - t2.getSeconds());
                        
                        duracion =  (t1.getHours() ? t1.getHours() + (t1.getHours() > 1 ? " horas" : " hora") : "0 horas") + 
                                    (t1.getMinutes() ? ", " + t1.getMinutes() + (t1.getMinutes() > 1 ? " minutos" : " minuto") : "0 minutos") + 
                                    (t1.getSeconds() ? (t1.getHours() || t1.getMinutes() ? " y " : "") + t1.getSeconds() + (t1.getSeconds() > 1 ? " segundos" : " segundo") : "0 segundos")
                      }

                      
                      conta += "<tr>"+                      
                        "<td>"+counter+"</td>"+
                        "<td>"+marca+"</td>"+
                        "<td>"+hora_ini+"</td>"+
                        "<td>"+hora_fin+"</td>"+                               
                        "<td>"+duracion+"</td>"+                               
                      "</tr>"; 
                      
                      if(Object.keys(json_union_marca).length===counter){
                        $("#evento2 tbody").append(conta);
                      }
                      
                      counter++;                      
                    }              
                  }
                });
              }


              





            </script>



              <style>
                #example1_filter,#example1_paginate{
                  float: right;
                }
              </style>















            

          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            
          </div>
        </div>
        <!-- /.card -->

        
        <!-- /.card -->

        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Registro de Marcaciones</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <!-- <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button> -->
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">    
            <div class="col-12">
              <div class="card card-primary card-tabs">
                <div class="card-header p-0 pt-1">
                  <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Lista de Marcaciones</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Eventos por Fecha</a>
                    </li> 
                    <li>
                      <a class="nav-link" id="custom-tabs-reporte-tab" data-toggle="pill" href="#custom-tabs-reporte" role="tab" aria-controls="custom-tabs-reporte" aria-selected="false">Reporte</a>
                    </li>                
                  </ul>
                </div>
                <div class="card-body">
                  <div class="tab-content" id="custom-tabs-one-tabContent">
                    <!-- 
                      tab MARCACIONES ===================================================================0
                   -->
                    <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                      <div class="row">
                        <div class="col-12">
                          <table id="example1" class="table table-bordered table-striped">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Estado</th>
                                <th>Fecha - Hora</th>
                                <th>Marcacion</th>
                                <th>Estado Marcacion</th>
                              </tr>
                            </thead>
                          </table>           
                          <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                      </div>
                      <div class="row">
                        <div class="form-group position-absolute" style="right: 0;margin-right: 205px;line-height: 1;margin-bottom: 0;top: 69px;">
                          <label class="m-0">Fecha:</label>
                            <div class="input-group date" id="reservationdate" data-target-input="nearest" style="margin-top: 6px;">
                                <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" style="height: 31px;"/>
                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker" style="height: 31px;">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                    <!-- 
                      tab EVENTO ===================================================================0
                   -->
                    <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                      <div class="row">
                        <div class="form-group">
                          <label class="m-0">Fecha:</label>
                            <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                                <input type="text" id="fecha_evento" class="form-control datetimepicker-input" data-target="#reservationdate2" />
                                <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" style="position: relative;bottom: -24px;left: 12px;">
                          <button type="button" onclick="mostrar_evento()" class="btn btn-primary">Mostrar evento</button>
                        </div>
                      </div>
                      <div class="row">
                        <table id="evento2" class="table table-bordered table-striped">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Evento</th>
                              <th>Hora Inicio</th>
                              <th>Hora Fin</th>
                              <th>Duración Evento</th>
                            </tr>
                          </thead>
                          <tbody>

                          </tbody>
                        </table>      
                      </div>
                    </div>
                    <!-- 
                      tab REPORTE ===================================================================0
                   -->
                    <div class="tab-pane fade" id="custom-tabs-reporte" role="tabpanel" aria-labelledby="custom-tabs-reporte-tab">  
                        <div class="row">
                          <div class="form-group">
                            <label class="m-0">Fecha:</label>
                              <div class="input-group date" id="reservationdate3" data-target-input="nearest">
                                  <input type="text" id="fecha_evento3" class="form-control datetimepicker-input" data-target="#reservationdate3" />
                                  <div class="input-group-append" data-target="#reservationdate3" data-toggle="datetimepicker">
                                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                  </div>
                              </div>
                          </div>
                          <div class="form-group" style="padding-left:12px;">
                            <label class="m-0">Tipo de reporte:</label>
                            <select id="selTipoReporte" class="form-control">
                              <option value="0">- Seleccione reporte -</option>
                              <option value="t1">Promedio de eventos</option>
                              <option value="t2">Número de segundos por evento</option>
                              <option value="t3">Curva de tiempo por evento</option>
                            </select>
                          </div>
                          <div class="form-group" style="padding-left:12px;display:none;">
                            <label class="m-0">Evento:</label>
                            <select id="selTipoEvento" class="form-control"  style="">
                            </select>
                          </div>
                          <div class="form-group" style="position: relative;bottom: -24px;left: 12px;">
                            <button type="button" id="btnReporte" class="btn btn-primary">Mostrar reporte</button>
                          </div>
                        </div>                                                  
                        <div class="chart">
                          <canvas id="barChartEvento" style="min-height: 380px !important; height: 380px !important; max-height: 380px !important; max-width: 100%;"></canvas>
                        </div>
                      
                    </div>
                  </div>
                </div>
                <!-- /.card -->
              </div>
            </div>       
            
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            Visit <a href="#">Bootstrap Duallistbox</a> for more examples and information about
            the plugin.
          </div>
        </div>
        <!-- /.card -->

        


        
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

