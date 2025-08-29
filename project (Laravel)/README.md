# 🌟 Saynana Project

## 📖 Overview

Project ini terdiri dari dua aplikasi berbeda:

- **Laravel (utama)** → Backend & Frontend utama
- **Chatbot (Node.js)** → Layanan chatbot yang terintegrasi

---

## 🔧 Prerequisite (Untuk Laravel)

- **Composer** → Manajemen dependency Laravel
- **Node.js** → Dibutuhkan untuk build frontend
- **PHP ^8.2** → Dibutuhkan untuk menjalankan Laravel

---

## 🚀 Cara Instalasi (Laravel)

### 1. Clone Repository

```bash
git clone https://github.com/alelawar/saynana.git
```

### 2. Masuk ke Folder Project

```bash
cd saynana/project
```

### 3. Install Dependency 📦

#### Install Dependency Composer

```bash
composer install
```

#### Install Dependency Node.js

```bash
npm install
```

### 4. Setup Environment Dan Storage ⚙️

Copy file `.env.example` menjadi `.env`, lalu sesuaikan konfigurasi (database, app key, dsb).

```bash
cp .env.example .env
```

Generate application key:

```bash
php artisan key:generate
```

Buat storage link ke public:

```bash
php artisan storage:link
```

### 5. Migrasi & Seeder 🌱

```bash
php artisan migrate:fresh --seed
```

### 6. Jalankan Aplikasi 🚀

Buka **dua terminal terpisah**:

**Terminal 1:**
```bash
php artisan serve
```

**Terminal 2:**
```bash
npm run dev
```

> ⚡ **Aplikasi Laravel berjalan di:** http://localhost:8000

---

## 🔐 Login & Autentikasi

Aplikasi ini memiliki 2 role:

- **Seller** → Bisa mengakses dashboard
- **Buyer / User Biasa** → Akses terbatas untuk berbelanja

### 👤 Akun Dummy

Masuk ke halaman `/login` untuk masuk ke aplikasi.

#### Seller 👨‍💼

- **Email:** `seller@email.com`
- **Password:** `password`

Setelah login, masuk ke halaman `/dashboard` untuk mengakses sistem manajemen aplikasi.

#### Untuk User Baru

Buat akun baru di `/register` untuk mendapatkan diskon sampai 30%!

---

## 📩 Mailer Configuration

Untuk mengaktifkan **Mailer**, lakukan pengaturan pada file `.env` di bagian berikut:

```env
MAIL_MAILER=log
MAIL_SCHEME=null
MAIL_HOST=127.0.0.1
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"
```

> 💡 **Tip:** Jika ingin mengaktifkan **Mailer** (untuk mengirim data pesanan ke pembeli), ubah setting di atas sesuai layanan email yang Anda gunakan.

🔗 **Referensi:** [Laravel Mail Documentation](https://laravel.com/docs/mail) ↗️

---

## 📝 Notes

- Pastikan semua service (Apache/Nginx, MySQL, dll.) sudah berjalan
- Untuk development, gunakan `npm run dev` untuk hot reload
- Untuk production, gunakan `npm run build`