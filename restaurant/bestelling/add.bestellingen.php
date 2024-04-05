<?php
include 'bestelling.php'; // Inclusief de Bestelling-klasse
include "../db.php"; // Inclusief de DB-klasse

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

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Bestelling Toevoegen</title>
</head>
<body>
    <h1>Bestelling Toevoegen</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="klant_id">Klant ID:</label>
        <input type="text" name="klant_id" id="klant_id">
        <br>
        <label for="product_id">Product:</label>
        <select name="product_id" id="product_id">
            <?php
            // Query om productgegevens op te halen
            $sql = "SELECT * FROM producten";
            $stmt = $this->dbh->execute($sql, $placeholders);

            
            // Loop door de resultaten en maak een optie voor elk product
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='" . $row['product_id'] . "'>" . $row['naam'] . "</option>";
            }
            ?>
        </select>
        <br>
        <label for="aantal">Aantal:</label>
        <input type="text" name="aantal" id="aantal">
        <br>
        <input type="submit" value="Bestelling Toevoegen">
    </form>
</body>
</html>
