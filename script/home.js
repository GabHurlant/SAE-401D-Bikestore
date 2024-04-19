var map = L.map("mapid").setView([51.505, -0.09], 13);

L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
  maxZoom: 19,
}).addTo(map);

// Add markers
var marker = L.marker([36.96331133332417, -121.96819644631584])
  .addTo(map)
  .bindTooltip("Santa Cruz Bikes", {
    permanent: false,
    direction: "top",
  });

var marker2 = L.marker([32.76988607957499, -96.712234961847])
  .addTo(map)
  .bindTooltip("Rowlett Bikes", {
    permanent: false,
    direction: "top",
  });

var marker3 = L.marker([40.65751691868291, -73.61619547496956])
  .addTo(map)
  .bindTooltip("Baldwin Bikes", {
    permanent: false,
    direction: "top",
  });

// Retrieve the API data and display it in the console
$.ajax({
  url: "https://api-bdc.net/data/client-ip",
  type: "GET",
  dataType: "json",
  success: function (data) {
    var ip = data;
    console.log(ip);
  },
  error: function (error) {
    console.log("Error:", error);
  },
});

// API data for the products
// Récupérer les données de l'API
$.ajax({
  url: "https://dev-lasne221.users.info.unicaen.fr/bikestores/products",
  type: "GET",
  dataType: "json",
  success: function (data) {
    // Injecter les données dans le tableau
    var table = document.getElementById("products");
    data.forEach((item) => {
      var row = table.insertRow();
      var cell1 = row.insertCell(0);
      var cell2 = row.insertCell(1);
      var cell3 = row.insertCell(2);
      var cell4 = row.insertCell(3);
      var cell5 = row.insertCell(4);
      cell1.textContent = item.product_name;
      cell2.textContent = item.brand.brand_name;
      cell3.textContent = item.category.category_name;
      cell4.textContent = item.model_year;
      cell5.textContent = item.list_price;
    });
  },
  error: function (error) {
    console.log("Error:", error);
  },
});

// Add options for the category filter
$.ajax({
  url: "https://dev-lasne221.users.info.unicaen.fr/bikestores/categories",
  type: "GET",
  dataType: "json",
  success: function (data) {
    var categoryFilter = document.getElementById("categoryFilter");
    data.forEach((category) => {
      var option = document.createElement("option");
      option.value = category.category_name;
      option.textContent = category.category_name;
      categoryFilter.appendChild(option);
    });
  },
});

// Add options for the brand filter
$.ajax({
  url: "https://dev-lasne221.users.info.unicaen.fr/bikestores/brands",
  type: "GET",
  dataType: "json",
  success: function (data) {
    var brandFilter = document.getElementById("brandFilter");
    data.forEach((brand) => {
      var option = document.createElement("option");
      option.value = brand.brand_name;
      option.textContent = brand.brand_name;
      brandFilter.appendChild(option);
    });
  },
});

// filter for the table
// Récupérer les champs de filtrage et le tableau
var categoryFilter = document.getElementById("categoryFilter");
var brandFilter = document.getElementById("brandFilter");
var priceFilter = document.getElementById("priceFilter");
var table = document.getElementById("products");

// Ajouter un écouteur d'événements pour chaque champ de filtrage
categoryFilter.addEventListener("change", filterTable);
brandFilter.addEventListener("change", filterTable);
priceFilter.addEventListener("input", filterTable);

function filterTable() {
  // Récupérer les valeurs de filtrage
  var category = categoryFilter.value;
  var brand = brandFilter.value;
  var price = priceFilter.value;

  // Parcourir toutes les lignes du tableau
  for (var i = 1; i < table.rows.length; i++) {
    var row = table.rows[i];

    // Récupérer les valeurs de la catégorie, de la marque et du prix de la ligne
    var rowCategory = row.cells[2].textContent;
    var rowBrand = row.cells[1].textContent;
    var rowPrice = Number(row.cells[4].textContent);

    // Si la ligne correspond aux valeurs de filtrage, afficher la ligne, sinon la cacher
    if (
      (category === "" || rowCategory === category) &&
      (brand === "" || rowBrand === brand) &&
      (price === "" || rowPrice <= price)
    ) {
      row.style.display = "";
    } else {
      row.style.display = "none";
    }
  }
}
