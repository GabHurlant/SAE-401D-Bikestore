<?php require_once("HeaderCustomer.php") ?>

<head>
    <title>Home</title>
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
</head>

<body>
    <div class="container d-flex flex-column justify-content-center align-items-center vh-100">
        <!-- Section for the map -->
        <section id="map-section" class="my-4 w-100">
            <div id="mapid" style="height: 400px;"></div>
        </section>

        <!-- Section for the table -->
        <section id="data-section" class="my-4 w-100">
            <table id="api-data-table" class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- API data -->
                </tbody>
            </table>
        </section>
    </div>

    <?php require_once("FooterCustomer.php") ?>

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        var map = L.map('mapid').setView([51.505, -0.09], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
        }).addTo(map);

        // Add markers
        var marker = L.marker([36.96331133332417, -121.96819644631584])
            .addTo(map)
            .bindTooltip('Santa Cruz Bikes', {
                permanent: false,
                direction: 'top'
            });;

        var marker2 = L.marker([32.76988607957499, -96.712234961847])
            .addTo(map)
            .bindTooltip('Rowlett Bikes', {
                permanent: false,
                direction: 'top'
            });

        var marker3 = L.marker([40.65751691868291, -73.61619547496956])
            .addTo(map)
            .bindTooltip('Baldwin Bikes', {
                permanent: false,
                direction: 'top'
            });

        // Retrieve the API data and display it in the console
        var ip = <?php echo json_encode(file_get_contents('https://api-bdc.net/data/client-ip')); ?>;
        console.log(ip);
    </script>
</body>

</html>