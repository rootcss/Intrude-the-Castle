$(document).ready(function(){
	$(document).bind("contextmenu",function(e){
		//alert("Right Click is disabled");
       return false;
    });

	$("#confirmation").hide();
	$("#confirmation2").hide();

	$("#loading").hide();
	$("#close").click(function(){
		$("#welcome").hide();
		//$("#header_content").slideToggle(1000);
	});
	
	//START button
	//This will fetch the first question of the whole game
	$("#start_btn").click(function(){
		$("#start_btn").hide();
		$("#loading").show();
		$.ajax({
			type: "POST",
			url: "get.php",
			data: { path: "0"}
		}).done(function( data ) {
			$("#data_content").html(data);
			$("#loading").hide();
		});
	});

	//the CONTINUE button on home.php
	$("#continue_btn").click(function(){
		$("#continue_btn").hide();
		$("#loading").show();
		$.ajax({
			type: "POST",
			url: "get.php",
			data: { }
		}).done(function( data ) {
			$("#data_content").html(data);
			$("#loading").hide();
		});
	});
		
	$("#logout").click(function(){
		document.location.href="logout.php";
	});

	$(".status_link").click(function(){
		$("#welcome").show();
	});


	$("#header_pull").click(function(){		
		$("#header_content").slideToggle();
	});
	
	$("#share").hide();
	$("#arrow_s").click(function(){
		$("#share").fadeToggle();
	});

	$("#share").click(function(){
		$("#share").fadeToggle();
	});


	//Onclick, it opens the pop up button
	$("#back_btn").click(function(){
		$("#back_btn").hide();
		$("#confirmation").slideToggle();
	});
	//the no button
	$("#negative").click(function(){
		$("#confirmation").slideToggle();
		$("#back_btn").show();
	});
	//the positive button
	$("#positive").click(function(){
		$("#back_btn").hide();
		$("#loading").show();
		$.ajax({
			type: "POST",
			url: "back.php",
			data: { }
		}).done(function( data ) {
			$("#data_content").html(data);
			$("#loading").hide();
			$("#confirmation").slideToggle();
			$("#back_btn").show();
		});	
	});
	
});	