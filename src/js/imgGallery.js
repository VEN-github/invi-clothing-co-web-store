function imageGallery() {
  const highlight = document.querySelector(".product-highlight img");
  const magnifyImg = document.querySelector("#large-img");
  const zoomImg = document.querySelector("#zoom");
  const previews = document.querySelectorAll(".product-gallery img");
  magnifyImg.style.backgroundImage = `url(${highlight.src})`;

  // change image
  previews.forEach((preview) => {
    preview.addEventListener("click", function () {
      const smallSrc = this.src;
      highlight.src = smallSrc;
      magnifyImg.style.backgroundImage = `url(${smallSrc})`;
    });
  });

  // zoom image
  zoomImg.addEventListener(
    "mousemove",
    (e) => {
      let style = magnifyImg.style,
        imgWidth = highlight.width,
        imgHeight = highlight.height,
        x = e.pageX - zoomImg.offsetLeft,
        y = e.pageY - zoomImg.offsetTop,
        xperc = (x / imgWidth) * 100,
        yperc = (y / imgHeight) * 100;

      // Add some margin for right edge
      if (x > 0.01 * imgWidth) {
        xperc += 0.15 * xperc;
      }

      // Add some margin for bottom edge
      if (y >= 0.01 * imgHeight) {
        yperc += 0.15 * yperc;
      }

      // Set the background of the magnified image horizontal
      style.backgroundPositionX = xperc - 9 + "%";
      // Set the background of the magnified image vertical
      style.backgroundPositionY = yperc - 9 + "%";

      // Move the magnifying glass with the mouse movement.
      style.left = x - 50 + "px";
      style.top = y - 50 + "px";
    },
    false
  );
}
imageGallery();
