import * as articles from "./articles.js";
import * as bids from "./bids.js";
import { updateCountdown, MILLISECONDS_OF_A_SECOND } from "./chrono.js";

var currentBid;
var nextBid = currentBid + currentBid * 0.1;
const SPAN_CURRENT_BID = document.getElementById("price");
const SPAN_NEXT_BID = document.getElementById("next");
const BTN1 = document.getElementById("btn1");
const BTN2 = document.getElementById("btn2");
const BTN3 = document.getElementById("btn3");
const BTN_DIRECT_BID = document.getElementById("direct-bid-btn");
const INPUT_BID = document.getElementById("direct-input");

const ALERT = document.getElementById("alert");
const CONFIRM_PANEL = document.getElementById("confirm");
const CONFIRM_BTN = document.getElementById("confirmbtn");
const CANCEL_BTN = document.getElementById("cancelbtn");
const LOADING = document.getElementById("loading");

const H3 = document.getElementById("name-article");
const IMG = document.getElementById("img");
const DESCRIPTION = document.getElementById("description");
const BTN_PURCHASE = document.getElementById("btn-purchase");

const TABLE_BIDS = document.getElementById("table-bids-body");
const ARTICLEID = window.location.search.substr(4); // Obtendo el id del producto para poder realizar la peticion GET
const BID_HOST = "http://localhost:9900/products/";
const HOST = "http://localhost:9900/products/";
const BIDS_DIRECTION = BID_HOST + ARTICLEID + "/bids";
const DIRECTION = HOST + ARTICLEID;

productRequest();

function productRequest() {
  var requestOptions = {
    method: "GET",
    redirect: "follow",
  };
  fetch(DIRECTION, requestOptions)
    .then((response) => response.json())
    .then((data) => {
      const DATETIME = new Date(data["datetime"]).getTime;
      showArticle(data);
      bidsRequest();
      setCurrentBid();
      LOADING.style.display = "none";
      updateCountdown(DATETIME);
      setInterval(updateCountdown, MILLISECONDS_OF_A_SECOND);
      clickFastBid();
      directBid();
    });
}

function bidsRequest() {
  var requestOptions = {
    method: "GET",
    redirect: "follow",
  };
  fetch(BIDS_DIRECTION, requestOptions)
    .then((response) => response.json())
    .then((data) => {
      getBids(data);
    })
    .catch((error) => console.log("error", error));
}

function bid(currentBid) {
  var myHeaders = new Headers();
  myHeaders.append("Content-Type", "application/json");
  var raw = JSON.stringify({
    productId: `${ARTICLEID}`,
    currentBid: `${currentBid}`,
  });
  var requestOptions = {
    method: "POST",
    headers: myHeaders,
    body: raw,
    redirect: "follow",
  };
  fetch(BIDS_DIRECTION, requestOptions)
    .then((response) => response.json())
    .then((data) => {
      location.reload();
    })
    .catch((error) => console.log("error", error));
}

function getBids(data) {
  TABLE_BIDS.innerHTML = "";
  for (var i = data.length; i > 0; i--) {
    //No muestro la primera puja porque es la que se crea por defecto al crear producto
    var bid = data[i];
    if (typeof bid === "object") {
      var tdUser = document.createElement("td");
      let tdBid = document.createElement("td");
      let tdTime = document.createElement("td");

      tdUser.textContent = "User";
      tdBid.textContent = bid["currentBid"] + "€";
      tdTime.textContent = bid["datetime"];

      let row = document.createElement("tr");
      row.appendChild(tdUser);
      row.appendChild(tdBid);
      row.appendChild(tdTime);
      TABLE_BIDS.appendChild(row);

      currentBid = bid["currentBid"];
      getCurrentBid(data);
    }
  }
}

function getCurrentBid(data) {
  for (var i = 1; i <= data.length; i++) {
    var bid = data[i];
    if (typeof bid === "object") {
      currentBid = bid["currentBid"];
    }
  }
  setCurrentBid();
}

function showArticle(data) {
  H3.textContent = data.name;
  IMG.src = data.image;
  DESCRIPTION.innerHTML = `
        <p id="pdescription"><strong>Descripción:</strong> ${data.description}</p>
        `;
  directPurchase(data);
  setCurrentBid();
}

function directPurchase(data) {
  var price = Math.ceil(data.price / 14);
  var purchasePrice = Math.ceil(
    parseFloat(data.price) + parseFloat(data.price * 0.14)
  );
  BTN_PURCHASE.textContent = `Compra por:\n ${purchasePrice}€`;
  currentBid = price;
  if (currentBid >= data.price) {
    BTN_PURCHASE.style.display = "none";
  }
}

export function setCurrentBid() {
  SPAN_CURRENT_BID.textContent = currentBid;
  nextBid = Math.ceil(parseFloat(currentBid) + parseFloat(currentBid * 0.1));
  SPAN_NEXT_BID.textContent = nextBid;
  INPUT_BID.value = Math.ceil(nextBid);

  BTN1.textContent = Math.ceil(nextBid) + "€";
  BTN2.textContent = Math.ceil(nextBid + nextBid * 0.05) + "€";
  BTN3.textContent = Math.ceil(nextBid + nextBid * 0.1) + "€";
}

function clickFastBid() {
  document.querySelectorAll(".click").forEach((element) => {
    element.addEventListener("click", (e) => {
      const id = e.target.getAttribute("id");
      const button = document.getElementById(id);
      fastBid(button);
    });
  });
}

function fastBid(button) {
  currentBid = button.textContent.slice(0, button.textContent.length - 1);
  confirm();
}

function directBid() {
  //keysInput();
  BTN_DIRECT_BID.onclick = () => {
    validate();
  };
}

function validate() {
  switch (true) {
    case INPUT_BID.value == "":
      ALERT.classList.remove("d-none");
      ALERT.textContent = "Error. El campo no puede estar vacío.";
      INPUT_BID.value = nextBid;
      break;
    case INPUT_BID.value < nextBid:
      ALERT.classList.remove("d-none");
      ALERT.textContent = "Error. Introduce un número entero.";
      INPUT_BID.value = nextBid;
      break;
    case !Number(INPUT_BID.value):
      ALERT.classList.remove("d-none");
      ALERT.textContent = "Error. Introduce un número entero.";
      INPUT_BID.value = nextBid;
      break;
    default:
      ALERT.classList.add("d-none");
      currentBid = INPUT_BID.value;
      confirm();
      break;
  }
}

function confirm() {
  CONFIRM_PANEL.style.display = "block";
  clickCancel();
  clickConfirm();
}

function clickCancel() {
  CANCEL_BTN.onclick = () => {
    CONFIRM_PANEL.style.display = "none";
  };
}

function clickConfirm() {
  CONFIRM_BTN.onclick = () => {
    CONFIRM_PANEL.style.display = "none";
    //setCurrentBid();
    bid(currentBid);
  };
}
