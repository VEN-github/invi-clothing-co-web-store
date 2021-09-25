function displayCheckoutItems(){var a=localStorage.getItem("productsInCart"),a=JSON.parse(a),s=localStorage.getItem("totalCost");let i=document.querySelector(".order-summary");a&&i&&(i.innerHTML+="<h4>Order Summary</h4>",Object.values(a).map(a=>{void 0===a.productSize?i.innerHTML+=`
        <div class="order-items">
          <img src="${a.productImage}" alt="${a.productImage}" />
          <div class="item-label">
            <p class="item-name">${a.productName}</p>
            <p>Color: ${a.productColor}</p>
            <p class="price-container">
              <span
                class="iconify peso-sign"
                data-icon="clarity:peso-line"
                data-inline="false"
              ></span>
              <span class="price">${a.productPrice}.00</span>
              <span class="qty">x ${a.NewQuantity}</span>
            </p>
          </div>
        </div>`:i.innerHTML+=`
        <div class="order-items">
          <img src="${a.productImage}" alt="${a.productImage}" />
          <div class="item-label">
            <p class="item-name">${a.productName}</p>
            <p>Color: ${a.productColor}</p>
            <p>Size: ${a.productSize}</p>
            <p class="price-container">
              <span
                class="iconify peso-sign"
                data-icon="clarity:peso-line"
                data-inline="false"
              ></span>
              <span class="price">${a.productPrice}.00</span>
              <span class="qty">x ${a.NewQuantity}</span>
            </p>
          </div>
        </div>`}),i.innerHTML+=`       
      <div class="subtotal-container">
        <div class="subtotal">
          <p>Subtotal:</p>
          <p class="price">
            <span
              class="iconify peso-sign"
              data-icon="clarity:peso-line"
              data-inline="false"
            ></span>
            <span>${s}.00</span>
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
          <span>${s}.00</span>
        </div>
      </div>`)}displayCheckoutItems();