<?php

session_start();
include_once('connection.php');

if(!isset($_SESSION['id']))
{
    header('Location: index.php');    
}

$id = $_SESSION['id'];

$result = $conn->query("SELECT course.name,course.credit FROM course JOIN history ON course.id=history.course_id WHERE history.student_id='$id'");

$result2 = $conn->query("SELECT * FROM std_course_sec WHERE std_course_sec.student_id='$id' AND std_course_sec.status='Registered'");

if($result2->num_rows > 0)
    $flag=1;
else
    $flag=0;
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
                <?php if($flag == 1) { ?>
              <li><a href="registration_success.php">Registration Status</a></li>
                <?php } else { ?>
                <li><a href="registration.php">Registration page</a></li>
                <?php } ?>
              <li><a href="history.php">History Page</a></li>
              <li><a href="signout.php">Sign Out</a></li>
          </ul>
        </div>
         <h1 style="text-align: center;">Course History</h1>
         <div class="container">
            <div class="table-responsive">          
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Course name</th>
                    <th>Credit</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                <?php while($row = $result->fetch_assoc()) { ?>  
                <tr>
                    <td>1</td>
                    <td><?php echo $row["name"] ?></td>
                    <td><?php echo $row["credit"] ?></td>
                    <td style="color:green">Completed</td>
                    
                </tr>
                <?php } ?>
                </tbody>
            </table>
            </div>
            </div>
    </body>
</html>