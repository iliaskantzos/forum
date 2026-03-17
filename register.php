<?php
require 'config.php';

$username = $_POST['username'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
try {
    $stmt->execute([$username, $email, $password]);
    header("Location: forum.php");
} catch (PDOException $e) {
    echo "Η εγγραφή απέτυχε: " . $e->getMessage();
}
?>