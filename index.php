<?php 

require "connection.php";
require "functions.php";

$lists = getLists();
$tasks = getTasks();

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
    <a href="createTask.php">Taak maken</a>
    <a href="createList.php">Lijst maken</a>
    <main>
        <h1>Huide lijst met taken</h1>
        <?php foreach ($lists as $list) { ?>
            <div class="list-container bg-secondary">
                <?= "<h3>" . $list["list"] . "</h3>"?>
                <a class="yellow" href="updateTask.php?id=<?= $list["id"]?>"><i class="fas fa-edit"></i></a>
                <a class="red" href="index.php?delete=confirm&id="><i class="fas fa-times"></i></a>
                <?php foreach ($tasks as $task) { ?>
                    <div class="task-container bg-secondary">
                        <?= "<h3>" . $task["task"] . "</h3><br>"?>
                        <?= "<p>Beschrijving:<br> " . $task["description"] . "</p>"?>
                        <?= "<p>Gepland voor: " . $task["time"] . "</p><br>"?>
                        <a class="yellow" href="updateTask.php?id=<?= $task["id"]?>"><i class="fas fa-edit"></i></a>
                        <a class="red" href="index.php?delete=confirm&id="><i class="fas fa-times"></i></a>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
    </main>
</body>
</html>