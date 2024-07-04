<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user_id'];

    $stmt = $pdo->prepare('DELETE FROM profiles WHERE user_id = ?');
    if ($stmt->execute([$user_id])) {
        echo 'プロフィールが削除されました。';
        header('Location: home.php');
        exit;
    } else {
        echo 'プロフィールの削除に失敗しました。';
    }
}
?>
