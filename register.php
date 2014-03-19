<?php
	require_once('functions.php');
	$value = check_already_login();
	if ($value == 1)
		header('location:home.php');//redirects if already logged in.
?>
<html>
<head>
<style>
body{background: #000000 url('./images/2.jpg') no-repeat center center / auto 170%;margin: 0px;padding: 0px;} 
#wrapper{width:1100px;height: 625px;margin: 0px auto;text-decoration:none;}
#reg_form_box{width:255px;height:520px;margin:0px auto;border: 1px solid #fafafa;padding-top: 25px;padding-bottom:25px;
background: rgba(10,10,10,0.9);border-radius: 10px;padding-left: 50px;padding-right: 50px;}
#reg_form_box input{box-shadow: 0px 0px 2px 0px #fafafa;outline: 0px;border: 1 px solid;font-size:18px;padding: 2px;border-radius: 1px;}
#head_reg{text-align: center;font-size: 28px;color: #fafafa;}
#reply{color: red;font-family: Calibri;font-size: 17px;}
#aaruush{color: #fafafa;font-size: 20px;}
#aaruush a{color: #ff0000;text-decoration: none;}
#aaruush a:hover{text-decoration: underline;color: #fafafa;}
.ast{float: left;font-size: 18px;color: red;}
#login{margin: 0px auto;width:335px;border-radius:10px;background: rgba(10,10,10,0.9);border: 1px solid #fafafa;padding: 10px;text-align: center;font-size: 25px;}
</style>
<script src="./js/jquery-latest.min.js"></script>
<script>
$(document).ready(function(){
	$("#submit").click(function(){
		var fname = $("#fname").val();
		var pname = $("#pname").val();
		var aid = $("#aid").val();
		var regno = $("#regno").val();
		var mobile = $("#mobile").val();
		var email = $("#email").val();
		var password= $("#password").val();
		var referral = $("#referral").val();
		$.ajax({
			type: "POST",
			url: "register_submit.php",
			data: { fname: fname, pname:pname, aid:aid, regno:regno, mobile:mobile, email:email, password:password, referral:referral}
		}).done(function( data ) {
			$("#reply").html(data);
		});
	});
});
</script>
</head>
<body>
<div id="wrapper">
	<center><span id="head_reg">Event - Registration</span></center>
	<br>
	<div id="reg_form_box">
			<span class="ast">*</span><input id="fname" placeholder="Full name"><br><br>
			<span class="ast">*</span><input id="pname" placeholder="Player name"><br><br>
			<span class="ast">*</span><input id="aid" placeholder="Aaruush ID"><br><br>
			<span class="ast">&nbsp;&nbsp; </span><input id="regno" placeholder="Register no"><br><br>
			<span class="ast">*</span><input id="mobile" placeholder="Mobile"><br><br>
			<span class="ast">* </span><input id="email" placeholder="Email"><br><br>
			<span class="ast">* </span><input type="password" id="password" placeholder="Password"><br><br>
			<span class="ast">&nbsp;&nbsp; </span><input id="referral" placeholder="Referral's Aaruush ID"><br><br>
			<center><input type="submit" id="submit" value="Register"></center>
		
			<center><span id="aaruush">
				Don't have Aaruush ID, <br><a target="_blank" href="http://register.aaruush.net">Get it here</a>
			</span></center>
			<center><span id="reply"></span></center>
	</div>
	<div id="login">
		<a style="color:#ffffff;" href="login.php">Log In</a>
	</div>
</div>
</body>
</html>