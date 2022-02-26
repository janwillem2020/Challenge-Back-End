<?php 

require "require/connection.php";
require "require/functions.php";

$error = "";

if (isset($_GET["id"])){
    $id = $_GET["id"];
    $task = getTask($id);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task = $_POST["task"];
    $description = $_POST["description"];
    $time = $_POST["time"];
    $id = $_GET["id"];

    if (empty($task) || empty($time)) {
        $error = "<p class='error'>Sommige velden zijn niet ingevuld</p>";
    } else {
        if (empty($description)) {
            $description = "Geen beschrijving";
        }
        $error = "";
        updateTask($task, $description, $time, $id);
        header("location:index.php");
        die();  
    }
}

$currentPage = "Taak updaten";

include "header/header.php";

?>

<body>
    <h1>Update taak</h1>
    <?= $error ?>
    <form method="POST" action="updateTask.php?id=<?= $id?>">
        <label>Taak naam: </label>
        <input autocomplete="off" maxlength="20" value="<?= $task["task"] ?>" name="task" type="text"><br><br>
        <label>Beschrijving:  </label>
        <textarea autocomplete="off" name="description"><?= $task["description"] ?></textarea><br><br>
        <label>Gepland voor: </label>
        <input autocomplete="off" value="<?= $task["time"] ?>" name="time" type="time"><br><br>
        <input value="Update taak" class="btn btn-info" type="submit">
    </form>
    <a href="index.php">Annuleren</a>
</body>
</html>