<?php
if(!empty($_POST['username']) && !empty($_POST['password']))
{
	$username = addslashes($_POST['username']);		
	$password = addslashes($_POST['password']);
	//echo'<script>alert("'.$username.'")</script>';
	require_once('authen.php');
	require_once('functions.php');
	$query="SELECT COUNT(pname) FROM `userdata` WHERE `pname`='".$username."'";
	$value=mysql_fetch_row(mysql_query($query));
	if($value[0] == 0)
	{
		echo "<script>alert('User do not exist.')</script>";				
		echo'<meta http-equiv="refresh" content="0; url=login.php"> ';

	}
	else
	{
		$query="SELECT `password` FROM `userdata` WHERE `pname`='".$username."'";
		$res=mysql_query($query);
		while($data=mysql_fetch_array($res)){
			$ori_pwd=$data['password'];
		}
		if( $ori_pwd == md5($password) )
		{	
			setcookie('_u__',encrypt_css($username));
			echo'<meta http-equiv="refresh" content="0; url=rules.php"> ';
		}
		else
		{
			echo '<script>alert("Incorrect Password.")</script>';				
			echo'<meta http-equiv="refresh" content="0; url=login.php"> ';
		}
	}
}
else
{
	echo '<script>alert("Please enter all fields.")</script>';
	echo'<meta http-equiv="refresh" content="0; url=login.php"> ';
}
?>