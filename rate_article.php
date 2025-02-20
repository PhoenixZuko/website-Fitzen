<?php
require 'config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $articleId = isset($_POST['article_id']) ? intval($_POST['article_id']) : 0;
    $rating = isset($_POST['rating']) ? intval($_POST['rating']) : 0;
    $userIp = $_SERVER['REMOTE_ADDR'];

    if ($articleId > 0 && $rating >= 1 && $rating <= 5) {
        // Verificăm dacă utilizatorul a votat deja
        $checkVoteQuery = $pdo->prepare("
            SELECT COUNT(*) 
            FROM ratings 
            WHERE article_id = :article_id AND user_ip = :user_ip
        ");
        $checkVoteQuery->execute([
            'article_id' => $articleId,
            'user_ip' => $userIp,
        ]);

        if ($checkVoteQuery->fetchColumn() > 0) {
            echo json_encode([
                'success' => false,
                'message' => 'Ai votat deja acest articol.',
            ]);
            exit;
        }

        // Salvează votul în baza de date
        $insertQuery = $pdo->prepare("
            INSERT INTO ratings (article_id, rating, user_ip) 
            VALUES (:article_id, :rating, :user_ip)
        ");
        $insertQuery->execute([
            'article_id' => $articleId,
            'rating' => $rating,
            'user_ip' => $userIp,
        ]);

        // Calcularea mediei și a numărului de voturi
        $statsQuery = $pdo->prepare("
            SELECT AVG(rating) AS average_rating, COUNT(rating) AS total_votes 
            FROM ratings 
            WHERE article_id = :article_id
        ");
        $statsQuery->execute(['article_id' => $articleId]);
        $stats = $statsQuery->fetch(PDO::FETCH_ASSOC);

        echo json_encode([
            'success' => true,
            'average_rating' => round($stats['average_rating'], 1),
            'total_votes' => $stats['total_votes'],
        ]);
        exit;
    }
}

// Date invalide
echo json_encode(['success' => false, 'message' => 'Date invalide.']);
exit;
