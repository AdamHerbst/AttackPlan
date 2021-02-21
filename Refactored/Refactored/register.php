<?php


// Include the file that configures the DB.
include 'includes/db-config.inc.php';

?>

<?php
if (isset($_POST["username"])) {

     $email = test_input($_POST["email"]);
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email");
}
     if(!empty($_POST["username"]) && (!empty($_POST["password"])) && (!empty($_POST["email"])))  
      {     
          if(strlen($_POST['password']) < 5)
          {
              die("Passwords must be 5 characters or longer");
          }
          else {
    $userDAO = new UserDAO($connection);
    $user = new User($_POST["username"]);
    $user->setPassword($_POST["password"]);
    $user->setEmail($_POST["email"]);
    $userDAO->createUser($user);

      }
     }
      else {
           die("All Fields are required");
      }

      
     
} 

 function test_input($data){
      $data=trim($data);
      $data=stripslashes($data);
      return $data;
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
               
                <h3 align="center">Register</h3>  
                <br />  
                <form method="post">  
                     <label>Enter Username</label>  
                     <input type="text" name="username" class="form-control" />  
                     <br />  
                     <label>Enter Password</label>  
                     <input type="text" name="password" class="form-control" />  
                        <label>Enter Email</label>
                        <input type="text" name="email" class="form-control">
                     <br />  
                     <input type="submit" name="register" value="Register" class="btn btn-info" />  
                     <br />  
                     <p align="center"><a href="login.php?action=login">Login</a></p>  
                </form>  
                <?php  
                
                ?>  
           </div>  
      </body>  
 </html>  

<!--
    $userDAO = new UserDAO($connection);
    $user = new User("Adam");
    $user->setPassword('12345');
    $user->setEmail('hi@me.com');

    $userDAO->createUser($user);
    // $user = $db->
    // echo '<H3> Record 30</h3>';
    // echo $user->getUsername();
    // $city = $db->findById(251833);
    // echo '<h3>Sample City (id=251833)</h3>';
    // echo $city->getId() . ' ' . $city->getName();
   
    // $cities = $db->getAll();
    // echo '<h3>All Cities</h3>';    

    // foreach ($cities as $c) {  
    //   echo $c->getId() . ' ' . $c->getName() . '<br>';
     -->