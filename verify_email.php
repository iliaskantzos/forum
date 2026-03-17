<?php
require 'config.php';
if (isset($_GET['token'])) {
    $stmt = $pdo->prepare("UPDATE users SET is_verified = 1 WHERE verification_token = ?");
    $stmt->execute([$_GET['token']]);
    echo "Ο λογαριασμός σας επιβεβαιώθηκε!";
} else {
    echo "Μη έγκυρο token.";
}
?>