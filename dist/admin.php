<?php
require_once('../class/webstoreclass.php');
$userdata = $store->get_userdata();
$store->signup_admin();
$admins = $store->get_admin();
$title = 'Admin';
include_once('../includes/dashboard_header.php');
include_once('../includes/dashboard_sidebar.php');
include_once('../includes/dashboard_navbar.php');

?>
<div class="modal fade" id="addnewadmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Admin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label>First Name</label>
            <input type="text" name="firstName" class="form-control">
          </div>
          <div class="form-group">
            <label>Last Name</label>
            <input type="text" name="lastName" class="form-control">
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control">
          </div>
          <div class="form-group">
            <label>Contact Number</label>
            <input type="tel" name="contactNumber" class="form-control">
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control">
          </div>
          <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" name="confirmPassword" class="form-control">
          </div>
          <div class="form-group">
            <input type="hidden" name="access" class="form-control" value="admin">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="registerBtn" class="btn btn-primary">Register</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Admin Profile
      <button type="button" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#addnewadmin">
          <span class="icon text-white-50">
              <i class="fas fa-plus"></i>
          </span>
          <span class="text">Add New Admin</span>
      </button>
  </h1>
    <!-- Admin Lists -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Admin Lists</h6>
      </div>
        <div class="card-body">
          <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Email Address</th>
                          <th>Contact Number</th>
                      </tr>
                  </thead>
                  <tfoot>
                      <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email Address</th>
                        <th>Contact Number</th>
                      </tr>
                  </tfoot>
                  <tbody>
                  <?php foreach($admins as $admin) { ?>
                    <tr>
                      <td><?= $admin['firstName'];?></td>
                      <td><?= $admin['lastName'];?></td>
                      <td><?= $admin['email'];?></td>
                      <td><?= $admin['contactNumber'];?></td>
                    </tr>
                  <?php } ?>
                  </tbody>
              </table>
          </div>
      </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php require_once '../includes/dashboard_footer.php' ?>
<?php require_once '../includes/dashboard_scripts.php' ?>       