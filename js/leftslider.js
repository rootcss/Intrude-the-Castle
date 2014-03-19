$(document).ready(function(){
	$("#leftside_h").hide();
	$("#leftside_e").hide();
	$("#leftside_a").hide();

//hints
	$("#arrow_h").click(function(){

		//$("#leftside_h").fadeToggle();
		//$("#leftside_h").load('gethint.php');
		$("#confirmation2").slideToggle();
		//$("#leftside_h").fadeToggle();
		$('#leftside_e').fadeOut();
  		$('#leftside_a').fadeOut(); 
	});

	//the no button
	$("#negative2").click(function(){
		$("#confirmation2").slideToggle();
	});
	//the positive button
	$("#positive2").click(function(){
		$("#loading").show();
		$.ajax({
			type: "POST",
			url: "gethint.php",
			data: { }
		}).done(function( data ) {
			$("#leftside_h").html(data);
			$("#leftside_h").fadeToggle();
			$("#loading").hide();			
			$("#confirmation2").slideToggle();
		});	
	});



	$(".leftclose").click(function(){
		$("#leftside_h").fadeOut();		
	});

//event
	
	$("#arrow_e").click(function(){
		$("#leftside_e").fadeToggle();
		$('#leftside_h').fadeOut();
  		$('#leftside_a').fadeOut(); 		
	});
	$(".leftclose").click(function(){
		$("#leftside_e").fadeOut();		
	});

//about
	$("#arrow_a").click(function(){
		$("#leftside_a").fadeToggle();
		$('#leftside_e').fadeOut();
  		$('#leftside_h').fadeOut(); 		
	});
	$(".leftclose").click(function(){
		$("#leftside_a").fadeOut();		
	});

//map
	$("#arrow_m").click(function(){
		$(".map").slideToggle();
		$("iframe").attr("src", "map/map.php");
	});

	$("#data_content").mouseover(function(){
		$('#leftside_e').fadeOut();
  		//$('#leftside_h').fadeOut();
  		$('#leftside_a').fadeOut();
	});

});	//end of document.ready()	