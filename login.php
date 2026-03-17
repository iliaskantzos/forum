<?php
session_start();
require 'config.php';

$email = $_POST['email'];
$password = $_POST['password'];

$stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
$stmt->execute([$email]);
$user = $stmt->fetch();

if ($user && password_verify($password, $user['password'])) {
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['role'] = $user['role']; // Χρησιμοποιούμε το 'role'

    header("Location: forum.php");
    exit;
} else {
    echo "Λάθος email ή κωδικός.";
}
?>
