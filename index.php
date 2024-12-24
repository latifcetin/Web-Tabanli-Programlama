<!DOCTYPE html>
<head>
    <title>Dosya İşlemleri</title>
</head>
<body>
    <form action="" method="post">
        <label for="message">Text girin:</label><br>
        <textarea id="message" name="message" rows="4" cols="50"></textarea><br><br>
        <button type="submit" name="action" value="save">1. Mesajı kaydet</button>
        <button type="submit" name="action" value="clear">2. Sil</button>
        <button type="submit" name="action" value="random">3. Rastgele Satır</button>
    </form>
    <hr>

    <?php
    $filename = "data.txt";

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $action = $_POST['action'];

        if ($action === "save") {
            $message = $_POST['message'] ?? '';
            if (!empty(trim($message))) {
                file_put_contents($filename, $message . PHP_EOL, FILE_APPEND);
                echo "<p>Mesaj dosyaya kaydedildi!</p>";
            } else {
                echo "<p>Lütfen bir mesaj girin.</p>";
            }
        }

        elseif ($action === "clear") {
            if (file_exists($filename)) {
                file_put_contents($filename, "");
                echo "<p>Dosya temizlendi!</p>";
            } else {
                echo "<p>Dosya bulunamadı.</p>";
            }
        }

        elseif ($action === "random") {
            if (file_exists($filename)) {
                $lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                if (!empty($lines)) {
                    $randomLine = $lines[array_rand($lines)];
                    echo "<p>Rastgele Satır: <strong>$randomLine</strong></p>";
                } else {
                    echo "<p>Dosya boş!</p>";
                }
            } else {
                echo "<p>Dosya bulunamadı.</p>";
            }
        }
    }
    ?>
</body>
</html>
