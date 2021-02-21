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
        
        $hashed_password = password_hash($user->getPassword(), PASSWORD_DEFAULT);
        $sql = "INSERT INTO users(username, password, email) VALUES(?,?,?)";
        $statement = DatabaseHelper::runQuery($this->connection, $sql, Array($user->getUsername(), $hashed_password, $user->getEmail()));
        
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
     
        $findObject = new User();
        $sql = 'SELECT * FROM users WHERE username=? ';
        $statement = DatabaseHelper::runQuery($this->connection, $sql, Array($user));

        $findObject = $statement->fetch();

        return $findObject;
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