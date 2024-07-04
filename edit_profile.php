<?php
session_start();
include 'db.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!isset($_GET['user_id']) || $_GET['user_id'] != $_SESSION['user_id']) {
    echo 'ユーザーIDが見つかりません。';
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
    <title>プロフィール編集</title>
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
        <h2 id="profileTitle" class="center-text">プロフィール編集</h2>
        <form id="profileForm" action="update_profile.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($user_id); ?>">
            <label for="name" id="nameLabel">名前:</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($profile['name']); ?>" required>

            <label for="age" id="ageLabel">年齢:</label>
            <input type="number" id="age" name="age" value="<?php echo htmlspecialchars($profile['age']); ?>" required>

            <label for="gender" id="genderLabel">性別:</label>
            <select id="gender" name="gender" required>
                <option value="male" <?php echo $profile['gender'] == 'male' ? 'selected' : ''; ?>>男性</option>
                <option value="female" <?php echo $profile['gender'] == 'female' ? 'selected' : ''; ?>>女性</option>
                <option value="other" <?php echo $profile['gender'] == 'other' ? 'selected' : ''; ?>>その他</option>
            </select>

            <label for="hairColor" id="hairColorLabel">髪色:</label>
            <input type="text" id="hairColor" name="hair_color" value="<?php echo htmlspecialchars($profile['hair_color']); ?>" required>

            <label for="hairTexture" id="hairTextureLabel">髪質:</label>
            <select id="hairTexture" name="hair_texture" required>
                <option value="hard" <?php echo $profile['hair_texture'] == 'hard' ? 'selected' : ''; ?>>硬毛</option>
                <option value="normal" <?php echo $profile['hair_texture'] == 'normal' ? 'selected' : ''; ?>>普通</option>
                <option value="soft" <?php echo $profile['hair_texture'] == 'soft' ? 'selected' : ''; ?>>柔毛</option>
            </select>

            <label id="straighteningLabel">縮毛矯正:</label>
            <div class="inline">
                <input type="radio" id="straighteningYes" name="straightening" value="yes" <?php echo $profile['straightening'] == 'yes' ? 'checked' : ''; ?> onclick="toggleDate('straighteningDate', true)" required>
                <label for="straighteningYes" id="straighteningYesLabel">有</label>
                <input type="radio" id="straighteningNo" name="straightening" value="no" <?php echo $profile['straightening'] == 'no' ? 'checked' : ''; ?> onclick="toggleDate('straighteningDate', false)">
                <label for="straighteningNo" id="straighteningNoLabel">無</label>
            </div>
            <input type="date" id="straighteningDate" name="straightening_date" value="<?php echo htmlspecialchars($profile['straightening_date']); ?>" style="<?php echo $profile['straightening'] == 'yes' ? 'display:block;' : 'display:none;'; ?>">

            <label id="colorLabel">カラー:</label>
            <div class="inline">
                <input type="radio" id="colorYes" name="color" value="yes" <?php echo $profile['color'] == 'yes' ? 'checked' : ''; ?> onclick="toggleDate('colorDate', true)" required>
                <label for="colorYes" id="colorYesLabel">有</label>
                <input type="radio" id="colorNo" name="color" value="no" <?php echo $profile['color'] == 'no' ? 'checked' : ''; ?> onclick="toggleDate('colorDate', false)">
                <label for="colorNo" id="colorNoLabel">無</label>
            </div>
            <input type="date" id="colorDate" name="color_date" value="<?php echo htmlspecialchars($profile['color_date']); ?>" style="<?php echo $profile['color'] == 'yes' ? 'display:block;' : 'display:none;'; ?>">

            <label id="blackDyeLabel">黒染め:</label>
            <div class="inline">
                <input type="radio" id="blackDyeYes" name="black_dye" value="yes" <?php echo $profile['black_dye'] == 'yes' ? 'checked' : ''; ?> onclick="toggleDate('blackDyeDate', true)" required>
                <label for="blackDyeYes" id="blackDyeYesLabel">有</label>
                <input type="radio" id="blackDyeNo" name="black_dye" value="no" <?php echo $profile['black_dye'] == 'no' ? 'checked' : ''; ?> onclick="toggleDate('blackDyeDate', false)">
                <label for="blackDyeNo" id="blackDyeNoLabel">無</label>
            </div>
            <input type="date" id="blackDyeDate" name="black_dye_date" value="<?php echo htmlspecialchars($profile['black_dye_date']); ?>" style="<?php echo $profile['black_dye'] == 'yes' ? 'display:block;' : 'display:none;'; ?>">

            <label for="hairstyle" id="hairstyleLabel">現在の髪型:</label>
            <input type="file" id="hairstyle" name="hairstyle">

            <button type="submit" id="saveProfileButton">保存</button>
        </form>
    </div>
    <script src="scripts.js"></script>
</body>
</html>
