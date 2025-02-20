<?php
require 'config/db.php';

// Setăm header-ul pentru XML
header('Content-Type: application/xml; charset=utf-8');

// Începem documentul XML
echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

// Adăugăm paginile statice
$staticPages = [
    ['loc' => 'https://fitzen.ro/index.php', 'priority' => '1.0'],
    ['loc' => 'https://fitzen.ro/about.php', 'priority' => '0.8'],
    ['loc' => 'https://fitzen.ro/contact.php', 'priority' => '0.8'],
    ['loc' => 'https://fitzen.ro/tutoriale.php', 'priority' => '0.8'],
    ['loc' => 'https://fitzen.ro/sport.php', 'priority' => '0.8'],
    ['loc' => 'https://fitzen.ro/blog.php', 'priority' => '0.8'],
    ['loc' => 'https://fitzen.ro/sanatate.php', 'priority' => '0.8'],
];

foreach ($staticPages as $page) {
    echo "<url>\n";
    echo "    <loc>{$page['loc']}</loc>\n";
    echo "    <priority>{$page['priority']}</priority>\n";
    echo "</url>\n";
}

// Adăugăm paginile articolelor din baza de date
$query = $pdo->query("SELECT slug, created_at FROM articles WHERE slug IS NOT NULL AND slug != ''");
while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    $url = 'https://fitzen.ro/article/' . htmlspecialchars($row['slug']); // URL-ul cu slug
    $lastmod = date('Y-m-d', strtotime($row['created_at'])); // Data ultimei modificări
    echo "<url>\n";
    echo "    <loc>$url</loc>\n";
    echo "    <lastmod>$lastmod</lastmod>\n";
    echo "    <priority>0.7</priority>\n"; // Prioritatea pentru articole
    echo "</url>\n";
}

// Închidem documentul XML
echo '</urlset>';
?>
