<?php
require_once "../class/webstoreclass.php";
$user = $store->get_userdata();
$title = "Return Orders";
include_once "../includes/dashboard_header.php";
$admins = $store->get_admin();
$countOrders = $store->count_orders();
$pendingOrders = $store->get_pending_orders();
$returnOrders = $store->get_return_orders();
$store->accept_return_orders();
$store->reject_return_orders();
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
            <!-- Modal -->
            <div class="modal fade" id="returnDetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="form-group">
                      <label>Reason</label>
                      <input class="form-control" type="text" id="reason" readonly>
                    </div>
                    <div class="form-group">
                      <label>Comments</label>
                      <input class="form-control" type="text" id="comments" readonly>
                    </div>
                    <div class="form-group">
                      <label>Image</label>
                      <img id="returnImg" class="img-fluid" src="" alt="">
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Return Orders</h1>
            <!-- Supplier Table -->
            <div class="card shadow mb-4 d-print-none">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-gray-800">
                  Return Order List
                </h6>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <form method="post" id="returnAcceptForm">
                    <input type="hidden" name="acceptReturnID" id="acceptReturnID">
                  </form>
                  <form method="post" id="returnRejectForm">
                    <input type="hidden" name="rejectReturnID" id="rejectReturnID">
                  </form>
                  <table
                    class="table table-striped text-center"
                    id="dataTable"
                    width="100%"
                    cellspacing="0"
                    data-order='[[ 0, "desc" ]]'
                  >
                    <thead class="bg-gray-600 text-gray-100">
                        <tr>
                          <th>Order #</th>
                          <th>Customer Name</th>
                          <th>Product</th>
                          <th>Quantity</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-900">
                      <?php if ($returnOrders) { ?>
                        <?php foreach ($returnOrders as $return) { ?>
                        <tr>
                          <td><?= $return["orderID"]
                            ? $return["orderID"]
                            : "<p class='text-danger'>Unknown Order No.</p>" ?></td>
                          <td><?= $return["firstName"] .
                            " " .
                            $return["lastName"] ?></td>
                          <td><?php if (
                            $return["productName"] &&
                            $return["variantName"]
                          ) { ?>
                            <img loading="lazy" src="./assets/img/<?= $return[
                              "variantImage"
                            ] ?>" alt="Product Image" style="width:75px;">
                            <?php if ($return["size"] === null) { ?>
                              <?= $return["productName"] .
                                " (" .
                                $return["variantName"] .
                                ")" ?>
                            <?php } else { ?>
                              <?= $return["productName"] .
                                " (" .
                                $return["variantName"] .
                                ", " .
                                $return["size"] .
                                ")" ?>
                            <?php } ?>
                          <?php } else { ?><p class="text-danger">Unknown Product</p><?php } ?></td>
                          <td><?= $return["qty"] ?></td>
                          <td><p class="
                          <?php if ($return["status"] === "Pending") { ?>
                            text-warning
                          <?php } elseif ($return["status"] === "Accepted") { ?>
                            text-success
                          <?php } else { ?>
                            text-danger
                          <?php } ?>"><?= $return["status"] ?></p></td>
                          <td>
                            <div class="dropdown no-arrow">
                              <a class="dropdown-toggle btn btn-secondary btn-circle btn-sm href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <i class="fas fa-ellipsis-v fa-sm fa-fw"></i>
                              </a>
                              <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">   
                                <a class="dropdown-item view-details" href="#" data-toggle="modal" data-target="#returnDetails" data-reason="<?= $return[
                                  "reason"
                                ] ?>" data-comments="<?= $return[
  "comments"
] ?>" data-return_img="<?= $return["returnImg"] ?>">View Details</a>
                                <?php if ($return["status"] === "Pending") { ?>
                                  <a class=" acceptBtn dropdown-item" data-accept_id="<?= $return[
                                    "ID"
                                  ] ?>">Accept</a>
                                  <a class="rejectBtn dropdown-item" data-reject_id="<?= $return[
                                    "ID"
                                  ] ?>">Reject</a>
                                <?php } ?>
                              </div>
                            </div>  
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
                          <th>Quantity</th>
                          <th>Status</th>
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
      $('.view-details').click(function() {
      var reason = $(this).data('reason');
      var comments = $(this).data('comments');
      var img = $(this).data('return_img');

      var src = "./assets/img/" + img;

      $('#reason').val(reason);
      $('#comments').val(comments);
      $('#returnImg').attr("src", src);
      } );
    </script>
    <script>
      $('.acceptBtn').on('click',function(e){
        e.preventDefault();
        var acceptID = $(this).data('accept_id');
        $('#acceptReturnID').val(acceptID);
        $('#returnAcceptForm').submit();
      });    
    </script>
    <script>
      $('.rejectBtn').on('click',function(e){
        e.preventDefault();
        var rejectID = $(this).data('reject_id');
        
        $('#rejectReturnID').val(rejectID);
        $('#returnRejectForm').submit();
      });
    </script>
  </body>
</html>


