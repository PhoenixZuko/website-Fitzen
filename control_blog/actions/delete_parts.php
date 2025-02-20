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

// Preia titlul și conținutul articolului din baza de date
$stmt = $pdo->prepare("SELECT title, content FROM articles WHERE id = :article_id");
$stmt->execute([':article_id' => $article_id]);
$article = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$article) {
    die("Articolul nu a fost găsit.");
}

// Preia toate părțile articolului
$parts_stmt = $pdo->prepare("SELECT * FROM article_parts WHERE article_id = :article_id ORDER BY part_number ASC");
$parts_stmt->execute([':article_id' => $article_id]);
$article_parts = $parts_stmt->fetchAll(PDO::FETCH_ASSOC);

// Gestionează ștergerea unei părți
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['part_id'])) {
    $part_id = intval($_POST['part_id']);

    // Șterge partea din baza de date
    $delete_stmt = $pdo->prepare("DELETE FROM article_parts WHERE id = :part_id");
    $delete_stmt->execute([':part_id' => $part_id]);

    // Reîncarcă pagina pentru a reflecta schimbările
    header("Location: delete_parts.php?id=$article_id");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Șterge Parte</title>
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body>
<div class="container mt-5">
    <h1>Șterge Parte</h1>
    <h3>Articol: <em><?= htmlspecialchars($article['title']) ?></em></h3>
    <p><?= nl2br(htmlspecialchars($article['content'])) ?></p>

    <h3>Părțile Articolului:</h3>
    <?php if (empty($article_parts)): ?>
        <p>Acest articol nu are părți adăugate.</p>
    <?php else: ?>
        <ul>
            <?php foreach ($article_parts as $part): ?>
                <li>
                    <strong>Parte #<?= $part['part_number'] ?>:</strong>
                    <p><?= nl2br(htmlspecialchars($part['content'])) ?></p>
                    <form method="POST" style="display: inline;">
                        <input type="hidden" name="part_id" value="<?= $part['id'] ?>">
                        <button type="submit" class="btn btn-sm btn-danger">Șterge</button>
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <a href="../articles.php" class="btn btn-secondary">Înapoi la Articole</a>
</div>
</body>
</html>
