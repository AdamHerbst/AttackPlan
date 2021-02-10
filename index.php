<?php
//Connects to phpmyadmin/MySQL database

//Identify the individual user to start session with  
session_start();
if(isset($_SESSION["username"]))
    {
        header("location:welcome.php");
    }
//Start register sequence
if(isset($_POST["register"]))
    {
         // Register information validation
        if(strlen($_POST['password']) < 5)
            {
                die("Passwords must be 5 characters or longer");
            }
        if(empty($_POST["username"]) || empty($_POST["password"]))
            {
                echo '<script>alert("Both Fields are required")</script>';
            }
        else
            {
                // Registers user with supplied information to database
                $username = mysqli_real_escape_string($connect, $_POST["username"]);
                $password = mysqli_real_escape_string($connect, $_POST["password"]);
                $password = password_hash($password, PASSWORD_DEFAULT);
                $query    = "INSERT INTO users(username, password) VALUES('$username', '$password')";
                if(mysqli_query($connect, $query))
                    {
                        echo '<script>alert("Registration Done")</script>';
                    }
            }
    }
// Receieves login credentials
if(isset($_POST["login"]))
    {
        // Login validation    
        if(empty($_POST["username"]) || empty($_POST["password"]))
            {
                echo '<script>alert("Both Fields are required")</script>';
            }
        else
            {
                //Goes to welcome.php page if credentials are correct
                $username = mysqli_real_escape_string($connect, $_POST["username"]);
                $password = mysqli_real_escape_string($connect, $_POST["password"]);
                $query    = "SELECT * FROM users WHERE username = '$username'";
                $result   = mysqli_query($connect, $query);
                if(mysqli_num_rows($result) > 0)
                    {
                        while($row = mysqli_fetch_array($result))
                            {
                                if(password_verify($password, $row["password"]))
                                    {
                                        //return true - goes to welcome.php
                                        $_SESSION["username"] = $username;
                                        header("location:welcome.php");
                                    }
                                else
                                    {
                                        //return false - Denied! user is alerted
                                        echo '<script>alert("Wrong User Details")</script>';
                                    }
                            }
                    }
                else
                    {
                        echo '<script>alert("Wrong User Details")</script>';
                    }
            }
    }
?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Attack Plan Day Planner</title>  
              <!-- Bootstrap requirements -->
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br /><br />  
           <div class="container" style="width:500px;">  
                <h3 align="center"><b>Login to Attack Plan and start planning your days the smart way!</h3>  
                </b><br/>  
                <?php
if(isset($_GET["action"]) == "login")
    {
?>  
                <h3 align="center">Login</h3>  
                <br />  
                <form method="post">  
                     <label>Enter Username</label>  
                     <input type="text" name="username" class="form-control" />  
                     <br />  
                     <label>Enter Password</label>  
                     <input type="text" name="password" class="form-control" />  
                     <br />  
                     <input type="submit" name="login" value="Login" class="btn btn-info" />  
                     <br />  
                     <p align="center"><a href="index.php">Register</a></p>  
                </form>  
                <?php
    }
else
    {
?>  
                <h3 align="center">Register</h3>  
                <br />  
                <form method="post">  
                     <label>Enter Username</label>  
                     <input type="text" name="username" class="form-control" />  
                     <br />  
                     <label>Enter Password</label>  
                     <input type="text" name="password" class="form-control" />  
                     <br />  
                     <input type="submit" name="register" value="Register" class="btn btn-info" />  
                     <br />  
                     <p align="center"><a href="index.php?action=login">Login</a></p>  
                </form>  
                <?php
    }
?>  
           </div>  
      </body>  
 </html>  