<!-- Halaman Profil Instagram  -->
Proyek ini adalah clone antarmuka pengguna (UI) dari halaman profil Instagram. Dibuat dengan fokus pada desain yang bersih dan responsif menggunakan Bootstrap 5 dan CSS kustom.

<!-- Fitur Utama -->
Desain Responsif: Tampilan dioptimalkan untuk perangkat seluler, tablet, dan desktop menggunakan sistem grid Bootstrap.

Header Profil Dinamis: Layout header berubah secara signifikan antara tampilan seluler dan desktop untuk pengalaman pengguna yang lebih baik.

Galeri Foto: Grid foto yang rapi dengan efek hover yang menampilkan statistik singkat.

Elemen Interaktif: Tombol "Follow" yang dapat berubah menjadi "Following" dan tombol "Load More" dengan animasi sederhana, semuanya ditangani dengan JavaScript.

<!-- Teknologi yang Digunakan -->
HTML: Untuk struktur dasar web.

Bootstrap 5: Digunakan untuk layout utama, sistem grid, dan komponen dasar.

Bootstrap Icons: Untuk semua ikon yang digunakan di seluruh halaman.

CSS Kustom: Untuk memberikan gaya visual yang spesifik seperti skema warna, ukuran, dan efek hover, agar sesuai dengan tampilan Instagram.

JavaScript: Untuk menambahkan interaktivitas pada tombol.

<!-- Cara Menjalankan  -->
Unduh atau clone repositori ini.

Pastikan semua gambar berada di dalam folder asset.

Buka file index.html di browser Anda. Tidak diperlukan server atau proses build.

<!-- Pertanyaan README -->

<!-- Konfigurasi kolom (col) dipilih berdasarkan prinsip pemanfaatan ruang layar dan keterbacaan konten. -->

Mobile (col-12, col-sm-6): Di layar terkecil, kolom dibuat 100% lebar (col-12) agar konten tidak sempit. Saat sedikit lebih lebar (sm), dua kolom (col-sm-6) digunakan agar lebih banyak konten terlihat tanpa mengorbankan ukuran gambar.

Tablet (col-md-4): Tiga kolom (col-md-4) adalah tata letak yang seimbang untuk tablet, menampilkan cukup banyak item secara horizontal.

Desktop (col-lg-3, col-xl-2): Dengan ruang yang melimpah, empat hingga enam kolom digunakan untuk mengurangi scrolling vertikal dan menyajikan lebih banyak konten sekaligus.

<!-- Aksesibilitas Tombol di Mobile -->

Tombol "Follow" dan lainnya tetap mudah dijangkau di mobile karena penempatan strategis dan desain yang adaptif.

Posisi Prioritas: Tombol-tombol tersebut diletakkan tepat di bawah informasi utama (nama pengguna), yang merupakan area yang pertama kali dilihat dan dijangkau jari pengguna.

Pembagian Ruang Otomatis: Kelas Bootstrap seperti col-12 dan col-sm-auto memastikan bahwa jika ruang tidak cukup, grup tombol akan secara otomatis turun ke baris baru. Ini mencegah tombol menjadi terlalu kecil, berdempetan, atau terpotong.

Hierarki Visual: Tombol "Follow" diberi warna primer (btn-ig-primary) yang mencolok, membuatnya menjadi call-to-action (CTA) yang paling jelas dan mudah ditemukan.

<!-- Potensi Masalah Jika Postingan 50+ dan Solusinya -->

Jika postingan bertambah banyak, akan muncul dua masalah utama: kinerja halaman dan pengalaman pengguna.

Masalah Potensial:

Waktu Muat Lambat: Memuat 50+ gambar sekaligus akan membuat halaman menjadi sangat berat dan lambat saat pertama kali dibuka.

Scrolling Melelahkan: Pengguna harus melakukan scroll yang sangat panjang untuk melihat semua konten, yang bisa membosankan.

Bagaimana Grid Mengatasinya:
Solusinya adalah tidak memuat semua postingan sekaligus. Pendekatan yang sudah ada dengan tombol "Load More" adalah kuncinya.

Paginasi (Pagination): Awalnya, hanya 12 postingan pertama yang ditampilkan. Saat pengguna mengklik "Load More", 12 postingan berikutnya akan dimuat menggunakan JavaScript tanpa perlu me-refresh seluruh halaman. Ini menjaga halaman tetap ringan dan cepat.

Lazy Loading: Untuk lebih mengoptimalkan, teknik lazy loading bisa diterapkan. Gambar di luar layar pandang tidak akan dimuat sampai pengguna scroll ke dekatnya. Ini secara drastis mengurangi waktu muat awal halaman.