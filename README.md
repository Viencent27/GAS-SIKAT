<h1 align="center">Galeri Inovasi Masyarakat (GAS-SIKAT)</h1>

## Capstone Team C523-PR088
- Anatasya Lingkanwene Ering - UI/UX - (F245XA018) - Universitas Kristen Satya Wacana
- Dhimas Jatiwibowo - Back-End - (F193YB090) - Universitas Bina Sarana Informatika
- Lintang Yandi Nugraha - Front-End - (F008YB294) - Universitas Gadjah Mada
- Sukron Hadi Prasojo - Front-End - (F347YB153) - Universitas AKI
- Viencent - Back-End - (S014YB481) - Universitas Udayana

## Deploy Site
- Deploy Site: https://gas-sikat.biz.id
- Repository: https://github.com/Viencent27/GAS-SIKAT

## Fitur Aplikasi
### Tampilan Guest
- Halaman Beranda: Memberikan informasi tentang website GAS-SIKAT
- Fitur Daftar Inovasi: Menyajikan semua inovasi yang sudah diunggah oleh Inovator
- Fitur Detail Inovasi: Memperlihatkan informasi lengkap dari setiap inovasi
- Fitur Mencari Inovasi: Untuk mencari inovasi berdasarkan keyword yang diinginkan
- Fitur Membagikan Inovasi: Untuk membagikan inovasi menggunakan link
- Fitur Register: Memperbolehkan pengguna/guest mendaftar sebagai user/inovator untuk menambahkan inovasi
### Tampilan User (Inovator)
- Fitur Login: Memperbolehkan pengguna/guest masuk sebagai user
- Fitur Upload Inovasi: Untuk mengunggah inovasi yang dimiliki ke GAS-SIKAT
- Fitur Inovasi Saya: Memperlihatkan inovasi yang sudah diunggah oleh user tersebut saja
- Fitur Edit dan Hapus Inovasi: Memperbolehkan user mengelola postingan inovasi miliknya
### Tampilan Admin
- Fitur Login: Memperbolehkan pengguna/guest masuk sebagai user
- Fitur Daftar Pengguna: Membantu admin mengelola daftar akun user GAS-SIKAT
- Fitur Registrasi Admin: Mengizinkan admin untuk mengubah role user biasa menjadi role admin
- Fitur Edit dan Hapus Inovasi: Memperbolehkan admin mengelola postingan inovasi yang telah diunggah oleh semua user

## Screenshot Website


## User Guide (Cara Instalasi Proyek Laravel GAS-SIKAT)
### Persiapan
Sebelum memulai instalasi, pastikan bahwa sistem Anda telah memenuhi persyaratan berikut:
1. PHP telah diinstal (disarankan versi PHP 7.4 atau lebih baru)
2. Composer telah diinstal (https://getcomposer.org/)
3. Laravel CLI telah diinstal (jalankan `composer global require laravel/installer` jika belum diinstal)

### Langkah-langkah Instalasi
1. Buka terminal atau command prompt lalu jalankan perintah `git clone https://github.com/Viencent27/GAS-SIKAT` untuk meng-clone repositori proyek Laravel kami di GitHub
2. Buka folder proyek yang sudah di-clone sesuai direktori menggunakan text editor (kami menyarankan untuk menggunakan VS Code)
3. Buka terminal lagi dan jalankan perintah `composer install`
4. Salin file `.env.example` menjadi `.env` dengan menjalankan perintah `cp .env.example .env`
5. Generate APP_KEY baru dengan menjalankan perintah `php artisan key:generate`
6. Konfigurasi file `.env` di teks editor lalu sesuaikan pengaturan database dan data akun admin pertama
7. Migrasi dan Seeder Database dengan menjalankan perintah `php artisan migrate --seed`
8. Jalankan di server lokal dengan perintah `php artisan serve`
9. Proyek Laravel GAS-SIKAT sekarang sudah dapat anda akses melalui http://localhost:8000 pada browser

## User Guide (Cara Upload Inovasi di GAS-SIKAT)
1. Silahkan login melalui tautan berikut https://gas-sikat.biz.id/login. Jika belum memiliki akun silahkan registrasi terlebih dahulu
2. Jika sudah login maka sekarang Anda dapat mengakses menu Upload Inovasi. Kemudian isi form sesuai dengan data inovasi Anda dan pilih tombol Tambah
3. Ketika berhasil maka Anda akan mendapatkan notifikasi sukses. Jika anda ingin mengeceknya anda dapat menuju ke halaman Inovasi Saya
4. Anda sudah berhasil menambahkan inovasi di website GAS-SIKAT. Anda juga bisa memanfaatkan fitur edit dan hapus dari setiap postingan inovasi milik Anda dengan menuju ke halaman Detail Inovasi

## User Guide (Cara Login untuk Admin)
1. Proses login untuk admin sama seperti user biasa, namun untuk mendapatkan akses sebagai admin Anda perlu meminta super-admin untuk menjadikan akun anda sebagai role admin
2. Jika Anda sudah mendapatkan role admin maka Anda akan dapat mengakses halaman Daftar Pengguna untuk melakukan manajemen semua akun user dan admin. Anda juga dapat mengubah role user biasa menjadi admin
3. Anda dapat menggunakan fitur edit dan hapus untuk seluruh data inovasi yang telah diunggah oleh user di GAS-SIKAT