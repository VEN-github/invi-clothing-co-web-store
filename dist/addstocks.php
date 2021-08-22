<?php
require_once "../class/webstoreclass.php";
$user = $store->get_userdata();
$product = $store->get_productID();
$store->delete_products();
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
      <div id="stockInfo" class="card shadow mb-4">
        <!-- Stock Info -->
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Stock Information</h6>
        </div>
        <form class=card-body method="post">
          <div class="form-group">
            <label>Stock</label>
            <input type="text" class="form-control" name="stocks[]" id="stocks" >
          </div>
          <input type="hidden" name="countRow[]" id="productID" value="0">
          <input type="hidden" name="productID" value="<?= $product["ID"] ?>">
          <div class="form-group">
            <button type="button" id="addSize" class="btn btn-primary btn-icon-split mr-4">
              <span class="text">Add Size <i class="fas fa-plus"></i></span>
            </button>
          </div>
          <div class="d-sm-flex justify-content-end">
            <button type="submit" name="cancel" class="btn btn-secondary btn-icon-split mr-4">
              <span class="text">Cancel</span>
            </button>
            <button type="submit" name="addStocksBtn" class="btn btn-primary">
              Submit
            </button>
          </div>
        </form>
      </div>
      <div id="sizeInfo" class="card shadow mb-4" style="display:none;">
        <!-- Size Info -->
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Add Size</h6>
        </div>
        <form class=card-body id="addForm">
          <div class="form-group">
            <label>Size</label>
            <input type="text" class="form-control" id="size" >
          </div>
          <div class="d-sm-flex justify-content-end">
            <button type="submit" class="btn btn-primary">
              Add
            </button>
          </div>
        </form>
      </div>
      <div id="sizeList" class="card shadow mb-4" style="display:none;">
        <!-- Size List -->
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Size List</h6>
        </div>
        <div class="card-body">
          <form class="card-body" method="post" id="stocksForm">
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
          </form>
        </div>
      </div>
      <div id="buttons" class="card shadow mb-4 py-3 px-4" style="display:none;">
        <div class="d-sm-flex justify-content-end">
          <button type="button" id="cancel" class="btn btn-secondary btn-icon-split mr-4">
            <span class="text">Cancel</span>
          </button>
          <button type="submit" class="btn btn-primary" name="addStocksBtn" form="stocksForm">
            Submit
          </button>
        </div>
      </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<?php require_once "../includes/dashboard_footer.php"; ?>
<script src="./assets/js/variation.js"></script>   
<?php require_once "../includes/dashboard_scripts.php"; ?>
