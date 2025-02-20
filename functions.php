<?php

/**
 * Generează un URL pentru un articol.
 *
 * @param int $articleId ID-ul articolului.
 * @param string|null $slug Slug-ul articolului (dacă există).
 * @param int|null $part Partea articolului (dacă este specificată).
 * @return string URL-ul generat.
 */
function generateArticleUrl($articleId, $slug = null, $part = null) {
    $baseUrl = "article.php";

    // Dacă slug-ul este setat, construiește URL-ul cu slug
    if (!empty($slug)) {
        $url = "$baseUrl?slug=" . urlencode($slug);
    } else {
        // Fallback la id dacă slug-ul lipsește
        $url = "$baseUrl?id=$articleId";
    }

    // Adaugă partea dacă este specificată
    if (!is_null($part) && $part > 1) {
        $url .= "&part=$part";
    }

    return $url;
}

