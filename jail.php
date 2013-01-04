<?php
error_reporting(0);

/*** Crimestyle | Perfect Edition | Check RPGBUNNY.COM for more Full RPG Sources | www.rpgbunny.com ***/

/***********************************************
* © Rpgbunny.com (www.rpgbunny.com)
* This notice MUST stay intact for legal use
* You need a valid product order number to use this source
* Without this your running an illegal version
* We check our products from time to time. If asked you have to show this number
* Visit Rpgbunny.com at http://www.rpgbunny.com/ for more RPG games and layouts
***********************************************/

  include("_include-config.php");
  include("data/names.php");

if(! check_login()) {
    header("Location: login.php");
    exit;
  } 
?>


<html>
<head>
<link rel="stylesheet" type="text/css" href="<? echo $sitelink;?>/layout/crimestyle12/css/css.css"><script language="javascript" src="js/code_highlighter.js"></script>
<script language="javascript" src="js/display.js"></script>
<script language="javascript" src="js/duration_progress.js"></script>
<script language="javascript" src="js/functions.js"></script>
<script language="javascript" src="js/prototype-1.6.0.2.js"></script>
<script language="javascript" src="js/swfobject.js"></script>

</head>
<body style="margin: 0px;">
<script language="javascript" src="js/wz_tooltip/tip_balloon.js"></script>
<script language="javascript" src="js/wz_tooltip/wz_tooltip.js"></script>
<?
if(isset($_POST['jailer'])){
$data2 = mysql_query("SELECT *,UNIX_TIMESTAMP(`baktijd`) AS `baktijd`,0 FROM `users` WHERE `id`='{$_POST['jailer']}'");
$data1 = mysql_fetch_object($data2);
$datijd = $data1->gevangenis;
if($data1->baktijd + $datijd > time()){
$countdown = $data1->baktijd+$datijd-time();
$borg = $countdown*180;
if($data->contant > $borg){
mysql_query("UPDATE `users` SET `contant`=`contant`-'$borg' WHERE `id`='$data->id'");
mysql_query("UPDATE `users` SET `gevangenis`='0' WHERE `id`='$data1->id'");
$bedrag = number_format($borg, 0, '.' , '.');
$date2 = (date('m/d H:i'));
mysql_query("INSERT INTO `messages`(`date`,`to`,`from`,`ip`,`title`,`content`,`date2`,`read`,`inbox`,`reply`) values(NOW(),'$data1->login','Anonymous','$data->IP','Bailout!','$data->login has paid $bedrag to get you out of jail. Your free now!','$date2','0','1','0')");
$error = niks;
}else{$error = 1;}
}else{$error = niks;}
}
if($error == niks){
$borg = number_format($borg, 0, '.' , '.');
$_SESSION['mission'] = "Pay the bail to get someone out of jail";
?>
			<table width="100%">
	<tr>
		<td align="center">
			<br><br><br><br>
			<table class="div_popup" align="center">
				<tr>
					<td>
						The bailout for <b><?echo$data1->login;?></b> is paid. This cost you <?echo$borg;?>.					</td>
				</tr>
				<tr>
					<td>
						<br><br>
							<a href="jail.php" class="msg_ok">Click here if you do not automatically redirect.</a>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<script language="javascript">
	setTimeout("document.location.href='jail.php'",(4000*2));
</script>
		</div>
	</td>
	</tr>

	</table>
	</td>
<?}
if($error == 1){
?>
			<table width="100%">
	<tr>
		<td align="center">
			<br><br><br><br>
			<table class="div_popup_error" align="center">
				<tr>
					<td style="color:red">
						<b>Error!</b><br><br>You dont have that much money				</td>
				</tr>
				<tr>
					<td>
						<br><br>
													<a href="#" onClick="history.go(-1); return false" class="error_ok">OK</a>
											</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
		</div>
	</td>
	</tr>

	</table>
	</td>
<?}if($error == ""){?>


					<div class="title_bg">
			<div class="title">Prison</div>
		</div>

		<div style="background-color:#dbd2b7; padding:10px; padding-top:4px;">
		<table cellpadding="0" cellspacing="0" width="100%"><tr><td>
			<form method="POST">
            Here you can see all the players who are currently in prison. Use the bailout button if you like to make some friends.<br \>
	<br \>
	<table width="100%" cellspacing="2" cellpadding="2" class="mod_list">
		<tr>
			<td width="6%">&nbsp;</td>
			<td width="6%">&nbsp;</td>
			<td><b>User</b></td>
			<td width="6%">&nbsp;</td>
			<td><b>Rank</b></td>
			<td width="6%">&nbsp;</td>
			<td><b>Time</b></td>
			<td width="6%">&nbsp;</td>
			<td><b>Bail</b></td>
		</tr>
<?
$user1            = mysql_query("SELECT * FROM `users`");
while($user = mysql_fetch_object($user1)){
	$data2            = mysql_query("SELECT *,UNIX_TIMESTAMP(`baktijd`) AS `baktijd`,0 FROM `users` WHERE `login`='$user->login'");
	  $data1            = mysql_fetch_object($data2);
$datijd = $user->gevangenis;
	$tijdverschil1        = $data1->baktijd-3600+$datijd-time();
	if($data1->baktijd + $datijd > time()){
   list($uur,$min,$sec)=explode(":",date("H:i:s",$tijdverschil1));
$bak1            = mysql_query("SELECT *,UNIX_TIMESTAMP(`baktijd`) AS `baktijd`,0 FROM `users`");
$countdown = $data1->baktijd+$datijd-time();
$borg = number_format($countdown*180, 0, '.' , '.');
$rang = array("","$ranks_1","$ranks_2","$ranks_3","$ranks_4","$ranks_5","$ranks_6","$ranks_7","$ranks_8","$ranks_9","$ranks_10");
$rang = $rang[$user->rank];
?>
							<tr class="top">
						<td><input type="radio" name="jailer" value="<?echo$user->id;?>"></td>
						<td align="center" width="6%"><img src="images/icons_gif/status_online.gif"></td>
						<td><a href="generalprofile.php?x=<?echo$user->id;?>"><?if($user->login == $admin){?><FONT color='red'><?}if($user->login == $moderator){?><FONT color='#FF6600'><?}echo$user->login; if($user->login == $admin || $user->login == $moderator){?></FONT><?}?><?if($user->vipdays > 0){?><img src="images/star.gif" border="0" width="10" height="10" alt="Paid account"><?}?></a></td>
						<td align="center" width="6%"><img src="images/icons_gif/time.gif"></td>
						<td><?echo$rang;?></td>
						<td align="center" width="6%"><img src="images/icons_gif/coins.gif"></td>
						<td id="jail_<?echo$user->id;?>">
						<SCRIPT language="JavaScript">
						countdown(<?echo$countdown;?>,'jail_<?echo$user->id;?>','');
						</SCRIPT>

						</td>
						<td align="center" width="6%"><img src="images/icons_gif/money.gif"></td>
						<td>&euro; <?echo$borg;?></td>
					</tr>
<?}}?>
						</table>
	<br>
	<input type="submit" name="submit" value="Bailout" class="mod_submit">
		</td></tr></table>
		</div>

		<table width='100%' cellspacing='2' cellpadding='2'>
			<tr>

				<td class='content_bottom'></td>
			</tr>
		</table>
				</div>
	</td>
	</tr>

	</table>
	</td>
<?}?>