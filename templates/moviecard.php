<?php

if(empty($movie->getImage())){
    $movie->setImage('movie_cover.jpg');
}

?>

<main id='movie-card'>

    <div id="image-card" style="background-image: url('<?=$base_url?>img/movies/<?=$movie->getImage()?>')"></div>

    <div class="info-card">
        <p><span class="material-symbols-outlined" id="rating-icon-card">star_rate</span> 10</p>
        <p id='title-card'><?=$movie->getTitle()?></p>
        <a href="<?=$base_url?>movie.php?id=<?=$movie->getId()?>" class='btn-theme' id='btn-card'>Conhecer</a>
    </div>

</main>