<?php
require_once('dao/UserDAO.php');
require_once('config/url.php');

$userDao = new UserDAO($base_url, $conn);
$userDao->destroyToken();
?>