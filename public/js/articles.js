import { chronoBucle } from "./chrono.js";

export function showArticles(data) {
  for (let article of data) {
    window.sessionStorage.setItem("datetime", article["datetime"]);
    const CARD = document.createElement("div");
    CARD.setAttribute("id", "card");
    createImg(CARD, article);
    createBody(CARD, article);
    container.appendChild(CARD);
  }
}

function createImg(CARD, article) {
  let img = document.createElement("img");
  img.setAttribute("src", article["image"]);
  img.setAttribute("class", "card-img-top");
  CARD.appendChild(img);
}

function createBody(CARD, article) {
  let body = document.createElement("div");
  body.setAttribute("class", "card-body");
  CARD.appendChild(body);
  createName(body, article);
  createPrice(body, article);
  createDatetime(body, article);
  createBtn(body, article);
}

function createName(body, article) {
  let name = document.createElement("h5");
  name.setAttribute("class", "card-title");
  name.textContent = article["name"];
  body.appendChild(name);
}

function createPrice(body, article) {
  let price = document.createElement("p");
  price.setAttribute("class", "card-text");
  price.setAttribute("class", "price");
  price.textContent = article["price"] + "€";
  body.appendChild(price);
}

function createDatetime(body, article) {
  let datetime = document.createElement("p");
  datetime.setAttribute("class", "card-text");
  datetime.setAttribute("date", article["datetime"]);
  datetime.setAttribute("id", "datetime");
  // const DAYS = document.createElement("span");
  // DAYS.setAttribute("id", "days");
  // datetime.appendChild(DAYS);
  // datetime.textContent += "d";
  // const HOURS = document.createElement("span");
  // HOURS.setAttribute("id", "hours");
  // datetime.appendChild(HOURS);
  // datetime.textContent += "h";
  // const MINUTES = document.createElement("span");
  // MINUTES.setAttribute("id", id);
  // datetime.appendChild(MINUTES);
  // datetime.textContent += "m";
  // const SECONDS = document.createElement("span");
  // SECONDS.setAttribute("id", "seconds");
  // datetime.appendChild(SECONDS);
  // datetime.textContent += "s";
  datetime.textContent = article["datetime"];
  //chronoBucle();
  body.appendChild(datetime);
}

function createBtn(body, article) {
  let productLink = "/product?id=" + article["id"];
  let productBtn = document.createElement("a");
  productBtn.setAttribute("href", productLink);
  productBtn.setAttribute("class", "btn bttn click");
  productBtn.setAttribute("productId", article["id"]);
  productBtn.setAttribute("id", "buttonLink");
  productBtn.textContent = "Pujar";
  body.appendChild(productBtn);
}
