<?php
header('Content-Type: application/json'); // JSON formatida javob qaytarish
header('Access-Control-Allow-Origin: *'); // CORS uchun, har qanday domendan kirishga ruxsat berish. Xavfsizlik uchun faqat o'z domeningizni yozgan ma'qul.

$url = 'https://www.spot.uz/'; // Yangiliklar manbasi Spot.uz

// cURL yordamida veb-sahifa kontentini olish
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // Redirectlarni kuzatish
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36'); // Brauzer sifatida tanilish
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // SSL sertifikatini tekshirmaslik (test uchun, productionda tavsiya etilmaydi)
$htmlContent = curl_exec($ch);
$error = curl_error($ch);
curl_close($ch);

if ($error) {
    echo json_encode(['error' => 'cURL Error: ' . $error]);
    exit;
}

if (empty($htmlContent)) {
    echo json_encode(['error' => 'Sahifa kontenti bo\'sh yoki yuklanmadi.']);
    exit;
}

// DOMDocument yordamida HTMLni tahlil qilish
$dom = new DOMDocument();
// HTMLning to'g'ri tahlil qilinishi uchun xatolarni bostiramiz
@$dom->loadHTML($htmlContent); 
$xpath = new DOMXPath($dom);

$news = [];

// Spot.uz saytidagi yangiliklar elementlarining XPath yo'llari
// Bu selektorlar Spot.uz ning hozirgi HTML tuzilmasiga qarab yozilgan.
// Sayt dizayni o'zgarganda bu selektorlar ham yangilanishi kerak.

// Asosiy yangiliklar kartochkalarini topishga harakat qilamiz
$newsElements = $xpath->query('//div[contains(@class, "grid-view__item")]');

// Agar asosiy grid item topilmasa, boshqa variantlarni sinashimiz mumkin
if ($newsElements->length === 0) {
    $newsElements = $xpath->query('//div[contains(@class, "post-card")]');
}

foreach ($newsElements as $element) {
    // Har bir element ichidan sarlavha, havola, rasm va matnni topish
    $titleNode = $xpath->query('.//h2[contains(@class, "post-card__title")]/a', $element)->item(0) ?: 
                 $xpath->query('.//h2[contains(@class, "item__title")]/a', $element)->item(0);
    
    $linkNode = $titleNode; // Havola odatda sarlavha linki bilan bir xil

    $imageNode = $xpath->query('.//img[contains(@class, "post-card__img")]', $element)->item(0) ?:
                 $xpath->query('.//img[contains(@class, "item__img")]', $element)->item(0);
    
    $descriptionNode = $xpath->query('.//p[contains(@class, "post-card__lead")]', $element)->item(0) ?:
                       $xpath->query('.//p[contains(@class, "item__lead")]', $element)->item(0);

    // Agar asosiy elementlar topilmasa, bu yangilikni o'tkazib yuboramiz
    if (!$titleNode || !$linkNode) { 
        continue;
    }

    $title = trim($titleNode->textContent);
    $link = $linkNode->getAttribute('href');
    $image = $imageNode ? ($imageNode->getAttribute('data-src') ?: $imageNode->getAttribute('src')) : 'images/default-news.jpg'; // data-src yoki src dan olish
    $description = $descriptionNode ? trim($descriptionNode->textContent) : substr($title, 0, 150) . '...'; // Agar matn topilmasa, sarlavhadan qisqartma

    // Havola va rasm yo'llarini to'liq qilish (agar ular nisbiy yo'l bo'lsa)
    if ($link && !filter_var($link, FILTER_VALIDATE_URL)) {
        $link = rtrim($url, '/') . '/' . ltrim($link, '/');
    }
    if ($image && !filter_var($image, FILTER_VALIDATE_URL)) {
        $image = rtrim($url, '/') . '/' . ltrim($image, '/');
    }
    // Spot.uz dagi ba'zi rasmlar "https://storage.kun.uz" dan keladi, ular uchun base URL kerak emas
    if (strpos($image, 'storage.kun.uz') !== false || strpos($image, 'cdn.spot.uz') !== false) {
        // To'liq URL, o'zgarishsiz qoldiramiz
    } elseif ($image && !filter_var($image, FILTER_VALIDATE_URL)) {
        $image = rtrim($url, '/') . '/' . ltrim($image, '/');
    }

    $news[] = [
        'title' => $title,
        'link' => $link,
        'image' => $image,
        'description' => $description
    ];

    if (count($news) >= 4) { // Faqat oxirgi 4 ta yangilikni olamiz
        break;
    }
}

// Agar hech qanday yangilik topilmasa (yuqoridagi selektorlar o'zgargan bo'lsa)
if (empty($news)) {
    echo json_encode(['error' => 'Yangiliklar topilmadi. Selektorlar eskirgan bo\'lishi mumkin.']);
    exit;
}

echo json_encode($news);
?>