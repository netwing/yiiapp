<?php if (NODE_SERVER !== null): ?>
<?php Yii::app()->clientScript->registerScriptFile("http://" . NODE_SERVER . ":" . NODE_PORT . "/socket.io/socket.io.js", CClientScript::POS_END); ?>
<h2>Node</h2>
<?php Yii::app()->clientScript->registerScript('socket.io', '
var socket = io.connect("http://' . NODE_SERVER . ':' . NODE_PORT . '/channel");
  socket.on("news", function (data) {
    console.log(data);
    $("#console").html(data.hello);
    socket.emit("my other event", { my: "data" });
  });
', CClientScript::POS_READY); ?>
<div id="console">
    
</div>
<?php endif; ?>

