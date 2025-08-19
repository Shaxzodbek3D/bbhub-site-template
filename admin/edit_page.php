<?php
session_start();

// Faqat adminlar kira oladi
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

// Tanlangan fayl
$file = $_GET['file'] ?? '';
$filePath = "../" . $file;

// Fayl mavjudligini tekshirish
if (!file_exists($filePath)) {
    die("Fayl topilmadi.");
}

// Faylni o‘qish
$content = file_get_contents($filePath);

// HTML tarkibidagi matnlarni topish
preg_match_all('/<h1>(.*?)<\/h1>/', $content, $h1Matches);
preg_match_all('/<h2>(.*?)<\/h2>/', $content, $h2Matches);
preg_match_all('/<p>(.*?)<\/p>/', $content, $pMatches);
preg_match_all('/<div[^>]*>(.*?)<\/div>/', $content, $divMatches);
preg_match_all('/<img[^>]+src="([^"]+)"/', $content, $imgMatches);

?>
<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($file) ?> - Tahrirlash</title>
</head>
<body>
    <h1><?= htmlspecialchars($file) ?> - Tahrirlash</h1>
    <form action="save_change.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="file" value="<?= htmlspecialchars($file) ?>">

        <h2>H1 Yozuvlari</h2>
        <?php foreach ($h1Matches[1] as $index => $h1): ?>
            <input type="text" name="h1s[<?= $index ?>]" value="<?= htmlspecialchars($h1) ?>"><br>
        <?php endforeach; ?>

        <h2>H2 Yozuvlari</h2>
        <?php foreach ($h2Matches[1] as $index => $h2): ?>
            <input type="text" name="h2s[<?= $index ?>]" value="<?= htmlspecialchars($h2) ?>"><br>
        <?php endforeach; ?>

        <h2>Paragraflar</h2>
        <?php foreach ($pMatches[1] as $index => $p): ?>
            <textarea name="paragraphs[<?= $index ?>]"><?= htmlspecialchars($p) ?></textarea><br>
        <?php endforeach; ?>

        <h2>Div Yozuvlari</h2>
        <?php foreach ($divMatches[1] as $index => $div): ?>
            <textarea name="divs[<?= $index ?>]"><?= htmlspecialchars($div) ?></textarea><br>
        <?php endforeach; ?>

        <h2>Rasmlar</h2>
        <?php foreach ($imgMatches[1] as $index => $img): ?>
            <input type="file" name="images[<?= $index ?>]"><br>
            <p>Joriy rasm: <?= htmlspecialchars($img) ?></p>
        <?php endforeach; ?>

        <button type="submit">Saqlash</button>
    </form>
</body>
</html>
