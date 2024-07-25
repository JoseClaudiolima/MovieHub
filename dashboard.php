<?php
require_once("templates/header.php");

$userDao = new UserDAO($base_url, $conn);
$userData = $userDao->verifyToken(true);

?>





<?php
require_once("templates/footer.php");
?>