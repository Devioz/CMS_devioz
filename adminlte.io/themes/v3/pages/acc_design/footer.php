 <!-- /.content-wrapper -->
 <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2022 <a href="#">Portal Unificado</a>.</strong> 
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<script>
  $(function () {    
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });

    $(document).on("click",".new-event-btn",function(){
      console.log("crear nuevo event div");

      $.get("../acc_attendance/ajax_nuevas_secciones.php", {},
        function (returnedHtml) {
          var htmlmodel=returnedHtml;
          $(".caja-eventos .service-area").append(htmlmodel);
          //$(".caja-eventos").html(returnedHtml);

      });
      
      //var htmlmodel=$(".modelo-evento-nuevo").html();
      
      //event ajax  nuevo seccion id
    });

    $(document).on("click",'button[data-card-widget="remove"]',function(){
      console.log("remove div event");
      //remover div seccion
      var id_drop=$(this).data("identificador");
      console.log(id_drop);
      //var id_drop=4;
      
      $.ajax({
        url:"../acc_attendance/ajax_crud_secciones.php",
        type:"POST",
        async:false,
        data:{"accion":"eliminar",identificador:id_drop},
        success:function(){
          //$(modal).modal('hide');
          load_secciones();
        }
      });

      //$(this).parents(".service").remove();
    });

    //$(".caja-eventos").html("");

    function load_secciones(){
      console.log("load");

      $.get("../acc_attendance/ajax_lista_secciones.php", {},
        function (returnedHtml) {
          $(".caja-eventos").html(returnedHtml);
      });

     /* $.ajax({
        url:"../acc_attendance/ajax_lista_secciones.php",
        type:"POST",
        dataType: "html", 
        sucess:function(lista_secciones){
          console.log("punto html");
          $(".caja-eventos").html("aaaaaaaaa");
        }
      });*/

    }
    

    load_secciones();

    bsCustomFileInput.init();

    $(".custom-file-input").on("change", function () {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

    $('#modal-titulo').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var seccion = button.data('identificador') // Extract info from data-* attributes
      var modal = $(this);
      $("#modal-titulo").data("identificador",seccion);
    })

    $('#modal-enlace').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var seccion = button.data('identificador') // Extract info from data-* attributes
      console.log("identificador "+seccion);
      var modal = $(this);
      $("#modal-enlace").data("identificador",seccion);
    })

    $('#modal-imagen').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var seccion = button.data('identificador') // Extract info from data-* attributes
      console.log("identificador "+seccion);
      var modal = $(this);
      $("#modal-imagen").data("identificador",seccion);
    })

    $('#modal-descripcion').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var seccion = button.data('identificador') // Extract info from data-* attributes
      var modal = $(this);
      $("#modal-descripcion").data("identificador",seccion);
    })

    $(document).on("click","#btn-frm-modal-imagen",function(){
      actualizar_modal_valor("#frm-modal-imagen","#modal-imagen","imagen");
    });

    $(document).on("click","#btn-frm-modal-titulo",function(){
      actualizar_modal_valor("#frm-modal-titulo","#modal-titulo","titulo");
    });

    $(document).on("click","#btn-frm-modal-enlace",function(){
      actualizar_modal_valor("#frm-modal-enlace","#modal-enlace","enlace");
    });

    

    $(document).on("click","#btn-frm-modal-descripcion",function(){

      actualizar_modal_valor("#frm-modal-descripcion","#modal-descripcion","descripcion");

      /*console.log("recojo evento titulo");
        var atrib_id=$("#modal-descripcion").data("identificador");
        console.log("atributo "+atrib_id);//el id de seccion
        var val=$("#frm-modal-descripcion").val();
        console.log(val);
        $.ajax({
          url:"../acc_attendance/ajax_crud_secciones.php",
          type:"POST",
          async:false,
          data:{"accion":"update",identificador:atrib_id,columna:"descripcion",valor:val},
          success:function(){
            console.log("resultado");
            $("#modal-descripcion").modal('hide');
          load_secciones();
          }
      });*/
    });

    function actualizar_modal_valor(input,modal,columna){
      var atrib_id=$(modal).data("identificador");
      var val=$(input).val();

      var formData = new FormData();
      var files = $('#customFile')[0].files[0];

      if(columna=="imagen"){
        formData.append('file',files);
      }
      formData.append('accion',"update");
      formData.append('identificador',atrib_id);
      formData.append('columna',columna);
      formData.append('valor',val);

      $.ajax({
        url:"../acc_attendance/ajax_crud_secciones.php",
        type:"POST",
        data: formData,
        async:false,
        contentType: false,
        processData: false,
        //data:{"accion":"update",identificador:atrib_id,columna:columna,valor:val},
        success:function(){
          $(modal).modal('hide');
        load_secciones();
        }
      });
    }

  });
  
</script>


</body>

<!-- Mirrored from adminlte.io/themes/v3/pages/examples/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 24 Oct 2021 06:03:13 GMT -->
</html>