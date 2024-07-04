<?php
session_start();
include 'db.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!isset($_SESSION['user_id'])) {
    echo 'ユーザーIDが見つかりません。';
    exit;
}

$user_id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>プロフィール作成</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="header">
        <h1>WAKAME</h1>
    </div>
    <div class="container">
        <div class="language-switch">
            <button onclick="setLanguage('ja')">日本語</button>
            <button onclick="setLanguage('en')">English</button>
        </div>
        <h2 id="profileTitle" class="center-text">プロフィール作成</h2>
        <form id="profileForm" action="save_profile.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($user_id); ?>">
            <label for="name" id="nameLabel">名前:</label>
            <input type="text" id="name" name="name" required>

            <label for="age" id="ageLabel">年齢:</label>
            <input type="number" id="age" name="age" required>

            <label for="gender" id="genderLabel">性別:</label>
            <select id="gender" name="gender" required>
                <option value="male">男性</option>
                <option value="female">女性</option>
                <option value="other">その他</option>
            </select>

            <label for="hairColor" id="hairColorLabel">髪色:</label>
            <input type="text" id="hairColor" name="hair_color" required>

            <label for="hairTexture" id="hairTextureLabel">髪質:</label>
            <select id="hairTexture" name="hair_texture" required>
                <option value="hard">硬毛</option>
                <option value="normal">普通</option>
                <option value="soft">柔毛</option>
            </select>

            <label id="straighteningLabel">縮毛矯正:</label>
            <div class="inline">
                <input type="radio" id="straighteningYes" name="straightening" value="yes" onclick="toggleDate('straighteningDate', true)" required>
                <label for="straighteningYes" id="straighteningYesLabel">有</label>
                <input type="radio" id="straighteningNo" name="straightening" value="no" onclick="toggleDate('straighteningDate', false)">
                <label for="straighteningNo" id="straighteningNoLabel">無</label>
            </div>
            <input type="date" id="straighteningDate" name="straightening_date" style="display:none;">

            <label id="colorLabel">カラー:</label>
            <div class="inline">
                <input type="radio" id="colorYes" name="color" value="yes" onclick="toggleDate('colorDate', true)" required>
                <label for="colorYes" id="colorYesLabel">有</label>
                <input type="radio" id="colorNo" name="color" value="no" onclick="toggleDate('colorDate', false)">
                <label for="colorNo" id="colorNoLabel">無</label>
            </div>
            <input type="date" id="colorDate" name="color_date" style="display:none;">

            <label id="blackDyeLabel">黒染め:</label>
            <div class="inline">
                <input type="radio" id="blackDyeYes" name="black_dye" value="yes" onclick="toggleDate('blackDyeDate', true)" required>
                <label for="blackDyeYes" id="blackDyeYesLabel">有</label>
                <input type="radio" id="blackDyeNo" name="black_dye" value="no" onclick="toggleDate('blackDyeDate', false)">
                <label for="blackDyeNo" id="blackDyeNoLabel">無</label>
            </div>
            <input type="date" id="blackDyeDate" name="black_dye_date" style="display:none;">

            <label for="hairstyle" id="hairstyleLabel">現在の髪型:</label>
            <input type="file" id="hairstyle" name="hairstyle">

            <button type="submit" id="saveProfileButton">保存</button>
        </form>
    </div>
    <script src="scripts.js"></script>
</body>
</html>
