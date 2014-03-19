<?php
require_once('authen.php');
require_once('functions.php');
$value = check_already_login();
if ($value != 1)
{
	header('location:login.php');	//redirects if not logged in.
}
?>
<style>
body{background: rgba(0,0,0,0.6);font-weight: bold;}
*{cursor: url(images/cursor.png), progress;}
.heading{font-weight: bold;font-size: 25px;color: #fafafa;}
.members{font-size: 23px;color: red;}
.normal{font-size: 23px;}
table{border: 1px solid black;width: 800px;text-align: center;margin: 0px auto;padding: 0px;border-radius: 5px;}
td{border: 0px solid white;border-top: 1px solid black;padding: 5px;font-weight: bold;}
h{font-size: 40px;color: #fafafa;}
.player{font-size: 32px;color: #fafafa;}
.lead{background: rgba(0,0,0,0.5);}
</style>
<body>
<?php
$cols = mysql_query("SELECT * FROM `gamedata` ORDER BY `score` DESC LIMIT 0,30");

echo '<table>';
echo '<tr class="lead"><td colspan=3><h>Leaderboard</h></td></tr>';
echo '<tr class="heading"><td>Player Name</td><td>Score</td><td>Phase</td></tr>';

while ($data = mysql_fetch_array($cols)) {
	if ($data['pname'] == 'rootcss' || $data['pname'] == 'pgadmin' || $data['pname'] == 'anshul') 
	{
		echo '<tr class="members">
		<td>'.$data['pname'].' <font size=3 color=white> (from team)</font></td>
		<td>'.$data['score'].'</td>
		<td>'.$data['phase1'].'</td>
		</tr>';	
	}
	else
	if ($data['pname'] == decrypt_css($_COOKIE['_u__'])) {
		echo '<tr class="player">
		<td>'.$data['pname'].'</td>
		<td>'.$data['score'].'</td>
		<td>'.$data['phase1'].'</td>
		</tr>';	
	}
	else 
	{
		echo '<tr class="normal">
		<td>'.$data['pname'].'</td>
		<td>'.$data['score'].'</td>
		<td>'.$data['phase1'].'</td>
		</tr>';
	}	
}
?>