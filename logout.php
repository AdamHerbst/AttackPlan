<?php  
//On pushing "log out" the session is ended and client in redirected to login page
 session_start();  
 session_destroy();  
 header("location:index.php?action=login");  
 ?>  