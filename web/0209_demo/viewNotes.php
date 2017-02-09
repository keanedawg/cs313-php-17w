<?php
// First connect to the database
require("dbConnect.php");

$db = get_db();

$course_id = htmlspecialchars($_GET["course_id"]);

?>
<!DOCTYPE html>
<html>
	<head>
		<title>View Notes</title>
	</head>
	<body>
		<h1>View Notes</h1>

		<ul>

<?php
// Iterate through all my courses, and make each one a link

$statement = $db->prepare("SELECT date, content, id FROM note WHERE course_id = :course_id");

$statement->bindValue(":course_id", $course_id, PDO::PARAM_INT);

$statement->execute();
$rows = $statement->fetchAll(PDO::FETCH_ASSOC);

foreach ($rows as $row) {
	$id = $row['id'];
	$date = $row['date'];
	$content = $row['content'];

	echo "<li>$date - $content</li>\n";
}

?>
		</ul>

		<h2>Add a new note to this course</h2>

		<form action="insertNote.php" method="POST">
			<input type="hidden" name="course_id" value="<?php echo $course_id; ?>">
			Date: <input type="date" name="date"><br />
			Content<br />
			<textarea name="content"></textarea>
			<br />
			<input type="submit" value="Add Note">
		</form>

	</body>
</html>