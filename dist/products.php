<?php
require_once "../class/webstoreclass.php";
$user = $store->get_userdata();
$displayProducts = $store->get_products();
$title = "My Products";
include_once "../includes/dashboard_header.php";
include_once "../includes/dashboard_sidebar.php";
include_once "../includes/dashboard_navbar.php";
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">My Products 
                        <a href="addproduct.php" class="btn btn-primary btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-plus"></i>
                            </span>
                            <span class="text">Add New Product</span>
                        </a>
                    </h1>

                    <!-- Product Lists -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Product Lists</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Product Image</th>
                                            <th>Product Name</th>
                                            <th>Product Description</th>
                                            <th>Product Category</th>
                                            <th>Price</th>
                                            <th>Product Color</th>
                                            <th>Stock</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Product Image</th>
                                            <th>Product Name</th>
                                            <th>Product Description</th>
                                            <th>Product Category</th>
                                            <th>Price</th>
                                            <th>Product Color</th>
                                            <th>Stock</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php foreach (
                                      $displayProducts
                                      as $products
                                    ) { ?>
                                        <tr>
                                            <td><?= '<img src="./assets/img/' .
                                              $products["productImage"] .
                                              '" alt="Product Image" width="150px;" style="object-fit:cover;">' ?></td>
                                            <td><?= $products[
                                              "productName"
                                            ] ?></td>
                                            <td><?= $products[
                                              "productDescription"
                                            ] ?></td>
                                            <td><?= $products[
                                              "categoryName"
                                            ] ?></td>
                                            <td><?= $products[
                                              "productPrice"
                                            ] ?></td>
                                            <td><?= $products[
                                              "productColor"
                                            ] ?></td>
                                            <td><?= $products["stocks"] ?></td>
                                        </tr>    
                                    <?php } ?>                                
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            <?php require_once "../includes/dashboard_footer.php"; ?>
            <?php require_once "../includes/dashboard_scripts.php"; ?>        ?> ?> ?> ?> ?> ?> ?> ?> ?> ?>