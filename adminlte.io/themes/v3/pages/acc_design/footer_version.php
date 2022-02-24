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
      var htmlmodel=$(".modelo-evento-nuevo").html();
      $(".service-area").append(htmlmodel);
    });

    $(document).on("click",'button[data-card-widget="remove"]',function(){
      console.log("remove div event");
      $(this).parents(".service").remove();
    });

  });
</script>


</body>

<!-- Mirrored from adminlte.io/themes/v3/pages/examples/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 24 Oct 2021 06:03:13 GMT -->
</html>