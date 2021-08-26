const cartBtn = document.querySelector("#cart-btn");

let products = [];

if (cartBtn) {
  cartBtn.addEventListener("click", () => {
    cartNumbers(products);
  });
}

function onLoadCartNumbers() {
  let productNumbers = localStorage.getItem("cartNumbers");

  if (productNumbers) {
    document.querySelector("#counter").textContent = productNumbers;
  }
}
function cartNumbers(product) {
  let productNumbers = localStorage.getItem("cartNumbers");

  productNumbers = parseInt(productNumbers);

  if (productNumbers) {
    localStorage.setItem("cartNumbers", productNumbers + 1);
    document.querySelector("#counter").textContent = productNumbers + 1;
  } else {
    localStorage.setItem("cartNumbers", 1);
    document.querySelector("#counter").textContent = 1;
  }
  setProducts(product);
}

function setProducts(product) {
  const productID = document.querySelector("#productID").value;
  const productImg = document.querySelector(".product-highlight img").src;
  const productName = document.querySelector(".product-name").textContent;
  let productPrice = document.querySelector("#productPrice").textContent;
  productPrice = parseInt(productPrice);
  const productColor = document.querySelector("#productColor").textContent;
  const productSize = document.querySelector("#sizeOpt");
  let qty = document.querySelector("#quantity").value;
  qty = parseInt(qty);
  let sizeValue;
  let itemID = document.querySelector("#counter").textContent;
  itemID = parseInt(itemID);
  if (productSize) {
    sizeValue = productSize.value;
  }
  let cartItems = localStorage.getItem("productsInCart");
  cartItems = JSON.parse(cartItems);

  cartItems.push({
    itemID: itemID,
    productID: productID,
    productImage: productImg,
    productName: productName,
    productColor: productColor,
    productSize: sizeValue,
    productPrice: productPrice,
    Quantity: qty,
  });
  localStorage.setItem("productsInCart", JSON.stringify(cartItems));
}

function displayCart() {
  let cartItems = localStorage.getItem("productsInCart");
  cartItems = JSON.parse(cartItems);

  let cartPage = document.querySelector("#cart");
  if (
    cartItems === null ||
    (localStorage.getItem("cartNumbers") == 0 && cartPage)
  ) {
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
          <input type="hidden" value="${item.itemID}">
          <img src="${item.productImage}" alt="${item.productImage}" />
          <div class="item-label">
            <p class="item-name">${item.productName}</p>
            <p>Color: ${item.productColor}</p>
          </div>
          <div class="item-price">
            <span
              class="iconify peso-sign"
              data-icon="clarity:peso-line"
              data-inline="false"
            ></span>
            <p>${item.productPrice}.00</p>
          </div>
          <div class="item-quantity">
            <button type="button" class="minus-btn" onclick="minus(this)">-</button>
            <input
              class="qty-input quantity"
              type="number"
              name=""
              value="${item.Quantity}"
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
            <p class="total-price">${item.productPrice * item.Quantity}.00</p>
          </div>
          <button type="button" onclick="removeItem(this)">
            <span
              class="iconify del-icon"
              data-icon="carbon:trash-can"
              data-inline="false"
            ></span>
          </button>
        </div>`;
      } else {
        document.querySelector(".cart-container").innerHTML += `
        <div class="cart-items">
          <input type="hidden" value="${item.itemID}">
          <img src="${item.productImage}" alt="${item.productImage}" />
          <div class="item-label">
            <p class="item-name">${item.productName}</p>
            <p>Color: ${item.productColor}</p>
            <p class="item-size">Size: ${item.productSize}</p>
          </div>
          <div class="item-price">
            <span
              class="iconify peso-sign"
              data-icon="clarity:peso-line"
              data-inline="false"
            ></span>
            <p>${item.productPrice}.00</p>
          </div>
          <div class="item-quantity">
            <button type="button" class="minus-btn" onclick="minus(this)">-</button>
            <input
              class="qty-input quantity"
              type="number"
              name=""
              value="${item.Quantity}"
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
            <p class="total-price">${item.productPrice * item.Quantity}.00</p>
          </div>
          <button type="button" onclick="removeItem(this)">
            <span
              class="iconify del-icon"
              data-icon="carbon:trash-can"
              data-inline="false"
            ></span>
          </button>
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
    </div>`;
  }
  minusBtnProperty();
  subTotal();
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

function minus(e) {
  if (e.nextElementSibling.classList.contains("quantity")) {
    let valueCount = e.nextElementSibling.value;

    valueCount--;

    e.nextElementSibling.value = valueCount;

    if (valueCount == 1) {
      e.setAttribute("disabled", "disabled");
      e.style.cursor = "not-allowed";
    }
    let price = e.parentNode.previousElementSibling.childNodes[3].textContent;
    const totalPrice = e.parentNode.nextElementSibling.childNodes[3];
    let total = totalPrice.textContent;
    total = parseInt(total);
    price = parseInt(price);

    price = total - price;
    totalPrice.innerText = price.toFixed(2);

    let originalPrice =
      e.parentNode.previousElementSibling.childNodes[3].textContent;
    originalPrice = parseInt(originalPrice);
    let subtotal = document.querySelector("#subtotal-price");
    let subTotal = parseInt(subtotal.textContent);

    let addedPrice = 0;
    addedPrice = subTotal - originalPrice;

    subtotal.innerText = addedPrice;
  }
}
function plus(e) {
  if (e.previousElementSibling.classList.contains("quantity")) {
    let valueCount = e.previousElementSibling.value;

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

    let price = e.parentNode.previousElementSibling.childNodes[3].textContent;
    const totalPrice = e.parentNode.nextElementSibling.childNodes[3];
    let total = totalPrice.textContent;
    total = parseInt(total);
    price = parseInt(price);

    price = total + price;
    totalPrice.innerText = price.toFixed(2);

    let originalPrice =
      e.parentNode.previousElementSibling.childNodes[3].textContent;
    originalPrice = parseInt(originalPrice);
    let subtotal = document.querySelector("#subtotal-price");
    let subTotal = parseInt(subtotal.textContent);

    let addedPrice = 0;
    addedPrice = subTotal + originalPrice;

    subtotal.innerText = addedPrice;
  }
}

function subTotal() {
  const subtotal = document.querySelector("#subtotal-price");
  const total = document.querySelectorAll(".total-price");
  let subTotal = 0;

  total.forEach((t) => {
    totalPrice = parseInt(t.textContent);
    subTotal += totalPrice;
  });
  if (subtotal) {
    subtotal.innerText += subTotal;
  }
}

function removeItem(e) {
  let productNumbers = localStorage.getItem("cartNumbers");
  productNumbers = parseInt(productNumbers);

  let cartItems = localStorage.getItem("productsInCart");
  cartItems = JSON.parse(cartItems);

  let itemID = e.parentNode.childNodes[1].value;
  let products = cartItems.filter((product) => product.itemID != itemID);
  localStorage.setItem("productsInCart", JSON.stringify(products));

  if (productNumbers) {
    localStorage.setItem("cartNumbers", productNumbers - 1);
    document.querySelector("#counter").textContent = productNumbers - 1;
  }
  displayCart();
}

displayCart();
onLoadCartNumbers();
