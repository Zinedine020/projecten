<?php
include 'db.php';
$db = new Database();

$db->users("test", 3, 10);

?>