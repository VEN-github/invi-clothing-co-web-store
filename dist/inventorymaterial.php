<?php
require_once "../class/webstoreclass.php";
$user = $store->get_userdata();
$title = "Inventory - Raw Materials";
include_once "../includes/dashboard_header.php";
$materials = $store->get_all_materials();
?>
  <body id="page-top">
    <?php
    $store->add_inventory_materials();
    $store->update_inventory_material();
    $addedInventoryMaterials = $store->get_inventory_materials_added();
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
            <!-- Add Inventory Materials Modal Form -->
            <div class="modal fade" id="materialsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add New Inventory</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form method="post" id="inventoryMaterialsForm">
                      <div class="form-group">
                        <label>Stock Quantity</label>
                        <input type="number" name="addedStockQty" class="form-control" min="1" placeholder="1">
                      </div>
                      <div class="form-group">
                        <label>Raw Material</label>
                        <select class="form-control" name="material">
                          <option selected disabled>Select Raw Material</option>
                          <?php foreach ($materials as $material) { ?>
                          <option value="<?= $material["ID"] ?>"><?= $material[
  "materialName"
] ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="addInventoryMaterials" class="btn btn-secondary" form="inventoryMaterialsForm">Add</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- End of Modal Form -->
            <!-- Edit Inventory Materials Modal Form -->
            <div class="modal fade" id="editInventoryMaterialModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Added Inventory</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form method="post" id="updateInventoryMaterialsForm">
                      <input type="hidden" name="inventoryMaterialID" id="inventoryMaterialID">
                      <div class="form-group">
                        <label>Stock Quantity</label>
                        <input type="number" name="addedStockQty" id="addedStockQty" class="form-control" min="1">
                      </div>
                      <div class="form-group">
                        <label>Raw Material</label>
                        <select class="form-control" name="material" id="material">
                          <?php foreach ($materials as $material) { ?>
                          <option value="<?= $material["ID"] ?>"><?= $material[
  "materialName"
] ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                    <input type="submit" name="updateInventoryMaterial" class="btn btn-secondary" form="updateInventoryMaterialsForm" value="Update">
                  </div>
                </div>
              </div>
            </div>
            <!-- End of Edit Inventory Materials Modal Form -->
            <!-- Page Heading -->
            <div
              class="d-sm-flex align-items-center justify-content-between mb-4 d-print-none"
            >
              <h1 class="h3 mb-4 text-gray-800">Raw Materials
                <button type="button" href="#" class="btn btn-secondary btn-icon-split" data-toggle="modal" data-target="#materialsModal">
                    <span class="icon text">
                      <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Add Inventory</span>
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
                <h1 id="heading" class="m-0 font-weight-bold text-gray-800">Inventory - Raw Material<br/>List</h1>
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
                          <th>Material Name</th>
                          <th>Added Stock</th>
                          <th>Date & Time</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-900">
                      <?php if ($addedInventoryMaterials) { ?>
                        <?php foreach (
                          $addedInventoryMaterials
                          as $inventoryMaterial
                        ) { ?>
                          <tr>
                            <td><?= $inventoryMaterial["ID"] ?></td>
                            <td><?= $inventoryMaterial["materialName"] ?></td>
                            <td><?= $inventoryMaterial["addedQty"] ?></td>
                            <td><?= $inventoryMaterial["dateTime"] ?></td>
                          </tr>
                        <?php } ?>
                      <?php } ?>
                    </tbody>
                    <tfoot class="text-info">
                        <tr>
                          <th>#</th>
                          <th>Material Name</th>
                          <th>Added Stock</th>
                          <th>Date & Time</th>
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
            <!-- Inventory Raw Materials Table -->
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
                  >
                    <thead class="bg-gray-600 text-gray-100">
                        <tr>
                          <th>#</th>
                          <th>Material Name</th>
                          <th>Added Stock</th>
                          <th>Date & Time</th>
                          <th>Added By</th>
                          <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-900">
                      <?php if ($addedInventoryMaterials) { ?>
                        <?php foreach (
                          $addedInventoryMaterials
                          as $inventoryMaterial
                        ) { ?>
                          <tr>
                            <td><?= $inventoryMaterial["ID"] ?></td>
                            <td><?= $inventoryMaterial["materialName"] ?></td>
                            <td><?= $inventoryMaterial["addedQty"] ?></td>
                            <td><?= $inventoryMaterial["dateTime"] ?></td>
                            <td><?= $user["firstName"] .
                              " " .
                              $user["lastName"] ?></td>
                            <td>
                              <button type="button" class="editInventoryMaterial btn btn-sm btn-secondary btn-circle" href="javascript:;" data-toggle="modal" data-target="#editInventoryMaterialModal" data-inventory_material_id="<?= $inventoryMaterial[
                                "ID"
                              ] ?>" data-material_id="<?= $inventoryMaterial[
  "materialID"
] ?>" data-added_stock_qty="<?= $inventoryMaterial["addedQty"] ?>">
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
                          <th>Material Name</th>
                          <th>Added Stock</th>
                          <th>Date & Time</th>
                          <th>Added By</th>
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
        $('.editInventoryMaterial').click(function() {
        var inventoryMaterialID = $(this).data('inventory_material_id');
        var materialID = $(this).data('material_id');
        var addedStockQty = $(this).data('added_stock_qty');

        $('#inventoryMaterialID').val(inventoryMaterialID);
        $('#material').val(materialID);
        $('#addedStockQty').val(addedStockQty);
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
        doc.autoTable({html: '#table', margin: { top: 160 }, headStyles: { fillColor: [84, 84, 84]}, footStyles: {fillColor: [84, 84, 84]}, styles: { halign: 'center'}});
        doc.fromHTML(issuedBy,40,650,{
          'width': 522,'elementHandlers': elementHandler
        });
        doc.fromHTML(date,40,670,{
          'width': 522,'elementHandlers': elementHandler
        });
        doc.save("Inventory - Raw Material List.pdf");
      }
    </script>
  </body>
</html>


