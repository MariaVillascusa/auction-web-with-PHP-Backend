const BTN = document.getElementById("btn");
const DIRECTION = "http://localhost:9900/products";

BTN.onclick = () => {
  const NAME = document.getElementsByName("name")[0].value;
  const PRICE = document.getElementsByName("price")[0].value;
  const DESCRIPTION = document.getElementsByName("description")[0].value;
  let DATETIME = document.getElementsByName("datetime")[0].value;
  const IMAGE = document.getElementsByName("image")[0].value;

  const DATE = new Date(DATETIME)  //Formato ingles
  
  var myHeaders = new Headers();
  myHeaders.append("Content-Type", "application/json");
  var raw = JSON.stringify({
    name: NAME,
    price: PRICE,
    description: DESCRIPTION,
    datetime: DATE,
    image: IMAGE,
  });
  
  createProduct(raw,myHeaders)
  
};

function createProduct(raw,headers) {
    var requestOptions = {
        method: "POST",
        headers: headers,
        body: raw,
        redirect: "follow",
      };
    fetch(DIRECTION, requestOptions)
    .then(response => response.json())
    .then(result => console.log(result))
    .catch(error => console.log('error', error));
}