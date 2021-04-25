const form = document.querySelector("form");
const inputs = document.querySelectorAll("input");

form.addEventListener("submit", (e) => {
  e.preventDefault();
  checkValidation();
});

function checkValidation() {
  const user = document.getElementById("user-name");
  const email = document.getElementById("email");
  const password = document.getElementById("password");
  const confirmPassword = document.getElementById("confirm-password");

  // user-validation-check
  if (user.value.trim() === "") {
    errorfor(user, "Name field cannot be empty");
  } else if (user.value.trim().length < 6) {
    errorfor(user, "Name should be 6 characters long");
  } else {
    successfor(user);
  }

  // email-validation-check
  if (email.value.trim() === "") {
    errorfor(email, "Email field cannot be empty");
  } else if (!emailValidation(email)) {
    errorfor(email, "Please Enter valid email");
  } else {
    successfor(email);
  }

  // password-validation-check
  if (password.value.trim() === "") {
    errorfor(password, "Password field cannot be empty");
  } else if (password.value.trim().length < 6) {
    errorfor(password, "Password needs to be 6 characters long");
  } else {
    successfor(password);
  }

  // password-confirmation-check
  if (confirmPassword.value.trim() === "") {
    errorfor(confirmPassword, "Password field cannot be empty");
  } else if (password.value.trim() !== confirmPassword.value.trim()) {
    errorfor(confirmPassword, "Password didnot match");
  } else {
    successfor(confirmPassword);
  }
}

function errorfor(input, message) {
  const parent = input.parentElement;
  parent.classList.remove("success");
  parent.classList.add("error");
  parent.querySelector("span").innerHTML = message;
}

function successfor(input) {
  const parents = input.parentElement;
  parents.classList.remove("error");
  parents.classList.add("success");
}

function emailValidation(email) {
  const regex = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
  return regex.test(email.value.trim());
}
