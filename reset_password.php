<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $new_pass = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("UPDATE users SET password = ? WHERE email = ?");
    $stmt->execute([$new_pass, $email]);

    echo "Ο κωδικός ενημερώθηκε.";
}
?>
<!DOCTYPE html>
<html lang="el">
<head><meta charset="UTF-8"><title>Reset Password</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
<div class="container">
<h3>Επαναφορά Κωδικού</h3>
<form method="POST">
  <input type="email" name="email" class="form-control mb-2" placeholder="Email" required>
  <input type="password" name="new_password" class="form-control mb-2" placeholder="Νέος Κωδικός" required>
  <button class="btn btn-primary">Ενημέρωση</button>
</form>
</div></body></html>