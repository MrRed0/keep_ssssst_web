<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/29d93e0448.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="acountPagina.css">
    <title>Acount Gegevens</title>
</head>

<body>
    <?php include '../header.php' ?>

    <div id="position">
        <div id="box">
            <div id="position_title">
                <h1>Account information</h1>
            </div>

            <form action="../includes/changeInformation.inc.php" enctype="multipart/form-data" method="POST" id="colums">
                <ul id="names">
                    <li>firstname:</li>
                    <li>surname:</li>
                    <li>email:</li>
                    <li>change password:</li>
                    <li>country:</li>
                    <li>city:</li>
                    <li>postalcode:</li>
                    <li>streetname:</li>
                    <li>house number:</li>
                </ul>
                <ul id="inputs">
                    <li><input type="text" name="firstname" required value="<?= $_SESSION['firstname'] ?>"></li>
                    <li><input type="text" name="lastname" required value="<?= $_SESSION['lastname'] ?>"></li>
                    <li><input type="email" name="email" required value="<?= $_SESSION['email'] ?>"></li>
                    <li><input type="password" name="password" id="password" ></li><i id="eye1" onclick="eye_click1()"class="fa-solid fa-eye"></i>
                    <li><input type="text" name="country" required value="<?= $_SESSION['country'] ?>"></li>
                    <li><input type="text" name="city" required value="<?= $_SESSION['city'] ?>"></li>
                    <li><input type="text" name="postalcode" required pattern="[0-9]{4}[A-Za-z]{2}" value="<?= $_SESSION['postalcode'] ?>"></li>
                    <li><input type="text" name="streetname" required value="<?= $_SESSION['streetname'] ?>"></li>
                    <li><input type="text" name="housnumber" required value="<?= $_SESSION['housnumber'] ?>"></li>
                </ul>
                <div id="acountImg">
                    <div id="imgdiv"><img src="../userPP/<?php echo $_SESSION["profilepicture"]; ?>" alt="user image"></div>
                    <input type="file" name="profileImage">
                    <p id="errorMessage"><?php if (empty($_SESSION['error_message'])){}else{ echo $_SESSION['error_message'];} ?></p>
                    <button type="submit" class="glowButton">save</button>
                </div>
            </form>

        </div>

    </div>

    </div>
    <script>
        function eye_click1() {
            let eye1 = document.getElementById("eye1");
            let password = document.getElementById("password");
            if (password.type === "password") {
                password.type = "text";
                eye1.className = "fa-solid fa-eye-slash";
            } else {
                password.type = "password";
                eye1.className = "fa-solid fa-eye";
            }
        }
    </script>
</body>

</html>