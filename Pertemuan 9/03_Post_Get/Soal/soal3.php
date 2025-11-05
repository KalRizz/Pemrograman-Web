<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Mahasiswa Baru - Universitas X</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
            min-height: 100vh;
            padding: 20px;
        }
        
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
            overflow: hidden;
        }
        
        .header {
            background: linear-gradient(135deg, #0575E6 0%, #00F260 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }
        
        .header h1 {
            font-size: 28px;
            margin-bottom: 10px;
        }
        
        .header p {
            font-size: 14px;
            opacity: 0.9;
        }
        
        .form-content {
            padding: 40px;
        }
        
        .form-group {
            margin-bottom: 25px;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: 600;
            font-size: 14px;
        }
        
        label .required {
            color: #e74c3c;
        }
        
        input[type="text"],
        textarea {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 14px;
            transition: all 0.3s;
            font-family: inherit;
        }
        
        input[type="text"]:focus,
        textarea:focus {
            outline: none;
            border-color: #11998e;
            box-shadow: 0 0 0 3px rgba(17, 153, 142, 0.1);
        }
        
        textarea {
            resize: vertical;
            min-height: 100px;
        }
        
        .date-group {
            display: flex;
            gap: 10px;
        }
        
        .date-group select {
            flex: 1;
            padding: 12px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 14px;
            background-color: white;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .date-group select:focus {
            outline: none;
            border-color: #11998e;
            box-shadow: 0 0 0 3px rgba(17, 153, 142, 0.1);
        }
        
        .radio-group {
            display: flex;
            gap: 30px;
            margin-top: 10px;
        }
        
        .radio-option {
            display: flex;
            align-items: center;
            cursor: pointer;
        }
        
        .radio-option input[type="radio"] {
            width: 20px;
            height: 20px;
            margin-right: 8px;
            cursor: pointer;
            accent-color: #11998e;
        }
        
        .radio-option label {
            margin: 0;
            cursor: pointer;
            font-weight: normal;
        }
        
        .button-group {
            display: flex;
            gap: 15px;
            margin-top: 35px;
        }
        
        button {
            flex: 1;
            padding: 15px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        button[type="submit"] {
            background: linear-gradient(135deg, #0575E6 0%, #00F260 100%);
            color: white;
        }
        
        button[type="submit"]:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(5, 117, 230, 0.4);
        }
        
        button[type="reset"] {
            background: linear-gradient(135deg, #06beb6 0%, #48b1bf 100%);
            color: white;
        }
        
        button[type="reset"]:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(6, 190, 182, 0.4);
        }
        
        .result {
            background-color: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
        }
        
        .result-header {
            background: linear-gradient(135deg, #0575E6 0%, #00F260 100%);
            color: white;
            padding: 30px;
            text-align: center;
            border-radius: 15px 15px 0 0;
            margin: -40px -40px 30px -40px;
        }
        
        .result-header h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }
        
        .welcome-message {
            background: linear-gradient(135deg, #d4fc79 0%, #96e6a1 100%);
            padding: 20px;
            border-left: 4px solid #11998e;
            border-radius: 8px;
            margin-bottom: 30px;
        }
        
        .welcome-message h3 {
            color: #0a6b62;
            margin-bottom: 5px;
        }
        
        .welcome-message p {
            color: #0a6b62;
        }
        
        .data-table {
            background-color: #f0f9ff;
            border-radius: 8px;
            overflow: hidden;
            border: 2px solid #b3e5db;
        }
        
        .data-row {
            display: flex;
            padding: 15px 20px;
            border-bottom: 1px solid #b3e5db;
        }
        
        .data-row:last-child {
            border-bottom: none;
        }
        
        .data-row:nth-child(even) {
            background-color: #e0f7f4;
        }
        
        .data-label {
            flex: 0 0 180px;
            font-weight: 600;
            color: #0575E6;
        }
        
        .data-value {
            flex: 1;
            color: #0a6b62;
        }
        
        .back-button {
            margin-top: 30px;
            text-align: center;
        }
        
        .back-button a {
            display: inline-block;
            padding: 12px 30px;
            background: linear-gradient(135deg, #0575E6 0%, #00F260 100%);
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s;
        }
        
        .back-button a:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(5, 117, 230, 0.4);
        }
        
        @media (max-width: 600px) {
            .date-group {
                flex-direction: column;
            }
            
            .radio-group {
                flex-direction: column;
                gap: 15px;
            }
            
            .data-row {
                flex-direction: column;
                gap: 5px;
            }
            
            .data-label {
                flex: none;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Mengambil data dari form
            $nama = htmlspecialchars($_POST['nama']);
            $tempat_lahir = htmlspecialchars($_POST['tempat_lahir']);
            $tanggal = $_POST['tanggal'];
            $bulan = $_POST['bulan'];
            $tahun = $_POST['tahun'];
            $alamat = htmlspecialchars($_POST['alamat']);
            $jenis_kelamin = $_POST['jenis_kelamin'];
            $asal_sekolah = htmlspecialchars($_POST['asal_sekolah']);
            $nilai_uan = htmlspecialchars($_POST['nilai_uan']);
            
            // Array nama bulan
            $nama_bulan = array(
                1 => "Januari", 2 => "Februari", 3 => "Maret", 
                4 => "April", 5 => "Mei", 6 => "Juni",
                7 => "Juli", 8 => "Agustus", 9 => "September",
                10 => "Oktober", 11 => "November", 12 => "Desember"
            );
            
            $tanggal_lahir = $tanggal . " " . $nama_bulan[$bulan] . " " . $tahun;
            $jk_text = ($jenis_kelamin == "pria") ? "Pria" : "Wanita";
            
            // Menampilkan hasil
            ?>
            <div class="result">
                <div class="result-header">
                    <h2>🎓 Pendaftaran Berhasil!</h2>
                    <p>Universitas X</p>
                </div>
                
                <div class="welcome-message">
                    <h3>Terima kasih <?php echo $nama; ?> sudah mengisi form pendaftaran.</h3>
                    <p>Data Anda telah berhasil kami terima dan akan segera diproses.</p>
                </div>
                
                <div class="data-table">
                    <div class="data-row">
                        <div class="data-label">Nama Lengkap</div>
                        <div class="data-value">: <?php echo $nama; ?></div>
                    </div>
                    <div class="data-row">
                        <div class="data-label">Tempat Lahir</div>
                        <div class="data-value">: <?php echo $tempat_lahir; ?></div>
                    </div>
                    <div class="data-row">
                        <div class="data-label">Tanggal Lahir</div>
                        <div class="data-value">: <?php echo $tanggal_lahir; ?></div>
                    </div>
                    <div class="data-row">
                        <div class="data-label">Alamat Rumah</div>
                        <div class="data-value">: <?php echo nl2br($alamat); ?></div>
                    </div>
                    <div class="data-row">
                        <div class="data-label">Jenis Kelamin</div>
                        <div class="data-value">: <?php echo $jk_text; ?></div>
                    </div>
                    <div class="data-row">
                        <div class="data-label">Asal Sekolah</div>
                        <div class="data-value">: <?php echo $asal_sekolah; ?></div>
                    </div>
                    <div class="data-row">
                        <div class="data-label">Nilai UAN</div>
                        <div class="data-value">: <?php echo $nilai_uan; ?></div>
                    </div>
                </div>
                
                <div class="back-button">
                    <a href="<?php echo $_SERVER['PHP_SELF']; ?>">← Kembali ke Form</a>
                </div>
            </div>
            <?php
        } else {
            // Menampilkan form
            ?>
            <div class="header">
                <h1>🎓 Pendaftaran Mahasiswa Baru</h1>
                <p>Universitas Muhammdiyah - Tahun Akademik 2025/2026</p>
            </div>
            
            <div class="form-content">
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="form-group">
                        <label for="nama">Nama Lengkap <span class="required">*</span></label>
                        <input type="text" id="nama" name="nama" required placeholder="Masukkan nama lengkap Anda">
                    </div>
                    
                    <div class="form-group">
                        <label for="tempat_lahir">Tempat Lahir <span class="required">*</span></label>
                        <input type="text" id="tempat_lahir" name="tempat_lahir" required placeholder="Contoh: Samarinda">
                    </div>
                    
                    <div class="form-group">
                        <label>Tanggal Lahir <span class="required">*</span></label>
                        <div class="date-group">
                            <select name="tanggal" required>
                                <option value="">Tanggal</option>
                                <?php
                                for ($i = 1; $i <= 31; $i++) {
                                    echo "<option value='$i'>$i</option>";
                                }
                                ?>
                            </select>
                            
                            <select name="bulan" required>
                                <option value="">Bulan</option>
                                <?php
                                $bulan = array(
                                    1 => "Januari", 2 => "Februari", 3 => "Maret", 
                                    4 => "April", 5 => "Mei", 6 => "Juni",
                                    7 => "Juli", 8 => "Agustus", 9 => "September",
                                    10 => "Oktober", 11 => "November", 12 => "Desember"
                                );
                                foreach ($bulan as $key => $value) {
                                    echo "<option value='$key'>$value</option>";
                                }
                                ?>
                            </select>
                            
                            <select name="tahun" required>
                                <option value="">Tahun</option>
                                <?php
                                for ($i = 2007; $i >= 1980; $i--) {
                                    echo "<option value='$i'>$i</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="alamat">Alamat Rumah <span class="required">*</span></label>
                        <textarea id="alamat" name="alamat" required placeholder="Masukkan alamat lengkap Anda"></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label>Jenis Kelamin <span class="required">*</span></label>
                        <div class="radio-group">
                            <div class="radio-option">
                                <input type="radio" id="pria" name="jenis_kelamin" value="pria" required>
                                <label for="pria">Pria</label>
                            </div>
                            <div class="radio-option">
                                <input type="radio" id="wanita" name="jenis_kelamin" value="wanita" required>
                                <label for="wanita">Wanita</label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="asal_sekolah">Asal Sekolah <span class="required">*</span></label>
                        <input type="text" id="asal_sekolah" name="asal_sekolah" required placeholder="Contoh: SMK Negeri 20 Samarinda">
                    </div>
                    
                    <div class="form-group">
                        <label for="nilai_uan">Nilai UAN <span class="required">*</span></label>
                        <input type="text" id="nilai_uan" name="nilai_uan" required placeholder="Contoh: 80.0">
                    </div>
                    
                    <div class="button-group">
                        <button type="submit">📝 Daftar Sekarang</button>
                        <button type="reset">🔄 Reset Form</button>
                    </div>
                </form>
            </div>
            <?php
        }
        ?>
    </div>
</body>
</html>