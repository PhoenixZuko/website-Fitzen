<?php
require '../config/db.php';
$id = $_GET['id'];
$query = $pdo->prepare("DELETE FROM comments WHERE id = :id");
$query->execute(['id' => $id]);
header("Location: comments.php");
exit();
?>
