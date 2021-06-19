getSessionInfo(showSessionInfo);

export function getSessionInfo(callback) {
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

export function showSessionInfo(session) {
  let userElement = document.getElementById("login-div");
  userElement.innerHTML = "";
  if (session.username === null) {
    let loginLink = createLoginLink();
    userElement.appendChild(loginLink);
  } else {
    userElement.textContent = `Hello, ${session.name}`;
    let logoutLink = createLogoutLink();
    userElement.appendChild(logoutLink);
  }
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
  let logoutLink = document.createElement("a");
  logoutLink.setAttribute("href", "/logout");
  logoutLink.setAttribute("class", "link");
  loginLink.setAttribute("id", "login-link");
  logoutLink.textContent = "Logout";
  return logoutLink;
}
