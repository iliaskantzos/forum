<?php session_start(); ?>
<!DOCTYPE html>
<html lang="el">
<head>
  <meta charset="UTF-8">
  <title>Forum Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .form-box {
      background: white;
      padding: 2rem;
      border-radius: 0.75rem;
      box-shadow: 0 0 30px rgba(0,0,0,0.05);
    }
    .modal-content {
      border-radius: 0.75rem;
    }
  </style>
</head>
<body>

  <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="form-box w-100" style="max-width: 400px;">
      <h3 class="text-center mb-4">Σύνδεση στο Forum</h3>
      <form action="login.php" method="POST">
        <div class="mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email" required>
        </div>
        <div class="mb-3">
          <input type="password" name="password" class="form-control" placeholder="Κωδικός" required>
        </div>
        <div class="d-grid">
          <button class="btn btn-primary" type="submit">Σύνδεση</button>
        </div>
      </form>
      <hr>
      <div class="text-center">
        Δεν έχετε λογαριασμό; <a href="#" data-bs-toggle="modal" data-bs-target="#registerModal">Εγγραφή</a>
      </div>
    </div>
  </div>

  <!-- Modal Εγγραφής -->
  <div class="modal fade" id="registerModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <form class="modal-content" action="register.php" method="POST">
        <div class="modal-header">
          <h5 class="modal-title">Εγγραφή Χρήστη</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Κλείσιμο"></button>
        </div>
        <div class="modal-body">
          <div class="mb-2">
            <input type="text" name="username" class="form-control" placeholder="Όνομα χρήστη" required>
          </div>
          <div class="mb-2">
            <input type="email" name="email" class="form-control" placeholder="Email" required>
          </div>
          <div class="mb-2">
            <input type="password" name="password" class="form-control" placeholder="Κωδικός" required>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" data-bs-dismiss="modal">Άκυρο</button>
          <button class="btn btn-success" type="submit">Εγγραφή</button>
        </div>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>