const addSizeBtn = document.querySelector("#addSize");
const stockInfo = document.querySelector("#stockInfo");
const stockInput = document.querySelector("#stocks");
const sizeInfo = document.querySelector("#sizeInfo");
const sizeInput = document.querySelector("#size");
const sizeList = document.querySelector("#sizeList");
const buttons = document.querySelector("#buttons");
const cancelBtn = document.querySelector("#cancel");
const form = document.querySelector("#addForm");
const table = document
  .querySelector(".variation-table")
  .getElementsByTagName("tbody")[0];

addSizeBtn.addEventListener("click", () => {
  sizeInfo.style.display = "block";
  sizeList.style.display = "block";
  buttons.style.display = "block";
  stockInfo.style.display = "none";
  stockInput.value = "";
});

cancel.addEventListener("click", () => {
  sizeInfo.style.display = "none";
  sizeList.style.display = "none";
  buttons.style.display = "none";
  stockInfo.style.display = "block";
  sizeInput.value = "";
  table.innerHTML = "";
});

// form submit event
form.addEventListener("submit", (e) => {
  e.preventDefault();

  const newRow = table.insertRow();
  const newSize = newRow.insertCell(0);
  const stock = newRow.insertCell(1);
  const action = newRow.insertCell(2);
  const countRow = table.getElementsByTagName("tr").length;

  //get input value
  const size = document.querySelector("#size").value;

  //add text node with input value
  // const newSizeValue = document.createTextNode(size);

  //create delete button
  const deleteBtn = document.createElement("button");

  //create input button
  const countRowInput = document.createElement("input");
  const stockInput = document.createElement("input");
  const breakdownInput = document.createElement("input");

  // add class to del button
  deleteBtn.setAttribute("type", "button");
  deleteBtn.setAttribute("onclick", "removeRow(this)");
  deleteBtn.className = "btn btn-danger delete";

  // add class to input button
  countRowInput.setAttribute("type", "hidden");
  countRowInput.setAttribute("name", "countRow[]");
  countRowInput.setAttribute("value", countRow);
  breakdownInput.setAttribute("type", "text");
  breakdownInput.setAttribute("name", "sizes[]");
  breakdownInput.setAttribute("value", size);
  breakdownInput.className = "form-control";
  stockInput.setAttribute("type", "number");
  stockInput.setAttribute("name", "stocks[]");
  stockInput.setAttribute("min", "0");
  stockInput.setAttribute("placeholder", "0");
  stockInput.className = "form-control";

  // append text node
  deleteBtn.appendChild(document.createTextNode("X"));

  //append cells to table
  newSize.appendChild(countRowInput);
  newSize.appendChild(breakdownInput);
  // newSize.appendChild(newSizeValue);
  stock.appendChild(stockInput);
  action.appendChild(deleteBtn);
});

// delete row
function removeRow(e) {
  const td = e.parentNode;
  const tr = td.parentNode;
  tr.parentNode.removeChild(tr);
}
