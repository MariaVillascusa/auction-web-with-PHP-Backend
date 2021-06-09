const BTN = document.getElementById("btn");
const DIRECTION = "http://localhost:9900/users";

BTN.onclick = () => {
  const USERNAME_FORM = document.getElementsByName("username")[0].value;
  const PASSWORD_FORM = document.getElementsByName("password")[0].value;
  usersRequest(USERNAME_FORM,PASSWORD_FORM);
};

function login(username, password,USERNAME_FORM,PASSWORD_FORM) {
  
  if (PASSWORD_FORM == password && USERNAME_FORM == username) {
    alert("Bienvenido. Login OK");
  } else {
    alert("Porfavor ingrese, nombre de usuario y contraseña correctos.");
  }
}

function usersRequest(USERNAME_FORM,PASSWORD_FORM) {  //Busco el id del usuario en mi "base de datos"
  fetch(DIRECTION)
    .then((response) => response.json())
    .then((result) => {
      for (var i = 0; i < result.length; i++) {
        if (result[i]["username"] == USERNAME_FORM) {
          const ID = result[i]["id"];
          userByIdRequest(ID,USERNAME_FORM,PASSWORD_FORM);
        }
      }
    })
    .catch((error) => console.log("error", error));
}

function userByIdRequest(ID,USERNAME_FORM,PASSWORD_FORM) {          //Busco por id unicamente al usuario q quiero para no mosotrar la password de todos los usuarios
  const USER_DIRECTION = DIRECTION + "/" + ID;
  fetch(USER_DIRECTION)
    .then((response) => response.json())
    .then((result) => {
      let username = result["username"];
      let password = result["password"];
      login(username, password,USERNAME_FORM,PASSWORD_FORM);
    });
}

