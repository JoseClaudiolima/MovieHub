<?php
require_once('config/url.php');
require_once("config/conn.php");

require_once('models/User.php');
require_once('models/Message.php');
require_once('models/Movie.php');

require_once('dao/MovieDAO.php');
require_once('dao/UserDAO.php');

$type = filter_input(INPUT_POST, 'type');
$message = new Message($base_url);

$userDao = new UserDAO($base_url, $conn);
$userData = $userDao->verifyToken(true);

$movie = new Movie();
$movieDao = new MovieDAO($base_url, $conn);


if ($type === 'create' or $type === 'update'){

    $title = filter_input(INPUT_POST, 'title');
    $length = filter_input(INPUT_POST, 'length');
    $category = filter_input(INPUT_POST, 'category');
    $trailer = filter_input(INPUT_POST, 'trailer');
    $description = filter_input(INPUT_POST, 'description');

    if(!empty($title) and !empty($length) and !empty($category) and !empty($trailer) and !empty($description)){
        $user_id = $userData->getId();

        $movie->setTitle($title);
        $movie->setLength($length);
        $movie->setCategory($category);
        $movie->setTrailer($trailer);
        $movie->setDescription($description);
        $movie->setUserId($user_id);
        
        if(!empty($_FILES['banner']) and !empty($_FILES['banner']['tmp_name'])){
            $image = $_FILES['banner'];
            $jpgArray = ['image/jpg', 'image/jpeg'];
            $imageTypes = array_merge($jpgArray, ['image/png']);

            if(in_array($image['type'], $imageTypes) ){
                if(in_array($image['type'], $jpgArray) ){
                    $format = '.jpeg';
                    $imageFile = imagecreatefromjpeg($image['tmp_name']);
                } else{
                    $format = '.png';
                    $imageFile = imagecreatefrompng($image['tmp_name']);
                }

                $imageName = $movie->generateImageName($format);
                imagejpeg($imageFile, './img/movies/' . $imageName, 100);
                
                $movie->setImage($imageName);

            } else{
                $message->setMessage('Tipo de imagem incompativel!', 'error', 'back');
            }
        }

        if($type === 'create'){
            $movieDao->create($movie);
        } else if ($type === 'update'){
            $movieId = filter_input(INPUT_POST, 'movieId');
            $securityTest = $movieDao->verifyUserIdInput($userData, $movieId);

            if($securityTest){
                $movie->setId($movieId);
                $movieDao->update($movie);
            }else{
                $message->setMessage('Informações "Incompatíveis"', 'error');
            }
        }

    } else{
        $message->setMessage('Preencha todos com campos, apenas banner é opcional!', 'error', 'back');
    }

} else if($type === 'delete'){
    $movieId = filter_input(INPUT_POST, 'movieId');
    $securityTest = $movieDao->verifyUserIdInput($userData, $reviewId);
    if($securityTest){
        $movieDao->destroy($movieId);
    }else{
        $message->setMessage('Informações "Incompatíveis"', 'error');
    }

} else{
    $message->setMessage('Informações Inválidas', 'error');
}
?>
