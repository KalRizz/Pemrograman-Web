<!-- File: index.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jumlah Hari dalam Bulan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>📅 Informasi Bulan Saat Ini</h2>
        
        <?php
        // Mendapatkan bulan dan tahun saat ini
        $bulanAngka = date('n'); // 1-12
        $tahun = date('Y');
        $namaBulan = date('F'); // Nama bulan dalam bahasa Inggris
        $tanggal = date('d F Y');
        
        // Nama bulan dalam bahasa Indonesia
        $namaBulanIndo = '';
        $jumlahHari = 0;
        
        // Menggunakan SWITCH untuk menentukan nama bulan dan jumlah hari
        switch ($bulanAngka) {
            case 1:
                $namaBulanIndo = 'Januari';
                $jumlahHari = 31;
                break;
            
            case 2:
                $namaBulanIndo = 'Februari';
                // Cek tahun kabisat untuk Februari
                if (($tahun % 400 == 0) || ($tahun % 4 == 0 && $tahun % 100 != 0)) {
                    $jumlahHari = 29; // Tahun kabisat
                } else {
                    $jumlahHari = 28; // Tahun biasa
                }
                break;
            
            case 3:
                $namaBulanIndo = 'Maret';
                $jumlahHari = 31;
                break;
            
            case 4:
                $namaBulanIndo = 'April';
                $jumlahHari = 30;
                break;
            
            case 5:
                $namaBulanIndo = 'Mei';
                $jumlahHari = 31;
                break;
            
            case 6:
                $namaBulanIndo = 'Juni';
                $jumlahHari = 30;
                break;
            
            case 7:
                $namaBulanIndo = 'Juli';
                $jumlahHari = 31;
                break;
            
            case 8:
                $namaBulanIndo = 'Agustus';
                $jumlahHari = 31;
                break;
            
            case 9:
                $namaBulanIndo = 'September';
                $jumlahHari = 30;
                break;
            
            case 10:
                $namaBulanIndo = 'Oktober';
                $jumlahHari = 31;
                break;
            
            case 11:
                $namaBulanIndo = 'November';
                $jumlahHari = 30;
                break;
            
            case 12:
                $namaBulanIndo = 'Desember';
                $jumlahHari = 31;
                break;
            
            default:
                $namaBulanIndo = 'Tidak diketahui';
                $jumlahHari = 0;
                break;
        }
        
        // Cek apakah tahun kabisat
        $isKabisat = false;
        if (($tahun % 400 == 0) || ($tahun % 4 == 0 && $tahun % 100 != 0)) {
            $isKabisat = true;
        }
        ?>
        
        <div class="info-card">
            <div class="calendar-icon">📆</div>
            <h3>Tanggal Hari Ini</h3>
            <p class="current-date"><?php echo $tanggal; ?></p>
        </div>
        
        <div class="result-box">
            <h3>🔍 Informasi Detail:</h3>
            <div class="detail-item">
                <span class="label">Bulan:</span>
                <span class="value"><?php echo $namaBulanIndo; ?></span>
            </div>
            
            <div class="detail-item">
                <span class="label">Tahun:</span>
                <span class="value"><?php echo $tahun; ?></span>
            </div>
            
            <div class="detail-item">
                <span class="label">Status Tahun:</span>
                <span class="value">
                    <?php 
                    if ($isKabisat) {
                        echo '<span class="badge kabisat">Tahun Kabisat</span>';
                    } else {
                        echo '<span class="badge normal">Tahun Biasa</span>';
                    }
                    ?>
                </span>
            </div>
            
            <hr>
            
            <div class="highlight-box">
                <p class="highlight-text">Jumlah Hari di Bulan <?php echo $namaBulanIndo; ?>:</p>
                <p class="days-count"><?php echo $jumlahHari; ?> Hari</p>
            </div>
            
            <?php if ($bulanAngka == 2): ?>
                <div class="note">
                    <p><strong>💡 Catatan:</strong></p>
                    <p>Bulan Februari memiliki <?php echo $jumlahHari; ?> hari karena tahun <?php echo $tahun; ?> 
                    <?php echo $isKabisat ? 'adalah tahun kabisat' : 'bukan tahun kabisat'; ?>.</p>
                </div>
            <?php endif; ?>
        </div>
        
        <div class="info-additional">
            <h4>📖 Informasi Lengkap Bulan:</h4>
            <table class="month-table">
                <tr>
                    <th>Bulan</th>
                    <th>Jumlah Hari</th>
                </tr>
                <?php
                $allMonths = [
                    1 => ['nama' => 'Januari', 'hari' => 31],
                    2 => ['nama' => 'Februari', 'hari' => $isKabisat ? 29 : 28],
                    3 => ['nama' => 'Maret', 'hari' => 31],
                    4 => ['nama' => 'April', 'hari' => 30],
                    5 => ['nama' => 'Mei', 'hari' => 31],
                    6 => ['nama' => 'Juni', 'hari' => 30],
                    7 => ['nama' => 'Juli', 'hari' => 31],
                    8 => ['nama' => 'Agustus', 'hari' => 31],
                    9 => ['nama' => 'September', 'hari' => 30],
                    10 => ['nama' => 'Oktober', 'hari' => 31],
                    11 => ['nama' => 'November', 'hari' => 30],
                    12 => ['nama' => 'Desember', 'hari' => 31]
                ];
                
                foreach ($allMonths as $num => $data) {
                    $currentClass = ($num == $bulanAngka) ? 'class="current-month"' : '';
                    echo "<tr $currentClass>";
                    echo "<td>{$data['nama']}</td>";
                    echo "<td>{$data['hari']} hari</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </div>
</body>
</html>

