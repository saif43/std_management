<?php

include_once('connection.php');
session_start();

$id = $_SESSION['id'];


$result = $conn->query("SELECT * FROM std_course_sec WHERE student_id = '$id'");

if($result->num_rows >= 3)
{
    $conn->query("SELECT * FROM std_course_sec WHERE student_id = '$id'");
}
else
{
    echo '0';
}




?>