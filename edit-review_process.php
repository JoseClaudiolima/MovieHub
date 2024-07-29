<?php
require_once('config/url.php');
require_once("config/conn.php");

require_once('models/User.php');
require_once('models/Message.php');
require_once('models/Review.php');

require_once('dao/UserDAO.php');
require_once('dao/ReviewDAO.php');



$message = new Message($base_url);

$user = new User();
$userDao = new UserDao($base_url, $conn);
$userData = $userDao->verifyToken(true);

$review = new Review();
$reviewDao = new ReviewDAO($base_url, $conn);

$type = filter_input(INPUT_POST, 'type');


if($type === 'update'){
    $editRating = filter_input(INPUT_POST, 'edit-rating');
    $editComment = filter_input(INPUT_POST, 'edit-comment');
    $reviewId = filter_input(INPUT_POST, 'reviewId');

    $review = $reviewDao->findReviewById($reviewId);
    $review->setRating($editRating);
    $review->setComment($editComment);

    $reviewDao->update($review);
    //parei aq
}


?>