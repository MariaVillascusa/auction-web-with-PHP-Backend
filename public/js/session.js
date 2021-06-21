getSessionInfo(showSessionInfo);

export function getSessionInfo(callback) {
  var requestOptions = {
    method: "GET",
    redirect: "follow",
  };

  fetch("http://localhost:9900/session", requestOptions)
    .then((response) => response.json())
    .then((response) => {
      callback(response);
    });
}

export function showSessionInfo(session) {
  let registerElement = document.getElementById("register-div");
  let loginElement = document.getElementById("login-div");
  registerElement.innerHTML = "";
  loginElement.innerHTML = "";
  if (session.username === null) {
    let registerLink = createRegisterLink();
    registerElement.appendChild(registerLink);
    let loginLink = createLoginLink();
    loginElement.appendChild(loginLink);
  } else {
    if (window.location.href === "http://localhost:9900/login") {
      window.location.href = "/home";
    }
    registerElement.textContent = `Hola, ${session.name}`;
    let pLogout = createLogoutLink();
    loginElement.appendChild(pLogout);
    
  }
}

function createRegisterLink() {
  let registerLink = document.createElement("a");
  registerLink.setAttribute("class", "link");
  registerLink.setAttribute("id", "register-link");
  registerLink.setAttribute("href", "/register");
  registerLink.textContent = "Registro";
  return registerLink;
}

function createLoginLink() {
  let loginLink = document.createElement("a");
  loginLink.setAttribute("class", "link");
  loginLink.setAttribute("id", "login-link");
  loginLink.setAttribute("href", "/login");
  loginLink.textContent = "Login";
  return loginLink;
}

function createLogoutLink() {
  let pLogout = document.createElement("p");
  let logoutLink = document.createElement("a");
  logoutLink.setAttribute("href", "/logout");
  logoutLink.setAttribute("class", "link");
  logoutLink.setAttribute("id", "login-link");
  logoutLink.textContent = "Logout";
  pLogout.appendChild(logoutLink);
  return pLogout;
}
