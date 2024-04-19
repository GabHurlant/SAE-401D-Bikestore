$(document).ready(function () {
  // Appel AJAX pour récupérer les données des marques
  $.ajax({
    url: "/bikestores/brands", // URL de la route pour récupérer les marques
    type: "GET",
    success: function (response) {
      // Succès de la requête
      var brands = response; // Données des marques
      // Utiliser les données des marques ici
      // Par exemple, vous pouvez les afficher dans le menu déroulant
      brands.forEach(function (brand) {
        $("#brandSelect").append(
          '<option value="' +
            brand.brand_id +
            '">' +
            brand.brand_name +
            "</option>"
        );
      });
    },
    error: function (xhr, status, error) {
      // Gérer les erreurs de la requête
      console.error(error);
    },
  });

  // Code JavaScript pour mettre à jour l'action du formulaire avec la valeur sélectionnée du menu déroulant
  $("#brandSelect").change(function () {
    var selectedBrandId = $(this).val();
    console.log(selectedBrandId);
    $("#modifyBrandForm").attr(
      "action",
      "/bikestores/brands/update/" + selectedBrandId
    );
  });

  // Soumettre le formulaire en utilisant la méthode PUT lorsqu'il est envoyé
  $("#modifyBrandForm").submit(function (e) {
    e.preventDefault(); // Empêche la soumission du formulaire par défaut

    var formData = $(this).serialize(); // Récupère les données du formulaire

    $.ajax({
      url: $(this).attr("action"),
      type: "PUT",
      data: formData,
      success: function (response) {
        // Afficher un message de succès
        alert("Brand successfully modified");
        // Recharger la page
        window.location.reload();
      },
      error: function (xhr, status, error) {
        alert("Error");
      },
    });
  });
});

$(document).ready(function () {
  // Appel AJAX pour récupérer les données des catégories
  $.ajax({
    url: "/bikestores/categories", // URL de la route pour récupérer les catégories
    type: "GET",
    success: function (response) {
      // Succès de la requête
      var categories = response; // Données des catégories
      // Utiliser les données des catégories ici
      // Par exemple, vous pouvez les afficher dans le menu déroulant
      categories.forEach(function (category) {
        $("#categorySelect").append(
          '<option value="' +
            category.category_id +
            '">' +
            category.category_name +
            "</option>"
        );
      });
    },
    error: function (xhr, status, error) {
      // Gérer les erreurs de la requête
      console.error(error);
    },
  });

  // Code JavaScript pour mettre à jour l'action du formulaire avec la valeur sélectionnée du menu déroulant
  $("#categorySelect").change(function () {
    var selectedCategoryId = $(this).val();
    console.log(selectedCategoryId);
    $("#modifyCategoryForm").attr(
      "action",
      "/bikestores/categories/update/" + selectedCategoryId
    );
  });

  // Soumettre le formulaire en utilisant la méthode PUT lorsqu'il est envoyé
  $("#modifyCategoryForm").submit(function (e) {
    e.preventDefault(); // Empêche la soumission du formulaire par défaut

    var formData = $(this).serialize(); // Récupère les données du formulaire

    $.ajax({
      url: $(this).attr("action"),
      type: "PUT",
      data: formData,
      success: function (response) {
        // Afficher un message de succès
        alert("Category successfully modified");
        // Recharger la page
        window.location.reload();
      },
      error: function (xhr, status, error) {
        alert("Error");
      },
    });
  });
});

$(document).ready(function () {
  // Appel AJAX pour récupérer les données des produits
  $.ajax({
    url: "/bikestores/products", // URL de la route pour récupérer les produits
    type: "GET",
    success: function (response) {
      // Succès de la requête
      var products = response; // Données des produits
      // Utiliser les données des produits ici
      // Par exemple, vous pouvez les afficher dans le menu déroulant
      products.forEach(function (product) {
        $("#productSelect").append(
          '<option value="' +
            product.product_id +
            '">' +
            product.product_name +
            "</option>"
        );
      });
    },
    error: function (xhr, status, error) {
      // Gérer les erreurs de la requête
      console.error(error);
    },
  });

  // Code JavaScript pour mettre à jour l'action du formulaire avec la valeur sélectionnée du menu déroulant
  $("#productSelect").change(function () {
    var selectedProductId = $(this).val();
    console.log(selectedProductId);
    $("#modifyProductForm").attr(
      "action",
      "/bikestores/products/update/" + selectedProductId
    );
  });

  // Soumettre le formulaire en utilisant la méthode PUT lorsqu'il est envoyé
  $("#modifyProductForm").submit(function (e) {
    e.preventDefault(); // Empêche la soumission du formulaire par défaut

    var formData = $(this).serialize(); // Récupère les données du formulaire

    $.ajax({
      url: $(this).attr("action"),
      type: "PUT",
      data: formData,
      success: function (response) {
        // Afficher un message de succès
        alert("Product successfully modified");
        // Recharger la page
        window.location.reload();
      },
      error: function (xhr, status, error) {
        alert("Error");
      },
    });
  });
});

$(document).ready(function () {
  // AJAX call to fetch stock data
  $.ajax({
    url: "/bikestores/stocks",
    type: "GET",
    success: function (response) {
      var stocks = response;
      stocks.forEach(function (stock) {
        $("#stockSelect").append(
          '<option value="' +
            stock.stock_id +
            '">' +
            stock.stock_id +
            "</option>"
        );
      });
    },
    error: function (xhr, status, error) {
      console.error(error);
    },
  });

  // Update form action with selected stock ID
  $("#stockSelect").change(function () {
    var selectedStockId = $(this).val();
    $("#modifyStockForm").attr(
      "action",
      "/bikestores/stocks/update/" + selectedStockId
    );
  });

  // Submit form using PUT method when submitted
  $("#modifyStockForm").submit(function (e) {
    e.preventDefault();

    var formData = $(this).serialize();

    $.ajax({
      url: $(this).attr("action"),
      type: "PUT",
      data: formData,
      success: function (response) {
        alert("Stock successfully modified");
        window.location.reload();
      },
      error: function (xhr, status, error) {
        alert("Error");
      },
    });
  });
});
