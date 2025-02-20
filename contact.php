<?php
require 'config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Preia datele din formular
    $name = htmlspecialchars(trim($_POST['name'])) ?? '';
    $email = htmlspecialchars(trim($_POST['email'])) ?? '';
    $message = htmlspecialchars(trim($_POST['message'])) ?? '';
    $ip_address = $_SERVER['REMOTE_ADDR'];

    // Validează datele
    if (!empty($name) && !empty($email) && !empty($message) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Pregătește interogarea SQL
        $stmt = $pdo->prepare("
            INSERT INTO contact_messages (name, email, message, ip_address)
            VALUES (:name, :email, :message, :ip_address)
        ");

        // Rulează interogarea
        $stmt->execute([
            ':name' => $name,
            ':email' => $email,
            ':message' => $message,
            ':ip_address' => $ip_address,
        ]);

        // Redirecționează sau afișează un mesaj de succes
        header("Location: contact.php?success=1");
        exit();
    } else {
        $error = "Toate câmpurile sunt obligatorii și email-ul trebuie să fie valid!";
    }
}
?>

<!DOCTYPE HTML>
<html lang="ro">
<head>
    <title>Contact - FitZen.ro</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <meta name="description" content="Contactează echipa FitZen.ro pentru colaborări, sugestii și alte informații.">
    <link rel="stylesheet" href="assets/css/main.css" />
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/browser.min.js"></script>
    <script src="assets/js/breakpoints.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>
    <style>
        form {
            max-width: 600px;
            margin: 20px auto;
        }
        form div {
            margin-bottom: 15px;
        }
        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }
        input, textarea, button {
            width: 100%;
            padding: 10px;
            font-size: 16px;
        }
        button {
            background-color: #1E90FF;
            color: white;
            border: none;
            cursor: pointer;
            font-weight: bold;
        }
        button:hover {
            background-color: #155d9c;
        }
        .error {
            color: red;
            font-weight: bold;
            margin-bottom: 15px;
        }
        .success-message {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            padding: 15px;
            border-radius: 5px;
            margin: 15px 0;
            text-align: center;
            font-size: 1.2em;
            font-weight: bold;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .success-message span {
            font-size: 1.5em;
            display: inline-block;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <!-- Wrapper -->
    <div id="wrapper">

        <!-- Header -->
        <?php include 'header.php'; ?>

        <!-- Main -->
        <div id="main">
            <article class="post">
                <header>
                    <div class="title">
                        <h2>Contact</h2>
                        <p>Ne bucurăm să primim mesaje pentru critici, corectări sau sugestii! Acceptăm cu drag propuneri de articole, iar dacă ești pasionat și consideri că ai talent, îți putem crea un cont pentru a scrie pe blogul nostru.</p>
                    </div>
                </header>
                <?php if (!empty($error)): ?>
                    <p class="error"><?= htmlspecialchars($error) ?></p>
                <?php endif; ?>
                <?php if (isset($_GET['success'])): ?>
                    <div class="success-message">
                        <span>🎉</span><br>
                        Mesajul tău a fost trimis cu succes! Mulțumim! 🌟
                    </div>
                <?php endif; ?>
                <form method="POST" action="contact.php">
                    <div>
                        <label for="name">Nume</label>
                        <input type="text" id="name" name="name" placeholder="Numele tău" required />
                    </div>
                    <div>
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Email-ul tău" required />
                    </div>
                    <div>
                        <label for="message">Mesaj</label>
                        <textarea id="message" name="message" rows="6" placeholder="Scrie mesajul tău aici..." required></textarea>
                    </div>
                    <div>
                        <button type="submit">Trimite</button>
                    </div>
                </form>
            </article>
        </div>

        <!-- Footer -->
        <?php include 'footer.php'; ?>

    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.body.classList.remove('is-preload');
        });
    </script>
</body>
</html>
