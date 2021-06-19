import { getSessionInfo, showSessionInfo} from './session.js'

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
  error.then((errorText) => {
    let errorSection = document.getElementById("login-error");
    errorSection.textContent = errorText;
  });
}

function login(formData, callback, error) {
  console.log(formData.get("username"));
  let requestOptions = {
    method: "POST",
    body: formData,
    redirect: "follow",
  };

  fetch("http://localhost:9900/login-request", requestOptions)
    .then((response) => {
      if (response.status === 401) {
        catchLoginError(response.json());
        return;
      }
      return response.json();
    })
    .then((response) => {
      console.log(response);
      //callback(response);
      window.location.href = "/session";
    })
    .catch(error);
}
