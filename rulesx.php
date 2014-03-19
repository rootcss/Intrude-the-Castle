<?php
require_once('authen.php');
require_once('functions.php');
$value = check_already_login();
if ($value != 1)
{
	header('location:login.php');	//redirects if not logged in.
}
?>
<html>
<head>
	<title>Rules | Intrude the Castle - Online Event - Aaruush 13</title>
<style>
body{margin: 0px auto;background: #000000;}
#wrapper{margin:0px auto;width: 1200px;height: 650px;}
#header{width: 100%;height: 50px;background: #777777;font-size: 35px;text-align: center;font-weight: bold;}
#contanier{width: 100%;height: 600px;}
#left{width: 300px;height: 100%;background: #444444 url(images/rules.jpg) no-repeat top center /100% auto;float: left;}
#right{width: 900px;height: 600px;background: #999999;float: right;font-size: 20px;overflow: auto;}
#start_game_btn{font-size:20px;margin-left: 670px;margin-top:250px; }
a{text-decoration: none;}
.button{
border:1px solid #df0909; -webkit-border-radius: 3px; -moz-border-radius: 3px;border-radius: 3px;font-family:arial, helvetica, sans-serif; padding: 10px 10px 10px 10px; text-shadow: -1px -1px 0 rgba(0,0,0,0.3);font-weight:bold; text-align: center; color: #000000; background-color: #f62b2b;
 background-image: -webkit-gradient(linear, left top, left bottom, from(#f62b2b), to(#d20202));
 background-image: -webkit-linear-gradient(top, #f62b2b, #d20202);
 background-image: -moz-linear-gradient(top, #f62b2b, #d20202);
 background-image: -ms-linear-gradient(top, #f62b2b, #d20202);
 background-image: -o-linear-gradient(top, #f62b2b, #d20202);
 background-image: linear-gradient(to bottom, #f62b2b, #d20202);filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr=#f62b2b, endColorstr=#d20202);
}

.button:hover{
 border:1px solid #b30808; background-color: #e40a0a;
 background-image: -webkit-gradient(linear, left top, left bottom, from(#e40a0a), top(#9f0202));
 background-image: -webkit-linear-gradient(top, #e40a0a, #9f0202);
 background-image: -moz-linear-gradient(top, #e40a0a, #9f0202);
 background-image: -ms-linear-gradient(top, #e40a0a, #9f0202);
 background-image: -o-linear-gradient(top, #e40a0a, #9f0202);
 background-image: linear-gradient(to bottom, #e40a0a, #9f0202);filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr=#e40a0a, endColorstr=#9f0202);
}
.button_other{
border:1px solid #b7b7b7; -webkit-border-radius: 3px; -moz-border-radius: 3px;border-radius: 3px;font-family:arial, helvetica, sans-serif; padding: 10px 10px 10px 10px; text-shadow: -1px -1px 0 rgba(0,0,0,0.3);font-weight:bold; text-align: center; color: #000000; background-color: #d3d3d3;
 background-image: -webkit-gradient(linear, left top, left bottom, from(#d3d3d3), to(#707070));
 background-image: -webkit-linear-gradient(top, #d3d3d3, #707070);
 background-image: -moz-linear-gradient(top, #d3d3d3, #707070);
 background-image: -ms-linear-gradient(top, #d3d3d3, #707070);
 background-image: -o-linear-gradient(top, #d3d3d3, #707070);
 background-image: linear-gradient(to bottom, #d3d3d3, #707070);filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr=#d3d3d3, endColorstr=#707070);
}

.button_other:hover{
 border:1px solid #a0a0a0; background-color: #bababa;
 background-image: -webkit-gradient(linear, left top, left bottom, from(#bababa), top(#575757));
 background-image: -webkit-linear-gradient(top, #bababa, #575757);
 background-image: -moz-linear-gradient(top, #bababa, #575757);
 background-image: -ms-linear-gradient(top, #bababa, #575757);
 background-image: -o-linear-gradient(top, #bababa, #575757);
 background-image: linear-gradient(to bottom, #bababa, #575757);filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr=#bababa, endColorstr=#575757);
}
</style>
</head>
<body>
	<div id="wrapper">
		<div id="header">
			Rules &amp; Regulations
		</div>
		<div id="contanier">
			<div id="left">
			</div>
			<dv id="right">
				<ul>
				<li>Phase 1 is just the journey from Tower to Castle</li>
				<li>Taking a hint will reduce your score by 3 points.</li>
				<li>There are multiple ways to reach the castle in Phase 1.</li>				
				<li>You can choose any of the path using MAP (Press M).</li>
				<li>Points are awarded for successfully answering the question.</li>
				<li>Points vary according to the path chosen.</li>
				<li>Retracing/Changing path is allowed but points will be deducted for retracing back.</li>
				<li>Hints can be accessed anytime but some points will be decremented.</li>
				<li><b>Anytime Press M, to view Map &amp; current location.</b></li>
				<li>You can use Internet for any help. (Google)</li>
				</ul>
			</div>
		</div>	
	</div>	
</body>	
</html>