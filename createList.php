<?php 

require "require/connection.php";
require "require/functions.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $list = $_POST["list"];

    if (empty($list)) {
        $error = "<p class='error'>Sommige velden zijn niet ingevuld</p>";
    } else {
        $error = "";
        createList($list);
        header("location:index.php");
        die();
    }
}

$currentPage = "Lijst maken";

include "header/header.php";

?>

<body>
    <?= $error ?>
    <h1>Lijst maken</h1>
    <form method="POST" action="createList.php">
        <label>Lijst naam: </label><br>
        <input autocomplete="off" maxlength="20" placeholder="Lijst naam" name="list" type="text"><span style="color: red;"> *</span><br>
        <input value="Lijst maken" class="btn btn-info" type="submit">
    </form>
    <a href="index.php">Annuleren</a>
</body>
</html>