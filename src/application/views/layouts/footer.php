<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Gerenciador de Clientes
    </div>
    <!-- Default to the left -->
    <strong> &copy; <?php echo date('Y'); ?> <a href="#">Empresa</a>.</strong> Todos os direitos reservados.
  </footer>

  <!-- REQUIRED JS SCRIPTS -->


<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>
<!-- DataTables -->

<script src="<?php echo base_url();?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<!-- chart js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>

<!-- jquery mask -->
<script src="<?php echo base_url();?>assets/dist/js/jquery.mask.min.js"></script>



<script type="text/javascript">
<?php include('app.js'); ?>
</script>

</body>
</html>