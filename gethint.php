<style>
#hintdata{background: rgba(10,10,10,0.9);color: #eeeeee;border-radius: 0px 10px 10px 0px;padding: 10px;padding-left: 50px;height: 500px;width: 300px;}
.leftclose{width: 30px;height: 30px;}
</style>
<script>
$(document).ready(function(){
	$(".leftclose").click(function(){
		$("#leftside_h").fadeOut();		
	});
});	
</script>
<div id="hintdata">
	<span class="leftclose" title="close this panel"> X</span>	
	<h2>Hints</h2>
	<hr>
<?php
require_once('authen.php');
require_once('functions.php');
$pname=decrypt_css($_COOKIE['_u__']);
$cur_ques=decrypt_css($_COOKIE['_c_q__']);
$query="SELECT * FROM `quest` WHERE `qid`='".$cur_ques."'";
$res=mysql_query($query);
while ($data=mysql_fetch_array($res)) 
{
	$hint = "<h3>Hint for current question :</h3>".$data['hint']."<br>";
}
if (getHintStatus($pname, $cur_ques) == 0)	//taking the hint for the first time
{
	//TAKING THE HINT will reduce the score by 3 marks for each question
	mysql_query("UPDATE `gamedata` SET `score`=`score` - 3 WHERE `pname`='".$pname."'");
	echo $hint;
	mysql_query("UPDATE `gamedata` SET `hintcheck`= 1 WHERE `pname`='".$pname."'");
}
else	
{
	echo $hint;
}
?>
</div>