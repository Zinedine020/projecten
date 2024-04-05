<?php

include_once "factuur.php";

$factuur = new Factuur();
$factuurList = $factuur->getFactuur(); // Correcte functienaam

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View factuur</title>
</head>

<body>
    <?php include_once "../layout/nav.php" ?>

    <h1 class="text-center">View factuur</h1>
    <div class="d-grid gap-2 m-4 d-md-flex justify-content-md-center">
        <a href="add-factuur.php" class="btn btn-primary">Add factuur</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Klantnaam</th>
                <th colspan="2" class="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($facatuurList as $factuur) : ?> <!-- Correcte variabelenaam -->
                <tr>
                    <th scope="row"><?php echo $factuur["rekening_id"] ?></th> <!-- Correcte kolomnaam -->
                    <td><?php echo $factuur["klant_id"] ?></td> <!-- Correcte kolomnaam -->
                    <td><a class="btn btn-primary" href="edit-factuur.php?id=<?php echo $factuur["rekening_id"] ?>">Edit</a></td> <!-- Correcte kolomnaam -->
                    <td><a class="btn btn-danger" href="delete-factuur.php?id=<?php echo $factuur["rekening_id"] ?>">Delete</a></td> <!-- Correcte kolomnaam -->
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>

</html>
