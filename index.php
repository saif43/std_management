<?php

include_once('connection.php');
session_start();

if(isset($_POST['submit']))
{
    if(isset($_POST["id"]) && isset($_POST["password"]))
    {
        $id = $_POST["id"];
        $pass = $_POST["password"];
        
        $result = $conn->query("SELECT * FROM person WHERE id = '$id' AND password='$pass' AND type='student'");

        if($result->num_rows > 0)
        {
        
            $result = $conn->query("SELECT * FROM std_course_sec WHERE std_course_sec.student_id='$id' AND std_course_sec.status='Registered'");
            $_SESSION['id'] = $id;
            
            if($result->num_rows > 0)
            {
                header('Location: registration_success.php');                
            }
            else
            {
                header('Location: registration.php');
            }
            
        }
        
    }
}

?>

<!DOCTYPE html>
<html>
      <head>
          <title>Login Page</title>
          <link rel="stylesheet" href="css/style.css">
      </head>
      
      <body>
        <div class="navbar">
            <ul>
                <li style="color: white; font-size: 50px;">United International University</li>

            </ul>
        </div>
          <form action="index.php" method="post">
              <div class="container_index">
                  <h1>Login Form</h1>
                  
                  <label for="id"><b>Student ID</b></label><br>
                  <input type="text" placeholder="Enter the Id" name="id" required><br>
                  
                  <label for="psw"><b>Password</b></label><br>
                  <input type="password" placeholder="Enter the Password" name="password" required><br>
                  
                  <!-- <label>
                      <input type="checkbox" checked="checked" name="remember" style="margin-bottom: 15px;"> Remember me
                  </label> -->
                  <!-- <div class="clear">
                      <button name="submit" type="button" class="Loginbtn">Login</button>
                      <!-- <input type="reset" class="cancelbtn button" value='Reset'> -->
                  <!-- </div> -->
                  <button type="submit" name="submit">Submit</button>
              </div>
          </form>
        <div class="footer">
            <br>
            If you don't have any account,<a href="signup.php">Sign up</a> from here.
        </div>
      </body>
</html>