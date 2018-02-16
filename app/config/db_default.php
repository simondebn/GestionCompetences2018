<?php

// In order to use this file you need to rename it "db.php"
// Pour utiliser ce fichier vous devez le renommer "db.php"

$host ='';
$dbname ='';
$username = '';
$password = '';
$charset = "utf8";


$db = new PDO("mysql:host=$host;dbname=$dbname;charset=$charset", $username, $password, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
]);
