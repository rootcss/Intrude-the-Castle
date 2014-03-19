<?php
require_once('authen.php');
require_once('functions.php');
$pname=decrypt_css($_COOKIE['_u__']);
$cur_ques=decrypt_css($_COOKIE['_c_q__']);
if($cur_ques != '1' && $cur_ques != '2' && $cur_ques != '3' && $cur_ques != '4')
{
	$cur_ques=decrement($cur_ques);
}

switch ($cur_ques) 
{
	case '1#0':
		$cur_ques='1';		
		break;
	case '0':
		$cur_ques='1';
		break;
	case '2#0':
		$cur_ques='2';		
		break;
	case '3#0':
		$cur_ques='2#2';		
		break;
	case '3':
		$cur_ques='2#2';		
		break;
	case '4#0':
		$cur_ques='3#2';		
		break;
	case '4':
		$cur_ques='3#2';	
		break;

	default:
		break;
}
setcookie('_c_q__',encrypt_css($cur_ques));

if ($cur_ques != '1') 
{
	mysql_query("UPDATE `gamedata` SET `status`='".$cur_ques."' WHERE `pname`='".$pname."'");

	//get the negative marks from DB and reduce the score of the player

	//this is history of pressing back button
	mysql_query("UPDATE `gamedata` SET `backtrack`=CONCAT(`backtrack`,'".$cur_ques."%') WHERE `pname`='".$pname."'");

	//retreiving the negative marks
	$neg = mysql_fetch_row(mysql_query("SELECT `backmarks` FROM `quest` WHERE `qid` = '".$cur_ques."'"));
	
	//Deducting marks
	mysql_query("UPDATE `gamedata` SET `score`=`score`-'".$neg[0]."' WHERE `pname`='".$pname."'");
	//echo "<script>alert('".$neg[0]."')</script>";
		
}
	echo'<center><button id="next_btn"  class="btn">Continue</button></center>';

?>
<script>	
$(document).ready(function(){
	$("#next_btn").click(function(){
		$("#next_btn").hide();
		$.ajax({
			type: "POST",
			url: "get.php",
			data: { }
		}).done(function( data ) {
			$("#data_content").html(data);
		});	
	});
});	
</script>	