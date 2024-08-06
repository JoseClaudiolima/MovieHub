<?php
$host = 'viaduct.proxy.rlwy.net';
$dbname = 'moviehub'; 
$user = 'root';
$pass = 'sYXGbbXxzlWlvpJDdPYZdiCLGfNVvmSw';
$port = '40420';

$conn = new PDO("mysql:host={$host};port={$port};dbname={$dbname}", $user, $pass);

session_start(); //inicia sessão
?>