<?php
include "../db.php";

class Bestelling {
    private $dbh;

    public function __construct() {
        $this->dbh = new DB('restaurant');
    }

    public function addBestelling($klant_id, $product_id, $aantal, $datum) {
        $sql = "INSERT INTO bestellingen (klant_id, product_id, aantal, datum) VALUES (?, ?, ?, ?)";
        $placeholders = [$klant_id, $product_id, $aantal, $datum];
        $stmt = $this->dbh->execute($sql, $placeholders);
        return $stmt;
    }

    public function getBestellingen() {
        $sql = "SELECT * FROM bestellingen";
        $stmt = $this->dbh->execute($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getBestellingById($bestelling_id) {
        $sql = "SELECT * FROM bestellingen WHERE bestelling_id = ?";
        $placeholders = [$bestelling_id];
        $stmt = $this->dbh->execute($sql, $placeholders);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateBestelling($bestelling_id, $klant_id, $product_id, $aantal, $datum) {
        $sql = "UPDATE bestellingen SET klant_id = ?, product_id = ?, aantal = ?, datum = ? WHERE bestelling_id = ?";
        $placeholders = [$klant_id, $product_id, $aantal, $datum, $bestelling_id];
        $stmt = $this->dbh->execute($sql, $placeholders);
        return $stmt;
    }

    public function deleteBestelling($bestelling_id) {
        $sql = "DELETE FROM bestellingen WHERE bestelling_id = ?";
        $placeholders = [$bestelling_id];
        $stmt = $this->dbh->execute($sql, $placeholders);
        return $stmt;
    }

    public function getProducts($category, $limit) {
        $sql = "SELECT * FROM producten WHERE categorie = ? LIMIT ?";
        $placeholders = [$category, (int)$limit]; // Zorg ervoor dat het limietparameter wordt gecast naar een integer
        $stmt = $this->dbh->execute($sql, $placeholders);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

// Maak een instantie van de Bestelling class
$bestelling = new Bestelling();

// Controleer of het formulier is verzonden
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Haal de gegevens op uit het formulier
    $klant_id = $_POST["klant_id"];
    $product_id = $_POST["product_id"];
    $aantal = $_POST["aantal"];
    $datum = date("Y-m-d"); // Je kunt de huidige datum gebruiken
    // Voeg de bestelling toe
    $bestelling->addBestelling($klant_id, $product_id, $aantal, $datum);
    // Toon een succesbericht of doe een redirect
    // Voorbeeld: echo "Bestelling toegevoegd!";
}
?>

