<?php
require_once("templates/header.php");

$user = new User();
$userDao = new UserDAO($base_url, $conn);
$userData = $userDao->verifyToken(true);

if (empty($userData->getImage())){
    $userData->setImage('user.png');
}


?>


<main id="edit-profile">

    <div class="all-user-info-editProfile">
        <div class="user-info-editProfile">
            <a href="profile.php?id=<?=$userData->getId()?>" id='public-profile-link'>
                <h2><?=$userData->getFullName();?></h2>
            </a>
            <p>Altere seus dados no formulário abaixo: </p>
        
            <form action="edit-profile_process.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="type" value="update">
                <label for="name" class='label-theme'>Nome: </label>

                <input type="text" name="name" id="name" placeholder='Digite seu nome' class='input-theme'value="<?=$userData->getName()?>">
                <label for="lastName" class='label-theme'>Sobrenome: </label>

                <input type="text" name="lastName" id="lastName" placeholder='Digite seu sobrenome' class='input-theme'value="<?=$userData->getLastName()?>">
                <label for="login-email" class='label-theme'>Email: </label>

                <input type="email" name="login-email" id="login-email" placeholder='Digite seu email' class='input-theme' readonly value="<?=$userData->getEmail()?>">
                <input type="submit" value="Alterar" class='btn-theme'>
        </div>
        
        <div class="user-image-info">
            <div id="userImage-edit-profile" style="background-image: url('img/users/<?=$userData->getImage()?>')">
            </div>

            <label for="image" class='label-theme'>Selecione sua foto abaixo: </label>
            <div class="file">
                <label for="image" id='label-file'>Choose File</label>    
                <p id='file-name'>Nome arquivo</p>
            </div>    
            <input type="file" name="image" id="image" onchange='updateFileName()' style='display: none;'>

            <label for="bio" class='label-theme'>Sobre você: </label>
            <textarea name="bio" id="bio" placeholder='Diga mais sobre você...' class='input-theme'><?=$userData->getBio()?></textarea>
        </div>
        </form>
    </div>
    
        <div id="change-password">
            <h2>Altere a senha: </h2>
            <p>Digite a nova senha e confirme</p>
    
            <form action="edit-profile_process.php" method="post">
                <input type="hidden" name="type" value='changePassword'>

                <label for="password" class='label-theme'>Senha: </label>
                <input type="password" name="password" id="password" placeholder='Digite sua nova senha' class='input-theme'>

                <label for="conf-password" class='label-theme'>Confirmação de senha: </label>
                <input type="password" name="conf-password" id="conf-password" placeholder='Confirme sua senha' class='input-theme'>
                
                <input type="submit" value="Alterar Senha" class='btn-theme'>
            </form>
        </div>

</main>

<script>
    function updateFileName(){
        const input = document.getElementById('image');
        const pText = document.getElementById('file-name');

        const fileName = input.files.length > 0 ? input.files[0].name : 'Choose File';

        pText.textContent = fileName;
        pText.style.display ='inline-block';
    }
</script>



<?php
require_once("templates/footer.php");
?>