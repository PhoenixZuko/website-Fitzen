<?php
require 'config/db.php';
include 'header.php';

// Obține articolele din categoria "Sanatate"
$query = $pdo->prepare("
    SELECT 
        articles.*, 
        users.username AS author_name, 
        COALESCE((SELECT AVG(rating) FROM ratings WHERE ratings.article_id = articles.id), 0) AS average_rating,
        (SELECT COUNT(rating) FROM ratings WHERE ratings.article_id = articles.id) AS total_votes,
        (SELECT COUNT(*) FROM comments WHERE comments.article_id = articles.id) AS total_comments
    FROM articles 
    JOIN users ON articles.author_id = users.id 
    WHERE articles.category = :category OR FIND_IN_SET(:category, articles.categories)
    ORDER BY created_at DESC
");
$query->execute(['category' => 'Sanatate']);
$articles = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- Main -->
<div id="main">
    <?php if (empty($articles)): ?>
        <p>No articles available in the Sanatate category.</p>
    <?php else: ?>
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
                        <li><a href="#"><?= htmlspecialchars($article['category']) ?></a></li>
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
                    </ul>
                </footer>
            </article>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<?php include 'footer.php'; ?>
