<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header("Location: index.php");
  exit;
}
$thread_id = $_GET['thread_id'];
?>
<!DOCTYPE html>
<html lang="el">
<head>
  <meta charset="UTF-8">
  <title>Απάντηση</title>
  <script src="https://cdn.tiny.cloud/1/sybfysvmloldp0h0iqwd9bbf9qsx8ux7h4ktcmetybha15vj/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
  <script>
    tinymce.init({
      selector: '#reply_content',
      plugins: 'link image code',
      toolbar: 'undo redo | bold italic underline | alignleft aligncenter alignright | code',
    });
  </script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      padding-top: 70px;
    }
    .navbar-nav {
      margin-left: auto;
    }
    .nav-link.logout {
      color: red !important;
    }
  </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container-fluid">
    <span class="navbar-brand">Forum</span>
    <div class="navbar-nav ms-auto">
      <a class="nav-link" href="profile.php">Προφίλ</a>
      <a class="nav-link logout" href="logout.php">Αποσύνδεση</a>
    </div>
  </div>
</nav>

<!-- ΚΟΥΜΠΙ ΕΠΙΣΤΡΟΦΗΣ -->
<div class="container mt-3">
  <a href="forum.php" class="btn btn-outline-secondary mb-4">← Επιστροφή στο Forum</a>

  <h3>Απάντηση</h3>
  <form action="submit_reply.php" method="POST">
    <input type="hidden" name="thread_id" value="<?php echo $thread_id; ?>">
    <textarea id="reply_content" name="content" class="form-control mb-3" rows="10"></textarea>
    <button class="btn btn-success">Αποστολή</button>
  </form>
</div>

</body>
</html>
