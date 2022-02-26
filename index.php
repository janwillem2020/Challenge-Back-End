<?php 

require "connection.php";
require "functions.php";

$lists = getLists();

$deleteTask = false;
$deleteList = false;

if (isset($_GET["deleteTask"])){
    if ($_GET["deleteTask"] == "confirm") {
        $deleteTask = true;
    } else {
        $id = $_GET["deleteTask"];
        deleteTask($id);
        header("location:index.php");
        die();
    }
}

if (isset($_GET["deleteList"])){
    if ($_GET["deleteList"] == "confirm") {
        $deleteList = true;
    } else {
        $id = $_GET["deleteList"];
        deleteList($id);
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
    <a href="createList.php"><i class="fas fa-plus"></i>Nieuwe lijst</a>
    <main>
        <h1>Huidige lijsten</h1>

        <?php foreach ($lists as $list) { $tasks = getTaskByListId($list["id"]); ?>
            <div class="list-container">
                <div class="list-container-bar">
                    <?= "<p>" . $list["list"] . "</p>"?>
                    <div class="bar-items">
                        <a href="createTask.php?id=<?= $list["id"]?>"><i class="fas fa-plus"></i></a>
                        <a href="updateList.php?id=<?= $list["id"]?>"><i class="fas fa-edit"></i></a>
                        <a href="index.php?deleteList=confirm&id="><i class="fas fa-times"></i></a>
                    </div>
                </div>
                <div class="list-container-content">
                    <?php foreach ($tasks as $task) { ?>
                        <ul class="task-container">
                            <?= "<li>" . $task["task"] . "&nbsp" . $task["time"] . "</li>"?>
                            <!-- <?= "<li>Beschrijving:<br> " . $task["description"] . "</li>"?>
                            <?= "<li>Gepland voor: " . "</li>"?> -->
                        </ul>
                        <a class="yellow" href="updateTask.php?id=<?= $task["id"]?>"><i class="fas fa-edit"></i></a>
                        <a class="red" href="index.php?deleteTask=confirm&id="><i class="fas fa-times"></i></a>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    </main>
    <?php if ($deleteTask == true) {?>
    <div class="modal-container">
        <p>Weet je zeker dat je taak wil verwijderen?</p>
        <a href="index.php?deleteTask=<?= $task["id"]?>">ja</a><a href="index.php">nee</a>
    </div>
    <?php } ?>
    <?php if ($deleteList == true) {?>
    <div class="modal-container">
        <p>Weet je zeker dat je lijst wil verwijderen?</p>
        <a href="index.php?deleteList=<?= $list["id"]?>">ja</a><a href="index.php">nee</a>
    </div>
    <?php } ?>
</body>
</html>