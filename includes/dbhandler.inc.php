<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    class dbhandler
    {

        private $dataSource = "mysql:dbname=dagboek;host=localhost;";
        private $userName = "root";
        private $password = "";

        public function login($email, $password)
        {
            try {
                $pdo = new PDO($this->dataSource, $this->userName, $this->password);
                $stmt = $pdo->prepare("SELECT * FROM gegevens WHERE email = :email AND password = :password");
                $stmt->bindParam(':email', $email, PDO::PARAM_STR);
                $stmt->bindParam(':password', $password, PDO::PARAM_STR);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                $_SESSION["ID"] = $result["ID"];
                $_SESSION["firstname"] = $result["firstname"];
                $_SESSION["lastname"] = $result["lastname"];
                $_SESSION["email"] = $result["email"];
                $_SESSION["password"] = $result["password"];
                $_SESSION["country"] = $result["country"];
                $_SESSION["city"] = $result["city"];
                $_SESSION["postalcode"] = $result["postalcode"];
                $_SESSION["streetname"] = $result["streetname"];
                $_SESSION["housnumber"] = $result["housnumber"];
                if ($result["profilepictureName"] == null) {
                    $_SESSION["profilepicture"] = "user.jpg";
                } else {
                    $_SESSION["profilepicture"] = $result["profilepictureName"];
                }

                if ($result) {
                    header("Location: ../home/home.php");
                    exit();
                } else {
                    header("Location: ../inlog/inlogPage.php?login=verkeerdeEmail");
                    exit();
                }


            } catch (Exception $e) {
                echo "Query failed: " . $e->getMessage();
                exit();
            }
        }
        public function signUp($firstname, $lastname, $email, $password, $country, $city, $postalcode, $streetname, $housnumber)
        {
            try {
                $pdo = new PDO($this->dataSource, $this->userName, $this->password);
                $stmt = $pdo->prepare("INSERT INTO gegevens (firstname, lastname, email, password, country, city, postalcode, streetname, housnumber) VALUES (:firstname, :lastname, :email, :password, :country, :city, :postalcode, :streetname, :housnumber)");
                $stmt->bindParam(':firstname', $firstname, PDO::PARAM_STR);
                $stmt->bindParam(':lastname', $lastname, PDO::PARAM_STR);
                $stmt->bindParam(':email', $email, PDO::PARAM_STR);
                $stmt->bindParam(':password', $password, PDO::PARAM_STR);
                $stmt->bindParam(':country', $country, PDO::PARAM_STR);
                $stmt->bindParam(':city', $city, PDO::PARAM_STR);
                $stmt->bindParam(':postalcode', $postalcode, PDO::PARAM_STR);
                $stmt->bindParam(':streetname', $streetname, PDO::PARAM_STR);
                $stmt->bindParam(':housnumber', $housnumber, PDO::PARAM_STR);
                $stmt->execute();
                header("Location: ../inlog/inlogPage.php?signup=succes");
                exit();
            } catch (Exception $e) {
                echo "Query failed: " . $e->getMessage();
                echo "email already exists";
                header("Location: ../inlog/inlogPage.php?signup=emailexists");
                exit();
            }
        }

        public function addItem($ID, $date, $onderwerp, $text_inhoud)
        {
            try {
                $pdo = new PDO($this->dataSource, $this->userName, $this->password);
                $stmt = $pdo->prepare("INSERT INTO items (ID, onderwerp, date, text_inhoud) VALUES (:ID, :onderwerp,:date, :text_inhoud)");
                $stmt->bindParam(':ID', $ID, PDO::PARAM_INT);
                $stmt->bindParam(':date', $date, PDO::PARAM_STR);
                $stmt->bindParam(':onderwerp', $onderwerp, PDO::PARAM_STR);
                $stmt->bindParam(':text_inhoud', $text_inhoud, PDO::PARAM_STR);
                $stmt->execute();
                echo "item added";
                header("Location: ../home/home.php?item=succes");
                exit();
            } catch (Exception $e) {
                echo "Query failed: " . $e->getMessage();
                exit();
            }
        }
        public function delete($item_ID)
        {
            try {
                $pdo = new PDO($this->dataSource, $this->userName, $this->password);
                $stmt = $pdo->prepare("DELETE FROM items WHERE item_ID = :item_ID");
                $stmt->bindParam(':item_ID', $item_ID, PDO::PARAM_INT);
                $stmt->execute();
                header("Location: ../home/home.php?item=deleted");
                exit();
            } catch (Exception $e) {
                echo "Query failed: " . $e->getMessage();
                exit();
            }
        }

        public function changeItem($itemID, $date, $onderwerp, $text_inhoud)
        {
            try {
                $pdo = new PDO($this->dataSource, $this->userName, $this->password);
                $stmt = $pdo->prepare("UPDATE items SET onderwerp = :onderwerp, date = :date, text_inhoud = :text_inhoud WHERE item_ID = :itemID");
                $stmt->bindParam(':itemID', $itemID, PDO::PARAM_INT);
                $stmt->bindParam(':date', $date, PDO::PARAM_STR);
                $stmt->bindParam(':onderwerp', $onderwerp, PDO::PARAM_STR);
                $stmt->bindParam(':text_inhoud', $text_inhoud, PDO::PARAM_STR);
                $stmt->execute();
                header("Location: ../home/home.php?item=changed");
                exit();
            } catch (Exception $e) {
                echo "Query failed: " . $e->getMessage();
                exit();
            }

        }

        public function changeInformation($ID, $firstname, $lastname, $email, $password, $country, $city, $postalcode, $streetname, $housnumber, $new_pic_name)
        {
            try {
                $pdo = new PDO($this->dataSource, $this->userName, $this->password);
                if ($new_pic_name != null) {
                    $stmt2 = $pdo->prepare("SELECT profilepictureName from gegevens WHERE ID = :ID");
                    $stmt2->bindParam(':ID', $ID, PDO::PARAM_INT);
                    $stmt2->execute();
                    $Result = $stmt2->fetch(PDO::FETCH_ASSOC);
                    $old_pic_name = $Result["profilepictureName"];

                    unlink("../userPP/" . $old_pic_name);
                }
                $stmt = $pdo->prepare("UPDATE gegevens SET firstname = :firstname, lastname = :lastname, email = :email, password = :password, country = :country, city = :city, postalcode = :postalcode, streetname = :streetname, housnumber = :housnumber, profilepictureName = :profilepictureName WHERE ID = :ID");
                $stmt->bindParam(':ID', $ID, PDO::PARAM_INT);
                $stmt->bindParam(':firstname', $firstname, PDO::PARAM_STR);
                $stmt->bindParam(':lastname', $lastname, PDO::PARAM_STR);
                $stmt->bindParam(':email', $email, PDO::PARAM_STR);
                $stmt->bindParam(':password', $password, PDO::PARAM_STR);
                $stmt->bindParam(':country', $country, PDO::PARAM_STR);
                $stmt->bindParam(':city', $city, PDO::PARAM_STR);
                $stmt->bindParam(':postalcode', $postalcode, PDO::PARAM_STR);
                $stmt->bindParam(':streetname', $streetname, PDO::PARAM_STR);
                $stmt->bindParam(':housnumber', $housnumber, PDO::PARAM_STR);
                $stmt->bindParam(':profilepictureName', $new_pic_name, PDO::PARAM_STR);
                $stmt->execute();
                $_SESSION["firstname"] = $firstname;
                $_SESSION["lastname"] = $lastname;
                $_SESSION["email"] = $email;
                $_SESSION["password"] = $password;
                $_SESSION["country"] = $country;
                $_SESSION["city"] = $city;
                $_SESSION["postalcode"] = $postalcode;
                $_SESSION["streetname"] = $streetname;
                $_SESSION["housnumber"] = $housnumber;
                if ($new_pic_name != null) {
                    $_SESSION["profilepicture"] = $new_pic_name;
                }
                header("Location: ../home/home.php");
                exit();
            } catch (Exception $e) {
                echo "Query failed: " . $e->getMessage();
                exit();
            }
        }
    }
} else {
    header("Location: ../inlog/inlogPage.php?");
    exit();
}