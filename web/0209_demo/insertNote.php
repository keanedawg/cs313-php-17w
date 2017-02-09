<?php

require("dbConnect.php");
$db = get_db();

$course_id = htmlspecialchars($_POST['course_id']);
$date = htmlspecialchars($_POST['date']);
$content = htmlspecialchars($_POST['content']);

$statement = $db->prepare("INSERT INTO note(course_id, date, content) VALUES (:course_id, :date, :content)");

$statement->bindValue(":course_id", $course_id, PDO::PARAM_INT);
$statement->bindValue(":date", $date, PDO::PARAM_STR);
$statement->bindValue(":content", $content, PDO::PARAM_STR);

$statement->execute();
// check to see if it succeeded?

header("Location: viewNotes.php?course_id=$course_id");
die();


?>