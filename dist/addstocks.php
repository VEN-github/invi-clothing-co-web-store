<?php
require_once "../class/webstoreclass.php";
$user = $store->get_userdata();
$product = $store->get_productID();
$store->add_stocks();

$title = "Add New Product";
include_once "../includes/dashboard_header.php";
include_once "../includes/dashboard_sidebar.php";
include_once "../includes/dashboard_navbar.php";
?>
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Add New Product</h1>
      <div class="card shadow mb-4">
        <!-- Product Variation Form -->
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Add Size</h6>
        </div>
        <form class=card-body id="addForm">
          <div class="form-group">
            <label>Size</label>
            <input type="text" class="form-control" id="size" >
          </div>
          <div class="d-sm-flex justify-content-end">
            <button class="btn btn-primary">
              Add
            </button>
          </div>
        </form>
      </div>
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Size List</h6>
        </div>
        <div class="card-body">
          <form class="card-body" method="post">
            <div class="table-responsive">
              <table class="table table-bordered variation-table" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Size</th>
                    <th>Stock</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody> 
                </tbody>
              </table>
            </div>
            <input type="hidden" name="productID" value="<?= $product["ID"] ?>">
            <div class="d-sm-flex justify-content-end">
              <button type="submit" class="btn btn-primary" name="addStocksBtn">
                Submit
              </button>
            </div>
          </form>
        </div>
      </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<?php require_once "../includes/dashboard_footer.php"; ?>
<script src="./assets/js/variation.js"></script>   
<?php require_once "../includes/dashboard_scripts.php"; ?>
