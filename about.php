<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($aboutArticle['title'] ?? 'Despre Noi') ?> - FitZen</title>
    <meta name="description" content="<?= htmlspecialchars($aboutArticle['summary'] ?? 'Află mai multe despre viziunea și misiunea noastră la FitZen.') ?>">
    <meta name="keywords" content="despre, fitzen, <?= htmlspecialchars($aboutArticle['title'] ?? 'despre noi') ?>">
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<?php
require 'config/db.php';
include 'header.php';

// Obține articolul despre "About"
$query = $pdo->query("
    SELECT title, summary, content, created_at, image 
    FROM about 
    ORDER BY created_at DESC 
    LIMIT 1
");
$aboutArticle = $query->fetch(PDO::FETCH_ASSOC);
?>

<!-- Main -->
<div id="main">
    <?php if (!$aboutArticle): ?>
        <p>The about page is currently empty. Please add content in the database.</p>
    <?php else: ?>
        <article class="post">
            <header>
                <div class="title">
                    <h2><?= htmlspecialchars($aboutArticle['title']) ?></h2>
                    <p><?= htmlspecialchars($aboutArticle['summary']) ?></p>
                </div>
                <div class="meta">
                    <time class="published" datetime="<?= $aboutArticle['created_at'] ?>">
                        <?= date('F j, Y', strtotime($aboutArticle['created_at'])) ?>
                    </time>
                </div>
            </header>
            <?php if ($aboutArticle['image']): ?>
                <a href="#" class="image featured">
                    <img src="images/<?= htmlspecialchars($aboutArticle['image']) ?>" alt="<?= htmlspecialchars($aboutArticle['title']) ?>">
                </a>
            <?php endif; ?>
            <p><?= nl2br(htmlspecialchars($aboutArticle['content'])) ?></p>
        </article>
    <?php endif; ?>
</div>

<?php include 'footer.php'; ?>
