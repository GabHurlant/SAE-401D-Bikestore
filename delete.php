<?php if (isset($_COOKIE["employeeInfo"])) {
    $employeeInfo = json_decode($_COOKIE["employeeInfo"], true);

    if ($employeeInfo["role"] == "employee") {
        require_once "www/HeaderEmp.php";
    } else if ($employeeInfo["role"] == "chief") {
        require_once "www/HeaderChief.php";
    } else if ($employeeInfo["role"] == "it") {
        require_once "www/HeaderIt.php";
    }
} else {
    require_once "www/HeaderCustomer.php";
} ?>


<?php
// fill every Store Id field with a storeId of a employee, to prevent Deleteing in anoar shop
$storeId = "";
$disabled = "";
if (isset($_COOKIE["employeeInfo"])) {
    $employeeInfo = json_decode($_COOKIE["employeeInfo"], true);
    if ($employeeInfo["role"] == "employee" || $employeeInfo["role"] == "chief") {
        $storeId = $employeeInfo["store"];
        $disabled = "disabled";
    }
}
?>

<style>
    form {
        margin-bottom: 100px;

    }

    .submit-button {
        margin-top: 20px;

    }
</style>

<div class="container">
    <h1>Delete Brand</h1>
    <!-- Form for deleting brand -->
    <form id="deleteBrandForm" method="POST">
        <div class="form-group">
            <label for="brandSelect">Select Brand:</label>
            <select class="form-control" id="brandSelect" name="brandId" required>
                <!-- Options for brand selection will be inserted here -->
            </select>
        </div>
        <div class="form-group">
            <label for="apiKey">API Key:</label>
            <input type="text" class="form-control" id="apiKey" name="API_KEY" placeholder="Enter API Key" value="e8f1997c763" required>
        </div>
        <button type="submit" class="btn btn-danger">Delete Brand</button>
    </form>

    <hr>

    <h1>Delete Category</h1>
    <!-- Form for deleting category -->
    <form id="deleteCategoryForm" method="POST">
        <div class="form-group">
            <label for="categorySelect">Select Category:</label>
            <select class="form-control" id="categorySelect" name="categoryId" required>
                <!-- Options for category selection will be inserted here -->
            </select>
        </div>
        <div class="form-group">
            <label for="apiKey">API Key:</label>
            <input type="text" class="form-control" id="apiKey" name="API_KEY" placeholder="Enter API Key" value="e8f1997c763" required>
        </div>
        <button type="submit" class="btn btn-danger">Delete Category</button>
    </form>

    <hr>

    <h1>Delete Product</h1>
    <!-- Form for deleting product -->
    <form id="deleteProductForm" method="POST">
        <div class="form-group">
            <label for="productSelect">Select Product:</label>
            <select class="form-control" id="productSelect" name="productId" required>
                <!-- Options for product selection will be inserted here -->
            </select>
        </div>
        <div class="form-group">
            <label for="apiKey">API Key:</label>
            <input type="text" class="form-control" id="apiKey" name="API_KEY" placeholder="Enter API Key" value="e8f1997c763" required>
        </div>
        <button type="submit" class="btn btn-danger">Delete Product</button>
    </form>

    <script src="script/delete.js"></script>

    <?php if (isset($_COOKIE["employeeInfo"])) {
        $employeeInfo = json_decode($_COOKIE["employeeInfo"], true);

        if ($employeeInfo["role"] == "employee") {
            require_once "www/FooterEmp.php";
        } else if ($employeeInfo["role"] == "chief") {
            require_once "www/FooterChief.php";
        } else if ($employeeInfo["role"] == "it") {
            require_once "www/FooterIt.php";
        }
    } else {
        require_once "www/FooterCustomer.php";
    } ?>