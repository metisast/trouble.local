var io = require('socket.io')(6001);

var Redis = require('ioredis');
var redis = new Redis();

redis.psubscribe('*', function(error, count){
     //
});

redis.on('pmessage', function(pattern, chanel, message){
    message = JSON.parse(message);
    io.emit(chanel + ':' + message.event, {
        'id': message.data.id,
        'room_title': message.data.room_title
    });

    console.log(chanel, message, chanel + ':' + message.event);
});

redis.on("error", function(err){
    console.log(err);
});

io.on('connection', function(socket){
    console.log('New connection ' + socket.id);
});

///console.log('New connection ' + socket.id);

//socket.send('Message from server');

/*var io = require('socket.io')(6001);*/

//io.on('connection', function(socket){

    ///console.log('New connection ' + socket.id);

    //socket.send('Message from server');

    //Fire emit
    //socket.emit('server-info', {version: 0.1});

    //socket.broadcast.send('New user');

    /*socket.on('message', function(data){
        socket.broadcast.send(data);
    });*/

    //Join
    /*socket.join('vip', function(error){
        console.log(socket.rooms);
    });*/
//});
