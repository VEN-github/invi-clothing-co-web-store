<?php
require_once "../class/webstoreclass.php";
$user = $store->get_userdata();
$title = "Products";
include_once "../includes/dashboard_header.php";
$products = $store->get_products();
$countOrders = $store->count_orders();
$pendingOrders = $store->get_pending_orders();
?>
  <body id="page-top">
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
            <div
              class="d-sm-flex align-items-center justify-content-between mb-4"
            >
              <h1 class="h3 mb-4 text-gray-800">Products
                <a type="button" href="addproduct.php" class="btn btn-secondary btn-icon-split" >
                  <span class="icon text">
                    <i class="fas fa-plus"></i>
                  </span>
                  <span class="text">Add New Product</span>
                </a>
              </h1>
            </div>
            <!-- Product Table -->
            <div class="card shadow mb-4 d-print-none">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-gray-800">
                  Product List
                </h6>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table
                    class="table table-bordered text-center table-sm"    
                    width="100%"
                    cellspacing="0"
                    id="table"
                    data-order='[[ 0, "desc" ]]'
                  >
                    <thead class="bg-gray-600 text-gray-100">
                        <tr>
                          <th>#</th>
                          <th>Product</th>
                          <th>Category</th>
                          <th>Net Sales</th>
                          <th>Product Cost</th>
                          <th>Net Income</th>
                          <th>Total Stock Quantity</th>
                          <th>No. of Sold</th>
                          <th>On Hand Stock</th>
                          <th>Inventory Status</th>
                          <th>Product Status</th>
                          <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-900">
                      <?php if ($products) { ?>
                        <?php foreach ($products as $product) { ?>
                          <?php
                          $stocks = $store->view_all_stocks($product["ID"]);
                          $sumStocks = $store->sum_stocks($product["ID"]);
                          ?>
                          <?php if ($stocks) { ?>
                            <?php foreach ($stocks as $stock) { ?>
                              <?php $soldProducts = $store->sold_products(
                                $product["ID"],
                                $stock["ID"]
                              ); ?>
                              <?php $addedInventory = $store->get_added_stock_products(
                                $product["ID"],
                                $stock["ID"]
                              ); ?>
                              <tr class="products" style="display:none;">
                                <td class="align-middle"><?= $product[
                                  "ID"
                                ] ?></td>
                                <td class="align-middle">
                                  <img src="./assets/img/<?= $product[
                                    "coverPhoto"
                                  ] ?>" alt="Product Image" style="width:120px;">
                                  <p><?= $product[
                                    "productName"
                                  ] ?> <span>(<?= $product[
   "productColor"
 ] ?>)</span>
                                  </p>
                                </td>
                                <td class="align-middle"><?= $product[
                                  "categoryName"
                                ] ?></td>
                                <td class="align-middle"><?= $product[
                                  "netSales"
                                ]
                                  ? "<span>&#8369;</span> " .
                                    number_format($product["netSales"], 2)
                                  : "-" ?>
                                </td>
                                <td class="align-middle"><?= $product[
                                  "productCost"
                                ]
                                  ? "<span>&#8369;</span> " .
                                    number_format($product["productCost"], 2)
                                  : "-" ?>
                                </td>
                                <td class="align-middle"><?= $product[
                                  "netIncome"
                                ]
                                  ? "<span>&#8369;</span> " .
                                    number_format($product["netIncome"], 2)
                                  : "-" ?>
                                </td>
                                <td class="align-middle">
                                  <?php if (
                                    $stock["size"] ||
                                    $stock["stock"]
                                  ) { ?>
                                    <?php if ($stock["size"] === null) { ?>
                                      <?php if (is_array($addedInventory)) { ?>
                                        <?php foreach (
                                          $addedInventory
                                          as $addedStock
                                        ) { ?>
                                            <?= $addedStock["stock"] +
                                              $addedStock["addedQty"] ?>
                                          <?php } ?>
                                        <?php } else { ?>
                                          <?= $stock["stock"] ?>
                                        <?php } ?>  
                                      <?php } else { ?>
                                        <?php if (
                                          is_array($addedInventory)
                                        ) { ?>
                                          <?php foreach (
                                            $addedInventory
                                            as $addedStock
                                          ) { ?>
                                        <p><?= $stock["size"] .
                                          " - " .
                                          $addedStock["stock"] +
                                          $addedStock["addedQty"] ?></p>
                                          <?php } ?>
                                        <?php } else { ?>
                                          <p><?= $stock["size"] .
                                            " - " .
                                            $stock["stock"] ?></p>
                                        <?php } ?>
                                      <?php } ?>
                                    <?php } else { ?>
                                    -
                                  <?php } ?>
                                </td>
                                <td class="align-middle">
                                  <?php if (is_array($soldProducts)) { ?>
                                    <?php foreach ($soldProducts as $sold) { ?>
                                      <?= $sold["salesQty"] ?>
                                    <?php } ?>
                                  <?php } else { ?>
                                    -
                                  <?php } ?>    
                                </td>
                                <td class="align-middle">
                                  <?php if (
                                    $stock["stock"] ||
                                    $stock["size"]
                                  ) { ?>
                                    <?php if (
                                      is_array($soldProducts) &&
                                      is_array($addedInventory)
                                    ) { ?>
                                      <?php foreach (
                                        $soldProducts
                                        as $index => $value
                                      ) { ?>
                                      <?= $addedInventory[$index]["stock"] +
                                        $addedInventory[$index]["addedQty"] -
                                        $soldProducts[$index]["salesQty"] ?>
                                      <?php } ?>
                                    <?php } elseif (
                                      is_array($addedInventory)
                                    ) { ?> 
                                      <?php foreach (
                                        $addedInventory
                                        as $addedStock
                                      ) { ?>
                                        <?= $addedStock["stock"] +
                                          $addedStock["addedQty"] ?>
                                      <?php } ?> 
                                    <?php } elseif (
                                      is_array($soldProducts)
                                    ) { ?> 
                                      <?php foreach (
                                        $soldProducts
                                        as $sold
                                      ) { ?>
                                        <?= $stock["stock"] -
                                          $sold["salesQty"] ?>
                                      <?php } ?>    
                                    <?php } else { ?>
                                      <?= $stock["stock"] ?> 
                                    <?php } ?>
                                  <?php } else { ?>
                                    -
                                  <?php } ?>
                                </td>
                                <td class="align-middle">
                                  <?php if (
                                    $stock["stock"] ||
                                    $stock["size"]
                                  ) { ?>
                                    <?php if (
                                      is_array($soldProducts) &&
                                      is_array($addedInventory)
                                    ) { ?>
                                      <?php foreach (
                                        $soldProducts
                                        as $index => $value
                                      ) { ?>
                                      <?php if (
                                        $addedInventory[$index]["stock"] +
                                          $addedInventory[$index]["addedQty"] -
                                          $soldProducts[$index]["salesQty"] <=
                                        0
                                      ) { ?>
                                          <?= '<p class="text-danger">Out Of Stock</p>' ?>
                                      <?php } elseif (
                                        $addedInventory[$index]["stock"] +
                                          $addedInventory[$index]["addedQty"] -
                                          $soldProducts[$index]["salesQty"] <=
                                        10
                                      ) { ?>
                                          <?= '<p class="text-warning">Low Inventory</p>' ?>
                                        <?php } else { ?>
                                          <?= '<p class="text-success">On Sale</p>' ?>
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
                                          $addedStock["stock"] +
                                            $addedStock["addedQty"] <=
                                          0
                                        ) { ?>
                                          <?= '<p class="text-danger">Out Of Stock</p>' ?>
                                        <?php } elseif (
                                          $addedStock["stock"] +
                                            $addedStock["addedQty"] <=
                                          10
                                        ) { ?>
                                          <?= '<p class="text-warning">Low Inventory</p>' ?>
                                        <?php } else { ?> 
                                          <?= '<p class="text-success">On Sale</p>' ?>
                                        <?php } ?>
                                      <?php } ?>
                                    <?php } elseif (
                                      is_array($soldProducts)
                                    ) { ?>
                                      <?php foreach (
                                        $soldProducts
                                        as $sold
                                      ) { ?>
                                        <?php if (
                                          $stock["stock"] - $sold["salesQty"] <=
                                          0
                                        ) { ?>
                                          <?= '<p class="text-danger">Out Of Stock</p>' ?>
                                        <?php } elseif (
                                          $stock["stock"] - $sold["salesQty"] <=
                                          10
                                        ) { ?> 
                                          <?= '<p class="text-warning">Low Inventory</p>' ?>
                                        <?php } else { ?> 
                                          <?= '<p class="text-success">On Sale</p>' ?>
                                        <?php } ?>
                                      <?php } ?>
                                    <?php } else { ?>
                                      <?php if ($stock["stock"] <= 0) { ?>
                                        <?= '<p class="text-danger">Out Of Stock</p>' ?>
                                      <?php } elseif (
                                        $stock["stock"] <= 10
                                      ) { ?>  
                                        <?= '<p class="text-warning">Low Inventory</p>' ?>
                                      <?php } else { ?>
                                        <?= '<p class="text-success">On Sale</p>' ?>
                                      <?php } ?>  
                                    <?php } ?>   
                                  <?php } else { ?>
                                    <p class="text-muted">Unavailable</p>
                                  <?php } ?>
                                </td>
                                <td class="align-middle">  
                                  <?php if (
                                    $stock["stock"] &&
                                    $product["netSales"] &&
                                    $product["productCost"] &&
                                    $product["netIncome"]
                                  ) { ?>
                                    <p class="text-success">Available</p> 
                                  <?php } else { ?>
                                    <p class="text-muted">Unavailable</p>
                                  <?php } ?>
                                </td>
                                <td class="align-middle">
                                  <div class="dropdown no-arrow">
                                    <a class="dropdown-toggle btn btn-secondary btn-circle btn-sm href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v fa-sm fa-fw"></i>
                                    </a>
                                      <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">   
                                        <?php if (
                                          !($stock["size"] || $stock["stock"])
                                        ) { ?>
                                          <a class="dropdown-item" href="addstocks.php?ID=<?= $product[
                                            "ID"
                                          ] ?>">Stock In</a>  
                                        <?php } ?>
                                        <?php if (
                                          !(
                                            $product["netSales"] &&
                                            $product["productCost"] &&
                                            $product["netIncome"]
                                          )
                                        ) { ?>                
                                        <a class="dropdown-item" href="costing.php?ID=<?= $product[
                                          "ID"
                                        ] ?>">Financing</a>
                                        <?php } ?>
                                        <a class="dropdown-item" href="#">Edit</a>
                                      </div>
                                  </div>
                                </td>
                              </tr>
                            <?php } ?> 
                          <?php } ?> 
                        <?php } ?> 
                      <?php } ?>
                    </tbody>
                    <tfoot class="bg-gray-600 text-gray-100">
                        <tr>
                          <th>#</th>
                          <th>Product</th>
                          <th>Category</th>
                          <th>Net Sales</th>
                          <th>Product Cost</th>
                          <th>Net Income</th>
                          <th>Total Stock Quantity</th>
                          <th>No. of Sold</th>
                          <th>On Hand Stock</th>
                          <th>Inventory Status</th>
                          <th>Product Status</th>
                          <th>Action</th>
                        </tr>
                    </tfoot>
                  </table>
                </div>
                <div class="mt-4 col text-center">
                  <button class="btn btn-secondary load-more">Load more</button>
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
    <script src="./assets/js/products.js"></script>
    <script>
      $('.products').slice(0, 10).show();

      $('.load-more').click(function(){
        $('.products:hidden').slice(0, 10).show();

        if($('.products:hidden').length == 0){
          $('.load-more').fadeOut();
        }
      });
    </script>
  </body>
</html>