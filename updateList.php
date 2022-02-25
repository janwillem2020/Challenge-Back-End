<?php 

require "connection.php";
require "functions.php";

if (isset($_GET["id"])){
    $id = $_GET["id"];
    $list = getList($id);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $list = $_POST["list"];
    $id = $_GET["id"];
    updateList($list, $id);
    header("location:index.php");
    die();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To do list - Update lijst</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/cdec2dabe7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <form method="POST" action="updateList.php?id=<?= $id?>">
        <label>Lijst naam: </label>
        <input autocomplete="off" value="<?= $list["list"] ?>" name="list" type="text"><br><br>
        <input value="Update lijst" class="btn btn-info" type="submit">
    </form>
    <a href="index.php">Cancel</a>
</body>
</html>