function displayCheckoutItems(){var a=localStorage.getItem("productsInCart"),a=JSON.parse(a),e=localStorage.getItem("totalCost");let s=document.querySelector(".order-summary");a&&s&&(s.innerHTML+="<h4>Order Summary</h4>",Object.values(a).map(a=>{void 0===a.productSize?s.innerHTML+=`
        <input type="hidden" name="productID[]" value="${a.productID}" form="orderForm" />
        <input type="hidden" name="stockID[]" value="${a.stockID}" form="orderForm" />
        <input type="hidden" name="salesQty[]" value="${a.NewQuantity}"  form="orderForm" />
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
        </div>`:s.innerHTML+=`
        <input type="hidden" name="productID[]" value="${a.productID}" form="orderForm" />
        <input type="hidden" name="stockID[]" value="${a.stockID}" form="orderForm" />
        <input type="hidden" name="salesQty[]" value="${a.NewQuantity}" form="orderForm" />
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
        </div>`}),s.innerHTML+=`       
      <div class="subtotal-container">
        <div class="subtotal">
          <p>Subtotal:</p>
          <p class="price">
            <span
              class="iconify peso-sign"
              data-icon="clarity:peso-line"
              data-inline="false"
            ></span>
            <span id="subtotal">${e}.00</span>
          </p>
        </div>
        <div class="shipping">
          <p>Shipping:</p>
          <p id="shipping-fee" class="price">Calculated at next step</p>
          <input type="hidden" name="sFee" id="shipping-input" form="sf-method"/>
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
          <span id="total-cost">${e}.00</span>
        </div>
      </div>`)}displayCheckoutItems();