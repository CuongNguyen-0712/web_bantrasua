<?php
    $controllerName = ucfirst($_REQUEST['controller'] ?? "Home_Controller");
    require "../app/controller/$controllerName.php";
?>