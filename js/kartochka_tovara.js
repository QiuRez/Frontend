const btn = document.querySelector(".price_tovar button");
btn.addEventListener("click", function () {
  var dialog = document.querySelector(".modal");
  dialog.style.display = "flex";
});

const btn_close = document.querySelector(".modalDialog button");
btn_close.addEventListener("click", function () {
  var dialog = document.querySelector(".modal");
  dialog.style.display = "none";
});
