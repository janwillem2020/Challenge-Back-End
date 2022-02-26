<?php 

require "require/connection.php";
require "require/functions.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task = $_POST["task"];
    $description = $_POST["description"];
    $time = $_POST["time"];
    $idList = $_GET["id"];
    if (empty($task) || empty($time)) {
        $error = "<p class='error'>Sommige velden zijn niet ingevuld</p>";
    } else {
        if (empty($description)) {
            $description = "Geen beschrijving";
        }
        $error = "";
        createTask($task, $description, $time, $idList);
        header("location:index.php");
        die();
    }
}

$currentPage = "Taak maken";

include "header/header.php";

?>

<body>
    <?= $error ?>
    <h1>Taak maken</h1>
    <form method="POST" action="createTask.php?id=<?= $_GET["id"]?>">
        <label>Taak naam: </label><br>
        <input autocomplete="off" maxlength="20" placeholder="Taak naam" name="task" type="text"><span style="color: red;"> *</span><br>
        <label>Beschrijving:  </label><br>
        <textarea autocomplete="off" placeholder="Beschrijving" name="description"></textarea><br>
        <label>Voor wanneer wil je deze taak plannen? </label><br>
        <input autocomplete="off" name="time" type="time"><span style="color: red;"> *</span><br><br>
        <input value="Taak maken" class="btn btn-info" type="submit">
    </form>
    <a href="index.php">Annuleren</a>
</body>
</html>