<?php
require_once("templates/header.php");

$userDao = new UserDAO($base_url, $conn);
$userData = $userDao->verifyToken(true);
?>


<main id="new-movie-main">

    <h2 id='title-new-movie'>Adicionar Filme</h2>
    <p>Adicione sua critica e compartilhe com o mundo!</p>

    <form action="movie_process.php" method="post" id='new-movie-form' enctype="multipart/form-data">
        <input type="hidden" name="type" value='create'>
        <label for="title" class='label-theme'>Titulo:</label>
        <input type="text" name="title" id="tile" placeholder='Digite o nome do filme' class='input-theme'>

        <label for="banner" class='label-theme'>Banner do filme:</label> 
        <div class="file">
            <label for="banner" id='label-file'>Choose File</label>    
            <p id='file-name'>Nome arquivo</p>
        </div>    
        <input type="file" name="banner" id="banner" onchange='updateFileName()'>

        <label for="length" class='label-theme'>Duração: </label>
        <input type="text" name="length" id="length" placeholder="Digite a duração do filme" class='input-theme'>

        <label for="category" class='label-theme'>Categoria:</label>
        <select name="category" id="category" class='input-theme'>
            <option value="sci-fi" class='input-theme'>Sci-Fi</option>
            <option value="comedy" class='input-theme'>Comedia</option>
            <option value="horror" class='input-theme'>Terror</option>
        </select>

        <label for="trailer" class='label-theme'>Trailer:</label>
        <input type="text" name="trailer" id="trailer" placeholder='Insira o link "embedd" do trailer' class='input-theme'>

        <label for="description" class='label-theme'>Sinopse do Filme:</label>
        <textarea name="description" id="description" placeholder='Descreva o filme...' class='input-theme'></textarea>

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