const addSize = document.querySelector("#addSize");
const closeSize = document.querySelector("#close");
const skuNoSize = document.querySelectorAll(".sku");
skuNoSize.forEach((sku) => {
  sku.value += Math.random().toString(36).slice(-5);
});
// document.querySelector("#xs").value += Math.random().toString(36).slice(-5);
// document.querySelector("#s").value += Math.random().toString(36).slice(-5);
// document.querySelector("#m").value += Math.random().toString(36).slice(-5);
// document.querySelector("#l").value += Math.random().toString(36).slice(-5);
// document.querySelector("#xl").value += Math.random().toString(36).slice(-5);
// document.querySelector("#xxl").value += Math.random().toString(36).slice(-5);
// document.querySelector("#xxxl").value += Math.random().toString(36).slice(-5);
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
