getSessionInfo(showSessionInfo);

function getSessionInfo(callback) {
  var requestOptions = {
    method: "GET",
    redirect: "follow",
  };

  fetch("http://localhost:9900/session", requestOptions)
    .then((response) => response.json())
    .then((response) => {
      console.log(response);
      callback(response);
    });
}

function showSessionInfo(session) {
  let userElement = document.getElementById("login-div");
  userElement.innerHTML = "";
  if (session.username === null) {
    let loginLink = document.createElement("a");
    loginLink.setAttribute("class", "link");
    loginLink.setAttribute("id", "login-link");
    loginLink.setAttribute("href", "/login");

    loginLink.textContent = "Login";

    userElement.appendChild(loginLink);
  } else {
    userElement.textContent = `Hello, ${session.name}`;
    let logoutLink = document.createElement("a");
    logoutLink.setAttribute("href", "/logout");

    logoutLink.setAttribute("id", "link");
    logoutLink.textContent = "Logout";
  }
}

function createLoginButton() {
  let button = document.createElement("button");
  button.classList.add("btn", "bttn");
  button.textContent = "Login";
  button.addEventListener("click", () => {
    window.location.href = "/login";
  });
  return button;
}

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
