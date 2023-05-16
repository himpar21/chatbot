<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ChatBot</title>
    <link rel="stylesheet" href="./style.css">
    <script src="javascript.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
</head>
<body>
    <div class="chatbot">
        <div id="astro" class="astronaut" onclick="showDiv()">
        <img class="astronaut-img" src= "images/astronaut.png">
        </div> 
        <div class="show-on-hover">
        <img class="chat-img" src="images/chat.png">
        <h1 class="typewrite" data-period="2000" data-type='[  "ASK ME..." ]'>
                <span class="wrap"></span>
        </h1>
        </div>
    </div>
        <div id="chat" class="wrapper fade-in">
            <center>
              <button id="close" class="chat-box-close-button" onclick="closechat()">
                  Close
              </button>
            </center>
            <div class="form">
                <div class="bot-inbox inbox">
                    <div class="icon">
                        <img class="bot-img" src="images/astronaut.png">
                    </div>
                    <div class="msg-header">
                        <p>Hello there, how can I help you?</p>
                                        <div class="link-pages">
                                            <ul class="bullets">
                                                <li><a href="https://www.sciastra.com/" target="_blank">Home</a></li>
                                                <li><a href="https://www.sciastra.com/courses/" target="_blank">Courses</a></li>
                                                <li><a href=" https://www.sciastra.com/selections/"
                                                    target="_blank">Selections</a></li>
                                                <li><a href=" https://www.sciastra.com/blog/"
                                                    target="_blank">Blogs</a></li>
                                                <li><a href=" https://www.sciastra.com/materials/"
                                                    target="_blank">Materials</a></li>
                                                <li><a href=" https://www.sciastra.com/teams/"
                                                    target="_blank">Team</a></li>
                                                <li><a href=" https://www.sciastra.com/contact/"
                                                    target="_blank">Contact Us</a></li>
                                            </ul>
                                        </div>
                    </div>
                </div>
            </div>
        </center>
            <div class="typing-field">
                <div class="input-data">
                    <input id="data" type="text" placeholder="Type your query.." required>
                    <button id="send-btn">Send</button>
                </div>
            </div>
        </div>
</div>
            <script>
        $(document).ready(function(){
            $("#send-btn").on("click", function(){
                $value = $("#data").val();
                $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>'+ $value +'</p></div></div>';
                $(".form").append($msg);
                $("#data").val('');
                
                // start ajax code
                $.ajax({
                    url: 'message.php',
                    type: 'POST',
                    data: 'text='+$value,
                    success: function(result){
                        $replay = '<div class="bot-inbox inbox"><div class="icon"><img class="bot-img" src="images/astronaut.png"></div><div class="msg-header"><p>'+ result +'</p></div></div>';
                        $(".form").append($replay);
                        $(".form").scrollTop($(".form")[0].scrollHeight);
                    }
                });
            });
        });
    </script>
    </div>
    </body>
    </html>
