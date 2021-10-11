<?php
require_once __DIR__ . "/../vendor/autoload.php";
require_once "../class/webstoreclass.php";
$orderID = $_GET["orderID"];
$acctID = $_GET["acctID"];
$orders = $store->invoice($orderID, $acctID);

$items = "";
foreach ($orders as $order) {
  $ID = $order["orderID"];
  $date = $order["orderDate"];
  $customerName = $order["firstName"] . " " . $order["lastName"];
  $customerEmail = $order["email"];
  $items =
    $items .
    '<tr class="order">
    <td class="order"><img class="item-img" src="./assets/img/' .
    $order["coverPhoto"] .
    '" alt="Logo"></td>
    <td class="order">
      <table>
        <tr class="order">
          <td class="items">' .
    $order["productName"] .
    '</td>
        </tr>' .
    (is_null($order["size"])
      ? '<tr>
            <td class="items">Color: ' .
        $order["productColor"] .
        '</td>
          </tr>
          <tr>
            <td class="items">SKU: 454878745</td>
          </tr>'
      : '<tr>
            <td class="items">Color: ' .
        $order["productColor"] .
        '</td>
          </tr>
          <tr>
            <td class="items">Size: ' .
        $order["size"] .
        '</td>
          </tr>
          <tr>
            <td class="items">SKU: 454878745</td>
          </tr>') .
    '
      </table>
    </td>
    <td class="price order"><span>&#8369;</span> ' .
    $order["netSales"] .
    '.00</td>
    <td class="qty order">' .
    $order["salesQty"] .
    '</td>
    <td class="order"><span>&#8369;</span> ' .
    $order["netSales"] * $order["salesQty"] .
    '.00</td>
  </tr>';
}

$html =
  '
  <link href="./assets/css/main.css" rel="stylesheet" />

  <div id="receipt">
    <div class="heading">
      <img class="logo" src="./assets/img/black_logo.png" alt="Logo">
      <h1>INVI Clothing Co.</h1>
      <div class="order-id">Order ID:' .
  $ID .
  "<br>Date Purchased: " .
  $date .
  '</div>
    </div>
    <div class="customer">
      <div class="customer-header">Customer Information</div>
      <div>' .
  $customerName .
  '</div>
      <div>' .
  $customerEmail .
  '</div>
    </div>
    <table>
      <thead>
        <tr>
          <th class="address">Shipping Address</th>
          <th>Shipping Method</th>
          <th>Payment Method</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="address">' .
  $order["addressFname"] .
  " " .
  $order["addressLname"] .
  '</td>
          <td class="sf">' .
  $order["shipMethod"] .
  '</td>
          <td>' .
  $order["paymentMethod"] .
  '</td>
        </tr>
        <tr>
          <td class="address">' .
  $order["address1"] .
  '</td>
          <td class="sf"><span>&#8369;</span> ' .
  $order["shipFee"] .
  '.00</td>
          <td></td>
        </tr>
        ' .
  (is_null($order["address2"])
    ? '
        <tr>
          <td class="address">' .
      $order["city"] .
      " " .
      $order["postalCode"] .
      '</td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td class="address">' .
      $order["region"] .
      " " .
      $order["country"] .
      '</td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td class="address">Contact #: ' .
      $order["phoneNumber"] .
      '</td>
          <td></td>
          <td></td>
        </tr>'
    : '
        <tr>
          <td class="address">' .
      $order["address2"] .
      '</td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td class="address">' .
      $order["city"] .
      " " .
      $order["postalCode"] .
      '</td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td class="address">' .
      $order["region"] .
      " " .
      $order["country"] .
      '</td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td class="address">Contact #: ' .
      $order["phoneNumber"] .
      '</td>
          <td></td>
          <td></td>
        </tr>') .
  '
      </tbody>
    </table>
    <table>
      <thead>
        <tr>
          <th class="order">Items</th>
          <th class="order"></th>
          <th class="price order">Price</th>
          <th class="qty order">Quantity</th>
          <th class="order">Total</th>
        </tr>
      </thead>
      <tbody>
      ' .
  $items .
  '
      </tbody>
    </table>
    <div class="total">
      <table>
        <tbody>
          <tr>
            <td>Subtotal</td>
            <td><span>&#8369;</span> ' .
  $order["totalAmount"] -
  $order["shipFee"] .
  '.00</td>
          </tr>
          <tr>
            <td>Shipping Fee</td>
            <td><span>&#8369;</span> ' .
  $order["shipFee"] .
  '.00</td>
          </tr>
          <tr>
            <th>Total</th>
            <th><span>&#8369;</span> ' .
  $order["totalAmount"] .
  '.00</th>
          </tr>
        </tbody>
      </table>
    </div>
  </div>  
  <div class="closing-note">Thank you for shopping with us</div>
  <div class="company-name">INVI Clothing Co.</div>
  ';

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$mpdf->Output();
?>
