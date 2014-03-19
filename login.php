  <?php
	require_once('functions.php');
	$value = check_already_login();
	if ($value == 1)
		echo'<meta http-equiv="refresh" content="0; url=rules.php"> ';
		//header("location:home.php");
?>
<html>
<head>
<style>
body{background: #000000;margin: 0px;padding: 0px;background: url('./images/1.jpg') no-repeat center center;overflow: hidden;} 
#wrapper{width:1100px;height: 620px;margin: 0px auto;text-decoration:none;}
#reg_form_box{width:250px;height:260px;margin:0px auto;padding:40px;background: rgba(10,10,10,0.5);margin-top: 140px;border-radius: 10px;}
#reg_form_box input{font-size:18px;padding: 2px;border-radius: 1px;box-shadow: 0px 0px 2px 0px #fafafa;outline: 0px;border: 1 px solid;}
#head_reg{text-align: center;font-size: 28px;}
#link_n{font-size: 17px;color: #fafafa;margin-bottom: 0px;position: absolute;margin-left: -60px;}
#text{font-size: 28px;color: #fafafa;}
.message{color: red;}
#username{width: 250px;border: 0px;height: 30px;}
#password{width: 250px;border: 0px;height: 30px;}
#btn_submit{border: 0px;height: 35px;width: 70px;}
#reply{color: red;text-align: center;font-size: 18px;}
#login{margin: 0px auto;width:315px;border-radius:10px;background: rgba(10,10,10,0.6);color:#fafafa;padding: 10px;font-size: 20px;}
#login td{color: #fafafa;}
</style>
<script type="text/javascript">
function validate(form) {
	for(var i=0;i<form.elements.length;i++) {
		if(form.elements[i].value=="") {
			document.getElementById("reply").innerHTML="Please enter all fields.";
			return false;
		}
		else
		{
			return true;	
		}
	}
}
</script>
</head>
<body>	
<div id="wrapper">
	<div id="reg_form_box">
		<span id="text"><center>Event - Log In</center></span><br>
			<form action="login_submit.php" method="POST" onsubmit="return validate(this)">
			<input id="username" type="text" name="username" placeholder="Player name" required><br><br>
			<input id="password" type="password" name="password" placeholder="Password" required><br><br>
			<center><input id="btn_submit" type="submit" value="Log In"></center>
			</form>
			<center><span id="reply"></span></center>

		<center><span id="link_n">Not registered yet?<br><a href="register.php">Register here.</a></span></center>
	</div>

	<div id="login">
		<center>Tech. Support :</center>
		<table width=100%>
		<tr><td>Shekhar Singh</td><td>9962244695</td></tr>
		<tr><td>Punit Gupta</td><td>9840309508</td></tr>
		<tr><td>Shashank Prasad</td><td>9790771629</td></tr>
		</table>
	</div>

</div>	
</body>

</html>
