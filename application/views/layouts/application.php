<?= @$yield_header ?>


  <!-- Page Wrapper -->
  <div id="wrapper">
      <?= @$yield_sidebar ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?= @$yield_topbar ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <?= $yield ?>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

    <?= @$yield_sticky_footer ?>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

<?= @$yield_logout ?>
<?= @$yield_footer ?>