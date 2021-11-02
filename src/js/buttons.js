// submit when press enter
const inputs = document.querySelectorAll("input");
const inputSubmit = document.querySelector("input[type=submit]");
const button = document.querySelector("button[type=submit]");

if (inputs) {
  inputs.forEach((input) => {
    input.addEventListener("keyup", (e) => {
      if (e.key == 13) {
        e.preventDefault;
        if (inputSubmit) {
          inputSubmit.click();
        }
        if (button) {
          button.click();
        }
      }
    });
  });
}

// login show password
const loginPassInput = document.querySelector("#login-pass-input");
const loginEyeBtn = document.querySelectorAll(".login-eye-btn");
const loginEyeClose = document.querySelector(".invisible");
const loginEyeOpen = document.querySelector(".visible");
if (loginEyeBtn) {
  loginEyeBtn.forEach((eye) => {
    eye.addEventListener("click", () => {
      if (loginPassInput.type === "password") {
        loginPassInput.type = "text";
        loginEyeClose.style.display = "none";
        loginEyeOpen.style.display = "block";
      } else if (loginPassInput.type === "text") {
        loginPassInput.type = "password";
        loginEyeClose.style.display = "block";
        loginEyeOpen.style.display = "none";
      }
    });
  });
}

// sign up show password
const signupPassInput = document.querySelector("#signup-pass-input");
const signupEyeBtn = document.querySelectorAll(".signup-show-pass");
const signupEyeClose = document.querySelector(".signup-show-invisible");
const signupEyeOpen = document.querySelector(".signup-show-visible");
if (signupEyeBtn) {
  signupEyeBtn.forEach((eye) => {
    eye.addEventListener("click", () => {
      if (signupPassInput.type === "password") {
        signupPassInput.type = "text";
        signupEyeClose.style.display = "none";
        signupEyeOpen.style.display = "block";
      } else if (signupPassInput.type === "text") {
        signupPassInput.type = "password";
        signupEyeClose.style.display = "block";
        signupEyeOpen.style.display = "none";
      }
    });
  });
}

// sign up show confirm password
const confirmPassInput = document.querySelector("#confirm-password-input");
const confirmEyeBtn = document.querySelectorAll(".signup-show-confirmpass");
const confirmEyeClose = document.querySelector(".confirm-invisible");
const confirmEyeOpen = document.querySelector(".confirm-visible");
if (confirmEyeBtn) {
  confirmEyeBtn.forEach((eye) => {
    eye.addEventListener("click", () => {
      if (confirmPassInput.type === "password") {
        confirmPassInput.type = "text";
        confirmEyeClose.style.display = "none";
        confirmEyeOpen.style.display = "block";
      } else if (confirmPassInput.type === "text") {
        confirmPassInput.type = "password";
        confirmEyeClose.style.display = "block";
        confirmEyeOpen.style.display = "none";
      }
    });
  });
}
