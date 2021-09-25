const addSize = document.querySelector("#addSize");
const closeSize = document.querySelector("#close");
if (addSize) {
  addSize.addEventListener("click", () => {
    document.querySelector("#sizeInfo").style.display = "block";
    document.querySelector("#stockInfo").style.display = "none";
    const stockQty = document.querySelectorAll(".stocks");
    stockQty.forEach((stock) => {
      stock.value = 1;
    });
    document.querySelector("#noSize").value = 1;
  });
}
if (closeSize) {
  closeSize.addEventListener("click", () => {
    document.querySelector("#sizeInfo").style.display = "none";
    document.querySelector("#stockInfo").style.display = "block";
    const stockQty = document.querySelectorAll(".stocks");
    stockQty.forEach((stock) => {
      stock.value = 1;
    });
    document.querySelector("#noSize").value = "";
  });
}
