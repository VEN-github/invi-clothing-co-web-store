const header = document.querySelector("#main-header");
const burgerBtn = document.querySelector(".burger-btn");
let burgerOpen = false;
const navLinks = document.querySelector(".nav-links");
const links = document.querySelectorAll(".nav-links li");
window.addEventListener("scroll", () => {
  const scrollPos = window.scrollY;
  if (scrollPos > 10) {
    header.classList.add("scrolled");
  } else {
    header.classList.remove("scrolled");
  }
});

burgerBtn.addEventListener("click", () => {
  if (!burgerOpen) {
    burgerBtn.classList.add("open");
    navLinks.classList.toggle("open");
    burgerOpen = true;
    links.forEach((link) => {
      link.classList.toggle("fade");
    });
  } else {
    burgerBtn.classList.remove("open");
    navLinks.classList.remove("open");
    burgerOpen = false;
    links.forEach((link) => {
      link.classList.remove("fade");
    });
  }
});
