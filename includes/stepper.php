<div class="container">
  <div class="progress-bar">
    <div class="progress-step active" data-title="Information">
      <div class="line <?= $title === "Shipping - Checkout" ||
      $title === "Payment - Checkout" ||
      $title === "Order Review - Checkout"
        ? "active"
        : "" ?>"></div>
    </div>
    <div class="progress-step <?= $title === "Shipping - Checkout" ||
    $title === "Payment - Checkout" ||
    $title === "Order Review - Checkout"
      ? "active"
      : "" ?>" data-title="Shipping">
      <div class="line <?= $title === "Payment - Checkout" ||
      $title === "Order Review - Checkout"
        ? "active"
        : "" ?>"></div>
    </div>
    <div class="progress-step <?= $title === "Payment - Checkout" ||
    $title === "Order Review - Checkout"
      ? "active"
      : "" ?>" data-title="Payment">
      <div class="line <?= $title === "Order Review - Checkout"
        ? "active"
        : "" ?>"></div>
    </div>
    <div class="progress-step <?= $title === "Order Review - Checkout"
      ? "active"
      : "" ?>" data-title="Review">
      <div class="line last"></div>
    </div>
  </div>
</div>