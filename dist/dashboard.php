<?php
require_once "../class/webstoreclass.php";
$user = $store->get_userdata();
$title = "Dashboard";
include_once "../includes/dashboard_header.php";
$admins = $store->get_admin();
$totalSales = $store->get_total_sales_today();
$salesMonth = $store->get_sales_this_month();
$totalIncome = $store->get_total_net_income();
$orders = $store->count_orders();
$countOrders = $store->count_orders();
$pendingOrders = $store->get_pending_orders();
$topSales = $store->get_top_selling_products();
$topCategories = $store->get_top_selling_category();
$products = $store->get_products();
$janSales = $store->get_jan_sales();
$febSales = $store->get_feb_sales();
$marSales = $store->get_mar_sales();
$aprSales = $store->get_apr_sales();
$maySales = $store->get_may_sales();
$junSales = $store->get_jun_sales();
$julSales = $store->get_jul_sales();
$augSales = $store->get_aug_sales();
$sepSales = $store->get_sep_sales();
$octSales = $store->get_oct_sales();
$novSales = $store->get_nov_sales();
$decSales = $store->get_dec_sales();
?>
  <body id="page-top">
    <?php include_once "../includes/preloader.php"; ?>
    <!-- Page Wrapper -->
    <div id="wrapper">
      <?php include_once "../includes/dashboard_sidebar.php"; ?>
      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
          <?php include_once "../includes/dashboard_navbar.php"; ?>
          <!-- Begin Page Content -->
          <!-- print page -->
          <div class="d-none d-print-block">
            <div class="d-sm-flex align-items-center justify-content-between m-4">
              <h1 id="heading" class="m-0 font-weight-bold text-gray-800">Sales Report</h1>
              <img id="img" class="m-4" src="./assets/img/black_logo.png" alt="" width="150px">
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
          <div class="container-fluid">
            <!-- Page Heading -->
            <div
              class="d-sm-flex align-items-center justify-content-between mb-4 d-print-none"
            >
              <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
              
                <button onclick="window.print()" class="btn btn-info btn-sm shadow-sm" type="button">
                  <i class="fas fa-download fa-sm text"></i>
                  Generate Report
                </button>
              
            </div>
            <!-- Content Row -->
            <div class="row">
              <!-- Total Sales Today -->
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div
                          class="
                            text-xs
                            font-weight-bold
                            text-info text-uppercase
                            mb-1
                          "
                        >
                          <?php date_default_timezone_set("Asia/Manila"); ?>
                          <?php $day = date("M d, Y"); ?>
                          Total Sales Today (<?= $day ?>)
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                          <?php if ($totalSales) { ?>
                            <?php foreach ($totalSales as $totalSale) { ?>
                              <?php $totalSalesDay[] =
                                $totalSale["totalAmount"]; ?>
                            <?php } ?>  
                            <span>&#8369;</span> <?= number_format(
                              array_sum($totalSalesDay),
                              2
                            ) ?> 
                          <?php } else { ?>
                            <span>&#8369;</span> <?= number_format(0, 2) ?>
                          <?php } ?>
                        </div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-coins fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Sales This Month -->
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div
                          class="
                            text-xs
                            font-weight-bold
                            text-primary text-uppercase
                            mb-1
                          "
                        >
                          <?php date_default_timezone_set("Asia/Manila"); ?>
                          <?php $month = date("F, Y"); ?>
                          Sales This Month (<?= $month ?>)
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                          <?php if ($salesMonth) { ?>
                            <?php foreach ($salesMonth as $saleMonth) { ?>
                              <?php $totalSalesMonth[] =
                                $saleMonth["totalAmount"]; ?>
                            <?php } ?>  
                            <span>&#8369;</span> <?= number_format(
                              array_sum($totalSalesMonth),
                              2
                            ) ?> 
                          <?php } else { ?>
                            <span>&#8369;</span> <?= number_format(0, 2) ?>
                          <?php } ?>
                        </div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-wallet fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Total Net Income -->
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div
                          class="
                            text-xs
                            font-weight-bold
                            text-success text-uppercase
                            mb-1
                          "
                        >
                          <?php date_default_timezone_set("Asia/Manila"); ?>    
                          <?php $month = date("F, Y"); ?>
                          Total Net Income (<?= $month ?>)
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                          <?php if ($totalIncome) { ?>
                            <?php foreach ($totalIncome as $income) { ?>
                              <?php $product = $store->get_singleproduct(
                                $income["productID"]
                              ); ?>
                              <?php $net =
                                $product["netIncome"] * $income["salesQty"]; ?>
                              <?php $totalNet[] = $net; ?>
                            <?php } ?> 
                            <span>&#8369;</span> <?= number_format(
                              array_sum($totalNet),
                              2
                            ) ?> 
                          <?php } else { ?>
                            <span>&#8369;</span> <?= number_format(0, 2) ?>
                          <?php } ?>    
                        </div>
                      </div>
                      <div class="col-auto">
                        <i
                          class="fas fa-wallet fa-2x text-gray-300"
                        ></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Pending Orders -->
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div
                          class="
                            text-xs
                            font-weight-bold
                            text-warning text-uppercase
                            mb-1
                          "
                        >
                          Pending Orders
                        </div>
                        <div class="row no-gutters align-items-center">
                          <div class="col-auto">
                            <div
                              class="
                                h5
                                mb-0
                                mr-3
                                font-weight-bold
                                text-gray-800
                              "
                            >
                            <?php if ($orders) { ?>
                              <?= $orders ?>
                            <?php } else { ?>
                              0
                            <?php } ?>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-auto">
                        <i
                          class="fas fa-clipboard-list fa-2x text-gray-300"
                        ></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Area Chart -->
            <div class="card shadow mb-4">
              <!-- Card Header - Dropdown -->
              <div
                class="
                  card-header
                  py-3
                  d-flex
                  flex-row
                  align-items-center
                  justify-content-between
                "
              >
                <h6 class="m-0 font-weight-bold text-gray-800">
                  <?php date_default_timezone_set("Asia/Manila"); ?>    
                  <?php $year = date("Y"); ?>
                  Sales Overview (Year <?= $year ?>)
                </h6>
              </div>
              <!-- Card Body -->
              <div class="card-body">
                <div class="chart-area">
                  <canvas id="myAreaChart"></canvas>
                    <?php if ($janSales) { ?>
                      <?php foreach ($janSales as $jan) { ?>
                        <?php $januarySales[] = $jan["totalAmount"]; ?>
                      <?php } ?>
                    <?php } else { ?>
                      <?php $januarySales[] = 0; ?>
                    <?php } ?>
                    <?php if ($febSales) { ?>
                      <?php foreach ($febSales as $feb) { ?>
                        <?php $februarySales[] = $feb["totalAmount"]; ?>
                      <?php } ?>
                    <?php } else { ?>
                      <?php $februarySales[] = 0; ?>
                    <?php } ?>
                    <?php if ($marSales) { ?>
                      <?php foreach ($marSales as $mar) { ?>
                        <?php $marchSales[] = $mar["totalAmount"]; ?>
                      <?php } ?>
                    <?php } else { ?>
                      <?php $marchSales[] = 0; ?>
                    <?php } ?>
                    <?php if ($aprSales) { ?>
                      <?php foreach ($aprSales as $apr) { ?>
                        <?php $aprilSales[] = $apr["totalAmount"]; ?>
                      <?php } ?>
                    <?php } else { ?>
                      <?php $aprilSales[] = 0; ?>
                    <?php } ?>
                    <?php if ($maySales) { ?>
                      <?php foreach ($maySales as $may) { ?>
                        <?php $maySales[] = $may["totalAmount"]; ?>
                      <?php } ?>
                    <?php } else { ?>
                      <?php $maySales[] = 0; ?>
                    <?php } ?>
                    <?php if ($junSales) { ?>
                      <?php foreach ($junSales as $jun) { ?>
                        <?php $juneSales[] = $jun["totalAmount"]; ?>
                      <?php } ?>
                    <?php } else { ?>
                      <?php $juneSales[] = 0; ?>
                    <?php } ?>
                    <?php if ($julSales) { ?>
                      <?php foreach ($julSales as $jul) { ?>
                        <?php $julySales[] = $jul["totalAmount"]; ?>
                      <?php } ?>
                    <?php } else { ?>
                      <?php $julySales[] = 0; ?>
                    <?php } ?>
                    <?php if ($augSales) { ?>
                      <?php foreach ($augSales as $aug) { ?>
                        <?php $augustSales[] = $aug["totalAmount"]; ?>
                      <?php } ?>
                    <?php } else { ?>
                      <?php $augustSales[] = 0; ?>
                    <?php } ?>
                    <?php if ($sepSales) { ?>
                      <?php foreach ($sepSales as $sep) { ?>
                        <?php $septemberSales[] = $sep["totalAmount"]; ?>
                      <?php } ?>
                    <?php } else { ?>
                      <?php $septemberSales[] = 0; ?>
                    <?php } ?>
                    <?php if ($octSales) { ?>
                      <?php foreach ($octSales as $oct) { ?>
                        <?php $octoberSales[] = $oct["totalAmount"]; ?>
                      <?php } ?>
                    <?php } else { ?>
                      <?php $octoberSales[] = 0; ?>
                    <?php } ?>
                    <?php if ($novSales) { ?>
                      <?php foreach ($novSales as $nov) { ?>
                        <?php $novemberSales[] = $nov["totalAmount"]; ?>
                      <?php } ?>
                    <?php } else { ?>
                      <?php $novemberSales[] = 0; ?>
                    <?php } ?>
                    <?php if ($decSales) { ?>
                      <?php foreach ($decSales as $dec) { ?>
                        <?php $decemberSales[] = $dec["totalAmount"]; ?>
                      <?php } ?>
                    <?php } else { ?>
                      <?php $decemberSales[] = 0; ?>
                    <?php } ?>
                  <input type="hidden" id="january" value="<?= array_sum(
                    $januarySales
                  ) ?>"/>
                  <input type="hidden" id="february" value="<?= array_sum(
                    $februarySales
                  ) ?>"/>
                  <input type="hidden" id="march" value="<?= array_sum(
                    $marchSales
                  ) ?>"/>
                  <input type="hidden" id="april" value="<?= array_sum(
                    $aprilSales
                  ) ?>"/>
                  <input type="hidden" id="may" value="<?= array_sum(
                    $maySales
                  ) ?>"/>
                  <input type="hidden" id="june" value="<?= array_sum(
                    $juneSales
                  ) ?>"/>
                  <input type="hidden" id="july" value="<?= array_sum(
                    $julySales
                  ) ?>"/>
                  <input type="hidden" id="august" value="<?= array_sum(
                    $augustSales
                  ) ?>"/>
                  <input type="hidden" id="september" value="<?= array_sum(
                    $septemberSales
                  ) ?>"/>
                  <input type="hidden" id="october" value="<?= array_sum(
                    $octoberSales
                  ) ?>"/>
                  <input type="hidden" id="november" value="<?= array_sum(
                    $novemberSales
                  ) ?>"/>
                  <input type="hidden" id="december" value="<?= array_sum(
                    $decemberSales
                  ) ?>"/>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <!-- top selling products -->
                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <?php $month = date("F, Y"); ?>
                    <h6 class="m-0 font-weight-bold text-gray-800">Top Selling Products as of <?= $month ?></h6>
                  </div>
                  <div class="card-body">
                  <?php if ($topSales) { ?>
                    <div class="table-responsive">
                      <table
                        class="table table-striped text-center"
                        width="100%"
                        cellspacing="0"
                      >
                        <thead class="bg-gray-600 text-gray-100">
                          <tr>
                            <th>#</th>
                            <th>Product Name</th>
                            <th>Total Sales Quantity</th>
                          </tr>
                        </thead>
                        <tbody class="text-gray-900">
                          <?php foreach ($topSales as $top) { ?>
                            <tr>
                              <td><?= $top["productID"] ?></td>
                              <td><?= is_null($top["size"])
                                ? $top["productName"] .
                                  " (" .
                                  $top["productColor"] .
                                  ")"
                                : $top["productName"] .
                                  " (" .
                                  $top["productColor"] .
                                  ", " .
                                  $top["size"] .
                                  ")" ?></td>
                              <td><?= $top["salesQty"] ?></td>
                            </tr>
                          <?php } ?>                         
                        </tbody>
                        <tfoot class="bg-gray-600 text-gray-100">
                          <tr>
                            <th>#</th>
                            <th>Product Name</th>
                            <th>Total Sales Quantity</th>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                    <?php } else { ?>
                      <img class="img-fluid mx-auto d-block mb-4" src="./assets/img/no-data.svg" alt="No Data" width="300px">
                      <h4 class="text-center text-gray-900">No Data Available</h4>
                    <?php } ?>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <!-- Pie Chart -->
                <div class="card shadow mb-4">
                  <!-- Card Header - Dropdown -->
                  <div
                    class="
                      card-header
                      py-3
                      d-flex
                      flex-row
                      align-items-center
                      justify-content-between
                    "
                  >
                    <h6 class="m-0 font-weight-bold text-gray-800">
                      <?php $month = date("F, Y"); ?>
                      Top Selling Categories as of <?= $month ?>
                    </h6>
                  </div>
                  <!-- Card Body -->
                  <div class="card-body">
                  <?php if ($topCategories) { ?>
                    <div class="table-responsive">
                      <table
                        class="table table-striped text-center"
                        width="100%"
                        cellspacing="0"
                      >
                        <thead class="bg-gray-600 text-gray-100">
                          <tr>
                            <th>Category</th>
                            <th>Total Sales Quantity</th>
                          </tr>
                        </thead>
                        <tbody class="text-gray-900">
                          <?php foreach ($topCategories as $topCategory) { ?>
                            <tr>
                              <td><?= $topCategory["categoryName"] ?></td>
                              <td><?= $topCategory["salesQty"] ?></td>
                            </tr>
                          <?php } ?>
                        </tbody>
                        <tfoot class="bg-gray-600 text-gray-100">
                          <tr>
                            <th>Category</th>
                            <th>Total Sales Quantity</th>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                    <?php } else { ?>
                      <img class="img-fluid mx-auto d-block mb-4" src="./assets/img/no-data.svg" alt="No Data" width="300px">
                      <h4 class="text-center text-gray-900">No Data Available</h4>
                    <?php } ?>  
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
    <script src="./assets/js/demo/chart-area-demo.js"></script>
    <script>
      const setDate = new Date();
      const date = setDate.toDateString();
      const time = setDate.toLocaleTimeString();

      document.querySelector('#date').innerHTML = date + ' ' + time;
    </script>
  </body>
</html>