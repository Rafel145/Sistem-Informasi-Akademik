SISTEM INFORMASI AKADEMIK

Aplikasi berbasis web untuk mengelola data akademik, meliputi data dosen, mahasiswa, mata kuliah, dan mitra.

DESKRIPSI

Sistem Informasi Akademik merupakan proyek individu yang dikembangkan menggunakan PHP Native dan MySQL. Aplikasi ini dibuat untuk mengelola data akademik melalui antarmuka dashboard berbasis web dengan menggunakan template AdminLTE.

FITUR

- Login dan logout menggunakan session
- Dashboard yang menampilkan ringkasan jumlah data
- CRUD data dosen
- CRUD data mahasiswa
- CRUD data mata kuliah
- CRUD data mitra

TEKNOLOGI

- PHP Native
- MySQL
- HTML
- CSS
- JavaScript
- Bootstrap
- AdminLTE

STRUKTUR PROYEK

Admin_dashboard/
├── assets/
├── css/
├── database/
│   └── sistem1.sql
├── js/
├── layouts/
├── aksi.php
├── dashboard.php
├── index.php
├── input_dosen.php
├── input_mahasiswa.php
├── input_matakuliah.php
├── input_mitra.php
├── tabel_dosen.php
├── tabel_mahasiswa.php
├── tabel_matakuliah.php
├── tabel_mitra.php
└── koneksi.example.php

INSTALASI

1. Clone repository:

   git clone https://github.com/Rafel145/Sistem-Informasi-Akademik.git

2. Pindahkan folder proyek ke direktori htdocs pada XAMPP.

3. Buat database MySQL dengan nama sistem1.

4. Buka phpMyAdmin, pilih database sistem1, lalu klik tab Import.

5. Pilih file database/sistem1.sql dari folder proyek, kemudian klik Import.

6. Salin file koneksi.example.php menjadi koneksi.php.

7. Sesuaikan konfigurasi database pada koneksi.php berdasarkan lingkungan lokal.

8. Jalankan Apache dan MySQL melalui XAMPP.

9. Buka aplikasi melalui browser:

   http://localhost/Admin_dashboard/

PENGEMBANG

Rafel Margeafany

Mahasiswa Informatika — UPN "Veteran" Jawa Timur
