<?php
require_once("templates/header.php");

$userDao = new UserDAO($base_url, $conn);
$userData = $userDao->verifyToken(true);

$movieDao = new MovieDAO($base_url, $conn);
$movieData = $movieDao->getMoviesByUserId($userData->getId());
?>

<main id='m-dashboard'>
    <h2 id='dashboard-title'>Dashboard</h2>
    <p>Atualize as informações dos filmes que vc enviou.</p>
    
    <div class="right-dashboard">
        <a href="<?=$base_url?>newmovie.php" class='btn-theme' id='add-movie-dashboard'>
            Adicionar filme
        </a>
    </div>

    <table id='table-dashboard'>
        <thead>
            <tr>
                <th id="num-table">#</th>
                <th id="title-table">Titulo</th>
                <th id="rating-table">Notas</th>
                <th id="action-table">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($movieData as $movie):?>
                <?php
                ?>
                <tr class='dashboard-row'>
                    <td class='td-dashboard center'><?=array_search($movie, $movieData) +1?></td>
                    <td class='td-dashboard'><?=$movie->getTitle();?></td>
                    <td class='td-dashboard center'>10</td>
                    <td class='td-dashboard center'>
                        <a href="<?=$base_url?>editmovie.php?id=<?=$movie->getId()?>">
                            <span class="material-symbols-outlined" id='edit-movie'>edit_square</span>
                        </a>
                        <form action="<?=$base_url?>movie_process.php" method='post' id='del-form-dashboard'>
                            <input type="hidden" name="type" value='delete'>
                            <input type="hidden" name="movieId" value='<?=$movie->getId();?>'>
                            <button type="submit" id='del-btn-dashboard'>
                                <span class="material-symbols-outlined" id='del-movie'>delete</span>
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</main>


<?php
require_once("templates/footer.php");
?>