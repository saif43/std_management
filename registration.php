<?php

session_start();
include_once('connection.php');

if(!isset($_SESSION['id']))
{
    header('Location: index.php');    
}

$id = $_SESSION['id'];
$i=0;

// Remove temporary record
$conn->query("DELETE FROM std_course_sec WHERE std_course_sec.student_id='$id' AND status is NULL");

$result = $conn->query("SELECT * FROM course WHERE course.id NOT IN (SELECT course_id FROM history WHERE student_id='$id')");

//if page reloads then registration history will be cleaned
// if(isset($_SERVER['HTTP_CACHE_CONTROL']) &&($_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0' ||  $_SERVER['HTTP_CACHE_CONTROL'] == 'no-cache'))
// {
//     $conn->query("DELETE FROM std_course_sec WHERE std_course_sec.student_id='$id'");
// }

?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        
    </head>
    <body>
        <div class="navbar">
            <ul>
              <li><a href="registration.php">Registration Page</a></li>
              <li><a href="history.php">History Page</a></li>
              <li><a href="signout.php">Sign out</a></li>
          </ul>
        </div>
        <div class="container_reg">
            <h1>Registration Page</h1>
            
            <div class="container">
            <div class="table-responsive">          
            <table class="table">
                <thead>
                <tr>
                    <th style="text-align: center;">#</th>
                    <th style="text-align: center;">Course name</th>
                    <th style="text-align: center;">Credit</th>
                    <th style="text-align: center;">Section</th>
                    <th style="text-align: center;">History</th>
                </tr>
                </thead>
                <tbody>
                <?php while($row = $result->fetch_assoc()) { ?>  
                <tr>
                    <td><?php echo ++$i; ?></td>
                    <td><?php echo $row["name"] ?></td>
                    <td><?php echo $row["credit"] ?></td>
                    <td>
                        <select onchange="reg('<?php echo $row["id"] ?>',this.value)">
                            <option value="">Section Select <i class="fa fa-caret-down"></i></option>
                            
                            <?php
                            $subid = $row["id"];
                            $result2 = $conn->query("SELECT section.name FROM course JOIN section WHERE course.id=section.courseid AND course.id='$subid' GROUP BY section.name");                                
                            while($row2 = $result2->fetch_assoc()){
                            ?>

                            <option value="<?php echo $row2['name'] ?>"><?php echo $row2['name'] ?></option>
                            <?php } ?>
                        </select>
                    </td>
                    <td><a href="teacher_history.php?subject=<?php echo $subid ?>" target="_blank">History</a></td>
                </tr>
                
                <?php } ?>
                </tbody>
            </table>
            </div>
            <a class="btn" onclick="complete()">Registration</a>
            </div>
        </div>
    </body>

    <script>
        // This function will insert selected subject & section in db (std_course_sec table)
        function reg(subject,section) 
        {
            $.ajax({  
                url:"temp_insert_data.php",  
                method:"POST",  
                data:{subject:subject,section:section},  
                success:function(data)  
                {  
                    
                }  
            });    
        }


        // this function will check for wrong input of user. If no error found, then all subject will be registerd
        function complete() 
        {
            $.ajax({  
                url:"registration_complete_fetch.php",  
                success:function(data)  
                {  
                    if(data == '0')
                    {
                        alert('Select minimum 3 subjects !');
                    }
                    else
                    {
                        window.location.replace("registration_success.php");    
                    }
                }  
            });    
        }
    
    </script>
</html>