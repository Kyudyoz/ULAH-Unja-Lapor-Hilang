# Project Analisis dan Perancangan Sistem Informasi UNJA Lapor Hilang


## Langkah-langkah Penggunaan

Berikut adalah langkah-langkah untuk mengkloning dan menjalankan proyek ini secara lokal.

1. **Persiapkan Lingkungan:**
   - Pastikan PHP(XAMPP) dan Composer sudah terinstal di komputer Anda.

2. **Clone Proyek dari GitHub:**
   ```bash
   git clone https://github.com/Kyudyoz/ULAH.git
3. **Masuk ke direktori project**
4. **Instal Dependensi Composer**
    ```bash
    composer install
5. **Buat salinan .env** 
   - Duplikat file .env.example dan ubah namanya menjadi .env
   - Kemudian, konfigurasi file .env sesuai dengan pengaturan lingkungan Anda, seperti konfigurasi database.
6. **Generate Kunci Aplikasi**
    ```bash
    php artisan key:generate
7. **Jalankan Migrasi Database**
    ```bash
    php artisan migrate
8. **Jalankan Server Lokal**
- Pada terminal jalankan :
  ```
  php artisan serve
