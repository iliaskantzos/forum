
<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: index.php");
    exit();
}
require_once "db.php";
$user_id = $_SESSION["user_id"];
$threads = $conn->prepare("SELECT * FROM threads WHERE user_id = ? ORDER BY created_at DESC");
$threads->execute([$user_id]);
?>

<!DOCTYPE html>
<html lang="el">
<head>
  <meta charset="UTF-8">
  <title>Οι συζητήσεις μου</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
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

<div class="container my-5">
  <h2>Οι συζητήσεις μου</h2>
  <ul class="list-group mt-3">
    <?php while ($row = $threads->fetch()): ?>
      <li class="list-group-item">
        <a href="thread.php?id=<?= $row['id'] ?>"><?= htmlspecialchars($row['title']) ?></a>
        <span class="text-muted float-end"><?= $row['created_at'] ?></span>
      </li>
    <?php endwhile; ?>
  </ul>
</div>
</body>
</html>
