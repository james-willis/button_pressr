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
		$("#formButton").attr("src", "/static/button_pressed.png");
	});	
	$("#formButton").mouseup(function(){
		$("#formButton").attr("src", "/static/button.png");
	});
});

function connectSocket() {
	conn = new WebSocket('ws://localhost:8080');
	conn.onopen = function(e) {
    	console.log("Connection established!");
	};

	conn.onmessage = function(e) {
		appendLog(e.data);
	};
}

function sendClick(clicker) {
	if (clicker.length === 0) {
		$("#alerts").html('<div class="alert alert-danger">Enter Username</div>');
		return;				
	}
	$("#alerts").html('');
	// TODO santize input
	var msg = " clicked the button at " + new Date().toTimeString() +'</li>';
	conn.send('<li class="list-group-item">' + clicker + msg);
	appendLog('<li class="list-group-item">' + 'you' + msg);
}

function appendLog(msg){
	$("#log").prepend(msg);
}
