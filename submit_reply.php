<?php
session_start();
require 'config.php';

if (!isset($_SESSION['user_id'])) {
    die("Απαιτείται σύνδεση.");
}

$thread_id = $_POST['thread_id'];
$content = $_POST['content'];
$user_id = $_SESSION['user_id'];

$stmt = $pdo->prepare("INSERT INTO posts (thread_id, user_id, content) VALUES (?, ?, ?)");
$stmt->execute([$thread_id, $user_id, $content]);

header("Location: thread.php?id=" . $thread_id);
