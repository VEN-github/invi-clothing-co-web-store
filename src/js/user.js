const user = document.querySelector(".profile-menu");
const userMenu = document.querySelector(".menu");

user.addEventListener("click", () => {
  userMenu.classList.toggle("active");
});
