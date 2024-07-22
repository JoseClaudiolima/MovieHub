<?php
require_once("templates/header.php");
?>

<main id='auth-main'>
    <div class="login">
        <h2>Entrar</h2>
    
        <form action="<?=$base_url?>auth_process.php" method="post">
            <label for="log-email" class='label-theme'>Email:</label>
            <input type="email" name="log-email" id="log-email" class='input-theme' placeholder='Digite seu email' required>
    
            <label for="log-password" class='label-theme'>Senha: </label>
            <input type="password" name="log-password" id="log-password" class='input-theme' placeholder='Digite sua senha' required>
    
            <input type="submit" value="Entrar" class='btn-theme'>
        </form>
    </div>
    
    
    <div class="register">
        <h2>Criar Conta</h2>
    
        <form action="<?=$base_url?>auth_process.php" method="post">
            <label for="reg-Firstname" class='label-theme'>Nome: </label>
            <input type="text" name="reg-Firstname" id="reg-Firstname" class='input-theme' placeholder='Digite seu nome' required>
    
            <label for="reg-lastName" class='label-theme'>Sobrenome: </label>
            <input type="text" name="reg-lastName" id="reg-lastName" class='input-theme' placeholder='Digite seu sobrenome' required>
    
            <label for="reg-email" class='label-theme'>Email:</label>
            <input type="email" name="reg-email" id="reg-email" class='input-theme' placeholder='Digite seu email' required>
    
            <label for="reg-password" class='label-theme'>Senha: </label>
            <input type="password" name="reg-password" id="reg-password" class='input-theme' placeholder='Digite sua senha' required>
    
            <label for="conf-reg-password" class='label-theme'>Confirme sua Senha: </label>
            <input type="password" name="conf-reg-password" id="conf-reg-password" class='input-theme' placeholder='Confirme sua senha' required>
    
            <input type="submit" value="Registrar" class='btn-theme'>
        </form>
    </div>
</main>



<?php
require_once("templates/footer.php");
?>