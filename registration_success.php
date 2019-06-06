<?php

include_once('connection.php');
session_start();

$id = $_SESSION['id'];
$i = 0;

$conn->query("UPDATE std_course_sec SET status = 'Registered' WHERE std_course_sec.student_id = '$id'");

$result = $conn->query("SELECT course.id,course.name,std_course_sec.section_name,course.credit FROM course JOIN std_course_sec ON course.id=std_course_sec.course_id WHERE student_id='$id'");

?>



<!DOCTYPE html>
<html>
    <head>
        <title>Registration Success</title>
        <link rel="stylesheet" href="css/style.css">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
         <div class="navbar">
            <ul>
              <li><a href="registration_success.php">Registration Status</a></li>
              <li><a href="history.php">History Page</a></li>
              <li><a href="signout.php">Sign out</a></li>
          </ul>
        </div>
         <h1 style="text-align: center;">Registration Succcess</h1>
         <table class="table">
             <thead>
                 <tr>
                    <th>#</th>
                    <th>Course Name</th>
                    <th>Credit</th>
                    <th>Section</th>
                    <th>Registration</th>
                    <th>History</th>
                 </tr>
             </thead>
             <?php while($row = $result->fetch_assoc()) { $subid = $row['id'];?>             
             <tr>
                <td><?php echo ++$i ?></td>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['section_name'] ?></td>
                <td><?php echo $row['credit'] ?></td>
                <td style="color:green">Success</td>
                <td><a href="teacher_history.php?subject=<?php echo $subid ?>" target="_blank">View History</a></td>
             </tr>
             <?php } ?>
         </table>
    </body>
</html>