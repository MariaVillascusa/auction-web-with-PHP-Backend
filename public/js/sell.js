const BTN = document.getElementById("sell-btn");
BTN.onclick = () => {
  let form = document.getElementById("form-sell");
  let formData = new FormData(form);
  createProduct(formData);
};

function createProduct(formData) {
    var requestOptions = {
        method: "POST",
        body: formData,
        redirect: "follow",
      };
    fetch("http://localhost:9900/products", requestOptions)
    .then(response => response.json())
    .then(result => {
            alert("El producto ha comenzado a subastarse")
            window.location.href = '/product?id=' + result['id'];
    })
    .catch(error => console.log('error', error));
}