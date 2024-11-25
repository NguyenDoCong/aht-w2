<?php

namespace Controller;

use Model\User;
use Model\UserDB;
use Model\DBConnection;

class UserController
{

    public $userDB;

    public function __construct()
    {
        $connection = new DBConnection("mysql:host=localhost;dbname=to_do_list", "root", "");
        $this->userDB = new UserDB($connection->connect());
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            include 'view/register.php';
        } else {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $user = new User($username, $password);
            $this->userDB->create($user);
            $message = 'User created';
            include 'view/register.php';
        }
    }
    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            // $id = $_GET['id'];
            // $user = $this->userDB->get($id);
            include './view/login.php';
        }
        // include './view/login.php';
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            $user = $this->userDB->login($username, $password);

            if ($user) {
                session_start();
                $_SESSION['user'] = $user;

                header("Location: index.php?page=todos");
                exit();
            } else {
                $error = "Invalid username or password!";
                require './view/login.php';
            }
        } else {
            require './view/login.php';
        }
    }
}
