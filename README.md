1. Code -> Download ZIP atau Clone
2. Simpan di C:/xampp/htdocs untuk yang memakai xampp 
3. Lalu ekstrak
4. Pastikan Laptop/PC anda sudah terinstall Composer
5. Jalankan command "composer install" tunggu sampai selesai
6. Rename env.example menjadi .env
7. Ubah di file .env pada bagian “DB_DATABASE=laravel” menjadi “DB_DATABASE=store_laravel”
8. Jalankan command "php artisan key:generate" tunggu sampai selesai
9. Buat 1 nama database baru di localhost/phpmyadmin dengan nama “store_laravel”
10. Buka terminal dan jalankan “php artisan migrate:fresh --seed”
11. Jika proses migrate selesai, jalankan “php artisan serve” di terminal
12. Buka browser, lalu buka url: http://127.0.0.1:8000/
13. Selesai
