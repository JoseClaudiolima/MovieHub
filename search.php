<?php
require_once("templates/header.php");


$movieName = filter_input(INPUT_GET, 'movie');

$movieDao = new MovieDAO($base_url, $conn);
$movieData = $movieDao->findByTitle($movieName);

if(!$movieData or count($movieData) == 1){
    $iniText = 'Foi encontrado ';
    $finText = ' filme';
} else{
    $iniText = 'Foram encontrados ';
    $finText = ' filmes';
}

?>

<main id="search">

<div class="result">
        <h2 class="impact">Você está buscando por: <span id="span-result"><?=$movieName?></span>.</h2>
        <p><?=$iniText?><?= ($movieData) ? count($movieData) : 'nenhum' ?><?=$finText?>.</p>
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