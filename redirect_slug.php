<?php
// Configurarea detaliilor pentru baza de date
$host = 'localhost'; // Serverul MySQL
$dbname = 'wfdjveoc_blog1'; // Numele bazei de date
$username = 'wfdjveoc_andreisorin'; // Userul MySQL
$password = 'Kiauras256!'; // Parola MySQL

// Conectarea la baza de date
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Conexiunea la baza de date a eșuat: " . $e->getMessage());
}

// Definirea URL-ului de bază al site-ului
define('BASE_URL', '/'); // Dacă site-ul este în rădăcină
// define('BASE_URL', '/subfolder/'); // Dacă site-ul este într-un subdirector
?>
