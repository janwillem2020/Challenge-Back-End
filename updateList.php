<?php 

require "require/connection.php";
require "require/functions.php";

$error = "";

if (isset($_GET["id"])){
    $id = $_GET["id"];
    $list = getList($id);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $list = $_POST["list"];
    $id = $_GET["id"];

    if (empty($list)) {
        $error = "<p class='error'>Sommige velden zijn niet ingevuld</p>";
    } else {
        $error = "";
        updateList($list, $id);
        header("location:index.php");
        die();
    }
}

$currentPage ="Lijst updaten";

include "header/haeder.php";

?>

<body>
    <h1>Update lijst</h1>
    <?= $error ?>
    <form method="POST" action="updateList.php?id=<?= $id?>">
        <label>Lijst naam: </label>
        <input autocomplete="off" maxlength="20" value="<?= $list["list"] ?>" name="list" type="text"><br><br>
        <input value="Update lijst" class="btn btn-info" type="submit">
    </form>
    <a href="index.php">Annuleren</a>
</body>
</html>