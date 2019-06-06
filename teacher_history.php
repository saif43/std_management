<?php

include_once('connection.php');
$subjectid = $_GET['subject'];

$result = $conn->query("SELECT person.name,teacher_history.semester FROM person JOIN teacher_history ON person.id=teacher_history.facultyid AND teacher_history.courseid='$subjectid'");


?>



<!DOCTYPE html>
<html>
    <head>
        <title>Teacher & Course History</title>
        <link rel="stylesheet" href="css/style.css">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    </head>
    <body>
         <div class="navbar">
            <ul>
              <li><a href="registration.php">Registration</a></li>
              <li><a href="history.php">History Page</a></li>
              <li><a href="signout.php">Sign out</a></li>
          </ul>
        </div>
         <h2 style="text-align: center;"><?php echo $conn->query("SELECT name FROM course WHERE course.id='$subjectid'")->fetch_object()->name ?></h2>
         <?php if($result->num_rows) { ?>
         <div class="container">
             <div class="table-responsive">
                 <table class="table table-bordered">
                     <thead>
                         <tr>
                             <th>Teacher</th>
                             <th>Semester</th>
                         </tr>
                     </thead>
                     <?php while($row = $result->fetch_assoc()) { ?>             
                     <tr>
                         <td><?php echo $row['name'] ?></td>
                         <td><?php echo $row['semester'] ?></td>
                         
                     </tr>
                     <?php } ?>
                 </table>
             </div>
         </div>
        <?php } else { ?>
        <br>
        <br>
        <br>
        <br>
        <h1 style="text-align:center; color:#9e9e9e;">No history available</h1>
        <?php } ?>
        

    </body>
</html>