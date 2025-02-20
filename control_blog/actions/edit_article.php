<?php
session_start();
require '../../config/db.php';

// Verifică autentificarea
if (!isset($_SESSION['admin_id'])) {
    header("Location: ../login.php");
    exit();
}

// Preia articolul din baza de date
if (isset($_GET['id'])) {
    $article_id = intval($_GET['id']);
    $stmt = $pdo->prepare("SELECT * FROM articles WHERE id = :id");
    $stmt->execute([':id' => $article_id]);
    $article = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$article) {
        die("Articolul nu a fost găsit.");
    }
} else {
    die("ID-ul articolului lipsește.");
}

// Preia toate categoriile din baza de date
$categories_stmt = $pdo->query("SELECT id, name FROM categories ORDER BY name ASC");
$categories = $categories_stmt->fetchAll(PDO::FETCH_ASSOC);

// Preia toți autorii din baza de date
$authors_stmt = $pdo->query("SELECT id, username AS name FROM users ORDER BY username ASC");
$authors = $authors_stmt->fetchAll(PDO::FETCH_ASSOC);

// Transformăm categoriile curente ale articolului într-un array
$current_categories = explode(',', $article['categories']); // Coloana `categories` conține ID-uri sau nume separate prin virgulă

// Preia toate părțile suplimentare ale articolului
$parts_stmt = $pdo->prepare("SELECT * FROM article_parts WHERE article_id = :article_id ORDER BY part_number ASC");
$parts_stmt->execute([':article_id' => $article_id]);
$article_parts = $parts_stmt->fetchAll(PDO::FETCH_ASSOC);

// Actualizează articolul și părțile în baza de date
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $summary = $_POST['summary'] ?? '';
    $content = $_POST['content'] ?? '';
    $category_id = $_POST['category_id'] ?? null; // Categoria principală selectată
    $manual_category = $_POST['manual_category'] ?? ''; // Categoria completată manual
    $categories_selected = $_POST['categories'] ?? []; // Categoriile multiple selectate
    $author_id = $_POST['author_id'] ?? null; // Autorul selectat
    $image = $_POST['image'] ?? null; // Opțional

    // Alege categoria care va fi salvată
    $category_to_save = !empty($manual_category) ? $manual_category : $category_id;

    // Creăm un șir cu categoriile selectate (separate prin virgulă)
    $categories_string = implode(',', $categories_selected);

    // Salvare articol principal
    if (!empty($title) && !empty($summary) && !empty($content) && $category_to_save) {
        $stmt = $pdo->prepare("
            UPDATE articles 
            SET 
                title = :title, 
                summary = :summary, 
                content = :content, 
                category = :category, 
                categories = :categories, 
                author_id = :author_id, 
                image = :image 
            WHERE id = :id
        ");
        $stmt->execute([
            ':title' => $title,
            ':summary' => $summary,
            ':content' => $content,
            ':category' => $category_to_save,
            ':categories' => $categories_string,
            ':author_id' => $author_id,
            ':image' => $image,
            ':id' => $article_id,
        ]);
    }

    // Salvare părți suplimentare
    if (!empty($_POST['part_content'])) {
        foreach ($_POST['part_content'] as $part_id => $part_content) {
            $stmt = $pdo->prepare("
                UPDATE article_parts 
                SET content = :content 
                WHERE id = :id
            ");
            $stmt->execute([
                ':content' => $part_content,
                ':id' => $part_id,
            ]);
        }
    }

    header("Location: ../manage_articles.php?success=1");
    exit();
}

// Calculare URL pentru butonul Întoarcere
$backUrl = $_SERVER['HTTP_REFERER'] ?? '../manage_articles.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editează Articol</title>
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <script>
        // Funcție pentru actualizarea numărului de caractere
        function updateCharCount(inputId, counterId) {
            const input = document.getElementById(inputId);
            const counter = document.getElementById(counterId);
            counter.textContent = input.value.length;
        }
    </script>
</head>
<body>
<div class="container mt-5">
    <h1>Editează Articol</h1>
    <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
    <form method="POST">
        <!-- Secțiunea pentru articolul principal -->
        <div class="form-group">
            <label for="title">Titlu</label>
            <input type="text" name="title" id="title" value="<?= htmlspecialchars($article['title']) ?>" class="form-control" required oninput="updateCharCount('title', 'titleCharCount')">
            <small class="form-text text-muted">Caractere: <span id="titleCharCount"><?= strlen($article['title']) ?></span></small>
        </div>
        <div class="form-group">
            <label for="summary">Rezumat</label>
            <textarea name="summary" id="summary" rows="3" class="form-control" required oninput="updateCharCount('summary', 'summaryCharCount')"><?= htmlspecialchars($article['summary']) ?></textarea>
            <small class="form-text text-muted">Caractere: <span id="summaryCharCount"><?= strlen($article['summary']) ?></span></small>
        </div>
        <div class="form-group">
            <label for="content">Conținut</label>
            <textarea name="content" id="content" rows="10" class="form-control" required oninput="updateCharCount('content', 'contentCharCount')"><?= htmlspecialchars($article['content']) ?></textarea>
            <small class="form-text text-muted">Caractere: <span id="contentCharCount"><?= strlen($article['content']) ?></span></small>
        </div>
        <div class="form-group">
            <label for="category_id">Categorie Principală (Actuală: <strong><?= htmlspecialchars($article['category']) ?></strong>)</label>
            <select name="category_id" id="category_id" class="form-control">
                <option value="">-- Selectați o categorie principală --</option>
                <?php foreach ($categories as $cat): ?>
                    <option value="<?= htmlspecialchars($cat['name']) ?>" <?= $cat['name'] == $article['category'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($cat['name']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="manual_category">Categorie Manuală</label>
            <input type="text" name="manual_category" id="manual_category" class="form-control" placeholder="Introduceți manual categoria (opțional)">
        </div>
        <div class="form-group">
            <label for="categories">Categorii Multiple</label>
            <select name="categories[]" id="categories" class="form-control" multiple>
                <?php foreach ($categories as $cat): ?>
                    <option value="<?= htmlspecialchars($cat['name']) ?>" <?= in_array($cat['name'], $current_categories) ? 'selected' : '' ?>>
                        <?= htmlspecialchars($cat['name']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="author_id">Autor</label>
            <select name="author_id" id="author_id" class="form-control">
                <option value="">-- Selectați un autor --</option>
                <?php foreach ($authors as $author): ?>
                    <option value="<?= $author['id'] ?>" <?= $author['id'] == $article['author_id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($author['name']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="image">Imagine (URL)</label>
            <input type="text" name="image" id="image" value="<?= htmlspecialchars($article['image']) ?>" class="form-control">
        </div>

        <!-- Secțiunea pentru părți suplimentare -->
        <h3>Părți Suplimentare</h3>
        <?php foreach ($article_parts as $part): ?>
            <div class="form-group">
                <label for="part_<?= $part['id'] ?>">Parte <?= $part['part_number'] ?></label>
                <textarea name="part_content[<?= $part['id'] ?>]" id="part_<?= $part['id'] ?>" rows="5" class="form-control" oninput="updateCharCount('part_<?= $part['id'] ?>', 'partCharCount_<?= $part['id'] ?>')"><?= htmlspecialchars($part['content']) ?></textarea>
                <small class="form-text text-muted">Caractere: <span id="partCharCount_<?= $part['id'] ?>"><?= strlen($part['content']) ?></span></small>
            </div>
        <?php endforeach; ?>

        <!-- Butoane -->
        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Salvează</button>
            <a href="../manage_articles.php" class="btn btn-secondary">Anulează</a>
            <a href="<?= htmlspecialchars($backUrl) ?>" class="btn btn-light">Întoarcere</a>
        </div>
    </form>
</div>
</body>
</html>