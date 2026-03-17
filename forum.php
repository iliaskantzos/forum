<?php
session_start();
require 'config.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="el">
<head>
  <meta charset="UTF-8">
  <title>Forum</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
  <div class="container-fluid">
    <a class="navbar-brand" href="forum.php">Forum</a>
    <div class="collapse navbar-collapse justify-content-end">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="profile.php">Προφίλ</a></li>
        
<?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
<li class="nav-item"><a class="nav-link text-warning" href="admin_panel.php">Admin Panel</a></li>
<?php endif; ?>
        <li class="nav-item"><a class="nav-link text-danger" href="logout.php">Αποσύνδεση</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="container">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Θέματα Συζήτησης</h2>
    <a href="new_thread.php" class="btn btn-primary">Start New Discussion</a>
  </div>
  <table class="table table-bordered">
    <thead class="table-dark">
      <tr>
        <th>Topics</th>
        <th>Posted On</th>
        <th>Replies</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $threads = $pdo->query("SELECT threads.*, users.username, users.avatar FROM threads JOIN users ON threads.user_id = users.id ORDER BY created_at DESC");
      foreach ($threads as $thread):
        $count = $pdo->prepare("SELECT COUNT(*) FROM posts WHERE thread_id = ?");
        $count->execute([$thread['id']]);
        $replies = $count->fetchColumn();
        $avatar = $thread['avatar'] ?: 'default_avatar.png';
      ?>
      <tr>
        <td>
          <div class="d-flex align-items-center">
            <img src="<?= htmlspecialchars($avatar) ?>" width="40" height="40" class="rounded-circle me-2">
            <div>
              <a href="thread.php?id=<?= $thread['id'] ?>" class="fw-bold"><?= htmlspecialchars($thread['title']) ?></a><br>
              <small>by <?= htmlspecialchars($thread['username']) ?></small>
            </div>
          </div>
        </td>
        <td><?= $thread['created_at'] ?></td>
        <td><?= $replies ?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
</body>
</html>
