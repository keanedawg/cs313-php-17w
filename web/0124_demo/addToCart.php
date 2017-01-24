<?php

session_start();

if (!isset($_SESSION["cart"])) {
	$_SESSION["cart"] = array();
}

$products = $_POST["products"];

foreach ($products as $product) {
	array_push($_SESSION["cart"], $product);
}

header("Location: cart.php");
die("You should have been redirected.");

?>