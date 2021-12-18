const addVariant = document.querySelector("#addVariant");
const form = document.querySelector("#variationForm");
const variantInfo = document.querySelector(".variant-info");
if (addVariant) {
  addVariant.addEventListener("click", () => {
    const variant = document.querySelector("#variationName");

    if (variant.value === "" || variant.value == null) {
      Swal.fire({
        icon: "error",
        title: "Empty Field",
        text: "Please input variation name",
      });
    } else {
      variantInfo.style.display = "block";

      // creating form groups
      const variantGroup = document.createElement("div");
      variantGroup.className = "form-group";

      // creating row groups
      const rowGroup = document.createElement("div");
      rowGroup.className = "row";

      // creating color groups
      const colorGroup = document.createElement("div");
      colorGroup.className = "col-lg-3 align-self-center";

      const colorGroupForm = document.createElement("div");
      colorGroupForm.className = "form-group";
      const colorName = document.createElement("label");
      colorName.innerText = variant.value;

      // create color Input
      const colorInput = document.createElement("input");
      colorInput.setAttribute("type", "hidden");
      colorInput.setAttribute("name", "variationName[]");
      colorInput.setAttribute("value", variant.value);

      // creating image groups
      const imageGroup = document.createElement("div");
      imageGroup.className = "col-lg-3";

      const imageGroupForm = document.createElement("div");
      imageGroupForm.className = "form-group";
      const imageName = document.createElement("label");
      imageName.innerText = "Choose Image";

      // create image Input
      const imageInput = document.createElement("input");
      imageInput.setAttribute("type", "file");
      imageInput.setAttribute("name", "variationImg[]");
      imageInput.className = "form-control-file";

      //create Button
      btnGroup = document.createElement("div");
      btnGroup.className = "col-lg-1 align-self-center";
      const button = document.createElement("button");
      button.className = "btn btn-danger btn-sm btn-block";
      button.setAttribute("type", "button");
      button.setAttribute("onclick", "removeVariant(this)");

      // create button icon
      const buttonIcon = document.createElement("i");
      buttonIcon.className = "fas fa-trash";

      // append elements
      variantGroup.appendChild(rowGroup);
      rowGroup.appendChild(colorGroup);
      rowGroup.appendChild(imageGroup);
      rowGroup.appendChild(btnGroup);
      colorGroup.appendChild(colorGroupForm);
      colorGroupForm.appendChild(colorName);
      colorGroupForm.appendChild(colorInput);
      imageGroup.appendChild(imageGroupForm);
      imageGroupForm.appendChild(imageName);
      imageGroupForm.appendChild(imageInput);
      btnGroup.appendChild(button);
      button.appendChild(buttonIcon);

      form.appendChild(variantGroup);

      variant.value = "";
    }
  });
}

function removeVariant(e) {
  e.parentNode.parentNode.parentNode.remove();
  displayInfo();
}

function displayInfo() {
  if (form.children.length == 0) {
    variantInfo.style.display = "none";
  }
}

displayInfo();
