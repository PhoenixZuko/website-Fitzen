<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitZen - Acasă</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>

<!-- Sidebar -->
<section id="sidebar">

    <!-- Intro -->
    <section id="intro">
        <a href="#" class="logo"><img src="images/logo.png" alt="Logo" /></a>
        <header>
            <h2>Vitalitate & claritate</h2>
            <p>Another fine responsive site template by <a href="http://html5up.net">HTML5 UP</a></p>
        </header>
    </section>

    <!-- Mini Posts -->
    <section>
    <h2>Top 4 Articole</h2>
    <div class="mini-posts">
        <?php
        // Interogare SQL pentru top 4 articole
        $top_articles_query = $pdo->query("
            SELECT 
                articles.id, 
                articles.title, 
                articles.created_at, 
                articles.image, 
                articles.views, 
                COALESCE((SELECT AVG(rating) FROM ratings WHERE ratings.article_id = articles.id), 0) AS average_rating,
                (SELECT COUNT(*) FROM comments WHERE comments.article_id = articles.id) AS total_comments
            FROM articles
            ORDER BY 
                articles.views DESC, 
                average_rating DESC, 
                total_comments DESC, 
                articles.created_at DESC
            LIMIT 4
        ");
        $top_articles = $top_articles_query->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <?php foreach ($top_articles as $index => $top_article): ?>
            <article class="mini-post">
                <header>
                    <h3>
                        <a href="article.php?id=<?= $top_article['id'] ?>">
                            <?= htmlspecialchars($top_article['title']) ?>
                        </a>
                    </h3>
                    <time class="published" datetime="<?= $top_article['created_at'] ?>">
                        <?= date('F j, Y', strtotime($top_article['created_at'])) ?>
                    </time>
                    <p>
                        <strong>Views:</strong> <?= $top_article['views'] ?> |
                        <strong>Rating:</strong> <?= round($top_article['average_rating'], 1) ?> |
                        <strong>Comments:</strong> <?= $top_article['total_comments'] ?>
                    </p>
                </header>
                <a href="article.php?id=<?= $top_article['id'] ?>" class="image">
                    <img src="images/<?= htmlspecialchars($top_article['image'] ?? 'default.jpg') ?>" alt="<?= htmlspecialchars($top_article['title']) ?>" />
                </a>
            </article>
        <?php endforeach; ?>
    </div>
</section>


<!-- Posts List -->
<section>
    <h2>Last 15 Articles</h2>
    <ul class="posts">
        <?php
        // Interogare SQL pentru lista ultimelor 6 articole
        $posts_list_query = $pdo->query("
            SELECT 
                id, 
                title, 
                created_at, 
                image, 
                category 
            FROM articles 
            ORDER BY created_at DESC 
            LIMIT 15
        ");
        $posts_list = $posts_list_query->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <?php foreach ($posts_list as $post): ?>
            <li>
                <article>
                    <header>
                        <h3>
                            <a href="article.php?id=<?= $post['id'] ?>">
                                <?= htmlspecialchars($post['title']) ?>
                            </a>
                        </h3>
                        <time class="published" datetime="<?= $post['created_at'] ?>">
                            <?= date('F j, Y', strtotime($post['created_at'])) ?>
                        </time>
                        <p class="category">
                            Category: <?= htmlspecialchars($post['category'] ?? 'Uncategorized') ?>
                        </p>
                    </header>
                    <a href="article.php?id=<?= $post['id'] ?>" class="image">
                        <img src="images/<?= htmlspecialchars($post['image'] ?? 'default.jpg') ?>" alt="<?= htmlspecialchars($post['title']) ?>" />
                    </a>
                </article>
            </li>
        <?php endforeach; ?>
    </ul>
</section>


    <!-- About -->
    <section class="blurb">
        <h2>About</h2>
        <p>Bun venit pe blogul nostru, unde împărtășim pasiuni, experiențe și cunoștințe despre sport, sănătate, tehnologie și multe altele. Găsiți sfaturi utile despre alimentație, antrenamente, rețete sănătoase și perspective unice. Alăturați-vă și contribuiți cu articole educative și inspiraționale!</p>
        <ul class="actions">
            <li><a href="about.php" class="button">Learn More</a></li>
        </ul>
    </section>

    <!-- Footer -->
    <section id="footer">
        <ul class="icons">
            <li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
            <li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
            <li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
            <li><a href="#" class="icon solid fa-rss"><span class="label">RSS</span></a></li>
            <li><a href="contact.php" class="icon solid fa-envelope"><span class="label">Email</span></a></li>
        </ul>
        <p class="copyright">&copy; Untitled. Design: <a href="http://html5up.net">HTML5 UP</a>. Images: <a href="http://unsplash.com">Unsplash</a>.</p>
    </section>

</section>
</div> <!-- End Wrapper -->

<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/browser.min.js"></script>
<script src="assets/js/breakpoints.min.js"></script>
<script src="assets/js/util.js"></script>
<script src="assets/js/main.js"></script>

</body>
</html>
