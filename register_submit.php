<?php
	if(!empty($_POST['fname']) && !empty($_POST['pname']) && !empty($_POST['aid']) && !empty($_POST['mobile']) &&
	 !empty($_POST['email']) && !empty($_POST['password']))
	{
		require('authen.php');
		$fname=addslashes($_POST['fname']);
		$pname=addslashes(strtolower($_POST['pname']));
		$regno=addslashes($_POST['regno']);
		$mobile=addslashes($_POST['mobile']);
		$email=addslashes(strtolower($_POST['email']));
		$password=md5($_POST['password']);
		$referral=addslashes(strtolower($_POST['referral']));
		$aid=addslashes($_POST['aid']);

		$query="SELECT COUNT(pname) FROM `userdata` WHERE `pname`='".$pname."'";
		$value=mysql_fetch_row(mysql_query($query));
		if($value[0] == 0)	//username is available
		{
			$query="SELECT COUNT(aid) FROM `userdata` WHERE `aid`='".$aid."'";
			$value=mysql_fetch_row(mysql_query($query));
			if($value[0] == 0)
			{				
				$query="INSERT INTO `userdata` (`name`,`pname`,`aid`,`password`,`regno`,`mobile`,`email`,`referral`) 
				VALUES('".$fname."','".$pname."','".$aid."','".$password."','".$regno."','".$mobile."','".$email."','".$referral."')";
				mysql_query($query);
				//echo $query;
				$query="INSERT INTO `gamedata` (`pname`) VALUES ('".$pname."')";
				mysql_query($query);
				echo'User created. Remember your Player name &amp; password for log in.';
			}
			else
			{
				echo'User with this Aaruush ID already exists.';
			}	
		}
		else
		{
			echo'Player name already taken.';	
		}
	}	
	else
	{
		echo'Please fill up all (*) fields.';
	}	

?>