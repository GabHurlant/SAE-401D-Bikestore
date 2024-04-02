<?php
require_once("controller/Controller.class.php");
if (isset($_POST["mdp"])) {
    $controller = new Controller($_POST);
    $controller->invoke();
} else {
    $controller = new Controller($_GET);
    $controller->invoke();
}
