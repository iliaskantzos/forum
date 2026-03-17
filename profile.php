<?php
session_start();
require 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['avatar'])) {
    $file = $_FILES['avatar'];
    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    $filename = "avatars/user_" . $user_id . "." . $ext;
    move_uploaded_file($file['tmp_name'], $filename);
    $stmt = $pdo->prepare("UPDATE users SET avatar = ? WHERE id = ?");
    $stmt->execute([$filename, $user_id]);
}

$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch();
?>
<!DOCTYPE html>
<html lang="el">
<head>
  <meta charset="UTF-8">
  <title>Το προφίλ μου</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
  <div class="container-fluid">
    <a class="navbar-brand" href="forum.php">Forum</a>
    <div class="collapse navbar-collapse justify-content-end">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="profile.php">Προφίλ</a></li>
        <li class="nav-item"><a class="nav-link text-danger" href="logout.php">Αποσύνδεση</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="container">
  <div class="mb-3">
    <a href="forum.php" class="btn btn-outline-secondary">← Επιστροφή στο Forum</a>
  </div>
  <h3 class="mb-4">Το προφίλ μου</h3>
  <div class="card p-3">
    <div class="d-flex align-items-center">
      <img src="<?= $user['avatar'] ?: 'default_avatar.png' ?>" width="80" height="80" class="rounded-circle me-3">
      <div>
        <h5><?= htmlspecialchars($user['username']) ?></h5>
        <p class="text-muted"><?= htmlspecialchars($user['email']) ?></p>
      </div>
    </div>
    <form method="POST" enctype="multipart/form-data" class="mt-3">
      <label>Αλλαγή φωτογραφίας προφίλ</label>
      <input type="file" name="avatar" class="form-control mb-2" required>
      <button class="btn btn-primary">Αποθήκευση</button>
    </form>
  </div>
</div>
</body>
</html>
