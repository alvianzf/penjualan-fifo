<?= $yield_header ?>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- sidebar  -->
    <?= @$yield_sidebar ?>


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <?= @$yield_topbar ?>

        <?=  @$yield ?>

      </div>
      <!-- End of Main Content -->

      <?= @$yield_footer ?>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Logout modal -->
  <?php echo @$yield_logout ?>


  <!-- Bootstrap core JavaScript-->
  <script src="assets/templates/vendor/jquery/jquery.min.js"></script>
  <script src="assets/templates/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="assets/templates/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="assets/templates/js/sb-admin-2.min.js"></script>



</body>

</html>