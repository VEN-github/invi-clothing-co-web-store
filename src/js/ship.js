const sf = document.querySelector("#shipping-fee");

document.querySelectorAll("#ship-method").forEach((e) => {
  e.addEventListener("click", () => {
    let selected = document.querySelector("input[type=radio]:checked");
    sf.innerText = selected.value;
  });
});
