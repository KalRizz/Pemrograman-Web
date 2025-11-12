<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek Tahun Kabisat</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Cek Tahun Kabisat</h2>
        
        <form method="POST" action="">
            <div class="form-group">
                <label for="tahun">Masukkan Tahun:</label>
                <input type="number" id="tahun" name="tahun" required 
                       min="1" placeholder="Contoh: 2024">
            </div>
            <button type="submit">Cek Tahun Kabisat</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $tahun = $_POST['tahun'];
            $isKabisat = false;
            
            if ($tahun % 400 == 0) {
                $isKabisat = true;
            } elseif ($tahun % 100 == 0) {
                $isKabisat = false;
            } elseif ($tahun % 4 == 0) {
                $isKabisat = true;
            }
            
            if ($isKabisat) {
                echo "<div class='result kabisat'>";
                echo "🎉 Tahun <strong>$tahun</strong> adalah <strong>TAHUN KABISAT</strong>";
                echo "<br><small>(Februari memiliki 29 hari)</small>";
                echo "</div>";
            } else {
                echo "<div class='result bukan-kabisat'>";
                echo "📅 Tahun <strong>$tahun</strong> adalah <strong>BUKAN TAHUN KABISAT</strong>";
                echo "<br><small>(Februari memiliki 28 hari)</small>";
                echo "</div>";
            }
        }
        ?>
    </div>
</body>
</html>