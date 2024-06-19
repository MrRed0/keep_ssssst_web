<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <title>Home</title>
</head>

<body>
    <?php include '../header.php';
    $ID = $_SESSION["ID"];
    include '../includes/alleitems.inc.php';
    $dbhandler = new dbhandler();
    $itemData = $dbhandler->alleitems($ID);

    ?>
    <div id="position">
        <div id="box">
            <?php foreach ($itemData as $item) {
                $originalDate = $item["date"];
                $unixDate = strtotime($originalDate);
                $date = date("d-m-Y", $unixDate);
                ?>
                <div class="grid_item">
                    <form action="changeitem.php" class="item" method="POST">
                        <input type="hidden" name="item_ID" value="<?= $item['item_ID']; ?>">
                        <input type="hidden" name="text_inhoud" value="<?= $item['text_inhoud']; ?>">
                        <div><input type="hidden" name="date" value="<?= $date ?>">
                            <p class="datum"><?php echo $date; ?></p>
                        </div>
                        <div><input type="hidden" name="onderwerp" value="<?= $item['onderwerp'] ?>">
                            <p class="onderwerp"><?php echo $item['onderwerp']; ?></p>
                        </div>
                        <button type="submit" class="right_buttons"><i class="fa-solid fa-pen"></i></button>
                    </form>
                    <form action="../includes/delete.inc.php" method="POST">
                        <input type="hidden" name="itemID" value="<?= $item['item_ID']; ?>">
                        <button type="submit" class="right_buttons"><i class="fa-solid fa-trash"></i></button>
                    </form>
                </div>



                <?php
            }
            if (empty($itemData)) {
                echo '<p id="GeenItems">Add a item in the top right</p>';
            }
            ?>
            


        </div>

    </div>


</body>

</html>