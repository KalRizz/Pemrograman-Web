<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Bunga Tabungan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h2 {
            color: #333;
            text-align: center;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
            font-weight: bold;
        }
        input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
        }
        .button-group {
            margin-top: 20px;
            display: flex;
            gap: 10px;
        }
        button {
            flex: 1;
            padding: 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
        }
        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
        }
        button[type="submit"]:hover {
            background-color: #45a049;
        }
        button[type="reset"] {
            background-color: #f44336;
            color: white;
        }
        button[type="reset"]:hover {
            background-color: #da190b;
        }
        .result {
            margin-top: 30px;
            padding: 20px;
            background-color: #e8f5e9;
            border-left: 4px solid #4CAF50;
            border-radius: 4px;
        }
        .result h3 {
            margin-top: 0;
            color: #2e7d32;
        }
        .detail {
            margin: 10px 0;
            line-height: 1.6;
        }
        .highlight {
            font-weight: bold;
            color: #1b5e20;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Kalkulator Bunga Tabungan Bank</h2>
        
        <form method="POST" action="">
            <div class="form-group">
                <label for="saldo_awal">Saldo Awal (Rp):</label>
                <input type="number" id="saldo_awal" name="saldo_awal" 
                       value="<?php echo isset($_POST['saldo_awal']) ? $_POST['saldo_awal'] : '1000000'; ?>" 
                       required min="0" step="1000">
            </div>
            
            <div class="form-group">
                <label for="bunga">Bunga Per Bulan (%):</label>
                <input type="number" id="bunga" name="bunga" 
                       value="<?php echo isset($_POST['bunga']) ? $_POST['bunga'] : '0.25'; ?>" 
                       required min="0" step="0.01">
            </div>
            
            <div class="form-group">
                <label for="lama_bulan">Lama Menabung (Bulan):</label>
                <input type="number" id="lama_bulan" name="lama_bulan" 
                       value="<?php echo isset($_POST['lama_bulan']) ? $_POST['lama_bulan'] : '11'; ?>" 
                       required min="1">
            </div>
            
            <div class="button-group">
                <button type="submit">Hitung Saldo</button>
                <button type="reset">Reset</button>
            </div>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Mengambil data dari form
            $saldo_awal = floatval($_POST['saldo_awal']);
            $bunga_persen = floatval($_POST['bunga']);
            $lama_bulan = intval($_POST['lama_bulan']);
            
            // Menghitung bunga per bulan
            $bunga_decimal = $bunga_persen / 100;
            
            // Menghitung total bunga
            $total_bunga = $saldo_awal * $bunga_decimal * $lama_bulan;
            
            // Menghitung saldo akhir
            $saldo_akhir = $saldo_awal + $total_bunga;
            
            // Menampilkan hasil
            echo '<div class="result">';
            echo '<h3>Hasil Perhitungan</h3>';
            echo '<div class="detail">';
            echo '<strong>Saldo Awal:</strong> Rp ' . number_format($saldo_awal, 0, ',', '.') . '<br>';
            echo '<strong>Bunga Per Bulan:</strong> ' . $bunga_persen . '% (' . $bunga_decimal . ')<br>';
            echo '<strong>Lama Menabung:</strong> ' . $lama_bulan . ' bulan<br>';
            echo '<strong>Total Bunga:</strong> Rp ' . number_format($total_bunga, 0, ',', '.') . '<br>';
            echo '<hr style="margin: 15px 0; border: none; border-top: 1px solid #4CAF50;">';
            echo '<span class="highlight">Saldo Akhir: Rp ' . number_format($saldo_akhir, 0, ',', '.') . '</span>';
            echo '</div>';
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>