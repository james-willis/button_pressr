$(document).ready(function(){
	$("#form").submit(function(){
		sendClick($("#name").val());
		return false;	
	});
	$("#formButton").click(function(){
		sendClick($("#name").val());
		return false;
	});
});

function sendClick(clicker) {
	$.post("/click", {name: clicker});
};
