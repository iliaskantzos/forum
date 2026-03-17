<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="el">
<head>
    <meta charset="UTF-8">
    <title>Δημιουργία Νέας Συζήτησης</title>
    <script src="https://cdn.tiny.cloud/1/sybfysvmloldp0h0iqwd9bbf9qsx8ux7h4ktcmetybha15vj/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #f9f9f9;
        }

        .navbar {
            background-color: #1f2327;
            padding: 15px 20px;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-left {
            font-size: 20px;
        }

        .navbar-right a {
            color: #ccc;
            text-decoration: none;
            margin-left: 20px;
        }

        .navbar-right a.logout {
            color: #e74c3c;
        }

        .container {
            max-width: 900px;
            margin: 50px auto;
            background: white;
            padding: 30px;
            border-radius: 6px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button, .back-btn {
            background-color: #0d6efd;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin-bottom: 20px;
        }

        .back-btn {
            background-color: transparent;
            color: #1f2327;
            border: 1px solid #1f2327;
        }

        .back-btn:hover {
            background-color: #1f2327;
            color: white;
        }

    </style>

    <script>
      tinymce.init({
        selector: '#content',
        height: 300,
        plugins: 'link lists code',
        toolbar: 'undo redo | styleselect | bold italic underline | alignleft aligncenter alignright | bullist numlist | code',
        menubar: 'file edit view insert format tools'
      });
    </script>
</head>
<body>
    <div class="navbar">
        <div class="navbar-left">Forum</div>
        <div class="navbar-right">
            <a href="profile.php">Προφίλ</a>
            <a href="logout.php" class="logout">Αποσύνδεση</a>
        </div>
    </div>

    <div class="container">
        <a href="forum.php" class="back-btn">&larr; Επιστροφή στο Forum</a>
        <h2>Δημιουργία νέας συζήτησης</h2>
        <form method="post" action="submit_thread.php">
            <input type="text" name="title" placeholder="Τίτλος" required>
            <textarea id="content" name="content"></textarea>
            <br><br>
            <button type="submit">Δημιουργία</button>
        </form>
    </div>
</body>
</html>
