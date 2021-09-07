<?php
require_once "../class/webstoreclass.php";
$user = $store->get_userdata();

$title = "Supplier";
include_once "../includes/dashboard_header.php";
include_once "../includes/dashboard_sidebar.php";
include_once "../includes/dashboard_navbar.php";
?>
<div class="modal fade" id="addnewadmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Supplier</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label>Name</label>
            <input type="text" name="firstName" class="form-control">
          </div>
          <div class="form-group">
            <label>Address</label>
            <input type="text" name="lastName" class="form-control">
          </div>
          <div class="form-group">
            <label>Contact Number</label>
            <input type="tel" name="contactNumber" class="form-control">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="registerBtn" class="btn btn-primary">Add</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Supplier
      <button type="button" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#addnewadmin">
          <span class="icon text-white-50">
              <i class="fas fa-plus"></i>
          </span>
          <span class="text">Add New Supplier</span>
      </button>
  </h1>
    <!-- Supplier Lists -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Supplier Lists</h6>
      </div>
        <div class="card-body">
          <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                          <th>Name</th>
                          <th>Address</th>
                          <th>Contact Number</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                  </tbody>
                  <tfoot>
                      <tr>
                        <th>First Name</th>
                        <th>Address</th>
                        <th>Contact Number</th>
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
<?php require_once "../includes/dashboard_scripts.php"; ?>
