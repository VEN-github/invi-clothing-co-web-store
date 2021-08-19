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
          <i class="fas fa-asterisk fa-xs" style="color:red"></i>
          <label>Product Category
            <button type="button" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#addnewcategory">
              <span class="icon text-white-50">
                  <i class="fas fa-plus"></i>
              </span>
            </button>
          </label>
          <select class="form-control" name="categoryID" required>
            <option selected disabled>Select Category</option>
            <?php foreach ($categories as $category) { ?>   
              <option value="<?= $category["ID"] ?>"><?= $category[
  "categoryName"
] ?></option>
            <?php } ?>
          </select>
        </div>
      <div class="form-group">
        <i class="fas fa-asterisk fa-xs" style="color:red"></i>
        <label>Product Name</label>
        <input type="text" name="productName" class="form-control" required>
      </div>
      <div class="form-group">
        <i class="fas fa-asterisk fa-xs" style="color:red"></i>
        <label>Product Description</label>
        <textarea class="form-control" name="productDescription" rows="3" required></textarea>
      </div>
      <div id="priceContainer" class="form-group">
        <i class="fas fa-asterisk fa-xs" style="color:red"></i>
        <label>Product Price</label>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text">P</span>
          </div>
          <input type="text" name="productPrice" id="price" class="form-control" aria-label="Amount (to the nearest dollar)" placeholder="Price" required>
          <div class="input-group-append">
            <span class="input-group-text">.00</span>
          </div>
        </div>
      </div>
      <div id="stockContainer" class="form-group">
        <i class="fas fa-asterisk fa-xs" style="color:red"></i>
        <label>Stock</label>
        <input type="text" name="stock" id="stock" class="form-control" placeholder="0" required>
      </div>  
      <div id="images" class="form-row">
        <div class="form-group col-md-2">
          <i class="fas fa-asterisk fa-xs" style="color:red"></i>
          <label>Cover Photo</label>
          <input type="file" class="form-control-file" id="image" name="coverPhoto" required>
        </div>
        <div class="form-group col-md-2">
          <label>Product Image 1</label>
          <input type="file" class="form-control-file" id="image" name="productImage1">
        </div>       
        <div class="form-group col-md-2">
          <label>Product Image 2</label>
          <input type="file" class="form-control-file" id="image" name="productImage2">
        </div>       
        <div class="form-group col-md-2">
          <label>Product Image 3</label>
          <input type="file" class="form-control-file" id="image" name="productImage3">
        </div>       
      </div>
      <div id="variation" class="form-group">
        <label>Variations
          <button type="button" id="add-variant" class="btn btn-primary btn-icon-split">
            <span class="text">Add <i class="fas fa-plus"></i></span>
          </button>
        </label>
      </div>
    </form>
  </div>
  <div id="variant-info" class="card shadow mb-4" style="display:none;">
    <!-- Product Variation Form -->
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Variation Information</h6>
    </div>
    <form class=card-body>
      <div class="form-row mb-2">      
        <div class="form-group  col-md-0">
          <label class="col-form-label">Name</label>
        </div>
        <div class="form-group col-md-4">
          <input type="text" class="form-control" id="variantName" placeholder="Enter Variation Name, eg: color, size, etc:" required>
        </div>
      </div>
      <div id="input-option">
        <div class="form-row mb-2">      
          <div class="form-group  col-md-0">
            <label class="col-form-label">Option</label>
          </div>
          <div  class="form-group col-md-4">
            <input type="text" class="form-control" id="option" placeholder="Enter Option Name, eg: Red, Small, etc:" required>
          </div>
          <div class="form-group col-md-4">
            <button type="button" id="delBtn" class="btn btn-danger delete" disabled style="cursor:not-allowed;"> 
              <span class="text"><i class="fas fa-trash-alt "></i></span>
            </button>
          </div>
        </div>
      </div>
      <button type="button" id="cancel" class="btn btn-light btn-icon-split"> 
        <span class="text">Cancel</span>
      </button>
      <button type="button" id="add-option" class="btn btn-secondary btn-icon-split"> 
        <span class="text">Add Another Option <i class="fas fa-plus"></i></span>
      </button>
      <button type="button" class="btn btn-primary btn-icon-split"> 
        <span class="text">Add Another Variation <i class="fas fa-plus"></i></span>
      </button>
    </form>
  </div>

  <div id="variant-list" class="card shadow mb-4" style="display:none;">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Variation List</h6>
    </div>
    <div class="card-body">
      <form class="card-body" method="post">
        <div class="table-responsive">
          <table class="table table-bordered variation-table" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Variant Name</th>
                <th>Price</th>
                <th>Stock</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Option</td> 
                <td>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">P</span>
                    </div>
                    <input type="text" name="productPrice" class="form-control" aria-label="Amount (to the nearest dollar)" placeholder="Price" required>
                  </div>
                </td> 
                <td>
                  <input type="text" name="productPrice" class="form-control" placeholder="0" required>
                </td> 
              </tr>
            </tbody>
          </table>
        </div>
      </form>
    </div>
  </div> 
  <div class="card shadow mb-4 px-3 py-3">
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
  </div> 
</div>
<!-- end of container-fluid -->
</div>
<!-- End of Main Content -->
<?php require_once "../includes/dashboard_footer.php"; ?>
<script src="./assets/js/variation.js"></script>   
<?php require_once "../includes/dashboard_scripts.php"; ?>
