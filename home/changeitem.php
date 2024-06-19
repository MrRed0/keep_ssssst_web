
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../additem/additem.css">
    <title>changeitem</title>
</head>

<body>

    <?php include '../header.php';
    $originalDate = $_POST["date"];
    $unixDate = strtotime($originalDate);
    $date = date("Y-m-d", $unixDate);
    ?>

    <div id="position">
        <form id="form" action="../includes/changeitem.inc.php" method="post">
        <input type="hidden" name="item_ID" value="<?= $_POST['item_ID']; ?>">
            <input required type="date" name="date" id="date" value="<?= $date ?>">
            <input required type="text" name="onderwerp" id="onderwerp" placeholder="Subject" maxlength="21"
                value="<?= $_POST['onderwerp'] ?>">
            <textarea name="text_inhoud" id="text_inhoud" cols="30" rows="10"><?php echo $_POST['text_inhoud']; ?></textarea>
            <div id="button_position"><button class="glowButton" type="submit">Save</button></div>
        </form>

    </div>


</body>

</html>