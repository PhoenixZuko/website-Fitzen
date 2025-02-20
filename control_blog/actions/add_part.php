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
    die("ID-ul articolului lipsește. Asigurați-vă că link-ul include parametrul 'id'.");
}

$article_id = intval($_GET['id']);

// Preia titlul articolului din baza de date
$stmt = $pdo->prepare("SELECT title FROM articles WHERE id = :article_id");
$stmt->execute([':article_id' => $article_id]);
$article = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$article) {
    die("Articolul cu ID-ul $article_id nu a fost găsit.");
}

$title = $article['title']; // Titlul articolului

// Preia numărul următor pentru `part_number`
$stmt = $pdo->prepare("SELECT COALESCE(MAX(part_number), 0) + 1 AS next_part_number FROM article_parts WHERE article_id = :article_id");
$stmt->execute([':article_id' => $article_id]);
$next_part_number = $stmt->fetchColumn();

// Gestionează adăugarea unei părți
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $content = $_POST['content'] ?? '';

    // Verifică dacă conținutul nu este gol
    if (!empty($content)) {
        $stmt = $pdo->prepare("
            INSERT INTO article_parts (article_id, part_number, content)
            VALUES (:article_id, :part_number, :content)
        ");
        $stmt->execute([
            ':article_id' => $article_id,
            ':part_number' => $next_part_number,
            ':content' => $content,
        ]);

        // Redirecționează la pagina articolelor cu un mesaj de succes
        header("Location: ../articles.php?success=1");
        exit();
    } else {
        $error = "Conținutul nu poate fi gol.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adaugă Parte</title>
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <script>
        // Funcție pentru actualizarea numărului de caractere
        function updateCharCount() {
            const content = document.getElementById('content').value;
            const charCount = content.length;
            document.getElementById('charCount').textContent = charCount;
        }
    </script>
</head>
<body>
<div class="container mt-5">
    <h1>Adaugă Parte pentru Articolul #<?= htmlspecialchars($article_id) ?>: <em><?= htmlspecialchars($title) ?></em></h1>
    <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
    <form method="POST">
        <div class="form-group">
            <label for="content">Conținutul Părții</label>
            <textarea name="content" id="content" rows="5" class="form-control" required oninput="updateCharCount()"></textarea>
            <small class="form-text text-muted">Caractere: <span id="charCount">0</span></small>
        </div>
        <button type="submit" class="btn btn-primary">Adaugă Parte</button>
        <a href="../articles.php" class="btn btn-secondary">Anulează</a>
    </form>
</div>
</body>
</html>
