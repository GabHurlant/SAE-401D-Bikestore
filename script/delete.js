$(document).ready(function () {
  // AJAX call to fetch product data
  $.ajax({
    url: "/bikestores/products",
    type: "GET",
    success: function (response) {
      var products = response;
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
      console.error(error);
    },
  });

  // Code JavaScript pour mettre à jour l'action du formulaire avec la valeur sélectionnée du menu déroulant
  $("#productSelect").change(function () {
    var selectedProductId = $(this).val();
    $("#deleteProductForm").attr(
      "action",
      "/bikestores/products/delete/" + selectedProductId
    );
  });

  // Submit form when submitted
  $("#deleteProductForm").submit(function (e) {
    e.preventDefault();

    var formData = $(this).serialize();

    $.ajax({
      url: $(this).attr("action"),
      type: "DELETE",
      data: formData,
      success: function (response) {
        alert("Product successfully deleted");
        window.location.reload();
      },
      error: function (xhr, status, error) {
        alert("Error");
      },
    });
  });
});

$(document).ready(function () {
  // AJAX call to fetch brand data
  $.ajax({
    url: "/bikestores/brands",
    type: "GET",
    success: function (response) {
      var brands = response;
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
      console.error(error);
    },
  });

  // Code JavaScript pour mettre à jour l'action du formulaire avec la valeur sélectionnée du menu déroulant
  $("#brandSelect").change(function () {
    var selectedBrandId = $(this).val();
    $("#deleteBrandForm").attr(
      "action",
      "/bikestores/brands/delete/" + selectedBrandId
    );
  });

  // Submit form when submitted
  $("#deleteBrandForm").submit(function (e) {
    e.preventDefault();

    var formData = $(this).serialize();

    $.ajax({
      url: $(this).attr("action"),
      type: "DELETE",
      data: formData,
      success: function (response) {
        alert("Brand successfully deleted");
        window.location.reload();
      },
      error: function (xhr, status, error) {
        alert("Error");
      },
    });
  });
});

$(document).ready(function () {
  // AJAX call to fetch category data
  $.ajax({
    url: "/bikestores/categories",
    type: "GET",
    success: function (response) {
      var categories = response;
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
      console.error(error);
    },
  });

  // Code JavaScript pour mettre à jour l'action du formulaire avec la valeur sélectionnée du menu déroulant
  $("#categorySelect").change(function () {
    var selectedCategoryId = $(this).val();
    $("#deleteCategoryForm").attr(
      "action",
      "/bikestores/categories/delete/" + selectedCategoryId
    );
  });

  // Submit form when submitted
  $("#deleteCategoryForm").submit(function (e) {
    e.preventDefault();

    var formData = $(this).serialize();

    $.ajax({
      url: $(this).attr("action"),
      type: "DELETE",
      data: formData,
      success: function (response) {
        alert("Category successfully deleted");
        window.location.reload();
      },
      error: function (xhr, status, error) {
        alert("Error");
      },
    });
  });
});
