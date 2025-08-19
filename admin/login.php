<?php
session_start();

// Admin panelga kirish uchun tekshiruv
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

// Loyihadagi barcha PHP fayllarni aniqlash
$files = glob("../*.php");

?>
<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
</head>
<body>
    <h1>Admin Panel</h1>
    <h2>Fayllar Roʻyxati</h2>
    <ul>
        <?php foreach ($files as $file): ?>
            <?php $filename = basename($file); ?>
            <li>
                <a href="edit_page.php?file=<?= urlencode($filename) ?>"><?= htmlspecialchars($filename) ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
