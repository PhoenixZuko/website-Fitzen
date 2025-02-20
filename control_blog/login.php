<?php
session_start();
require '../config/db.php';

// Verifică dacă utilizatorul este deja autentificat
if (isset($_SESSION['admin_id'])) {
    header("Location: index.php");
    exit();
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (!empty($username) && !empty($password)) {
        // Interoghează baza de date pentru utilizator în tabelul admins
        $query = $pdo->prepare("SELECT id, username, password FROM admins WHERE username = :username OR email = :username");
        $query->execute(['username' => $username]);
        $user = $query->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Verifică parola
            if (password_verify($password, $user['password'])) {
                // Salvează sesiunea pentru admin
                $_SESSION['admin_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                header("Location: index.php");
                exit();
            } else {
                $error = "Parola este incorectă.";
            }
        } else {
            $error = "Nume de utilizator sau email incorect.";
        }
    } else {
        $error = "Toate câmpurile sunt obligatorii.";
    }
}
$query = $pdo->prepare("SELECT id, password FROM admins WHERE username = :username OR email = :username");
$query->execute(['username' => $username]);
$admin = $query->fetch(PDO::FETCH_ASSOC);

if ($admin) {
    if (password_verify($password, $admin['password'])) {
        $_SESSION['admin_id'] = $admin['id'];
        header("Location: index.php");
        exit();
    } else {
        $error = "Parola este incorectă.";
    }
} else {
    $error = "Utilizatorul nu există.";
}

$query = $pdo->prepare("SELECT id, password FROM admins WHERE username = :username OR email = :username");
$query->execute(['username' => $username]);
$admin = $query->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>Admin</b> Panel</a>
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Autentifică-te pentru accesul la panoul admin</p>
                <?php if ($error): ?>
                    <p style="color: red;"><?= htmlspecialchars($error) ?></p>
                <?php endif; ?>
                <form method="POST" action="login.php">
                    <div class="input-group mb-3">
                        <input type="text" name="username" class="form-control" placeholder="Nume de utilizator sau email" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Parolă" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Autentificare</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/dist/js/adminlte.min.js"></script>
</body>
</html>
