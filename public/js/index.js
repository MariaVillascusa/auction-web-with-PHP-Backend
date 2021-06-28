import { getAllProducts } from './api.js'
import * as articles from "./articles.js";
import { chronoBucle } from "./chrono.js";

getAllProducts((result) => {
  const LOADING = document.getElementById("loading");
  articles.showArticles(result);
  LOADING.style.display = "none";
  // let datetimes = document.querySelectorAll("#datetime");
  // console.log(datetimes);
  // for (let i of datetimes) {
  //   //window.sessionStorage.setItem("datetime",i.getAttribute("date"))
  //   chronoBucle();
  // }
});