<!DOCTYPE html>
<html>
<head>
    <title>master layout page</title>
</head>
<body>
    <ul class="list-unstyled contact-list">
        <!-- user 1 -->
        <li>
            <a href="profile-url.html" class="d-flex align-items-center">
                <div class="user-img">
                    <span class="status_online_1 offline d-block"></span>
                    <img src="avatar.png">
                </div>
                <div class="contact-list-user-name">
                    mohamed
                </div>
            </a>
        </li>
        <!-- user 2 -->
        <li>
            <a href="profile-url.html" class="d-flex align-items-center">
                <div class="user-img">
                    <span class="status_online_2 offline d-block"></span>
                    <img src="avatar.png">
                </div>
                <div class="contact-list-user-name">
                    ahmed
                </div>
            </a>
        </li>
    </ul>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.1.1/socket.io.js"></script>
<script type="text/javascript">
        const socket = io.connect('https://yourdoamin.com:8909');  
        socket.emit('adduser',{user_id:'{{auth()->Id()}}' }); 
        socket.on('onlineUsers', function (onlineUsers){
            $.each(onlineUsers, function( key, userid ) {
                $('.status_online_'+userid).removeClass('offline');
                $('.status_online_'+userid).addClass('online');
            });            
        });
</script>
</body>
</html>