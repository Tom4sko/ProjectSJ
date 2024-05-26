<?php
    include 'database.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register-email'])) {
        $name = $_POST['register-name'];
        $email = $_POST['register-email'];
        $password = $_POST['register-password'];
        $passwordRe = $_POST['register-password-re'];

        if ($password !== $passwordRe) {
            die('Passwords do not match.');
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $pdo->prepare('INSERT INTO users (name, email, password) VALUES (?, ?, ?)');
        $stmt->execute([$name, $email, $hashedPassword]);

        header('Location: ../index.php');
        exit();
    }
?>