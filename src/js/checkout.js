function displayCheckoutItems() {
  let cartItems = localStorage.getItem("productsInCart");
  cartItems = JSON.parse(cartItems);
  let totalCost = localStorage.getItem("totalCost");

  let orderItems = document.querySelector(".order-summary");

  if (cartItems && orderItems) {
    orderItems.innerHTML += `<h4>Order Summary</h4>`;
    Object.values(cartItems).map((item) => {
      if (item.productSize === undefined) {
        orderItems.innerHTML += `
        <div class="order-items">
          <img src="${item.productImage}" alt="${item.productImage}" />
          <div class="item-label">
            <p class="item-name">${item.productName}</p>
            <p>Color: ${item.productColor}</p>
            <p class="price-container">
              <span
                class="iconify peso-sign"
                data-icon="clarity:peso-line"
                data-inline="false"
              ></span>
              <span class="price">${item.productPrice}.00</span>
              <span class="qty">x ${item.NewQuantity}</span>
            </p>
          </div>
        </div>`;
      } else {
        orderItems.innerHTML += `
        <div class="order-items">
          <img src="${item.productImage}" alt="${item.productImage}" />
          <div class="item-label">
            <p class="item-name">${item.productName}</p>
            <p>Color: ${item.productColor}</p>
            <p>Size: ${item.productSize}</p>
            <p class="price-container">
              <span
                class="iconify peso-sign"
                data-icon="clarity:peso-line"
                data-inline="false"
              ></span>
              <span class="price">${item.productPrice}.00</span>
              <span class="qty">x ${item.NewQuantity}</span>
            </p>
          </div>
        </div>`;
      }
    });
    orderItems.innerHTML += `       
      <div class="subtotal-container">
        <div class="subtotal">
          <p>Subtotal:</p>
          <p class="price">
            <span
              class="iconify peso-sign"
              data-icon="clarity:peso-line"
              data-inline="false"
            ></span>
            <span>${totalCost}.00</span>
          </p>
        </div>
        <div class="shipping">
          <p>Shipping:</p>
          <p>Calculated at next step</p>
        </div>
      </div>
      <div class="total-container">
        Total:
        <div class="total">
          <span
            class="iconify peso-sign"
            data-icon="clarity:peso-line"
            data-inline="false"
          ></span>
          <span>${totalCost}.00</span>
        </div>
      </div>`;
  }
}
displayCheckoutItems();
