## Sistem Direktori Pegawai

### Keperluan Perisian

- PHP 5.3.6+
    - curl
    - mcrypt
    - gd
    - pdo\_mysql or pdo\_sqlite
- MySQL 5.2+
- Composer

### Pemasangan

1. `git clone https://github.com/jpagov/smp.git` (tambah nama direktori jika ingin menukar nama direktori)
2. `cd smp`
3. `composer install`

### Pemasangan Pangkalan Data

Sementara menunggu composer memuat turun pustaka kod yang berkaitan, 
buka phpmyadmin (atau command line) untuk ekspot pangkalan data.

1. `mysql -u username -p`
2. `create database smp;` dan tekan Ctrl+D untuk keluar

### Konfigurasi

1. Sila buka Setting > Site Variables dan buat tetapan seperti IP range utk paparan dalaman, Pengurusan Atasan, `slug => id` dan lain-lain. Cth, `kppa => 1`
2. Buka dan kemaskini fail `themes/default/divisions.php`. Tukarkan slug, `site_meta('slug')` mengikut tetapan pada para 1.
3. Sila buka Setting > Site Metadata dan buat tetapan mengikut kesesuaian
4. Untuk membuat `index.php` pada URL, kemaskini fail `app/config/app.php` dan kosongkan ruangan `'index' => ''`

## Perhatian
* Kebanyakan imej pada muka hadapan adalah _hardcode_ untuk peggunaan JPA.
* Sila request SMTP Relay dari 1GovUC bagi membolehkan notifikasi berfungsi dengan baik.

### Akan Datang

* [ ] Konfigurasi menggunakan [DotEnv](https://github.com/vlucas/phpdotenv)
* [ ] Buang statistik dari pangkalan data. Guna Google Analytic dan intergrate secara API.
* [ ] Simpan slug terakhir diubah bagi membolehkan redirect permanent sekiranya slug tidak ditemui
* [ ] Konsep `tagging` bagi memudahkan carian


