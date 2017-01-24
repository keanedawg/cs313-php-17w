<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head></head>
	<body>
		<h2>Your shopping cart</h2>

<?php
	$products = $_SESSION["cart"];

	foreach ($products as $product) {
		echo "<p>$product</p>";
	}

?>

	</body>
</html>