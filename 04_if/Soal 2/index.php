<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hitung Gaji Karyawan Honorer</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>💼 Sistem Penggajian Karyawan Honorer</h2>
        <p class="subtitle">Perusahaan XXX</p>
        
        <div class="info-box">
            <h3>📋 Ketentuan Upah:</h3>
            <ul>
                <li>Upah normal: <strong>Rp 2.000/jam</strong></li>
                <li>Jam kerja normal: <strong>48 jam/minggu</strong></li>
                <li>Upah lembur: <strong>Rp 3.000/jam</strong></li>
                <li>Lembur dihitung jika jam kerja > 48 jam</li>
            </ul>
        </div>
        
        <form method="POST" action="">
            <div class="form-group">
                <label for="nama">Nama Karyawan:</label>
                <input type="text" id="nama" name="nama" required 
                       placeholder="Masukkan nama karyawan">
            </div>
            
            <div class="form-group">
                <label for="jam_kerja">Jumlah Jam Kerja (per minggu):</label>
                <input type="number" id="jam_kerja" name="jam_kerja" required 
                       min="0" step="0.5" placeholder="Contoh: 50">
            </div>
            
            <button type="submit">Hitung Gaji</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nama = htmlspecialchars($_POST['nama']);
            $jamKerja = $_POST['jam_kerja'];
            
            // Konstanta
            $UPAH_NORMAL = 2000;
            $UPAH_LEMBUR = 3000;
            $JAM_NORMAL = 48;
            
            // Perhitungan
            $jamNormal = 0;
            $jamLembur = 0;
            $upahNormal = 0;
            $upahLembur = 0;
            $totalUpah = 0;
            
            if ($jamKerja <= $JAM_NORMAL) {
                // Tidak ada lembur
                $jamNormal = $jamKerja;
                $upahNormal = $jamNormal * $UPAH_NORMAL;
                $totalUpah = $upahNormal;
            } else {
                // Lembur
                $jamNormal = $JAM_NORMAL;
                $jamLembur = $jamKerja - $JAM_NORMAL;
                $upahNormal = $jamNormal * $UPAH_NORMAL;
                $upahLembur = $jamLembur * $UPAH_LEMBUR;
                $totalUpah = $upahNormal + $upahLembur;
            }
            
            // Format angka
            $formatUpahNormal = number_format($upahNormal, 0, ',', '.');
            $formatUpahLembur = number_format($upahLembur, 0, ',', '.');
            $formatTotalUpah = number_format($totalUpah, 0, ',', '.');
            
            echo "<div class='result'>";
            echo "<h3>💰 Slip Gaji</h3>";
            echo "<div class='detail-gaji'>";
            echo "<p><strong>Nama Karyawan:</strong> $nama</p>";
            echo "<p><strong>Total Jam Kerja:</strong> $jamKerja jam</p>";
            echo "<hr>";
            
            echo "<div class='breakdown'>";
            echo "<p>🕐 Jam Kerja Normal: $jamNormal jam × Rp 2.000 = <strong>Rp $formatUpahNormal</strong></p>";
            
            if ($jamLembur > 0) {
                echo "<p>⏰ Jam Lembur: $jamLembur jam × Rp 3.000 = <strong>Rp $formatUpahLembur</strong></p>";
            } else {
                echo "<p>⏰ Jam Lembur: Tidak ada lembur</p>";
            }
            
            echo "</div>";
            echo "<hr>";
            echo "<div class='total'>";
            echo "<p><strong>TOTAL UPAH:</strong></p>";
            echo "<p class='total-amount'>Rp $formatTotalUpah</p>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>


