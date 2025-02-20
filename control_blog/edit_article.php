<?php
session_start();
require '../config/db.php';

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

// Actualizează articolul în baza de date
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $summary = $_POST['summary'] ?? '';
    $content = $_POST['content'] ?? '';
    $category = $_POST['category'] ?? '';
    $categories = $_POST['categories'] ?? '';
    $image = $_POST['image'] ?? null; // Opțional

    // Validare simplă
    if (!empty($title) && !empty($summary) && !empty($content)) {
        $stmt = $pdo->prepare("
            UPDATE articles 
            SET 
                title = :title, 
                summary = :summary, 
                content = :content, 
                category = :category, 
                categories = :categories, 
                image = :image 
            WHERE id = :id
        ");
        $stmt->execute([
            ':title' => $title,
            ':summary' => $summary,
            ':content' => $content,
            ':category' => $category,
            ':categories' => $categories,
            ':image' => $image,
            ':id' => $article_id,
        ]);

        header("Location: ../manage_articles.php?success=1");
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
    <title>Editează Articol</title>
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../dist/css/bootstrap.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <div class="content-wrapper">
        <section class="content">
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h4 class="mb-0">Editează Articol</h4>
                            </div>
                            <div class="card-body">
                                <?php if (isset($error)): ?>
                                    <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
                                <?php endif; ?>
                                <form method="POST">
                                    <div class="form-group">
                                        <label for="title">Titlu</label>
                                        <input type="text" name="title" id="title" value="<?= htmlspecialchars($article['title']) ?>" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="summary">Rezumat</label>
                                        <textarea name="summary" id="summary" rows="3" class="form-control" required><?= htmlspecialchars($article['summary']) ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content">Conținut</label>
                                        <textarea name="content" id="content" rows="10" class="form-control" required><?= htmlspecialchars($article['content']) ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="category">Categorie</label>
                                        <input type="text" name="category" id="category" value="<?= htmlspecialchars($article['category']) ?>" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="categories">Categorii Multiple</label>
                                        <input type="text" name="categories" id="categories" value="<?= htmlspecialchars($article['categories']) ?>" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Imagine (URL)</label>
                                        <input type="text" name="image" id="image" value="<?= htmlspecialchars($article['image']) ?>" class="form-control">
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <button type="submit" class="btn btn-primary">Salvează</button>
                                        <a href="../actions/manage_articles.php" class="btn btn-secondary">Anulează</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<script src="../dist/js/jquery.min.js"></script>
<script src="../dist/js/bootstrap.bundle.min.js"></script>
<script src="../dist/js/adminlte.min.js"></script>
</body>
</html>
