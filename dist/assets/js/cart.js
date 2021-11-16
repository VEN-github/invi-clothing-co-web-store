let itemCode,productID,productImg,productName,productColor,stockID,sizeValue,productPrice,qty=0,maxVal;if(document.querySelector("#productID")&&(productID=document.querySelector("#productID").value),document.querySelector(".product-highlight img")&&(productImg=document.querySelector(".product-highlight img").src),document.querySelector(".product-name")&&(productName=document.querySelector(".product-name").textContent),document.querySelector("#productColor")&&(productColor=document.querySelector("#productColor").textContent),document.querySelector("#sizeOpt")){const a=document.querySelector("#sizeOpt");function selectSize(t){t.preventDefault(),sizeValue=a.options[a.selectedIndex].text,stockID=a.options[a.selectedIndex].value,products.productSize=sizeValue,products.stockID=stockID,products.itemCode=productName+" "+productColor+" "+sizeValue,maxVal=a.options[a.selectedIndex].dataset.stock,maxVal=parseInt(maxVal),products.maxValue=maxVal}a.addEventListener("change",selectSize)}document.querySelector("#stockID")&&(stockID=document.querySelector("#stockID").value),document.querySelector("#productPrice")&&(productPrice=document.querySelector("#productPrice").textContent,productPrice=parseInt(productPrice.replace(/,/g,""))),document.querySelector("#quantity")&&(maxVal=document.querySelector("#quantity").max,maxVal=parseInt(maxVal)),null==sizeValue&&(itemCode=productName+" "+productColor);let products={itemCode:itemCode,productID:productID,productImage:productImg,productName:productName,productColor:productColor,stockID:stockID,productSize:sizeValue,productPrice:productPrice,Quantity:qty,NewQuantity:qty,maxValue:maxVal};const cartBtn=document.querySelector("#cart-btn");function setProducts(t){let e=localStorage.getItem("productsInCart");e=JSON.parse(e);var n=document.querySelector("#quantity").value,n=parseInt(n);null!=e?(null==e[t.itemCode]&&(e={...e,[t.itemCode]:t}),e[t.itemCode].Quantity+=n,e[t.itemCode].NewQuantity+=n):(t.Quantity=n,t.NewQuantity=n,e={[t.itemCode]:t}),e[t.itemCode].NewQuantity<=e[t.itemCode].maxValue?(localStorage.setItem("productsInCart",JSON.stringify(e)),cartNumbers(),location.href="cart.php"):Swal.fire({icon:"error",text:"Please select a value that is no more than "+t.maxValue})}function onLoadCartNumbers(){var t=localStorage.getItem("cartNumbers");t&&(document.querySelector("#counter").textContent=t)}function cartNumbers(){var t=localStorage.getItem("cartNumbers"),t=parseInt(t),e=document.querySelector("#quantity").value,e=parseInt(e);t?(localStorage.setItem("cartNumbers",t+e),document.querySelector("#counter").textContent=t+e):(localStorage.setItem("cartNumbers",e),document.querySelector("#counter").textContent=e)}function displayCart(){var t=localStorage.getItem("productsInCart"),t=JSON.parse(t);let e=document.querySelector("#cart");null===t||0==localStorage.getItem("cartNumbers")?e&&(e.innerHTML="",e.innerHTML+=`
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
          <input type="hidden" class="item-ID" value="${t.productID}">
          <input type="hidden" class="item-code" value="${t.itemCode}">
          <input type="hidden" class="stock-ID" value="${t.stockID}">
          <div class="item-info">
            <img src="${t.productImage}" alt="${t.productImage}" />
            <div class="item-label">
              <p class="item-name">${t.productName}</p>
              <p>Color: <span class="item-color">${t.productColor}</span></p>
            </div>
          </div>
          <div class="item-price">
            <span>Price</span>
            <div class="price-container">
              <span
                class="iconify peso-sign"
                data-icon="clarity:peso-line"
                data-inline="false"
              ></span>
              <p>${t.productPrice}</p>
            </div>
          </div>
          <div class="item-quantity">
            <span>Quantity</span>
            <div class="qty-container">
              <button type="button" class="minus-btn" onclick="minus(this)">-</button>
              <input
                class="qty-input quantity"
                type="number"
                name=""
                value="${t.NewQuantity}"
                min="1"
                max="${t.maxValue}"
              />
              <button type="button" class="plus-btn" onclick="plus(this)">+</button>
            </div>
          </div>
          <div class="item-total">
            <span>Total</span>
            <div class="price-container">
              <span
                class="iconify peso-sign"
                data-icon="clarity:peso-line"
                data-inline="false"
              ></span>
              <p class="total-price">${t.productPrice*t.NewQuantity}</p>
            </div>
          </div>
          <div class="del-btn">
            <span>Action</span>
            <button type="button" onclick="removeItem(this)">
              <span
                class="iconify del-icon"
                data-icon="carbon:trash-can"
                data-inline="false"
              ></span>
            </button>
          </div>
          <input
            type="hidden"
            class="qty"
            value="${t.Quantity}"
          />
        </div>`:document.querySelector(".cart-container").innerHTML+=`
        <div class="cart-items">
          <input type="hidden" class="item-ID" value="${t.productID}">
          <input type="hidden" class="item-code" value="${t.itemCode}">
          <input type="hidden" class="stock-ID" value="${t.stockID}">
          <div class="item-info">
            <img src="${t.productImage}" alt="${t.productImage}" />
            <div class="item-label">
              <p class="item-name">${t.productName}</p>
              <p>Color: <span class="item-color">${t.productColor}</span></p>
              <p>Size: <span class="item-size">${t.productSize}</span></p>
            </div>
          </div>
          <div class="item-price">
            <span>Price</span>
              <div class="price-container">
              <span
                class="iconify peso-sign"
                data-icon="clarity:peso-line"
                data-inline="false"
              ></span>
              <p>${t.productPrice}</p>
            </div>
          </div>
          <div class="item-quantity">
            <span>Quantity</span>
            <div class="qty-container">
              <button type="button" class="minus-btn" onclick="minus(this)">-</button>
              <input
                class="qty-input quantity"
                type="number"
                name=""
                value="${t.NewQuantity}"
                min="1"
                max="${t.maxValue}"
              />
              <button type="button" class="plus-btn" onclick="plus(this)">+</button>
            </div>
          </div>
          <div class="item-total">
            <span>Total</span>
            <div class="price-container">
              <span
                class="iconify peso-sign"
                data-icon="clarity:peso-line"
                data-inline="false"
              ></span>
              <p class="total-price">${t.productPrice*t.NewQuantity}</p>
            </div>
          </div>
          <div class="del-btn">
            <span>Action</span>
            <button type="button" onclick="removeItem(this)">
              <span
                class="iconify del-icon"
                data-icon="carbon:trash-can"
                data-inline="false"
              ></span>
            </button>
          </div>
          <input
            type="hidden"
            class="qty"
            value="${t.Quantity}"
          />
        </div>`}),document.querySelector(".cart-container").innerHTML+=`
      <div class="cont-shop"><a href="shop.php">< Continue Shopping</a></div>
    </div>`,document.querySelector(".cart-wrapper").innerHTML+=`
        <div class="order-summary">
          <h4>Order Summary</h4>
          <p>
            Shipping will be calculated at checkout.
          </p>
          <div class="note">
            <p>Shipping options</p>
            <div class="ship-opt">
              <span class="bold">Standard Delivery:</span>
              <span>Est. Arrival: 2-3 Days (Metro Manila), 5-7 Days (Outside Metro Manila)</span>
              <span class="bold">Express Delivery:</span>
              <span>Est. Arrival: Same Day (Within Metro Manila 8:00am - 3:00pm only)</span>
            </div>
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
                onclick="checkoutItems(this)"
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
    </div>`),numberWithCommas(),minusBtnProperty(),plusBtnProperty(),subTotal()}function numberWithCommas(){const t=document.querySelectorAll(".item-price p"),e=document.querySelectorAll(".total-price");t.forEach(t=>{let e=t.textContent;e=parseInt(e);var n=e.toLocaleString(void 0,{minimumFractionDigits:2,maximumFractionDigits:2});t.innerText=n}),e.forEach(t=>{let e=t.textContent;e=parseInt(e);var n=e.toLocaleString(void 0,{minimumFractionDigits:2,maximumFractionDigits:2});t.innerText=n})}function minusBtnProperty(){const t=document.querySelectorAll(".minus-btn");t.forEach(t=>{t.nextElementSibling.classList.contains("quantity")&&1==t.nextElementSibling.value&&(t.setAttribute("disabled","disabled"),t.style.cursor="not-allowed")})}function plusBtnProperty(){const t=document.querySelectorAll(".plus-btn");t.forEach(t=>{t.previousElementSibling.classList.contains("quantity")&&t.previousElementSibling.value==t.previousElementSibling.max&&(t.setAttribute("disabled","disabled"),t.style.cursor="not-allowed")})}function minus(o){if(o.nextElementSibling.classList.contains("quantity")){var r=o.nextElementSibling.value,l=o.nextElementSibling.max;1==(o.nextElementSibling.value=--r)&&(o.setAttribute("disabled","disabled"),o.style.cursor="not-allowed"),r!=l&&(o.nextElementSibling.nextElementSibling.removeAttribute("disabled"),o.nextElementSibling.nextElementSibling.classList.remove("disabled"),o.nextElementSibling.nextElementSibling.style.cursor="pointer");let t=o.parentNode.parentNode.previousElementSibling.childNodes[3].textContent;const c=o.parentNode.parentNode.nextElementSibling.childNodes[3].lastElementChild;let e=c.textContent;e=parseInt(e.replace(/,/g,"")),t=parseInt(t.replace(/,/g,"")),t=e-t,c.innerText=t.toLocaleString(void 0,{minimumFractionDigits:2,maximumFractionDigits:2});let n=o.parentNode.parentNode.previousElementSibling.childNodes[3].textContent;n=parseInt(n.replace(/,/g,""));let a=document.querySelector("#subtotal-price");o=parseInt(a.textContent.replace(/,/g,""));let i=0;i=o-n,a.innerText=i.toLocaleString()}}function plus(o){if(o.previousElementSibling.classList.contains("quantity")){var r=o.previousElementSibling.value,l=o.previousElementSibling.max;1<(o.previousElementSibling.value=++r)&&(o.previousElementSibling.previousElementSibling.removeAttribute("disabled"),o.previousElementSibling.previousElementSibling.classList.remove("disabled"),o.previousElementSibling.previousElementSibling.style.cursor="pointer"),r==l&&(o.setAttribute("disabled","disabled"),o.style.cursor="not-allowed");let t=o.parentNode.parentNode.previousElementSibling.childNodes[3].textContent;const c=o.parentNode.parentNode.nextElementSibling.childNodes[3].lastElementChild;let e=c.textContent;e=parseInt(e.replace(/,/g,"")),t=parseInt(t.replace(/,/g,"")),t=e+t,c.innerText=t.toLocaleString(void 0,{minimumFractionDigits:2,maximumFractionDigits:2});let n=o.parentNode.parentNode.previousElementSibling.childNodes[3].textContent;n=parseInt(n.replace(/,/g,""));let a=document.querySelector("#subtotal-price");o=parseInt(a.textContent.replace(/,/g,""));let i=0;i=o+n,a.innerText=i.toLocaleString()}}function subTotal(){const t=document.querySelector("#subtotal-price"),e=document.querySelectorAll(".total-price");let n=0;e.forEach(t=>{totalPrice=parseInt(t.textContent.replace(/,/g,"")),n+=totalPrice}),t&&(t.innerText+=n.toLocaleString())}function removeItem(t){var e=localStorage.getItem("cartNumbers"),e=parseInt(e),n=localStorage.productsInCart,n=JSON.parse(n);let a=t.parentNode.parentNode.childNodes[3].value;t=t.parentNode.nextElementSibling.value;n=Object.values(n).filter(t=>t.itemCode!==a),e&&(localStorage.setItem("cartNumbers",e-t),document.querySelector("#counter").textContent=e-t),localStorage.setItem("productsInCart",JSON.stringify(n)),displayCart()}function checkoutItems(){const i=document.querySelectorAll(".cart-items");for(let a=0;a<i.length;a++){let t=localStorage.getItem("productsInCart");t=JSON.parse(t);var o=document.querySelectorAll(".item-ID")[a].value,r=document.querySelectorAll(".item-code")[a].value,l=document.querySelectorAll(".stock-ID")[a].value,c=document.querySelectorAll(".item-info img")[a].src,s=document.querySelectorAll(".item-name")[a].textContent,u=document.querySelectorAll(".item-color")[a].textContent;let e,n=document.querySelectorAll(".item-price p")[a].textContent;n=parseInt(n.replace(/,/g,""));var d=document.querySelectorAll(".qty")[a].value,d=parseInt(d),p=document.querySelectorAll(".quantity")[a].value,p=parseInt(p),m=document.querySelectorAll(".quantity")[a].max,m=parseInt(m);i[a].children[3].children[1].lastElementChild.children[0].classList.contains("item-size")&&(e=i[a].children[3].children[1].lastElementChild.children[0].textContent);m={itemCode:r,productID:o,productImage:c,productName:s,productColor:u,stockID:l,productSize:e,productPrice:n,Quantity:d,NewQuantity:p,maxValue:m};t=null==t[m.itemCode]?{...t,[a]:m}:{...t,[m.itemCode]:m},localStorage.setItem("productsInCart",JSON.stringify(t)),localStorage.removeItem("shippingFee"),localStorage.removeItem("total")}totalCost()}function totalCost(){var t=document.querySelector("#subtotal-price").textContent;localStorage.setItem("totalCost",t)}cartBtn&&cartBtn.addEventListener("click",()=>{setProducts(products)}),displayCart(),onLoadCartNumbers();