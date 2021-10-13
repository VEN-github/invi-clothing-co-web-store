// amount
let finalTotal = localStorage.getItem("total");
// Render the PayPal buttons
paypal
  .Buttons({
    style: {
      layout: "vertical",
      color: "blue",
      shape: "rect",
      label: "paypal",
    },
    createOrder: function (data, actions) {
      return actions.order.create({
        purchase_units: [
          {
            amount: {
              value: finalTotal,
            },
          },
        ],
      });
    },
    onApprove: function (data, actions) {
      // console.log("Data :" + data);
      // console.log("Action : " + actions);
      return actions.order.capture().then(function () {
        document.body.querySelector("#paypal-buttons-container").style.display =
          "none";
        document.body.querySelector("#cod").style.pointerEvents = "none";
        document.body.querySelector("#paypal").style.display = "flex";
        document.body.querySelector("#paypalRadio").checked = true;
      });
    },
  })
  .render("#paypal-buttons-container");
document.body.querySelector("#paypal-buttons-container").style.display = "none";
// Listen for changes to the radio buttons
document.querySelectorAll("input[name=payment]").forEach(function (el) {
  el.addEventListener("change", function (event) {
    // If PayPal is selected, show the PayPal button
    if (event.target.value === "PayPal or Credit / Debit Card") {
      document.body.querySelector("#paypal-buttons-container").style.display =
        "block";
      document.body.querySelector("#paypal").style.display = "none";
      document.body.querySelector("#paypalRadio").checked = false;
    }

    // If alternate funding is selected, show a different button
    if (event.target.value === "Cash on Delivery (COD)") {
      document.body.querySelector("#paypal-buttons-container").style.display =
        "none";
      document.body.querySelector("#paypal").style.display = "flex";
    }
  });
});
