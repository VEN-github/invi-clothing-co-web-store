const form = document.querySelector("#addForm");
const table = document
  .querySelector(".variation-table")
  .getElementsByTagName("tbody")[0];

// form submit event
form.addEventListener("submit", addVariation);
table.addEventListener("click", removeRow);

// add Variation
function addVariation(e) {
  e.preventDefault();

  const newRow = table.insertRow();
  const newSize = newRow.insertCell(0);
  const stock = newRow.insertCell(1);
  const action = newRow.insertCell(2);

  const countRow = table.getElementsByTagName("tr").length;

  // get input value
  const size = document.querySelector("#size").value;

  //add text node with input value
  const newSizeValue = document.createTextNode(size);

  //create delete button
  const deleteBtn = document.createElement("button");
  const span = document.createElement("span");
  const icon = document.createElement("i");

  //create input button
  const countRowInput = document.createElement("input");
  const stockInput = document.createElement("input");
  const breakdownInput = document.createElement("input");

  // add class to del button
  deleteBtn.className = "btn btn-danger delete";
  span.className = "icon text-white-50";
  icon.className = "fas fa-trash-alt";

  // add class to input button
  countRowInput.setAttribute("type", "hidden");
  countRowInput.setAttribute("name", "countRow[]");
  countRowInput.setAttribute("value", countRow);
  breakdownInput.setAttribute("type", "hidden");
  breakdownInput.setAttribute("name", "sizes[]");
  breakdownInput.setAttribute("value", size);
  stockInput.setAttribute("type", "number");
  stockInput.setAttribute("name", "stocks[]");
  stockInput.setAttribute("min", "0");
  stockInput.setAttribute("placeholder", "0");
  stockInput.className = "form-control";

  // append span to del
  deleteBtn.appendChild(span);
  // append icon to span
  span.appendChild(icon);

  //append cells to table
  newSize.appendChild(countRowInput);
  newSize.appendChild(breakdownInput);
  newSize.appendChild(newSizeValue);
  stock.appendChild(stockInput);
  action.appendChild(deleteBtn);
}
// function removeRow(e) {
//   if (e.target.classList.contains("delete")) {
//     console.log(e);
// const deleteRow = e.target.parentNode.parentNode;
// deleteRow.parentNode.removeRow(deleteRow);
//   }
// }
