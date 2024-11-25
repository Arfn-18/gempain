<?php

if (isset($_GET['page']) && $_GET['page'] == 'home') {
    $page = 'pages/home.php';
    include 'main.php';
} else if (isset($_GET['page']) && $_GET['page'] == 'gempa') {
    $page = 'views/gempa.php';
    include 'main.php';
} else if (isset($_GET['page']) && $_GET['page'] == 'dataUser') {
    $page = 'views/dataUser.php';
    include 'main.php';
} else if (isset($_GET['page']) && $_GET['page'] == 'posko') {
    $page = 'pages/posko.php';
    include 'main.php';
} else if (isset($_GET['page']) && $_GET['page'] == 'user') {
    $page = 'pages/user.php';
    include 'main.php';
} else if (isset($_GET['page']) && $_GET['page'] == 'logout') {
    $page = 'controller/logout.php';
    include 'main.php';
} else {
    $page = 'pages/home.php';
    include 'main.php';
}
