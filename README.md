# About
Program ini merupakan hasil akhir dari magang saya, Program ini 
# Fitur
Login
Logout
CRUD Blog
Registrasi Anggota
Kelola User
Sistem Donasi ( Hanya sekedar pengecheckan )

# Cara Menjalakan
1. Copy Repo
```bash
git clone https://github.com/loronghitam/project-pal.git
```
2. Masuk kedalam folder procject-pal
```bash
cd project-pal
```
3. Menginstall compose yang di perlukan
```bash
composer install
```
4. Copy dan Rename .env.example
5. Mengubah pengaturan database seusia dengan yang kamu gunaka
```dotenv
DB_CONNECTION=mysql # mysql sebagai database
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel # Nama database yang digunakan
DB_USERNAME=root # User Mysql
DB_PASSWORD= # Secara default password kosong untuk mysql
```
6. Generate Key
```bash
php artisan key:generate
```
7. Memasukan data dummy
```bash
php artisan migrate --seed
```
8. Menjalakan program
```bash
php artisan ser
```
