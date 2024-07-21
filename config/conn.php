<?php
$host = 'localhost';
$dbname = 'moviehub'; 
$user = 'root';
$pass = '';

$conn = NEW PDO("mysql:host={$host};dbname={$dbname}", $user, $pass);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

session_start();
?>