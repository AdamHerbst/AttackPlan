<?php

class User {

    private $username = null;
    private $password = null;
    private $email = null;

    //Constructor:
    public function __construct($username) {
        $this->name = $username;
    }

    public function setUsername($username) {
        $this->name = $username;
    }
    public function getUsername() {
        return $this->name;
    }

    public function setPassword($password) {
        $this->password = $password;
    }
    public function getPassword() {
        return $this->password;
    }

    public function setEmail($email) {
        $this->email = $email;
    }
    public function getEmail() {
        return $this->email;
    }
}

?>
