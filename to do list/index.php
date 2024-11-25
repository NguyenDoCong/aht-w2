<?php
require "model/DBConnection.php";
require "model/TaskDB.php";
require "model/Task.php";
require "controller/TaskController.php";
require "model/UserDB.php";
require "model/User.php";
require "controller/UserController.php";

use \Controller\UserController;

use \Controller\TaskController;

// session_start();
// require 'vendor/autoload.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thêm mới Task</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
</head>

<body>
    <?php

    $page = $_GET['page'] ?? 'login';

    if ($page === 'login') {
        $controller = new UserController();
        $controller->login();
    } elseif ($page === 'register') {
        $controller = new UserController();
        $controller->register();
    } elseif ($page === 'todos') {
        $controller = new TaskController();
        $controller->index();
    } elseif ($page === 'add') {
        $controller = new TaskController();
        $controller->add();
    } elseif ($page === 'delete') {
        $controller = new TaskController();
        $controller->delete();
    } elseif ($page === 'edit') {
        $controller = new TaskController();
        $controller->edit();
    } else {
        echo "Page not found!";
    } ?>


</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"  crossorigin="anonymous"></script>

</html>