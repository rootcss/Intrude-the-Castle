/*Map starts*/
$(document).ready(function(){
	$(".map").hide();
});

$(document).keyup(function(e) {
  if (e.keyCode == 77) {
    $('.map').slideToggle();
    $("iframe").attr("src", "map/map.php");
  }
});

/*Hints starts
$(document).keyup(function(e) {
  if (e.keyCode == 72) { 
  	$('#leftside_h').fadeToggle();
  	$('#leftside_e').fadeOut();
  	$('#leftside_a').fadeOut();  	 
  }
});

/*events starts
$(document).keyup(function(e) {
  if (e.keyCode == 69) { 
  	$('#leftside_e').fadeToggle();
  	$('#leftside_h').fadeOut();
  	$('#leftside_a').fadeOut();
  }
});

/*about starts
$(document).keyup(function(e) {
  if (e.keyCode == 65) { 
  	$('#leftside_a').fadeToggle();
  	$('#leftside_h').fadeOut();
  	$('#leftside_e').fadeOut();  	 
  }
});
*/