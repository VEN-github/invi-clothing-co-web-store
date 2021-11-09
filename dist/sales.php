<?php
require_once "../class/webstoreclass.php";
$user = $store->get_userdata();
$title = "Sales";
include_once "../includes/dashboard_header.php";
$admins = $store->get_admin();
$sales = $store->get_sales();
$countOrders = $store->count_orders();
$pendingOrders = $store->get_pending_orders();
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
          <div class="container-fluid">
            <!-- Page Heading -->
            <div
              class="d-sm-flex align-items-center justify-content-between mb-4 d-print-none"
            >
              <h1 class="h3 mb-4 text-gray-800">Sales</h1>
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
                <h1 id="heading" class="m-0 font-weight-bold text-gray-800">Sales List</h1>
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
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total Sales</th>
                        <th>Total Net Income</th>
                        <th>Date Purchased</th>
                      </tr>
                    </thead>
                    <tbody class="text-gray-900">
                      <?php if ($sales) { ?>
                        <?php foreach ($sales as $sale) { ?>
                          <?php $product = $store->get_singleproduct(
                            $sale["productID"]
                          ); ?>
                          <tr>
                            <td><?= $sale["orderID"] ?></td>
                            <td> <?= is_null($sale["size"])
                              ? $sale["productName"] .
                                " (" .
                                $sale["productColor"] .
                                ")"
                              : $sale["productName"] .
                                " (" .
                                $sale["productColor"] .
                                ", " .
                                $sale["size"] .
                                ")" ?></td>
                            <td><?= $product["netSales"] ?></td>
                            <td><?= $sale["salesQty"] ?></td>
                            <td><?= number_format(
                              $product["netSales"] * $sale["salesQty"],
                              2
                            ) ?>
                            </td>
                            <td><?= number_format(
                              $product["netIncome"] * $sale["salesQty"],
                              2
                            ) ?>
                            </td>
                            <td><?= $sale["orderDate"] ?></td>
                          </tr>
                        <?php } ?>
                      <?php } ?>
                    </tbody>
                    <tfoot class="text-info">
                      <tr>
                        <th>#</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total Sales</th>
                        <th>Total Net Income</th>
                        <th>Date Purchased</th>
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
            <!-- Product Sales Table -->
            <div class="card shadow mb-4 d-print-none">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-gray-800">
                  Sales List
                </h6>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table
                    class="table table-striped text-center"
                    id="dataTable"
                    width="100%"
                    cellspacing="0"
                    data-order='[[ 0, "desc" ]]'
                  >
                    <thead class="bg-gray-600 text-gray-100">
                      <tr>
                        <th>#</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total Sales</th>
                        <th>Total Net Income</th>
                        <th>Date Purchased</th>
                      </tr>
                    </thead>
                    <tbody class="text-gray-900">
                      <?php if ($sales) { ?>
                        <?php foreach ($sales as $sale) { ?>
                          <?php $product = $store->get_singleproduct(
                            $sale["productID"]
                          ); ?>
                          <tr>
                            <td><?= $sale["orderID"] ?></td>
                            <td> <?= is_null($sale["size"])
                              ? $sale["productName"] .
                                " (" .
                                $sale["productColor"] .
                                ")"
                              : $sale["productName"] .
                                " (" .
                                $sale["productColor"] .
                                ", " .
                                $sale["size"] .
                                ")" ?></td>
                            <td><?= $product["netSales"] ?></td>
                            <td><?= $sale["salesQty"] ?></td>
                            <td><span>&#8369;</span> <?= number_format(
                              $product["netSales"] * $sale["salesQty"],
                              2
                            ) ?>
                            </td>
                            <td><span>&#8369;</span> <?= number_format(
                              $product["netIncome"] * $sale["salesQty"],
                              2
                            ) ?>
                            </td>
                            <td><?= $sale["orderDate"] ?></td>
                          </tr>
                        <?php } ?>
                      <?php } ?>
                    </tbody>
                    <tfoot class="bg-gray-600 text-gray-100">
                      <tr>
                        <th>#</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total Sales</th>
                        <th>Total Net Income</th>
                        <th>Date Purchased</th>
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
        doc.save("Sales.pdf");
      }
    </script>
  </body>
</html>