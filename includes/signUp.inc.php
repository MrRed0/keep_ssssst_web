<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try{
            $firstname = htmlspecialchars($_POST["firstname"]);
            $lastname = htmlspecialchars($_POST["lastname"]);
            $email = htmlspecialchars($_POST["email"]);
            $passwordfirst = htmlspecialchars($_POST["password"]);
            $passwordVerifiëren = htmlspecialchars($_POST["passwordVerifiëren"]);
            $country = htmlspecialchars($_POST["country"]);
            $city = htmlspecialchars($_POST["city"]);
            $postalcode = htmlspecialchars($_POST["postalcode"]);
            $streetname = htmlspecialchars($_POST["streetname"]);
            $housnumber = htmlspecialchars($_POST["housnumber"]);
            
            include_once 'dbhandler.inc.php';
            $dbhandler = new dbhandler();

            if ($passwordfirst === $passwordVerifiëren) {
                $salted = ("asdf86ads9f86ads986f869asdf6" . $passwordfirst . "safd980fads89afds098");
                $password = hash('sha512', $salted);
                $dbhandler -> signUp($firstname, $lastname, $email, $password, $country, $city, $postalcode, $streetname, $housnumber);
                exit();
            }else{
                header("Location: ../inlog/inlogPage.php?signup=passwordsDontMatch");
                exit();
            }

    } catch (Exception $e) {
        echo "Query failed: " . $e->getMessage();
    }
} else {
    header("Location: ../inlog/inlogPage.php?");
    exit();
}