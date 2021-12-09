<?php
require_once "../class/webstoreclass.php";
$user = $store->get_userdata();
$ID = $_GET["ID"];
$product = $store->get_singleID($ID);
$title = "Financing";
include_once "../includes/dashboard_header.php";
$admins = $store->get_admin();
$materials = $store->get_all_materials();
$countOrders = $store->count_orders();
$pendingOrders = $store->get_pending_orders();
?>
  <body id="page-top">
    <?php include_once "../includes/preloader.php"; ?>
    <?php $store->costing(); ?>
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
                <h1 class="h3 mb-4 text-gray-800">Financing</h1>
                <!-- production cost, sales, and stocks Form -->
                <div class="row">
                  <div class="col-lg-6">
                    <div class="card shadow mb-4">
                      <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-gray-800">Production Cost</h6>
                      </div>
                      <div class="card-body">
                        <form method="post" class="rawForm" id="stocksForm">                    
                          <div class="form-group">
                            <label>Raw Material Use</label>
                            <select class="selectpicker show-tick form-control rawMaterialForm" name="raw" data-live-search="true">
                              <option selected="selected" disabled="disabled">Select Raw Material</option>
                              <?php foreach ($materials as $material) { ?>
                                <option value="<?= $material[
                                  "ID"
                                ] ?>" data-tokens="<?= $material[
  "materialName"
] ?>"
                                <?php
                                $itemUsed = $store->used_materials(
                                  $material["ID"]
                                );
                                $addedInventory = $store->get_added_stock_materials(
                                  $material["ID"]
                                );
                                ?>
                                  <?php if (
                                    is_array($itemUsed) &&
                                    is_array($addedInventory)
                                  ) { ?>
                                    <?php foreach (
                                      $itemUsed
                                      as $index => $value
                                    ) { ?>
                                      <?php if (
                                        $addedInventory[$index]["stockQty"] +
                                          $addedInventory[$index]["addedQty"] -
                                          $itemUsed[$index]["materialQty"] ==
                                        0
                                      ) { ?>
                                        disabled = "disabled"
                                      <?php } else { ?>
                                        data-price="<?= $material[
                                          "unitPrice"
                                        ] ?>" 
                                        data-qty="<?= $addedInventory[$index][
                                          "stockQty"
                                        ] +
                                          $addedInventory[$index]["addedQty"] -
                                          $itemUsed[$index]["materialQty"] ?>"
                                      <?php } ?>  
                                    <?php } ?>  
                                  <?php } elseif (
                                    is_array($addedInventory)
                                  ) { ?> 
                                    <?php foreach (
                                      $addedInventory
                                      as $addedStock
                                    ) { ?>
                                      <?php if (
                                        $addedStock["stockQty"] +
                                          $addedStock["addedQty"] ==
                                        0
                                      ) { ?>
                                          disabled = "disabled"
                                      <?php } else { ?>
                                        data-price="<?= $material[
                                          "unitPrice"
                                        ] ?>" 
                                        data-qty="<?= $addedStock["stockQty"] +
                                          $addedStock["addedQty"] ?>"
                                      <?php } ?>   
                                    <?php } ?>  
                                  <?php } elseif (is_array($itemUsed)) { ?> 
                                    <?php foreach ($itemUsed as $used) { ?>
                                      <?php if (
                                        $material["stockQty"] -
                                          $used["materialQty"] ==
                                        0
                                      ) { ?>
                                        disabled = "disabled"
                                      <?php } else { ?>
                                        data-price="<?= $material[
                                          "unitPrice"
                                        ] ?>" 
                                        data-qty="<?= $material["stockQty"] -
                                          $used["materialQty"] ?>"
                                      <?php } ?>    
                                    <?php } ?>  
                                  <?php } else { ?>
                                    <?php if ($material["stockQty"] == 0) { ?>
                                      disabled = "disabled"
                                    <?php } else { ?>
                                      data-price="<?= $material[
                                        "unitPrice"
                                      ] ?>" 
                                      data-qty="<?= $material["stockQty"] ?>"
                                    <?php } ?> 
                                  <?php } ?>><?= $material[
  "materialName"
] ?></option>
                              <?php } ?>  
                            </select>
                          </div>
                          <hr class="hr" style="display:none;"/>
                          <div class="row labor-fee" style="display:none;">
                            <div class="form-group col-lg-6" >
                              <label>Labor Fee Per Unit</label>
                              <input type="text" name="laborFee" id="laborFee" class="form-control" placeholder="eg: Printing Services, etc:">
                            </div>
                            <div class="form-group col-lg-3 laborFeeQty" style="display:none;">
                              <label>Quantity</label>
                              <input class="form-control" type="number" name="laborFeeQty" id="laborFeeQty" min="0" value="1">
                            </div>
                            <div class="form-group col-lg-3 laborFeeTotalCost" style="display:none;">
                              <label>Total Cost</label>
                              <input type="text" id="laborFeeTotalCost" class="form-control" disabled>
                            </div>
                          </div>
                          <div class="row layout-fee" style="display:none;">
                            <div class="form-group col-lg-6" >
                              <label>Layout Fee Per Unit</label>
                              <input type="text" name="layoutFee" id="layoutFee" class="form-control" placeholder="eg: Design, etc:">
                            </div>
                            <div class="form-group col-lg-3 layoutFeeQty" style="display:none;">
                              <label>Quantity</label>
                              <input class="form-control" type="number" name="layoutFeeQty" id="layoutFeeQty" min="0" value="1">
                            </div>
                            <div class="form-group col-lg-3 layoutFeeTotalCost" style="display:none;">
                              <label>Total Cost</label>
                              <input type="text" id="layoutFeeTotalCost" class="form-control" disabled>
                            </div>
                          </div>
                          <div class="row expense-fee" style="display:none;">
                            <div class="form-group col-lg-6" >
                              <label>Expense Fee Per Unit</label>
                              <input type="text" name="expenseFee" id="expenseFee" class="form-control" placeholder="eg: Logistics, etc:">
                            </div>
                            <div class="form-group col-lg-3 expenseFeeQty" style="display:none;">
                              <label>Quantity</label>
                              <input class="form-control" type="number" name="expenseFeeQty" id="expenseFeeQty" min="0" value="1">
                            </div>
                            <div class="form-group col-lg-3 expenseFeeTotalCost" style="display:none;">
                              <label>Total Cost</label>
                              <input type="text" id="expenseFeeTotalCost" class="form-control" disabled>
                            </div>
                          </div>
                          <hr class="hr" style="display:none;"/>
                          <div class="row total" style="display:none;">
                            <div class="form-group col-lg-6" >
                              <label>Total Cost Per Unit</label>
                              <input type="text" id="costPrice" class="form-control costPriceInput" disabled>
                            </div>
                            <div class="form-group col-lg-6" >
                              <label>Total Cost</label>
                              <input type="text" name="totalCostAmount" id="totalCost" class="form-control" readonly>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="card shadow mb-4">
                      <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-gray-800">Sales / Income Statement</h6>
                      </div>
                      <div class="card-body">
                        <form >
                          <div class="form-group">
                            <label>Sales Amount</label>
                            <input type="text" name="salesAmount" id="sales" class="form-control" placeholder="Sales Amount" form="stocksForm">
                          </div>
                          <div class="form-group">
                            <label>Sales Discount</label>
                            <input type="text" name="salesDiscount" id="salesDisc" class="form-control" placeholder="Sales Discount" form="stocksForm">
                          </div>
                          <div class="form-group">
                            <label>Net Sales</label>
                            <input type="text" name="netSales" id="netSales" class="form-control" form="stocksForm" readonly >
                          </div>
                          <div class="form-group">
                            <label>Production Cost</label>
                            <input type="text" name="productCost" id="cogs" class="form-control" form="stocksForm" readonly>
                          </div>
                          <div class="form-group">
                            <label>Gross Profit</label>
                            <input type="text" name="gross" id="grossProfit" class="form-control" form="stocksForm" readonly>
                          </div>
                          <div class="form-group">
                            <label>Expenses</label>
                            <input type="text" name="expenses" id="expenses" class="form-control" placeholder="eg: Rent, etc:" form="stocksForm">
                          </div>
                          <div class="form-group">
                            <label>Net Income / Loss</label>
                            <input type="text" name="netIncome" id="netIncome" class="form-control" form="stocksForm" readonly>
                            <small id="salesResult" class="form-text text-muted"></small>
                          </div>
                          <input type="hidden" name="productID" value=<?= $product[
                            "ID"
                          ] ?> form="stocksForm">   
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card body mb-4 py-1">
                  <div class="d-flex flex-row-reverse">
                    <div class="p-2">
                      <button type="submit" name="finishProduct" class="btn btn-secondary btn-icon-split" form="stocksForm">
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
    <script src="./assets/js/material.js"></script>
  </body>
</html>
