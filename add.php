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
// fill every Store Id field with the storeId of the employee, to prevent adding in another shop
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
    <h1>Add New Brand</h1>
    <form action="/bikestores/brands/create" method="POST" id="brands">
        <div class="form-group">
            <label for="brandName">Brand Name:</label>
            <input type="text" class="form-control" id="brandName" name="brandName" placeholder="Enter brand name" required>
        </div>
        <div class="form-group">
            <label for="apiKey">API Key:</label>
            <input type="text" class="form-control" id="apiKey" name="API_KEY" placeholder="Enter API Key" value="e8f1997c763" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <hr>

    <h1>Add New Category</h1>
    <form action="/bikestores/categories/create" method="POST" id="category">
        <div class="form-group">
            <label for="categoryName">Category Name:</label>
            <input type="text" class="form-control" id="categoryName" name="categoryName" placeholder="Enter category name" required>
        </div>
        <div class="form-group">
            <label for="apiKey">API Key:</label>
            <input type="text" class="form-control" id="apiKey" name="API_KEY" placeholder="Enter API Key" value="e8f1997c763" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <hr>

    <h1>Add New Product</h1>
    <form action="/bikestores/products/create" method="POST" id="products">
        <div class="form-group">
            <label for="productName">Product Name:</label>
            <input type="text" class="form-control" id="productName" name="productName" placeholder="Enter product name" required>
        </div>
        <div class="form-group">
            <label for="brandId">Brand ID:</label>
            <input type="number" class="form-control" id="brandId" name="brandId" placeholder="Enter brand ID" required>
        </div>
        <div class="form-group">
            <label for="categoryId">Category ID:</label>
            <input type="number" class="form-control" id="categoryId" name="categoryId" placeholder="Enter category ID" required>
        </div>
        <div class="form-group">
            <label for="modelYear">Model Year:</label>
            <input type="number" class="form-control" id="modelYear" name="modelYear" placeholder="Enter model year" required>
        </div>
        <div class="form-group">
            <label for="listPrice">Product Price:</label>
            <input type="number" class="form-control" id="productPrice" name="productPrice" step="0.10" placeholder="Enter list price" required>
        </div>
        <div class="form-group">
            <label for="apiKey">API Key:</label>
            <input type="text" class="form-control" id="apiKey" name="API_KEY" placeholder="Enter API Key" value="e8f1997c763" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <?php if (isset($employeeInfo) && $employeeInfo["role"] != "employee") : ?>
        <hr>
        <h1>Add New Employee</h1>
        <form action="/bikestores/stocks/create" method="POST" id="emp">
            <div class="form-group">
                <label for="storeId">Store ID:</label>
                <input type="number" class="form-control" id="storeId" name="storeId" placeholder="Enter store ID" value="<?php echo $storeId; ?>" <?php echo $disabled; ?> required>
            </div>
            <div class="form-group">
                <label for="productId">Product ID:</label>
                <input type="number" class="form-control" id="productId" name="productId" placeholder="Enter product ID" required>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Enter quantity" required>
            </div>
            <div class="form-group">
                <label for="apiKey">API Key:</label>
                <input type="text" class="form-control" id="apiKey" name="API_KEY" placeholder="Enter API Key" value="e8f1997c763" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
</div>
<?php endif; ?>

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