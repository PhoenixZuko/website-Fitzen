<?php
session_start();
require '../../config/db.php';

// Verifică autentificarea
if (!isset($_SESSION['admin_id'])) {
    header("Location: ../login.php");
    exit();
}

// Verifică dacă ID-ul articolului este prezent
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("ID-ul articolului lipsește.");
}

$article_id = intval($_GET['id']);

// Preia articolul din baza de date pentru verificare
$stmt = $pdo->prepare("SELECT * FROM articles WHERE id = :article_id");
$stmt->execute([':article_id' => $article_id]);
$article = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$article) {
    die("Articolul nu a fost găsit.");
}

// Gestionează ștergerea articolului
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Șterge articolele asociate din `article_parts`
    $delete_parts_stmt = $pdo->prepare("DELETE FROM article_parts WHERE article_id = :article_id");
    $delete_parts_stmt->execute([':article_id' => $article_id]);

    // Șterge articolul principal din `articles`
    $delete_article_stmt = $pdo->prepare("DELETE FROM articles WHERE id = :article_id");
    $delete_article_stmt->execute([':article_id' => $article_id]);

    // Redirecționează utilizatorul după ștergere
    header("Location: ../articles.php?delete_success=1");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Șterge Articol</title>
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body>
<div class="container mt-5">
    <h1>Șterge Articol</h1>
    <h3>Sigur doriți să ștergeți articolul: <em><?= htmlspecialchars($article['title']) ?></em>?</h3>
    <form method="POST">
        <button type="submit" class="btn btn-danger">Șterge Articolul</button>
        <a href="../articles.php" class="btn btn-secondary">Anulează</a>
    </form>
</div>
</body>
</html>
