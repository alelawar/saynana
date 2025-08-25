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
                    backgroundColor: '#3B81F6',
                    right: 20,
                    bottom: 20,
                    size: 48,
                    dragAndDrop: true,
                    iconColor: 'white',
                    customIconSrc: 'https://raw.githubusercontent.com/walkxcode/dashboard-icons/main/svg/google-messages.svg',
                    autoWindowOpen: {
                        autoOpen: false,
                        openDelay: 2,
                        autoOpenOnMobile: false
                    }
                },
                // tooltip: {
                //     showTooltip: true,
                //     tooltipMessage: 'Hi There 👋!',
                //     tooltipBackgroundColor: 'black',
                //     tooltipTextColor: 'white',
                //     tooltipFontSize: 16
                // },
                customCSS: ``,
                chatWindow: {
                    showTitle: true,
                    showAgentMessages: true,
                    title: 'Say-BOT',
                    titleAvatarSrc: 'https://raw.githubusercontent.com/walkxcode/dashboard-icons/main/svg/google-messages.svg',
                    welcomeMessage: 'Hallo! Ada yang bisa saya bantu?',
                    errorMessage: 'Waduh! ada yang salah sama api kamu nih :(',
                    backgroundColor: '#ffffff',
                    backgroundImage: 'enter image path or link',
                    height: 600,
                    width: 400,
                    fontSize: 16,
                    starterPrompts: [
                        "Kamu bisa ngapain?",
                        "Cara pesan?"
                    ],
                    starterPromptFontSize: 15,
                    clearChatOnReload: false,
                    sourceDocsTitle: 'Sources:',
                    renderHTML: true,
                    botMessage: {
                        backgroundColor: '#f7f8ff',
                        textColor: '#303235',
                        showAvatar: true,
                        avatarSrc: 'https://raw.githubusercontent.com/zahidkhawaja/langchain-chat-nextjs/main/public/parroticon.png'
                    },
                    userMessage: {
                        backgroundColor: '#3B81F6',
                        textColor: '#ffffff',
                        showAvatar: true,
                        avatarSrc: 'https://raw.githubusercontent.com/zahidkhawaja/langchain-chat-nextjs/main/public/usericon.png'
                    },
                    textInput: {
                        placeholder: 'Coba Tanyain Sesuatu',
                        backgroundColor: '#ffffff',
                        textColor: '#303235',
                        sendButtonColor: '#3B81F6',
                        maxChars: 50,
                        maxCharsWarningMessage: 'Kamu masukin pertanyaan yang terlalu panjang. Masimal 50 Karakter.',
                        autoFocus: true,
                        sendMessageSound: true,
                        sendSoundLocation: 'send_message.mp3',
                        receiveMessageSound: true,
                        receiveSoundLocation: 'receive_message.mp3'
                    },
                    feedback: {
                        color: '#303235'
                    },
                    dateTimeToggle: {
                        date: true,
                        time: true
                    },
                    footer: {
                        textColor: '#303235',
                        text: 'SayBOT',
                        company: 'Flowise',
                        companyLink: 'https://flowiseai.com'
                    }
                }
            }
        })
    </script>
</div>