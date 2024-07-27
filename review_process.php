<?php
require_once('config/url.php');
require_once("config/conn.php");

require_once('models/User.php');
require_once('models/Message.php');
require_once('models/Movie.php');
require_once('models/Review.php');

require_once('dao/MovieDAO.php');
require_once('dao/UserDAO.php');
require_once('dao/ReviewDAO.php');

$type = filter_input(INPUT_POST, 'type');
$message = new Message($base_url);

$userDao = new UserDAO($base_url, $conn);
$userData = $userDao->verifyToken(true); //posso verificar o token do user id, com o do db

$movie = new Movie();
$movieDao = new MovieDAO($base_url, $conn);

$review = new Review();
$reviewDao = new ReviewDAO($base_url, $conn);

if ($type === 'create' or $type === 'update'){
    $movieId = filter_input(INPUT_POST, 'movieId');
    $userId = $userData->getId();
    $rating = filter_input(INPUT_POST, 'rating');
    $comment = filter_input(INPUT_POST, 'comment');

    $review->setMovieId($movieId);
    $review->setUserId($userId);
    $review->setRating($rating);
    $review->setComment($comment);
    
    // falta verificar se movie e user existe, e continuar nos caralgo

    $reviewDao->create($review);



} else{
    $message->setMessage('Informações Inválidas!', 'error');
}
?>