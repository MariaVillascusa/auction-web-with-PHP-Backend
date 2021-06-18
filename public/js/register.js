const BTN = document.getElementById("register-btn");
BTN.onclick = () => {
  let form = document.getElementById("form-register");
  let formData = new FormData(form);
  createUser(formData)
};

function createUser(formData) {
    var requestOptions = {
        method: "POST",
        body: formData,
        redirect: "follow",
      };
    fetch("http://localhost:9900/users", requestOptions)
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
