/**
 * NODE SERVER
 */

// CONFIGURATION
var port = 9876;
var ip   = '0.0.0.0';

io = require('socket.io').listen(port, ip);
console.info("Start server on " + ip + ":" + port);

var mySocket = io.of("/channel").on('connection', function (socket) {
socket.emit('news', { hello: 'world' });
    socket.on('my other event', function (data) {
        console.log(data);
    });
});

// Closure
function closeAndExit() {
    console.info("Closing");
    console.info("Ended");
    process.exit(0);
}
process.on('SIGTERM', function() {closeAndExit()});
process.on('SIGINT', function() {closeAndExit()});