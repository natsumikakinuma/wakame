<?php
session_start();
include 'db.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $pdo->prepare('INSERT INTO users_table (email, password) VALUES (?, ?)');
    if ($stmt->execute([$email, $password])) {
        $user_id = $pdo->lastInsertId();
        $_SESSION['user_id'] = $user_id; // セッションにユーザーIDを保存
        header('Location: profile.php');
        exit;
    } else {
        echo '登録に失敗しました。';
    }
}
?>

