
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="additem.css">
    <title>Add item</title>
</head>

<body>
    <?php include '../header.php'; ?>
    <div id="position">
        <form id="form" action="../includes/additem.inc.php" method="post">
            <input required type="date" name="date" id="date" >
            <input required type="text" name="onderwerp" id="onderwerp" placeholder="Subject" maxlength="21">
            <textarea name="text_inhoud" id="text_inhoud" cols="30" rows="10"></textarea>
            <div id="button_position"><button class="glowButton" type="submit"> add item</button></div>

        </form>

    </div>


</body>

</html>