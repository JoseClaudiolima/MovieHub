<?php
require_once("templates/header.php");

$reviewId = filter_input(INPUT_POST, 'reviewId');

$message = new Message($base_url);

$user = new User();
$userDao = new UserDao($base_url, $conn);
$userData = $userDao->verifyToken(true);

$review = new Review();
$reviewDao = new ReviewDAO($base_url, $conn);
$reviewData = $reviewDao->findReviewById($reviewId);

if(!$reviewData){
    $message->setMessage('Review de filme não encontrado!', 'error');
}
?>

<main id="main-edit-comment">

    <h2>Editar Comentário</h2>

    <h3><?=$userData->getFullName()?></h3>


    <form action="review_process.php" method="post" id='form-edit-review'>
        <input type="hidden" name="type" value='update'>
        <input type="hidden" name="reviewId" value="<?=$reviewId?>">
        
        <label for="edit-rating" class='label-theme'>Rating: </label>
        <select name="edit-rating" id="edit-rating" class='input-theme'>
            <option value="10" <?= $reviewData->getRating() == 10 ? 'selected' : '' ?> >10</option>
            <option value="9" <?= $reviewData->getRating() == 9 ? 'selected' : '' ?> >9</option>
            <option value="8" <?= $reviewData->getRating() == 8 ? 'selected' : '' ?> >8</option>
            <option value="7" <?= $reviewData->getRating() == 7 ? 'selected' : '' ?> >7</option>
            <option value="6" <?= $reviewData->getRating() == 6 ? 'selected' : '' ?> >6</option>
            <option value="5" <?= $reviewData->getRating() == 5 ? 'selected' : '' ?> >5</option>
            <option value="4" <?= $reviewData->getRating() == 4 ? 'selected' : '' ?> >4</option>
            <option value="3" <?= $reviewData->getRating() == 3 ? 'selected' : '' ?> >3</option>
            <option value="2" <?= $reviewData->getRating() == 2 ? 'selected' : '' ?> >2</option>
            <option value="1" <?= $reviewData->getRating() == 1 ? 'selected' : '' ?> >1</option>
            <option value="0" <?= $reviewData->getRating() == 0 ? 'selected' : '' ?> >0</option>
        </select>

        <label for="edit-comment" class='label-theme'>Comentário: </label>
        <textarea name="edit-comment" id="edit-comment" class='input-theme'><?=$reviewData->getComment()?></textarea>

        <input type="submit" value="Editar Comentário" class='btn-theme'>

    </form>

</main>


<?php
require_once("templates/footer.php");
?>