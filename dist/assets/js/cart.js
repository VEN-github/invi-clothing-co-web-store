let itemCode,productID,productImg,productName,productColor,sizeValue,productPrice,qty=0,maxVal;document.querySelector("#productID")&&(productID=document.querySelector("#productID").value),document.querySelector(".product-highlight img")&&(productImg=document.querySelector(".product-highlight img").src),document.querySelector(".product-name")&&(productName=document.querySelector(".product-name").textContent),document.querySelector("#productColor")&&(productColor=document.querySelector("#productColor").textContent),document.querySelector("#sizeOpt")&&(sizeValue=document.querySelector("#sizeOpt").value),document.querySelector("#productPrice")&&(productPrice=document.querySelector("#productPrice").textContent,productPrice=parseInt(productPrice.replace(/,/g,""))),document.querySelector("#quantity")&&(maxVal=document.querySelector("#quantity").max,maxVal=parseInt(maxVal)),itemCode=null!=sizeValue?productName+" "+sizeValue:productName;let products={itemCode:itemCode,productID:productID,productImage:productImg,productName:productName,productColor:productColor,productSize:sizeValue,productPrice:productPrice,Quantity:qty,maxValue:maxVal};const cartBtn=document.querySelector("#cart-btn");function setProducts(t){let e=localStorage.getItem("productsInCart");e=JSON.parse(e);var n=document.querySelector("#quantity").value,n=parseInt(n);null!=e?(null==e[t.itemCode]&&(e={...e,[t.itemCode]:t}),e[t.itemCode].Quantity+=n):(t.Quantity=n,e={[t.itemCode]:t}),e[t.itemCode].Quantity<=e[t.itemCode].maxValue&&(localStorage.setItem("productsInCart",JSON.stringify(e)),cartNumbers())}function onLoadCartNumbers(){var t=localStorage.getItem("cartNumbers");t&&(document.querySelector("#counter").textContent=t)}function cartNumbers(){var t=localStorage.getItem("cartNumbers"),t=parseInt(t),e=document.querySelector("#quantity").value,e=parseInt(e);t?(localStorage.setItem("cartNumbers",t+e),document.querySelector("#counter").textContent=t+e):(localStorage.setItem("cartNumbers",e),document.querySelector("#counter").textContent=e)}function displayCart(){var t=localStorage.getItem("productsInCart"),t=JSON.parse(t);let e=document.querySelector("#cart");null===t||0==localStorage.getItem("cartNumbers")?e&&(e.innerHTML="",e.innerHTML+=`
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
          <input type="hidden" class="item-code" value="${t.itemCode}">
          <img src="${t.productImage}" alt="${t.productImage}" />
          <div class="item-label">
            <p class="item-name">${t.productName}</p>
            <p>Color: <span class="item-color">${t.productColor}</span></p>
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
              max="${t.maxValue}"
            />
            <button type="button" class="plus-btn" onclick="plus(this)">+</button>
          </div>
          <div class="item-total">
            <span
              class="iconify peso-sign"
              data-icon="clarity:peso-line"
              data-inline="false"
            ></span>
            <p class="total-price">${t.productPrice*t.Quantity}</p>
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
          <input type="hidden" class="item-code" value="${t.itemCode}">
          <img src="${t.productImage}" alt="${t.productImage}" />
          <div class="item-label">
            <p class="item-name">${t.productName}</p>
            <p>Color: <span class="item-color">${t.productColor}</span></p>
            <p>Size:<span class="item-size">${t.productSize}</span></p>
          </div>
          <div class="item-price">
            <span
              class="iconify peso-sign"
              data-icon="clarity:peso-line"
              data-inline="false"
            ></span>
            <p>${t.productPrice}</p>
          </div>
          <div class="item-quantity">
            <button type="button" class="minus-btn" onclick="minus(this)">-</button>
            <input
              class="qty-input quantity"
              type="number"
              name=""
              value="${t.Quantity}"
              min="1"
              max="${t.maxValue}"
            />
            <button type="button" class="plus-btn" onclick="plus(this)">+</button>
          </div>
          <div class="item-total">
            <span
              class="iconify peso-sign"
              data-icon="clarity:peso-line"
              data-inline="false"
            ></span>
            <p class="total-price">${t.productPrice*t.Quantity}</p>
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
              <button type="button"
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
    </div>`),numberWithCommas(),minusBtnProperty(),plusBtnProperty(),subTotal()}function numberWithCommas(){const t=document.querySelectorAll(".item-price p"),e=document.querySelectorAll(".total-price");document.querySelector("#subtotal-price");t.forEach(t=>{let e=t.textContent;e=parseInt(e);var n=e.toLocaleString(void 0,{minimumFractionDigits:2,maximumFractionDigits:2});t.innerText=n}),e.forEach(t=>{let e=t.textContent;e=parseInt(e);var n=e.toLocaleString(void 0,{minimumFractionDigits:2,maximumFractionDigits:2});t.innerText=n})}function minusBtnProperty(){const t=document.querySelectorAll(".minus-btn");t.forEach(t=>{t.nextElementSibling.classList.contains("quantity")&&1==t.nextElementSibling.value&&(t.setAttribute("disabled","disabled"),t.style.cursor="not-allowed")})}function plusBtnProperty(){const t=document.querySelectorAll(".plus-btn");t.forEach(t=>{t.previousElementSibling.classList.contains("quantity")&&t.previousElementSibling.value==t.previousElementSibling.max&&(t.setAttribute("disabled","disabled"),t.style.cursor="not-allowed")})}function minus(a){if(a.nextElementSibling.classList.contains("quantity")){var r=a.nextElementSibling.value,l=a.nextElementSibling.max;1==(a.nextElementSibling.value=--r)&&(a.setAttribute("disabled","disabled"),a.style.cursor="not-allowed"),r!=l&&(a.nextElementSibling.nextElementSibling.removeAttribute("disabled"),a.nextElementSibling.nextElementSibling.classList.remove("disabled"),a.nextElementSibling.nextElementSibling.style.cursor="pointer");let t=a.parentNode.previousElementSibling.childNodes[3].textContent;const c=a.parentNode.nextElementSibling.childNodes[3];let e=c.textContent;e=parseInt(e.replace(/,/g,"")),t=parseInt(t.replace(/,/g,"")),t=e-t,c.innerText=t.toLocaleString(void 0,{minimumFractionDigits:2,maximumFractionDigits:2});let n=a.parentNode.previousElementSibling.childNodes[3].textContent;n=parseInt(n.replace(/,/g,""));let i=document.querySelector("#subtotal-price");a=parseInt(i.textContent.replace(/,/g,""));let o=0;o=a-n,i.innerText=o.toLocaleString()}}function plus(a){if(a.previousElementSibling.classList.contains("quantity")){var r=a.previousElementSibling.value,l=a.previousElementSibling.max;1<(a.previousElementSibling.value=++r)&&(a.previousElementSibling.previousElementSibling.removeAttribute("disabled"),a.previousElementSibling.previousElementSibling.classList.remove("disabled"),a.previousElementSibling.previousElementSibling.style.cursor="pointer"),r==l&&(a.setAttribute("disabled","disabled"),a.style.cursor="not-allowed");let t=a.parentNode.previousElementSibling.childNodes[3].textContent;const c=a.parentNode.nextElementSibling.childNodes[3];let e=c.textContent;e=parseInt(e.replace(/,/g,"")),t=parseInt(t.replace(/,/g,"")),t=e+t,c.innerText=t.toLocaleString(void 0,{minimumFractionDigits:2,maximumFractionDigits:2});let n=a.parentNode.previousElementSibling.childNodes[3].textContent;n=parseInt(n.replace(/,/g,""));let i=document.querySelector("#subtotal-price");a=parseInt(i.textContent.replace(/,/g,""));let o=0;o=a+n,i.innerText=o.toLocaleString()}}function subTotal(){const t=document.querySelector("#subtotal-price"),e=document.querySelectorAll(".total-price");let n=0;e.forEach(t=>{totalPrice=parseInt(t.textContent.replace(/,/g,"")),n+=totalPrice}),t&&(t.innerText+=n.toLocaleString())}function removeItem(t){var e=localStorage.getItem("cartNumbers"),e=parseInt(e),n=localStorage.getItem("productsInCart"),n=JSON.parse(n);let i=t.parentNode.childNodes[1].value;t=t.previousElementSibling.previousElementSibling.childNodes[3].value;n=Object.values(n).filter(t=>t.itemCode!==i),e&&(localStorage.setItem("cartNumbers",e-t),document.querySelector("#counter").textContent=e-t),localStorage.setItem("productsInCart",JSON.stringify(n)),displayCart()}cartBtn&&cartBtn.addEventListener("click",()=>{setProducts(products)}),displayCart(),onLoadCartNumbers();