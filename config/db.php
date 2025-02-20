<?php
$host = 'localhost';
$dbname = 'wfdjveoc_blog1';
$username = 'wfdjveoc_andreisorin'; // Userul tău MySQL
$password = 'xsdsad43###@#!'; // Parola ta MySQL

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Conexiunea la baza de date a eșuat: " . $e->getMessage());
}
?>
