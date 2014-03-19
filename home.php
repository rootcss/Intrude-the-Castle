<?php
require_once('authen.php');
require_once('functions.php');
$value = check_already_login();
if ($value != 1)
{
	header('location:login.php');	//redirects if not logged in.
}	
else
{
	$pname=decrypt_css($_COOKIE['_u__']);
	$cur_ques = getStatus($pname);
	$cur_score = getScore($pname);
	setcookie('_c_q__',encrypt_css($cur_ques));
	echo '
		<html>
		<head>
		<title>'.$pname.' | Intrude the Castle - Online Event - Aaruush 13</title>
		<link rel="stylesheet" href="./css/home.css" type="text/css">
		<script src="./js/jquery-latest.min.js"></script>
		<script src="./js/home.js"></script>
	';
	echo '<div id="welcome">
			<div id="status"><br>
				Your Score
				<h1>'.$cur_score.'</h1>
				<span id="close" title="Click to close">X</span>';
				echo'
				Press "M" to open/close the map.
				';
				if(isPhaseOneComplete($pname) == 1)	//if completed
				{
					echo "<center>You have completed first phase.<br>
					Kindly wait for Phase 2.
					</center>";
				}	
		echo'</div>
		</div>';
}
?>
<style> 
body {background: url('./images/q3.jpg') repeat center center / auto 150% transparent;}
*{cursor: url(images/cursor.png), progress;}
</style>
<link rel="stylesheet" href="./css/map.css" type="text/css">
<script src="./js/keyboard.js"></script>
<script src="./js/leftslider.js"></script>
</head>
<body>
<div id="wrapper">
	<div id="header">
		<div id="header_content">
			<div id="logo">				
				<a href="./home.php">&nbsp; &nbsp; &nbsp;Welcome <?php echo $pname; ?>,</a>
			</div>
			<a href="http://www.aaruush.net" target="_blank">
			<div id="aaruush">
				<div id="first_a">
					<img src="images/aaruush.png" height=100% width=100%>
				</div>
				<div id="second_a">
					<img src="images/aaruushtext.png" height=100% width=100%>
				</div>	
			</div>	
			<div id="navbar">				
				<ul>
					<a href="./trailer/index.php" target="_blank"><li>Trailer</li></a>
					<a href="./rulesx.php" target="_blank"><li>Rules</li></a>
					<a href="./leaderboard.php" target="_blank"><li>Leaderboard</li></a>
					<li class="status_link">Status</li>
					<li id="logout">Logout</li>
				</ul>
			</div>
		</div>
		<div id="header_pull" title="Click to pull the slider">
			*
		</div>	
	</div>
	
	<div id="container">
		
		<!--HOLDER is the whole div : whose width is same as navbar-->
		<div id="holder">
			
			<?php
			if(isPhaseOneComplete($pname) != 1)	//if completed
			{				
				echo'<button id="back_btn">Go Back</button>';
			}
			?>
			<!--This div is to hold the questions-->
			<div id="data_content">
				<?php
					if(isPhaseOneComplete($pname) == 1)	//if completed
					{
						echo'<script>
						$(document).ready(function(){
							$("#back_btn").hide();
						});
						</script>';
						echo'<style>';
						//#holder{background:url(images/phase1.jpg);}';
						echo'body {background: url(images/phase1.jpg) repeat center center / auto 100% transparent;}
						#back_btn{display:none;}</style>';
						echo'<span style="float:right;margin-top:350px;"><h2>
						Journey will continue in Phase 2...
						</h2></span>';
						
					}
					else
					{
						if($cur_ques == 1)
						{	
							//$path = "0";
							//setcookie('_p__',encrypt_css($path));
							echo'<center><button id="start_btn" class="btn">Start</button></center>';
						}
						else					
							echo'<center><button id="continue_btn" class="btn">Continue</button></center>';					
					}
				?>
			</div>
		</div>
		
		<!--HINTS SECTION-->
		<div id="leftside_h">			
			<div class="leftcontent">
				<span class="leftclose" title="close this panel"> X </span>
				<b>Hints &amp; Suggestions</b><br><br>
			</div>
		</div>
			
		<!--EVENT DETAILS SECTION-->	
		<div id="leftside_e">	
			<div class="leftcontent">
				<span class="leftclose" title="close this panel"> X </span>
				<b>Details of Event</b><hr>
				Attacked by the strongest enemies, the Prince of Baldargan 
				must save his kingdom by INTRUDING the Witch Castle, 
				where lies their only "HOPE". The path contains several
				 obstacles that he must overcome to reach "The Destination".
				 <br>

			</div>
		</div>
		
		<!--ABOUT US SECTION-->	
		<div id="leftside_a">		
			<div class="leftcontent">
				<span class="leftclose" title="close this panel"> X </span>
				<b>About Us - The Team</b><hr>
				<u><b>Co-ordinators</b></u> :-<br>
				 Chandrashekhar Singh<br>
				 Punit Gupta<br>
				 Shashank Prasad Rao<br><br>
				<u><b>Committee Members</b></u> :<br>
				 Anshul Sahani<br>
				 Prachi Tripathy<br>
				 Shreya Mishra<br>
				 Jasneet Saini<br>
				 Sonal Chandani<br>				 
				 Payal Agarwal<br>
				 Sagar Khanna<br>
				 <br>
				 <u><b>Tech. Support &amp; Help</b></u> :<br>
				 <a href="https://facebook.com/shekhar003.singh">Shekhar Singh</a> - 9962244695<br>
				 <a href="https://facebook.com/punit.g7">Punit Gupta</a> - 9840309508<br>
				 <a href="https://www.facebook.com/shazbrooklyn">Shashank Prasad</a> - 9790771629
			</div>
		</div>

		<!--Hints SECTION-->
		<div id="arrow_h" title="click for hints">
			<br>H
		</div>
		<!--Event SECTION-->
		<div id="arrow_e" title="click for details of event">
			<br>E
		</div>
		<!--About us SECTION-->
		<div id="arrow_a" title="click for know about us">
			<br>A
		</div>
		<!--map SECTION-->
		<div id="arrow_m" title="click for map">
			<br>M
		</div>
	</div>
</div>


<div class="map">
	<iframe height=615 scrolling=no width=470></iframe>
</div>

<script src="./js/regular.js"></script>

<!--<div id="footer">
	<div id="share1">
		<a href="#" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent('http://itc.aaruush.net/'), 'facebook-share-dialog','width=626,height=436');return false;">
		  Share on Facebook
		</a>
	</div>
-->	
	<!--
	<span class="sometext">Referral link for bonus points and hints.<br></span>
	<div id="share2">
		<?php //echo '<input type="text" value="http://itc.aaruush.net?x='.$pname.'">'; ?>
	</div>
	
</div>
-->

	<div id="share1">
		<a href="#" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent('http://itc.aaruush.net/'), 'facebook-share-dialog','width=626,height=436');return false;">Share on Facebook</a>
	</div>

<div id="loading">
	<img src="./images/loading.gif">
</div>

<div id="confirmation">
	<div id="data_confirm">
		Are you sure ?<br><br>
		<button id="positive">YES</button>
		<button id="negative">NO</button>
		<br><br>
		<span style="font-size:22px;">
			50% of mraks will be deducted for pressing "Yes".
		</span>
	</div>
</div>

<div id="confirmation2">
	<div id="data_confirm2">
		Are you sure ?<br><br>
		<button id="positive2">YES</button>
		<button id="negative2">NO</button>
		<br><br>
		<span style="font-size:20px;">Pressing "Yes" will result in decrement of points.
			<br>
			(if you are viewing hint for the first time.)
			All questions might not have hint. But you marks will be reduced, on viewing it.
		</span>
	</div>
</div>

<style>
#brainse{width: 170px;height: 50px;float: right;margin-right: 20px;
background: #cccccc url(images/brainse.jpg) no-repeat center center / auto 90%;border-radius: 5px;}
</style>
<a href="http://brainse.info" target="_blank">
	<div id="brainse">
		<span style="position:absolute;font-weight:bold;font-size:20px;margin-top:-30px;color:#fafafa;">Powered by :</span>
	</div>	
</a>
</body>
</html>