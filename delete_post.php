<?php
require_once 'config.php';

session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: index.php");
    exit();
}

try {
    $stmt = $pdo->query("SELECT posts.id, posts.content, users.username 
                         FROM posts 
                         JOIN users ON posts.user_id = users.id 
                         ORDER BY posts.id DESC");
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Σφάλμα βάσης δεδομένων: " . $e->getMessage();
    exit();
}
?>

<!DOCTYPE html>
<html lang="el">
<head>
    <meta charset="UTF-8">
    <title>Διαγραφή Αναρτήσεων</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-4">
    <h2>Διαγραφή Αναρτήσεων</h2>
    <a href="admin_panel.php" class="btn btn-secondary mb-3">← Επιστροφή στο Panel</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Περιεχόμενο</th>
                <th>Χρήστης</th>
                <th>Ενέργεια</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($posts as $post): ?>
                <tr>
                    <td><?= $post['id'] ?></td>
                    <td><?= html_entity_decode($post['content']) ?></td>
                    <td><?= htmlspecialchars($post['username']) ?></td>
                    <td>
                        <a href="delete_post_action.php?id=<?= $post['id'] ?>" class="btn btn-danger btn-sm"
                           onclick="return confirm('Είστε σίγουρος ότι θέλετε να διαγράψετε αυτήν την ανάρτηση;')">
                           Διαγραφή
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
