<?php
if (isset($_GET['session'])) {
    session_unset();
    session_destroy();
}
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/29d93e0448.js" crossorigin="anonymous"></script>
    <!-- style stylesheet -->
    <link rel="stylesheet" href="inlogPage.css">
    <title>Inlog page</title>
</head>

<body>

    <div id="title">
        <h1>Keep ssssst!</h1>
    </div>

    <div id="position">
        <div id="box1">
            <form action="../includes/inlog.inc.php" method="post">
                <div id="input">
                    <div class="input-group helft">
                        <input required type="email" name="email" autocomplete="off" class="input">
                        <label class="user-label">Email</label>
                    </div>
                    <div class="input-group helft right">
                        <input required id="password2" type="password" name="password" autocomplete="off"
                            class="input"><i id="eye3" onclick="eye_click3()" class="fa-solid fa-eye"></i>
                        <label class="user-label">password</label>
                    </div>
                </div>
                <div id="buttons">
                    <button class="glowButton"> Login</button>
                    <button type="button" class="glowButton" onclick="signup()">Sign up</button>
                </div>

            </form>
            <div>
                <p id="errorMessage">
                    <?php
                    if (isset($_GET["login"])) {
                        if ($_GET["login"] == "verkeerdeEmail") {
                            echo "wrong email or password";
                        }
                    }
                    if (isset($_GET["signup"])) {
                        if ($_GET["signup"] == "passwordsDontMatch") {
                            echo "password doesn't match";
                        }
                    }
                    if (isset($_GET["signup"])) {
                        if ($_GET["signup"] == "emailexists") {
                            echo "email already exists";
                        }
                    }
                    ?>
                </p>
                <p id="accountCreated">
                    <?php
                    if (isset($_GET["signup"])) {
                        if ($_GET["signup"] == "succes") {
                            echo "account created";
                        }
                    }
                    ?>
                </p>
            </div>
        </div>
        <div id="box2">
            <form action="../includes/signUp.inc.php" method="post" id="formCreateAcount">
                <div id="rij1">
                    <div class="input-group helft">
                        <input required type="text" name="firstname" autocomplete="off" class="input">
                        <label class="user-label">firstname</label>
                    </div>
                    <div class="input-group helft">
                        <input required type="text" name="lastname" autocomplete="off" class="input">
                        <label class="user-label">surname</label>
                    </div>
                </div>
                <div id="rij2">
                    <div class="input-group heel">
                        <input required type="email" name="email" autocomplete="off" class="input">
                        <label class="user-label">email</label>
                    </div>
                </div>
                <div id="rij3">
                    <div class="input-group " id="eenderde">
                        <input required type="text" name="country" autocomplete="off" class="input">
                        <label class="user-label">country</label>
                    </div>
                    <div class="input-group " id="tweederde">
                        <input required type="text" name="city" autocomplete="off" class="input">
                        <label class="user-label">city</label>
                    </div>
                    <div class="input-group" id="driederde">
                        <input required type="text" name="postalcode" autocomplete="off" class="input"
                            pattern="[0-9]{4}[A-Za-z]{2}">
                        <label class="user-label">postalcode</label>
                    </div>

                </div>
                <div id="rij4">
                    <div class="input-group eentweede">
                        <input required type="text" name="streetname" autocomplete="off" class="input">
                        <label class="user-label">streetname</label>
                    </div>
                    <div class="input-group tweetweede">
                        <input required type="text" name="housnumber" autocomplete="off" class="input">
                        <label class="user-label">house number</label>
                    </div>
                </div>
                <div id="rij5">
                    <div class="input-group helft">
                        <input required id="password" type="password" name="password" autocomplete="off"
                            class="input"><i id="eye1" onclick="eye_click1()" class="fa-solid fa-eye"></i>
                        <label class="user-label">password</label>
                    </div>
                    <div class="input-group helft">
                        <input required id="passwordVerifiëren" type="password" name="passwordVerifiëren"
                            autocomplete="off" class="input"><i id="eye2" onclick="eye_click2()"
                            class="fa-solid fa-eye"></i>
                        <label class="user-label">password verify</label>
                    </div>
                </div>
                <div id="rij6">
                    <button type="submit" class="glowButton" id="withButton">Create acount</button>
                </div>
            </form>
        </div>




        <script>
            function signup() {
                var box1 = document.getElementById("box1").style.display = "none";
                var box2 = document.getElementById("box2").style.display = "block";
            }

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
            function eye_click2() {
                let eye2 = document.getElementById("eye2");
                let password = document.getElementById("passwordVerifiëren");
                if (password.type === "password") {
                    password.type = "text";
                    eye2.className = "fa-solid fa-eye-slash";
                } else {
                    password.type = "password";
                    eye2.className = "fa-solid fa-eye";
                }
            }
            function eye_click3() {
                let eye3 = document.getElementById("eye3");
                let password = document.getElementById("password2");
                if (password.type === "password") {
                    password.type = "text";
                    eye3.className = "fa-solid fa-eye-slash";
                } else {
                    password.type = "password";
                    eye3.className = "fa-solid fa-eye";
                }
            }
        </script>
</body>

</html>