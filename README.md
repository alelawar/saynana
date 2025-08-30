# 🌟 Saynana Project — README

> Ringkas, modern, dan siap produksi.  
> Fitur utama: pemesanan sederhana, keranjang & checkout, notifikasi email, AI chatbot, UI responsif (Tailwind), serta backend aman berbasis Laravel.

---
## 📝 Notes

- **Semua cara instalasi dan configurasi ada di tiap folder**
---

## 🔧 Tech Stack

- **Backend/Frontend utama:** Laravel 11+, PHP 8.2+, MySQL/MariaDB, Redis (opsional), Vite, Tailwind CSS  
- **Chatbot service:** Node.js 18+ (Maks 20*), OpenAI/LLM provider (required)  
- **Build tools:** NPM/Yarn/PNPM, Composer  
- **Server:** Apache/Nginx + PHP-FPM

---

## 🚀 Fitur

A. **Sistem pemesanan dengan alur sederhana**  
- Pilih produk → Tambah ke keranjang → Isi data → Konfirmasi → Pesanan dibuat.

B. **Keranjang belanja & checkout**  
- Lihat barang atau produk yang kita pilih, masukan voucher (optional)

C. **Integrasi notifikasi email**  
- Email konfirmasi pesanan dan status pengiriman 
- Mendukung SMTP/Mailgun/SES (via konfigurasi `.env` Laravel).

D. **AI Chatbot untuk layanan pelanggan**  
- Menjawab FAQ dari user secara realtime 
- Terpisah sebagai service Node.js dan terintegrasi via REST.

E. **UI modern responsif (Tailwind CSS)**  
- Komponen siap pakai, aksesibilitas dipertimbangkan.

F. **Keamanan data (Laravel)**  
- CSRF/XSS protection, rate limiting, hash password (Argon2), validasi request, .env terpisah.

---

## 🧱 Arsitektur

```
[Client (Web)]
     │
     ▼
[Laravel App] ── REST API ──► [Chatbot Service (Node)]
     │                           │
     ├─ Models/Controllers       ├─ LLM Provider (Required)
     ├─ Email Queue (Mail)       
     └─ MySQL/Redis
```

---

## 📁 Struktur Direktori (ringkas)

```
/saynana
├─ project (Laravel)/
│  ├─ app/
│  │  ├─ Http/
│  │  ├─ Models/
│  │  └─ Mail/
│  ├─ resources/
│  │  ├─ views/
│  │  ├─ css/
│  │  └─ js/   (Tailwind + Vite)
│  ├─ routes/
│  │  ├─ web.php
│  │  └─ api.php
│  └─ .env.example
│
└─ chatbot-service/   (Flowise)
   ├─ src/
   │  ├─ index.ts|js
   │  ├─ routes/
   │  └─ services/
   ├─ packages/        # modul utama
   ├─ data/            # penyimpanan data/chatflow
   ├─ assets/          # assets buat data flowise
   ├─ package.json
   └─ .env.example
```

---

## ✅ Prasyarat

- PHP 8.2+, Composer  
- Node.js 18+ & npm/pnpm/yarn  
- MySQL/MariaDB (buat database)  
- (Opsional) Redis untuk queue/session  
- Domain/email provider untuk SMTP (atau Mailgun/SES)

---



## 🛒 Alur Pemesanan (Sederhana)

1. User memilih produk → **Tambah ke keranjang**  
3. Buka menu keranjang untuk pergi ke halaman (Di header)
2. Di Halaman **/checkout** → isi data pengiriman & metode pembayaran  
3. Konfirmasi → **Order dibuat** (status: `pending/paid/shipped**`)  
4. **Email** dikirim otomatis (queue)  
5. **User** dapat mencari data orderan berdasarkan Nama / Code orderan

---

## ✉️ Notifikasi Email (Laravel) (sudah dibuat✅):

- Implementasi via `Mailable` 

```bash
php artisan make:mail OrderCreatedMail
```
- Kirim via event/listener sesudah order dibuat.  
- Jalankan **queue worker** untuk throughput stabil:
```bash
php artisan queue:work --tries=3
```

---

## 🎨 Frontend (Tailwind + Vite)

- Utility-first: komponen tombol, kartu produk, cart panel, form checkout.  
- Responsif (grid/flex). 


---

## 🔐 Keamanan

- **CSRF** pada form, **XSS** via escape/validation  
- **Rate limiting** pada endpoint auth & chatbot  
- **Password hashing**: Argon2id  
- **CORS** terbatas pada domain tepercaya  
- **Validation rules** ketat pada semua input checkout

---

## 🧪 Testing (opsional tapi disarankan)

```bash
# Laravel
php artisan test

# Chatbot (Jest/Vitest)
npm run test
```

---

## 🩹 Troubleshooting

- Email tidak terkirim → cek kredensial SMTP `.env (Laravel)` 
- CORS error → atur di Aplikasi `/chatbot` atau di `.env (Laravel)`
- Chatbot tidak merespons → cek `.env (Laravel)`, `FLOWISE_CHATFLOW_ID`, dan koneksi antar service  
- Asset CSS tidak muncul → pastikan `npm run dev`/`build` sukses dan Vite URL benar

---



## 🗺️ Roadmap Singkat

- Manajemen stok & dashboard admin  
- Chatbot: konteks multi-turn
- Profile history orderan lengkap
- Voucher Public dan Khusus User
- Cari orderan secara full di Aplikasi
