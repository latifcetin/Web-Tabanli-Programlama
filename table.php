<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f9;
            color: #333;
        }

        h1 {
            color: #444;
            text-align: center;
        }

        form {
            margin: 20px 0;
            padding: 20px;
            border: 1px solid #ddd;
            background-color: #fff;
            border-radius: 8px;
            max-width: 400px;
            margin-left: auto;
            margin-right: auto;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        table {
            margin: 20px auto;
            border-collapse: collapse;
            width: 80%;
            background-color: #fff;
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .tek-sayilar {
            margin: 20px auto;
            padding: 10px;
            border: 1px solid #ddd;
            background-color: #fff;
            border-radius: 8px;
            max-width: 400px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Rastgele Tablo Oluşturucu</h1>

    <div class="tek-sayilar">
        <?php
        echo "<strong>Tek Sayılar:</strong><br>";
        for ($i = 0; $i <= 100; $i++) {
            if ($i % 2 == 0) {
                continue;
            } else {
                echo "$i<br>";
            }
        }
        ?>
    </div>

    <form method="post">
        <label for="satir_sayi">Satır Sayısı:</label>
        <input type="number" name="satir_sayi" id="satir_sayi" min="1" required>

        <label for="sutun_sayi">Sütun Sayısı:</label>
        <input type="number" name="sutun_sayi" id="sutun_sayi" min="1" required>

        <input type="submit" value="Tabloyu Oluştur">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $satir_sayi = $_POST['satir_sayi'];
        $sutun_sayi = $_POST['sutun_sayi'];

        echo "<table>";
        echo "<tr>";
        for ($j = 0; $j < $sutun_sayi; $j++) {
            echo "<th>Sütun " . ($j + 1) . "</th>";
        }
        echo "</tr>";

        for ($i = 0; $i < $satir_sayi; $i++) {
            echo "<tr>";
            for ($j = 0; $j < $sutun_sayi; $j++) {
                $random = rand(1, 100);
                echo "<td>$random</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
    ?>
</body>
</html>
