const checkout = document.querySelector("#checkout");
if (checkout) {
  checkout.addEventListener("click", () => {
    const itemCode = document.querySelectorAll(".item-code");
    const itemImg = document.querySelectorAll(".cart-items img");
    const itemName = document.querySelectorAll(".item-name");
    const itemColor = document.querySelectorAll(".item-color");
    const itemSize = document.querySelectorAll(".item-size");
    const itemPrice = document.querySelectorAll(".item-price p");
    const itemQty = document.querySelectorAll(".quantity");
    const subtotal = document.querySelector("#subtotal-price").textContent;

    itemCode.forEach((item) => {
      console.log(item.value);
    });
    itemImg.forEach((item) => {
      console.log(item.src);
    });
    itemName.forEach((item) => {
      console.log(item.textContent);
    });
    itemColor.forEach((item) => {
      console.log(item.textContent);
    });
    itemSize.forEach((item) => {
      console.log(item.textContent);
    });
    itemPrice.forEach((item) => {
      console.log(item.textContent);
    });
    itemQty.forEach((item) => {
      console.log(item.value);
    });

    console.log(subtotal);
  });
}
