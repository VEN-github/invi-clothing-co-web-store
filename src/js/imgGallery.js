function imageGallery() {
  const highlight = document.querySelector(".product-highlight img");
  const previews = document.querySelectorAll(".product-gallery img");

  previews.forEach((preview) => {
    preview.addEventListener("click", function () {
      const smallSrc = this.src;
      highlight.src = smallSrc;
    });
  });
}
imageGallery();
