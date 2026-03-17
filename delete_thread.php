<?php
session_start();
require_once 'config.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

$message = "";

if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
    $thread_id = $_GET['delete'];
    $pdo->prepare("DELETE FROM posts WHERE thread_id = ?")->execute([$thread_id]);
    $stmt = $pdo->prepare("DELETE FROM threads WHERE id = ?");
    if ($stmt->execute([$thread_id])) {
        $message = "Η συζήτηση διαγράφηκε επιτυχώς.";
    } else {
        $message = "Σφάλμα κατά τη διαγραφή.";
    }
}

$threads = $pdo->query("SELECT threads.id, threads.title, users.username FROM threads JOIN users ON threads.user_id = users.id ORDER BY threads.id DESC")->fetchAll();
?>

<!DOCTYPE html>
<html lang="el">
<head>
    <meta charset="UTF-8">
    <title>Διαγραφή Συζητήσεων</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container py-4">

        <!-- Κουμπί Επιστροφή στο Admin Panel -->
        <div class="d-flex justify-content-end mb-3">
            <a href="admin_panel.php" class="btn btn-secondary">← Επιστροφή στο Panel</a>
        </div>

        <h2 class="mb-4">Λίστα Συζητήσεων</h2>
        <?php if ($message) echo "<div class='alert alert-info'>$message</div>"; ?>
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Τίτλος</th>
                    <th>Χρήστης</th>
                    <th>Ενέργεια</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($threads as $thread): ?>
                <tr>
                    <td><?= $thread['id'] ?></td>
                    <td><?= htmlspecialchars($thread['title']) ?></td>
                    <td><?= htmlspecialchars($thread['username']) ?></td>
                    <td>
                        <a href="?delete=<?= $thread['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Είσαι σίγουρος;')">Διαγραφή</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</body>
</html>
