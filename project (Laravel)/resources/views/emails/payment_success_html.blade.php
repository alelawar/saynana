<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pesanan - Saynana Chips</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', Arial, sans-serif;
            line-height: 1.6;
            color: #2D3748;
            background-color: #f8f9fa;
        }
        
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        
        .header {
            background: linear-gradient(135deg, #FF6B35, #F7931E);
            padding: 40px 20px;
            text-align: center;
            color: white;
        }
        
        .header h1 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 5px;
            text-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .header p {
            font-size: 14px;
            opacity: 0.9;
        }
        
        .content {
            padding: 40px 30px;
        }
        
        .greeting {
            font-size: 18px;
            margin-bottom: 20px;
            color: #2D3748;
        }
        
        .greeting strong {
            color: #FF6B35;
        }
        
        .thank-you {
            background: linear-gradient(135deg, #FFF8F5, #FFF2E6);
            border-left: 5px solid #FF6B35;
            padding: 20px;
            border-radius: 8px;
            margin: 25px 0;
        }
        
        .order-details {
            background-color: #f8f9fa;
            border-radius: 12px;
            padding: 25px;
            margin: 30px 0;
            border: 2px solid #e9ecef;
        }
        
        .order-details h2 {
            color: #FF6B35;
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .detail-row {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px solid #e9ecef;
        }
        
        .detail-row:last-child {
            border-bottom: none;
        }
        
        .detail-label {
            font-weight: 600;
            color: #495057;
            flex: 1;
        }
        
        .detail-value {
            font-weight: 500;
            color: #2D3748;
            flex: 2;
            text-align: right;
        }
        
        .order-code {
            background-color: #FF6B35;
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 14px;
        }
        
        .price {
            color: #28a745;
            font-weight: 700;
            font-size: 18px;
        }
        
        .status {
            background-color: #fff3cd;
            color: #856404;
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: 500;
            font-size: 14px;
        }
        
        .button-container {
            text-align: center;
            margin: 35px 0;
        }
        
        .btn {
            display: inline-block;
            background: linear-gradient(135deg, #FF6B35, #F7931E);
            color: white;
            padding: 15px 30px;
            text-decoration: none;
            border-radius: 25px;
            font-weight: 600;
            font-size: 16px;
            box-shadow: 0 6px 20px rgba(255, 107, 53, 0.3);
            transition: all 0.3s ease;
        }
        
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(255, 107, 53, 0.4);
        }
        
        .contact-section {
            background-color: #f8f9fa;
            border-radius: 12px;
            padding: 25px;
            margin: 30px 0;
            text-align: center;
        }
        
        .contact-section h3 {
            color: #FF6B35;
            font-size: 18px;
            margin-bottom: 15px;
        }
        
        .contact-info {
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
        }
        
        .contact-item {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #495057;
            font-weight: 500;
        }
        
        .footer-note {
            background-color: #e7f3ff;
            border-left: 4px solid #007bff;
            padding: 20px;
            border-radius: 8px;
            margin: 25px 0;
            font-size: 14px;
            color: #495057;
        }
        
        .signature {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 2px solid #e9ecef;
        }
        
        .signature strong {
            color: #FF6B35;
        }
        
        .footer {
            background-color: #2D3748;
            color: #a0aec0;
            text-align: center;
            padding: 30px;
            font-size: 14px;
        }
        
        .footer-logo {
            font-size: 20px;
            font-weight: 600;
            color: #FF6B35;
            margin-bottom: 10px;
        }
        
        .icon {
            display: inline-block;
            width: 20px;
            height: 20px;
            vertical-align: middle;
            margin-right: 8px;
        }
        
        .icon-large {
            width: 24px;
            height: 24px;
        }
        
        .icon-header {
            width: 32px;
            height: 32px;
            margin-right: 12px;
        }
        
        @media only screen and (max-width: 600px) {
            .email-container {
                margin: 10px;
                border-radius: 8px;
            }
            
            .content {
                padding: 25px 20px;
            }
            
            .header {
                padding: 30px 20px;
            }
            
            .header h1 {
                font-size: 24px;
            }
            
            .detail-row {
                flex-direction: column;
                gap: 5px;
            }
            
            .detail-value {
                text-align: left;
            }
            
            .contact-info {
                flex-direction: column;
                gap: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header -->
        <div class="header">
            <h1>
                <svg class="icon-header" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M18.06 22.99h1.66c.84 0 1.53-.64 1.63-1.46L23 5.05h-5V1h-1.97v4.05h-4.97l.3 2.34c1.71.47 3.31 1.32 4.27 2.26 1.44 1.42 2.43 2.89 2.43 5.29v8.05zM1 22.99h11.66c.84 0 1.53-.64 1.63-1.46l1.65-16.48H1v17.94z"/>
                </svg>
                Saynana Chips
            </h1>
            <p>Camilan Lezat untuk Keluarga Indonesia</p>
        </div>
        
        <!-- Content -->
        <div class="content">
            <div class="greeting">
                Halo <strong>{{ $dataOrder->name }}</strong>!
                <svg class="icon" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M7.5 6.5C7.5 8.981 9.519 11 12 11s4.5-2.019 4.5-4.5S14.481 2 12 2 7.5 4.019 7.5 6.5zM20 21h1v-1c0-3.859-3.141-7-7-7h-4c-3.859 0-7 3.141-7 7v1h17z"/>
                </svg>
            </div>
            
            <div class="thank-you">
                <p>Terima kasih sudah mempercayai <strong>Saynana Chips</strong> untuk camilan lezat Anda! Pesanan Anda telah kami terima dan akan segera diproses</p>
            </div>
            
            <!-- Order Details -->
            <div class="order-details">
                <h2>
                    <svg class="icon-large" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6z"/>
                        <path d="M14 2v6h6"/>
                        <path d="M16 13H8"/>
                        <path d="M16 17H8"/>
                        <path d="M10 9H8"/>
                    </svg>
                    Detail Pesanan Anda
                </h2>
                
                <div class="detail-row">
                    <div class="detail-label">Nomor Pesanan:</div>
                    <div class="detail-value">
                        <span class="order-code">{{ $order->code }}</span>
                    </div>
                </div>
                
                <div class="detail-row">
                    <div class="detail-label">Total Pembayaran:</div>
                    <div class="detail-value price">
                        Rp {{ number_format($order->total_price, 0, ',', '.') }}
                    </div>
                </div>
                
                <div class="detail-row">
                    <div class="detail-label">Status:</div>
                    <div class="detail-value">
                        <span class="status">
                            <svg class="icon" viewBox="0 0 24 24" fill="currentColor" style="width: 16px; height: 16px;">
                                <circle cx="12" cy="12" r="10"/>
                                <path d="m12 6 0 6 4 2"/>
                            </svg>
                            Sedang Diproses
                        </span>
                    </div>
                </div>
                
                <div class="detail-row">
                    <div class="detail-label">Alamat Pengiriman:</div>
                    <div class="detail-value">{{ $dataOrder->address_line }}</div>
                </div>
                
                <div class="detail-row">
                    <div class="detail-label">No. Telepon:</div>
                    <div class="detail-value">{{ $dataOrder->phone }}</div>
                </div>
            </div>
            
            <!-- CTA Button -->
            <div class="button-container">
                <a href="{{ route('getDetailCheckout', ['code' => $order->code]) }}" class="btn">
                    <svg class="icon" viewBox="0 0 24 24" fill="currentColor" style="margin-right: 8px;">
                        <circle cx="11" cy="11" r="8"/>
                        <path d="M21 21l-4.35-4.35"/>
                    </svg>
                    Lihat Detail Lengkap Pesanan
                </a>
            </div>
            
            <!-- Contact Section -->
            <div class="contact-section">
                <h3>
                    <svg class="icon" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                    </svg>
                    Butuh Bantuan?
                </h3>
                <p style="margin-bottom: 15px;">Jika ada pertanyaan tentang pesanan Anda, jangan ragu untuk menghubungi kami:</p>
                <div class="contact-info">
                    <div class="contact-item">
                        <svg class="icon" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M21 15.46l-5.27-.61-2.52 2.52a15.045 15.045 0 0 1-6.59-6.59l2.53-2.53L8.54 3H3.03C2.45 13.18 10.82 21.55 21 20.97v-5.51z"/>
                        </svg>
                        <span><strong>WhatsApp:</strong> 0812-3456-7890</span>
                    </div>
                    <div class="contact-item">
                        <svg class="icon" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                            <polyline points="22,6 12,13 2,6"/>
                        </svg>
                        <span><strong>Email:</strong> cs@saynanachips.com</span>
                    </div>
                </div>
            </div>
            
            <!-- Footer Note -->
            <div class="footer-note">
                <strong>
                    <svg class="icon" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/>
                        <polyline points="3.27,6.96 12,12.01 20.73,6.96"/>
                        <line x1="12" y1="22.08" x2="12" y2="12"/>
                    </svg>
                    Info Pengiriman:
                </strong><br>
                Pesanan Anda akan diproses dalam 1-2 hari kerja. Kami akan mengirimkan notifikasi ketika pesanan sudah dikirim beserta nomor resi pengiriman.
            </div>
            
            <!-- Signature -->
            <div class="signature">
                <p>Salam hangat,<br>
                <strong>Tim Saynana Chips</strong>
                <svg class="icon" viewBox="0 0 24 24" fill="currentColor" style="color: #FF6B35;">
                    <circle cx="12" cy="8" r="6"/>
                    <path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/>
                </svg>
                </p>
            </div>
        </div>
        
        <!-- Footer -->
        <div class="footer">
            <div class="footer-logo">
                <svg class="icon-large" viewBox="0 0 24 24" fill="currentColor" style="margin-right: 8px;">
                    <path d="M18.06 22.99h1.66c.84 0 1.53-.64 1.63-1.46L23 5.05h-5V1h-1.97v4.05h-4.97l.3 2.34c1.71.47 3.31 1.32 4.27 2.26 1.44 1.42 2.43 2.89 2.43 5.29v8.05zM1 22.99h11.66c.84 0 1.53-.64 1.63-1.46l1.65-16.48H1v17.94z"/>
                </svg>
                Saynana Chips
            </div>
            <p>Terima kasih telah menjadi bagian dari Saynana Chips!</p>
        </div>
    </div>
</body>
</html>