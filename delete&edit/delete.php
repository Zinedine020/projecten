<?php
try {
    include "db.php";
    $db = new Database();

    if (isset($_GET['ID'])) {
        $db->deleteUser($_GET['ID']);
        header("Location: home.php?success");
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
?>
