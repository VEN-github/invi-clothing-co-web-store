<?php
require_once "../class/webstoreclass.php";
$user = $store->get_userdata();
$title = "Edit Product";
include_once "../includes/dashboard_header.php";
$admins = $store->get_admin();
$countOrders = $store->count_orders();
$pendingOrders = $store->get_pending_orders();
$ID = $_GET["ID"];
$product = $store->get_editproduct($ID);
$costs = $store->view_all_cost($ID);
?>
  <body id="page-top">
  <?php include_once "../includes/preloader.php"; ?>
    <?php
    $categories = $store->get_categories();
    $store->update_product($ID);
    $store->update_costing($ID);
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
                <h1 class="h3 mb-4 text-gray-800">Edit Product</h1>
                <!-- Product Form -->
                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-gray-800">Product Information</h6>
                  </div>
                  <div class="card-body">
                    <form method="post" enctype="multipart/form-data" id="productForm">
                      <input type="hidden" name="hiddenCover" value="<?= $product[
                        "coverPhoto"
                      ] ?>">
                      <input type="hidden" name="hiddenImage1" value="<?= $product[
                        "image1"
                      ] ?>">
                      <input type="hidden" name="hiddenImage2" value="<?= $product[
                        "image2"
                      ] ?>">
                      <input type="hidden" name="hiddenImage3" value="<?= $product[
                        "image3"
                      ] ?>">
                      <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="category" id="category">
                          <?php foreach ($categories as $category) { ?>
                          <option value="<?= $category["ID"] ?>" <?= $product[
  "categoryID"
] == $category["ID"]
  ? 'selected="selected"'
  : "" ?>><?= $category["categoryName"] ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" name="productName" class="form-control" value="<?= $product[
                          "productName"
                        ] ?>">
                      </div>
                      <div class="form-group">
                        <label>Product Description</label>
                        <textarea class="form-control" name="productDescription" rows="3"><?= $product[
                          "productDescription"
                        ] ?></textarea>
                      </div>
                      <div class="row">
                        <div class="col-lg-3">
                          <div class="form-group">
                            <label>Cover Photo</label>
                            <div class="mb-4"><img src="./assets/img/<?= $product[
                              "coverPhoto"
                            ] ?>" alt="<?= $product[
  "coverPhoto"
] ?>" width="100px"></div>
                            <input type="file" name="coverPhoto" class="form-control-file">
                          </div>
                        </div>

                        <div class="col-lg-3">
                          <div class="form-group">
                            <label>Image 1</label>
                            <?php if (empty($product["image1"])) { ?>
                              <input type="file" name="image1" class="form-control-file">
                            <?php } else { ?>
                              <div class="mb-4"><img src="./assets/img/<?= $product[
                                "image1"
                              ] ?>" alt="<?= $product[
  "image1"
] ?>" width="100px"></div>
                              <input type="file" name="image1" class="form-control-file">
                            <?php } ?>    
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="form-group">
                            <label>Image 2</label>
                            <?php if (empty($product["image2"])) { ?>
                              <input type="file" name="image2" class="form-control-file">
                            <?php } else { ?>
                              <div class="mb-4"><img src="./assets/img/<?= $product[
                                "image2"
                              ] ?>" alt="<?= $product[
  "image2"
] ?>" width="100px"></div>
                              <input type="file" name="image2" class="form-control-file">
                            <?php } ?>    
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="form-group">
                            <label>Image 3</label>
                            <?php if (empty($product["image3"])) { ?>
                              <input type="file" name="image3" class="form-control-file">
                            <?php } else { ?>
                              <div class="mb-4"><img src="./assets/img/<?= $product[
                                "image3"
                              ] ?>" alt="<?= $product[
  "image3"
] ?>" width="100px"></div>
                              <input type="file" name="image3" class="form-control-file">
                            <?php } ?>    
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="form-group">
                            <label>Size Guide</label>
                            <?php if (empty($product["sizeGuide"])) { ?>
                              <input type="file" name="sizeGuide" class="form-control-file">
                            <?php } else { ?>
                              <div class="mb-4"><img src="./assets/img/<?= $product[
                                "sizeGuide"
                              ] ?>" alt="<?= $product[
  "sizeGuide"
] ?>" width="100px"></div>
                              <input type="file" name="sizeGuide" class="form-control-file">
                            <?php } ?>    
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <?php if (
                  $product["netSales"] &&
                  $product["netIncome"] &&
                  $product["productCost"]
                ) { ?>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="card shadow mb-4">
                        <div class="card-header py-3">
                          <h6 class="m-0 font-weight-bold text-gray-800">Production Cost</h6>
                        </div>
                        <div class="card-body">                 
                          <?php if ($costs) { ?>
                            <?php foreach ($costs as $cost) { ?>
                              <div class="row">
                                <div class="form-group col-lg-3">
                                  <label>Raw Material</label>
                                  <input type="hidden" name="materialID[]" value="<?= $cost[
                                    "materialID"
                                  ] ?>" form="productForm">
                                  <input class="form-control" value="<?= $cost[
                                    "materialName"
                                  ] ?>" disabled>
                                </div>
                                <div class="form-group col-lg-2">
                                  <label>Unit Price</label>
                                  <input class="form-control" name="unitPrice[]" value="<?= $cost[
                                    "unitPrice"
                                  ] ?>" disabled>
                                </div>
                                <div class="form-group col-lg-2">
                                  <label>Quantity</label>
                                  <input class="form-control" type="number" name="qty[]" max="<?= $cost[
                                    "materialQty"
                                  ] ?>" min="1" value="<?= $cost[
  "materialQty"
] ?>" onchange="computeTotalCost(this)" oninput="computeTotalCost(this)" form="productForm">
                                </div>
                                <div class="form-group col-lg-2">
                                  <label>Total Cost</label>
                                  <input class="form-control" disabled="true" name="totalCost[]" value="<?= $cost[
                                    "unitPrice"
                                  ] * $cost["materialQty"] ?>">
                                </div>
                              </div>
                            <?php } ?>
                          <?php } ?>
                          <hr class="hr"/>
                          <div class="row labor-fee">
                            <div class="form-group col-lg-6" >
                              <label>Labor Fee Per Unit</label>
                              <input type="text" name="laborFee" id="laborFee" class="form-control" value="<?= $cost[
                                "laborFee"
                              ] ?>" form="productForm">
                            </div>
                            <div class="form-group col-lg-3 laborFeeQty">
                              <label>Quantity</label>
                              <input class="form-control" type="number" name="laborFeeQty" id="laborFeeQty" min="0" value="<?= $cost[
                                "laborQty"
                              ] ?>" form="productForm">
                            </div>
                            <div class="form-group col-lg-3 laborFeeTotalCost">
                              <label>Total Cost</label>
                              <input type="text" id="laborFeeTotalCost" class="form-control" value="<?= $cost[
                                "laborFee"
                              ] * $cost["laborQty"] ?>" disabled>
                            </div>
                          </div>
                          <div class="row layout-fee">
                            <div class="form-group col-lg-6" >
                              <label>Layout Fee Per Unit</label>
                              <input type="text" name="layoutFee" id="layoutFee" class="form-control" value="<?= $cost[
                                "layoutFee"
                              ] ?>" form="productForm">
                            </div>
                            <div class="form-group col-lg-3 layoutFeeQty">
                              <label>Quantity</label>
                              <input class="form-control" type="number" name="layoutFeeQty" id="layoutFeeQty" min="0" value="<?= $cost[
                                "layoutQty"
                              ] ?>" form="productForm">
                            </div>
                            <div class="form-group col-lg-3 layoutFeeTotalCost">
                              <label>Total Cost</label>
                              <input type="text" id="layoutFeeTotalCost" class="form-control" value="<?= $cost[
                                "layoutFee"
                              ] * $cost["layoutQty"] ?>" disabled>
                            </div>
                          </div>
                          <div class="row expense-fee">
                            <div class="form-group col-lg-6" >
                              <label>Expense Fee Per Unit</label>
                              <input type="text" name="expenseFee" id="expenseFee" class="form-control" value="<?= $cost[
                                "expenseFee"
                              ] ?>" form="productForm">
                            </div>
                            <div class="form-group col-lg-3 expenseFeeQty">
                              <label>Quantity</label>
                              <input class="form-control" type="number" name="expenseFeeQty" id="expenseFeeQty" min="0" value="<?= $cost[
                                "expenseQty"
                              ] ?>" form="productForm">
                            </div>
                            <div class="form-group col-lg-3 expenseFeeTotalCost">
                              <label>Total Cost</label>
                              <input type="text" id="expenseFeeTotalCost" class="form-control" value="<?= $cost[
                                "expenseFee"
                              ] * $cost["expenseQty"] ?>" disabled>
                            </div>
                          </div>
                          <hr class="hr"/>
                          <div class="row total">
                            <div class="form-group col-lg-6" >
                              <label>Total Cost Per Unit</label>
                              <input type="text" id="costPrice" class="form-control costPriceInput" value="<?= $cost[
                                "productCost"
                              ] ?>" disabled form="productForm">
                            </div>
                            <div class="form-group col-lg-6" >
                              <label>Total Cost</label>
                              <input type="text" name="totalCostAmount" id="totalCost" class="form-control" value="<?= $cost[
                                "totalCost"
                              ] ?>" readonly form="productForm">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="card shadow mb-4">
                        <div class="card-header py-3">
                          <h6 class="m-0 font-weight-bold text-gray-800">Sales / Income Statement</h6>
                        </div>
                        <div class="card-body">
                          <div class="form-group">
                            <label>Sales Amount</label>
                            <input type="text" name="salesAmount" id="sales" class="form-control" value="<?= $cost[
                              "salesAmount"
                            ] ?>" form="productForm">
                          </div>
                          <div class="form-group">
                            <label>Sales Discount</label>
                            <input type="text" name="salesDiscount" id="salesDisc" class="form-control" value="<?= $cost[
                              "salesDiscount"
                            ] ?>" form="productForm">
                          </div>
                          <div class="form-group">
                            <label>Net Sales</label>
                            <input type="text" name="netSales" id="netSales" class="form-control" value="<?= $cost[
                              "netSales"
                            ] ?>" form="productForm" readonly >
                          </div>
                          <div class="form-group">
                            <label>Product Cost</label>
                            <input type="text" name="productCost" id="cogs" class="form-control" value="<?= $cost[
                              "productCost"
                            ] ?>" form="productForm" readonly>
                          </div>
                          <div class="form-group">
                            <label>Gross Profit</label>
                            <input type="text" name="gross" id="grossProfit" class="form-control" value="<?= $cost[
                              "grossProfit"
                            ] ?>" form="productForm" readonly>
                          </div>
                          <div class="form-group">
                            <label>Expenses</label>
                            <input type="text" name="expenses" id="expenses" class="form-control" value="<?= $cost[
                              "expenses"
                            ] ?>" form="productForm">
                          </div>
                          <div class="form-group">
                            <label>Net Income / Loss</label>
                            <input type="text" name="netIncome" id="netIncome" class="form-control" value="<?= $cost[
                              "netIncome"
                            ] ?>" form="productForm" readonly>
                            <small id="salesResult" class="form-text text-muted"></small>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php } ?>
                <div class="card body mb-4 py-1">
                  <div class="d-flex flex-row-reverse">
                    <div class="p-2">
                      <button type="submit" name="updateProduct" id="updateProduct" class="btn btn-secondary btn-icon-split" form="productForm">
                        <span class="text">Save Changes</span>
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
    <script src="./assets/js/material.js"></script>
  </body>
</html>

