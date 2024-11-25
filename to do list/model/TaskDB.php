<?php

namespace Model;

class TaskDB
{
  public $connection;

  public function __construct($connection)
  {
    $this->connection = $connection;
  }

  public function create($task)
  {
    $sql = "INSERT INTO `task`(`id`, `title`, `status`, `content`, `user_id`, `priority`) VALUES (NULL,?, ?, ?,?,?)";
    $statement = $this->connection->prepare($sql);
    $statement->bindParam(1, $task->title);
    $statement->bindParam(2, $task->status);
    $statement->bindParam(3, $task->content);
    $statement->bindParam(4, $task->userID);
    $statement->bindParam(5, $task->priority);

    return $statement->execute();
  }

  public function find($query)
  {
    $sql = "SELECT * FROM task WHERE title LIKE ? OR content LIKE ?";
    $statement = $this->connection->prepare($sql);
    $searchPattern = '%' . $query . '%';
    $statement->bindParam(1, $searchPattern);
    $statement->bindParam(2, $searchPattern);
    $statement->execute();
    $result = $statement->fetchAll();
    $tasks = [];
    foreach ($result as $row) {
      $task = new Task($row['title'], $row['status'], $row['content'], $row['user_id'], $row['priority']);
      $task->id = $row['id'];
      $tasks[] = $task;
    }
    return $tasks;
  }

  public function filter($query)
  {
    $sql = "SELECT * FROM task WHERE priority = ?";
    $statement = $this->connection->prepare($sql);
    $statement->bindParam(1, $query);
    $statement->execute();
    $result = $statement->fetchAll();
    $tasks = [];
    foreach ($result as $row) {
      $task = new Task($row['title'], $row['status'], $row['content'], $row['user_id'], $row['priority']);
      $task->id = $row['id'];
      $tasks[] = $task;
    }
    return $tasks;
  }

  public function update($id, $task)
  {
    $sql = "UPDATE task SET title = ?, status = ?, content = ?, priority = ? WHERE id = ?";
    $statement = $this->connection->prepare($sql);
    $statement->bindParam(1, $task->title);
    $statement->bindParam(2, $task->status);
    $statement->bindParam(3, $task->content);
    $statement->bindParam(4, $task->priority);
    $statement->bindParam(5, $id);
    return $statement->execute();
  }

  public function updateStatus($id, $status)
  {
    $sql = "UPDATE task SET status = :status WHERE id = :id";
    $stmt = $this->connection->prepare($sql);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
  }

  public function getUID($user_id)
  {
    $sql = "SELECT * FROM task WHERE user_id = ?";
    $statement = $this->connection->prepare($sql);
    $statement->bindParam(1, $user_id);
    $statement->execute();
    $result = $statement->fetchAll();
    $tasks = [];
    foreach ($result as $row) {
      $task = new Task($row['title'], $row['status'], $row['content'], $row['user_id'], $row['priority']);
      $task->id = $row['id'];
      $task->id = $row['id'];
      $tasks[] = $task;
    }
    return $tasks;
  }

  public function get($id)
  {
    $sql = "SELECT * FROM task WHERE id = ?";
    $statement = $this->connection->prepare($sql);
    $statement->bindParam(1, $id);
    $statement->execute();
    $row = $statement->fetch();
    $task = new Task($row['title'], $row['status'], $row['content'], $row['user_id'], $row['priority']);
    return $task;
  }

  public function delete($id)
  {
    $sql = "DELETE FROM task WHERE id = ?";
    $statement = $this->connection->prepare($sql);
    $statement->bindParam(1, $id);
    return $statement->execute();
  }
}
