<?php 

require "connection.php";
require "functions.php";

$lists = getLists();

$deletePage = false;

if (isset($_GET["deleteTask"])){
    if ($_GET["deleteTask"] == "confirm") {
        $deletePage = true;
    } else {
        $id = $_GET["deleteTask"];
        deleteTask($id);
        header("location:index.php");
        die();
    }
}

if (isset($_GET["deleteList"])){
    if ($_GET["deleteList"] == "confirm") {
        $deletePage = true;
    } else {
        $id = $_GET["deleteList"];
        deleteList($id);
        header("location:index.php");
        die();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To do list - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/cdec2dabe7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <a href="createList.php">Lijst maken</a>
    <main>
        <h1>Huidige lijst met taken</h1>

        <?php foreach ($lists as $list) { $tasks = getTaskByListId($list["id"]); ?>
            <div class="list-container bg-secondary">
                <?= "<h3>" . $list["list"] . "</h3>"?>
                <a class="yellow" href="updateList.php?id=<?= $list["id"]?>"><i class="fas fa-edit"></i></a>
                <a class="red" href="index.php?deleteList=confirm&id="><i class="fas fa-times"></i></a>
                <a href="createTask.php?id=<?= $list["id"]?>"><i class="fas fa-plus"></i></a>
                <?php foreach ($tasks as $task) { ?>
                    <ul class="task-container bg-secondary">
                        <?= "<li>" . $task["task"] . "</li>"?>
                        <?= "<li>Beschrijving:<br> " . $task["description"] . "</li>"?>
                        <?= "<li>Gepland voor: " . $task["time"] . "</li>"?>
                    </ul>
                    <a class="yellow" href="updateTask.php?id=<?= $task["id"]?>"><i class="fas fa-edit"></i></a>
                    <a class="red" href="index.php?deleteTask=confirm&id="><i class="fas fa-times"></i></a>
                <?php } ?>
            </div>
        <?php } ?>
    </main>
    <?php if ($deletePage == true) {?>
    <div class="modal-container">
        <p>Weet je zeker dat je deze taak wil verwijderen?</p>
        <a href="index.php?deleteTask=<?= $task["id"]?>">ja</a><a href="index.php">nee</a>
    </div>
    <?php } ?>
    <?php if ($deletePage == true) {?>
    <div class="modal-container">
        <p>Weet je zeker dat je deze taak wil verwijderen?</p>
        <a href="index.php?deleteList=<?= $list["id"]?>">ja</a><a href="index.php">nee</a>
    </div>
    <?php } ?>
</body>
</html>