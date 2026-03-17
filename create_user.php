<?php
require_once 'config.php';
$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $role = $_POST["role"];

    $stmt = $pdo->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)");
    if ($stmt->execute([$username, $email, $password, $role])) {
        $message = "Ο χρήστης δημιουργήθηκε επιτυχώς!";
    } else {
        $message = "Προέκυψε σφάλμα κατά τη δημιουργία χρήστη.";
    }
}
?>

<!DOCTYPE html>
<html lang="el">
<head>
    <meta charset="UTF-8">
    <title>Δημιουργία Χρήστη</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Δημιουργία Χρήστη / Διαχειριστή</h2>
<a href="admin_panel.php" class="btn btn-secondary mb-3">← Επιστροφή στο Panel</a>
    <?php if ($message): ?>
        <div class="alert alert-info"><?php echo $message; ?></div>
    <?php endif; ?>
    <form method="POST">
        <div class="mb-3">
            <label class="form-label">Όνομα Χρήστη:</label>
            <input type="text" name="username" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Email:</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Κωδικός:</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Ρόλος:</label>
            <select name="role" class="form-select">
                <option value="user">Χρήστης</option>
                <option value="admin">Διαχειριστής</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Δημιουργία</button>
    </form>
</div>
</body>
</html>
