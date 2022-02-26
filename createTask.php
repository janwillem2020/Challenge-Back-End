<?php 

require "connection.php";
require "functions.php";

$deletePage = false;
$error = "";

if (isset($_GET["delete"])){
    if ($_GET["delete"] == "confirm") {
        $deletePage = true;
    } else {
        $id = $_GET["delete"];
        deleteTask($id);
        header("location:index.php");
        die();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task = $_POST["task"];
    $description = $_POST["description"];
    $time = $_POST["time"];
    $idList = $_GET["id"];
    if (empty($task) || empty($time)) {
        $error = "<p>Sommige velden zijn niet ingevuld</p>";
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

$tasks = getTasks();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To do list - Taak maken</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/cdec2dabe7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <a href="index.php">Home</a>
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
</body>
</html>