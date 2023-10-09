<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../chatbot/chatbot.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
    <button class="chatbot-open" onclick="openForm()" id="chatbot-open-button"></button>
    <div class="chatbot-popup" id="chatbot-Popup">

        <div class="chatbot-wrapper">
            <div class="title">
                <label class="title-left">Online Chatbot</label>
                <span class="chatbot-close" onclick="closeForm()">x</span>
            </div>

            <div class="form">
                <div class="bot-inbox inbox">

                    <div class="icon">
                        <i class="fas fa-user"></i>
                    </div>

                    <div class="msg-header">
                        <p style="word-break: keep-all;">Hello there , how can I help you?</p>
                    </div>

                </div>
            </div>

            <div class="typing-field">
                <div class="input-data">
                    <input id="data" type="text" placeholder="Type something here.." required>
                    <button id="send-btn">Send</button>
                </div>          
            </div>

        </div>
    </div>
    <script>
        // send Button
        $(document).ready(function(){
            $("#send-btn").on("click", function(){
                $value = $("#data").val();
                $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>'+ $value +'</p></div></div>';
                $(".form").append($msg);
                $("#data").val('');
                
                $.ajax({
                    url: '../chatbot/message.php',
                    type: 'POST',
                    data: 'text='+$value,
                    success: function(result){
                        $replay = '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p>'+ result +'</p></div></div>';
                        $(".form").append($replay);
                        $(".form").scrollTop($(".form")[0].scrollHeight);
                    }
                });
            });
        });

        // enter Key
        $('#data').keydown(function (e) {
    if (e.keyCode == 13) {
        $value = $("#data").val();
                $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>'+ $value +'</p></div></div>';
                $(".form").append($msg);
                $("#data").val('');
                
                $.ajax({
                    url: '../chatbot/message.php',
                    type: 'POST',
                    data: 'text='+$value,
                    success: function(result){
                        $replay = '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p>'+ result +'</p></div></div>';
                        $(".form").append($replay);
                        $(".form").scrollTop($(".form")[0].scrollHeight);
                    }
                });
    }
})       

        function openForm() {
            document.getElementById("chatbot-Popup").style.display = "block";
            document.getElementById("chatbot-open-button").style.display = "none";
        
        }
        function closeForm() {
            document.getElementById("chatbot-Popup").style.display = "none";
            document.getElementById("chatbot-open-button").style.display = "block";
        }

</script>
</body>
</html>