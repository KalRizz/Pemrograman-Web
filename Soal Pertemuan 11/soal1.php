<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Saldo Tabungan Bank X</title>
   <link rel="stylesheet" href="style1.css">
</head>
<body>
    <div class="container">
        <h1> Kalkulator Saldo Tabungan</h1>
        <p class="subtitle">Bank X - Simulasi Perhitungan Saldo</p>
        
        <div class="info-box">
            <h3> Ketentuan:</h3>
            <ul>
                <li>Bunga 3% per tahun jika saldo < Rp 1.100.000</li>
                <li>Bunga 4% per tahun jika saldo ≥ Rp 1.100.000</li>
                <li>Biaya administrasi Rp 9.000 per bulan</li>
                <li>Bunga dihitung dari saldo terakhir</li>
            </ul>
        </div>
        
        <form method="POST" action="">
            <div class="form-group">
                <label for="saldo_awal">Saldo Awal (Rp)</label>
                <input type="number" id="saldo_awal" name="saldo_awal" 
                       value="<?php echo isset($_POST['saldo_awal']) ? $_POST['saldo_awal'] : '1000000'; ?>" 
                       min="0" step="1000" required>
            </div>
            
            <div class="form-group">
                <label for="jangka_waktu">Jangka Waktu (Bulan)</label>
                <input type="number" id="jangka_waktu" name="jangka_waktu" 
                       value="<?php echo isset($_POST['jangka_waktu']) ? $_POST['jangka_waktu'] : '12'; ?>" 
                       min="1" max="120" required>
            </div>
            
            <button type="submit">Hitung Saldo Akhir</button>
        </form>
        
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $saldo_awal = floatval($_POST['saldo_awal']);
            $jangka_waktu = intval($_POST['jangka_waktu']);
            $biaya_admin = 9000;
            $batas_saldo = 1100000;
            
            // Array untuk menyimpan detail per bulan
            $detail_bulanan = array();
            
            $saldo = $saldo_awal;
            $total_bunga = 0;
            $total_admin = 0;
            
            // Perhitungan per bulan
            for ($bulan = 1; $bulan <= $jangka_waktu; $bulan++) {
                $saldo_awal_bulan = $saldo;
                
                // Tentukan suku bunga
                if ($saldo < $batas_saldo) {
                    $suku_bunga_tahunan = 0.03;
                } else {
                    $suku_bunga_tahunan = 0.04;
                }
                
                // Hitung bunga bulanan
                $suku_bunga_bulanan = $suku_bunga_tahunan / 12;
                $bunga = $saldo * $suku_bunga_bulanan;
                
                // Tambahkan bunga ke saldo
                $saldo += $bunga;
                
                // Kurangi biaya admin
                $saldo -= $biaya_admin;
                
                // Simpan detail
                $detail_bulanan[] = array(
                    'bulan' => $bulan,
                    'saldo_awal' => $saldo_awal_bulan,
                    'bunga_persen' => $suku_bunga_tahunan * 100,
                    'bunga' => $bunga,
                    'admin' => $biaya_admin,
                    'saldo_akhir' => $saldo
                );
                
                $total_bunga += $bunga;
                $total_admin += $biaya_admin;
            }
            
            $saldo_akhir = $saldo;
            
            // Format rupiah
            function formatRupiah($angka) {
                return 'Rp ' . number_format($angka, 0, ',', '.');
            }
            ?>
            
            <div class="result-box">
                <h2> Hasil Perhitungan</h2>
                
                <div class="result-item">
                    <span>Saldo Awal:</span>
                    <span><?php echo formatRupiah($saldo_awal); ?></span>
                </div>
                
                <div class="result-item">
                    <span>Jangka Waktu:</span>
                    <span><?php echo $jangka_waktu; ?> bulan</span>
                </div>
                
                <div class="result-item">
                    <span>Total Bunga Diterima:</span>
                    <span style="color: green;"><?php echo formatRupiah($total_bunga); ?></span>
                </div>
                
                <div class="result-item">
                    <span>Total Biaya Admin:</span>
                    <span style="color: red;"><?php echo formatRupiah($total_admin); ?></span>
                </div>
                
                <div class="result-item">
                    <span>Saldo Akhir:</span>
                    <span><?php echo formatRupiah($saldo_akhir); ?></span>
                </div>
                
                <div class="detail-table">
                    <h3 style="margin: 20px 0 10px 0; color: #333;">Detail Per Bulan:</h3>
                    <table>
                        <thead>
                            <tr>
                                <th>Bulan</th>
                                <th class="currency">Saldo Awal</th>
                                <th>Bunga</th>
                                <th class="currency">Bunga (Rp)</th>
                                <th class="currency">Admin (Rp)</th>
                                <th class="currency">Saldo Akhir</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($detail_bulanan as $detail): ?>
                            <tr>
                                <td><?php echo $detail['bulan']; ?></td>
                                <td class="currency"><?php echo formatRupiah($detail['saldo_awal']); ?></td>
                                <td><?php echo $detail['bunga_persen']; ?>%</td>
                                <td class="currency" style="color: green;"><?php echo formatRupiah($detail['bunga']); ?></td>
                                <td class="currency" style="color: red;"><?php echo formatRupiah($detail['admin']); ?></td>
                                <td class="currency"><strong><?php echo formatRupiah($detail['saldo_akhir']); ?></strong></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            
        <?php } ?>
    </div>
</body>
</html>