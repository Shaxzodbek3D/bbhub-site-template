<?php
session_start();

// Faqat adminlar kira olishi kerak
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

// Tanlangan fayl
$file = $_POST['file'] ?? '';
$filePath = "../" . $file;

// Fayl mavjudligini tekshirish
if (!file_exists($filePath)) {
    die("Fayl topilmadi.");
}

// Fayl tarkibini o‘qish
$content = file_get_contents($filePath);

// H1 va H2 o‘zgarishlarini saqlash
if (!empty($_POST['h1s'])) {
    foreach ($_POST['h1s'] as $index => $h1) {
        $content = preg_replace('/<h1>(.*?)<\/h1>/', '<h1>' . htmlspecialchars($h1) . '</h1>', $content, 1);
    }
}
if (!empty($_POST['h2s'])) {
    foreach ($_POST['h2s'] as $index => $h2) {
        $content = preg_replace('/<h2>(.*?)<\/h2>/', '<h2>' . htmlspecialchars($h2) . '</h2>', $content, 1);
    }
}

// Paragraflar va divlarni yangilash
if (!empty($_POST['paragraphs'])) {
    foreach ($_POST['paragraphs'] as $index => $p) {
        $content = preg_replace('/<p>(.*?)<\/p>/', '<p>' . htmlspecialchars($p) . '</p>', $content, 1);
    }
}
if (!empty($_POST['divs'])) {
    foreach ($_POST['divs'] as $index => $div) {
        $content = preg_replace('/<div[^>]*>(.*?)<\/div>/', '<div>' . htmlspecialchars($div) . '</div>', $content, 1);
    }
}

// O‘zgartirilgan tarkibni qayta yozish
file_put_contents($filePath, $content);

header("Location: edit_page.php?file=" . urlencode($file));
exit();
?>
