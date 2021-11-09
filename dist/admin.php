<?php
require_once "../class/webstoreclass.php";
$user = $store->get_userdata();
$title = "Admin - Profile";
include_once "../includes/dashboard_header.php";
$countOrders = $store->count_orders();
$pendingOrders = $store->get_pending_orders();
?>
  <body id="page-top">
    <?php include_once "../includes/preloader.php"; ?>
    <?php
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
            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Profile</h1>
            <div class="row">
              <div class="col-lg-3">
                <div class="card shadow mb-4">
                  <div class="card-body d-flex-column align-self-center">
                    <?php if ($admins) { ?>
                      <?php foreach ($admins as $admin) { ?>
                        <?php if (
                          is_null($admin["profileImg"]) ||
                          empty($admin["profileImg"])
                        ) { ?>
                          <img alt="Profile image" class="avatar mx-auto d-block mt-4 mb-4" style="border-radius:50%;">
                        <?php } else { ?>
                          <img src="./assets/img/<?= $admin[
                            "profileImg"
                          ] ?>" alt="Profile image" class="mx-auto d-block mt-4 mb-4" width="150px" height="150px" style="object-fit:cover; border-radius:50%;">
                        <?php } ?>
                        <input type="hidden" id="initials" value="<?= strtoupper(
  mb_substr($admin["firstName"], 0, 1)
),
                          strtoupper(mb_substr($admin["lastName"], 0, 1)) ?>">
                        <h4 class="font-weight-bold text-gray-900 text-center"><?= $admin[
                          "firstName"
                        ] .
                          " " .
                          $admin["lastName"] ?></h4>
                        <div class="text-center mb-4"><?= $admin[
                          "email"
                        ] ?></div>
                      <?php } ?>
                    <?php } ?>
                    <label class="btn btn-outline-info" for="img" form="adminForm">Change Profile Image</label>
                  </div>
                </div>  
              </div>
              <div class="col-lg-9">
                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-gray-800">Personal Information</h6>
                  </div>
                  <div class="card-body">
                    <form method="post" enctype="multipart/form-data">
                      <input type="file" name="profileImg" id="img" style="display:none;"/>
                      <input type="hidden" name="oldProfileImg" value="<?= $admin[
                        "profileImg"
                      ] ?>">
                      <input type="hidden" name="adminID" value="<?= $admin[
                        "ID"
                      ] ?>">
                      <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="firstName" class="form-control" value="<?= $admin[
                          "firstName"
                        ] ?>">
                      </div>
                      <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="lastName" class="form-control" value="<?= $admin[
                          "lastName"
                        ] ?>">
                      </div>
                      <div class="form-group">
                        <label>Email Address</label>
                        <input type="text" name="email" class="form-control" value="<?= $admin[
                          "email"
                        ] ?>">
                      </div>
                      <div class="form-group">
                        <label>Contact Number</label>
                        <input type="text" name="contactNumber" class="form-control" value="<?= $admin[
                          "contactNumber"
                        ] ?>">
                      </div>
                      <div class="form-group">
                        <label>New Password</label>
                        <input type="password" name="newPass" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" name="confirmPass" class="form-control">
                      </div>
                      <div class="d-flex justify-content-end">
                        <button type="submit" name="updateAdmin" class="btn btn-secondary ">Save Changes</button>
                      </div>
                    </form>      
                  </div>
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
  </body>
</html>


