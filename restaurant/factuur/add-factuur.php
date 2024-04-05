<?php
include_once "factuur.php";

$factuur = new Factuur();
$klanten = $factuur->selectKlanten();
$producten = $factuur->selectProducten();
$tafels = $factuur->selectTafels();

if (isset($_POST["add"])) {
    // htmlspecialchars is a function that converts special characters to HTML entities
    $klant_id = htmlspecialchars($_POST["klantnaam"]);
    $productenId = htmlspecialchars($_POST["producten"]);
    $tafel = htmlspecialchars($_POST["tafel"]);
    $tijd = htmlspecialchars($_POST["tijd"]);

    // haal de geselecteerde producten uit de database
    $product = $factuur->selectProducten($productenId);
    $inclBTW = $product["prijs_per_stuk"] * 0.21;
    $btwTotaal = $product["prijs_per_stuk"] * 1.21;

    $factuur->addFactuur(date("Y-m-d"), $klant_id, $productenId, $tafel, $tijd, $inclBTW, $btwTotaal);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>factuur</title>
</head>

<body>
    <!-- add factuur table form -->
    <h1 class="text-center">Add Factuur</h1>
    <div class="d-grid gap-2 m-4 d-md-flex justify-content-md-center">
        <a href="view-factuur.php" class="btn btn-primary">View Factuur</a>
    </div>
    <form method="post">
        <!-- message -->
        <?php if (isset($message)) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $message ?>
            </div>
        <?php endif ?>
        <form method="post">

            <div class="form-group px-5">
                <label for="klantnaam" class="form-label">Klantnaam</label>
                <select name="klantnaam" class="form-select">
                    <?php foreach ($klanten as $klant) : ?>
                        <option value="<?php echo $klant["klant_id"] ?>">
                            <?php echo $klant["naam"] ?>
                        </option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="form-group px-5">
                <label for="producten" class="form-label">producten</label>
                <select name="producten" class="form-select">
                    <?php foreach ($producten as $Producten) : ?>
                        <option value="<?php echo $Producten["product_id"] ?>">
                            <?php echo $Producten["omschrijving"] ?>
                        </option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="form-group px-5">
                <label for="tafel" class="form-label">tafels</label>
                <select name="tafel" class="form-select">
                    <?php foreach ($tafels as $tafel) : ?>
                        <option value="<?php echo $tafel["tafel_id"] ?>">
                            <?php echo $tafel["tafelnummer"] ?>
                        </option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="form-group px-5">
                <label for="tijd" class="form-label">Tijd</label>
                <select name="tijd" class="form-select">
                    <option value="8">8:00 uur</option>
                    <option value="10">10:00 uur</option>
                    <option value="12">12:00 uur</option>
                    <option value="14">14:00 uur</option>
                </select>
            </div>
            <div class="form-group pt-2 px-5">
                <button type="submit" class="btn btn-primary" name="add">Add</button>
            </div>
        </form>
    </form>
</body>

</html>
