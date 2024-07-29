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

$user = new User();
$userDao = new UserDAO($base_url, $conn);
$userData = $userDao->verifyToken(true);

$movie = new Movie();
$movieDao = new MovieDAO($base_url, $conn);

$review = new Review();
$reviewDao = new ReviewDAO($base_url, $conn);

if ($type === 'create'){
    $movieId = filter_input(INPUT_POST, 'movieId');
    $userId = $userData->getId();
    $rating = filter_input(INPUT_POST, 'rating');
    $comment = filter_input(INPUT_POST, 'comment');

    $review->setMovieId($movieId);
    $review->setUserId($userId);
    $review->setRating($rating);
    $review->setComment($comment);

    $reviewDao->create($review);

} else if($type === 'update'){
    $editRating = filter_input(INPUT_POST, 'edit-rating');
    $editComment = filter_input(INPUT_POST, 'edit-comment');
    $reviewId = filter_input(INPUT_POST, 'reviewId');

    $securityTest = $reviewDao->verifyUserIdInput($userData, $reviewId);

    if($securityTest){
        $review = $reviewDao->findReviewById($reviewId);
        $review->setRating($editRating);
        $review->setComment($editComment);
    
        $reviewDao->update($review);
    } else{
        $message->setMessage('Informações "Incompatíveis"', 'error');
    }



} else if ($type === 'delete'){
    $reviewId = filter_input(INPUT_POST, 'reviewId');
    $reviewData = $reviewDao->findReviewById($reviewId);

    $securityTest = $reviewDao->verifyUserIdInput($userData, $reviewId);
    
    if($securityTest){
        $reviewDao->destroy($reviewData);
    } else{
        $message->setMessage('Informações "Incompatíveis"', 'error');
    }


} else{
    $message->setMessage('Informações Inválidas!', 'error');
}

?>