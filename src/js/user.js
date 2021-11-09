const user = document.querySelector(".profile-menu");
const userMenu = document.querySelector(".menu");
if (user) {
  user.addEventListener("click", () => {
    if (userMenu) {
      userMenu.classList.toggle("active");
    }
  });
}
