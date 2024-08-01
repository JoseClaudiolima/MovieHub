<?php
$host = 'viaduct.proxy.rlwy.net';
$dbname = 'moviehub'; 
$user = 'root';
$pass = 'wBaVxNkAfatEKFfDyBPWFJLtHNbDEKek';
$port = '34940';

$conn = new PDO("mysql:host={$host};port={$port};dbname={$dbname}", $user, $pass);

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

session_start(); //inicia sessão
?>