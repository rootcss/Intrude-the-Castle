<?php
//check either user is already logged it or not
function check_already_login()
{
	if(!empty($_COOKIE['_u__']))
	{
		$pname=decrypt_css($_COOKIE['_u__']);
		require_once('authen.php');
		$query="SELECT COUNT(pname) FROM `userdata` WHERE `pname`='".$pname."'";
		$value=mysql_fetch_row(mysql_query($query));
		if($value[0] == 0)	//User exist
			return 0;	//user exist but not logged in
		else
			return 1;	//already logged in.
	}
	else
		return 0;	//user exist but not logged in
}

//to get the current status of the player
function getStatus($pname)
{
	if(!empty($_COOKIE['_u__']))	//cookie exists
	{
		$pname=decrypt_css($_COOKIE['_u__']);	//the username
		require('authen.php');
		$query="SELECT `status` FROM `gamedata` WHERE `pname` = '".$pname."'";
		$res=mysql_fetch_row(mysql_query($query));
		return $res[0];	//status of user, i.e, the curent question
	}
	else
	{
		return (-1);
	}	
}
//to get the current score of the player
function getScore($pname)
{
	if(!empty($_COOKIE['_u__']))	//cookie exists
	{
		$pname=decrypt_css($_COOKIE['_u__']);	//the username
		require('authen.php');
		$query="SELECT `score` FROM `gamedata` WHERE `pname` = '".$pname."'";
		$res=mysql_fetch_row(mysql_query($query));
		return $res[0];	//status of user, i.e, the curent question
	}
	else
	{
		return (-1);
	}	
}

//to fetch a question from DB, based in the cookie set inside browser
function getQuestion($cur_ques)
{	
	$pname=decrypt_css($_COOKIE['_u__']);
	mysql_query("UPDATE `gamedata` SET `hintcheck`= 0 WHERE `pname`='".$pname."'");	//resetting the hint status
	$query="SELECT * FROM `quest` WHERE `qid`='".$cur_ques."'";
	$res=mysql_query($query);
	echo'
	<script>
		$(document).ready(function(){
			$("#back_btn").show();
			$("#image_ques").hide();
			$("#left").click(function(){
			$("#image_ques").fadeToggle(500);
			});
		});
	</script>
	<div id="data_content1">		
		<div id="question">
			<div id="header_question">
				Intrude the Castle
			</div>';
		//echo $cur_ques."<br>";
		echo'<div id="forthefont">';
		while ($data=mysql_fetch_array($res)) 
		{
			echo "".$data['question']."<br>";
			//echo "".$data['ans']."<br>";
			//echo "Hint : ".$data['hint']."<br>";
			//echo $data['qid']."<br>";
			$image = $data['image'];
		}	
		echo'</div>';
			//echo " : ".decrypt_css($_COOKIE['_c_q__'])." : ";
		echo'
		</div>
		
		<div id="image_ques">';
		if (!empty($image)) {
			echo'<img src="./images/questions/'.$image.'" height=100% width=100%>';
		}
		else
			echo'<img src="./images/default.jpg" height=100% width=100%>';	
			
		echo'</div>
		<div id="left" title="Click to view image for this question">
		 ^<br><span class="clickhere">Click here</span> 
		</div>	
	</div>';

}

function increment($cur_ques)
{
	$parts = explode('#', $cur_ques);	//separating path & question number
	$cur_ques = $parts[1];	//this is actual question number
	$cur_ques++;	//incrementing the question number	
	$cur_ques = $parts[0]."#".$cur_ques;//joining again after incrementing question no.		
	return $cur_ques;
}


function decrement($cur_ques)
{
	$parts = explode('#', $cur_ques);	//separating path & question number
	$cur_ques = $parts[1];	//this is actual question number
	$cur_ques--;	//incrementing the question number	
	$cur_ques = $parts[0]."#".$cur_ques;//joining again after incrementing question no.		
	return $cur_ques;
}

function isPhaseOneComplete($pname)
{	
	$x = mysql_fetch_row(mysql_query("SELECT `phase1` FROM `gamedata` WHERE `pname` = '".$pname."'"));
	return $x[0]; 
}

function checkSubmission($pname, $cur_ques)
{
	require('authen.php');
	$data = mysql_fetch_row(mysql_query("SELECT `submittedfor` FROM `gamedata` WHERE `pname` = '".$pname."'"));	
	$ans=explode('%', $data[0]);
	if($ans[count($ans)-2] == $cur_ques)
		return 1;	//already submitted
	else
		return 0;	//first time submission
}

function encrypt_css($string)
{	
	//$key = 'shekharsingh';
	//$encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $string, MCRYPT_MODE_CBC, md5(md5($key))));
	$encrypted = base64_encode($string);
	return $encrypted;
}

function decrypt_css($encrypted)
{
	//$key = 'shekharsingh';
	//$decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($encrypted), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
	$decrypted = base64_decode($encrypted);
	return $decrypted;
}

function getHintStatus($pname, $cur_ques)
{
	$x = mysql_fetch_row(mysql_query("SELECT `hintcheck` FROM `gamedata` WHERE `pname`='".$pname."'"));
	return $x[0];
	//if 0 => hint has not been taken
	//if 1 => hint has been taken
}
?>