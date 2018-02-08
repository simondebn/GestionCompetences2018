<?php

$host ='54.36.182.179';
$dbname ='groupe_wittgenstein';
$username = 'cdi';
$password = 'cdi2017';
$charset = "utf8";

$db = new PDO("mysql:host=$host;dbname=$dbname;charset=$charset", $username, $password, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
]);