<!-- Halaman Profil Instagram -->
Proyek ini adalah sebuah clone antarmuka pengguna (UI) dari halaman profil Instagram yang dibuat menggunakan HTML, Tailwind CSS, dan JavaScript. Halaman ini dirancang agar sepenuhnya responsif dan dapat menyesuaikan tampilannya untuk perangkat mobile maupun desktop.

 <!-- Fitur Utama -->
Desain Responsif: Tampilan yang berbeda untuk layar mobile dan desktop, memastikan pengalaman pengguna yang baik di semua perangkat.

Header Profil: Menampilkan foto profil, nama pengguna, statistik (post, followers, following), bio, dan tombol aksi.

Story Highlights: Bagian untuk menampilkan sorotan cerita.

Grid Foto: Galeri postingan yang rapi dalam format grid yang responsif.

Efek Interaktif:

Efek hover pada postingan yang menampilkan jumlah likes dan komentar.

Tombol "Follow" yang dapat berubah status menjadi "Following" saat diklik.

Tombol "Load More" dengan animasi sederhana.

<!-- Teknologi yang Digunakan -->
HTML: Untuk struktur dasar halaman web.

Tailwind CSS (via CDN): Untuk semua styling dan layout. Framework ini memungkinkan pembuatan desain kustom dengan cepat menggunakan utility classes.

Bootstrap Icons: Untuk semua ikon yang digunakan di halaman (seperti ikon rumah, simpan, dll.).

JavaScript : Untuk fungsionalitas interaktif sederhana seperti tombol follow dan load more.

 <!-- Cara Menjalankan Proyek -->
 Proyek ini tidak memerlukan proses instalasi atau build yang rumit.

Unduh atau clone semua file.

Pastikan semua gambar yang direferensikan di index.html berada di dalam folder bernama asset/.

Buka file index.html langsung di browser pilihan anda.

<!-- Pertanyaan README -->

<!-- Keputusan Grid dan Gap -->
Mobile (grid-cols-3, gap-1): Tiga kolom adalah standar ideal untuk galeri foto di HP, menyeimbangkan ukuran dan jumlah gambar. Jarak (gap) dibuat kecil agar fokus pada konten visual di layar yang terbatas.

Desktop (lg:grid-cols-4, md:gap-2): Empat kolom lebih cocok untuk layar lebar. Jarak antar gambar ditambah agar tampilan tidak terlihat sesak dan lebih nyaman dipandang.

<!-- Solusi Layout Mobile dengan Tailwind -->
Tailwind memecahkan masalah layout mobile dengan:

Menyembunyikan Elemen: Menggunakan kelas seperti hidden md:block untuk menyembunyikan elemen yang tidak esensial di layar kecil (seperti search bar) demi menghemat ruang.

Mengubah Total Struktur: Membuat dua versi layout berbeda dalam satu HTML (misalnya, satu untuk mobile dengan flex-col, satu untuk desktop dengan md:grid) dan menampilkannya secara bergantian sesuai ukuran layar.

<!-- Kelebihan & Kekurangan: Utility vs Component CSS  -->

Utility Classes:

Kelebihan: Sangat cepat untuk mendesain karena styling langsung di HTML. Tidak perlu pusing memikirkan nama kelas CSS.

Kekurangan: Membuat HTML terlihat berantakan dan terjadi pengulangan kode jika elemen yang sama dipakai berulang kali.

Component CSS:

Kelebihan: HTML terlihat bersih dan mudah di-maintenance (ubah satu kelas CSS akan mengubah semua elemen terkait).

Kekurangan: Proses pengembangan lebih lambat karena harus bolak-balik antara file HTML dan CSS.