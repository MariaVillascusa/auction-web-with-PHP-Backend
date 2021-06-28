export function getAllProducts(callback) {
    fetch("http://localhost:9900/products")
      .then((response) => response.json())
      .then((result) => {
        callback(result);
      })
      .catch((error) => console.log("error", error));
  }