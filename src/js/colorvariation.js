// function selectedVariant() {
//   if (colorTxt && document.querySelector("#product-variant")) {
//     const colorVarWrapper = document.querySelector("#product-variant");
//     colorTxt.textContent +=
//       colorVarWrapper.childNodes[1].getAttribute("data-variant");
//     document.querySelector("#productColor").value =
//       colorVarWrapper.childNodes[1].getAttribute("data-variant");
//     document.querySelector("#productImg").src =
//       "./assets/img/" +
//       colorVarWrapper.childNodes[1].getAttribute("data-variantImg");
//     document.querySelector("#productImg").alt =
//       colorVarWrapper.childNodes[1].getAttribute("data-variantImg");
//     const variantID = colorVarWrapper.childNodes[1].getAttribute("data-varID");
//     const sizeForm = document.querySelector("#sizeOpt");
//     if (sizeForm) {
//       for (let j = 1; j < sizeForm.options.length; j++) {
//         if (
//           variantID ==
//           colorVarWrapper.childNodes[1].childNodes[3].childNodes[
//             j - 1
//           ].getAttribute("data-variantID")
//         ) {
//           sizeForm.options[j].value =
//             colorVarWrapper.childNodes[1].childNodes[3].childNodes[
//               j - 1
//             ].getAttribute("data-stockID");
//           sizeForm.options[j].dataset.stock =
//             colorVarWrapper.childNodes[1].childNodes[3].childNodes[
//               j - 1
//             ].getAttribute("data-stocks");
//         }
//       }
//     } else {
//       if (
//         variantID ==
//         colorVarWrapper.childNodes[1].childNodes[3].childNodes[0].getAttribute(
//           "data-variantID"
//         )
//       ) {
//         if (
//           colorVarWrapper.childNodes[1].childNodes[3].childNodes[0].getAttribute(
//             "data-size"
//           ) === ""
//         ) {
//           document.querySelector("#quantity").max =
//             colorVarWrapper.childNodes[1].childNodes[3].childNodes[0].getAttribute(
//               "data-stocks"
//             );
//           document.querySelector("#stockID").value =
//             colorVarWrapper.childNodes[1].childNodes[3].childNodes[0].getAttribute(
//               "data-stockID"
//             );
//           max_value();
//         }
//       }
//     }
//   }
// }
//selectedVariant();

const colorVar = document.querySelectorAll(".var-gallery span");
const colorTxt = document.querySelector("#color-txt");

if (colorVar) {
  colorVar.forEach((color) => {
    color.addEventListener("click", () => {
      document.querySelector("#color-container").style.display = "block";
      colorTxt.textContent = color.getAttribute("data-variant");
      document.querySelector("#productColor").value =
        color.getAttribute("data-variant");
      document.querySelector("#productImg").src =
        "./assets/img/" + color.getAttribute("data-variantImg");
      document.querySelector("#productImg").alt =
        color.getAttribute("data-variantImg");
    });
  });
  const sizeForm = document.querySelector("#sizeOpt");
  for (let i = 0; i < colorVar.length; i++) {
    colorVar[i].addEventListener("click", () => {
      if (sizeForm) {
        max_value();
        document.querySelector(".product-size").style.display = "block";
        document.querySelector(".product-quantity").style.display = "none";
        document.querySelector(".add-cart").style.display = "none";
        sizeForm.options[0].selected = true;
        for (let j = 1; j < sizeForm.options.length; j++) {
          if (
            colorVar[i].getAttribute("data-varID") ==
            colorVar[i].childNodes[3].childNodes[j - 1].getAttribute(
              "data-variantID"
            )
          ) {
            sizeForm.options[j].value =
              colorVar[i].childNodes[3].childNodes[j - 1].getAttribute(
                "data-stockID"
              );
            sizeForm.options[j].dataset.stock =
              colorVar[i].childNodes[3].childNodes[j - 1].getAttribute(
                "data-stocks"
              );
          }
        }
      } else {
        document.querySelector("#qty-no-size").style.display = "block";
        document.querySelector("#quantity").value = 1;
        if (
          colorVar[i].getAttribute("data-varID") ==
          colorVar[i].childNodes[3].childNodes[0].getAttribute("data-variantID")
        ) {
          if (
            colorVar[i].childNodes[3].childNodes[0].getAttribute(
              "data-size"
            ) === ""
          ) {
            document.querySelector("#quantity").max =
              colorVar[i].childNodes[3].childNodes[0].getAttribute(
                "data-stocks"
              );
            document.querySelector("#stockID").value =
              colorVar[i].childNodes[3].childNodes[0].getAttribute(
                "data-stockID"
              );
            max_value();
          }
        }
      }
    });
  }
}

function max_value() {
  const minusBtn = document.querySelector(".minus-btn");
  const plusBtn = document.querySelector(".plus-btn");

  // minus btn
  if (minusBtn) {
    minusBtn.setAttribute("disabled", "disabled");
    minusBtn.style.cursor = "not-allowed";

    // TAKING VALUE TO INCREMENT DECREMENT INPUT VALUE
    let valueCount = 1;

    // SETTING MAX VALUE
    let maxValue = document.querySelector("#quantity").max;
    if (maxValue == 0) {
      plusBtn.setAttribute("disabled", "disabled");
      plusBtn.style.cursor = "not-allowed";
      document.querySelector("#disabled-btn").style.display = "block";
      document.querySelector("#cart-btn").style.display = "none";
    } else if (valueCount == maxValue) {
      plusBtn.setAttribute("disabled", "disabled");
      plusBtn.style.cursor = "not-allowed";
      document.querySelector("#disabled-btn").style.display = "none";
      document.querySelector("#cart-btn").style.display = "flex";
    } else {
      plusBtn.removeAttribute("disabled");
      plusBtn.classList.remove("disabled");
      plusBtn.style.cursor = "pointer";
      document.querySelector("#disabled-btn").style.display = "none";
      document.querySelector("#cart-btn").style.display = "flex";
    }
  }
}
