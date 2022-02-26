<?php 

require "connection.php";
require "functions.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $list = $_POST["list"];

    if (empty($list)) {
        echo "Sommige velden zijn niet ingevuld";
    } else {
        createList($list);
        header("location:index.php");
        die();
    }
}

$lists = getLists();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To do list - Lijst maken</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/cdec2dabe7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <a href="index.php">Home</a>
    <h1>Lijst maken</h1>
    <form method="POST" action="createList.php">
        <label>Lijst naam: </label><br>
        <input autocomplete="off" placeholder="Lijst naam" name="list" type="text"><span style="color: red;"> *</span><br>
        <input value="Lijst maken" class="btn btn-info" type="submit">
    </form>
</body>
</html>