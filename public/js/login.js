import { getSessionInfo, showSessionInfo } from "./session.js";

let loginBtn = document.getElementById("login-btn");
loginBtn.addEventListener("click", doLogin);

function doLogin(event) {
  let errorSection = document.getElementById("login-error");
  errorSection.textContent = "";
  let form = document.getElementById("form-login");
  let formData = new FormData(form);
  login(
    formData,
    () => {
      getSessionInfo(showSessionInfo);
    },
    catchLoginError
  );
}

function catchLoginError(error) {
  let errorSection = document.getElementById("login-error");
  errorSection.textContent = error;
  errorSection.setAttribute("class", "alert alert-dark");
}

function login(formData, callback, error) {
  let requestOptions = {
    method: "POST",
    body: formData,
    redirect: "follow",
  };

  fetch("http://localhost:9900/login-request", requestOptions)
    .then((response) => response.json())
    .then((response) => {
      if (typeof response === "string") {
        catchLoginError(response);
      } else {
        callback(response);
      }
    })
    .catch(error);
}
