const contentBox = document.querySelectorAll(".content-box");

if (contentBox) {
  contentBox.forEach((content) => {
    content.addEventListener("click", () => {
      content.classList.toggle("active");
    });
  });
}

const accordionLink = document.querySelectorAll(".accordion-link");

if (accordionLink) {
  accordionLink.forEach((links) => {
    links.addEventListener("click", () => {
      links.classList.toggle("active");
    });
  });
}

const categories = document.querySelector(".categories");

if (categories) {
  categories.addEventListener("click", () => {
    categories.classList.toggle("active");
  });
}
