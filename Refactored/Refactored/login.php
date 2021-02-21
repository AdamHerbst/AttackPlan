<?php
//session_start();

// Include the file that configures the DB.
include 'includes/db-config.inc.php';

?>

<?php
if (isset($_POST["username"])) {
    $userDAO = new UserDAO($connection);
    $user = new User($_POST["username"]);
    $user->setPassword($_POST["password"]);
    $userDAO->findByUsername($user);
} 
?>

<!DOCTYPE html>  
 <html>  
      <head>  
           <title>Attack Plan Day Planner</title>  
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
                     <p align="center"><a href="register.php">Register</a></p>  
                </form>  
               
            
           </div>  
      </body>  
 </html>  