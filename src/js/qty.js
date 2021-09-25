const sizeForm = document.querySelector("#sizeOpt");
const minusBtn = document.querySelector(".minus-btn");
const plusBtn = document.querySelector(".plus-btn");

// size form
if (sizeForm) {
  sizeForm.addEventListener("change", () => {
    const qtyBtn = document.querySelector(".product-quantity");
    qtyBtn.style.display = "block";
    const addCart = document.querySelector(".add-cart");
    addCart.style.display = "block";

    const qty = sizeForm.options[sizeForm.selectedIndex].dataset.stock;

    document.querySelector("#quantity").value = 1;
    document.querySelector("#quantity").max = qty;

    let valueCount = 1;
    let maxValue = qty;

    if (maxValue == 0) {
      plusBtn.setAttribute("disabled", "disabled");
      plusBtn.style.cursor = "not-allowed";
      document.querySelector("#cart-btn").style.display = "none";
      document.querySelector("#disabled-btn").style.display = "block";
    } else if (valueCount == maxValue) {
      plusBtn.setAttribute("disabled", "disabled");
      plusBtn.style.cursor = "not-allowed";
      document.querySelector("#cart-btn").style.display = "flex";
      document.querySelector("#disabled-btn").style.display = "none";
    } else {
      plusBtn.removeAttribute("disabled");
      plusBtn.classList.remove("disabled");
      plusBtn.style.cursor = "pointer";
      document.querySelector("#cart-btn").style.display = "flex";
      document.querySelector("#disabled-btn").style.display = "none";
    }
    minusBtn.setAttribute("disabled", "disabled");
    minusBtn.style.cursor = "not-allowed";
  });
}

// plus btn
function plus(e) {
  let valueCount = 1;
  let maxValue = e.previousElementSibling.max;
  const minusBtn = e.previousElementSibling.previousElementSibling;
  //GETTING VALUE INPUT
  valueCount = document.querySelector("#quantity").value;

  //INPUT VALUE INCREMENT BY 1
  valueCount++;

  //SETTING INCREMENT INPUT VALUE
  document.querySelector("#quantity").value = valueCount;
  //SETTING INCREMENT MAX VALUE
  document.querySelector("#quantity").max = maxValue;

  if (valueCount > 1) {
    minusBtn.removeAttribute("disabled");
    minusBtn.classList.remove("disabled");
    minusBtn.style.cursor = "pointer";
  }

  if (valueCount == maxValue) {
    plusBtn.setAttribute("disabled", "disabled");
    plusBtn.style.cursor = "not-allowed";
  }
}

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
  } else if (valueCount == maxValue) {
    plusBtn.setAttribute("disabled", "disabled");
    plusBtn.style.cursor = "not-allowed";
  } else {
    plusBtn.removeAttribute("disabled");
    plusBtn.classList.remove("disabled");
    plusBtn.style.cursor = "pointer";
  }
}

function minus(e) {
  let valueCount = 1;
  let maxValue = e.nextElementSibling.max;
  const plusBtn = e.nextElementSibling.nextElementSibling;

  //GETTING VALUE INPUT
  valueCount = document.querySelector("#quantity").value;

  //INPUT VALUE DECREMENT BY 1
  valueCount--;

  //SETTING DECREMENT INPUT VALUE
  document.querySelector("#quantity").value = valueCount;

  if (valueCount == 1) {
    minusBtn.setAttribute("disabled", "disabled");
    minusBtn.style.cursor = "not-allowed";
  }
  if (valueCount != maxValue) {
    plusBtn.removeAttribute("disabled");
    plusBtn.classList.remove("disabled");
    plusBtn.style.cursor = "pointer";
  }
}
