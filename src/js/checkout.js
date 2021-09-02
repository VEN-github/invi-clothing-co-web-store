const checkout = document.querySelector("#checkout");
if (checkout) {
  checkout.addEventListener("click", () => {
    const cartItems = document.querySelectorAll(".cart-items");
    for (let i = 0; i < cartItems.length; i++) {
      console.log(cartItems);
      let itemID = document.querySelectorAll(".item-ID")[i].value;
      let itemCode = document.querySelectorAll(".item-code")[i].value;
      let itemImg = document.querySelectorAll(".cart-items img")[i].src;
      let itemName = document.querySelectorAll(".item-name")[i].textContent;
      let itemColor = document.querySelectorAll(".item-color")[i].textContent;
      let itemPrice = document.querySelectorAll(".item-price p")[i].textContent;
      let itemSize = document.querySelectorAll(".item-size")[i].textContent;
      let itemQty = document.querySelectorAll(".quantity")[i].value;
      let products = {
        itemCode: itemCode,
        productID: itemID,
        productImage: itemImg,
        productName: itemName,
        productColor: itemColor,
        productSize: itemSize,
        productPrice: itemPrice,
        Quantity: itemQty,
      };
      console.log(products);
      setProducts(products, itemQty);
    }
    totalCost();
  });
}
function setProducts(product, qty) {
  let checkoutItems = localStorage.getItem("checkoutContainer");
  checkoutItems = JSON.parse(checkoutItems);

  if (checkoutItems != null) {
    if (checkoutItems[product.itemCode] == undefined) {
      checkoutItems = {
        ...checkoutItems,
        [product.itemCode]: product,
      };
    }
    checkoutItems[product.itemCode].Quantity = qty;
  } else {
    product.Quantity = qty;
    checkoutItems = {
      [product.itemCode]: product,
    };
  }
  localStorage.setItem("checkoutContainer", JSON.stringify(checkoutItems));
}

function totalCost() {
  const subtotal = document.querySelector("#subtotal-price").textContent;

  localStorage.setItem("totalCost", subtotal);
}

// function displayCheckoutItems() {
//   let checkoutItems = localStorage.getItem("checkoutContainer");
//   checkoutItems = JSON.parse(checkoutItems);

//   let orderItems = document.querySelector(".order-items");

//   if(checkoutItems && orderItems){
//     Object.values(checkoutItems).map((item)=>{
//       if(item.productSize)
//     })
//   }

// }
