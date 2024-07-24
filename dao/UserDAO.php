<?php
require_once('models/User.php');
require_once('models/Message.php');

class UserDAO implements UserDAOInterface{
    private $url;
    private $conn;
    private $message;

    public function __construct($url , $conn){
        $this->setUrl($url);
        $this->setConn($conn);
        $this->setMessage();
    }


    public function getUrl(){
        return $this->url;
    }
    public function setUrl($url){
        $this->url = $url;
    }
    

    public function getConn(){
        return $this->conn;
    }
    public function setConn($conn){
        $this->conn = $conn;
    }    

    public function getMessage(){
        return $this->message;
    }
    public function setMessage(){
        $this->message = new Message($this->getUrl());
    }
    


    public function buildUser($data){
        $user = new User();
        $user->setId($data['id']);
        $user->setName($data['f_name']);
        $user->setLastName($data['l_name']);
        $user->setEmail($data['email']);
        $user->setPassword($data['password']);
        $user->setBio($data['bio']);
        $user->setToken($data['token']);
        $user->setImage($data['image']);
        return $user;
    }


    public function create(User $user, $authUser = false){
        $stmt = $this->conn->prepare('INSERT INTO users (f_name, l_name, email, password, token)
        VALUES (:name, :lastName, :email, :password, :token)');

        $name = $user->getName();
        $lastName = $user->getLastName();
        $email = $user->getEmail();
        $password = $user->getPassword();
        $token = $user->getToken();

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':lastName', $lastName);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':token', $token);

        $stmt->execute();

        $this->setTokenToSession($user->getToken());

    }


    public function update(User $user, $redirect = true){
        $stmt = $this->conn->prepare('UPDATE users 
        SET f_name = :name, l_name = :lastName, email = :email, password = :password, bio = :bio, token = :token, image = :image WHERE id = :id');

        $id = $user->getId();
        $name = $user->getName();
        $lastName = $user->getLastName();
        $email = $user->getEmail();
        $password = $user->getPassword();
        $image = $user->getImage();
        $bio = $user->getBio();
        $token = $user->getToken();

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':lastName', $lastName);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':bio', $bio);
        $stmt->bindParam(':token', $token);

        $stmt->execute();

        if($redirect){
            //redireciona para editprofile
            $this->message->setMessage('Dados atualizados com sucesso!', 'success', 'edit-profile.php');
        }
    }


    public function verifyToken($protected = false){
        if(!empty($_SESSION['token'])){
            $userData = $this->findByToken($_SESSION['token']);

            if ($userData){
                return $userData;
            }

        } else if ($protected){
            $this->message->setMessage('Autentificação é Obrigatória!', 'error');
        } else{
            return false;
        }
    }


    public function setTokenToSession($token, $redirect = true){
        $_SESSION['token'] = $token;

        if ($redirect){
            $this->message->setMessage('Seja bem-vindo!', 'success');
        }
    }


    public function authenticateUser($email, $password){
        $userData = $this->findByEmail($email);

        if (!$userData or !password_verify($password, $userData->getPassword()) ){
            $this->message->setMessage('Email ou Senha incompatíveis!', 'error', 'auth.php');
            
        } else{
            $token = $userData->generateToken();
            $userData->setToken($token);

            $this->update($userData);

            $this->setTokenToSession($token, true);
        }


    }


    public function findByEmail($email){
        $stmt = $this->conn->prepare('SELECT * FROM users WHERE email = :email');
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0){
            $userData = $this->buildUser($stmt->fetch());
            return $userData;

        } else{
            return false;
        }
    }


    public function findById($id){

    }


    public function findByToken($token){
        $stmt = $this->conn->prepare('SELECT * FROM users WHERE token = :token');
        $stmt->bindParam(':token', $token);
        $stmt->execute();

        if ($stmt->rowCount() > 0){
            $userData = $stmt->fetch();
            $userData = $this->buildUser($userData);

            return $userData; 
        } else{
            return false;
        }
    }


    public function changePassword(User $user){

    }


    public function destroyToken(){
        $_SESSION['token'] = '';

        $this->message->setMessage('LogOut realizado com sucesso!', 'success');
    } 


}

?>