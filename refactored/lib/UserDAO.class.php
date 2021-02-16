<?php

class UserDAO {
    private $connection = null;

    public function __construct($connection) {
        $this->connection = $connection;
    } 

    private function createUser($username) {
        //Not sure about the argument 'username'
        $username = new User('username');  

        // $username->setUsername('username');
        // //Can I assign $pass like this? 
        // $password->setPassword('password');


        $sql = "INSERT INTO users(username, password) VALUES('$username', '$password')";
        //Not sure about Array in $statement
        $statement = DatabaseHelper::runQuery($this->connection, $sql, Array($username));
    }

    public function getAll() {
        $sql = 'SELECT * FROM users';
        $statement = DatabaseHelper::runQuery($this->connection, $sql, null);

        $result = $statement->fetchAll();
        $username = array();
        foreach ($result as $row) {   
            $username = $this->findByUsername($row);
           // array_push($cities, $city);
        }

        return $username;        
    }

    public function findByUsername($username) {
      
        $sql = 'SELECT * FROM users WHERE username=? ';
        $statement = DatabaseHelper::runQuery($this->connection, $sql, Array($id));
        $row = $statement->fetch();

        return $username;
    }

    public function deleteByUsername($username) {
      
        $sql = 'DELETE FROM users WHERE username=? ';
        $statement = DatabaseHelper::runQuery($this->connection, $sql, Array($username));
        $row = $statement->fetch();

        return $username;
    }

}

?>
