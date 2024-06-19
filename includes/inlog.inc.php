<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    

    // dit is het inlog systeem
        try {
            $email = $_POST["email"];
            $passwordfirst = $_POST["password"];
            $salted = ("asdf86ads9f86ads986f869asdf6" . $passwordfirst . "safd980fads89afds098");
            $password = hash('sha512', $salted);
            
            include_once 'dbhandler.inc.php';
            $dbhandler = new dbhandler();
            $dbhandler -> login($email, $password);
            exit();

        } catch (Exception $e) {
            echo "Query failed: " . $e->getMessage();
        }

} else  {
    header("Location: ../inlog/inlogPage.php?");
    exit();
}


