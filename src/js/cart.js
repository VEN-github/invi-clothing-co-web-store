let itemCode;
let productID;
let productImg;
let productName;
let productColor;
let sizeValue;
let productPrice;
let qty = 0;
let maxVal;

if (document.querySelector("#productID")) {
  productID = document.querySelector("#productID").value;
}
if (document.querySelector(".product-highlight img")) {
  productImg = document.querySelector(".product-highlight img").src;
}
if (document.querySelector(".product-name")) {
  productName = document.querySelector(".product-name").textContent;
}
if (document.querySelector("#productColor")) {
  productColor = document.querySelector("#productColor").textContent;
}
if (document.querySelector("#sizeOpt")) {
  const sizeForm = document.querySelector("#sizeOpt");
  sizeForm.addEventListener("change", selectSize);

  function selectSize(e) {
    e.preventDefault();

    sizeValue = sizeForm.options[sizeForm.selectedIndex].text;
    console.log(productName);
    console.log(sizeValue);
    products.productSize = sizeValue;
    products.itemCode = productName + " " + sizeValue;

    maxVal = sizeForm.options[sizeForm.selectedIndex].dataset.stock;
    maxVal = parseInt(maxVal);
    products.maxValue = maxVal;
  }
}
if (document.querySelector("#productPrice")) {
  productPrice = document.querySelector("#productPrice").textContent;
  productPrice = parseInt(productPrice.replace(/,/g, ""));
}
if (document.querySelector("#quantity")) {
  maxVal = document.querySelector("#quantity").max;
  maxVal = parseInt(maxVal);
}
if (sizeValue == undefined) {
  itemCode = productName;
}
let products = {
  itemCode: itemCode,
  productID: productID,
  productImage: productImg,
  productName: productName,
  productColor: productColor,
  productSize: sizeValue,
  productPrice: productPrice,
  Quantity: qty,
  NewQuantity: qty,
  maxValue: maxVal,
};
const cartBtn = document.querySelector("#cart-btn");
if (cartBtn) {
  cartBtn.addEventListener("click", () => {
    setProducts(products);
  });
}
function setProducts(product) {
  let cartItems = localStorage.getItem("productsInCart");
  cartItems = JSON.parse(cartItems);

  let qty = document.querySelector("#quantity").value;
  qty = parseInt(qty);
  console.log(qty);
  if (cartItems != null) {
    if (cartItems[product.itemCode] == undefined) {
      cartItems = {
        ...cartItems,
        [product.itemCode]: product,
      };
    }
    cartItems[product.itemCode].Quantity += qty;
    cartItems[product.itemCode].NewQuantity += qty;
  } else {
    product.Quantity = qty;
    product.NewQuantity = qty;
    cartItems = {
      [product.itemCode]: product,
    };
  }
  if (
    cartItems[product.itemCode].NewQuantity <=
    cartItems[product.itemCode].maxValue
  ) {
    localStorage.setItem("productsInCart", JSON.stringify(cartItems));
    cartNumbers();
    location.href = "cart.php";
  } else {
    Swal.fire({
      icon: "error",
      text: "Please select a value that is no more than " + product.maxValue,
    });
  }
}

function onLoadCartNumbers() {
  let productNumbers = localStorage.getItem("cartNumbers");

  if (productNumbers) {
    document.querySelector("#counter").textContent = productNumbers;
  }
}
function cartNumbers() {
  let productNumbers = localStorage.getItem("cartNumbers");
  productNumbers = parseInt(productNumbers);

  let qty = document.querySelector("#quantity").value;
  qty = parseInt(qty);

  if (productNumbers) {
    localStorage.setItem("cartNumbers", productNumbers + qty);
    document.querySelector("#counter").textContent = productNumbers + qty;
  } else {
    localStorage.setItem("cartNumbers", qty);
    document.querySelector("#counter").textContent = qty;
  }
}

function displayCart() {
  let cartItems = localStorage.getItem("productsInCart");
  cartItems = JSON.parse(cartItems);

  let cartPage = document.querySelector("#cart");
  if (cartItems === null || localStorage.getItem("cartNumbers") == 0) {
    if (cartPage) {
      cartPage.innerHTML = "";
      cartPage.innerHTML += `
      <div class="container">
        <div class="empty-cart">
          <img src="./assets/img/empty-cart.svg" alt="Empty Cart" />
          <div class="empty-cart-details">
            <h3>Your Cart is Currently Empty</h3>
            <p>Looks like you haven't added anything to cart yet</p>
          </div>
          <button><a href="shop.php" class="btn primary-btn">Shop Now</a></button>
        </div>
      </div>`;
    }
  } else if (cartPage) {
    cartPage.innerHTML = "";
    cartPage.innerHTML += `
    <div class="banner">Your Cart</div>
      <div class="container">
        <div class="cart-wrapper">
          <div class="cart-container">
            <div class="cart-header">
              <p class="label-item">Item</p>
              <p class="label-price">Price</p>
              <p class="label-quantity">Quantity</p>
              <p>Total</p>
            </div>`;
    Object.values(cartItems).map((item) => {
      if (item.productSize === undefined) {
        document.querySelector(".cart-container").innerHTML += `
        <div class="cart-items">
          <input type="hidden" class="item-ID" value="${item.productID}">
          <input type="hidden" class="item-code" value="${item.itemCode}">
          <img src="${item.productImage}" alt="${item.productImage}" />
          <div class="item-label">
            <p class="item-name">${item.productName}</p>
            <p>Color: <span class="item-color">${item.productColor}</span></p>
          </div>
          <div class="item-price">
            <span
              class="iconify peso-sign"
              data-icon="clarity:peso-line"
              data-inline="false"
            ></span>
            <p>${item.productPrice}</p>
          </div>
          <div class="item-quantity">
            <button type="button" class="minus-btn" onclick="minus(this)">-</button>
            <input
              class="qty-input quantity"
              type="number"
              name=""
              value="${item.NewQuantity}"
              min="1"
              max="${item.maxValue}"
            />
            <button type="button" class="plus-btn" onclick="plus(this)">+</button>
          </div>
          <div class="item-total">
            <span
              class="iconify peso-sign"
              data-icon="clarity:peso-line"
              data-inline="false"
            ></span>
            <p class="total-price">${item.productPrice * item.NewQuantity}</p>
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
            value="${item.Quantity}"
          />
        </div>`;
      } else {
        document.querySelector(".cart-container").innerHTML += `
        <div class="cart-items">
          <input type="hidden" class="item-ID" value="${item.productID}">
          <input type="hidden" class="item-code" value="${item.itemCode}">
          <img src="${item.productImage}" alt="${item.productImage}" />
          <div class="item-label">
            <p class="item-name">${item.productName}</p>
            <p>Color: <span class="item-color">${item.productColor}</span></p>
            <p>Size: <span class="item-size">${item.productSize}</span></p>
          </div>
          <div class="item-price">
            <span
              class="iconify peso-sign"
              data-icon="clarity:peso-line"
              data-inline="false"
            ></span>
            <p>${item.productPrice}</p>
          </div>
          <div class="item-quantity">
            <button type="button" class="minus-btn" onclick="minus(this)">-</button>
            <input
              class="qty-input quantity"
              type="number"
              name=""
              value="${item.NewQuantity}"
              min="1"
              max="${item.maxValue}"
            />
            <button type="button" class="plus-btn" onclick="plus(this)">+</button>
          </div>
          <div class="item-total">
            <span
              class="iconify peso-sign"
              data-icon="clarity:peso-line"
              data-inline="false"
            ></span>
            <p class="total-price">${item.productPrice * item.NewQuantity}</p>
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
            value="${item.Quantity}"
          />
        </div>`;
      }
    });
    document.querySelector(".cart-container").innerHTML += `
      <div class="cont-shop"><a href="shop.php">< Continue Shopping</a></div>
    </div>`;
    document.querySelector(".cart-wrapper").innerHTML += `
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
    </div>`;
  }
  numberWithCommas();
  minusBtnProperty();
  plusBtnProperty();
  subTotal();
}
function numberWithCommas() {
  const price = document.querySelectorAll(".item-price p");
  const totalPrice = document.querySelectorAll(".total-price");

  price.forEach((p) => {
    let originalPrice = p.textContent;
    originalPrice = parseInt(originalPrice);
    let price = originalPrice.toLocaleString(undefined, {
      minimumFractionDigits: 2,
      maximumFractionDigits: 2,
    });
    p.innerText = price;
  });
  totalPrice.forEach((tP) => {
    let total = tP.textContent;
    total = parseInt(total);
    let totalPrice = total.toLocaleString(undefined, {
      minimumFractionDigits: 2,
      maximumFractionDigits: 2,
    });
    tP.innerText = totalPrice;
  });
}
function minusBtnProperty() {
  const minusBtn = document.querySelectorAll(".minus-btn");

  minusBtn.forEach((e) => {
    if (e.nextElementSibling.classList.contains("quantity")) {
      let valueCount = e.nextElementSibling.value;

      if (valueCount == 1) {
        e.setAttribute("disabled", "disabled");
        e.style.cursor = "not-allowed";
      }
    }
  });
}

function plusBtnProperty() {
  const plusBtn = document.querySelectorAll(".plus-btn");

  plusBtn.forEach((e) => {
    if (e.previousElementSibling.classList.contains("quantity")) {
      let valueCount = e.previousElementSibling.value;
      let maxValue = e.previousElementSibling.max;

      if (valueCount == maxValue) {
        e.setAttribute("disabled", "disabled");
        e.style.cursor = "not-allowed";
      }
    }
  });
}

function minus(e) {
  if (e.nextElementSibling.classList.contains("quantity")) {
    let valueCount = e.nextElementSibling.value;
    let maxValue = e.nextElementSibling.max;

    valueCount--;
    e.nextElementSibling.value = valueCount;

    if (valueCount == 1) {
      e.setAttribute("disabled", "disabled");
      e.style.cursor = "not-allowed";
    }
    if (valueCount != maxValue) {
      e.nextElementSibling.nextElementSibling.removeAttribute("disabled");
      e.nextElementSibling.nextElementSibling.classList.remove("disabled");
      e.nextElementSibling.nextElementSibling.style.cursor = "pointer";
    }

    let price = e.parentNode.previousElementSibling.childNodes[3].textContent;
    const totalPrice = e.parentNode.nextElementSibling.childNodes[3];
    let total = totalPrice.textContent;
    total = parseInt(total.replace(/,/g, ""));
    price = parseInt(price.replace(/,/g, ""));

    price = total - price;
    totalPrice.innerText = price.toLocaleString(undefined, {
      minimumFractionDigits: 2,
      maximumFractionDigits: 2,
    });

    let originalPrice =
      e.parentNode.previousElementSibling.childNodes[3].textContent;
    originalPrice = parseInt(originalPrice.replace(/,/g, ""));
    let subtotal = document.querySelector("#subtotal-price");
    let subTotal = parseInt(subtotal.textContent.replace(/,/g, ""));

    let addedPrice = 0;
    addedPrice = subTotal - originalPrice;
    subtotal.innerText = addedPrice.toLocaleString();
  }
}
function plus(e) {
  if (e.previousElementSibling.classList.contains("quantity")) {
    let valueCount = e.previousElementSibling.value;
    let maxValue = e.previousElementSibling.max;
    valueCount++;

    e.previousElementSibling.value = valueCount;

    if (valueCount > 1) {
      e.previousElementSibling.previousElementSibling.removeAttribute(
        "disabled"
      );
      e.previousElementSibling.previousElementSibling.classList.remove(
        "disabled"
      );
      e.previousElementSibling.previousElementSibling.style.cursor = "pointer";
    }
    if (valueCount == maxValue) {
      e.setAttribute("disabled", "disabled");
      e.style.cursor = "not-allowed";
    }

    let price = e.parentNode.previousElementSibling.childNodes[3].textContent;
    const totalPrice = e.parentNode.nextElementSibling.childNodes[3];
    let total = totalPrice.textContent;
    total = parseInt(total.replace(/,/g, ""));
    price = parseInt(price.replace(/,/g, ""));
    price = total + price;
    totalPrice.innerText = price.toLocaleString(undefined, {
      minimumFractionDigits: 2,
      maximumFractionDigits: 2,
    });

    let originalPrice =
      e.parentNode.previousElementSibling.childNodes[3].textContent;

    originalPrice = parseInt(originalPrice.replace(/,/g, ""));
    let subtotal = document.querySelector("#subtotal-price");
    let subTotal = parseInt(subtotal.textContent.replace(/,/g, ""));
    let addedPrice = 0;
    addedPrice = subTotal + originalPrice;

    subtotal.innerText = addedPrice.toLocaleString();
  }
}

function subTotal() {
  const subtotal = document.querySelector("#subtotal-price");
  const total = document.querySelectorAll(".total-price");
  let subTotal = 0;
  total.forEach((t) => {
    totalPrice = parseInt(t.textContent.replace(/,/g, ""));
    subTotal += totalPrice;
  });
  if (subtotal) {
    subtotal.innerText += subTotal.toLocaleString();
  }
}

function removeItem(btn) {
  let productNumbers = localStorage.getItem("cartNumbers");
  productNumbers = parseInt(productNumbers);

  let cartItems = localStorage["productsInCart"];
  cartItems = JSON.parse(cartItems);
  let itemCode = btn.parentNode.childNodes[3].value;
  let qty = btn.nextElementSibling.value;

  cartItems = Object.values(cartItems).filter(
    (product) => product.itemCode !== itemCode
  );

  if (productNumbers) {
    localStorage.setItem("cartNumbers", productNumbers - qty);
    document.querySelector("#counter").textContent = productNumbers - qty;
  }
  localStorage.setItem("productsInCart", JSON.stringify(cartItems));
  displayCart();
}

function checkoutItems() {
  const cart = document.querySelectorAll(".cart-items");

  for (let i = 0; i < cart.length; i++) {
    let cartItems = localStorage.getItem("productsInCart");
    cartItems = JSON.parse(cartItems);
    let itemID = document.querySelectorAll(".item-ID")[i].value;
    let itemCode = document.querySelectorAll(".item-code")[i].value;
    let itemImg = document.querySelectorAll(".cart-items img")[i].src;
    let itemName = document.querySelectorAll(".item-name")[i].textContent;
    let itemColor = document.querySelectorAll(".item-color")[i].textContent;
    let itemSize;
    let itemPrice = document.querySelectorAll(".item-price p")[i].textContent;
    itemPrice = parseInt(itemPrice.replace(/,/g, ""));
    let itemQty = document.querySelectorAll(".qty")[i].value;
    itemQty = parseInt(itemQty);
    let itemNewQty = document.querySelectorAll(".quantity")[i].value;
    itemNewQty = parseInt(itemNewQty);
    let itemMaxValue = document.querySelectorAll(".quantity")[i].max;
    itemMaxValue = parseInt(itemMaxValue);
    if (
      cart[i].children[3].lastElementChild.children[0].classList.contains(
        "item-size"
      )
    ) {
      itemSize = cart[i].children[3].lastElementChild.children[0].textContent;
    }
    let products = {
      itemCode: itemCode,
      productID: itemID,
      productImage: itemImg,
      productName: itemName,
      productColor: itemColor,
      productSize: itemSize,
      productPrice: itemPrice,
      Quantity: itemQty,
      NewQuantity: itemNewQty,
      maxValue: itemMaxValue,
    };
    if (cartItems[products.itemCode] == undefined) {
      cartItems = {
        ...cartItems,
        [i]: products,
      };
    } else {
      cartItems = {
        ...cartItems,
        [products.itemCode]: products,
      };
    }
    localStorage.setItem("productsInCart", JSON.stringify(cartItems));
  }
  totalCost();
}

function totalCost() {
  const subtotal = document.querySelector("#subtotal-price").textContent;

  localStorage.setItem("totalCost", subtotal);
}
displayCart();
onLoadCartNumbers();
