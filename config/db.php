<?php
$host = 'localhost';
$dbname = 'requetesql';
$username = 'adminBibli';
$password = 'pass1234';
try{
  $pdo = new PDO(
    "mysql:host=$host;dbname=$dbname;charset=utf8",
    $username,
    $password,
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
  );
} catch(PDOExeption $e) {
  die("Erreur de connexion : ".$e->getMessage());
};
?>