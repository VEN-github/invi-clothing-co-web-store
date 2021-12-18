<?php
require_once "../class/webstoreclass.php";
$user = $store->get_userdata();
$title = "Add New Product";
include_once "../includes/dashboard_header.php";
$admins = $store->get_admin();
?>
  <body id="page-top">
    <?php include_once "../includes/preloader.php"; ?>
    <?php
    $store->add_category();
    $categories = $store->get_categories();
    $store->add_products();
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
                <!-- Category Modal Form -->
                <div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Add New Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form method="post" id="categoryForm">
                          <div class="form-group">
                            <label>Category Name</label>
                            <input type="text" name="categoryName" class="form-control" placeholder="Category Name">
                          </div>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="addCategory" class="btn btn-secondary" form="categoryForm">Add</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End of Modal Form -->
                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800">Add New Product</h1>
                <!-- Product Form -->
                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-gray-800">Product Information</h6>
                  </div>
                  <div class="card-body">
                    <form method="post" enctype="multipart/form-data" id="productForm">
                      <div class="form-group">
                        <label>Category 
                          <button type="button" class="btn btn-secondary btn-icon-split" data-toggle="modal" data-target="#categoryModal">
                            <span class="icon text">
                              <i class="fas fa-plus"></i>
                            </span>
                          </button>
                        </label>
                        <select class="selectpicker show-tick form-control" name="category" data-live-search="true">
                          <option selected="selected" disabled="disabled">Select Category</option>
                          <?php foreach ($categories as $category) { ?>
                          <option value="<?= $category[
                            "ID"
                          ] ?>" data-tokens="<?= $category[
  "categoryName"
] ?>"><?= $category["categoryName"] ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" name="productName" class="form-control" placeholder="Product Name">
                      </div>
                      <div class="form-group">
                        <label>Product Description</label>
                        <textarea class="form-control" name="productDescription" rows="3" placeholder="Product Description"></textarea>
                      </div>
                      <div class="row">
                        <div class="col-lg-3">
                          <div class="form-group">
                            <label>Cover Photo</label>
                            <input type="file" name="coverPhoto" class="form-control-file">
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="form-group">
                            <label>Image 1</label>
                            <input type="file" name="image1" class="form-control-file">
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="form-group">
                            <label>Image 2</label>
                            <input type="file" name="image2" class="form-control-file">
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="form-group">
                            <label>Image 3</label>
                            <input type="file" name="image3" class="form-control-file">
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="form-group">
                            <label>Size Guide</label>
                            <input type="file" name="sizeGuide" class="form-control-file">
                          </div>
                        </div>
                        <input type="hidden" name="availability" value="Unavailable">
                      </div>
                    </form>
                  </div>
                </div>
                <div class="card body mb-4 py-1">
                  <div class="d-flex flex-row-reverse">
                    <div class="p-2">
                      <button type="submit" name="addProduct" class="btn btn-secondary btn-icon-split" form="productForm">
                        <span class="text">Submit</span>
                      </button>
                    </div>              
                    <div class="p-2">
                      <a href="products.php" class="btn btn-secondary btn-icon-split">
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
  </body>
</html>
