<?php

$subject = $_POST['subject'];
$section = $_POST['section'];

session_start();
include_once('connection.php');

$userid = $_SESSION['id'];

$result = $conn->query("SELECT student_id,course_id FROM std_course_sec WHERE student_id='$userid' AND course_id='$subject'");                                

if($result->num_rows > 0)
{
    $conn->query("UPDATE std_course_sec SET section_name = '$section' WHERE student_id = '$userid' AND course_id = '$subject'");
}
else
{
    $conn->query("INSERT INTO std_course_sec (student_id, course_id, section_name) VALUES ('$userid', '$subject', '$section')");
}


?>