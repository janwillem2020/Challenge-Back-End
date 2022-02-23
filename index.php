<?php 

require "connection.php";
require "functions.php";

if (isset($_GET["delete"])){
    $id = $_GET["delete"];
    deleteTask($id);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task = $_POST["task"];
    $description = $_POST["description"];
    $time = $_POST["time"];
    createTask($task, $description, $time);
}

$tasks = getTasks();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To do list</title>
</head>
<body>
    <h1>Create Task</h1>
    <form method="POST" action="index.php">
        <label>Task name: </label>
        <input autocomplete="off" placeholder="Task name" name="task" type="text"><br><br>
        <label>Description:  </label>
        <textarea autocomplete="off" placeholder="Description" name="description"></textarea><br><br>
        <label>Time: </label>
        <input autocomplete="off" name="time" type="time"><br><br>
        <input value="Create task" type="submit">
    </form>
    <main>
        <h1>Huidige taken: </h1>
        <?php foreach ($tasks as $task) { ?>
            <div>
                <?= "<h3>" . $task["task"] . "</h3>"?>
                <?= "<p>Description: " . $task["description"] . "</p>"?>
                <?= "<p>Gepland voor: " . $task["time"] . "</p>"?>
                <a class="yellow" href="updateTask.php?id=<?= $task["id"]?>">Update</a>
                <a class="red" href="index.php?delete=<?= $task["id"]?>">Delete</a>
            </div>
        <?php } ?>
    </main>
</body>
</html>