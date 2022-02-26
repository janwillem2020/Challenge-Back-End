<?php 

require "require/connection.php";
require "require/functions.php";

$deleteTask = false;
$deleteList = false;

$lists = getLists();

if (isset($_GET["changeStatus"])) {
    if ($_GET["changeStatus"] == "true") {
        $id = $_GET["id"];
        $status = "done";
        updateTaskStatus($status, $id);
        header("location:index.php");
        die();
    }
}
   
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

$currentPage = "Home";

include "header/header.php";

?>

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
                        </ul>
                        <a href="index.php?changeStatus=true&id=<?= $task["id"]?>"><i class="fas fa-check"></i></i></a>
                        <a href="updateTask.php?id=<?= $task["id"]?>"><i class="fas fa-edit"></i></a>
                        <a href="index.php?deleteTask=confirm&id="><i class="fas fa-times"></i></a>
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