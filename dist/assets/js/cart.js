const cartBtn=document.querySelector("#cart-btn");let products=[];function onLoadCartNumbers(){var t=localStorage.getItem("cartNumbers");t&&(document.querySelector("#counter").textContent=t)}function cartNumbers(t){var e=localStorage.getItem("cartNumbers");(e=parseInt(e))?(localStorage.setItem("cartNumbers",e+1),document.querySelector("#counter").textContent=e+1):(localStorage.setItem("cartNumbers",1),document.querySelector("#counter").textContent=1),setProducts(t)}function setProducts(t){var e=document.querySelector("#productID").value,n=document.querySelector(".product-highlight img").src,a=document.querySelector(".product-name").textContent,i=document.querySelector("#productPrice").textContent,i=parseInt(i),o=document.querySelector("#productColor").textContent,r=document.querySelector("#sizeOpt"),s=document.querySelector("#quantity").value,s=parseInt(s);let c;var l=document.querySelector("#counter").textContent,l=parseInt(l);r&&(c=r.value);let u=localStorage.getItem("productsInCart");u=JSON.parse(u),u.push({itemID:l,productID:e,productImage:n,productName:a,productColor:o,productSize:c,productPrice:i,Quantity:s}),localStorage.setItem("productsInCart",JSON.stringify(u))}function displayCart(){var t=localStorage.getItem("productsInCart"),t=JSON.parse(t);let e=document.querySelector("#cart");null===t||0==localStorage.getItem("cartNumbers")&&e?(e.innerHTML="",e.innerHTML+=`
    <div class="container">
      <div class="empty-cart">
        <img src="./assets/img/empty-cart.svg" alt="Empty Cart" />
        <div class="empty-cart-details">
          <h3>Your Cart is Currently Empty</h3>
          <p>Looks like you haven't added anything to cart yet</p>
        </div>
        <button><a href="shop.php" class="btn primary-btn">Shop Now</a></button>
      </div>
    </div>`):e&&(e.innerHTML="",e.innerHTML+=`
    <div class="banner">Your Cart</div>
      <div class="container">
        <div class="cart-wrapper">
          <div class="cart-container">
            <div class="cart-header">
              <p class="label-item">Item</p>
              <p class="label-price">Price</p>
              <p class="label-quantity">Quantity</p>
              <p>Total</p>
            </div>`,Object.values(t).map(t=>{void 0===t.productSize?document.querySelector(".cart-container").innerHTML+=`
        <div class="cart-items">
          <input type="hidden" value="${t.itemID}">
          <img src="${t.productImage}" alt="${t.productImage}" />
          <div class="item-label">
            <p class="item-name">${t.productName}</p>
            <p>Color: ${t.productColor}</p>
          </div>
          <div class="item-price">
            <span
              class="iconify peso-sign"
              data-icon="clarity:peso-line"
              data-inline="false"
            ></span>
            <p>${t.productPrice}.00</p>
          </div>
          <div class="item-quantity">
            <button type="button" class="minus-btn" onclick="minus(this)">-</button>
            <input
              class="qty-input quantity"
              type="number"
              name=""
              value="${t.Quantity}"
              min="1"
            />
            <button type="button" class="plus-btn" onclick="plus(this)">+</button>
          </div>
          <div class="item-total">
            <span
              class="iconify peso-sign"
              data-icon="clarity:peso-line"
              data-inline="false"
            ></span>
            <p class="total-price">${t.productPrice*t.Quantity}.00</p>
          </div>
          <button type="button" onclick="removeItem(this)">
            <span
              class="iconify del-icon"
              data-icon="carbon:trash-can"
              data-inline="false"
            ></span>
          </button>
        </div>`:document.querySelector(".cart-container").innerHTML+=`
        <div class="cart-items">
          <input type="hidden" value="${t.itemID}">
          <img src="${t.productImage}" alt="${t.productImage}" />
          <div class="item-label">
            <p class="item-name">${t.productName}</p>
            <p>Color: ${t.productColor}</p>
            <p class="item-size">Size: ${t.productSize}</p>
          </div>
          <div class="item-price">
            <span
              class="iconify peso-sign"
              data-icon="clarity:peso-line"
              data-inline="false"
            ></span>
            <p>${t.productPrice}.00</p>
          </div>
          <div class="item-quantity">
            <button type="button" class="minus-btn" onclick="minus(this)">-</button>
            <input
              class="qty-input quantity"
              type="number"
              name=""
              value="${t.Quantity}"
              min="1"
            />
            <button type="button" class="plus-btn" onclick="plus(this)">+</button>
          </div>
          <div class="item-total">
            <span
              class="iconify peso-sign"
              data-icon="clarity:peso-line"
              data-inline="false"
            ></span>
            <p class="total-price">${t.productPrice*t.Quantity}.00</p>
          </div>
          <button type="button" onclick="removeItem(this)">
            <span
              class="iconify del-icon"
              data-icon="carbon:trash-can"
              data-inline="false"
            ></span>
          </button>
        </div>`}),document.querySelector(".cart-container").innerHTML+=`
      <div class="cont-shop"><a href="shop.php">< Continue Shopping</a></div>
    </div>`,document.querySelector(".cart-wrapper").innerHTML+=`
        <div class="order-summary">
          <h4>Order Summary</h4>
          <p>
            Shipping, taxes, and discounts will be calculated at checkout.
          </p>
          <div class="note">
            <p>Add Note</p>
            <form action="">
              <textarea class="note-input" name="" id=""></textarea>
            </form>
          </div>
          <div class="subtotal-container">
            Subtotal:
            <div class="subtotal">
              <span
                class="iconify peso-sign"
                data-icon="clarity:peso-line"
                data-inline="false"
              ></span>
              <span id="subtotal-price"></span>
              <span>.00</span>
            </div>
          </div>
          <div class="checkout">
            <form method="post">
              <button type="submit"
                class="btn primary-btn checkout-btn"
                name="checkout"
                id="checkout"
                >Proceed to Checkout
                <span
                  class="iconify right-arrow"
                  data-icon="dashicons:arrow-right-alt"
                  data-inline="false"
                ></span
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>`),minusBtnProperty(),subTotal()}function minusBtnProperty(){const t=document.querySelectorAll(".minus-btn");t.forEach(t=>{t.nextElementSibling.classList.contains("quantity")&&1==t.nextElementSibling.value&&(t.setAttribute("disabled","disabled"),t.style.cursor="not-allowed")})}function minus(n){if(n.nextElementSibling.classList.contains("quantity")){var a=n.nextElementSibling.value;1==(n.nextElementSibling.value=--a)&&(n.setAttribute("disabled","disabled"),n.style.cursor="not-allowed");let t=n.parentNode.previousElementSibling.childNodes[3].textContent;const i=n.parentNode.nextElementSibling.childNodes[3];a=i.textContent,a=parseInt(a);t=parseInt(t),t=a-t,i.innerText=t.toFixed(2);a=n.parentNode.previousElementSibling.childNodes[3].textContent,a=parseInt(a);let e=document.querySelector("#subtotal-price");n=parseInt(e.textContent);e.innerText=n-a}}function plus(n){if(n.previousElementSibling.classList.contains("quantity")){var a=n.previousElementSibling.value;1<(n.previousElementSibling.value=++a)&&(n.previousElementSibling.previousElementSibling.removeAttribute("disabled"),n.previousElementSibling.previousElementSibling.classList.remove("disabled"),n.previousElementSibling.previousElementSibling.style.cursor="pointer");let t=n.parentNode.previousElementSibling.childNodes[3].textContent;const i=n.parentNode.nextElementSibling.childNodes[3];a=i.textContent,a=parseInt(a);t=parseInt(t),t=a+t,i.innerText=t.toFixed(2);a=n.parentNode.previousElementSibling.childNodes[3].textContent,a=parseInt(a);let e=document.querySelector("#subtotal-price");n=parseInt(e.textContent);e.innerText=n+a}}function subTotal(){const t=document.querySelector("#subtotal-price"),e=document.querySelectorAll(".total-price");let n=0;e.forEach(t=>{totalPrice=parseInt(t.textContent),n+=totalPrice}),t&&(t.innerText+=n)}function removeItem(t){var e=localStorage.getItem("cartNumbers"),e=parseInt(e);let n=localStorage.getItem("productsInCart");n=JSON.parse(n);let a=t.parentNode.childNodes[1].value;t=n.filter(t=>t.itemID!=a);localStorage.setItem("productsInCart",JSON.stringify(t)),e&&(localStorage.setItem("cartNumbers",e-1),document.querySelector("#counter").textContent=e-1),displayCart()}cartBtn&&cartBtn.addEventListener("click",()=>{cartNumbers(products)}),displayCart(),onLoadCartNumbers();