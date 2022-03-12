<?php 

require "require/connection.php";
require "require/functions.php";

$deleteTask = false;
$deleteList = false;

$filter = "noFilter";
$sorting = "asc";

$lists = getLists();

if (isset($_GET["filter"])) {
    $filter = $_GET["filter"];
}

if (isset($_GET["sort"])) {
    $sorting = $_GET["sort"];
}

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
    <a class="btn btn-info m-1" href="createList.php"><i class="fas fa-plus"></i>&nbspNieuwe lijst</a>
    <main>
        <h1>Huidige lijsten</h1>
        <form method="GET" action="index.php">
            <label for="sort">Sorteren op: </label>
            <select name="sort" id="sort">
                <option value="asc">Tijd Asc</option>
                <option value="desc">Tijd Desc</option>
            </select>
            <input value="Sort" type="submit">
        </form>
        <form method="GET" action="index.php">
            <label for="filter">Filteren op: </label>
            <select name="filter" id="filter">
                <option value="noFilter">Niet filteren</option>
                <option value="done">Klaar</option>
                <option value="pending">Niet klaar</option>
            </select>
            <input value="Filter" type="submit">
        </form>
        <?php foreach ($lists as $list) { $tasks = getTaskByListId($list["id"], $sorting, $filter); ?>
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
                            <?= "<li class=" . $task["status"] . ">" . $task["task"] . "&nbsp" . $task["time"] . "</li>"?>
                        </ul>
                        <a href="index.php?changeStatus=true&id=<?= $task["id"]?>"><i class="fas fa-check"></i></a>
                        <a href="updateTask.php?id=<?= $task["id"]?>"><i class="fas fa-edit"></i></a>
                        <a href="index.php?deleteTask=confirm"><i class="fas fa-times"></i></a>
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