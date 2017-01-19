<?php
session_start();

if (!isset($_SESSION["user"])) {
	header("Location: login.php"); /* Redirect browser */
	exit();
}

$username = $_SESSION["user"];


?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
</head>

<body>
	<p>Welcome <?php echo $username; ?></p>

	<a href="logout.php">Logout</a>

</body>

</html>