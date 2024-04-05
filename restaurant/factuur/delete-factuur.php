<?php
$id = $_GET["id"];

include_once "factuur.php";

$factuur = new Factuur();
$factuurDelete = $factuur->deleteFactuur($id); // Aangepaste functienaam
