<?php
$dsn = 'mysql:host=localhost;dbname=wild-2; charset=utf8';
$user = 'root';
$pass = '';

try {
    $cnx = new PDO($dsn, $user, $pass);
    $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
} catch (PDOException $e) {
    echo 'Erreur !';

}
