<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Pecahan Uang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 700px;
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
            margin-bottom: 10px;
        }
        .subtitle {
            text-align: center;
            color: #666;
            margin-bottom: 30px;
            font-size: 14px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight: bold;
        }
        input[type="number"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
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
            background-color: #2196F3;
            color: white;
        }
        button[type="submit"]:hover {
            background-color: #0b7dda;
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
            background-color: #e3f2fd;
            border-left: 4px solid #2196F3;
            border-radius: 4px;
        }
        .result h3 {
            margin-top: 0;
            color: #1565c0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #2196F3;
            color: white;
            font-weight: bold;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        .total-row {
            background-color: #bbdefb;
            font-weight: bold;
        }
        .money-icon {
            margin-right: 5px;
        }
        .info-box {
            background-color: #fff3cd;
            border-left: 4px solid #ffc107;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 4px;
        }
        .info-box strong {
            color: #856404;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>💰 Kalkulator Pecahan Uang</h2>
        <p class="subtitle">Hitung jumlah pecahan uang yang diperlukan</p>
        
        <div class="info-box">
            <strong>Pecahan uang yang tersedia:</strong><br>
            Rp 100.000, Rp 50.000, Rp 20.000, Rp 5.000, Rp 100, Rp 50
        </div>
        
        <form method="POST" action="">
            <div class="form-group">
                <label for="jumlah_uang">💵 Jumlah Uang yang Diambil (Rp):</label>
                <input type="number" id="jumlah_uang" name="jumlah_uang" 
                       value="<?php echo isset($_POST['jumlah_uang']) ? $_POST['jumlah_uang'] : '1575250'; ?>" 
                       required min="50" step="50" 
                       placeholder="Contoh: 1575250">
            </div>
            
            <div class="button-group">
                <button type="submit">🧮 Hitung Pecahan</button>
                <button type="reset">🔄 Reset</button>
            </div>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Mengambil data dari form
            $jumlah_uang = intval($_POST['jumlah_uang']);
            $jumlah_awal = $jumlah_uang; // Simpan untuk ditampilkan
            
            // Array pecahan uang dari terbesar ke terkecil
            $pecahan = array(
                1 => 100000,
                2 => 50000,
                3 => 20000,
                4 => 5000,
                5 => 100,
                6 => 50
            );
            
            // Array untuk menyimpan hasil perhitungan
            $hasil = array();
            $total_lembar = 0;
            
            // Menghitung jumlah setiap pecahan
            foreach ($pecahan as $key => $nilai) {
                $jumlah_lembar = floor($jumlah_uang / $nilai);
                $hasil[$nilai] = $jumlah_lembar;
                $jumlah_uang = $jumlah_uang % $nilai;
                $total_lembar += $jumlah_lembar;
            }
            
            // Menampilkan hasil
            echo '<div class="result">';
            echo '<h3>📊 Hasil Perhitungan Pecahan Uang</h3>';
            echo '<p><strong>Jumlah Uang:</strong> Rp ' . number_format($jumlah_awal, 0, ',', '.') . '</p>';
            
            if ($jumlah_uang > 0) {
                echo '<p style="color: #d32f2f;"><strong>⚠️ Sisa uang yang tidak dapat dipecah:</strong> Rp ' . number_format($jumlah_uang, 0, ',', '.') . '</p>';
            }
            
            echo '<table>';
            echo '<tr>';
            echo '<th>💵 Pecahan Uang</th>';
            echo '<th>📄 Jumlah Lembar</th>';
            echo '<th>💰 Total Nilai</th>';
            echo '</tr>';
            
            foreach ($hasil as $nilai => $jumlah) {
                if ($jumlah > 0) {
                    $total_nilai = $nilai * $jumlah;
                    echo '<tr>';
                    echo '<td>Rp ' . number_format($nilai, 0, ',', '.') . '</td>';
                    echo '<td style="text-align: center;">' . $jumlah . ' lembar</td>';
                    echo '<td>Rp ' . number_format($total_nilai, 0, ',', '.') . '</td>';
                    echo '</tr>';
                }
            }
            
            echo '<tr class="total-row">';
            echo '<td><strong>TOTAL</strong></td>';
            echo '<td style="text-align: center;"><strong>' . $total_lembar . ' lembar</strong></td>';
            echo '<td><strong>Rp ' . number_format($jumlah_awal - $jumlah_uang, 0, ',', '.') . '</strong></td>';
            echo '</tr>';
            echo '</table>';
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>