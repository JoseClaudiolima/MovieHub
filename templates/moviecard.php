<?php

if(empty($movie->getImage())){
    $movie->setImage('movie_cover.jpg');
}

$reviewDao = new ReviewDAO($base_url, $conn);

if($reviewDao->getRatings($movie->getId() ) === "Não Avaliado"){
    $ratingMovie = false;
} else{
    $ratingMovie = true;
}
?>

<main id='movie-card'>

    <div id="image-card" style="background-image: url('img/movies/<?=$movie->getImage()?>')"></div>

    <div class="info-card">
        <p id='title-card'><?=$movie->getTitle()?></p>

        <?php if($ratingMovie): ?>
            <p><span class="material-symbols-outlined" id="rating-icon-card">star_rate</span> <?=$reviewDao->getRatings($movie->getId() );?></p>

        <?php else:?>
            <p class='no-rating'><span class="material-symbols-outlined" id="rating-icon-card">star_rate</span> <?=$reviewDao->getRatings($movie->getId() );?></p>
        <?php endif ?>

        <a href="movie.php?id=<?=$movie->getId()?>" class='btn-theme' id='btn-card'>Conhecer</a>
    </div>

</main>