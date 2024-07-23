<?php
require_once('config/url.php');
require_once('models/User.php');
require_once('models/Message.php');
require_once('dao/UserDAO.php');


$type = filter_input(INPUT_POST, 'type'); 
$message = new Message($base_url);

if ($type === 'register' or $type === 'login'){
    $message = new Message($base_url);

    $name = filter_input(INPUT_POST, 'name'); 
    $lastName = filter_input(INPUT_POST, 'lastName'); 
    $email = filter_input(INPUT_POST, 'email'); 
    $password = filter_input(INPUT_POST, 'password'); 
    $confPassword = filter_input(INPUT_POST, 'conf-password'); 
    if ($type === 'register'){
        if ((empty($name) and empty($lastName) and empty($email) and empty($password) and empty($confPassword))){

            $message->setMessage('Preencha todos os campos!' , 'error', 'auth.php');
           
        } else{
            if ($password !== $confPassword){
                $message->setMessage('Senhas divergentes, tente novamente!' , 'error', 'back');
            } else{
                $user = new User();
                $user->setName($name);
                $user->setLastName($lastName);
                $user->setEmail($email);

                $generatedPassword = $user->generatePassword($password);
                $user->setPassword($generatedPassword);
                $generatedToken = $user->generateToken();
                $user->setToken($generatedToken);
    
                $userDao = new UserDAO($base_url, $conn);
                $userDao->create($user);
            }
        }
    } else if ($type === 'login'){
        $userDao = new UserDAO($base_url, $conn);
        $userDao->authenticateUser($email, $password);
        
    }
} else{
    
    $message->setMessage('Informações Incompativeis!' , 'error', 'auth.php');
}


?>