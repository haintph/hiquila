<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Chatbot</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        #chatbox {
            width: 400px;
            height: 500px;
            border: 1px solid #ddd;
            overflow-y: scroll;
            padding: 10px;
        }

        .message {
            margin-bottom: 10px;
        }

        .user {
            color: blue;
            font-weight: bold;
        }

        .bot {
            color: green;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <h2>AI Chatbot Nhà Hàng</h2>
    <div id="chatbox"></div>
    <input type="text" id="userMessage" placeholder="Nhập tin nhắn..." />
    <button id="sendMessage">Gửi</button>

    <script>
        $(document).ready(function() {
            $("#sendMessage").click(function() {
                var message = $("#userMessage").val();
                if (message.trim() === "") return; // Ngăn gửi tin nhắn rỗng
                
                $("#chatbox").append("<div class='message user'>Bạn: " + message + "</div>");
                $("#userMessage").val("");

                $.ajax({
                    url: "/chat-ai",
                    type: "POST",
                    contentType: "application/json",
                    data: JSON.stringify({ message: message }),
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                    },
                    success: function(response) {
                        if (response.error) {
                            $("#chatbox").append("<div class='message bot'>Lỗi: " + response.error + "</div>");
                        } else {
                            $("#chatbox").append("<div class='message bot'>AI: " + response.response + "</div>");
                        }
                        $("#chatbox").scrollTop($("#chatbox")[0].scrollHeight);
                    },
                    error: function(xhr) {
                        $("#chatbox").append("<div class='message bot'>Lỗi từ server: " + xhr.responseText + "</div>");
                    }
                });
            });
        });
    </script>
</body>

</html>
