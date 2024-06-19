<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $ID = $_SESSION["ID"];
    $originalDate = $_POST["date"];
    $unixDate = strtotime($originalDate);
    $date = date("Y-m-d", $unixDate);
    $onderwerp = $_POST["onderwerp"];
    $text_inhoud = $_POST["text_inhoud"];

    include_once 'dbhandler.inc.php';
    $dbhandler = new dbhandler();
    $dbhandler -> addItem($ID, $date, $onderwerp, $text_inhoud);
    exit();

} else {
    header("Location: ../additem/additem.php?");
    exit();
}