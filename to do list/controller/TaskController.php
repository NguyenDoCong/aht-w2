<?php

namespace Controller;

use Model\Task;
use Model\TaskDB;
use Model\DBConnection;

class TaskController
{

    public $TaskDB;

    public function __construct()
    {
        $connection = new DBConnection("mysql:host=localhost;dbname=to_do_list", "root", "");
        $this->TaskDB = new TaskDB($connection->connect());
    }

    public function add()
    {
        session_start();

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            include 'view/add.php';
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $title = $_POST['title'];
            $status = isset($_POST['status']) ? 1 : 0;
            $content = $_POST['content'];
            $userID = $_SESSION['user']['id'];
            $priority = $_POST['priority'] ?? 'low';

            $task = new Task($title, $status, $content, $userID, $priority);
            $this->TaskDB->create($task);
            $message = 'task created';
            header("Location: index.php?page=todos");
        }
    }

    public function index()
    {
        session_start();
        $userID = $_SESSION['user']['id'];
        $tasks = $this->TaskDB->getUID($userID);
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['search'])) {
            $query = $_GET['search'];
            $tasks = $this->TaskDB->find($query);
        }
        if (isset($_GET['Low'])) {
            $tasks = $this->TaskDB->filter("low");
        }
        if (isset($_GET['Medium'])) {
            $tasks = $this->TaskDB->filter("medium");
        }
        if (isset($_GET['High'])) {
            $tasks = $this->TaskDB->filter("high");
        }
        if (isset($_GET['All'])) {
            $tasks = $this->TaskDB->getUID($userID);
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $checkedTaskIds = $_POST['completed'] ?? [];
            foreach ($checkedTaskIds as $taskId) {
                echo "Task ID checked: " . htmlspecialchars($taskId) . "<br>";
            }

            foreach ($tasks as $task) {
                $newStatus = in_array($task->id, $checkedTaskIds) ? 1 : 0;
                $this->TaskDB->updateStatus($task->id, $newStatus);
                header("Location: index.php?page=todos");
            }
        }

        include 'view/list.php';
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            print_r($id);
            $task = $this->TaskDB->get($id);
            include 'view/delete.php';
        } else {
            $id = $_GET['id'];
            print_r($id);
            $this->TaskDB->delete($id);
            header("Location: index.php?page=todos");
        }
    }
    public function edit()
    {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $task = $this->TaskDB->get($id);
            include 'view/edit.php';
        } else {
            // echo '<pre>';
            // print_r($_POST); 
            // echo '</pre>';
            // die();
            $id = $_GET['id'];
            // print_r($id);
            $title = $_POST['title'];
            $status = isset($_POST['status']) ? 1 : 0;
            $content = $_POST['content'];
            $userID = $_SESSION['user']['id'];
            $priority = $_POST['priority'] ?? 'low';
            // print_r($priority);

            $task = new Task($title, $status, $content, $userID, $priority);
            // $task = new task($_POST['title'], $_POST['status'], $_POST['content'], $_POST['user_id']);
            $this->TaskDB->update($id, $task);
            header("Location: index.php?page=todos");
            // exit();
        }
    }
}
