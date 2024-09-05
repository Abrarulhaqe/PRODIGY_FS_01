<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $pdo->prepare('INSERT INTO users (username, password) VALUES (?, ?)');
    try {
        $stmt->execute([$username, $hashed_password]);
        header('Location: index.html');
    } catch (Exception $e) {
        echo "Username already taken.";
    }
}
?>