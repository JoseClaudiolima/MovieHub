<?php
require_once('config/url.php');
require_once("config/conn.php");
require_once('models/Message.php');

$objMessage = new Message($base_url);
$alert = $objMessage->getMessage();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MovieHub</title>
    <!--MAIN CSS-->
    <link rel="stylesheet" href="<?=$base_url?>css/style.css">
    <!--GOOGLE ICONS-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>

<header>
    <a href="<?=$base_url?>index.php">
        <img src="<?=$base_url?>img/moviehub.ico" alt="Star" id='img-logo'>
    </a>
    <a href="https://github.com/JoseClaudiolima" target='_blank' id="h-title-page">MovieHub</a>
    <form action="search.php" method="get" id="header-search">
        <input type="hidden" name="#" value='#'>
        <input type="text" name="movie" id="h-inp-t" placeholder='Buscar filmes...'>
        <a href="<?=$base_url?>search.php?movie=#">
            <span id ='h-search-icon' class="material-symbols-outlined">
                manage_search
            </span>
        </a>
    </form>
    <a href="<?=$base_url?>auth.php" id='h-login'>  
        Entrar / Cadastrar
    </a>

</header>

<div id='full-size'>


<?php if(!empty($alert['msg'])): ?>
    <p id='space-top'></p>
    <div class="message <?=$alert['type']?>">
        <?=$alert['msg']?>
    </div>
<?php endif ?>
<?php $objMessage->clearMessage(); ?>
