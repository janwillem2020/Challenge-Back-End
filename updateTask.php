<?php 

require "connection.php";
require "functions.php";

if (isset($_GET["id"])){
    $id = $_GET["id"];
    $task = getTaskById($id);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task = $_POST["task"];
    $description = $_POST["description"];
    $time = $_POST["time"];
    $id = $_GET["id"];
    updateTask($task, $description, $time, $id);
}

$tasks = getTasks();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Task</title>
</head>
<body>
    <form method="POST" action="updateTask.php?=<?= $id?>">
        <label>Task name: </label>
        <input autocomplete="off" value="<?= $tasks["task"] ?>" name="task" type="text"><br><br>
        <label>Description:  </label>
        <textarea autocomplete="off" value="<?= $tasks["description"] ?>" name="description"></textarea><br><br>
        <label>Time: </label>
        <input autocomplete="off" value="<?= $tasks["time"] ?>" name="time" type="time"><br><br>
        <input value="Update task" type="submit">
    </form>
    <a href="index.php">Cancel</a>
</body>
</html>