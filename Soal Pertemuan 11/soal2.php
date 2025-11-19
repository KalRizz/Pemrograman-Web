<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pencari Solusi x + y + z = 25</title>
   <link rel="stylesheet" href="style2.css">
</head>
<body>
    <div class="container">
        <h1>🔢 Pencari Solusi Persamaan Linear</h1>
        <div class="equation">x + y + z = 25</div>
        
        <div class="info-box">
            <h3> Ketentuan:</h3>
            <p>
                Mencari semua pasangan nilai x, y, dan z yang memenuhi persamaan <strong>x + y + z = 25</strong>, 
                dimana x, y, dan z adalah <strong>bilangan asli</strong> (bilangan bulat positif ≥ 1).
            </p>
        </div>
        
        <div class="method-box">
            <h3> Metode Perhitungan:</h3>
            <p>
                • Nilai minimum setiap variabel: <code>1</code> (bilangan asli dimulai dari 1)<br>
                • Nilai maksimum setiap variabel: <code>23</code> (karena minimal 2 variabel lain = 1 + 1 = 2)<br>
                • Menggunakan <strong>nested loop 3 tingkat</strong> untuk iterasi semua kemungkinan<br>
                • Formula: <code>z = 25 - x - y</code>, kemudian cek apakah z ≥ 1
            </p>
        </div>
        
        <?php
        $target = 25;
        $solusi = array();
        $jumlah_solusi = 0;
        $min = 1;
        $max = $target - 2; // 23
        
        for ($x = $min; $x <= $max; $x++) {
            for ($y = $min; $y <= $max; $y++) {
                $z = $target - $x - $y;
                if ($z >= $min && $z <= $max) {
                    $solusi[] = array('x' => $x, 'y' => $y, 'z' => $z);
                    $jumlah_solusi++;
                }
            }
        }
        
        
        $waktu_eksekusi = 0;
        $start_time = microtime(true);
        $end_time = microtime(true);
        $waktu_eksekusi = ($end_time - $start_time) * 1000; 
        ?>
        
        <div class="stats-box">
            <div class="stat-card">
                <h3>Total Solusi</h3>
                <div class="number"><?php echo $jumlah_solusi; ?></div>
            </div>
            <div class="stat-card">
                <h3>Range Nilai</h3>
                <div class="number"><?php echo $min . ' - ' . $max; ?></div>
            </div>
            <div class="stat-card">
                <h3>Target Jumlah</h3>
                <div class="number"><?php echo $target; ?></div>
            </div>
        </div>
        
        <h2 style="color: #1e3c72; margin-bottom: 15px;"> Daftar Semua Solusi:</h2>
        
        <div class="solutions-container">
            <?php
            if ($jumlah_solusi > 0) {
                foreach ($solusi as $index => $s) {
                    $nomor = $index + 1;
                    echo "<div class='solution-item'>";
                    echo "<strong>#{$nomor}:</strong> ";
                    echo "x = {$s['x']}, y = {$s['y']}, z = {$s['z']}";
                    
                    $jumlah = $s['x'] + $s['y'] + $s['z'];
                    if ($jumlah == $target) {
                        echo " ✓";
                    }
                    echo "</div>";
                }
            } else {
                echo "<div class='loading'>Tidak ada solusi yang ditemukan.</div>";
            }
            ?>
        </div>
        
        <div class="result-summary">
             Jumlah Penyelesaian: <?php echo $jumlah_solusi; ?> pasangan
        </div>
            </code>
        </div>
    </div>
</body>
</html>