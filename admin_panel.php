<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="el">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5 text-center">
    <a href="forum.php" class="btn btn-secondary mb-3">← Επιστροφή στο Forum</a>
    <h2>Καλώς ήρθες, Διαχειριστή!</h2>
    <p>Από εδώ μπορείς να δημιουργήσεις νέους χρήστες ή να διαγράψεις αναρτήσεις.</p>

    <a href="create_user.php" class="btn btn-success m-2">Δημιουργία Χρήστη / Διαχειριστή</a>
    <a href="delete_post.php" class="btn btn-warning m-2">Διαγραφή Ανάρτησης</a>
    <a href="delete_thread.php" class="btn btn-danger m-2">Διαγραφή Συζήτησης</a>
</div>
</body>
</html>
