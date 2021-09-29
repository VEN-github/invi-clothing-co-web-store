const shipping = document.querySelector("#shipping-input");
const sf = document.querySelector("#shipping-fee");
const method = document.querySelectorAll("#ship-method");
const proceed = document.querySelector("#proceedPayment");
if (method) {
  method.forEach((e) => {
    e.addEventListener("change", () => {
      let fee =
        e.nextElementSibling.nextElementSibling.children[1].children[0]
          .children[1].textContent;
      sf.innerHTML = `<span class="iconify peso-sign"
        data-icon="clarity:peso-line"
        data-inline="false"></span>
        <span>${fee}</span>`;
      shipping.value = fee;
      let shipFee = parseInt(fee);
      let total = document.querySelector("#subtotal").textContent;
      total = parseInt(total.replace(/,/g, ""));
      let subtotal = total + shipFee;
      document.querySelector("#total-cost").innerHTML = subtotal.toLocaleString(
        undefined,
        {
          minimumFractionDigits: 2,
          maximumFractionDigits: 2,
        }
      );
    });
  });
}
if (proceed) {
  proceed.addEventListener("click", () => {
    totalCost();
  });
}
function totalCost() {
  let total = document.querySelector("#total-cost").textContent;
  total = parseInt(total.replace(/,/g, ""));
  localStorage.setItem("shippingFee", shipping.value);
  localStorage.setItem("total", total);
}
function sFee() {
  let sFee = localStorage.getItem("shippingFee");
  let finalTotal = localStorage.getItem("total");
  finalTotal = parseInt(finalTotal);
  let total = document.querySelector("#total-cost");
  if (sf && sFee && total && finalTotal) {
    sf.innerHTML = "";
    sf.innerHTML += `<span class="iconify peso-sign"
    data-icon="clarity:peso-line"
    data-inline="false"></span>
    <span>${sFee}</span>`;
    total.innerHTML = "";
    total.innerHTML += `<input type="hidden" name="totalAmount" value="${finalTotal}" form="orderForm"/>
    ${finalTotal.toLocaleString(undefined, {
      minimumFractionDigits: 2,
      maximumFractionDigits: 2,
    })}`;
  }
}
sFee();
