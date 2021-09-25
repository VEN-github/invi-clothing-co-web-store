const selectForm = document.querySelector(".rawMaterialForm");
const form = document.querySelector(".rawForm");

selectForm.addEventListener("change", () => {
  // set display flex on other div
  const laborFee = document.querySelector(".labor-fee");
  laborFee.style.display = "flex";
  const layoutFee = document.querySelector(".layout-fee");
  layoutFee.style.display = "flex";
  const expenses = document.querySelector(".expense-fee");
  expenses.style.display = "flex";
  const total = document.querySelector(".total");
  total.style.display = "flex";
  const hr = document.querySelectorAll(".hr");
  hr.forEach((e) => {
    e.style.display = "block";
  });

  // getting selected values
  const materialID = selectForm.options[selectForm.selectedIndex].value;
  const materialName = selectForm.options[selectForm.selectedIndex].text;
  let unitPrice = selectForm.options[selectForm.selectedIndex].dataset.price;
  const qty = selectForm.options[selectForm.selectedIndex].dataset.qty;

  // creating div element
  const container = document.createElement("div");
  container.className = "row rawMaterialContainer";

  // creating form groups
  const materialNameDiv = document.createElement("div");
  materialNameDiv.className = "form-group col-lg-3";
  const unitPriceDiv = document.createElement("div");
  unitPriceDiv.className = "form-group col-lg-2";
  const qtyDiv = document.createElement("div");
  qtyDiv.className = "form-group col-lg-2";
  const totalCostDiv = document.createElement("div");
  totalCostDiv.className = "form-group col-lg-2";
  const buttonDiv = document.createElement("div");
  buttonDiv.className = "d-flex align-items-center col-lg-2";

  // create label
  const labelName = document.createElement("label");
  labelName.innerText = "Raw Material";
  const labelPrice = document.createElement("label");
  labelPrice.innerText = "Unit Price";
  const labelQty = document.createElement("label");
  labelQty.innerText = "Quantity";
  const labelTotalCost = document.createElement("label");
  labelTotalCost.innerText = "Total Cost";

  // create Input
  const materialIdInput = document.createElement("input");
  materialIdInput.setAttribute("type", "hidden");
  materialIdInput.setAttribute("name", "materialID[]");
  materialIdInput.setAttribute("value", materialID);
  const materialNameInput = document.createElement("input");
  materialNameInput.className = "form-control";
  materialNameInput.setAttribute("disabled", true);
  materialNameInput.setAttribute("value", materialName);
  const unitPriceInput = document.createElement("input");
  unitPriceInput.className = "form-control";
  unitPriceInput.setAttribute("disabled", true);
  unitPriceInput.setAttribute("name", "unitPrice[]");
  unitPriceInput.setAttribute("value", unitPrice);
  const qtyInput = document.createElement("input");
  qtyInput.className = "form-control";
  qtyInput.setAttribute("type", "number");
  qtyInput.setAttribute("name", "qty[]");
  qtyInput.setAttribute("max", qty);
  qtyInput.setAttribute("min", "1");
  qtyInput.setAttribute("value", "1");
  qtyInput.setAttribute("onchange", "computeTotalCost(this)");
  qtyInput.setAttribute("oninput", "computeTotalCost(this)");
  const totalCostInput = document.createElement("input");
  totalCostInput.className = "form-control";
  totalCostInput.setAttribute("disabled", true);
  totalCostInput.setAttribute("name", "totalCost[]");
  totalCostInput.setAttribute("value", unitPrice);

  //create Button
  const button = document.createElement("button");
  button.className = "deleteBtn btn btn-danger btn-sm btn-block";
  button.setAttribute("type", "button");
  button.setAttribute("onclick", "removeMaterial(this)");

  // create button icon
  const buttonIcon = document.createElement("i");
  buttonIcon.className = "fas fa-trash";

  // append elements
  materialNameDiv.appendChild(labelName);
  materialNameDiv.appendChild(materialIdInput);
  materialNameDiv.appendChild(materialNameInput);
  unitPriceDiv.appendChild(labelPrice);
  unitPriceDiv.appendChild(unitPriceInput);
  qtyDiv.appendChild(labelQty);
  qtyDiv.appendChild(qtyInput);
  totalCostDiv.appendChild(labelTotalCost);
  totalCostDiv.appendChild(totalCostInput);
  buttonDiv.appendChild(button);
  button.appendChild(buttonIcon);

  // append element into container
  container.appendChild(materialNameDiv);
  container.appendChild(unitPriceDiv);
  container.appendChild(qtyDiv);
  container.appendChild(totalCostDiv);
  container.appendChild(buttonDiv);

  form.insertBefore(container, form.children[1]);
  totals();
});

// compute total cost of raw material
function computeTotalCost(e) {
  let unitPrice = parseInt(
    e.parentNode.previousElementSibling.children[1].value
  );
  let max = parseInt(e.max);
  let qty = parseInt(e.value);
  let totalCost = unitPrice;
  if (!isNaN(qty)) {
    if (qty <= max) {
      totalCost = unitPrice * qty;
    } else {
      Swal.fire({
        icon: "error",
        text: "Please select a value that is no more than " + max,
      });
      e.value = 1;
    }
  }
  e.parentNode.nextElementSibling.children[1].value = totalCost;
  totals();
}
// delete material
function removeMaterial(e) {
  e.parentNode.parentNode.remove();
  selectForm.selectedIndex = 0;
  if (form.children[2].classList.contains("labor-fee")) {
    // set display none on other div
    const laborFee = document.querySelector(".labor-fee");
    laborFee.style.display = "none";
    const layoutFee = document.querySelector(".layout-fee");
    layoutFee.style.display = "none";
    const expenses = document.querySelector(".expense-fee");
    expenses.style.display = "none";
    const total = document.querySelector(".total");
    total.style.display = "none";
    const hr = document.querySelectorAll(".hr");
    hr.forEach((e) => {
      e.style.display = "none";
    });
    document.querySelector("#laborFee").value = "";
    document.querySelector("#layoutFee").value = "";
    document.querySelector("#expenseFee").value = "";
    document.querySelector("#laborFeeQty").value = 1;
    document.querySelector("#layoutFeeQty").value = 1;
    document.querySelector("#expenseFeeQty").value = 1;
    laborFeeQtyContainer = document.querySelector(".laborFeeQty");
    laborFeeQtyContainer.style.display = "none";
    laborFeeTotalCostContainer = document.querySelector(".laborFeeTotalCost");
    laborFeeTotalCostContainer.style.display = "none";
    layoutFeeQtyContainer = document.querySelector(".layoutFeeQty");
    layoutFeeQtyContainer.style.display = "none";
    layoutFeeTotalCostContainer = document.querySelector(".layoutFeeTotalCost");
    layoutFeeTotalCostContainer.style.display = "none";
    expenseFeeQtyContainer = document.querySelector(".expenseFeeQty");
    expenseFeeQtyContainer.style.display = "none";
    expenseFeeTotalCostContainer = document.querySelector(
      ".expenseFeeTotalCost"
    );
    expenseFeeTotalCostContainer.style.display = "none";

    document.querySelector("#costPrice").value = "";
    document.querySelector("#totalCost").value = "";
    document.querySelector("#sales").value = "";
    document.querySelector("#salesDisc").value = "";
    document.querySelector("#netSales").value = "";
    document.querySelector("#cogs").value = "";
    document.querySelector("#grossProfit").value = "";
    document.querySelector("#expenses").value = "";
    document.querySelector("#netIncome").value = "";
    document.querySelector("#salesResult").textContent = "";
  }
  totals();
}

// compute labor fee
let laborFee = document.querySelector("#laborFee");
let laborFeeQty = document.querySelector("#laborFeeQty");

if (laborFee && laborFeeQty) {
  laborFee.addEventListener("input", () => {
    laborFeeQtyContainer = document.querySelector(".laborFeeQty");
    laborFeeQtyContainer.style.display = "block";
    laborFeeTotalCostContainer = document.querySelector(".laborFeeTotalCost");
    laborFeeTotalCostContainer.style.display = "block";
    let laborPrice = parseInt(laborFee.value);
    let laborQty = parseInt(laborFeeQty.value);
    if (!isNaN(laborPrice)) {
      if (laborFee.value != 0) {
        document.querySelector("#laborFeeTotalCost").value =
          laborPrice * laborQty;
      } else {
        laborFeeQty.value = 0;
        document.querySelector("#laborFeeTotalCost").value = 0;
      }
    } else {
      document.querySelector("#laborFeeTotalCost").value = "";
    }
    totals();
  });
  laborFeeQty.addEventListener("change", handler, false);
  laborFeeQty.addEventListener("input", handler, false);

  function handler() {
    let laborPrice = parseInt(laborFee.value);
    let laborQty = parseInt(laborFeeQty.value);
    if (!isNaN(laborQty)) {
      document.querySelector("#laborFeeTotalCost").value =
        laborPrice * laborQty;
    }
    totals();
  }
}

// compute layout fee
let layoutFee = document.querySelector("#layoutFee");
let layoutFeeQty = document.querySelector("#layoutFeeQty");

if (layoutFee && layoutFeeQty) {
  layoutFee.addEventListener("input", () => {
    layoutFeeQtyContainer = document.querySelector(".layoutFeeQty");
    layoutFeeQtyContainer.style.display = "block";
    layoutFeeTotalCostContainer = document.querySelector(".layoutFeeTotalCost");
    layoutFeeTotalCostContainer.style.display = "block";
    let layoutPrice = parseInt(layoutFee.value);
    let layoutQty = parseInt(layoutFeeQty.value);
    if (!isNaN(layoutPrice)) {
      if (layoutFee.value != 0) {
        document.querySelector("#layoutFeeTotalCost").value =
          layoutPrice * layoutQty;
      } else {
        layoutFeeQty.value = 0;
        document.querySelector("#layoutFeeTotalCost").value = 0;
      }
    } else {
      document.querySelector("#layoutFeeTotalCost").value = "";
    }
    totals();
  });
  layoutFeeQty.addEventListener("change", handler, false);
  layoutFeeQty.addEventListener("input", handler, false);

  function handler() {
    let layoutPrice = parseInt(layoutFee.value);
    let layoutQty = parseInt(layoutFeeQty.value);
    if (!isNaN(layoutQty)) {
      document.querySelector("#layoutFeeTotalCost").value =
        layoutPrice * layoutQty;
    }
    totals();
  }
}

// compute expense fee
let expenseFee = document.querySelector("#expenseFee");
let expenseFeeQty = document.querySelector("#expenseFeeQty");

if (expenseFee && expenseFeeQty) {
  expenseFee.addEventListener("input", () => {
    expenseFeeQtyContainer = document.querySelector(".expenseFeeQty");
    expenseFeeQtyContainer.style.display = "block";
    expenseFeeTotalCostContainer = document.querySelector(
      ".expenseFeeTotalCost"
    );
    expenseFeeTotalCostContainer.style.display = "block";
    let expensePrice = parseInt(expenseFee.value);
    let expenseQty = parseInt(expenseFeeQty.value);
    if (!isNaN(expensePrice)) {
      if (expenseFee.value != 0) {
        document.querySelector("#expenseFeeTotalCost").value =
          expensePrice * expenseQty;
      } else {
        expenseFeeQty.value = 0;
        document.querySelector("#expenseFeeTotalCost").value = 0;
      }
    } else {
      document.querySelector("#expenseFeeTotalCost").value = "";
    }
    totals();
  });
  expenseFeeQty.addEventListener("change", handler, false);
  expenseFeeQty.addEventListener("input", handler, false);

  function handler() {
    let expensePrice = parseInt(expenseFee.value);
    let expenseQty = parseInt(expenseFeeQty.value);
    if (!isNaN(expenseQty)) {
      document.querySelector("#expenseFeeTotalCost").value =
        expensePrice * expenseQty;
    }
    totals();
  }
}

function totals() {
  // Total Cost per Unit
  let unitPriceArr = document.getElementsByName("unitPrice[]");
  let costPerUnit = 0;
  let laborFee = document.querySelector("#laborFee");
  let layoutFee = document.querySelector("#layoutFee");
  let expenseFee = document.querySelector("#expenseFee");
  let totalPerUnit = document.querySelector("#costPrice");

  // convert to number
  let laborPrice = parseInt(laborFee.value);
  let layoutPrice = parseInt(layoutFee.value);
  let expensePrice = parseInt(expenseFee.value);

  // Total Cost
  let totalCost = document.getElementsByName("totalCost[]");
  let allTotalCost = 0;
  let laborFeeTotalCost = document.querySelector("#laborFeeTotalCost");
  let layoutFeeTotalCost = document.querySelector("#layoutFeeTotalCost");
  let expenseFeeTotalCost = document.querySelector("#expenseFeeTotalCost");

  // convert to number
  let laborTotalCost = parseInt(laborFeeTotalCost.value);
  let layoutTotalCost = parseInt(layoutFeeTotalCost.value);
  let expenseTotalCost = parseInt(expenseFeeTotalCost.value);

  if (!isNaN(laborPrice) && !isNaN(layoutPrice) && !isNaN(expensePrice)) {
    for (let i = 0; i < unitPriceArr.length; i++) {
      costPerUnit += parseInt(unitPriceArr[i].value);
      allTotalCost += parseInt(totalCost[i].value);
    }
    totalPerUnit.value = laborPrice + layoutPrice + expensePrice + costPerUnit;
    document.querySelector("#cogs").value = totalPerUnit.value;
    document.querySelector("#totalCost").value =
      laborTotalCost + layoutTotalCost + expenseTotalCost + allTotalCost;
  }
  salesIncome();
}

const sales = document.querySelector("#sales");
const salesDisc = document.querySelector("#salesDisc");
const expenses = document.querySelector("#expenses");

if (sales && salesDisc && expenses) {
  sales.addEventListener("input", salesIncome, false);
  salesDisc.addEventListener("input", salesIncome, false);
  expenses.addEventListener("input", salesIncome, false);

  function salesIncome() {
    let salesAmount = parseInt(sales.value);
    let salesDiscount = parseInt(salesDisc.value);
    let expenseAmount = parseInt(expenses.value);

    if (!isNaN(salesAmount) && !isNaN(salesDiscount)) {
      const netSales = document.querySelector("#netSales");
      const cogs = document.querySelector("#cogs");
      const grossProfit = document.querySelector("#grossProfit");

      netSales.value = salesAmount - salesDiscount;

      let netSalesValue = parseInt(netSales.value);
      let cogsValue = parseInt(cogs.value);

      grossProfit.value = netSalesValue - cogsValue;

      if (!isNaN(expenseAmount)) {
        let grossValue = parseInt(grossProfit.value);
        document.querySelector("#netIncome").value = grossValue - expenseAmount;

        if (parseInt(document.querySelector("#netIncome").value) < 0) {
          document.querySelector("#salesResult").innerText = "Loss";
        } else {
          document.querySelector("#salesResult").innerText = "Income";
        }
      }
    }
  }
}
