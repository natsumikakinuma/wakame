<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $hair_color = $_POST['hair_color'];
    $hair_texture = $_POST['hair_texture'];
    $straightening = $_POST['straightening'];
    $straightening_date = !empty($_POST['straightening_date']) ? $_POST['straightening_date'] : null;
    $color = $_POST['color'];
    $color_date = !empty($_POST['color_date']) ? $_POST['color_date'] : null;
    $black_dye = $_POST['black_dye'];
    $black_dye_date = !empty($_POST['black_dye_date']) ? $_POST['black_dye_date'] : null;
    $hairstyle = $_FILES['hairstyle'];

    // プロフィール写真の保存
    $upload_dir = 'uploads/';
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    $hairstyle_path = null;
    if ($hairstyle['error'] == UPLOAD_ERR_OK) {
        $hairstyle_path = $upload_dir . basename($hairstyle['name']);
        if (move_uploaded_file($hairstyle['tmp_name'], $hairstyle_path)) {
            echo '写真アップロード成功<br>';
        } else {
            echo '写真アップロード失敗<br>';
        }
    }

    $stmt = $pdo->prepare('UPDATE profiles SET name = ?, age = ?, gender = ?, hair_color = ?, hair_texture = ?, straightening = ?, straightening_date = ?, color = ?, color_date = ?, black_dye = ?, black_dye_date = ?, hairstyle = ? WHERE user_id = ?');
    if ($stmt->execute([$name, $age, $gender, $hair_color, $hair_texture, $straightening, $straightening_date, $color, $color_date, $black_dye, $black_dye_date, $hairstyle_path, $user_id])) {
        header('Location: home.php');
        exit;
    } else {
        echo 'プロフィールの更新に失敗しました。';
    }
}
?>


