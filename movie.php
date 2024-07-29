<?php
require_once("templates/header.php");

$movieId = filter_input(INPUT_GET, 'id');

$movieDao = new MovieDAO($base_url, $conn);
$movieData = $movieDao->findById($movieId);

$message = new Message($base_url);
if (!$movieData){
    $message->setMessage('Filme não encontrado!', 'error');
}

$user = new User();
$userDao = new UserDao($base_url, $conn);
$userData = $userDao->verifyToken(false);

$review = new Review();
$reviewDao = new ReviewDAO($base_url, $conn);

if($userData){
    $auth = true;
    $commentedId = $reviewDao->hasAlreadyReviewed($movieId , $userData->getId());

} else{
    $auth = false;
}

if($reviewDao->getRatings($movieData->getId() ) === "Não Avaliado"){
    $ratingMovie = false;
} else{
    $ratingMovie = true;
}

?>

<main id="all-movie-info">

    <div class="firstly-movie-info">
        <h1 id='h1-movie-details'><?=$movieData->getTitle();?></h1>
        <p id='short-info'>Duração: <?=$movieData->getLength();?>
            <span id="category-movie"><?=ucfirst($movieData->getCategory());?></span>

            <?php if($ratingMovie): ?>
            <span class="material-symbols-outlined" id="rating-icon-card">star_rate</span>
             <?=$reviewDao->getRatings($movieData->getId() );?>

            <?php else: ?>
            <span class="material-symbols-outlined" id="rating-icon-card">star_rate</span>
            <span class="no-rating"><?=$reviewDao->getRatings($movieData->getId() );?></span>

            <?php endif ?>
        </p>
    </div>

    <div class="visual-info">
        <iframe src="<?=$movieData->getTrailer();?>" frameborder="0" id='movie-trailer'></iframe>
        <div id="movie-banner" style="background-image: url('<?=$base_url?>img/movies/<?=$movieData->getImage();?>')"></div>
    </div>

    <div class="description">
        <?=$movieData->getDescription();?>
    </div>
    <div class="description-bottom"></div>

</main>

<?php if($auth and !$commentedId): ?>
    <div class="do-review">
        <h3>Envia sua avaliação</h3>
        <p>Preencha o formulário com a nota e o comentário sobre o filme</p>

        <form action="review_process.php" method="post" id='review-form'>
            <input type="hidden" name="type" value='create'>
            <input type="hidden" name="movieId" value='<?=$movieData->getId();?>'>

            <label for="rating" class='label-theme'>Nota do filme: </label>
            <select name="rating" id="rating" class='input-theme'>
                <option value="-1">Selecione</option>
                <option value="10">10</option>
                <option value="9">9</option>
                <option value="8">8</option>
                <option value="7">7</option>
                <option value="6">6</option>
                <option value="5">5</option>
                <option value="4">4</option>
                <option value="3">3</option>
                <option value="2">2</option>
                <option value="1">1</option>
                <option value="0">0</option>
            </select>

            <label for="comment" class='label-theme'>Comentários sobre o filme: </label>
            <textarea name="comment" id="comment" placeholder='Seu comentário...'></textarea>

            <input type="submit" value="Enviar sua Avaliação" class='btn-theme'>
        </form>
    </div>
<?php endif ?>


<div class="all-reviews">
    <h2 id='title-review'>Avaliações</h2>
    <?php
        $reviewData = $reviewDao->getMoviesReview($movieId);
    ?>

    <?php  if($reviewData):?>

        <?php foreach($reviewData as $review): ?>

            <?php
                $userReview = new User();
                $userReviewDao = new UserDAO($base_url, $conn);

                $userData = $userReviewDao->findById($review->getUserId()); 

                $userImage = empty($userData->getImage() ) ? 'user.png' : $userData->getImage();
                $userName = $userData->getFullName();    
                $userRating = $review->getRating(); 
                $userComment = $review->getComment();
                $reviewCreateDate = $review->getCreateDate();
                $reviewCreateTime = $review->getCreateTime();
                $reviewUpdateDate = $review->getUpdateDate();
                $reviewUpdateTime = $review->getUpdateTime();

                $reviewId = $review->getId();
                if ($reviewId === $commentedId){
                    $theReviewFromUser = true;
                } else{
                    $theReviewFromUser = false;
                }
            ?>

            <div class="user-review-details">
                <div class="review-user-firstly-info">
                    <div id="user-image-review" style="background-image: url('<?=$base_url?>img/users/<?=$userImage?>')"></div>

                    <div class="review-name-rating">
                        <h4><a href="<?=$base_url?>profile.php?id=<?=$userData->getId()?>" id='review-name'><?=$userName?></a></h4>
                        <p id="review-rating"><span class="material-symbols-outlined" id="rating-icon-card">star_rate</span> <?=$userRating?></p>
                    </div>

                    <div class="review-date">

                        <?php if( $reviewCreateDate == $reviewUpdateDate and $reviewCreateTime == $reviewUpdateTime ):?>
                            <p>Data: <?=$reviewCreateDate?></p>
                        <?php else: ?>
                            <p>Editado: <?=$reviewUpdateDate?></p>
                        <?php endif ?>

                        <?php if($theReviewFromUser): ?>
                            <form action="editcomment.php" method="post" id='edit-review'>
                                <input type="hidden" name="reviewId" value='<?=$review->getId()?>'>
                                <input type="hidden" name="type" value="edit">

                                <input type="submit" value="Editar">
                            </form>
                        <?php endif ?>
                    </div>
                </div>

                <div class="review-info">
                    <p id="review-comment-title">Comentário: </p>
                    <p id="review-comment"><?=$userComment?></p>
                </div>
            </div>

        <?php endforeach ?>

    <?php else: ?>
        <p id='empty-review'>Não há comentários ainda para este filme!</p>
    <?php endif ?>
</div>
<?php
require_once("templates/footer.php");
?>