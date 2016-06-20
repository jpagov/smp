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
3. `mysql -u root -p smp < smp.sql`. `smp.sql` boleh didapat pada folder `/install`

### Konfigurasi

1. Buka atau cipta fail /smp/app/config/app.php`. Contoh boleh didapati pada folder `/install/app.php`. Kemaskini mengikut kesesuaian.
2. Buka atau cipta fail /smp/app/config/db.php`. Contoh boleh didapati pada folder /install/db.php. Kemaskini mengikut kesesuaian.
3. Buka pelayar dan buat percubaan http://localhost/smp (`/smp` merujuk kepada konfigurasi pada app.php `url`)

## Perhatian
* Kebanyakan imej pada muka hadapan adalah _hardcode_ untuk peggunaan JPA.
* Sila request SMTP Relay dari 1GovUC bagi membolehkan notifikasi berfungsi dengan baik.

### Akan Datang

* [ ] Pemasangan aplikasi secara web
* [ ] Buang statistik dari pangkalan data. Guna Google Analytic dan intergrate secara API.
* [ ] Simpan slug terakhir diubah bagi membolehkan redirect permanent sekiranya slug tidak ditemui


