<?php
require_once __DIR__ . "/../vendor/autoload.php";
require_once "../class/webstoreclass.php";
$materialID = $_GET["ID"];
$materials = $store->supplier_report($materialID);

$exportName = "INVI Clothing Co.";
date_default_timezone_set("Asia/Manila");
$exportDate = date("F d, Y h:i:s A");

$styles = '
  <style>
    h1{
      text-align: center;
    }
    .report-table{
      width: 100%;
      margin-top: 3em;
      border: 1px solid #000;
      border-collapse: collapse;
    }
    .report-table tr th{
      border: 1px solid #000;
      border-collapse: collapse;
    }
    .report-table tr td{
      text-align: center;
      border: 1px solid #000;
      border-collapse: collapse;
    }
  </style>';

$report = "";

if ($materials) {
  $report =
    $report .
    '<tr>
      <td>' .
    $materials["materialName"] .
    '</td>
      <td>' .
    $materials["supplierName"] .
    '</td>
    </tr>';
}
$html =
  $styles .
  '
  
  <h1>Purchase Order Request</h1>

  <table>
    <tr>
      <td><strong>Issued By:</strong></td>
      <td>' .
  $exportName .
  '
  </td>
    </tr>
    <tr>
      <td><strong>Issued Date:</strong></td>
      <td>' .
  $exportDate .
  '</td>
    </tr>
  </table>

  <table class="report-table">
    <thead>
      <tr>
        <th>Material</th>
        <th>Supplier Name</th>
      </tr>
    </thead>
    <tbody>
      ' .
  $report .
  '
    </tbody>
    <tfoot>
      <tr>
        <th>Material</th>
        <th>Supplier Name</th>
      </tr>
    </tfoot>
  </table>
  ';

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$mpdf->Output("" . $materials["materialName"] . " PORequest.pdf", "D");
?>
