<?php
require_once("templates/header.php");


$movieName = filter_input(INPUT_GET, 'movie');

$movieDao = new MovieDAO($base_url, $conn);
$movieData = $movieDao->findByTitle($movieName);

?>

<main id="search">

<div class="result">
        <h2 class="impact">Você está buscando por: <span id="span-result"><?=$movieName?></span>.</h2>
        <p>Foram encontrado(s) <?= ($movieData) ? count($movieData) : 0 ?> filmes(s).</p>
</div>

<?php if($movieData):?>

    <div class="movies-search">
        <?php foreach($movieData as $movie):?>
            <?php require('templates/moviecard.php') ?>
        <?php endforeach ?>
    </div>

<?php else: ?>

    <p id='empty-search'>Não há filmes compativeis com "<span id='span-result'><?=$movieName?></span>".</p>

<?php endif ?>


</main>

<?php
require_once("templates/footer.php");
?>