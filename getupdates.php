<?php
require_once('authen.php');
require_once('functions.php');
$pname = decrypt_css($_COOKIE['_u__']);
	
switch ($pname) {
	case 'rootcss':
		$message = 'this is rootcss....testing testing......';
		break;
	case 'pgadmin':
		$message = 'this is pgadmin....testing testing......';
		break;
	default:
		$message = 'Those all have done Pre-registration will get 5 bonus points.';
		break;
}

echo'<marquee>Updates : '.$message.'</marquee>';
?>