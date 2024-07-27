<?php
require_once("templates/header.php");

$user = new User();
$userDao = new UserDAO($base_url, $conn);
$userId = filter_input(INPUT_GET, 'id');
$userData = $userDao->findById($userId);

if (empty($userData->getImage())){
    $userData->setImage('user.png');
}

$movie = new Movie();
$movieDao = new MovieDAO($base_url, $conn);

$userMovies = $movieDao->getMoviesByUserId($userId);
?>


<main id="user-profile">

    <div class="user-profile-info">
        <h2><?=$userData->getFullName()?></h2>
        
        <div id="profile-user-image" style="background-image: url('<?=$base_url?>img/users/<?=$userData->getImage()?>')"></div>
        
        <h3>Descrição: </h3>
        
        <p class="bio-profile">
            <?=$userData->getBio()?>
        </p>
    </div>


    <div class="all-uploaded-movies-user">
        <h3>Filmes que enviou:</h3>

        <div >
            <?php if($userMovies): ?>

                <div class="user-movie-card">
                    <?php foreach($userMovies as $movie): ?>
                            <?php require('templates/moviecard.php') ?>
                    <?php endforeach ?>
                </div>

            <?php else: ?>
                <p>Usuário não inseriu filmes até o momento ...</p>
            <?php endif ?>
        </div>
    </div>

</main>



<?php
require_once("templates/footer.php");
?>