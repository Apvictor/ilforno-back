        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2022. Todos os direitos reservados.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Powered by | Woobe Serviços Online</span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="<?php echo base_url('assets/vendors/js/vendor.bundle.base.js');?>"></script>
  <script src="<?php echo base_url('assets/vendors/js/vendor.bundle.addons.js');?>"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="<?php echo base_url('assets/js/off-canvas.js');?>"></script>
  <script src="<?php echo base_url('assets/js/hoverable-collapse.js');?>"></script>
  <script src="<?php echo base_url('assets/js/misc.js');?>"></script>
  <script src="<?php echo base_url('assets/js/settings.js');?>"></script>
  <script src="<?php echo base_url('assets/js/todolist.js');?>"></script>
  <script src="<?php echo base_url('assets/js/util.js');?>"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <?php
  if(isset($scripts)){
    foreach ($scripts as $script) {
  ?>
      <script src="<?php echo base_url('assets/'.$script)?>"></script>
  <?php  
    }
  }
  ?>
  <!-- End custom js for this page-->
</body>


</html>