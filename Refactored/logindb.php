<?php

// Include the file that configures the DB.
include 'includes/db-config.inc.php';

?>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Create User</title>
</head>
<body>
<?php
if (isset($_POST["username"])) {
    $userDAO = new UserDAO($connection);
    $user = new User($_POST["username"]);
    $user->setPassword($_POST["password"]);
    $user->setEmail($_POST["email"]);
    $userDAO->createUser($user);


    // $userDAO = $user->findByUsername();
    // $userDAO->getUsername($user);    

} 

?>
<form method="post">
    <p>
        <label for="firstName">First Name:</label>
        <input type="text" name="username" id="username">
    </p>
    <p>
        <label for="lastName">Password:</label>
        <input type="text" name="password" id="password">
    </p>
    <p>
        <label for="emailAddress">Email Address:</label>
        <input type="text" name="email" id="emailAddress">
    </p>
    <input type="submit" value="Submit">
</form>
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