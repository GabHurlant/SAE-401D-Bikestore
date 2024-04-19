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
// fill every Store Id field with a storeId of a employee, to prevent Updateing in anoar shop
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
    <h1>Modify Brand</h1>
    <!-- Form for modifying brand -->
    <form id="modifyBrandForm" method="POST">
        <div class="form-group">
            <label for="brandSelect">Select Brand:</label>
            <select class="form-control" id="brandSelect" name="brandId" required>
                <!-- PHP loop to populate dropdown with brand names and IDs -->
                <!-- The JavaScript code for fetching brand names and IDs will be inserted here -->
            </select>
        </div>
        <div class="form-group">
            <label for="brandName">New Brand Name:</label>
            <input type="text" class="form-control" id="brandName" name="brandName" placeholder="Enter new brand name" required>
        </div>
        <div class="form-group">
            <label for="apiKey">API Key:</label>
            <input type="text" class="form-control" id="apiKey" name="API_KEY" placeholder="Enter API Key" value="e8f1997c763" required>
        </div>
        <button type="submit" class="btn btn-primary">Modify Brand</button>
    </form>

    <hr>


    <h1>Modify Category</h1>
    <!-- Form for modifying category -->
    <form id="modifyCategoryForm" method="POST">
        <div class="form-group">
            <label for="categorySelect">Select Category:</label>
            <select class="form-control" id="categorySelect" name="categoryId" required>
                <!-- PHP loop to populate dropdown with category names and IDs -->
                <!-- The JavaScript code for fetching category names and IDs will be inserted here -->
            </select>
        </div>
        <div class="form-group">
            <label for="categoryName">New Category Name:</label>
            <input type="text" class="form-control" id="categoryName" name="categoryName" placeholder="Enter new category name" required>
        </div>
        <div class="form-group">
            <label for="apiKey">API Key:</label>
            <input type="text" class="form-control" id="apiKey" name="API_KEY" placeholder="Enter API Key" value="e8f1997c763" required>
        </div>
        <button type="submit" class="btn btn-primary">Modify Category</button>
    </form>


    <hr>

    <h1>Modify Product</h1>
    <!-- Form for modifying product -->
    <form id="modifyProductForm" method="POST">
        <div class="form-group">
            <label for="productSelect">Select Product:</label>
            <select class="form-control" id="productSelect" name="productId" required>
                <!-- PHP loop to populate dropdown with product names and IDs -->
                <!-- The JavaScript code for fetching product names and IDs will be inserted here -->
            </select>
        </div>
        <div class="form-group">
            <label for="productName">New Product Name:</label>
            <input type="text" class="form-control" id="productName" name="productName" placeholder="Enter new product name" required>
        </div>
        <div class="form-group">
            <label for="modelYear">New Model Year:</label>
            <input type="number" class="form-control" id="modelYear" name="modelYear" placeholder="Enter new model year" required>
        </div>
        <div class="form-group">
            <label for="productPrice">New Product Price:</label>
            <input type="number" class="form-control" id="productPrice" name="productPrice" placeholder="Enter new product price" required>
        </div>
        <div class="form-group">
            <label for="apiKey">API Key:</label>
            <input type="text" class="form-control" id="apiKey" name="API_KEY" placeholder="Enter API Key" value="e8f1997c763" required>
        </div>
        <button type="submit" class="btn btn-primary">Modify Product</button>
    </form>

    <hr>

    <h1>Modify Stock</h1>
    <!-- Form for modifying stock -->
    <form id="modifyStockForm" method="POST">
        <div class="form-group">
            <label for="stockSelect">Select Stock:</label>
            <select class="form-control" id="stockSelect" name="stockId" required>
                <!-- Options for stock selection will be inserted here -->
            </select>
        </div>
        <div class="form-group">
            <label for="quantity">New Quantity:</label>
            <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Enter new quantity" required>
        </div>
        <div class="form-group">
            <label for="apiKey">API Key:</label>
            <input type="text" class="form-control" id="apiKey" name="API_KEY" placeholder="Enter API Key" value="e8f1997c763" required>
        </div>
        <button type="submit" class="btn btn-primary">Modify Stock</button>
    </form>
</div>

<?php if (isset($employeeInfo) && $employeeInfo["role"] != "employee") : ?>
    <hr>
    <h1>Update an Employee</h1>
    <form id="updateEmployeeForm">
        <div class="form-group">
            <label for="employeeSelect">Select Employee:</label>
            <select class="form-control" id="employeeSelect" name="employeeId" required>
                <!-- Options for employee selection will be inserted here -->
            </select>
        </div>
        <div class="form-group">
            <label for="employeeName">Employee Name:</label>
            <input type="text" class="form-control" id="employeeName" name="employee_name" placeholder="Enter employee name" required>
        </div>
        <div class="form-group">
            <label for="storeId">Store ID:</label>
            <input type="number" class="form-control" id="storeId" name="storeId" placeholder="Enter store ID" value="<?php echo $storeId; ?>" <?php echo $disabled; ?> required>
        </div>
        <div class="form-group">
            <label for="employeeEmail">Employee Email:</label>
            <input type="email" class="form-control" id="employeeEmail" name="employee_email" placeholder="Enter employee email" required>
        </div>
        <div class="form-group">
            <label for="employeePassword">Employee Password:</label>
            <input type="password" class="form-control" id="employeePassword" name="employee_password" placeholder="Enter employee password" required>
        </div>
        <div class="form-group">
            <label for="employeeRole">Employee Role:</label>
            <input type="text" class="form-control" id="employeeRole" name="employee_role" placeholder="Enter employee role" required>
        </div>
        <div class="form-group">
            <label for="apiKey">API Key:</label>
            <input type="text" class="form-control" id="apiKey" name="API_KEY" placeholder="Enter API Key" value="e8f1997c763" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
<?php endif; ?>

<script src="script/update.js"></script>

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