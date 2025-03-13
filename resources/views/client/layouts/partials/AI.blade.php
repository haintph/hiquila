 <!-- Nút bấm chat AI -->
 <div id="chat-button" class="chat-button">
    <button id="toggle-chat">
        <i class="fa fa-comments"></i> Chat
    </button>
</div>

<!-- Chat box -->
<div id="chat-box" class="chat-box hidden">
    <div class="chat-header">
        <h3>Chat với AI</h3>
        <button id="close-chat">×</button>
    </div>
    <div class="chat-messages" id="chatbox">
        <div class="message bot">AI: Xin chào! Tôi có thể giúp gì cho bạn?</div>
    </div>
    <div class="chat-input">
        <input type="text" id="userMessage" placeholder="Nhập tin nhắn của bạn...">
        <button id="sendMessage">Gửi</button>
    </div>
</div>

<!-- CSS Styles -->
<style>
    .chat-button {
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 1000;
    }

    .chat-button button {
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 50%;
        width: 60px;
        height: 60px;
        cursor: pointer;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        transition: all 0.3s;
    }

    .chat-button button:hover {
        transform: scale(1.1);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
    }

    .chat-box {
        position: fixed;
        bottom: 90px;
        right: 20px;
        width: 350px;
        height: 450px;
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        display: flex;
        flex-direction: column;
        z-index: 1001;
        transition: all 0.3s;
    }

    .hidden {
        opacity: 0;
        visibility: hidden;
        transform: translateY(20px);
    }

    .chat-header {
        padding: 10px 15px;
        background-color: #4CAF50;
        color: white;
        border-radius: 10px 10px 0 0;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .chat-header h3 {
        margin: 0;
    }

    .chat-header button {
        background: none;
        border: none;
        color: white;
        font-size: 24px;
        cursor: pointer;
    }

    .chat-messages {
        flex: 1;
        padding: 15px;
        overflow-y: auto;
    }

    .message {
        margin-bottom: 10px;
        padding: 10px;
        border-radius: 10px;
        max-width: 80%;
    }

    .message.bot {
        background-color: #f1f1f1;
        align-self: flex-start;
    }

    .message.user {
        background-color: #dcf8c6;
        align-self: flex-end;
        margin-left: auto;
    }

    .chat-input {
        padding: 10px;
        display: flex;
        border-top: 1px solid #eee;
    }

    .chat-input input {
        flex: 1;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        margin-right: 10px;
    }

    .chat-input button {
        background-color: #4CAF50;
        color: white;
        border: none;
        padding: 10px 15px;
        border-radius: 4px;
        cursor: pointer;
    }
</style>

<!-- JavaScript -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggleButton = document.getElementById('toggle-chat');
        const closeButton = document.getElementById('close-chat');
        const chatBox = document.getElementById('chat-box');
        const sendButton = document.getElementById('sendMessage');
        const userInput = document.getElementById('userMessage');
        const chatMessages = document.getElementById('chatbox');

        // Lấy CSRF token từ meta tag
        let csrfToken = document.querySelector('meta[name="csrf-token"]');
        if (!csrfToken) {
            // Nếu meta tag chưa tồn tại, tạo mới và thêm vào head
            csrfToken = document.createElement('meta');
            csrfToken.setAttribute('name', 'csrf-token');
            csrfToken.setAttribute('content', "{{ csrf_token() }}");
            document.head.appendChild(csrfToken);
        }

        // Thiết lập CSRF token mặc định cho tất cả các yêu cầu Ajax
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': csrfToken.getAttribute('content')
            }
        });

        // Hiển thị chat box
        toggleButton.addEventListener('click', function() {
            chatBox.classList.toggle('hidden');
        });

        // Đóng chat box
        closeButton.addEventListener('click', function() {
            chatBox.classList.add('hidden');
        });

        // Gửi tin nhắn sử dụng Ajax
        function sendMessage() {
            const message = userInput.value.trim();
            if (message !== '') {
                // Thêm tin nhắn của người dùng vào chat
                chatMessages.innerHTML += "<div class='message user'>Bạn: " + message + "</div>";

                // Xóa nội dung input
                userInput.value = '';

                // Cuộn xuống tin nhắn mới nhất
                chatMessages.scrollTop = chatMessages.scrollHeight;

                // Gửi tin nhắn đến server sử dụng Ajax
                $.ajax({
                    url: "/chat-ai",
                    type: "POST",
                    contentType: "application/json",
                    data: JSON.stringify({
                        message: message
                    }),
                    success: function(response) {
                        if (response.error) {
                            chatMessages.innerHTML += "<div class='message bot'>Lỗi: " + response
                                .error + "</div>";
                        } else {
                            chatMessages.innerHTML += "<div class='message bot'>AI: " + response
                                .response + "</div>";
                        }
                        chatMessages.scrollTop = chatMessages.scrollHeight;
                    },
                    error: function(xhr) {
                        let errorMsg = "Lỗi từ server";
                        try {
                            const errorObj = JSON.parse(xhr.responseText);
                            if (errorObj && errorObj.message) {
                                errorMsg += ": " + errorObj.message;
                            }
                        } catch (e) {
                            errorMsg += ": " + xhr.responseText;
                        }
                        chatMessages.innerHTML += "<div class='message bot'>" + errorMsg + "</div>";
                    }
                });
            }
        }

        // Xử lý khi nhấn nút Gửi
        sendButton.addEventListener('click', sendMessage);

        // Xử lý khi nhấn Enter
        userInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                sendMessage();
            }
        });
    });
</script>