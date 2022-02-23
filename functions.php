<?php 

function createTask($task, $description, $time) {
    $conn = openDatabase();
    $query = "INSERT INTO taken (`task`, `description`, `time`) VALUES (:task, :description, :time)";
    $result = $conn->prepare($query);
    $result->bindParam(":task", $task);
    $result->bindParam(":description", $description);
    $result->bindParam(":time", $time);
    $result->execute();
}

function deleteTask($id) {
    $conn = openDatabase();
    $query = "DELETE FROM taken WHERE id = :id";
    $result = $conn->prepare($query);
    $result->bindParam(":id", $id);
    $result->execute();
}

function updateUser($name, $description, $time, $id) {
    $conn = openDatabase();
    $query = "UPDATE taken SET task = :task, description = :description, time = :time  WHERE id = :id";
    $result = $conn->prepare($query);
    $result->bindParam(":task", $task);
    $result->bindParam(":description", $description);
    $result->bindParam(":time", $time);
    $result->bindParam(":id", $id);
    $result->execute();
}

function getTaskById($id) {
    $conn = openDatabase();
    $query = "SELECT * FROM taken WHERE id = :id";
    $result = $conn->prepare($query);
    $result->bindParam(":id", $id);
    $result->execute();
    return $result->fetch();
}

function getTasks() {
    $conn = openDatabase();
    $query = "SELECT * FROM taken";
    $result = $conn->prepare($query);
    $result->execute();
    return $result->fetchall();
}

?>