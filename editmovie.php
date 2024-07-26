<?php
require_once("templates/header.php");

$movie = new Movie();
$movieDao = new MovieDAO($conn, $base_url);

$user = new User();
$userDao = new UserDAO($base_url, $conn);
$userData = $userDao->verifyToken(true);

$movieId = filter_input(INPUT_GET, 'id');

$movieData = $movieDao->findById($movieId);

if (!$movieData){
    $message->setMessage('Filme não existente!', 'error', 'index.php');
}
?>

<main id="new-movie-main">

    <h2 id='title-new-movie'>Edite o Filme</h2>
    <p>Adicione sua critica e compartilhe com o mundo!</p>

    <form action="movie_process.php" method="post" id='new-movie-form' enctype="multipart/form-data">
        <input type="hidden" name="type" value='update'>
        <input type="hidden" name="movieId" value='<?=$movieId?>'>
        <label for="title" class='label-theme'>Titulo:</label>
        <input type="text" name="title" id="tile" placeholder='Digite o nome do filme' class='input-theme' value="<?=$movieData->getTitle()?>" >

        <label for="banner" class='label-theme'>Banner do filme:</label> 
        <div class="file">
            <label for="banner" id='label-file'>Choose File</label>    
            <p id='file-name'>Nome arquivo</p>
        </div>    
        <input type="file" name="banner" id="banner" onchange='updateFileName()'>

        <label for="length" class='label-theme'>Duração: </label>
        <input type="text" name="length" id="length" placeholder="Digite a duração do filme" class='input-theme' value="<?=$movieData->getLength()?>" >

        <label for="category" class='label-theme'>Categoria:</label>
        <select name="category" id="category" class='input-theme'>
            <option value="sci-fi" class='input-theme' <?=$movieData->getCategory() === 'sci-fi' ? 'selected' : '' ?> >Sci-Fi</option>
            <option value="comedy" class='input-theme' <?=$movieData->getCategory() === 'comedy' ? 'selected' : '' ?> >Comedia</option>
            <option value="horror" class='input-theme' <?=$movieData->getCategory() === 'horror' ? 'selected' : '' ?> >Terror</option>
        </select>

        <label for="trailer" class='label-theme'>Trailer:</label>
        <input type="text" name="trailer" id="trailer" placeholder='Insira o link "embedd" do trailer' class='input-theme' value="<?=$movieData->getTrailer()?>" >

        <label for="description" class='label-theme'>Sinopse do Filme:</label>
        <textarea name="description" id="description" placeholder='Descreva o filme...' class='input-theme'><?=$movieData->getDescription()?></textarea>

        <input type="submit" value="Adicionar Filme" class='btn-theme'>
    </form>

</main>

<script>
    function updateFileName(){
        const input = document.getElementById('banner');
        const pText = document.getElementById('file-name');

        const fileName = input.files.length > 0 ? input.files[0].name : 'Choose File';

        pText.textContent = fileName;
        pText.style.display ='inline-block';
    }
</script>

<?php
require_once("templates/footer.php");
?>