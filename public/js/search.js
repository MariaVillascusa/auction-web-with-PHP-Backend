import { getAllProducts } from "./api.js";

const searchBtn = document.getElementById("search-btn");
searchBtn.addEventListener("click", () => {
  searching();
});

function searching() {
  const search = document.getElementById("search").value;
  getAllProducts((result) => {
    const offcanvas = document.getElementById("offcanvas");
    offcanvas.innerHTML = "";
    for (let i = 0; i < result.length; i++) {
      let index = result[i]["name"].toLowerCase().indexOf(search.toLowerCase());
      if (index !== -1) {
        renderSearch(result, i);
      }
    }
  });
}

function renderSearch(result, i) {
  const list = document.createElement("ul");
  const compList = document.createElement("li");
  const resultDiv = document.createElement("div");
  resultDiv.setAttribute("class", "card-body");
  const resultImg = document.createElement("img");
  resultImg.setAttribute("src", result[i]["image"]);
  resultImg.setAttribute("class", "card-img-left");
  const resultSearch = document.createElement("a");
  resultSearch.setAttribute("href", "/product?id=" + result[i]["id"]);
  resultSearch.textContent = result[i]["name"];
  resultDiv.appendChild(resultImg);
  resultDiv.appendChild(resultSearch);
  compList.appendChild(resultDiv);
  list.appendChild(compList);
  offcanvas.appendChild(list);
}
