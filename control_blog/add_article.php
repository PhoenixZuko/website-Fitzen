<?php
session_start();
require '../../config/db.php';

// Verifică autentificarea
if (!isset($_SESSION['admin_id'])) {
    header("Location: ../login.php");
    exit();
}

// Gestionează adăugarea unui articol
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $summary = $_POST['summary'] ?? '';
    $content = $_POST['content'] ?? '';
    $author_id = $_SESSION['admin_id']; // Autorul este utilizatorul conectat
    $category = $_POST['category'] ?? '';
    $categories = $_POST['categories'] ?? '';
    $image = $_POST['image'] ?? null; // Opțional

    // Validare simplă
    if (!empty($title) && !empty($summary) && !empty($content)) {
        $stmt = $pdo->prepare("
            INSERT INTO articles (title, summary, content, author_id, category, categories, image, created_at)
            VALUES (:title, :summary, :content, :author_id, :category, :categories, :image, NOW())
        ");
        $stmt->execute([
            ':title' => $title,
            ':summary' => $summary,
            ':content' => $content,
            ':author_id' => $author_id,
            ':category' => $category,
            ':categories' => $categories,
            ':image' => $image,
        ]);

        header("Location: ../articles.php?success=1");
        exit();
    } else {
        $error = "Toate câmpurile obligatorii trebuie completate!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adaugă Articol</title>
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body>
<div class="container mt-5">
    <h1>Adaugă Articol Nou</h1>
    <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
    <form method="POST">
        <div class="form-group">
            <label for="title">Titlu</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="summary">Rezumat</label>
            <textarea name="summary" id="summary" rows="3" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="content">Conținut</label>
            <textarea name="content" id="content" rows="10" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="category">Categorie</label>
            <input type="text" name="category" id="category" class="form-control">
        </div>
        <div class="form-group">
            <label for="categories">Categorii Multiple</label>
            <input type="text" name="categories" id="categories" class="form-control">
        </div>
        <div class="form-group">
            <label for="image">Imagine (URL)</label>
            <input type="text" name="image" id="image" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Adaugă Articol</button>
        <a href="../articles.php" class="btn btn-secondary">Anulează</a>
    </form>
</div>
</body>
</html>
