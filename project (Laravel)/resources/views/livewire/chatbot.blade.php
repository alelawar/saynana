<div>
    <script type="module">
        import Chatbot from "https://cdn.jsdelivr.net/npm/flowise-embed/dist/web.js"
        Chatbot.init({
            chatflowid: "{{ $chatFlowId }}",
            apiHost: "http://localhost:3000",
            chatflowConfig: {
                /* Chatflow Config */
            },
            observersConfig: {
                /* Observers Config */
            },
            theme: {
                button: {
                    backgroundColor: '#FACC15', // yellow-400
                    right: 20,
                    bottom: 20,
                    size: 56,
                    dragAndDrop: true,
                    iconColor: '#3A1E13',
                    customIconSrc: '/img/items/nana.png',
                    autoWindowOpen: {
                        autoOpen: false,
                        openDelay: 2,
                        autoOpenOnMobile: false
                    }
                },
                tooltip: {
                    showTooltip: true,
                    tooltipMessage: 'Hai! Ada yang bisa saya bantu? 😊',
                    tooltipBackgroundColor: '#3A1E13',
                    tooltipTextColor: '#FFFFFF',
                    tooltipFontSize: 14
                },
                customCSS: `
                    .chatbot-button {
                        box-shadow: 0 8px 25px rgba(250, 204, 21, 0.3);
                        border: 3px solid #3A1E13;
                        transition: all 0.3s ease;
                    }
                    .chatbot-button:hover {
                        transform: scale(1.05);
                        box-shadow: 0 12px 30px rgba(250, 204, 21, 0.4);
                        background-color: #F59E0B !important;
                    }
                    .chatbot-window {
                        max-width: 90vw !important;
                        max-height: 80vh !important;
                        width: 420px !important;
                        height: 600px !important;
                        border-radius: 20px;
                        border: 2px solid #FACC15;
                        box-shadow: 0 20px 40px rgba(58, 30, 19, 0.15);
                    }
                    .chatbot-header {
                        background: linear-gradient(135deg, #FACC15 0%, #F59E0B 100%);
                        border-radius: 18px 18px 0 0;
                    }
                    .starter-prompts {
                        background-color: #FFFBEB;
                        border: 1px solid #FACC15;
                        border-radius: 12px;
                        color: #3A1E13;
                        transition: all 0.2s ease;
                    }
                    .starter-prompts:hover {
                        background-color: #FACC15;
                        transform: translateY(-2px);
                        box-shadow: 0 4px 12px rgba(250, 204, 21, 0.3);
                    }
                    .message-input {
                        border: 2px solid #FEF3C7;
                        border-radius: 25px;
                        transition: all 0.2s ease;
                    }
                    .message-input:focus {
                        border-color: #FACC15;
                        box-shadow: 0 0 0 3px rgba(250, 204, 21, 0.1);
                    }
                    .send-button {
                        background: linear-gradient(135deg, #FACC15 0%, #F59E0B 100%);
                        border-radius: 50%;
                        transition: all 0.2s ease;
                    }
                    .send-button:hover {
                        transform: scale(1.1);
                        box-shadow: 0 4px 12px rgba(250, 204, 21, 0.4);
                    }
                `,
                chatWindow: {
                    showTitle: true,
                    showAgentMessages: true,
                    title: 'Nana-BOT Assistant',
                    titleAvatarSrc: '',
                    welcomeMessage: 'Halo! 👋 Selamat datang di Nana-BOT! Ada yang bisa saya bantu hari ini?',
                    errorMessage: 'Oops! Sepertinya ada masalah teknis. Mohon coba lagi dalam beberapa saat 🔧',
                    backgroundColor: '#FFFFFF',
                    backgroundImage: 'data:image/svg+xml,<svg width="100" height="100" xmlns="http://www.w3.org/2000/svg"><defs><pattern id="grain" patternUnits="userSpaceOnUse" width="100" height="100"><circle cx="25" cy="25" r="1" fill="%23FACC15" opacity="0.1"/><circle cx="75" cy="75" r="1" fill="%23FACC15" opacity="0.1"/><circle cx="25" cy="75" r="1" fill="%23FACC15" opacity="0.1"/><circle cx="75" cy="25" r="1" fill="%23FACC15" opacity="0.1"/></pattern></defs><rect width="100%" height="100%" fill="url(%23grain)"/></svg>',
                    
                    fontSize: 15,
                    starterPrompts: [
                        "✨ Kamu bisa ngapain aja?",
                        "🛒 Gimana cara pesan produk?",
                        "📞 Info kontak dan lokasi",
                        "💡 Tips dan rekomendasi"
                    ],
                    starterPromptFontSize: 14,
                    clearChatOnReload: false,
                    sourceDocsTitle: '📚 Sumber Referensi:',
                    renderHTML: true,
                    botMessage: {
                        backgroundColor: '#FFFBEB', // yellow-50
                        textColor: '#3A1E13',
                        showAvatar: true,
                        avatarSrc: '/img/items/nana.png'
                    },
                    userMessage: {
                        backgroundColor: '#FACC15', // yellow-400
                        textColor: '#3A1E13',
                        showAvatar: true,
                        avatarSrc: 'https://raw.githubusercontent.com/zahidkhawaja/langchain-chat-nextjs/main/public/usericon.png'
                    },
                    textInput: {
                        placeholder: '💬 Ketik pesan Anda di sini...',
                        backgroundColor: '#FFFFFF',
                        textColor: '#3A1E13',
                        sendButtonColor: '#FACC15',
                        maxChars: 250,
                        maxCharsWarningMessage: '⚠️ Pesan terlalu panjang! Maksimal 250 karakter ya.',
                        autoFocus: true,
                        sendMessageSound: true,
                        sendSoundLocation: 'send_message.mp3',
                        receiveMessageSound: true,
                        receiveSoundLocation: 'receive_message.mp3'
                    },
                    feedback: {
                        color: '#3A1E13'
                    },
                    dateTimeToggle: {
                        date: true,
                        time: true
                    },
                    footer: {
                        textColor: '#3A1E13',
                        text: '🤖 Say-BOT Assistant',
                        company: 'Powered by Flowise AI',
                        companyLink: 'https://flowiseai.com'
                    }
                }
            }
        })
    </script>
</div>