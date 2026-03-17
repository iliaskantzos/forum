<?php
session_start();
require 'config.php';

if (!isset($_SESSION['user_id'])) {
    die("Απαιτείται σύνδεση.");
}

$title = $_POST['title'];
$content = $_POST['content'];
$user_id = $_SESSION['user_id'];

$stmt = $pdo->prepare("INSERT INTO threads (user_id, title, content) VALUES (?, ?, ?)");
$stmt->execute([$user_id, $title, $content]);

header("Location: forum.php");
