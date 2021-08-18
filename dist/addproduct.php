<?php
require_once "../class/webstoreclass.php";
$user = $store->get_userdata();
$store->add_category();
$store->add_products();
$categories = $store->get_categories();
$title = "Add New Product";
include_once "../includes/dashboard_header.php";
include_once "../includes/dashboard_sidebar.php";
include_once "../includes/dashboard_navbar.php";
?>
<div class="modal fade" id="addnewcategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label>Category Name</label>
            <input type="text" name="productCategory" class="form-control">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="categoryBtn" class="btn btn-primary">Add</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Add New Product</h1>

  <div class="card shadow mb-4">
    <!-- Product Information Form -->
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Product Information</h6>
    </div>
    <form class="card-body" method="post" enctype="multipart/form-data" id="productForm">
      <div class="form-group">
          <label>Product Category
            <button type="button" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#addnewcategory">
              <span class="icon text-white-50">
                  <i class="fas fa-plus"></i>
              </span>
            </button>
          </label>
          <select class="form-control" name="categoryID">
            <option selected disabled>Select Category</option>
            <?php foreach ($categories as $category) { ?>   
              <option value="<?= $category["ID"] ?>"><?= $category[
  "categoryName"
] ?></option>
            <?php } ?>
          </select>
        </div>
      <div class="form-group">
        <label>Product Name</label>
        <input type="text" name="productName" class="form-control" >
      </div>
      <div class="form-group">
        <label>Product Description</label>
        <textarea class="form-control" name="productDescription" rows="3"></textarea>
      </div>
      <div class="form-group">
        <label>Product Price</label>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text">P</span>
          </div>
          <input type="text" name="productPrice" class="form-control" aria-label="Amount (to the nearest dollar)">
          <div class="input-group-append">
            <span class="input-group-text">.00</span>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label>Product Color</label>
        <input type="text" name="productColor" class="form-control" >
      </div>    
      <div class="form-row">
        <div class="form-group col-md-2">
          <label>Cover Photo</label>
          <input type="file" class="form-control-file" name="coverPhoto">
        </div>
        <div class="form-group col-md-2">
          <label>Product Image 1</label>
          <input type="file" class="form-control-file" name="productImage1">
        </div>       
        <div class="form-group col-md-2">
          <label>Product Image 2</label>
          <input type="file" class="form-control-file" name="productImage2">
        </div>       
        <div class="form-group col-md-2">
          <label>Product Image 3</label>
          <input type="file" class="form-control-file" name="productImage3">
        </div>       
      </div>
      <!-- <div class="form-group">     
        <input type="hidden" class="form-control" name="minStocks" value="10">
      </div> -->
      <div class="d-sm-flex justify-content-end">
        <a href="products.php">
          <button type="button" class="btn btn-secondary btn-icon-split mr-4">
            <span class="text">Cancel</span>
          </button>
        </a>
        <button type="submit"  name="addProductBtn" class="btn btn-primary btn-icon-split"> 
          <span class="text">Submit</span>
        </button>
      </div>
    </form>
  </div>
</div>
<!-- end of container-fluid -->
</div>
<!-- End of Main Content -->
<?php require_once "../includes/dashboard_footer.php"; ?>
<?php require_once "../includes/dashboard_scripts.php"; ?>
