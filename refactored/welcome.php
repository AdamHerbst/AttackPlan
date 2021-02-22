<?php  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Welcome to Attack Plan Day Planner!</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br /><br />  
           <div class="container" style="width:500px;">  
                <h3 align="center"><b>Welcome to Attack Plan Day Planner</b></h3>
                <br>
                <h2 align="center"><b>You have successfully registered!</b></h2>
                <br />  
                <?php  
                echo '<h1>Welcome - '.$_SESSION["username"].'</h1>';  
                echo '<label><a href="logout.php">Logout</a></label>';  
                ?>  
           </div>  
      </body>  
 </html>  