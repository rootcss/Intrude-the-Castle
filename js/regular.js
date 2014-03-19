setInterval("my_function();",20000); 
function my_function() {
	$('#header_question').load('getupdates.php');	
}

setInterval("puller1();",1000);
setInterval("puller2();",1500);
setInterval("puller3();",2000);
setInterval("puller4();",2500); 

function puller1() {
	$("#header_pull").css("color","#FFFFFF");
}
function puller2() {
	$("#header_pull").css("color","#000000");
}
function puller3() {
	$("#header_pull").css("color","red");
}
function puller4() {
	$("#header_pull").css("color","blue");
}




setInterval("puller_clickhere1();",5000);

function puller_clickhere1() {
	$("#left").fadeToggle(1000);
	$("#left").fadeToggle(1000);
}