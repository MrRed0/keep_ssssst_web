<?php
    
class dbhandler
    {

        private $dataSource = "mysql:dbname=dagboek;host=localhost;";
        private $userName = "root";
        private $password = "";

public function alleitems($ID){
    try {
        $pdo = new PDO($this->dataSource, $this->userName, $this->password);
        $stmt = $pdo->prepare("SELECT * FROM items WHERE ID = :ID");
        $stmt->bindParam(':ID', $ID, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (Exception $e) {
        echo "Query failed: " . $e->getMessage();
        exit();
    }
}
    }