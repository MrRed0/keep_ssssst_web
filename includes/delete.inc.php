<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $item_ID = $_POST["itemID"];

        echo $item_ID;

    include_once 'dbhandler.inc.php';
    $dbhandler = new dbhandler();
    $dbhandler->delete($item_ID);
    exit();



} else {
    header("Location: ../home/home.php?");
    exit();
}