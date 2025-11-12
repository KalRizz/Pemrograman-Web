<!-- File: index.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hitung Gaji Karyawan Berdasarkan Golongan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>💼 Sistem Penggajian Karyawan</h2>
        <p class="subtitle">Perusahaan XXX - Berdasarkan Golongan</p>
        
        <div class="info-box">
            <h3>📋 Ketentuan Upah Per Golongan:</h3>
            <table class="tabel-golongan">
                <tr>
                    <th>Golongan</th>
                    <th>Upah/Jam Normal</th>
                </tr>
                <tr>
                    <td>A</td>
                    <td>Rp 4.000</td>
                </tr>
                <tr>
                    <td>B</td>
                    <td>Rp 5.000</td>
                </tr>
                <tr>
                    <td>C</td>
                    <td>Rp 6.000</td>
                </tr>
                <tr>
                    <td>D</td>
                    <td>Rp 7.500</td>
                </tr>
            </table>
            <p style="margin-top: 10px;"><strong>📌 Catatan:</strong></p>
            <ul>
                <li>Jam kerja normal: <strong>48 jam/minggu</strong></li>
                <li>Upah lembur (semua golongan): <strong>Rp 3.000/jam</strong></li>
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
                <label for="golongan">Golongan Karyawan:</label>
                <select id="golongan" name="golongan" required>
                    <option value="">-- Pilih Golongan --</option>
                    <option value="A">Golongan A (Rp 4.000/jam)</option>
                    <option value="B">Golongan B (Rp 5.000/jam)</option>
                    <option value="C">Golongan C (Rp 6.000/jam)</option>
                    <option value="D">Golongan D (Rp 7.500/jam)</option>
                </select>
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
            $golongan = $_POST['golongan'];
            $jamKerja = $_POST['jam_kerja'];
            
            // Konstanta
            $UPAH_LEMBUR = 3000;
            $JAM_NORMAL = 48;
            
            // Tentukan upah per jam berdasarkan golongan
            $upahPerJam = 0;
            switch ($golongan) {
                case 'A':
                    $upahPerJam = 4000;
                    break;
                case 'B':
                    $upahPerJam = 5000;
                    break;
                case 'C':
                    $upahPerJam = 6000;
                    break;
                case 'D':
                    $upahPerJam = 7500;
                    break;
            }
            
            // Perhitungan
            $jamNormal = 0;
            $jamLembur = 0;
            $upahNormal = 0;
            $upahLembur = 0;
            $totalUpah = 0;
            
            if ($jamKerja <= $JAM_NORMAL) {
                // Tidak ada lembur
                $jamNormal = $jamKerja;
                $upahNormal = $jamNormal * $upahPerJam;
                $totalUpah = $upahNormal;
            } else {
                // Ada lembur
                $jamNormal = $JAM_NORMAL;
                $jamLembur = $jamKerja - $JAM_NORMAL;
                $upahNormal = $jamNormal * $upahPerJam;
                $upahLembur = $jamLembur * $UPAH_LEMBUR;
                $totalUpah = $upahNormal + $upahLembur;
            }
            
            // Format angka
            $formatUpahPerJam = number_format($upahPerJam, 0, ',', '.');
            $formatUpahNormal = number_format($upahNormal, 0, ',', '.');
            $formatUpahLembur = number_format($upahLembur, 0, ',', '.');
            $formatTotalUpah = number_format($totalUpah, 0, ',', '.');
            
            echo "<div class='result'>";
            echo "<h3>💰 Slip Gaji Karyawan</h3>";
            echo "<div class='detail-gaji'>";
            echo "<p><strong>Nama Karyawan:</strong> $nama</p>";
            echo "<p><strong>Golongan:</strong> $golongan</p>";
            echo "<p><strong>Upah Per Jam:</strong> Rp $formatUpahPerJam</p>";
            echo "<p><strong>Total Jam Kerja:</strong> $jamKerja jam</p>";
            echo "<hr>";
            
            echo "<div class='breakdown'>";
            echo "<h4>📊 Rincian Upah:</h4>";
            echo "<p>🕐 Jam Kerja Normal: $jamNormal jam × Rp $formatUpahPerJam = <strong>Rp $formatUpahNormal</strong></p>";
            
            if ($jamLembur > 0) {
                echo "<p>⏰ Jam Lembur: $jamLembur jam × Rp 3.000 = <strong>Rp $formatUpahLembur</strong></p>";
            } else {
                echo "<p>⏰ Jam Lembur: Tidak ada lembur</p>";
            }
            
            echo "</div>";
            echo "<hr>";
            echo "<div class='total'>";
            echo "<p><strong>TOTAL UPAH DITERIMA:</strong></p>";
            echo "<p class='total-amount'>Rp $formatTotalUpah</p>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>
