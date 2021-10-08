<?php
require_once "../class/webstoreclass.php";
$user = $store->get_userdata();
$title = "Supplier";
include_once "../includes/dashboard_header.php";
?>
  <body id="page-top">
    <?php
    $store->add_supplier();
    $store->update_supplier();
    $suppliers = $store->get_all_supplier();
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
            <!-- Supplier Modal Form -->
            <div class="modal fade" id="supplierModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add New Supplier</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form method="post" id="supplierForm">
                      <div class="form-group">
                        <label>Supplier Name</label>
                        <input type="text" name="supplierName" class="form-control" placeholder="Supplier Name">
                      </div>
                      <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" name="supplierEmail" class="form-control" placeholder="Email Address"> 
                      </div>
                      <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="supplierAddress" class="form-control" placeholder="Address"> 
                      </div>
                      <div class="form-group">
                        <label>Contact Number</label>
                        <input type="tel" name="supplierContactNo" class="form-control" placeholder="Contact Number">
                      </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="supplier" class="btn btn-secondary" form="supplierForm">Add</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- End of Modal Form -->
            <!-- Edit Supplier Modal Form -->
            <div class="modal fade" id="editSupplierModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Supplier</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form method="post" id="updateSupplierForm">
                      <input type="hidden" name="supplierID" id="supplierID" class="form-control">
                      <div class="form-group">
                        <label>Supplier Name</label>
                        <input type="text" name="supplierName" id="supplierName" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Email Address</label>
                        <input type="text" name="supplierEmail" id="supplierEmail" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="supplierAddress" id="supplierAddress" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Contact Number</label>
                        <input type="tel" name="supplierContactNo" id="supplierContactNumber" class="form-control">
                      </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                    <input type="submit" name="updateSupplier" class="btn btn-secondary" form="updateSupplierForm" value="Update">
                  </div>
                </div>
              </div>
            </div>
            <!-- End of Edit Supplier Modal Form -->
            <!-- Page Heading -->
            <div
              class="d-sm-flex align-items-center justify-content-between mb-4 d-print-none"
            >
              <h1 class="h3 mb-4 text-gray-800">Supplier
                <button type="button" href="#" class="btn btn-secondary btn-icon-split" data-toggle="modal" data-target="#supplierModal">
                    <span class="icon text">
                      <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Add New Supplier</span>
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
                <h1 id="heading" class="m-0 font-weight-bold text-gray-800">Supplier List</h1>
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
                          <th>Name</th>
                          <th>Email Address</th>
                          <th>Address</th>
                          <th>Contact Number</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-900">
                      <?php if ($suppliers) { ?>
                        <?php foreach ($suppliers as $supplier) { ?>
                        <tr>
                          <td><?= $supplier["ID"] ?></td>
                          <td><?= $supplier["supplierName"] ?></td>
                          <td><?= $supplier["supplierEmail"] ?></td>
                          <td><?= $supplier["supplierAddress"] ?></td>
                          <td><?= $supplier["supplierContactNumber"] ?></td>
                        </tr>
                        <?php } ?>
                      <?php } ?>
                    </tbody>
                    <tfoot class="text-info">
                        <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>Email Address</th>
                          <th>Address</th>
                          <th>Contact Number</th>
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
            <!-- Supplier Table -->
            <div class="card shadow mb-4 d-print-none">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-gray-800">
                  Supplier List
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
                          <th>Name</th>
                          <th>Email Address</th>
                          <th>Address</th>
                          <th>Contact Number</th>
                          <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-900">
                      <?php if ($suppliers) { ?>
                        <?php foreach ($suppliers as $supplier) { ?>
                        <tr>
                          <td><?= $supplier["ID"] ?></td>
                          <td><?= $supplier["supplierName"] ?></td>
                          <td><?= $supplier["supplierEmail"] ?></td>
                          <td><?= $supplier["supplierAddress"] ?></td>
                          <td><?= $supplier["supplierContactNumber"] ?></td>
                          <td>
                            <button type="button" class="editSupplier btn btn-sm btn-secondary btn-circle" href="javascript:;" data-toggle="modal" data-target="#editSupplierModal" data-supplier_id="<?= $supplier[
                              "ID"
                            ] ?>" data-supplier_name="<?= $supplier[
  "supplierName"
] ?>" data-supplier_email="<?= $supplier[
  "supplierEmail"
] ?>" data-supplier_address="<?= $supplier[
  "supplierAddress"
] ?>" data-supplier_contact_number="<?= $supplier["supplierContactNumber"] ?>">
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
                          <th>Name</th>
                          <th>Email Address</th>
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
        $('.editSupplier').click(function() {
        var supplierID = $(this).data('supplier_id');
        var supplierName = $(this).data('supplier_name');
        var supplierEmail = $(this).data('supplier_email');
        var supplierAddress = $(this).data('supplier_address');
        var supplierContactNumber = $(this).data('supplier_contact_number');

        $('#supplierID').val(supplierID);
        $('#supplierName').val(supplierName);
        $('#supplierEmail').val(supplierEmail);
        $('#supplierAddress').val(supplierAddress);
        $('#supplierContactNumber').val(supplierContactNumber);
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
        doc.save("Supplier List.pdf");
      }
    </script>
  </body>
</html>


