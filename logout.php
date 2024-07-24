<?php
require_once('dao/UserDAO.php');

$userDao = new UserDAO($base_url, $conn);
$userDao->destroyToken();
?>