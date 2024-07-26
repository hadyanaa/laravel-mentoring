<p align="center"><a href="https://laravel.com" target="_blank"><img src="/public/template/img/bkpk-sq.png" width="400" alt="BKPK Logo"></a></p>

## About Mentoris

Mentoris merupakan produk skripsi dari saya pribadi (Hadyan Abdul Aziz) dengan judul Rancang Bangun Sistem Informasi Presensi Kegiatan Mentoring di
STT NF Menggunakan Framework Laravel. Aplikasi ini masih dalam pengembangan, harapannya anda dapat membantu proses pengembangan ini dan juga kedepannya jika ada tambahan fitur baru, saya sangat terbuka untuk menerima. Karena produk ini adalah produk amal yang semoga dapat membantu kegiatan mentoring di STTNF.


## Clone Project To Your Local

Siapapun dapat membantu melakukan perbaikan pada aplikasi ini. Oleh karena itu, berikut adalah panduan untuk mengcloning repository ini ke dalam development local kalian:

### Untuk Cloning Repository pada lokal kalian, ikuti langkah berikut:
- gunakan perintah `git clone [link repository]`
- setelah itu pindah ke direktori dengan `cd [nama direktori project]`
- install dependencies laravel menggunakan composer dengan perintah `composer install`
- salin file .env.example dan buat file .env di lokal kalian
- gunakan perintah `php artisan key:generate` untuk menghasilkan APP_KEY unik yang diperlukan untuk enkripsi data di aplikasi
- setelah itu, buka xampp, jalankan module mysql dan klik tombol admin. Pergi ke web localhost/phpmyadmin dan buatlah database baru di lokal anda dengan nama database 'mentoris' atau sesuaikan dengan env yang sudah dikonfigurasikan sebelumnya.
- perhatikan pada bagian DB_DATABASE di file .env, pastikan nama nya sama dengan nama database yang baru dibuat di phpmyadmin. Jika tidak mengubah-ubah .env.example seharusnya nama tersebut adalah 'mentoris'.
- Jalankan migrasi untuk generate tabel-tabel yang sudah disusun di laravel ke dalam database yang sudah disiapkan dengan perintah `php artisan migrate`
- Jalankan server development dengan perintah `php artisan serve`

Tada~, anda telah berhasil melakukan cloning repository ini dan dapat menjalankannya di lokal anda untuk keperluan development.

## Langkah Membuat Akun Admin/Akun Pertama

Proyek ini memang masih dalam proses pengembangan. Terdapat keterbatasan juga yaitu tidak dapat melakukan create akun pada aplikasi (memang sengaja). Untuk itu, perlu dilakukan create akun admin yang pertama. Selanjutnya admin dapat membuat akun untuk mentor secara mandiri.

### Untuk membuat akun admin ikuti langkah berikut:
- gunakan perintah `php artisan tinker`
- buat user admin di dalam tinker dengan perintah berikut:
```
$user = new App\Models\User;
$user->name = 'Admin';
$user->email = 'admin@bkpk.com';
$user->password = bcrypt('password');
$user->save();
```
- kemudian keluar dari tinker dengan perintah `exit`
- jalankan aplikasi dengan perintah `php artisan serve`
- login ke dalam aplikasi dengan user admin sebagai berikut:
```
email: admin@bkpk.com
password: password
```

Selamat! anda sudah dapat login dan melakukan fungsi-fungsi admin seperti melakukan simulasi membuat mentor, mentee, dan kelompok.

## Buatlah Branch

Jika anda melakukan perubahan dan ingin melakukan push ke dalam repository ini, untuk menghindari konflik buatlah branch baru terlebih dahulu dan push ke branch tersebut, jangan push ke dalam branch main.

## Terima kasih

Terima kasih sudah bersedia membantu melakukan pengembangan project ini, termasuk menyimpannya ke lokal kalian juga merupakan sebuah ikhtiar untuk melakukan pengembangan. Semoga amal kita bernilai pahala dan memiliki manfaat pada kegiatan kebaikan. :)