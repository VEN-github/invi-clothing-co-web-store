const filterBtn = document.querySelectorAll(".filter-btn");
const productItem = document.querySelectorAll(".products");

if (productItem) {
  document.querySelector("#product-count").textContent = productItem.length;
} else {
  document.querySelector("#product-count").textContent = 0;
}

if (filterBtn) {
  filterBtn.forEach((f) => {
    f.addEventListener("click", (e) => {
      e.preventDefault();

      const filter = e.target.dataset.filter;

      productItem.forEach((product) => {
        if (filter === "All Products") {
          product.style.display = "flex";
          document.querySelector("#category-text").textContent = "All Products";
          document.querySelector("#product-count").textContent =
            productItem.length;
        } else {
          if (product.classList.contains(filter)) {
            product.style.display = "flex";
            document.querySelector("#category-text").textContent = filter;
            document.querySelector("#product-count").textContent =
              product.parentElement.getElementsByClassName(filter).length;
          } else {
            product.style.display = "none";
            document.querySelector("#category-text").textContent = filter;
            document.querySelector("#product-count").textContent =
              product.parentElement.getElementsByClassName(filter).length;
          }
        }
      });
    });
  });
}
