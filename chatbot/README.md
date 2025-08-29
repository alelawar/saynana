# 🌟 Saynana Project

## 📖 Overview

Project ini terdiri dari dua aplikasi berbeda:

- **Laravel (utama)** → Backend & Frontend utama
- **Chatbot (Node.js)** → Layanan chatbot yang terintegrasi

---
## 📝 Notes

- <b><span style="color:red">Configurasi dan Instalasi Project Chatbot sedikit rumit. Apliakasi utama akan tetap berjalan meskipun tanpa Chatbot aktif</span></b>


---
## 🔧 Prerequisite (Untuk Chatbot)

### PNPM

Install PNPM secara global:

```bash
npm i -g pnpm
```

### Node.js Version

**Node.js version 18.15.0 or higher**, up to **20.x**

⚠️ **Penting:** Tidak support Node.js 21+

> 💡 **Tip:** Gunakan NVM untuk mempermudah ganti versi Node.js.  
> 🔗 **Referensi:** [NVM Releases](https://github.com/coreybutler/nvm-windows/releases)

### Chat Flow Example

Contoh Flowise chatflow ada di folder:  
📁 [chatbot/assets/chatflow.json](https://github.com/alelawar/saynana/blob/main/chatbot/assets/chatflow.json)

### Google Generative AI API

Dapatkan API key dari:  
🔗 [Google AI Studio](https://aistudio.google.com/)

---

## 🚀 Cara Instalasi (Chatbot)

 1. Clone Repository

    ```bash
    git clone https://github.com/alelawar/saynana.git
    ```

2.  Go into repository folder:

    ```bash
    cd saynana/chatbot
    ```

3.  Init Repository For Husky:

    ```bash
    git init
    ```
3.  Install all dependencies of all modules:

    ```bash
    pnpm install
    ```

4.  Build all the code:

    ```bash
    pnpm build
    ```

    <details>
    <summary>Exit code 134 (JavaScript heap out of memory)</summary>  
    If you get this error when running the above `build` script, try increasing the Node.js heap size and run the script again:

    ```bash
    # macOS / Linux / Git Bash
    export NODE_OPTIONS="--max-old-space-size=4096"

    # Windows PowerShell
    $env:NODE_OPTIONS="--max-old-space-size=4096"

    # Windows CMD
    set NODE_OPTIONS=--max-old-space-size=4096
    ```

    Then run:

    ```bash
    pnpm build
    ```

    </details>

5.  Start the app:

    ```bash
    pnpm start
    ```

    Aplikasi Berjalan Di Port:  [http://localhost:3000](http://localhost:3000)
---

## 🔐 Login & Create Flow

1. Masuk ke `/register` untuk membuat akun
2. Lalu masuk ke aplikasi `/sign-in`
3. Buat Flow baru lalu load file chatflow dan konfigurasikan di environment Laravel  

> 📁 [chatbot/assets/chatflow.json](https://github.com/alelawar/saynana/blob/main/chatbot/assets/chatflow.json)  
> 🗃️ [chatbot/assets/saynana.pdf](https://github.com/alelawar/saynana/blob/main/chatbot/assets/saynana.pdf)  

## Konfigurasi Video ⚙️

[![Watch the video](https://img.youtube.com/vi/9jp3mo0t5kw/0.jpg)](https://youtu.be/9jp3mo0t5kw)

