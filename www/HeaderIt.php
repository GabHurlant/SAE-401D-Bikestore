<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="16x16" href="img/" alt="logo">
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- JQuery UI -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
    <!-- Bootstrap core JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <?php
    //title management
    $title = "Home"; // default title
    if (isset($_GET["action"])) {
        $title = ucfirst($_GET["action"]); // capitalize the first letter
    }
    echo "<title>$title</title>";
    ?>
</head>

<body>

    <div class="container">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom w-100">
            <div class="col-md-1 mb-2 mb-md-0">
                <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
                    <img src="" alt="Bikestore Logo">
                </a>
            </div>
            <nav class="col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <ul class="nav justify-content-center">
                    <?php
                    $actions = ['home', 'add', 'update', 'delete'];
                    $currentAction = isset($_GET["action"]) ? $_GET["action"] : 'home';
                    foreach ($actions as $action) {
                        $active = ($currentAction == $action) ? 'link-primary' : 'text-dark';
                        echo "<li><a href=\"$action.php\" class=\"nav-link px-2 $active\">" . ucfirst($action) . "</a></li>";
                    }
                    ?>
                </ul>
            </nav>
            <a href="index.php?action=disconnection" class="btn btn-primary">Sign out</a>
        </header>
    </div>
    <script>
        document.querySelector('.btn-signout').addEventListener('click', function(e) {
            e.preventDefault();
            if (confirm('Are you sure you want to sign out?')) {
                document.cookie = "employeeInfo=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
                location.reload();
            }
        });
    </script>
</body>

</html>