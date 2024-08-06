<?php
require_once('config/url.php');
require_once("config/conn.php");

require_once('models/User.php');
require_once('models/Message.php');
require_once('models/Review.php');

require_once('dao/UserDAO.php');
require_once('dao/MovieDAO.php');
require_once('dao/ReviewDAO.php');


$objMessage = new Message($base_url);
$alert = $objMessage->getMessage();

$user = new User();
$userDao = new UserDAO($base_url, $conn);

$userData = $userDao->verifyToken();
if ($userData){
    $userAuth = true;
} else{
    $userAuth = false;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MovieHub</title>
    <!--FAVICON-->
    <link rel="shortcut icon" href="img/favico.svg" type="image/x-icon">    
    <!--MAIN CSS-->
    <link rel="stylesheet" href="css/style.css">
    <!--GOOGLE ICONS-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>

<header>
    <a href="index.php">
        <img src="img/moviehub.ico" alt="Star" id='img-logo'>
    </a>
    <a href="https://github.com/JoseClaudiolima" target='_blank' id="h-title-page">MovieHub</a>
    <form action="search.php" method="get" id="header-search">
        <input type="text" name="movie" id="h-inp-t" placeholder='Buscar filmes'>
        <button type="submit">
            <span id ='h-search-icon' class="material-symbols-outlined">
                manage_search
            </span>
        </button> 
    </form>
    <?php if($userAuth): ?>
        <nav id="h-links">
            <a href="newmovie.php" class='desktop'>Adicionar Filme</a>
            <a href="newmovie.php" class='mobile'><span class="material-symbols-outlined">add</span></a>
            <a href="dashboard.php" class='desktop'>Dashboard</a>
            <a href="dashboard.php" class='mobile'><span class="material-symbols-outlined">movie</span></a>
            
            <a href="edit-profile.php" class='desktop'>Editar Perfil</a>
            <a href="edit-profile.php" class='mobile'><span class="material-symbols-outlined">person</span></a>
            <a href="logout.php" class='desktop logout'>Sair</a>
            <a href="logout.php" class='mobile logout'><span class="material-symbols-outlined">logout</span></a>
        </nav>

    <?php else: ?>
        <nav id="h-login">
            <a href="auth.php" id='' class='log-desktop'>
                Entrar / Cadastrar
            </a>
            <a href="auth.php" id='icon-login' class='log-mobile'><span class="material-symbols-outlined">login</span></a>
        </nav>
    <?php endif ?>

</header>

<div id='full-size'>


<?php if(!empty($alert['msg'])): ?>
    <p id='space-top'></p>
    <div class="message <?=$alert['type']?>">
        <?=$alert['msg']?>
    </div>
<?php endif ?>
<?php $objMessage->clearMessage(); ?>
