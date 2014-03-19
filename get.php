<?php
require_once('authen.php');
require_once('functions.php');
$pname = decrypt_css($_COOKIE['_u__']);
$cur_ques=decrypt_css($_COOKIE['_c_q__']);
//echo "<script>alert('".$cur_ques."')</script>";
if(!empty($_POST['path']))
{
	$path = $_POST['path'];
	switch ($path) {
		case "1":
			$cur_ques = "1#1";
			break;
		case "2":
			$cur_ques = "2#1";
			break;
		case '2a':
			$cur_ques = "2#3";	
			break;
		case '3':
			$cur_ques = "3#1";	
			break;	
		case '3a':
			$cur_ques = "3#3";	
			break;
		case '4':
			$cur_ques = "4#1";	
			break;		
		default:
			break;
		}
}
setcookie('_c_q__',encrypt_css($cur_ques));
$value = check_already_login();
if ($value != 1)	//not logged in
	header('location:login.php');
else
{
	switch ($cur_ques) {


		case '1':
			getQuestion($cur_ques);
			include('input_box.php');
			break;



		//CASE for 2--------------------------------------------		
		case '2':
			echo '
			<style>
			#holder{background:url("./images/q1.jpg") no-repeat center center / auto 120%; }
			#door1{margin-left:55px;margin-top:180px;width:130px;border-radius:35px 55px 10px 15px;height:200px;position:absolute;}
			#door2{padding-top:50px;margin-left:460px;margin-top:190px;width:100px;height:120px;border-radius:25px 40px 10px 15px;position:absolute;}
			#door2_c{padding-top:50px;margin-left:460px;margin-top:190px;width:100px;height:120px;border-radius:35px 45px 5px 5px;background:rgba(50,50,100,0.5);position:absolute;color:#fafafa;}
			#door3{margin-left:825px;margin-top:190px;width:120px;height:200px;border-radius:25px 40px 20px 10px;position:absolute;}
			</style>';
			echo '
			<script>			
				$(document).ready(function(){
					$("#question").hide();
					$("#user_answer").fadeOut();
					$("#door2_c").hide();
					$("#door1").click(function(){
						$.ajax({
							type: "POST",
							url: "get.php",
							data: { path: "1"}
						}).done(function( data ) {
							$("#data_content").html(data);
						});	
					});
					$("#door2").click(function(){
						$("#door2_c").fadeToggle();
					});
					$("#door2_c").click(function(){
						$("#door2_c").fadeToggle();
					});
					$("#door3").click(function(){
						$.ajax({
							type: "POST",
							url: "get.php",
							data: { path: "2"}
						}).done(function( data ) {
							$("#data_content").html(data);
						});	
					});
				});
			</script>
			';
			echo'
				<div id="door1"></div>
				<div id="door2"></div>
				<div id="door2_c"><center>This door is closed.<br> No entry !!</center></div>
				<div id="door3"></div>
			';
			break;





		case '1#7':
		case '2#8':
		case '3#8':
		case '4#8':
			$query="UPDATE `gamedata` SET `phase1`='1' WHERE `pname`='".$pname."'";
			mysql_query($query);	//this will block the user within the first phase
			echo'<style>#holder{background:url(images/phase1.jpg);}</style>';
			echo'<script>
				$(document).ready(function(){
					$("#back_btn").hide();
				});
				</script>';
			echo'<span style="float:right;margin-top:350px;"><h2>
						Journey will continue in Phase 2...
				</h2></span>';
			
			break;
		



		//CASE for 2#2--------------------------------------------		
		case '2#2':
			echo '
			<style>
			#holder{background:url("./images/q2.jpg") no-repeat center center / auto 100%; }
			#door21{margin-left:161px;margin-top:130px;width:130px;border-radius:35px 55px 10px 15px;height:270px;position:absolute;cursor:pointer;}
			#door22{padding-top:50px;margin-left:490px;margin-top:200px;width:100px;height:120px;border-radius:25px 40px 10px 15px;position:absolute;cursor:pointer;}
			#door22_c{padding-top:50px;margin-left:490px;margin-top:200px;width:100px;height:120px;border-radius:35px 45px 5px 5px;background:rgba(50,50,100,0.7);position:absolute;color:#fafafa;}
			#door23{margin-left:794px;margin-top:167px;width:120px;height:240px;border-radius:25px 40px 20px 10px;position:absolute;cursor:pointer;}
			</style>';
			echo '
			<script>			
				$(document).ready(function(){
					$("#question").hide();
					$("#user_answer").fadeOut();
					$("#door22_c").hide();
					$("#door21").click(function(){
						$.ajax({
							type: "POST",
							url: "get.php",
							data: { path: "2a"}
						}).done(function( data ) {
							$("#data_content").html(data);
						});
					});
					$("#door22").click(function(){
						$("#door22_c").fadeToggle();
					});
					$("#door22_c").click(function(){
						$("#door22_c").fadeToggle();
					});
					$("#door23").click(function(){
						$.ajax({
							type: "POST",
							url: "get.php",
							data: { path: "3"}
						}).done(function( data ) {
							$("#data_content").html(data);
						});	
					});
				});
			</script>
			';
			echo'
				<div id="door21" onclick="console.log(0);"></div>
				<div id="door22"></div>
				<div id="door22_c"><center>This door is closed.<br> No entry !!</center></div>
				<div id="door23"></div>
			';
			break;



		//CASE for 3#2--------------------------------------------	
		case '3#2':
			echo '
			<style>
			#holder{background:url("./images/q4.jpg") no-repeat center center / auto 120%; }
			#door31{margin-left:175px;margin-top:315px;width:130px;border-radius:35px 55px 10px 15px;height:200px;position:absolute;cursor:pointer;}
			#door33{margin-left:580px;margin-top:427px;width:120px;height:120px;border-radius:25px 40px 20px 10px;position:absolute;cursor:pointer;}
			</style>';
			echo '
			<script>			
				$(document).ready(function(){
					$("#question").hide();
					$("#user_answer").fadeOut();
					$("#door31").click(function(){
						$.ajax({
							type: "POST",
							url: "get.php",
							data: { path: "3a"}
						}).done(function( data ) {
							$("#data_content").html(data);
						});
					});
					$("#door33").click(function(){
						$.ajax({
							type: "POST",
							url: "get.php",
							data: { path: "4"}
						}).done(function( data ) {
							$("#data_content").html(data);
						});	
					});
				});
			</script>
			';
			echo'
				<div id="door31" onclick="console.log(0);"></div>
				<div id="door33"></div>
			';
			break;
			
		


		//DEFAULT CASE-------------------------------------------------		
		default:
			getQuestion($cur_ques);
			include('input_box.php');
			break;
	}
}
?>