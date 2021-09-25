<?php
require_once "../class/webstoreclass.php";
$user = $store->get_userdata();
$title = "Admin";
include_once "../includes/dashboard_header.php";
?>
  <body id="page-top">
    <?php
    $store->signup_admin();
    $store->update_admin();
    $admins = $store->get_admin();
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
            <!-- Admin Modal Form -->
            <div class="modal fade" id="adminModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add New Admin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form method="post" id="adminForm">
                      <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="firstName" class="form-control" placeholder="First Name">
                      </div>
                      <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="lastName" class="form-control" placeholder="Last Name">
                      </div>
                      <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" name="email" class="form-control" placeholder="Email Address"> 
                      </div>
                      <div class="form-group">
                        <label>Contact Number</label>
                        <input type="tel" name="contactNumber" class="form-control" placeholder="Contact Number">
                      </div>
                      <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                      </div>
                      <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" name="confirmPassword" class="form-control" placeholder="Confirm Password">
                      </div>
                      <input type="hidden" name="access" value="admin">
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="registerBtn" class="btn btn-secondary" form="adminForm">Register</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- End of Modal Form -->
            <!-- Edit Admin Modal Form -->
            <div class="modal fade" id="editAdminModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Supplier</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form method="post" id="updateAdminForm">
                      <input type="hidden" name="adminID" id="adminID" class="form-control">
                      <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="firstName" id="firstName" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="lastName" id="lastName" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" name="email" id="email" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Contact Number</label>
                        <input type="tel" name="contactNumber" id="contactNumber" class="form-control">
                      </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                    <input type="submit" name="updateAdmin" class="btn btn-secondary" form="updateAdminForm" value="Update">
                  </div>
                </div>
              </div>
            </div>
            <!-- End of Edit Admin Modal Form -->
            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Admin
              <button type="button" href="#" class="btn btn-secondary btn-icon-split" data-toggle="modal" data-target="#adminModal">
                  <span class="icon text">
                    <i class="fas fa-plus"></i>
                  </span>
                  <span class="text">Add New Admin</span>
              </button>
            </h1>
            <!-- Admin Table -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-gray-800">
                  Admin List
                </h6>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table
                    class="table table-striped text-center"
                    id="dataTable"
                    width="100%"
                    cellspacing="0"
                  >
                    <thead class="bg-gray-600 text-gray-100">
                        <tr>
                          <th>#</th>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Email Address</th>
                          <th>Contact Number</th>
                          <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-900">
                      <?php if ($admins) { ?>
                        <?php foreach ($admins as $admin) { ?>
                        <tr>
                          <td><?= $admin["ID"] ?></td>
                          <td><?= $admin["firstName"] ?></td>
                          <td><?= $admin["lastName"] ?></td>
                          <td><?= $admin["email"] ?></td>
                          <td><?= $admin["contactNumber"] ?></td>
                          <td>
                            <button type="button" class="editAdmin btn btn-sm btn-secondary btn-circle" href="javascript:;" data-toggle="modal" data-target="#editAdminModal" data-admin_id="<?= $admin[
                              "ID"
                            ] ?>" data-first_name="<?= $admin[
  "firstName"
] ?>" data-last_name="<?= $admin["lastName"] ?>" data-email="<?= $admin[
  "email"
] ?>" data-contact_number="<?= $admin["contactNumber"] ?>">
                              <span class="icon text">
                                <i class="fas fa-edit"></i>
                              </span>
                            </button>                        
                          </td>
                        </tr>
                        <?php } ?>
                      <?php } ?>
                    </tbody>
                    <tfoot class="bg-gray-600 text-gray-100">
                        <tr>
                          <th>#</th>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Email Address</th>
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
        $('.editAdmin').click(function() {
        var adminID = $(this).data('admin_id');
        var firstName = $(this).data('first_name');
        var lastName = $(this).data('last_name');
        var email = $(this).data('email');
        var contactNumber = $(this).data('contact_number');

        $('#adminID').val(adminID);
        $('#firstName').val(firstName);
        $('#lastName').val(lastName);
        $('#email').val(email);
        $('#contactNumber').val(contactNumber);
        } );
    </script>
  </body>
</html>


