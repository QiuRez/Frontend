function getFileSelected(event) {
  let selectedFile = event.target.files[0];
  var preview = document.getElementById("image_add_tovar");
  preview.src = URL.createObjectURL(selectedFile);
  return selectedFile;
}

function AddHaracteristik() {
  var i = document.querySelectorAll("#harakteristiki").length;
  var harackteristik = document.querySelector(".harakteristika_add_tovar");
  if (i < 11) {
    harackteristik.innerHTML =
      harackteristik.innerHTML +
      '<div class="harakteristiki_and_znachenii">\
        <input type="text" name="harakterisiki' +
      i +
      '" id="harakteristiki" placeholder="Характеристика">\
        <input type="text" name="znachenie' +
      i +
      '" id="znachenie" placeholder="Значение">\
        <input type="button" value="+" onclick="AddHaracteristik()">\
        <input type="button" value="-" onclick="this.parentNode.parentNode.removeChild(this.parentNode);">\
        </div>';
  } else {
    alert("Максимум 11 параметров!");
  }
}

function Proverka() {
  var name_tovar = document.querySelector("#name_add_tovar");
  var opisanie_tovar = document.querySelector("#opisanie_tovara");
  var price_tovar = document.querySelector("#price_add_tovar");
  var harakteristiki_tovar = document.querySelectorAll("#harakteristiki");
  var znachenie_tovar = document.querySelectorAll("#znachenie");
  var photo_tovar = document
    .getElementById("image_add_tovar")
    .getAttribute("src");
  var otvet1 = 0;
  var otvet2 = 0;
  var otvet = 0;

  if (
    name_tovar.value == "" ||
    opisanie_tovar.value == "" ||
    price_tovar.value == ""
  ) {
    alert("Заполните все поля");
    otvet1 = 0;
  } else {
    otvet1 = 1;
  }

  for (var i = 0; i <= harakteristiki_tovar.length - 1; i++) {
    if (harakteristiki_tovar[i].value == "" || znachenie_tovar[i].value == "") {
      otvet2 = 0;
    } else {
      otvet2 = 1;
    }
  }

  if (otvet2 == 0) {
    alert("Заполните характеристики");
  }

  if (otvet1 == 1 && otvet2 == 1) {
    otvet = true;
  } else {
    otvet = false;
  }

  return otvet;
}

function AddTovar() {
  if (Proverka()) {
    var name_tovar = document.querySelector("#name_add_tovar").value;
    var opisanie_tovar = document.querySelector("#opisanie_tovara").value;
    var price_tovar = document.querySelector("#price_add_tovar").value;
    var harakteristiki_tovar = document.querySelectorAll("#harakteristiki");
    var znachenie_tovar = document.querySelectorAll("#znachenie");
    var harackteristika = ["", "", "", "", "", "", "", "", "", "", ""];
    var znachenie = ["", "", "", "", "", "", "", "", "", "", ""];

    for (var i = 0; i <= harakteristiki_tovar.length - 1; i++) {
      harackteristika[i] = harakteristiki_tovar[i].value;
      znachenie[i] = znachenie_tovar[i].value;

      if (harackteristika[i] === "undefined") {
        harackteristika[i] = " ";
      } else {
        harackteristika[i] = harakteristiki_tovar[i].value;
      }

      if (znachenie[i] === "undefined") {
        znachenie[i] = " ";
      } else {
        znachenie[i] = znachenie_tovar[i].value;
      }
    }
  }
}
