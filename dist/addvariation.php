<?php
require_once "../class/webstoreclass.php";
$user = $store->get_userdata();
$ID = $_GET["ID"];
$product = $store->get_singleID($ID);
$title = "Add Variation";
include_once "../includes/dashboard_header.php";
$admins = $store->get_admin();
?>
  <body id="page-top">
    <?php include_once "../includes/preloader.php"; ?>
    <?php
    $store->add_variation();
    $countOrders = $store->count_orders();
    $pendingOrders = $store->get_pending_orders();
    ?>
    <!-- Page Wrapper -->
    <div id="wrapper">
      <?php include_once "../includes/dashboard_sidebar.php"; ?>
      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
          <?php include_once "../includes/dashboard_navbar.php"; ?>
          <!-- Begin Page Content -->
          <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Add Variation</h1>
            <!-- Supplier Table -->
            <div class="card shadow mb-4">
              <div class="card-body">
                <div class="form-group">
                  <label>Variation Name</label>
                  <input type="text" id="variationName" class="form-control" placeholder="Variation Name">
                </div>
                <div class="d-flex justify-content-end">
                  <button type="button" id="addVariant" class="btn btn-secondary">Add</button>
                </div>
              </div>
            </div>
            <div class="variant-info card shadow mb-4" style="display: none;">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-gray-800">
                  Variation Information
                </h6>
              </div>
              <div class="card-body">
                <form method="post" enctype="multipart/form-data" id="variationForm"> 
                  <input type="hidden" name="productID" value="<?= $product[
                    "ID"
                  ] ?>" >                           
                </form>
              </div>
            </div>
            <div class="card body mb-4 py-1">
              <div class="d-flex flex-row-reverse">
                <div class="p-2">
                  <button type="submit" name="addVariant" class="btn btn-secondary btn-icon-split" form="variationForm">
                    <span class="text">Submit</span>
                  </button>
                </div>              
                <div class="p-2">
                  <a href="products.php" class="btn btn-light btn-icon-split">
                    <span class="text">Cancel</span>
                  </a>
                </div>
              </div>              
            </div>
          </div>
          <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->
        <?php require_once "../includes/dashboard_footer.php"; ?>
      </div>
      <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>
    <?php require_once "../includes/dashboard_scripts.php"; ?>
    <script src="./assets/js/variation.js"></script>
  </body>
</html>


