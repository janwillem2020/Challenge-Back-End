<?php 

require "connection.php";
require "functions.php";

if (isset($_GET["id"])){
    $id = $_GET["id"];
    $task = getTask($id);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task = $_POST["task"];
    $description = $_POST["description"];
    $time = $_POST["time"];
    $id = $_GET["id"];
    updateTask($task, $description, $time, $id);
    header("location:index.php");
    die();
}

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
    <form method="POST" action="updateTask.php?id=<?= $id?>">
        <label>Task name: </label>
        <input autocomplete="off" value="<?= $task["task"] ?>" name="task" type="text"><br><br>
        <label>Description:  </label>
        <textarea autocomplete="off" name="description"><?= $task["description"] ?></textarea><br><br>
        <label>Time: </label>
        <input autocomplete="off" value="<?= $task["time"] ?>" name="time" type="time"><br><br>
        <input value="Update task" type="submit">
    </form>
    <a href="index.php">Cancel</a>
</body>
</html>