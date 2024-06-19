<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once 'dbhandler.inc.php';
    $ID = $_SESSION["ID"];
    $firstname = htmlspecialchars($_POST["firstname"]);
    $lastname = htmlspecialchars($_POST["lastname"]);
    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);
    $country = htmlspecialchars($_POST["country"]);
    $city = htmlspecialchars($_POST["city"]);
    $postalcode = htmlspecialchars($_POST["postalcode"]);
    $streetname = htmlspecialchars($_POST["streetname"]);
    $housnumber = htmlspecialchars($_POST["housnumber"]);

    if (empty($password)){
        $password = $_SESSION["password"];
    }

    $salted = ("asdf86ads9f86ads986f869asdf6" . $password . "safd980fads89afds098");
    $password1 = hash('sha512', $salted);

    function generateRandomID($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomID = ' ';

        for ($i = 0; $i < $length; $i++) {
            $randomID .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomID;
    }

        $img_name = $_FILES['profileImage']['name'];
        $img_size = $_FILES['profileImage']['size'];
        $tmp_name = $_FILES['profileImage']['tmp_name'];
    
        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ex);
        $allowed_exs = array("jpg", "jpeg", "png"); //lijst met toegestaan extenties 
        $id = generateRandomID(10);
        if (in_array($img_ex_lc, $allowed_exs)) { //check of de img extentie is toegestaan (geen .gif ofzo of .mp4)
            $new_pic_name = $id . ".png"; //verander de img extentie + naam naar een random id + .png
    
            $upload_dir = "../userPP/"; //VERANDER DIT NAAR JOU PATH IN JE DIRECTORY!
            $upload_path = $upload_dir . $new_pic_name;
    
            if (file_exists($upload_path)) {
                $_SESSION['error_message'] = "this filename alreade exists"; //wanneer de file al bestaat
            } else {
                try {
                    move_uploaded_file($tmp_name, $upload_path);
                }
                catch (Exception $e) {
                    $_SESSION['error_message'] = $e->getMessage(); //wanneer er een error is
                }
            }
        }
    $dbhandler = new dbhandler();
    $dbhandler->changeInformation($ID, $firstname, $lastname, $email, $password1, $country, $city, $postalcode, $streetname, $housnumber, $new_pic_name);
    exit();


} else {
    header("Location: ../acountPagina/acountPagina.php?");
    exit();
}