<?php
require_once "../class/webstoreclass.php";
$user = $store->get_userdata();
$title = "Products";
include_once "../includes/dashboard_header.php";
$products = $store->get_products();
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
              class="d-sm-flex align-items-center justify-content-between mb-4 d-print-none"
            >
              <h1 class="h3 mb-4 text-gray-800">Products
                <a type="button" href="addproduct.php" class="btn btn-secondary btn-icon-split" >
                  <span class="icon text">
                    <i class="fas fa-plus"></i>
                  </span>
                  <span class="text">Add New Product</span>
                </a>
              </h1>
              <div class="dropdown no-arrow mb-4">
                <button class="btn btn-info btn-sm shadow-sm dropdown-toggle" type="button"
                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <i class="fas fa-download fa-sm text"></i>
                    Generate Report
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a onclick="window.print()" class="dropdown-item" href="#">Print</a>
                  <a class="dropdown-item" href="javascript:genPDF()">Export to PDF</a>
                </div>
              </div>
            </div>
            <!-- print page -->
            <div class="d-none d-print-block">
              <div class="d-sm-flex align-items-center justify-content-between m-4">
                <h1 id="heading" class="m-0 font-weight-bold text-gray-800">Product List</h1>
                <img id="img" class="m-4" src="./assets/img/black_logo.png" alt="" width="150px">
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table
                    class="table table-striped text-center"
                    width="100%"
                    id="table"
                    cellspacing="0"
                  >
                    <thead class="text-info">
                        <tr>
                          <th>#</th>
                          <th>Category</th>
                          <th>Name</th>
                          <th>Color</th>
                          <th>Net Sales</th>
                          <th>Product Cost</th>
                          <th>Net Income</th>
                          <th>Size</th>
                          <th>Stock Quantity</th>
                          <th>Total Stock Quantity</th>
                          <th>Inventory Status</th>
                          <th>Product Status</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-900">
                    <?php if ($products) { ?>
                        <?php foreach ($products as $product) {
                          $stocks = $store->view_all_stocks($product["ID"]); ?>
                          <tr>
                            <td><?= $product["ID"] ?></td>
                            <td><?= $product["categoryName"] ?></td>
                            <td><?= $product["productName"] ?></td>
                            <td><?= $product["productColor"] ?></td>
                            <td><?= $product["netSales"]
                              ? number_format($product["netSales"], 2)
                              : "-" ?>
                            </td>
                            <td><?= $product["productCost"]
                              ? number_format($product["productCost"], 2)
                              : "-" ?>
                            </td>
                            <td><?= $product["netIncome"]
                              ? number_format($product["netIncome"], 2)
                              : "-" ?>
                            </td>
                            <td>
                              <?php if ($stocks) { ?>
                                <?php foreach ($stocks as $stock) { ?>
                                  <?php if ($stock["size"] === null) { ?>
                                    n/a
                                  <?php } else { ?>
                                    <?= $stock["size"] ?>
                                  <?php } ?>
                                <?php } ?>
                              <?php } else { ?>
                                n/a 
                              <?php } ?>
                            </td>
                            <td>
                              <?php if ($stocks) { ?>
                                <?php foreach ($stocks as $stock) { ?>
                                  <?= $stock["stock"] ?>
                                <?php } ?>
                              <?php } else { ?>
                                0
                              <?php } ?>
                            </td>
                            <td>
                              <?php if ($stocks) { ?>
                                <?php foreach ($stocks as $stock) { ?>
                                  <?= $stock["totalStocks"] ?>
                                <?php } ?>
                              <?php } else { ?>
                                0
                              <?php } ?>
                            </td>
                            <td>
                              <?php if ($stocks) { ?>
                                <?php foreach ($stocks as $stock) { ?>
                                  <?php if ($stock["totalStocks"] <= 0) { ?>
                                    <p class="text-danger">Out of Stock</p>
                                  <?php } elseif (
                                    $stock["totalStocks"] <= 10
                                  ) { ?>
                                    <p class="text-warning">Low Inventory</p> 
                                  <?php } else { ?>
                                    <p class="text-success">On Sale</p> 
                                  <?php } ?>  
                                <?php } ?>
                              <?php } else { ?>
                                <p class="text-muted">Unavailable</p>
                              <?php } ?>
                            </td>
                            <td>  
                              <?php if (
                                $stocks &&
                                $product["netSales"] &&
                                $product["productCost"] &&
                                $product["netIncome"]
                              ) { ?>
                                <p class="text-success">Available</p> 
                              <?php } else { ?>
                                <p class="text-muted">Unavailable</p>
                              <?php } ?>
                            </td>
                          </tr>
                        <?php
                        } ?> 
                      <?php } ?>
                    </tbody>
                    <tfoot class="text-info">
                        <tr>
                          <th>#</th>
                          <th>Category</th>
                          <th>Name</th>
                          <th>Color</th>
                          <th>Net Sales</th>
                          <th>Product Cost</th>
                          <th>Net Income</th>
                          <th>Size</th>
                          <th>Stock Quantity</th>
                          <th>Total Stock Quantity</th>
                          <th>Inventory Status</th>
                          <th>Product Status</th>
                        </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
              <div class="card-body">
                <h6 id="issuedBy" class="m-0 text-gray-800">ISSUED BY: <?= $user[
                  "firstName"
                ] .
                  " " .
                  $user["lastName"] ?></h6>
                <h6 id="issuedDate" class="m-0 text-gray-800">DATE: <span id="date"></span></h6>
              </div>
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
                    class="table table-striped text-center table-sm"
                    id="dataTable"
                    width="100%"
                    cellspacing="0"
                  >
                    <thead class="bg-gray-600 text-gray-100">
                        <tr>
                          <th>#</th>
                          <th>Image</th>
                          <th>Category</th>
                          <th>Name</th>
                          <th>Color</th>
                          <th>Net Sales</th>
                          <th>Product Cost</th>
                          <th>Net Income</th>
                          <th>Size</th>
                          <th>Stock Quantity</th>
                          <th>Total Stock Quantity</th>
                          <th>Inventory Status</th>
                          <th>Product Status</th>
                          <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-900">
                      <?php if ($products) { ?>
                        <?php foreach ($products as $product) {
                          $stocks = $store->view_all_stocks($product["ID"]); ?>
                          <tr>
                            <td><?= $product["ID"] ?></td>
                            <td><img src="./assets/img/<?= $product[
                              "coverPhoto"
                            ] ?>" alt="Product Image" style="width:110px;"></td>
                            <td><?= $product["categoryName"] ?></td>
                            <td><?= $product["productName"] ?></td>
                            <td><?= $product["productColor"] ?></td>
                            <td><?= $product["netSales"]
                              ? "<span>&#8369;</span> " .
                                number_format($product["netSales"], 2)
                              : "-" ?>
                            </td>
                            <td><?= $product["productCost"]
                              ? "<span>&#8369;</span> " .
                                number_format($product["productCost"], 2)
                              : "-" ?>
                            </td>
                            <td><?= $product["netIncome"]
                              ? "<span>&#8369;</span> " .
                                number_format($product["netIncome"], 2)
                              : "-" ?>
                            </td>
                            <td>
                              <?php if ($stocks) { ?>
                                <?php foreach ($stocks as $stock) { ?>
                                  <?php if ($stock["size"] === null) { ?>
                                    n/a
                                  <?php } else { ?>
                                    <?= $stock["size"] ?>
                                  <?php } ?>
                                <?php } ?>
                              <?php } else { ?>
                                n/a 
                              <?php } ?>
                            </td>
                            <td>
                              <?php if ($stocks) { ?>
                                <?php foreach ($stocks as $stock) { ?>
                                  <?= $stock["stock"] ?>
                                <?php } ?>
                              <?php } else { ?>
                                0
                              <?php } ?>
                            </td>
                            <td>
                              <?php if ($stocks) { ?>
                                <?php foreach ($stocks as $stock) { ?>
                                  <?= $stock["totalStocks"] ?>
                                <?php } ?>
                              <?php } else { ?>
                                0
                              <?php } ?>
                            </td>
                            <td>
                              <?php if ($stocks) { ?>
                                <?php foreach ($stocks as $stock) { ?>
                                  <?php if ($stock["totalStocks"] <= 0) { ?>
                                    <p class="text-danger">Out of Stock</p>
                                  <?php } elseif (
                                    $stock["totalStocks"] <= 10
                                  ) { ?>
                                    <p class="text-warning">Low Inventory</p> 
                                  <?php } else { ?>
                                    <p class="text-success">On Sale</p> 
                                  <?php } ?>  
                                <?php } ?>
                              <?php } else { ?>
                                <p class="text-muted">Unavailable</p>
                              <?php } ?>
                            </td>
                            <td>  
                              <?php if (
                                $stocks &&
                                $product["netSales"] &&
                                $product["productCost"] &&
                                $product["netIncome"]
                              ) { ?>
                                <p class="text-success">Available</p> 
                              <?php } else { ?>
                                <p class="text-muted">Unavailable</p>
                              <?php } ?>
                            </td>
                            <td>
                              <div class="dropdown no-arrow">
                                <a class="dropdown-toggle btn btn-secondary btn-circle btn-sm href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw"></i>
                                </a>
                                  <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">   
                                    <?php if (!$stocks) { ?>
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
                        <?php
                        } ?> 
                      <?php } ?>
                    </tbody>
                    <tfoot class="bg-gray-600 text-gray-100">
                        <tr>
                          <th>#</th>
                          <th>Image</th>
                          <th>Category</th>
                          <th>Name</th>
                          <th>Color</th>
                          <th>Net Sales</th>
                          <th>Product Cost</th>
                          <th>Net Income</th>
                          <th>Size</th>
                          <th>Stock Quantity</th>
                          <th>Total Stock Quantity</th>
                          <th>Inventory Status</th>
                          <th>Product Status</th>
                          <th>Action</th>
                        </tr>
                    </tfoot>
                  </table>
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
    <script>
      const setDate = new Date();
      const date = setDate.toDateString();
      const time = setDate.toLocaleTimeString();

      document.querySelector('#date').innerHTML = date + ' ' + time;
    </script>
    <script>
      function genPDF(){
        const heading = document.querySelector('#heading');
        const img = document.querySelector('#img');
        const issuedBy = document.querySelector('#issuedBy');
        const date = document.querySelector('#issuedDate');
        const doc = new jsPDF('p', 'pt', 'letter');
        const elementHandler = {
          '#ignorePDF': function (element, renderer) {
            return true;
          }
        };
        doc.fromHTML(heading,40,60,{
          'width': 522,'elementHandlers': elementHandler
        });
        doc.addImage(img, 'PNG', 420,40,150,90);
        doc.autoTable({html: '#table', margin: { top: 150 }, headStyles: { fillColor: [84, 84, 84]}, footStyles: {fillColor: [84, 84, 84]}, styles: { halign: 'center'}});
        doc.fromHTML(issuedBy,40,650,{
          'width': 522,'elementHandlers': elementHandler
        });
        doc.fromHTML(date,40,670,{
          'width': 522,'elementHandlers': elementHandler
        });
        doc.save("Product List.pdf");
      }
    </script>
  </body>
</html>