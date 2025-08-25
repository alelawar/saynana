<x-mail::message>
{{-- Header dengan branding --}}
# 🍟 Saynana Chips

---

Halo **{{ $dataOrder->name }}**! 👋

Terima kasih sudah mempercayai **Saynana Chips** untuk camilan lezat Anda! Pesanan Anda telah kami terima dan akan segera diproses dengan penuh cinta ❤️

---

## 📋 Detail Pesanan Anda

**Nomor Pesanan:** `{{ $order->code }}`  
**Total Pembayaran:** `Rp {{ number_format($order->total_price, 0, ',', '.') }}`  
**Status:** Sedang Diproses ⏳

### 📦 Informasi Pengiriman
**Alamat:** {{ $dataOrder->address_line }}  
**No. Telepon:** {{ $dataOrder->phone }}

---

<x-mail::button :url="route('getDetailCheckout', ['code' => $order->code])" color="success">
🔍 Lihat Detail Lengkap Pesanan
</x-mail::button>

---

## 📞 Butuh Bantuan?

Jika ada pertanyaan tentang pesanan Anda, jangan ragu untuk menghubungi kami:
- **WhatsApp:** 0812-3456-7890
- **Email:** cs@saynanachips.com

<x-mail::subcopy>
Pesanan Anda akan diproses dalam 1-2 hari kerja. Kami akan mengirimkan notifikasi ketika pesanan sudah dikirim beserta nomor resi pengiriman.
</x-mail::subcopy>

Salam hangat,  
**Tim Saynana Chips** 🥔✨

---
*Terima kasih telah menjadi bagian dari keluarga Saynana Chips!*
</x-mail::message>