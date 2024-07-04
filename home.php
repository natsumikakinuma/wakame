<?php
session_start();
include 'db.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// ログインユーザーの情報を取得
if (!isset($_SESSION['user_id'])) {
    echo 'ユーザーがログインしていません。';
    exit;
}

$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare('SELECT * FROM profiles WHERE user_id = ?');
$stmt->execute([$user_id]);
$profile = $stmt->fetch();

if (!$profile) {
    echo 'プロフィールが見つかりません。';
    exit;
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ホームページ</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="header">
        <h1>WAKAME</h1>
    </div>
    <div class="container">
        <div class="profile-link">
            <a href="edit_profile.php?user_id=<?php echo htmlspecialchars($user_id); ?>"><?php echo htmlspecialchars($profile['name']); ?></a>
        </div>
        <form action="delete_profile.php" method="post">
            <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($user_id); ?>">
            <button type="submit">プロフィール削除</button>
        </form>
    </div>
</body>
</html>
