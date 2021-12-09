<?php
require_once "../class/webstoreclass.php";
require "../PHPMailer/src/PHPMailer.php";
require "../PHPMailer/src/SMTP.php";
$user = $store->get_userdata();
$title = "Orders";
include_once "../includes/header.php";
$userProfile = $store->setProfile();
$ID = $_GET["ID"];
$orders = $store->get_order_customer($ID);
?>
  <body>
    <div class="page-container">
      <?php include_once "../includes/navbar.php"; ?>
      <!-- start of order section -->
      <main>
        <section id="profile">
          <div data-sal="zoom-out" data-sal-duration="1200" data-sal-delay="200" data-sal-easing="ease-out-bounce" class="banner">Orders</div>
          <div class="container">
            <div class="profile-wrapper">
              <?php include_once "../includes/profilesummary.php"; ?>
              <div data-sal="zoom-in" data-sal-duration="1200" data-sal-delay="200" data-sal-easing="ease-out-bounce" class="customer-details">
                <?php if ($orders) { ?>
                  <div class="table">
                    <table id="orderTable">
                      <thead>
                        <tr>
                          <th>Order #</th>
                          <th>Date Purchased</th>
                          <th>Status</th>
                          <th>Total</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($orders as $order) { ?>
                          <tr>
                            <td><?= $order["orderID"] ?></td>
                            <td><?= $order["orderDate"] ?></td>
                            <td><p class="status <?php if (
                              $order["orderStatus"] === "Placed"
                            ) { ?>pending<?php } elseif (
                              $order["orderStatus"] === "Processing"
                            ) { ?>processing<?php } elseif (
                              $order["orderStatus"] === "Shipped"
                            ) { ?>shipped<?php } elseif (
                              $order["orderStatus"] === "Cancelled"
                            ) { ?>cancelled<?php } else { ?>success<?php } ?>"><?= $order[
  "orderStatus"
] ?></p></td>
                            <td><p class="total-amount"><span
                            class="iconify peso-sign"
                            data-icon="clarity:peso-line"
                            data-inline="false"
                          ></span><?= number_format(
                            $order["totalAmount"],
                            2
                          ) ?></p></td>
                            <td><button class="btn primary-btn track-btn"><a href="trackorder.php?acctID=<?= $user[
                              "ID"
                            ] ?>&orderID=<?= $order[
  "orderID"
] ?>">Track</a></button></td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                <?php } else { ?>
                  <div class="empty-order">
                    <img src="./assets/img/empty-order.svg" alt="Empty Order">
                    <h4>No Data Available</h4>
                  </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </section>
      </main>
      <!-- end of order section -->
      <?php require_once "../includes/footer.php"; ?>
    </div>
    <?php require_once "../includes/scripts.php"; ?>
    <script src="./assets/js/header.js"></script>
    <script src="./assets/js/user.js"></script>
    <script src="./assets/js/cart.js"></script>
    <script src="./assets/js/avatar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vanilla-datatables@latest/dist/vanilla-dataTables.min.js" type="text/javascript"></script>
    <script>
      const orderTable = document.querySelector('#orderTable');

      if(orderTable){
          var dataTable = new DataTable(orderTable, {
          searchable: false
        });
      }
    </script>
  </body>
</html>
