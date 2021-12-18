<?php
require_once "../class/webstoreclass.php";
$user = $store->get_userdata();
$ID = $_GET["ID"];
$product = $store->get_singleID($ID);
$variation = $store->get_variation($ID);
$title = "Add Stocks";
include_once "../includes/dashboard_header.php";
$admins = $store->get_admin();
$countOrders = $store->count_orders();
$pendingOrders = $store->get_pending_orders();
?>
  <body id="page-top">
    <?php include_once "../includes/preloader.php"; ?>
    <?php $store->stock_in(); ?>
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
                <h1 class="h3 mb-4 text-gray-800">Add Stocks</h1>
                <!-- production cost, sales, and stocks Form -->
                <div id="stockInfo" class="card shadow mb-4" >
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-gray-800">Stock Information</h6>
                  </div>
                  <div class="card-body">
                    <form>
                      <?php if ($variation) { ?>
                        <?php foreach ($variation as $variant) { ?>
                          <div class="form-group">
                            <label>Variation</label>
                            <input class="form-control"value="<?= $variant[
                              "variantName"
                            ] ?>" readonly>
                          </div>
                          <div class="form-group">
                            <input type="hidden" name="variationID[]" value="<?= $variant[
                              "ID"
                            ] ?>" form="stockForm">
                            <label>Stock</label>
                            <input type="number" class="form-control stocks" name="wholeStock[]" min="0" value="1" form="stockForm">
                          </div>
                          <div class="form-group">
                            <label>Stock Keeping Unit (SKU)</label>
                            <input type="text" class="form-control text-uppercase sku" name="skuNoSize[]" value="<?= str_ireplace(
                              ["a", "e", "i", "o", "u", "-", " "],
                              "",
                              $variant["variantName"]
                            ) ?>-<?= str_ireplace(
  [" "],
  "",
  $product["productName"]
) ?>-" form="stockForm" readonly>
                          </div>
                          <hr>
                        <?php } ?>
                      <?php } ?>
                      <input type="hidden" name="noSize" id="noSize" value="" form="stockForm">
                      <input type="hidden" name="productID" value="<?= $product[
                        "ID"
                      ] ?>" form="stockForm">
                      <div class="form-group">
                        <button type="button" id="addSize" class="btn btn-outline-info">
                          <span class="icon text">
                            <i class="fas fa-plus"></i>
                          </span>
                          <span class="text">Add Size</span>
                        </button>
                      </div>                     
                    </form>
                  </div>
                </div>
                <div id="sizeInfo" class="card shadow mb-4" style="display:none;">
                  <!-- Size Info -->
                  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-gray-800">Stock Information</h6>
                    <div class="dropdown no-arrow">
                      <button type="button" id="close" class="btn btn-sm btn-outline-secondary btn-circle">
                        <span class="icon text">
                          <i class="fas fa-times"></i>
                        </span>
                      </button>
                    </div>
                  </div>         
                  <div class="card-body">
                    <form method="post" id="stockForm">
                      <?php if ($variation) { ?>
                        <?php foreach ($variation as $variant) { ?>
                          <div class="table-responsive">
                            <table
                              class="table table-bordered text-center"
                              width="100%"
                              cellspacing="0"
                            >
                            <thead class="bg-gray-600 text-gray-100">
                              <tr>
                                <th>Variation</th>
                                <th>Size</th>
                                <th>Stock Quantity</th>
                                <th>Stock Keeping Unit (SKU)</th>
                              </tr>
                            </thead>
                            <tbody class="text-gray-900">
                              <tr>
                                <td><input type="hidden" name="variantID[]" value="<?= $variant[
                                  "ID"
                                ] ?>" readonly><input class="form-control"value="<?= $variant[
  "variantName"
] ?>" readonly></td>
                                <td><input class="form-control" name="size[]" value="XS" readonly></td>
                                <td><input type="number" class="form-control stocks" name="stocks[]" min="0" value="1"></td>
                                <td><input type="text" class="form-control text-uppercase sku" name="sku[]" id="xs" value="<?= str_ireplace(
                                  ["a", "e", "i", "o", "u", "-", " "],
                                  "",
                                  $variant["variantName"]
                                ) ?>-<?= str_ireplace(
  [" "],
  "",
  $product["productName"]
) ?>-XS-" readonly></td>
                              </tr>
                              <tr>
                                <td><input type="hidden" name="variantID[]" value="<?= $variant[
                                  "ID"
                                ] ?>" readonly><input class="form-control"value="<?= $variant[
  "variantName"
] ?>" readonly></td>
                                <td><input class="form-control" name="size[]" value="S" readonly></td>
                                <td><input type="number" class="form-control stocks" name="stocks[]" min="0" value="1"></td>
                                <td><input type="text" class="form-control text-uppercase sku" name="sku[]" id="s" value="<?= str_ireplace(
                                  ["a", "e", "i", "o", "u", "-", " "],
                                  "",
                                  $variant["variantName"]
                                ) ?>-<?= str_ireplace(
  [" "],
  "",
  $product["productName"]
) ?>-S-" readonly></td>
                              </tr>
                              <tr>
                                <td><input type="hidden" name="variantID[]" value="<?= $variant[
                                  "ID"
                                ] ?>" readonly><input class="form-control"value="<?= $variant[
  "variantName"
] ?>" readonly></td>
                                <td><input class="form-control" name="size[]" value="M" readonly></td>
                                <td><input type="number" class="form-control stocks" name="stocks[]" min="0" value="1"></td>
                                <td><input type="text" class="form-control text-uppercase sku" name="sku[]" id="m" value="<?= str_ireplace(
                                  ["a", "e", "i", "o", "u", "-", " "],
                                  "",
                                  $variant["variantName"]
                                ) ?>-<?= str_ireplace(
  [" "],
  "",
  $product["productName"]
) ?>-M-" readonly></td>
                              </tr>
                              <tr>
                                <td><input type="hidden" name="variantID[]" value="<?= $variant[
                                  "ID"
                                ] ?>" readonly><input class="form-control"value="<?= $variant[
  "variantName"
] ?>" readonly></td>
                                <td><input class="form-control" name="size[]" value="L" readonly></td>
                                <td><input type="number" class="form-control stocks" name="stocks[]" min="0" value="1"></td>
                                <td><input type="text" class="form-control text-uppercase sku" name="sku[]" id="l" value="<?= str_ireplace(
                                  ["a", "e", "i", "o", "u", "-", " "],
                                  "",
                                  $variant["variantName"]
                                ) ?>-<?= str_ireplace(
  [" "],
  "",
  $product["productName"]
) ?>-L-" readonly></td>
                              </tr>
                              <tr>
                                <td><input type="hidden" name="variantID[]" value="<?= $variant[
                                  "ID"
                                ] ?>" readonly><input class="form-control"value="<?= $variant[
  "variantName"
] ?>" readonly></td>
                                <td><input class="form-control" name="size[]" value="XL" readonly></td>
                                <td><input type="number" class="form-control stocks" name="stocks[]" min="0" value="1"></td>
                                <td><input type="text" class="form-control text-uppercase sku" name="sku[]" id="xl" value="<?= str_ireplace(
                                  ["a", "e", "i", "o", "u", "-", " "],
                                  "",
                                  $variant["variantName"]
                                ) ?>-<?= str_ireplace(
  [" "],
  "",
  $product["productName"]
) ?>-XL-" readonly></td>
                              </tr>
                              <tr>
                                <td><input type="hidden" name="variantID[]" value="<?= $variant[
                                  "ID"
                                ] ?>" readonly><input class="form-control"value="<?= $variant[
  "variantName"
] ?>" readonly></td>
                                <td><input class="form-control" name="size[]" value="2XL" readonly></td>
                                <td><input type="number" class="form-control stocks" name="stocks[]" min="0" value="1"></td>
                                <td><input type="text" class="form-control text-uppercase sku" name="sku[]" id="xxl" value="<?= str_ireplace(
                                  ["a", "e", "i", "o", "u", "-", " "],
                                  "",
                                  $variant["variantName"]
                                ) ?>-<?= str_ireplace(
  [" "],
  "",
  $product["productName"]
) ?>-2XL-" readonly></td>
                              </tr>
                              <tr>
                                <td><input type="hidden" name="variantID[]" value="<?= $variant[
                                  "ID"
                                ] ?>" readonly><input class="form-control"value="<?= $variant[
  "variantName"
] ?>" readonly></td>
                                <td><input class="form-control" name="size[]" value="3XL" readonly></td>
                                <td><input type="number" class="form-control stocks" name="stocks[]" min="0" value="1"></td>
                                <td><input type="text" class="form-control text-uppercase sku" name="sku[]" id="xxxl" value="<?= str_ireplace(
                                  ["a", "e", "i", "o", "u", "-", " "],
                                  "",
                                  $variant["variantName"]
                                ) ?>-<?= str_ireplace(
  [" "],
  "",
  $product["productName"]
) ?>-3XL-" readonly></td>
                              </tr>
                            </tbody>
                            <tfoot class="bg-gray-600 text-gray-100">
                              <tr>
                                <th>Variation</th>
                                <th>Size</th>
                                <th>Stock Quantity</th>
                                <th>Stock Keeping Unit (SKU)</th>
                              </tr>
                            </tfoot>
                          </table>
                          </div>
                        <?php } ?>
                      <?php } ?>
                    </form>
                  </div>
                </div>
                <div class="card body mb-4 py-1">
                  <div class="d-flex flex-row-reverse">
                    <div class="p-2">
                      <button type="submit" name="addStock" class="btn btn-secondary btn-icon-split" form="stockForm">
                        <span class="text">Add</span>
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
    <script src="./assets/js/stock.js"></script>
  </body>
</html>
