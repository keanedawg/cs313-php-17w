<!DOCTYPE html>
<html>
	<head></head>
	<body>
		<h1>Movie List</h1>

<?php
// Connect to the database

// It would be better to store these in a different file
$dbUser = 'php_movie_guy';
$dbPassword = 'orange';
$dbName = 'movie_db';
$dbHost = 'localhost';
$dbPort = '5432';

try
{
	// Create the PDO connection
	$db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
	// this line makes PDO give us an exception when there are problems, and can be very helpful in debugging!
	$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch (PDOException $ex)
{
	// If this were in production, you would not want to echo
	// the details of the exception.
	echo "Error connecting to DB. Details: $ex";
	die();
}

// Issue the query
$statement = $db->prepare("SELECT id, title FROM movie");
$statement->execute();

// Go through each result
while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
	// The variable "row" now holds the complete record for that row
	$id = $row['id'];
	$title = $row['title'];

	echo "<p><a href='movieDetails.php?movie_id=$id'>$title</a></p>\n";
}

?>

	</body>
</html>