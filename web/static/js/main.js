var conn;

$(document).ready(function(){
	connectSocket();

	$("#form").submit(function(){
		sendClick($("#name").val());
		return false;	
	});
	$("#formButton").click(function(){
		sendClick($("#name").val());
		return false;
	});
	$("#formButton").mousedown(function(){
		$("#formButton").attr("src", "/static/img/button_pressed.png");
	});	
	$("#formButton").mouseup(function(){
		$("#formButton").attr("src", "/static/img/button.png");
	});
});

function connectSocket() {
	conn = new WebSocket('ws://localhost:8080');
	conn.onopen = function(e) {
    	console.log("Connection established!");
	};

	conn.onmessage = function(e) {
		var msg = JSON.parse(e.data);
		appendLog(msg.name, msg.timestamp);
	};
}

function sendClick(clicker) {
	if (clicker.length === 0) {
		$("#alerts").html('<div class="alert alert-danger">Enter Username</div>');
		return;				
	}
	$("#alerts").html('');
	var time = new Date();
	var msg = {"name": clicker, "timestamp": time};
	conn.send(JSON.stringify(msg));

	appendLog("You", time);
}

function appendLog(clicker, time){
	// TODO format time {formatMatcher: "hour,minute"}
	var formatted_time = new Date(time).toLocaleTimeString("en-US");
	var msg = '<li class="list-group-item">' + clicker + " clicked the button at " + formatted_time + ".</li>";
	$("#log").prepend(msg);
}
