let itemCode,productID,productImg,productName,productColor,sizeValue,productPrice,qty=0,maxVal;if(document.querySelector("#productID")&&(productID=document.querySelector("#productID").value),document.querySelector(".product-highlight img")&&(productImg=document.querySelector(".product-highlight img").src),document.querySelector(".product-name")&&(productName=document.querySelector(".product-name").textContent),document.querySelector("#productColor")&&(productColor=document.querySelector("#productColor").textContent),document.querySelector("#sizeOpt")){const a=document.querySelector("#sizeOpt");function selectSize(t){t.preventDefault(),sizeValue=a.options[a.selectedIndex].text,console.log(productName),console.log(sizeValue),products.productSize=sizeValue,products.itemCode=productName+" "+sizeValue,maxVal=a.options[a.selectedIndex].dataset.stock,maxVal=parseInt(maxVal),products.maxValue=maxVal}a.addEventListener("change",selectSize)}document.querySelector("#productPrice")&&(productPrice=document.querySelector("#productPrice").textContent,productPrice=parseInt(productPrice.replace(/,/g,""))),document.querySelector("#quantity")&&(maxVal=document.querySelector("#quantity").max,maxVal=parseInt(maxVal)),null==sizeValue&&(itemCode=productName);let products={itemCode:itemCode,productID:productID,productImage:productImg,productName:productName,productColor:productColor,productSize:sizeValue,productPrice:productPrice,Quantity:qty,NewQuantity:qty,maxValue:maxVal};const cartBtn=document.querySelector("#cart-btn");function setProducts(t){let e=localStorage.getItem("productsInCart");e=JSON.parse(e);var n=document.querySelector("#quantity").value,n=parseInt(n);console.log(n),null!=e?(null==e[t.itemCode]&&(e={...e,[t.itemCode]:t}),e[t.itemCode].Quantity+=n,e[t.itemCode].NewQuantity+=n):(t.Quantity=n,t.NewQuantity=n,e={[t.itemCode]:t}),e[t.itemCode].NewQuantity<=e[t.itemCode].maxValue?(localStorage.setItem("productsInCart",JSON.stringify(e)),cartNumbers(),location.href="cart.php"):Swal.fire({icon:"error",text:"Please select a value that is no more than "+t.maxValue})}function onLoadCartNumbers(){var t=localStorage.getItem("cartNumbers");t&&(document.querySelector("#counter").textContent=t)}function cartNumbers(){var t=localStorage.getItem("cartNumbers"),t=parseInt(t),e=document.querySelector("#quantity").value,e=parseInt(e);t?(localStorage.setItem("cartNumbers",t+e),document.querySelector("#counter").textContent=t+e):(localStorage.setItem("cartNumbers",e),document.querySelector("#counter").textContent=e)}function displayCart(){var t=localStorage.getItem("productsInCart"),t=JSON.parse(t);let e=document.querySelector("#cart");null===t||0==localStorage.getItem("cartNumbers")?e&&(e.innerHTML="",e.innerHTML+=`
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
            <p>${t.productPrice}</p>
          </div>
          <div class="item-quantity">
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
          <div class="item-total">
            <span
              class="iconify peso-sign"
              data-icon="clarity:peso-line"
              data-inline="false"
            ></span>
            <p class="total-price">${t.productPrice*t.NewQuantity}</p>
          </div>
          <button type="button" onclick="removeItem(this)">
            <span
              class="iconify del-icon"
              data-icon="carbon:trash-can"
              data-inline="false"
            ></span>
          </button>
          <input
            type="hidden"
            class="qty"
            value="${t.Quantity}"
          />
        </div>`:document.querySelector(".cart-container").innerHTML+=`
        <div class="cart-items">
          <input type="hidden" class="item-ID" value="${t.productID}">
          <input type="hidden" class="item-code" value="${t.itemCode}">
          <img src="${t.productImage}" alt="${t.productImage}" />
          <div class="item-label">
            <p class="item-name">${t.productName}</p>
            <p>Color: <span class="item-color">${t.productColor}</span></p>
            <p>Size: <span class="item-size">${t.productSize}</span></p>
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
              value="${t.NewQuantity}"
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
            <p class="total-price">${t.productPrice*t.NewQuantity}</p>
          </div>
          <button type="button" onclick="removeItem(this)">
            <span
              class="iconify del-icon"
              data-icon="carbon:trash-can"
              data-inline="false"
            ></span>
          </button>
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
    </div>`),numberWithCommas(),minusBtnProperty(),plusBtnProperty(),subTotal()}function numberWithCommas(){const t=document.querySelectorAll(".item-price p"),e=document.querySelectorAll(".total-price");t.forEach(t=>{let e=t.textContent;e=parseInt(e);var n=e.toLocaleString(void 0,{minimumFractionDigits:2,maximumFractionDigits:2});t.innerText=n}),e.forEach(t=>{let e=t.textContent;e=parseInt(e);var n=e.toLocaleString(void 0,{minimumFractionDigits:2,maximumFractionDigits:2});t.innerText=n})}function minusBtnProperty(){const t=document.querySelectorAll(".minus-btn");t.forEach(t=>{t.nextElementSibling.classList.contains("quantity")&&1==t.nextElementSibling.value&&(t.setAttribute("disabled","disabled"),t.style.cursor="not-allowed")})}function plusBtnProperty(){const t=document.querySelectorAll(".plus-btn");t.forEach(t=>{t.previousElementSibling.classList.contains("quantity")&&t.previousElementSibling.value==t.previousElementSibling.max&&(t.setAttribute("disabled","disabled"),t.style.cursor="not-allowed")})}function minus(a){if(a.nextElementSibling.classList.contains("quantity")){var r=a.nextElementSibling.value,l=a.nextElementSibling.max;1==(a.nextElementSibling.value=--r)&&(a.setAttribute("disabled","disabled"),a.style.cursor="not-allowed"),r!=l&&(a.nextElementSibling.nextElementSibling.removeAttribute("disabled"),a.nextElementSibling.nextElementSibling.classList.remove("disabled"),a.nextElementSibling.nextElementSibling.style.cursor="pointer");let t=a.parentNode.previousElementSibling.childNodes[3].textContent;const c=a.parentNode.nextElementSibling.childNodes[3];let e=c.textContent;e=parseInt(e.replace(/,/g,"")),t=parseInt(t.replace(/,/g,"")),t=e-t,c.innerText=t.toLocaleString(void 0,{minimumFractionDigits:2,maximumFractionDigits:2});let n=a.parentNode.previousElementSibling.childNodes[3].textContent;n=parseInt(n.replace(/,/g,""));let o=document.querySelector("#subtotal-price");a=parseInt(o.textContent.replace(/,/g,""));let i=0;i=a-n,o.innerText=i.toLocaleString()}}function plus(a){if(a.previousElementSibling.classList.contains("quantity")){var r=a.previousElementSibling.value,l=a.previousElementSibling.max;1<(a.previousElementSibling.value=++r)&&(a.previousElementSibling.previousElementSibling.removeAttribute("disabled"),a.previousElementSibling.previousElementSibling.classList.remove("disabled"),a.previousElementSibling.previousElementSibling.style.cursor="pointer"),r==l&&(a.setAttribute("disabled","disabled"),a.style.cursor="not-allowed");let t=a.parentNode.previousElementSibling.childNodes[3].textContent;const c=a.parentNode.nextElementSibling.childNodes[3];let e=c.textContent;e=parseInt(e.replace(/,/g,"")),t=parseInt(t.replace(/,/g,"")),t=e+t,c.innerText=t.toLocaleString(void 0,{minimumFractionDigits:2,maximumFractionDigits:2});let n=a.parentNode.previousElementSibling.childNodes[3].textContent;n=parseInt(n.replace(/,/g,""));let o=document.querySelector("#subtotal-price");a=parseInt(o.textContent.replace(/,/g,""));let i=0;i=a+n,o.innerText=i.toLocaleString()}}function subTotal(){const t=document.querySelector("#subtotal-price"),e=document.querySelectorAll(".total-price");let n=0;e.forEach(t=>{totalPrice=parseInt(t.textContent.replace(/,/g,"")),n+=totalPrice}),t&&(t.innerText+=n.toLocaleString())}function removeItem(t){var e=localStorage.getItem("cartNumbers"),e=parseInt(e),n=localStorage.productsInCart,n=JSON.parse(n);let o=t.parentNode.childNodes[3].value;t=t.nextElementSibling.value;n=Object.values(n).filter(t=>t.itemCode!==o),e&&(localStorage.setItem("cartNumbers",e-t),document.querySelector("#counter").textContent=e-t),localStorage.setItem("productsInCart",JSON.stringify(n)),displayCart()}function checkoutItems(){const i=document.querySelectorAll(".cart-items");for(let o=0;o<i.length;o++){let t=localStorage.getItem("productsInCart");t=JSON.parse(t);var a=document.querySelectorAll(".item-ID")[o].value,r=document.querySelectorAll(".item-code")[o].value,l=document.querySelectorAll(".cart-items img")[o].src,c=document.querySelectorAll(".item-name")[o].textContent,s=document.querySelectorAll(".item-color")[o].textContent;let e,n=document.querySelectorAll(".item-price p")[o].textContent;n=parseInt(n.replace(/,/g,""));var u=document.querySelectorAll(".qty")[o].value,u=parseInt(u),d=document.querySelectorAll(".quantity")[o].value,d=parseInt(d),p=document.querySelectorAll(".quantity")[o].max,p=parseInt(p);i[o].children[3].lastElementChild.children[0].classList.contains("item-size")&&(e=i[o].children[3].lastElementChild.children[0].textContent);p={itemCode:r,productID:a,productImage:l,productName:c,productColor:s,productSize:e,productPrice:n,Quantity:u,NewQuantity:d,maxValue:p};t=null==t[p.itemCode]?{...t,[o]:p}:{...t,[p.itemCode]:p},localStorage.setItem("productsInCart",JSON.stringify(t))}totalCost()}function totalCost(){var t=document.querySelector("#subtotal-price").textContent;localStorage.setItem("totalCost",t)}cartBtn&&cartBtn.addEventListener("click",()=>{setProducts(products)}),displayCart(),onLoadCartNumbers();