<?php

// Task functies

function createTask($task, $description, $time, $idList) {
    $conn = openDatabase();
    $query = "INSERT INTO taken (task, description, time , idList) VALUES (:task, :description, :time, :idList)";
    $result = $conn->prepare($query);
    $result->bindParam(":task", $task);
    $result->bindParam(":description", $description);
    $result->bindParam(":time", $time);
    $result->bindParam(":idList", $idList);
    $result->execute();
}

function getTask($id) {
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

function getTaskByListId($idList, $sorting, $filter) {
    $conn = openDatabase();
    if ($filter == "done") {
        if ($sorting == "asc") {
            $query = "SELECT * FROM taken WHERE idList = :idList AND status = 'done' ORDER BY time ASC";
        } else if ($sorting == "desc") {
            $query = "SELECT * FROM taken WHERE idList = :idList AND status = 'done' ORDER BY time DESC";
        }
    } else if ($filter == "pending") {
        if ($sorting == "asc") {
            $query = "SELECT * FROM taken WHERE idList = :idList AND status = 'pending' ORDER BY time ASC";
        } else if ($sorting == "desc") {
            $query = "SELECT * FROM taken WHERE idList = :idList AND status = 'pending' ORDER BY time DESC";
        }
    } else {
        if ($sorting == "asc") {
            $query = "SELECT * FROM taken WHERE idList = :idList ORDER BY time ASC";
        } else if ($sorting == "desc") {
            $query = "SELECT * FROM taken WHERE idList = :idList ORDER BY time DESC";
        }
    }
        
    $result = $conn->prepare($query);
    $result->bindParam(":idList", $idList);
    $result->execute();
    return $result->fetchall();
}

function updateTask($task, $description, $time, $id) {
    $conn = openDatabase();
    $query = "UPDATE taken SET task = :task, description = :description, time = :time  WHERE id = :id";
    $result = $conn->prepare($query);
    $result->bindParam(":task", $task);
    $result->bindParam(":description", $description);
    $result->bindParam(":time", $time);
    $result->bindParam(":id", $id);
    $result->execute();
}

function updateTaskStatus($status, $id) {
    $conn = openDatabase();
    $query = "UPDATE taken SET status = :status WHERE id = :id";
    $result = $conn->prepare($query);
    $result->bindParam(":status", $status);
    $result->bindParam(":id", $id);
    $result->execute();
}

function deleteTask($id) {
    $conn = openDatabase();
    $query = "DELETE FROM taken WHERE id = :id";
    $result = $conn->prepare($query);
    $result->bindParam(":id", $id);
    $result->execute();
}

// List functies

function createList($list) {
    $conn = openDatabase();
    $query = "INSERT INTO lijsten (list) VALUES (:list)";
    $result = $conn->prepare($query);
    $result->bindParam(":list", $list);
    $result->execute();
}

function getList($id) {
    $conn = openDatabase();
    $query = "SELECT * FROM lijsten WHERE id = :id";
    $result = $conn->prepare($query);
    $result->bindParam(":id", $id);
    $result->execute();
    return $result->fetch();
}

function getLists() {
    $conn = openDatabase();
    $query = "SELECT * FROM lijsten";
    $result = $conn->prepare($query);
    $result->execute();
    return $result->fetchall();
}

function updateList($list, $id) {
    $conn = openDatabase();
    $query = "UPDATE lijsten SET list = :list WHERE id = :id";
    $result = $conn->prepare($query);
    $result->bindParam(":list", $list);
    $result->bindParam(":id", $id);
    $result->execute();
}

function deleteList($id) {
    $conn = openDatabase();
    $query = "DELETE FROM lijsten WHERE id = :id";
    $result = $conn->prepare($query);
    $result->bindParam(":id", $id);
    $result->execute();
}

?>