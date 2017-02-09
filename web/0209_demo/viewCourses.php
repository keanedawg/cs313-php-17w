<?php
// First connect to the database
require("dbConnect.php");

$db = get_db();

?>
<!DOCTYPE html>
<html>
	<head>
	</head>
	<body>
		<h1>View Courses</h1>

		<ul>

<?php
// Iterate through all my courses, and make each one a link

$statement = $db->prepare("SELECT id, name, number FROM course");
$statement->execute();
$rows = $statement->fetchAll(PDO::FETCH_ASSOC);

foreach ($rows as $row) {
	$id = $row['id'];
	$name = $row['name'];
	$number = $row['number'];

	echo "<li><a href='viewNotes.php?course_id=$id'>$number - $name</a></li>\n";
}

?>
		</ul>

	</body>
</html>