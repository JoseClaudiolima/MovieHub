<?php
require_once("templates/header.php");

$user = new User();
$userDao = new UserDAO($base_url, $conn);
$userId = filter_input(INPUT_GET, 'id');
$userData = $userDao->findById($userId);

if (empty($userData->getImage())){
    $userData->setImage('user.png');
}
?>


<main id="user-profile">

<h2><?=$userData->getFullName()?></h2>

<div id="profile-user-image" style="background-image: url('<?=$base_url?>img/users/<?=$userData->getImage()?>')"></div>

<p>Descrição:</p>

<p class="bio-profile">
    <?=$userData->getBio()?>
</p>
</main>

<div class="all-uploaded-movies-user">
    <h3>Filmes que enviou:</h3>

    <div class="user-movie-card">
        
    </div>
</div>



<?php
require_once("templates/footer.php");
?>