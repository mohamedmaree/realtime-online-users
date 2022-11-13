// Dependencies
const http     = require('http');
const socketIO = require('socket.io');
const express  = require('express');
const app      = express();

const httpServer           = http.createServer(app).listen(8909, (req,res) => {
      console.log('HTTP Server running on port 8909');
});

const io       = socketIO(httpServer);
var onlineUsers = {};
io.on('connection', function (socket) {

    socket.on("adduser",function(data){
        //to get user online
        onlineUsers[socket.id] = data.user_id;
        io.emit('onlineUsers', onlineUsers);   
    });



    socket.on('disconnect', function() {
        //to get user offline
        delete onlineUsers[socket.id];
        io.emit('onlineUsers', onlineUsers);   

    });
});