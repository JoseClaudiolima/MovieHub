<?php

class User{
    private $id;
    private $f_name;
    private $l_name;
    private $email;
    private $password;
    private $bio;
    private $token;
    private $image;


    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }
    

    public function getName(){
        return $this->f_name;
    }
    public function setName($f_name){
        $this->f_name = $f_name;
    }


    public function getLastName(){
        return $this->l_name;
    }
    public function setLastName($l_name){
        $this->l_name = $l_name;
    }

    public function getFullName(){
        return $this->getF_name() . ' ' . $this->getL_name();
    }


    public function getEmail(){
        return $this->email;
    }
    public function setEmail($email){
        $this->email = $email;
    }


    public function getPassword(){
        return $this->password;
    }
    public function setPassword($password){
        $this->password = $password;
    }
    public function generatePassword(){
        $hash_password =  password_hash($password, PASSWORD_DEFAULT);
        return $hash_password;
    }


    public function getBio(){
        return $this->bio;
    }
    public function setBio($bio){
        $this->bio = $bio;
    }


    public function getToken(){
        return $this->token;
    }
    public function setToken($token){
        $this->token = $token;
    }
    public function generateToken(){
        $token_name =  bin2hex(random_bytes(60));
        return $token_name;
    }


    public function getImage(){
        return $this->image;
    }
    public function setImage($image){
        $image_name =  bin2hex(random_bytes(60)) . $image;
        $this->image = $image_name;
    }
}


interface UserDAOInterface{
    public function buildUser($data);
    public function create(User $user, $authUser = false);
    public function update(User $user, $redirect = true);
    public function verifyToken($protected = false);
    public function setTokenToSession($token, $redirect = true);
    public function authenticateUser($email, $password);
    public function findByEmail($email);
    public function findById($id);
    public function findByToken($token);
    public function changePassword(User $user);
    public function destroyToken(); 
}

?>