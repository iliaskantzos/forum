
<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="el">
<head>
  <meta charset="UTF-8">
  <title>Επεξεργασία Προφίλ</title>
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
  <h2>Επεξεργασία προφίλ</h2>
  <p>(π.χ. αλλαγή email ή κωδικού)</p>
  <p class="text-muted">* Αυτή η λειτουργία βρίσκεται υπό ανάπτυξη</p>
</div>
</body>
</html>
