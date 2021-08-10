// document.querySelector(".minus-btn").setAttribute("disabled", "disabled");

// let valueCount;

// const total = document.querySelector("#total-price").innerText;

// function priceTotal() {
//   const totalPrice = valueCount * total;
//   document.querySelector("#total-price").innerText = totalPrice;
// }

// document.querySelector(".plus-btn").addEventListener("click", () => {
//   valueCount = document.querySelector("#quantity").value;

//   valueCount++;

//   document.querySelector("#quantity").value = valueCount;

//   if (valueCount > 1) {
//     document.querySelector(".minus-btn").removeAttribute("disabled");
//     document.querySelector(".minus-btn").classList.remove("disabled");
//   }
//   priceTotal();
// });
// document.querySelector(".minus-btn").addEventListener("click", () => {
//   valueCount = document.querySelector("#quantity").value;

//   valueCount--;

//   document.querySelector("#quantity").value = valueCount;

//   if (valueCount == 1) {
//     document.querySelector(".minus-btn").setAttribute("disabled", "disabled");
//   }
//   priceTotal();
// });

const price = document.querySelectorAll("#price");
const quantity = document.querySelectorAll("#quantity");
const total = document.querySelectorAll("#total-price");
const subtotal = document.querySelector("#subtotal");
const inputSubtotal = document.querySelector("#input-subtotal");
const cartSubtotal = document.querySelectorAll("#cart-subtotal");

function subTotal() {
  quantity.forEach((element) => {
    element.addEventListener("change", () => {
      let subTotal = 0;
      for (i = 0; i < price.length; i++) {
        total[i].innerText = price[i].value * quantity[i].value;
        subTotal = subTotal + price[i].value * quantity[i].value;
        cartSubtotal[i].value = price[i].value * quantity[i].value;
      }
      subtotal.innerText = subTotal;
      inputSubtotal.value = subTotal;
    });
  });
}
subTotal();
