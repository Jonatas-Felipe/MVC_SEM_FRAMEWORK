<?php
    session_start();

    if (isset($_GET['p']) and ! empty($_GET['p']) and $_GET['p'] != '.') {
        $page = $_GET['p'];
    }else{
        $page = "home";
    }

    require_once("./config/baseUrl.php");
    require_once("./config/routes.php");

    $routes = new Routes($page);
    $data = $routes->routes($page);
    $page = $data['page'];

    include "./view/site.php";