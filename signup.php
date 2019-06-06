<?php

include_once('connection.php');

if(isset($_POST['submit']))
{
    if(isset($_POST["id"]) && isset($_POST["name"]) && isset($_POST["password"]))
    {
        session_start();
        $id = $_POST["id"];
        $name = $_POST["name"];
        $pass = $_POST["password"];
        
        $conn->query("INSERT INTO person (id, name, password, department, type) VALUES
        ('$id', '$name', '$pass', 'CSE', 'student')");
        $_SESSION['id'] = $id;
        header('Location: registration.php');
        
    }
}

?>

<!DOCTYPE html>
<html>
      <head>
          <title>Sign up Page</title>
          <link rel="stylesheet" href="css/style.css">
      </head>
      
      <body>
        <div class="navbar">
            <ul>
                <li style="color: white; font-size: 50px;">United International University</li>

            </ul>
        </div>
          <form action="signup.php" method="post">
              <div class="container_reg">
                  <h1>Sign up Form</h1>
                  
                  <label for="id"><b>Student ID</b></label><br>
                  <input type="text" placeholder="Enter the Id" name="id" pattern="011[0-9]{6}" required><br>
                  
                  <label for="name"><b>Student Name</b></label><br>
                  <input type="text" placeholder="Enter name" name="name" required><br>
                  
                  <label for="psw"><b>Password</b></label><br>
                  <input id="psd" onkeyup="warning()" type="password" placeholder="Enter the Password" name="password" required><br>
                  
                  <br>
                  <p id="warning" style="color:red"></p>
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
            Already have an account, goto <a href="index.php">Log in</a> page.
        </div>
      </body>
</html>
<script>
function warning()
{
    var a =  document.getElementById("psd").value;

    if(a.length < 4)
        document.getElementById("warning").innerHTML = "Password length must be at least 4 !!";
    else
        document.getElementById("warning").innerHTML = "";

}   

</script>