
<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow d-print-none">
    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
        <!-- Nav Item - Alerts -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <?php if ($countOrders) { ?>
                    <span class="badge badge-danger badge-counter">
                        <?= $countOrders > 3 ? "3+" : $countOrders ?>   
                    </span>
                <?php } ?>
            </a>
            <!-- Dropdown - Alerts -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                    Orders
                </h6>
                <?php if ($pendingOrders) { ?>
                    <?php foreach ($pendingOrders as $pending) { ?>
                        <a class="dropdown-item d-flex align-items-center" href="orders.php">
                            <div class="mr-3">
                                <div class="icon-circle bg-primary">
                                    <i class="fas fa-file-alt text-white"></i>
                                </div>
                            </div>
                            <div>
                                <div class="small text-gray-500"><?= $pending[
                                  "orderDate"
                                ] ?></div>
                                New Order #: <span class="font-weight-bold"><?= $pending[
                                  "orderID"
                                ] ?></span>
                            </div>
                        </a>
                    <?php } ?>
                <?php } else { ?>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <div class="mr-3">
                            <div class="icon-circle bg-warning">
                                <i class="fas fa-calendar-times text-white"></i>
                            </div>
                        </div>
                        <div>
                            No orders yet
                        </div>
                    </a>
                <?php } ?>
                <a class="dropdown-item text-center small text-gray-500" href="orders.php">Show All Orders</a>    
            </div>
        </li>
        <div class="topbar-divider d-none d-sm-block"></div>
        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                    <?= $user["firstName"] . " " . $user["lastName"] ?>
                </span>
                </span class="icon text">
                    <?php if ($admins) { ?>
                        <?php foreach ($admins as $admin) { ?>
                            <?php if (
                              is_null($admin["profileImg"]) ||
                              empty($admin["profileImg"])
                            ) { ?>
                            <img alt="Profile image" class="avatar mx-auto d-block mt-4 mb-4" width="30px" height="30px" style="border-radius:50%;">
                            <?php } else { ?>
                                <img src="./assets/img/<?= $admin[
                                  "profileImg"
                                ] ?>" alt="Profile image" class="mx-auto d-block mt-4 mb-4" width="30px" height="30px" style="object-fit:cover; border-radius:50%;">
                            <?php } ?>
                                <input type="hidden" id="initials" value="<?= strtoupper(
  mb_substr($admin["firstName"], 0, 1)
),
                                  strtoupper(
                                    mb_substr($admin["lastName"], 0, 1)
                                  ) ?>">
                        <?php } ?>
                    <?php } ?>
                </span>
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">
                <a class="dropdown-item" href="admin.php">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                </a>
                <a class="dropdown-item" href="logout.php" >
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>
    </ul>
</nav>
<!-- End of Topbar -->