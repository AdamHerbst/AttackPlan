<?php

class UserDAO {
    private $connection = null;

    public function __construct($connection) {
      $this->connection = $connection;
    }

    public function createUser($user) {

        echo "username: " . $user->getUsername();
        echo "<br>";
        echo "password: " . $user->getPassword();
        echo "<br>";
        echo "email: " . $user->getEmail();
        echo "<br>";

        $sql = "INSERT INTO users(username, password, email) VALUES(?,?,?)";
        $statement = DatabaseHelper::runQuery($this->connection, $sql, Array($user->getUsername(), $user->getPassword(), $user->getEmail()));
        echo "Hi " . $user->getUsername() . "You have created an account";
    }

    // public function getAll() {
    //     $sql = 'SELECT * FROM users';
    //     $statement = DatabaseHelper::runQuery($this->connection, $sql, null);

    //     $result = $statement->fetchAll();
    //     $username = array();
    //     foreach ($result as $row) {  
    //         $username = $this->findByUsername($row);
    //        // array_push($cities, $city);
    //     }

    //     return $username;        
    // }

    public function findByUsername($user) {
     
        $sql = 'SELECT * FROM users WHERE username=? ';
        $statement = DatabaseHelper::runQuery($this->connection, $sql, Array($username));

        $name = $statement->fetch();

        foreach ($name as $nme) {
            echo $nme['username'];
    }
        
        // $result = $statement->fetch();

        return $user;
    }

  //   private function toUser($row) {
  //     $city = new User($row['username']);  
  //     return $city;
  // }

    // public function deleteByUsername($username) {
     
    //     $sql = 'DELETE FROM users WHERE username=? ';
    //     $statement = DatabaseHelper::runQuery($this->connection, $sql, Array($username));
    //     $row = $statement->fetch();

    //     return $username;
    // }

}

?>