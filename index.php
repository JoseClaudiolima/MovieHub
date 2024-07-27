<?php
require_once("templates/header.php");


$movieDao = new MovieDAO($base_url, $conn);
$AllMovies = $movieDao->getLatestMovies();
$comedyMovies = $movieDao->getMoviesByCategory('comedy');
$horrorMovies = $movieDao->getMoviesByCategory('horror');


?>

<main id="home">

    <div class="movies-container">
        <div class="title-info-container">
            <h1 class='impact'>Filmes Recentes</h1>
            <p>Veja os comentários dos últimos filmes adicionados no MovieHub.</p>
        </div>
        
        <?php if($AllMovies): ?>
            <div class="index-movie">
                <?php foreach($AllMovies as $movie): ?>
        
        
                        <?php require("templates/moviecard.php"); ?>
        
        
                <?php endforeach ?>
            </div>
        <?php else: ?>
            <div .class='empty-movies'>
                Não há filmes adicionados até o momento...
            </div>
        <?php endif ?>
    </div>


    <div class="movies-container">
        <div class="title-info-container">
            <h2 class='h2-category-title impact'>Comedia</h2>
            <p>Veja os melhores filmes de comedia já adicionados.</p>
        </div>
        <?php if($comedyMovies): ?>

            <div class="index-movie">
                <?php foreach($comedyMovies as $movie): ?>
        
        
                        <?php require("templates/moviecard.php"); ?>
        
        
                <?php endforeach ?>
            </div>
        <?php else: ?>
            <div class='empty-movies'>
                Não há filmes nesta categoria adicionados até o momento...
            </div>
        <?php endif ?>
    </div>


    <div class="movies-container">
        <div class="title-info-container">
            <h2 class='h2-category-title impact'>Terror</h2>
            <p>Veja os melhores filmes de terror já adicionados.</p>
        </div>

        <?php if($horrorMovies): ?>
            <div class="index-movie">
                <?php foreach($horrorMovies as $movie): ?>
        
        
                        <?php require("templates/moviecard.php"); ?>
        
        
                <?php endforeach ?>
            </div>
        <?php else: ?>
            <div class='empty-movies'>
                Não há filmes nesta categoria adicionados até o momento...
            </div>
        <?php endif ?>
    </div>
</main>

<?php
require_once("templates/footer.php");
?>