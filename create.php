<?php 

include("./Pdo_handler.php");

$db_manager = new Pdo_handler();

$bodemformaat = $db_manager->sanitize($_POST["bodemformaat"]);
$saus = $db_manager->sanitize($_POST["saus"]);
$pizzatoppings = $db_manager->sanitize($_POST["pizzatoppings"]);
$kruiden = $db_manager->sanitize($_POST["kruiden"]);

$db_manager->create($bodemformaat,$saus,$pizzatoppings,$kruiden);

?>