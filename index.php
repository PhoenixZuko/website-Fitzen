<?php
require 'config/db.php';
include 'header.php';

// Numărul maxim de articole pe pagină
$articles_per_page = 4;

// Obține pagina curentă din URL (default: 1)
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max($page, 1); // Asigură că pagina este cel puțin 1

$offset = ($page - 1) * $articles_per_page;

// Obține numărul total de articole
$total_articles_query = $pdo->query("SELECT COUNT(*) FROM articles");
$total_articles = $total_articles_query->fetchColumn();
$total_pages = ceil($total_articles / $articles_per_page);

// Verifică dacă pagina curentă este validă
if ($page > $total_pages && $total_pages > 0) {
    header("Location: index.php?page=$total_pages");
    exit;
}

// Inițializează variabila articolelor
$articles = [];

// Obține articolele din baza de date
$query = $pdo->prepare("
    SELECT 
        articles.*, 
        users.username AS author_name, 
        COALESCE((SELECT AVG(rating) FROM ratings WHERE ratings.article_id = articles.id), 0) AS average_rating,
        (SELECT COUNT(rating) FROM ratings WHERE ratings.article_id = articles.id) AS total_votes,
        (SELECT COUNT(*) FROM comments WHERE comments.article_id = articles.id) AS total_comments,
        articles.views AS total_views
    FROM articles
    JOIN users ON articles.author_id = users.id
    ORDER BY created_at DESC
    LIMIT :limit OFFSET :offset
");

$query->bindValue(':limit', $articles_per_page, PDO::PARAM_INT);
$query->bindValue(':offset', $offset, PDO::PARAM_INT);
$query->execute();

$articles = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitZen - Acasă</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>

<!-- Main -->
<div id="main">
    <?php foreach ($articles as $article): ?>
        <article class="post">
            <header>
                <div class="title">
                    <h2><a href="article.php?id=<?= $article['id'] ?>"><?= htmlspecialchars($article['title']) ?></a></h2>
                    <p><?= htmlspecialchars($article['summary']) ?></p>
                </div>
                <div class="meta">
                    <time class="published" datetime="<?= $article['created_at'] ?>">
                        <?= date('F j, Y', strtotime($article['created_at'])) ?>
                    </time>
                    <a href="#" class="author">
                        <span class="name"><?= htmlspecialchars($article['author_name']) ?></span>
                        <img src="images/avatar.jpg" alt="Author" />
                    </a>
                </div>
            </header>
            <a href="article.php?id=<?= $article['id'] ?>" class="image featured">
                <img src="images/<?= htmlspecialchars($article['image'] ?? 'default.jpg') ?>" alt="<?= htmlspecialchars($article['title']) ?>">
            </a>
            <p><?= htmlspecialchars(substr($article['content'], 0, 150)) ?>...</p>
            <footer>
                <ul class="actions">
                    <li><a href="article.php?id=<?= $article['id'] ?>" class="button large">Continue Reading</a></li>
                </ul>
                <ul class="stats">
                  <a href="#"><?= htmlspecialchars($article['category']) ?></a>
                    <li>
                        <a href="#" class="icon solid fa-star">
                            <?= $article['total_votes'] > 0 
                                ? 'Rating: ' . round($article['average_rating'], 1) 
                                : 'No rate' ?>
                        </a>
                    </li>
                    <li>
                        <a href="article.php?id=<?= $article['id'] ?>" class="icon solid fa-comment">
                            <?= $article['total_comments'] ?> <?= $article['total_comments'] == 1 ? 'Comment' : 'Comments' ?>
                        </a>
                    </li>
                    <li>
    <a href="#" class="icon solid fa-eye">
        <?= $article['total_views'] ?> <?= $article['total_views'] == 1 ? 'View' : 'Views' ?>
    </a>
</li>

                </ul>
            </footer>
        </article>
    <?php endforeach; ?>

    <!-- Pagination -->
    <ul class="actions pagination">
        <?php if ($page > 1): ?>
            <li><a href="?page=<?= $page - 1 ?>" class="button large previous">Previous Page</a></li>
        <?php else: ?>
            <li><a href="#" class="disabled button large previous">Previous Page</a></li>
        <?php endif; ?>

        <?php if ($page < $total_pages): ?>
            <li><a href="?page=<?= $page + 1 ?>" class="button large next">Next Page</a></li>
        <?php else: ?>
            <li><a href="#" class="disabled button large next">Next Page</a></li>
        <?php endif; ?>
    </ul>
</div>

<?php include 'footer.php'; ?>
