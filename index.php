<!DOCTYPE html>
<html>
<head>
    <title>Tablo Oluştur</title>
</head>
<body>
    <form method="post">
        <label for="rows">Satır Sayısı:</label>
        <input type="number" id="rows" name="rows" min="1" required>
        <br><br>
        <label for="columns">Sütun Sayısı:</label>
        <input type="number" id="columns" name="columns" min="1" required>
        <br><br>
        <button type="submit">Tablo Oluştur</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $rows = $_POST['rows']; 
        $columns = $_POST['columns']; 
        
        echo "<h3>Oluşturulan Tablo:</h3>";
        echo "<table border='1' style='border-collapse: collapse; text-align: center;'>";
        
        for ($i = 0; $i < $rows; $i++) {
            echo "<tr>"; 
            for ($j = 0; $j < $columns; $j++) {
                $randomNumber = rand(1, 100);
                echo "<td>$randomNumber</td>"; 
            }
            echo "</tr>";
        }
        
        echo "</table>";
    }
    ?>
</body>
</html>
