<?php
require "../PHPMailer/src/PHPMailer.php";
require "../PHPMailer/src/SMTP.php";
require_once "../class/webstoreclass.php";
$user = $store->get_userdata();

$title = "Orders";
include_once "../includes/dashboard_header.php";
$admins = $store->get_admin();
?>
  <body id="page-top">
    <?php
    $store->update_order_status();
    $orders = $store->get_orders();
    $countOrders = $store->count_orders();
    $store->orderStatus_email_notification();
    $pendingOrders = $store->get_pending_orders();
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
            <!-- Order Status Form -->
            <div class="modal fade" id="orderStatusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Order Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form method="post" id="orderStatusForm">
                      <input type="hidden" name="orderID" id="orderID">
                      <input type="hidden" name="customerEmail" id="email">
                      <input type="hidden" name="paymentMethod" id="payment">
                      <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="orderStatus">
                          <option selected disabled>Select Order Status</option>
                          <option value="Processing">Processing</option>
                          <option value="Shipped">Shipped</option>
                          <option value="Delivered">Delivered</option> 
                          <option value="Cancelled" class="addedOpt">Cancelled</option>
                        </select>
                      </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                    <input type="submit" name="updateOrderStatus" class="btn btn-secondary" form="orderStatusForm" value="Update">
                  </div>
                </div>
              </div>
            </div>
            <!-- End of Order Status Form -->
            <!-- Page Heading -->
            <div
              class="d-sm-flex align-items-center justify-content-between mb-4"
            >
              <h1 class="h3 mb-4 text-gray-800">Orders</h1>
            </div>
            <!-- Order Table -->
            <div class="card shadow mb-4 d-print-none">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-gray-800">
                  Order List
                </h6>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table
                    class="table table-bordered text-center table-sm"
                    width="100%"
                    cellspacing="0"
                    data-order='[[ 0, "desc" ]]'
                  >
                    <thead class="bg-gray-600 text-gray-100">
                        <tr>
                          <th>Order #</th>
                          <th>Customer Name</th>
                          <th>Product</th>
                          <th>Order Quantity</th>
                          <th>Order Total</th>
                          <th>Payment Method</th>
                          <th>Payment Status</th>
                          <th>Shipping Method</th>
                          <th>Date Purchased</th>
                          <th>Order Status</th>
                          <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-900">
                      <?php if ($orders) { ?>
                        <?php foreach ($orders as $order) { ?>
                        <tr class="orders" style="display:none;">
                          <td class="align-middle"><?= $order["orderID"] ?></td>
                          <td class="align-middle"><?= $order["firstName"] .
                            " " .
                            $order["lastName"] ?></td>
                          <td class="text-left align-middle">
                            <img src="./assets/img/<?= $order[
                              "coverPhoto"
                            ] ?>" alt="Product Image" style="width:75px;">
                          <?= is_null($order["size"])
                            ? $order["productName"] .
                              " (" .
                              $order["productColor"] .
                              ")"
                            : $order["productName"] .
                              " (" .
                              $order["productColor"] .
                              ", " .
                              $order["size"] .
                              ")" ?>
                          </td>
                          <td class="align-middle"><?= $order[
                            "salesQty"
                          ] ?></td>
                          <td class="align-middle"><span>&#8369;</span> <?= number_format(
                            $order["totalAmount"],
                            2
                          ) ?></td>
                          <td class="align-middle"><?= $order[
                            "paymentMethod"
                          ] ?></td>
                          <td class="align-middle <?php if (
                            $order["paymentStatus"] === "Cancelled"
                          ) { ?>text-danger<?php } elseif (
                            $order["paymentStatus"] === "Pending"
                          ) { ?>text-warning<?php } else { ?>text-success<?php } ?>"><?= $order[
  "paymentStatus"
] ?></td>
                          <td class="align-middle"><?= $order[
                            "shipMethod"
                          ] ?></td>
                          <td class="align-middle"><?= $order[
                            "orderDate"
                          ] ?></td>
                          <td class="align-middle <?php if (
                            $order["orderStatus"] === "Cancelled"
                          ) { ?>
                            text-danger<?php } elseif (
                            $order["orderStatus"] === "Pending"
                          ) { ?> text-warning<?php } elseif (
                            $order["orderStatus"] === "Processing"
                          ) { ?>text-primary<?php } elseif (
                            $order["orderStatus"] === "Shipped"
                          ) { ?>text-info<?php } else { ?>text-success<?php } ?>"><?= $order[
  "orderStatus"
] ?></td>
                          <td class="align-middle">
                            <?php if (
                              !(
                                ($order["orderStatus"] === "Delivered" ||
                                  $order["orderStatus"] === "Cancelled") &&
                                ($order["paymentStatus"] === "Paid" ||
                                  $order["paymentStatus"] === "Cancelled")
                              )
                            ) { ?> 
                            <div class="dropdown no-arrow">
                              <a class="dropdown-toggle btn btn-secondary btn-circle btn-sm href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <i class="fas fa-ellipsis-v fa-sm fa-fw"></i>
                              </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                  <?php if (
                                    $order["orderStatus"] === "Processing"
                                  ) { ?>      
                                    <a class="dropdown-item" target="_blank" href="invoice.php?orderID=<?= $order[
                                      "orderID"
                                    ] ?>&acctID=<?= $order[
  "accountID"
] ?>">Invoice</a>
                                  <?php } ?>  
                                  <?php if (
                                    !(
                                      $order["orderStatus"] === "Delivered" ||
                                      $order["orderStatus"] === "Cancelled"
                                    )
                                  ) { ?> 
                                  <a class="dropdown-item orderStatus" href="" data-toggle="modal" data-target="#orderStatusModal" data-order_id="<?= $order[
                                    "orderID"
                                  ] ?>" data-email="<?= $order[
  "email"
] ?>" data-payment="<?= $order["paymentMethod"] ?>" data-status="<?= $order[
  "orderStatus"
] ?>">Update Order Status</a>
<?php } ?>
                                </div>
                            </div>
                            <?php } ?>
                          </td>
                        </tr>
                        <?php } ?>
                      <?php } ?>
                    </tbody>
                    <tfoot class="bg-gray-600 text-gray-100">
                        <tr>
                          <th>Order #</th>
                          <th>Customer Name</th>
                          <th>Product</th>
                          <th>Order Quantity</th>
                          <th>Order Total</th>
                          <th>Payment Method</th>
                          <th>Payment Status</th>
                          <th>Shipping Method</th>
                          <th>Date Purchased</th>
                          <th>Order Status</th>
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
    <script src="./assets/js/order.js"></script>
    <script>
      $('.orders').slice(0, 10).show();

      $('.load-more').click(function(){
        $('.orders:hidden').slice(0, 10).show();

        if($('.orders:hidden').length == 0){
          $('.load-more').fadeOut();
        }
      });
    </script>
    <script>
      $(".orderStatus").click(function () {
        var orderID = $(this).data("order_id");
        var email = $(this).data("email");
        var payment = $(this).data("payment");
        var status = $(this).data("status");

        $("#orderID").val(orderID);
        $("#email").val(email);
        $("#payment").val(payment);

        if (status === "Processing" || status === "Shipped") {
          $(".addedOpt").attr("disabled", "disabled");
        }
      });
    </script>
  </body>
</html>


