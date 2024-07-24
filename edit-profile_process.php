<?php
require_once('config/url.php');
require_once("config/conn.php");
require_once('models/Message.php');

require_once('models/User.php');
require_once('models/Message.php');
require_once('dao/UserDAO.php');

$user = new User();
$userDao = new UserDAO($base_url, $conn);
$userData = $userDao->verifyToken(true);

$type = filter_input(INPUT_POST, 'type');
$message = new Message($base_url);

if  ($type === 'update'){
    $name = filter_input(INPUT_POST, 'name');
    $lastName = filter_input(INPUT_POST, 'lastName');
    $bio = filter_input(INPUT_POST, 'bio');


    if (isset($_FILES['image']) && !empty($_FILES['image']['tmp_name'])){
        $image = $_FILES['image'];
        $jpgArray = ['image/jpg', 'image/jpeg'];
        $imageTypes = array_merge($jpgArray, ['image/png']);

        if (in_array($image['type'], $imageTypes) ) {
            if(in_array($image['type'], $jpgArray)){
                $format = '.jpeg';
                $imageFile = imagecreatefromjpeg($image['tmp_name']);
            }else{
                $format = '.png';
                $imageFile = imagecreatefrompng($image['tmp_name']);
            }

        $imageName = $userData->generateImageName($format);
        imagejpeg($imageFile, './img/users/' . $imageName, 100);
        $userData->setImage($imageName);
        
        }else{
            $message->setMessage('Tipo de imagem incompativel!', 'error', 'back');
        }
    }

    $userData->setName($name);
    $userData->setLastName($lastName);
    $userData->setBio($bio);

    $userDao->update($userData);
} else if($type === 'changePassword'){
    $password = filter_input(INPUT_POST, 'password');
    $confPassword = filter_input(INPUT_POST, 'conf-password');

    if ($password !== $confPassword){
        $message->setMessage('Diferentes Senhas Inseridas!', 'error', 'back');
    } else{
        $userData->setPassword( $userData->generatePassword($password) );
        $userDao->update($userData, false);
        $message->setMessage('Senhas alteradas com sucesso!', 'success', 'edit-profile.php');
    }
}
?>