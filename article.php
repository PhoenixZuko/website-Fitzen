<?php
require 'config/db.php';

// Determinăm dacă folosim `slug` sau `id`
$articleId = 0;
$slug = isset($_GET['slug']) ? $_GET['slug'] : null;

if ($slug) {
    // Căutăm articolul folosind slug
    $query = $pdo->prepare("
        SELECT articles.*, users.username AS author_name 
        FROM articles 
        JOIN users ON articles.author_id = users.id 
        WHERE articles.slug = :slug
    ");
    $query->execute(['slug' => $slug]);
} else {
    // Căutăm articolul folosind id
    $articleId = isset($_GET['id']) ? intval($_GET['id']) : 0;
    $query = $pdo->prepare("
        SELECT articles.*, users.username AS author_name 
        FROM articles 
        JOIN users ON articles.author_id = users.id 
        WHERE articles.id = :id
    ");
    $query->execute(['id' => $articleId]);
}

// Preluăm datele articolului
$article = $query->fetch(PDO::FETCH_ASSOC);

if (!$article) {
    echo "<p>Articolul solicitat nu a fost găsit.</p>";
    exit;
}

// Determinăm partea curentă a articolului
$partNumber = isset($_GET['part']) ? intval($_GET['part']) : 0;

if ($partNumber > 0) {
    // Preluăm partea solicitată din baza de date
    $partsQuery = $pdo->prepare("
        SELECT content 
        FROM article_parts 
        WHERE article_id = :article_id AND part_number = :part_number
    ");
    $partsQuery->execute([
        'article_id' => $articleId,
        'part_number' => $partNumber
    ]);
    $part = $partsQuery->fetch(PDO::FETCH_ASSOC);

    if ($part) {
        $article['content'] = $part['content'];
    } else {
        echo "<p>Partea solicitată nu a fost găsită.</p>";
        exit;
    }
}

// Dacă am folosit slug, obținem id-ul pentru restul logicii
if ($slug) {
    $articleId = $article['id'];
}

// Preluăm imaginile adiționale
$photosQuery = $pdo->prepare("
    SELECT photo_path 
    FROM article_photos 
    WHERE article_id = :article_id
");
$photosQuery->execute(['article_id' => $articleId]);
$photos = $photosQuery->fetchAll(PDO::FETCH_ASSOC);

// Generează sau preia meta description-ul
if (!empty($article['meta_description'])) {
    $metaDescription = $article['meta_description']; // Folosește meta description din baza de date
} else {
    // Creează un meta description automat
    $metaDescription = htmlspecialchars(
        substr(strip_tags($article['summary']), 0, 150) ?: $article['title']
    );
}


// Determinăm numărul total de părți pentru acest articol
$partsCountQuery = $pdo->prepare("
    SELECT COUNT(*) 
    FROM article_parts 
    WHERE article_id = :article_id
");
$partsCountQuery->execute(['article_id' => $articleId]);
$totalParts = $partsCountQuery->fetchColumn();

// Afișăm partea curentă
if ($partNumber > 0) {
    // Preluăm partea solicitată din baza de date
    $partsQuery = $pdo->prepare("
        SELECT content 
        FROM article_parts 
        WHERE article_id = :article_id AND part_number = :part_number
    ");
    $partsQuery->execute([
        'article_id' => $articleId,
        'part_number' => $partNumber
    ]);
    $part = $partsQuery->fetch(PDO::FETCH_ASSOC);

    if ($part) {
        $article['content'] = $part['content'];
    } else {
        echo "<p>Partea solicitată nu a fost găsită.</p>";
        exit;
    }
}

// Determinăm partea următoare
if ($partNumber < $totalParts) {
    $nextPart = $partNumber + 1;
} else {
    $nextPart = 0; // Revenim la prima parte
}

// Generăm link pentru partea următoare
$nextUrl = $nextPart === 0 
    ? "article.php?id=$articleId" 
    : "article.php?id=$articleId&part=$nextPart";

$navigationHtml = '<div class="navigation">';
$navigationHtml .= '<a href="' . $nextUrl . '" class="button">Continuă lectura</a>';
$navigationHtml .= '</div>';



// Obține adresa IP a utilizatorului
$userIp = $_SERVER['REMOTE_ADDR'];

// Verificăm dacă IP-ul a fost deja înregistrat pentru acest articol
$checkViewQuery = $pdo->prepare("
    SELECT COUNT(*) 
    FROM article_views 
    WHERE article_id = :article_id AND user_ip = :user_ip
");
$checkViewQuery->execute([
    'article_id' => $articleId,
    'user_ip' => $userIp,
]);
$hasViewed = $checkViewQuery->fetchColumn();

if (!$hasViewed) {
    // Incrementăm numărul de vizualizări în tabelul principal
    $updateViewsQuery = $pdo->prepare("UPDATE articles SET views = views + 1 WHERE id = :id");
    $updateViewsQuery->execute(['id' => $articleId]);

    // Înregistrăm vizualizarea în tabelul `article_views`
    $insertViewQuery = $pdo->prepare("
        INSERT INTO article_views (article_id, user_ip) 
        VALUES (:article_id, :user_ip)
    ");
    $insertViewQuery->execute([
        'article_id' => $articleId,
        'user_ip' => $userIp,
    ]);
}

// Preluăm articolul din baza de date
$query = $pdo->prepare("
    SELECT articles.*, users.username AS author_name 
    FROM articles 
    JOIN users ON articles.author_id = users.id 
    WHERE articles.id = :id
");
$query->execute(['id' => $articleId]);
$article = $query->fetch(PDO::FETCH_ASSOC);

if (!$article) {
    echo "<p>Articolul solicitat nu a fost găsit.</p>";
    exit;
}


// Determinăm numărul total de părți pentru acest articol
$partsCountQuery = $pdo->prepare("
    SELECT COUNT(*) 
    FROM article_parts 
    WHERE article_id = :article_id
");
$partsCountQuery->execute(['article_id' => $articleId]);
$totalParts = $partsCountQuery->fetchColumn();

// Generăm linkurile pentru navigare
$prevPart = $partNumber > 0 ? $partNumber - 1 : 0;
$nextPart = $partNumber < $totalParts ? $partNumber + 1 : 0;

$navigationHtml = '<div class="navigation">';

if ($prevPart > 0) {
    // Link către partea anterioară
    $prevUrl = $prevPart === 1 ? "article.php?id=$articleId" : "article.php?id=$articleId&part=$prevPart";
    $navigationHtml .= '<a href="' . $prevUrl . '" class="button">Anterior</a>';
}

if ($nextPart > 0) {
    // Link către partea următoare
    $nextUrl = "article.php?id=$articleId&part=$nextPart";
    $navigationHtml .= '<a href="' . $nextUrl . '" class="button">Următor</a>';
}

$navigationHtml .= '</div>';

// Restul codului rămâne neschimbat

// Funcție pentru a găsi imaginea autorului
function getAuthorAvatar($authorName) {
    $basePath = "images/authors/";
    $nameFormatted = strtolower(str_replace(' ', '_', $authorName));
    $extensions = ['png', 'jpg', 'jpeg']; // Extensii suportate

    foreach ($extensions as $ext) {
        $filePath = $basePath . $nameFormatted . '.' . $ext;
        if (file_exists($filePath)) {
            return $filePath;
        }
    }

    // Imagine implicită
    return "images/default_author.png";
}

$authorAvatar = getAuthorAvatar($article['author_name']);

// Gestionarea trimiterii unui comentariu
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $content = trim($_POST['content']);

    if (!empty($username) && !empty($email) && !empty($content)) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $commentQuery = $pdo->prepare("
                INSERT INTO comments (article_id, username, email, content) 
                VALUES (:article_id, :username, :email, :content)
            ");
            $commentQuery->execute([
                'article_id' => $articleId,
                'username' => $username,
                'email' => $email,
                'content' => $content,
            ]);
            echo "<p>Comentariul a fost adăugat!</p>";
        } else {
            echo "<p>Adresa de e-mail este invalidă.</p>";
        }
    } else {
        echo "<p>Te rugăm să completezi toate câmpurile.</p>";
    }
}

// Preluăm comentariile principale și răspunsurile
$commentsQuery = $pdo->prepare("
    SELECT * 
    FROM comments 
    WHERE article_id = :article_id AND parent_id IS NULL 
    ORDER BY created_at DESC
");
$commentsQuery->execute(['article_id' => $articleId]);
$comments = $commentsQuery->fetchAll(PDO::FETCH_ASSOC);

$repliesQuery = $pdo->prepare("
    SELECT * 
    FROM comments 
    WHERE article_id = :article_id AND parent_id IS NOT NULL
");
$repliesQuery->execute(['article_id' => $articleId]);
$replies = $repliesQuery->fetchAll(PDO::FETCH_ASSOC);

// Grupăm răspunsurile după parent_id
$repliesByParent = [];
foreach ($replies as $reply) {
    $repliesByParent[$reply['parent_id']][] = $reply;
}

// Verificăm dacă utilizatorul a votat deja
$userIp = $_SERVER['REMOTE_ADDR'];
$userRatingQuery = $pdo->prepare("
    SELECT rating 
    FROM ratings 
    WHERE article_id = :article_id AND user_ip = :user_ip
");
$userRatingQuery->execute([
    'article_id' => $articleId,
    'user_ip' => $userIp,
]);
$userHasVoted = $userRatingQuery->fetchColumn();

// Calcularea mediei și a numărului de voturi
$statsQuery = $pdo->prepare("
    SELECT AVG(rating) AS average_rating, COUNT(rating) AS total_votes 
    FROM ratings 
    WHERE article_id = :article_id
");
$statsQuery->execute(['article_id' => $articleId]);
$stats = $statsQuery->fetch(PDO::FETCH_ASSOC);

$averageRating = round($stats['average_rating'], 1) ?: 0;
$totalVotes = $stats['total_votes'] ?: 0;
?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes, maximum-scale=5">
    <title><?= htmlspecialchars($article['title']) ?> - FitZen</title>
    <link rel="stylesheet" href="assets/css/main.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">


    <style>
        .response {
            margin-left: 20px;
            font-style: italic;
        }
        #comment-form {
            display: none; /* Formularul este ascuns inițial */
        }
    </style>
</head>
<body class="single is-preload">

<div id="wrapper">
    <?php include 'header.php'; ?>

    <div id="main">
    <article class="post">
<header>
    <div class="title">
        <h2><?= htmlspecialchars($article['title']) ?></h2>
        <p><?= htmlspecialchars($article['summary']) ?></p>
    </div>
    <div class="meta">
        <time class="published" datetime="<?= htmlspecialchars($article['created_at']) ?>">
            <?= date('F j, Y', strtotime($article['created_at'])) ?>
        </time>
        <a href="#" class="author">
            <span class="name"><?= htmlspecialchars($article['author_name']) ?></span>
            <img src="<?= htmlspecialchars($authorAvatar) ?>" alt="Author Avatar">
        </a>
    </div>
</header>
<span class="image featured">
    <img src="images/<?= htmlspecialchars($article['image'] ?? 'default.png') ?>" alt="Article Image">
</span>
<div class="zoom-controls-container">
    <div class="zoom-buttons">
        <button onclick="adjustZoom('in')"><i class="fas fa-plus"></i> zoom</button>
        <button onclick="adjustZoom('out')"><i class="fas fa-minus"></i> zoom</button>
    </div>
</div>

<?php
// Determinăm partea curentă
$partNumber = isset($_GET['part']) ? intval($_GET['part']) : 0;

// Preluăm partea curentă sau principală
if ($partNumber > 0) {
    $partsQuery = $pdo->prepare("
        SELECT content 
        FROM article_parts 
        WHERE article_id = :article_id AND part_number = :part_number
    ");
    $partsQuery->execute([
        'article_id' => $articleId,
        'part_number' => $partNumber
    ]);
    $part = $partsQuery->fetch(PDO::FETCH_ASSOC);

    if ($part) {
        echo '<div class="zoomable-content">';
        echo '<p>' . nl2br(htmlspecialchars($part['content'])) . '</p>';
        echo '</div>';
    } else {
        echo '<p>Partea solicitată nu a fost găsită.</p>';
    }
} else {
    // Afișăm conținutul principal într-un container cu clasă specifică
    echo '<div class="zoomable-content">';
    echo '<p>' . nl2br(htmlspecialchars($article['content'])) . '</p>';
    echo '</div>';
}


// Determinăm numărul total de părți
$partsCountQuery = $pdo->prepare("
    SELECT COUNT(*) 
    FROM article_parts 
    WHERE article_id = :article_id
");
$partsCountQuery->execute(['article_id' => $articleId]);
$totalParts = $partsCountQuery->fetchColumn();

// Afișăm butonul doar dacă există părți suplimentare
if ($totalParts > 0) {
    // Determinăm partea următoare
    if ($partNumber === 0) {
        $nextPart = 1; // Prima parte suplimentară
    } elseif ($partNumber < $totalParts) {
        $nextPart = $partNumber + 1;
    } else {
        $nextPart = 0; // Revenim la partea principală
    }

    // Generăm textul butonului
    if ($nextPart === 0) {
        $buttonText = "Inapoi la Prima Parte";
    } else {
        $buttonText = "Continuare Partea a " . ($nextPart + 1) . "-a";
    }

    // Generăm link pentru partea următoare
    $nextUrl = $nextPart === 0 
        ? "article.php?id=$articleId" 
        : "article.php?id=$articleId&part=$nextPart";

    echo '<a href="' . $nextUrl . '" class="button">' . htmlspecialchars($buttonText) . '</a>';
}
?>

</article>


<div class="article-photos">
    <?php if (count($photos) > 1): ?>
        <div class="photo-slider">
            <?php foreach ($photos as $photo): ?>
                <div class="slide">
                    <img src="<?= htmlspecialchars($photo['photo_path']) ?>" alt="Article Photo">
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Butoane pentru navigare doar dacă sunt mai multe fotografii -->
        <div class="slider-buttons">
            <button id="prev-slide">Anterior</button>
            <button id="next-slide">Următor</button>
        </div>
    <?php elseif (count($photos) === 1): ?>
        <!-- O singură fotografie -->
        <img src="<?= htmlspecialchars($photos[0]['photo_path']) ?>" alt="Article Photo">
    <?php endif; ?>
</div>


<section id="rating-section">
    <?php if (!$userHasVoted): ?>
        <div id="rate-article">
            <button class="star-button" data-rating="1"><span>1</span>★</button>
            <button class="star-button" data-rating="2"><span>2</span>★</button>
            <button class="star-button" data-rating="3"><span>3</span>★</button>
            <button class="star-button" data-rating="4"><span>4</span>★</button>
            <button class="star-button" data-rating="5"><span>5</span>★</button>
        </div>
    <?php endif; ?>
    <p id="rating-display">
        <span class="icon-container">
            <i class="fas fa-bullhorn"></i>
            <span class="rating-number"><?= htmlspecialchars($averageRating) ?></span>
        </span>
        <span class="votes">from <?= htmlspecialchars($totalVotes) ?> votes</span>
        <span class="clap"></span>
    </p>
</section>




<section>
    <h3>
        <a href="#" id="toggle-comment-form">
        <i class="fas fa-comments fa-2x"></i> <!-- Iconiță de două ori mai mare -->

        </a>
    </h3>
    <form id="comment-form" method="post" action="">
        <input type="text" name="username" placeholder="Nume" required>
        <input type="email" name="email" placeholder="Email" required>
        <textarea name="content" placeholder="Comentariul tău" rows="4" required></textarea>
        <button type="submit">Trimite</button>
    </form>
</section>

        <!-- Afișarea comentariilor și răspunsurilor -->
        <section>
            <h3></h3>
            <?php if (!empty($comments)): ?>
                <ul>
                    <?php foreach ($comments as $comment): ?>
                        <li>
                            <p><strong><?= htmlspecialchars($comment['username']) ?></strong> - <?= date('d M Y', strtotime($comment['created_at'])) ?>
                            <p><?= nl2br(htmlspecialchars($comment['content'])) ?></p>

                            <!-- Răspunsurile la comentariu -->
                            <?php if (isset($repliesByParent[$comment['id']])): ?>
                                <?php foreach ($repliesByParent[$comment['id']] as $reply): ?>
                                    <div class="response">
                                        <p>Response: <?= date('F j, Y, H:i', strtotime($reply['created_at'])) ?></p>
                                        <p><?= nl2br(htmlspecialchars($reply['content'])) ?></p>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>Nu există comentarii încă. Fii primul!</p>
            <?php endif; ?>
        </section>
    </div>
</div>



<style>

.zoomable-content p {
    margin: 0px 0px 3em 0px;
    padding: 0.4em;
    font-size: 0.9rem;
    font-family: 'Roboto', Arial, sans-serif;
    line-height: 1.3;
    color: #0a0622f2;
    background-color: #f9f9f9;
    border-left: 1px solid #1e90ff;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    text-align: justify;
    word-wrap: break-word;
    letter-spacing: 0.002em;
    transition: background-color 0.3s ease, color 0.3s ease, font-size 0.3s ease;
    min-height: 1.5em; /* Înălțime minimă pentru a preveni schimbări vizuale */
}
/* Izolare pentru butoanele din div-ul zoom-controls-container */
.zoom-controls-container .zoom-buttons {
    text-align: center;
    margin: 1em 0;
}

/* Stiluri doar pentru butoanele din acest div */

.zoom-controls-container .zoom-buttons button {
    padding: 0.3em 0.8em;
    margin: -20px 13px;
    font-size: 0.5rem;
    background-color: rgb(245, 245, 245);
    color: white;
    border: none;
    border-radius: 3px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease; 
}

.zoom-controls-container .zoom-buttons button:hover {
    background-color:rgb(225, 226, 227);
    transform: scale(1.05);
}

.zoom-controls-container .zoom-buttons button i {
    margin-right: 5px;
}

.photo-slider {
    display: flex;
    overflow: hidden;
    width: 100%;
    max-height: 500px;
    position: relative;
}

.slide {
    flex: 0 0 100%;
    transition: transform 0.5s ease-in-out;
}

.photo-slider img {
    width: 100%;
    height: auto;
}

.slider-buttons {
    position: absolute;
    top: 50%;
    width: 100%;
    display: flex;
    justify-content: space-between;
    transform: translateY(-50%);
}

.slider-buttons button {
    background-color: rgba(0, 0, 0, 0.5);
    color: white;
    border: none;
    padding: 10px;
    cursor: pointer;
}

    #rate-article {
        display: flex;
        gap: 5px;
        justify-content: center;
    }

    .star-button {
        all: unset; /* Elimină stilurile implicite */
        position: relative;
        font-size: 40px; /* Dimensiunea stelei */
        color: #ccc; /* Culoarea implicită a stelei */
        cursor: pointer;
        display: inline-flex;
        justify-content: center;
        align-items: center;
    }

    .star-button span {
        position: absolute;
        font-size: 20px; /* Dimensiunea cifrei */
        font-weight: bold;
        color: black; /* Culoarea cifrei */
        pointer-events: none; /* Previne interferența hover-ului */
    }

    /* Aprindem steaua la hover */
    .star-button:hover,
    .star-button:hover ~ .star-button {
        color: gold; /* Stelele hover devin aurii */
    }

    .star-button:hover ~ .star-button span {
        color: black; /* Cifra rămâne vizibilă */
    }

    /* Resetează culoarea pentru stelele după hover */
    .star-button:hover ~ .star-button {
        color: #ccc;
    }




    #rating-display {
    display: flex;
    align-items: center;
    font-size: 16px;
    gap: 10px;
}

.icon-container {
    display: flex;
    align-items: center;
    font-size: 24px;
    color: black;
}

.icon-container .rating-number {
    font-size: 18px; /* Dimensiune mai mică pentru nota */
    font-weight: bold;
    color: black;
    margin-left: 14px; /* Adaugă puțin spațiu față de iconiță */
}

.votes {
    margin-left: 10px;
    font-size: 17px;
    color: #555;
}

</style>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/browser.min.js"></script>
<script src="assets/js/breakpoints.min.js"></script>
<script src="assets/js/util.js"></script>
<script src="assets/js/main.js"></script>

<!-- Script pentru afișarea formularului -->
<script>
document.addEventListener("DOMContentLoaded", () => {
    // Toggle formular comentarii
    const toggleButton = document.getElementById('toggle-comment-form');
    if (toggleButton) {
        toggleButton.addEventListener('click', function (e) {
            e.preventDefault();
            const commentForm = document.getElementById('comment-form');
            if (commentForm) {
                commentForm.style.display = commentForm.style.display === 'none' || commentForm.style.display === '' ? 'block' : 'none';
            }
        });
    }

    // Notare articol
    document.querySelectorAll('#rate-article button').forEach(button => {
        button.addEventListener('click', function () {
            const rating = this.getAttribute('data-rating');
            const articleId = <?= json_encode($articleId) ?>;

            fetch('rate_article.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: `article_id=${articleId}&rating=${rating}`
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const ratingSection = document.getElementById('rating-section');
                    if (ratingSection) {
                        ratingSection.innerHTML = data.user_rating !== undefined
                            ? `<p>Nota ta: ${data.user_rating}</p><p>Vote rating: ${data.average_rating} from ${data.total_votes} votes</p>`
                            : `<p>Vote rating: ${data.average_rating} from ${data.total_votes} votes</p>`;
                    }
                } else {
                    alert(data.message || 'Eroare la trimiterea votului.');
                }
            })
            .catch(err => console.error('Eroare:', err));
        });
    });

    // Slider
    const slides = document.querySelectorAll(".slide");
    const totalSlides = slides.length;
    let currentIndex = 0;

    const updateSlider = () => {
        slides.forEach((slide, index) => {
            slide.style.transform = `translateX(${100 * (index - currentIndex)}%)`;
        });
    };

    const nextSlideBtn = document.getElementById("next-slide");
    const prevSlideBtn = document.getElementById("prev-slide");

    if (nextSlideBtn && prevSlideBtn) {
        nextSlideBtn.addEventListener("click", () => {
            currentIndex = (currentIndex + 1) % totalSlides;
            updateSlider();
        });

        prevSlideBtn.addEventListener("click", () => {
            currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
            updateSlider();
        });
    }

    if (slides.length > 0) updateSlider();

    // Zoom funcționalitate
    const paragraph = document.querySelector('.zoomable-content p');
    let currentSize = 0.9;

    if (paragraph) {
        window.adjustZoom = function (action) {
            if (action === 'in') {
                currentSize += 0.1;
            } else if (action === 'out' && currentSize > 0.5) {
                currentSize -= 0.1;
            }
            paragraph.style.fontSize = currentSize + 'rem';
            paragraph.style.lineHeight = (1.3 + (currentSize - 0.9) * 0.2).toFixed(2);
        };
    }
});

</script>


</body>
</html>
