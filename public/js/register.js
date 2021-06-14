const btn = document.getElementById("btn");
const DIRECTION = "http://localhost:9900/users";

btn.onclick = () => {
  const NAME = document.getElementsByName("name")[0].value;
  const USERNAME = document.getElementsByName("username")[0].value;
  const EMAIL = document.getElementsByName("email")[0].value;
  const PASSWORD = document.getElementsByName("password")[0].value;
  
  var myHeaders = new Headers();
  myHeaders.append("Content-Type", "application/json");
  var raw = JSON.stringify({
    name: NAME,
    username: USERNAME,
    email: EMAIL,
    password: PASSWORD,
  });
  
  createUser(raw,myHeaders)

};

function createUser(raw,headers) {
    var requestOptions = {
        method: "POST",
        headers: headers,
        body: raw,
        redirect: "follow",
      };
    fetch(DIRECTION, requestOptions)
    .then(response => response.json())
    .then(result => {
        console.log(result);
        if (result){
            alert("Felicidades. Te has registrado!")
            window.location.href = '/home'
        }
    })
    .catch(error => console.log('error', error));
}
