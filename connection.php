<?php 

function openDatabase() {
    try {
        return $conn = new PDO('mysql:host=localhost;dbname=to-do-list', "root", "mysql");
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
}

?>