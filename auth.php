<?php
require_once("templates/header.php");
?>

<main id='auth-main'>
    <div class="login">
        <h2>Entrar</h2>
    
        <form action="auth_process.php" method="post">
            <input type="hidden" name="type" value="login">
            <label for="email" class='label-theme'>Email:</label>
            <input type="email" name="email" id="email" class='input-theme' placeholder='Digite seu email' >
    
            <label for="password" class='label-theme'>Senha: </label>
            <input type="password" name="password" id="password" class='input-theme' placeholder='Digite sua senha' >
    
            <input type="submit" value="Entrar" class='btn-theme'>
        </form>
    </div>
    
    
    <div class="register">
        <h2>Criar Conta</h2>
    
        <form action="auth_process.php" method="post">
            <input type="hidden" name="type" value="register">
            <label for="name" class='label-theme'>Nome: </label>
            <input type="text" name="name" id="name" class='input-theme' placeholder='Digite seu nome' >
    
            <label for="lastName" class='label-theme'>Sobrenome: </label>
            <input type="text" name="lastName" id="reg-lastName" class='input-theme' placeholder='Digite seu sobrenome' >
    
            <label for="email" class='label-theme'>Email:</label>
            <input type="email" name="email" id="email" class='input-theme' placeholder='Digite seu email' >
    
            <label for="password" class='label-theme'>Senha: </label>
            <input type="password" name="password" id="password" class='input-theme' placeholder='Digite sua senha' >
    
            <label for="conf-password" class='label-theme'>Confirme sua Senha: </label>
            <input type="password" name="conf-password" id="conf-reg-password" class='input-theme' placeholder='Confirme sua senha' >
    
            <input type="submit" value="Registrar" class='btn-theme'>
        </form>
    </div>
</main>



<?php
require_once("templates/footer.php");
?>