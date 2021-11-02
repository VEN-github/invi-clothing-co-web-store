const contentBox = document.querySelectorAll(".content-box");

if (contentBox) {
  contentBox.forEach((content) => {
    content.addEventListener("click", () => {
      content.classList.toggle("active");
    });
  });
}
