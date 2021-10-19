function generateAvatar(
  text,
  foregroundColor = "white",
  backgroundColor = "black"
) {
  const initials = document.querySelector("#initials");
  const canvas = document.createElement("canvas");
  const context = canvas.getContext("2d");

  canvas.width = 150;
  canvas.height = 150;

  // Draw background
  context.fillStyle = backgroundColor;
  context.fillRect(0, 0, canvas.width, canvas.height);

  // Draw text
  context.font = "bold 75px Sans-serif";
  context.fillStyle = foregroundColor;
  context.textAlign = "center";
  context.textBaseline = "middle";
  context.fillText(text, canvas.width / 2, canvas.height / 2);

  return canvas.toDataURL("image/png");
}

const avatar = document.querySelectorAll(".avatar");

avatar.forEach((e) => {
  e.src = generateAvatar(initials.value, "white", "#78909C");
});
