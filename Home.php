<?php
if (isset($_COOKIE["employeeInfo"])) {
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
}
?>

<head>
    <title>Home</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
</head>

<body>
    <div class="container d-flex flex-column justify-content-center align-items-center min-vh-100 ">
        <h1 class="text-center my-4">Welcome to the Bikestore</h1>

        <h2>find our different stores with the map :</h2>
        <section id="map-section" class="my-4 w-100">
            <div id="mapid" style="height: 400px;"></div>
        </section>
        <br>
        <br>

        <h2>Our products :</h2>
        <div class="d-flex justify-content-end mb-3">
            <select id="categoryFilter" class="form-select mx-2">
                <option value="">All categories</option>
            </select>

            <select id="brandFilter" class="form-select mx-2">
                <option value="">All brands</option>
            </select>
        </div>

        <input type="number" id="priceFilter" placeholder="Max price">
        <section id="data-section" class="my-5 w-100" style="max-height: 500px; overflow-y: auto; overflow-x: auto;">
            <table id="products" class="table">
                <thead>
                    <tr>
                        <th scope="col">Product</th>
                        <th scope="col">Brand</th>
                        <th scope="col">Category</th>
                        <th scope="col">Model year</th>
                        <th scope="col">Price</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </section>
    </div>

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

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="script/home.js" async></script>
</body>

</html>