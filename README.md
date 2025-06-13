# 📘 Frontend UAS

## 👨‍💻 Biodata

Ilham Budimansyah  
NPM: 230302013  
Tugas UAS - Pemrograman Berbasis Framework  

## 🎯 Deskripsi  
Aplikasi web frontend berbasis Laravel (Blade + HTTP client) yang berinteraksi dengan REST API backend (CodeIgniter). Fungsinya menampilkan, menambah, mengedit, dan menghapus data mahasiswa dan mata kuliah.

---

## 🛠 Alat & Bahan

- Sistem Operasi: Windows / Linux / macOS  
- PHP: versi 8.1+  
- Composer  
- Laravel (frontend)  
- CodeIgniter 4 (backend / REST API)  
- Node.js & NPM (jika digunakan)  
- MySQL  
- Postman

---

## 📥 Langkah 1: Clone Repository Frontend

```php
git clone https://github.com/IlhamBudimansyah/frontend-uas-230302013.git
cd frontend-uas-230302013
```

---

## ⚙ Langkah 2: Instalasi Dependency

```php
composer install
```

---

## 🔧 Langkah 3: Konfigurasi Environment

1. Duplikat file .env.example:
   bash
   cp .env.example .env
   

2. Edit file .env:
   env \
   APP_ENV=local \
   APP_DEBUG=true \
   DB_CONNECTION=mysql \
   DB_HOST=127.0.0.1 \
   DB_PORT=3306 \
   DB_DATABASE=nama_database \
   DB_USERNAME=root \
   DB_PASSWORD=
   

---

## 🚀 Langkah 4: Menjalankan Backend (CodeIgniter)

1. Masuk ke folder backend CodeIgniter (Simon-kehadiran):
   bash
   cd Simon-kehadiran
   composer install
   php spark migrate
   php spark serve
   

2. Akses API backend:
   - http://localhost:8080/mahasiswa
   - http://localhost:8080/matkul

---

## 🔄 Langkah 5: Menjalankan Frontend Laravel

bash
cd ../frontend-uas-230302013
php artisan serve


Akses frontend di browser:

http://127.0.0.1:8000


---

## 🧪 Langkah 6: Uji Fungsi Aplikasi
Gunakan Postman untuk mengetes endpoint berikut:

Mahasiswa \
GET → http://localhost:8080/api/mahasiswa (Untuk menampilkan seluruh data mahasiswa yang ada) \
POST → http://localhost:8080/api/mahasiswa (Untuk menambahkan data mahasiswa) \
PUT → http://localhost:8080/api/mahasiswa/$1 (Untuk megedit data mahasiswa dengan NPM yang ingin kita edit) \
DELETE → http://localhost:8080/api/mahasiswa/$1 (Untuk menghapus data mahasiswa dengan NPM yang ingin kita hapus)

Matkul \
GET → http://localhost:8080/api/matkul (Untuk menampilkan seluruh mata kuliah yang ada) \
POST → http://localhost:8080/api/matkul (Untuk menambahkan mata kuliah) \
PUT → http://localhost:8080/api/matkul/$1 (Untuk megedit mata kuliah dengan ID MATKUL yang ingin kita edit) \
DELETE → http://localhost:8080/api/matkul/$1 (Untuk menghapus mata kuliah dengan ID MATKUL yang ingin kita hapus)

---
