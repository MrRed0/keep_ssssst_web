<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $itemID = $_POST["item_ID"];
    $originalDate = $_POST["date"];
    $unixDate = strtotime($originalDate);
    $date = date("Y-m-d", $unixDate);
    $onderwerp = $_POST["onderwerp"];
    $text_inhoud = $_POST["text_inhoud"];

    include_once 'dbhandler.inc.php';
    $dbhandler = new dbhandler();
    $dbhandler -> changeItem($itemID, $date, $onderwerp, $text_inhoud);
    exit();

} else {
    header("Location: ../additem/additem.php?");
    exit();
}