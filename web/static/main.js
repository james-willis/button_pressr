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
		// TODO error message
		console.log("enter name plz")
		return;				
	}

	var msg = clicker + " clicked the button at " + new Date().toTimeString() + "<br>";
	conn.send(msg);
	appendLog(msg);
}

function appendLog(msg){
	$("#log").prepend(msg);
}
