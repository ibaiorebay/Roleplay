<?php

/**
 * Class User
 * 
 * Encapsulates a user.
 *
 * @version    0.1
 * 
 * @author     cuatrovientos
 */
class User{

    private $userid;
    private $email;
    private $password;

//Getters and setters of User Class.

    public function getUserid() {
        return $this->userid;
    }

    public function setUserid($userid) {
        $this->userid = $userid;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }
}

?>
