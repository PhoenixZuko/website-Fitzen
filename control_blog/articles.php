<?php
session_start();
require '../config/db.php';

// Verifică autentificarea
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

// Obține articolele din baza de date cu informațiile suplimentare
$articles = $pdo->query("
    SELECT 
        a.id,
        a.title,
        a.views,
        u.username AS author_name,
        (SELECT COUNT(*) FROM article_parts ap WHERE ap.article_id = a.id) AS total_parts,
        (SELECT MAX(part_number) FROM article_parts ap WHERE ap.article_id = a.id) AS max_part
    FROM 
        articles a
    LEFT JOIN 
        users u ON a.author_id = u.id
    ORDER BY 
        a.created_at DESC
")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionare Articole</title>
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="stylesheet" href="dist/css/all.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <?php include 'includes/navbar.php'; ?>
    <?php include 'includes/sidebar.php'; ?>

    <div class="content-wrapper">
    <section class="content-header">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <h1>Gestionare Articole</h1>
        <a href="actions/add_article.php" class="btn btn-sm btn-success">Adaugă Articol</a>
    </div>
</section>
        <section class="content">
            <div class="container-fluid">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Titlu</th>
                            <th>Părți</th>
                            <th>Autor</th>
                            <th>Vizualizări</th>
                            <th>Acțiuni</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($articles as $article): ?>
                            <tr>
                                <td><?= $article['id'] ?></td>
                                <td><?= htmlspecialchars($article['title']) ?></td>
                                <td>
    Total: <?= $article['total_parts'] ?> 
</td>

                                <td><?= htmlspecialchars($article['author_name'] ?? 'N/A') ?></td>
                                <td><?= $article['views'] ?></td>
                                <td>
                                    <a href="actions/edit_article.php?id=<?= $article['id'] ?>" class="btn btn-sm btn-warning">Editează</a>
                                    <a href="actions/delete_article.php?id=<?= $article['id'] ?>" class="btn btn-sm btn-danger">Șterge</a>
                                    <a href="actions/add_part.php?id=<?= $article['id'] ?>" class="btn btn-sm btn-info">Adaugă Parte</a>
                                    <a href="actions/delete_parts.php?id=<?= $article['id'] ?>" class="btn btn-sm btn-danger">Șterge Parte</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>
    </div>

    <?php include 'includes/footer.php'; ?>
</div>

<script src="dist/js/jquery.min.js"></script>
<script src="dist/js/bootstrap.bundle.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
