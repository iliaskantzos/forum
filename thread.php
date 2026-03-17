<?php
session_start();
require 'config.php';

$thread_id = $_GET['id'];
$stmt = $pdo->prepare("SELECT threads.*, users.username FROM threads JOIN users ON threads.user_id = users.id WHERE threads.id = ?");
$stmt->execute([$thread_id]);
$thread = $stmt->fetch();

$posts = $pdo->prepare("SELECT posts.*, users.username FROM posts JOIN users ON posts.user_id = users.id WHERE thread_id = ? ORDER BY created_at ASC");
$posts->execute([$thread_id]);
?>
<!DOCTYPE html>
<html lang="el">
<head>
  <meta charset="UTF-8">
  <title>Thread</title>
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
    <div class="mb-3">
  <a href="forum.php" class="btn btn-outline-secondary">← Επιστροφή στο Forum</a>
</div>

<h2><?php echo htmlspecialchars($thread['title']); ?></h2>
    <p class="text-muted">by <strong><?php echo htmlspecialchars($thread['username']); ?></strong> on <?php echo $thread['created_at']; ?></p>
    <div class="bg-white p-3 border mb-4"><?php echo $thread['content']; ?></div>

    <h4>Απαντήσεις</h4>
    <?php foreach ($posts as $post): ?>
      <div class="bg-white p-3 border mb-3">
        <p><strong><?php echo htmlspecialchars($post['username']); ?>:</strong></p>
        <p><?php echo $post['content']; ?></p>
        <small class="text-muted"><?php echo $post['created_at']; ?></small>
      </div>
    <?php endforeach; ?>

    <?php if (isset($_SESSION['user_id'])): ?>
      <a href="reply.php?thread_id=<?php echo $thread_id; ?>" class="btn btn-primary">Απάντησε</a>
    <?php else: ?>
      <a href="index.php" class="btn btn-warning">Σύνδεση για απάντηση</a>
    <?php endif; ?>
  </div>
</body>
</html>