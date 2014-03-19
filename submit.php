<?php
require('authen.php');
require('functions.php');
$ans = addslashes($_POST['main']);
$pname=decrypt_css($_COOKIE['_u__']);
$cur_ques=decrypt_css($_COOKIE['_c_q__']);
$status = $cur_ques;
$query = "SELECT `ans` FROM `quest` WHERE `qid` = '".$cur_ques."'";
$ps = mysql_query($query);	//getting the original answer
$actual = mysql_fetch_row($ps);
	if(strtolower($actual[0]) == strtolower($ans))
	{
		if(checkSubmission($pname, $cur_ques) != 1)
		{
			//concating all the submitted answer - very important
			mysql_query("UPDATE `gamedata` SET `submittedfor`=CONCAT(`submittedfor`,'".$cur_ques."%') WHERE `pname`='".$pname."'");
			if($cur_ques == '1')
			{
				$marks = mysql_fetch_row(mysql_query("SELECT `positive` FROM `quest` WHERE `qid` = '".$cur_ques."'"));
				$cur_ques++;
				//echo "<script>alert('".$marks[0]."')</script>";
				mysql_query("UPDATE `gamedata` SET `status`='".$status."', `score`=`score`+'".$marks[0]."' WHERE `pname`='".$pname."'");		
				setcookie('_c_q__',encrypt_css($cur_ques));
			}
			else
			{
				$marks = mysql_fetch_row(mysql_query("SELECT `positive` FROM `quest` WHERE `qid` = '".$cur_ques."'"));
				$cur_ques = increment($cur_ques);
				mysql_query("UPDATE `gamedata` SET `status`='".$status."', `score`=`score`+'".$marks[0]."' WHERE `pname`='".$pname."'");
				setcookie('_c_q__',encrypt_css($cur_ques));
			}
			echo '<div id="question"><br><br>Correct Answer<br><br><br>
			<a style="background: #3b5998;padding: 5px;color:#fafafa;text-decoration:none;border-radius: 5px;" href="#" onclick="window.open(\'https://www.facebook.com/sharer/sharer.php?u=\'+encodeURIComponent(\'http://itc.aaruush.net/\'), \'facebook-share-dialog\',\'width=626,height=436\');return false;">Share on Facebook</a>';
			echo '<center><button id="next_btn" class="btn">Continue</button></center>
			<br><br>
			Tips :<br>
			> Sharing &amp; Referrals give you extra bonus points.<br>
			> For each 5 referrals, you will get 10 bonus points.<br>
			</div>';	
		}
		else
		{
			if ($cur_ques != '1')
			{
				$cur_ques = increment($cur_ques);
				setcookie('_c_q__',encrypt_css($cur_ques));
			}
			else
			{
				$cur_ques++;
				setcookie('_c_q__',encrypt_css($cur_ques));
			}
			echo '<div id="question"><h2><br><br>Already Submitted</h2>';
			echo'<center><button id="next_btn" class="btn">Continue</button></center></div>';
		}
	}
	else
	{
		echo '<div id="question"><br><br>Incorrect Answer';
		echo'<center><button id="incorrect_btn" class="btn">Continue</button></center></div>';
	}
?>
<script>
$(document).ready(function(){
	$("#loading").hide();
	$("#next_btn").click(function(){
		$("#next_btn").hide();
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

	$("#incorrect_btn").click(function(){
		$("#incorrect_btn").hide();
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
});	
</script>