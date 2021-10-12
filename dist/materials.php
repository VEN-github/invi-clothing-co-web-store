<?php
require "../PHPMailer/src/PHPMailer.php";
require "../PHPMailer/src/SMTP.php";
require_once "../class/webstoreclass.php";
$user = $store->get_userdata();
$suppliers = $store->get_all_supplier();
$title = "Raw Materials";
include_once "../includes/dashboard_header.php";
?>
  <body id="page-top">
    <?php
    $store->add_material();
    $store->update_material();
    $materials = $store->get_all_materials();
    $store->contact_supplier();
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
            <!-- Materials Modal Form -->
            <div class="modal fade" id="materialsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add New Material</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form method="post" id="materialsForm">
                      <div class="form-group">
                        <label>Material Name</label>
                        <input type="text" name="materialName" class="form-control" placeholder="Material Name">
                      </div>
                      <div class="form-group">
                        <label>Unit Price</label>
                        <input type="text" name="unitPrice" class="form-control" placeholder="Unit Price"> 
                      </div>
                      <div class="form-group">
                        <label>Stock Quantity</label>
                        <input type="number" name="stockQty" class="form-control" min="1" placeholder="1">
                      </div>
                      <div class="form-group">
                        <label>Supplier</label>
                        <select class="selectpicker show-tick form-control" name="supplierID" data-live-search="true">
                          <option selected disabled>Select Supplier</option>
                          <?php foreach ($suppliers as $supplier) { ?>
                          <option value="<?= $supplier[
                            "ID"
                          ] ?>" data-tokens="<?= $supplier[
  "supplierName"
] ?>"><?= $supplier["supplierName"] ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="addMaterials" class="btn btn-secondary" form="materialsForm">Add</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- End of Modal Form -->
            <!-- Edit Materials Modal Form -->
            <div class="modal fade" id="editMaterialModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Materials</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form method="post" id="updateMaterialForm">
                      <input type="hidden" name="materialID" id="materialID" class="form-control">
                      <div class="form-group">
                        <label>Material Name</label>
                        <input type="text" name="materialName" id="materialName" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Unit Price</label>
                        <input type="text" name="unitPrice" id="unitPrice" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Stock Qty</label>
                        <input type="number" name="stockQty" id="stockQty" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Supplier</label>
                        <select class="form-control" name="supplierID" id="supplierID">
                          <?php foreach ($suppliers as $supplier) { ?>
                          <option value="<?= $supplier["ID"] ?>"><?= $supplier[
  "supplierName"
] ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                    <input type="submit" name="updateMaterial" class="btn btn-secondary" form="updateMaterialForm" value="Update">
                  </div>
                </div>
              </div>
            </div>
            <!-- End of Edit Materials Modal Form -->
            <!-- Supplier Contact Modal Form -->
            <div class="modal fade" id="supplierContactModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Contact Supplier</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form method="post" id="supplierContactForm">
                      <div class="form-group">
                        <label>Recipient</label>
                        <input type="text" name="supplierEmail" id="supplierEmailAdd" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Message</label>
                        <textarea class="form-control" name="message" id="msg"></textarea>
                      </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                    <input type="submit" name="contactSupplier" class="btn btn-secondary" form="supplierContactForm" value="Send Message">
                  </div>
                </div>
              </div>
            </div>
            <!-- Supplier Contact Modal Form -->
            <!-- Page Heading -->
            <div
              class="d-sm-flex align-items-center justify-content-between mb-4 d-print-none"
            >
              <h1 class="h3 mb-4 text-gray-800">Raw Materials
                <button type="button" href="#" class="btn btn-secondary btn-icon-split" data-toggle="modal" data-target="#materialsModal">
                    <span class="icon text">
                      <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Add New Raw Material</span>
                </button>
              </h1>
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
                <h1 id="heading" class="m-0 font-weight-bold text-gray-800">Raw Material List</h1>
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
                          <th>Raw Material</th>
                          <th>Unit Price</th>
                          <th>Total Stock Quantity</th>
                          <th>Total Price</th>
                          <th>Item Used</th>
                          <th>On Hand Stock</th>
                          <th>Supplier</th>
                          <th>Inventory Status</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-900">
                      <?php if ($materials) { ?>
                        <?php foreach ($materials as $material) { ?>
                          <tr>
                            <td><?= $material["ID"] ?></td>
                            <td><?= $material["materialName"] ?></td>
                            <td>
                              <?= $material["unitPrice"]
                                ? number_format($material["unitPrice"], 2)
                                : "" ?>
                            </td>
                            <td>
                              <?php $addedInventory = $store->get_added_stock_materials(
                                $material["ID"]
                              ); ?>
                              <?php if (is_array($addedInventory)) { ?>
                                <?php foreach (
                                  $addedInventory
                                  as $addedStock
                                ) { ?>
                                  <?= $addedStock["stockQty"] +
                                    $addedStock["addedQty"] ?>
                                <?php } ?>  
                              <?php } else { ?> 
                                <?= $material["stockQty"] ?>
                              <?php } ?>                             
                            </td>
                            <td>
                            <?php $addedInventory = $store->get_added_stock_materials(
                              $material["ID"]
                            ); ?>
                              <?php if (is_array($addedInventory)) { ?>
                                <?php foreach (
                                  $addedInventory
                                  as $addedStock
                                ) { ?>
                                  <?= number_format(
                                    ($addedStock["stockQty"] +
                                      $addedStock["addedQty"]) *
                                      $material["unitPrice"],
                                    2
                                  ) ?>
                                <?php } ?> 
                              <?php } else { ?>
                                <?= $material["unitPrice"]
                                  ? number_format(
                                    $material["stockQty"] *
                                      $material["unitPrice"],
                                    2
                                  )
                                  : "" ?>
                              <?php } ?>
                            </td>
                            <td>
                              <?php $itemUsed = $store->used_materials(
                                $material["ID"]
                              ); ?>
                              <?php if (is_array($itemUsed)) { ?>
                                <?php foreach ($itemUsed as $used) { ?>
                                  <?= $used["materialQty"] ?>
                                <?php } ?>  
                              <?php } else { ?>  
                                <?= "-" ?>
                              <?php } ?> 
                            </td>
                            <td>
                              <?php
                              $itemUsed = $store->used_materials(
                                $material["ID"]
                              );
                              $addedInventory = $store->get_added_stock_materials(
                                $material["ID"]
                              );
                              ?>
                              <?php if (
                                is_array($itemUsed) &&
                                is_array($addedInventory)
                              ) { ?>
                                <?php foreach (
                                  $itemUsed
                                  as $index => $value
                                ) { ?>
                                  <?= $addedInventory[$index]["stockQty"] +
                                    $addedInventory[$index]["addedQty"] -
                                    $itemUsed[$index]["materialQty"] ?>
                                <?php } ?>  
                              <?php } elseif (is_array($addedInventory)) { ?> 
                                <?php foreach (
                                  $addedInventory
                                  as $addedStock
                                ) { ?>
                                  <?= $addedStock["stockQty"] +
                                    $addedStock["addedQty"] ?>
                                <?php } ?>  
                              <?php } elseif (is_array($itemUsed)) { ?> 
                                <?php foreach ($itemUsed as $used) { ?>
                                  <?= $material["stockQty"] -
                                    $used["materialQty"] ?>
                                <?php } ?>  
                              <?php } else { ?>
                                <?= $material["stockQty"] ?>
                              <?php } ?>
                            </td>
                            <td><?= $material["supplierName"] ?></td>
                            <td>
                              <?php
                              $itemUsed = $store->used_materials(
                                $material["ID"]
                              );
                              $addedInventory = $store->get_added_stock_materials(
                                $material["ID"]
                              );
                              ?>
                              <?php if (
                                is_array($itemUsed) &&
                                is_array($addedInventory)
                              ) { ?>
                                <?php foreach (
                                  $itemUsed
                                  as $index => $value
                                ) { ?>
                                  <?php if (
                                    $addedInventory[$index]["stockQty"] +
                                      $addedInventory[$index]["addedQty"] -
                                      $itemUsed[$index]["materialQty"] <=
                                    0
                                  ) { ?>
                                    <?= '<p class="text-danger">Out Of Stock</p>' ?>
                                  <?php } elseif (
                                    $addedInventory[$index]["stockQty"] +
                                      $addedInventory[$index]["addedQty"] -
                                      $itemUsed[$index]["materialQty"] <=
                                    10
                                  ) { ?>
                                    <?= '<p class="text-warning">Low Inventory</p>' ?>
                                  <?php } else { ?>
                                    <?= '<p class="text-success">Available</p>' ?>
                                  <?php } ?> 
                                <?php } ?> 
                              <?php } elseif (is_array($addedInventory)) { ?> 
                                <?php foreach (
                                  $addedInventory
                                  as $addedStock
                                ) { ?>
                                  <?php if (
                                    $addedStock["stockQty"] +
                                      $addedStock["addedQty"] <=
                                    0
                                  ) { ?>
                                    <?= '<p class="text-danger">Out Of Stock</p>' ?>
                                  <?php } elseif (
                                    $addedStock["stockQty"] +
                                      $addedStock["addedQty"] <=
                                    10
                                  ) { ?>
                                    <?= '<p class="text-warning">Low Inventory</p>' ?>
                                  <?php } else { ?> 
                                    <?= '<p class="text-success">Available</p>' ?>
                                  <?php } ?>
                                <?php } ?>
                              <?php } elseif (is_array($itemUsed)) { ?>
                                <?php foreach ($itemUsed as $used) { ?>
                                  <?php if (
                                    $material["stockQty"] -
                                      $used["materialQty"] <=
                                    0
                                  ) { ?>
                                    <?= '<p class="text-danger">Out Of Stock</p>' ?>
                                <?php } elseif (
                                    $material["stockQty"] -
                                      $used["materialQty"] <=
                                    10
                                  ) { ?> 
                                  <?= '<p class="text-warning">Low Inventory</p>' ?>
                                <?php } else { ?> 
                                  <?= '<p class="text-success">Available</p>' ?>
                                <?php } ?>
                              <?php } ?>
                            <?php } else { ?>
                              <?php if ($material["stockQty"] <= 0) { ?>
                                <?= '<p class="text-danger">Out Of Stock</p>' ?>
                              <?php } elseif (
                                $material["stockQty"] <= 10
                              ) { ?>  
                                <?= '<p class="text-warning">Low Inventory</p>' ?>
                              <?php } else { ?>
                                <?= '<p class="text-success">Available</p>' ?>
                              <?php } ?>  
                            <?php } ?>  
                            </td>
                          </tr>
                        <?php } ?> 
                      <?php } ?> 
                    </tbody>
                    <tfoot class="text-info">
                        <tr>
                          <th>#</th>
                          <th>Raw Material</th>
                          <th>Unit Price</th>
                          <th>Total Stock Quantity</th>
                          <th>Total Price</th>
                          <th>Item Used</th>
                          <th>On Hand Stock</th>
                          <th>Supplier</th>
                          <th>Inventory Status</th>
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
            <!-- Raw Materials Table -->
            <div class="card shadow mb-4 d-print-none">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-gray-800">
                  Raw Material List
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
                        <th>Raw Material</th>
                        <th>Unit Price</th>
                        <th>Total Stock Quantity</th>
                        <th>Total Price</th>
                        <th>Item Used</th>
                        <th>On Hand Stock</th>
                        <th>Supplier</th>
                        <th>Inventory Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody class="text-gray-900">
                      <?php if ($materials) { ?>
                        <?php foreach ($materials as $material) { ?>
                          
                          <tr>
                            <td><?= $material["ID"] ?></td>
                            <td><?= $material["materialName"] ?></td>
                            <td>
                              <?= $material["unitPrice"]
                                ? "<span>&#8369;</span> " .
                                  number_format($material["unitPrice"], 2)
                                : "" ?>
                            </td>
                            <td>
                              <?php $addedInventory = $store->get_added_stock_materials(
                                $material["ID"]
                              ); ?>
                              <?php if (is_array($addedInventory)) { ?>
                                <?php foreach (
                                  $addedInventory
                                  as $addedStock
                                ) { ?>
                                  <?= $addedStock["stockQty"] +
                                    $addedStock["addedQty"] ?>
                                <?php } ?>  
                              <?php } else { ?> 
                                <?= $material["stockQty"] ?>
                              <?php } ?>                             
                            </td>
                            <td>
                            <?php $addedInventory = $store->get_added_stock_materials(
                              $material["ID"]
                            ); ?>
                              <?php if (is_array($addedInventory)) { ?>
                                <?php foreach (
                                  $addedInventory
                                  as $addedStock
                                ) { ?>
                                  <?= "<span>&#8369;</span> " .
                                    number_format(
                                      ($addedStock["stockQty"] +
                                        $addedStock["addedQty"]) *
                                        $material["unitPrice"],
                                      2
                                    ) ?>
                                <?php } ?> 
                              <?php } else { ?>
                                <?= $material["unitPrice"]
                                  ? "<span>&#8369;</span> " .
                                    number_format(
                                      $material["stockQty"] *
                                        $material["unitPrice"],
                                      2
                                    )
                                  : "" ?>
                              <?php } ?>
                            </td>
                            <td>
                              <?php $itemUsed = $store->used_materials(
                                $material["ID"]
                              ); ?>
                              <?php if (is_array($itemUsed)) { ?>
                                <?php foreach ($itemUsed as $used) { ?>
                                  <?= $used["materialQty"] ?>
                                <?php } ?>  
                              <?php } else { ?>  
                                <?= "-" ?>
                              <?php } ?> 
                            </td>
                            <td>
                              <?php
                              $itemUsed = $store->used_materials(
                                $material["ID"]
                              );
                              $addedInventory = $store->get_added_stock_materials(
                                $material["ID"]
                              );
                              ?>
                              <?php if (
                                is_array($itemUsed) &&
                                is_array($addedInventory)
                              ) { ?>
                                <?php foreach (
                                  $itemUsed
                                  as $index => $value
                                ) { ?>
                                  <?= $addedInventory[$index]["stockQty"] +
                                    $addedInventory[$index]["addedQty"] -
                                    $itemUsed[$index]["materialQty"] ?>
                                <?php } ?>  
                              <?php } elseif (is_array($addedInventory)) { ?> 
                                <?php foreach (
                                  $addedInventory
                                  as $addedStock
                                ) { ?>
                                  <?= $addedStock["stockQty"] +
                                    $addedStock["addedQty"] ?>
                                <?php } ?>  
                              <?php } elseif (is_array($itemUsed)) { ?> 
                                <?php foreach ($itemUsed as $used) { ?>
                                  <?= $material["stockQty"] -
                                    $used["materialQty"] ?>
                                <?php } ?>  
                              <?php } else { ?>
                                <?= $material["stockQty"] ?>
                              <?php } ?>
                            </td>
                            <td><?= $material["supplierName"] ?></td>
                            <td>
                              <?php
                              $itemUsed = $store->used_materials(
                                $material["ID"]
                              );
                              $addedInventory = $store->get_added_stock_materials(
                                $material["ID"]
                              );
                              ?>
                              <?php if (
                                is_array($itemUsed) &&
                                is_array($addedInventory)
                              ) { ?>
                                <?php foreach (
                                  $itemUsed
                                  as $index => $value
                                ) { ?>
                                  <?php if (
                                    $addedInventory[$index]["stockQty"] +
                                      $addedInventory[$index]["addedQty"] -
                                      $itemUsed[$index]["materialQty"] <=
                                    0
                                  ) { ?>
                                    <?= '<p class="text-danger">Out Of Stock</p>' ?>
                                  <?php } elseif (
                                    $addedInventory[$index]["stockQty"] +
                                      $addedInventory[$index]["addedQty"] -
                                      $itemUsed[$index]["materialQty"] <=
                                    10
                                  ) { ?>
                                    <?= '<p class="text-warning">Low Inventory</p>' ?>
                                  <?php } else { ?>
                                    <?= '<p class="text-success">Available</p>' ?>
                                  <?php } ?> 
                                <?php } ?> 
                              <?php } elseif (is_array($addedInventory)) { ?> 
                                <?php foreach (
                                  $addedInventory
                                  as $addedStock
                                ) { ?>
                                  <?php if (
                                    $addedStock["stockQty"] +
                                      $addedStock["addedQty"] <=
                                    0
                                  ) { ?>
                                    <?= '<p class="text-danger">Out Of Stock</p>' ?>
                                  <?php } elseif (
                                    $addedStock["stockQty"] +
                                      $addedStock["addedQty"] <=
                                    10
                                  ) { ?>
                                    <?= '<p class="text-warning">Low Inventory</p>' ?>
                                  <?php } else { ?> 
                                    <?= '<p class="text-success">Available</p>' ?>
                                  <?php } ?>
                                <?php } ?>
                              <?php } elseif (is_array($itemUsed)) { ?>
                                <?php foreach ($itemUsed as $used) { ?>
                                  <?php if (
                                    $material["stockQty"] -
                                      $used["materialQty"] <=
                                    0
                                  ) { ?>
                                    <?= '<p class="text-danger">Out Of Stock</p>' ?>
                                  <?php  ?>
                                <?php } elseif (
                                    $material["stockQty"] -
                                      $used["materialQty"] <=
                                    10
                                  ) { ?> 
                                  <?= '<p class="text-warning">Low Inventory</p>' ?>
                                <?php } else { ?> 
                                  <?= '<p class="text-success">Available</p>' ?>
                                <?php } ?>
                              <?php } ?>
                            <?php } else { ?>
                              <?php if ($material["stockQty"] <= 0) { ?>
                                <?= '<p class="text-danger">Out Of Stock</p>' ?>
                              <?php } elseif (
                                $material["stockQty"] <= 10
                              ) { ?>  
                                <?= '<p class="text-warning">Low Inventory</p>' ?>
                              <?php } else { ?>
                                <?= '<p class="text-success">Available</p>' ?>
                              <?php } ?>  
                            <?php } ?>  
                            </td>
                            <td>
                              <div class="dropdown no-arrow">
                                <a class="dropdown-toggle btn btn-secondary btn-circle btn-sm href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">   
                                  <a class="editMaterial dropdown-item" href="javascript:;" data-toggle="modal" data-target="#editMaterialModal" data-material_id="<?= $material[
                                    "ID"
                                  ] ?>" data-material_name="<?= $material[
  "materialName"
] ?>" data-unit_price = <?= $material[
  "unitPrice"
] ?> data-stock_qty="<?= $material[
   "stockQty"
 ] ?>" data-supplier_id="<?= $material["supplierID"] ?>">Edit
                                  </a>
                                  <?php
                                  $itemUsed = $store->used_materials(
                                    $material["ID"]
                                  );
                                  $addedInventory = $store->get_added_stock_materials(
                                    $material["ID"]
                                  );
                                  ?>
                                  <?php if (
                                    is_array($itemUsed) &&
                                    is_array($addedInventory)
                                  ) { ?>
                                    <?php foreach (
                                      $itemUsed
                                      as $index => $value
                                    ) { ?>
                                      <?php if (
                                        $addedInventory[$index]["stockQty"] +
                                          $addedInventory[$index]["addedQty"] -
                                          $itemUsed[$index]["materialQty"] <=
                                        0
                                      ) { ?>
                                        <a class="contactSupplier dropdown-item" href="javascript:;" data-toggle="modal" data-target="#supplierContactModal"  data-material_name="<?= $material[
                                          "materialName"
                                        ] ?>" data-supplier_email="<?= $material[
  "supplierEmail"
] ?>">Contact Supplier
                                        </a>
                                        </a>
                                      <?php } elseif (
                                        $addedInventory[$index]["stockQty"] +
                                          $addedInventory[$index]["addedQty"] -
                                          $itemUsed[$index]["materialQty"] <=
                                        10
                                      ) { ?>
                                      <a class="contactSupplier dropdown-item" href="javascript:;" data-toggle="modal" data-target="#supplierContactModal"  data-material_name="<?= $material[
                                        "materialName"
                                      ] ?>" data-supplier_email="<?= $material[
  "supplierEmail"
] ?>">Contact Supplier
                                      </a>
                                      <?php } ?> 
                                    <?php } ?> 
                                  <?php } elseif (
                                    is_array($addedInventory)
                                  ) { ?> 
                                    <?php foreach (
                                      $addedInventory
                                      as $addedStock
                                    ) { ?>
                                      <?php if (
                                        $addedStock["stockQty"] +
                                          $addedStock["addedQty"] <=
                                        0
                                      ) { ?>
                                      <a class="contactSupplier dropdown-item" href="javascript:;" data-toggle="modal" data-target="#supplierContactModal"  data-material_name="<?= $material[
                                        "materialName"
                                      ] ?>" data-supplier_email="<?= $material[
  "supplierEmail"
] ?>">Contact Supplier
                                      </a>
                                      <?php } elseif (
                                        $addedStock["stockQty"] +
                                          $addedStock["addedQty"] <=
                                        10
                                      ) { ?>
                                        <a class="contactSupplier dropdown-item" href="javascript:;" data-toggle="modal" data-target="#supplierContactModal"  data-material_name="<?= $material[
                                          "materialName"
                                        ] ?>" data-supplier_email="<?= $material[
  "supplierEmail"
] ?>">Contact Supplier
                                    </a>
                                      <?php } ?>
                                    <?php } ?>
                                  <?php } elseif (is_array($itemUsed)) { ?>
                                    <?php foreach ($itemUsed as $used) { ?>
                                      <?php if (
                                        $material["stockQty"] -
                                          $used["materialQty"] <=
                                        0
                                      ) { ?>
                                        <a class="contactSupplier dropdown-item" href="javascript:;" data-toggle="modal" data-target="#supplierContactModal"  data-material_name="<?= $material[
                                          "materialName"
                                        ] ?>" data-supplier_email="<?= $material[
  "supplierEmail"
] ?>">Contact Supplier
                                      </a>
                                    <?php } elseif (
                                        $material["stockQty"] -
                                          $used["materialQty"] <=
                                        10
                                      ) { ?> 
                                      <a class="contactSupplier dropdown-item" href="javascript:;" data-toggle="modal" data-target="#supplierContactModal"  data-material_name="<?= $material[
                                        "materialName"
                                      ] ?>" data-supplier_email="<?= $material[
  "supplierEmail"
] ?>">Contact Supplier
                                      </a>
                                    <?php } ?>
                                  <?php } ?>
                                <?php } else { ?>
                                  <?php if ($material["stockQty"] <= 0) { ?>
                                    <a class="contactSupplier dropdown-item" href="javascript:;" data-toggle="modal" data-target="#supplierContactModal"  data-material_name="<?= $material[
                                      "materialName"
                                    ] ?>" data-supplier_email="<?= $material[
  "supplierEmail"
] ?>">Contact Supplier
                                    </a>
                                  <?php } elseif (
                                    $material["stockQty"] <= 10
                                  ) { ?>  
                                    <a class="contactSupplier dropdown-item" href="javascript:;" data-toggle="modal" data-target="#supplierContactModal"  data-material_name="<?= $material[
                                      "materialName"
                                    ] ?>" data-supplier_email="<?= $material[
  "supplierEmail"
] ?>">Contact Supplier
                                    </a>
                                  <?php } ?>  
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
                          <th>#</th>
                          <th>Raw Material</th>
                          <th>Unit Price</th>
                          <th>Total Stock Quantity</th>
                          <th>Total Price</th>
                          <th>Item Used</th>
                          <th>On Hand Stock</th>
                          <th>Supplier</th>
                          <th>Inventory Status</th>
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
      $('.editMaterial').click(function() {
      var materialID = $(this).data('material_id');
      var materialName = $(this).data('material_name');
      var unitPrice = $(this).data('unit_price');
      var stockQty = $(this).data('stock_qty');
      var supplierID = $(this).data('supplier_id');

      $('#materialID').val(materialID);
      $('#materialName').val(materialName);
      $('#unitPrice').val(unitPrice);
      $('#stockQty').val(stockQty);
      $('#supplierID').val(supplierID);
      } );
    </script>
    <script>
      $('.contactSupplier').click(function() {
      var materialName = $(this).data('material_name');
      var supplierEmail = $(this).data('supplier_email');

      $('#msg').val('Item ' + materialName + ' is at low inventory <add quantity here>' );
      $('#supplierEmailAdd').val(supplierEmail);
      } );
    </script>
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
        doc.save("Raw Material List.pdf");
      }
    </script>
  </body>
</html>