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
<link rel="stylesheet" type="text/css" href="<? echo $sitelink;?>/layout/crimestyle12/css/css.css"></head>
<body style="margin: 0px;">

					<div class="title_bg">
			<div class="title">More statistics</div>
		</div>
<?$user1 = mysql_query("SELECT * FROM `users`");
$users = mysql_num_rows($user1);
$totalgeld = 0;
$totalpower = 0;
$totalcallcredits = 0;
$totalvipdays = 0;
while($user = mysql_fetch_object($user1)){
$totalgeld = $totalgeld+$user->contant+$user->bank;
$totalpower = $totalpower+$user->power;
$totalcallcredits = $totalcallcredits+$user->callcredits;
$totalvipdays = $totalvipdays+$user->vipdays;
}
$gemiddeldgeld = round($totalgeld/$users);
$gemiddeldcallcredits = round($totalcallcredits/$users);
$gemiddeldvipdays = round($totalvipdays/$users);
$gemiddeldpower = round($totalpower/$users);
$gemiddeldgeld = number_format($gemiddeldgeld, 0, '.', '.');
$gemiddeldpower = number_format($gemiddeldpower, 0, '.', '.');
$gemiddeldcallcredits = number_format($gemiddeldcallcredits, 0, '.', '.');
$gemiddeldvipdays = number_format($gemiddeldvipdays, 0, '.', '.');
$totalgeld = number_format($totalgeld, 0, '.', '.');
$totalpower = number_format($totalpower, 0, '.', '.');
$totalcallcredits = number_format($totalcallcredits, 0, '.', '.');
$totalcallvipdays = number_format($totalvipdays, 0, '.', '.');
$dooien1 = mysql_query("SELECT * FROM `users` WHERE `vermoord`>'0'");
$dooien = mysql_num_rows($dooien1);
$turijn1 = mysql_query("SELECT * FROM `users` WHERE `city`='1'");
$palermo1 = mysql_query("SELECT * FROM `users` WHERE `city`='2'");
$milaan1 = mysql_query("SELECT * FROM `users` WHERE `city`='3'");
$rome1 = mysql_query("SELECT * FROM `users` WHERE `city`='4'");
$catania1 = mysql_query("SELECT * FROM `users` WHERE `city`='5'");
$corleone1 = mysql_query("SELECT * FROM `users` WHERE `city`='6'");
$turijn = mysql_num_rows($turijn1);
$palermo = mysql_num_rows($palermo1);
$milaan = mysql_num_rows($milaan1);
$rome = mysql_num_rows($rome1);
$catania = mysql_num_rows($catania1);
$corleone = mysql_num_rows($corleone1);
?>

		<div style="background-color:#dbd2b7; padding:10px; padding-top:4px;">
		<table cellpadding="0" cellspacing="0" width="100%"><tr><td>
			<table width="100%">
		<tr>
			<td width="50%">

		<table width="100%" class="mod_list">
			<tr>
				<td width="40%">Total money:</td>
				<td width="5%" align="center"><img src="images/icons_gif/money.gif" border="0px"></td>
				<td><b> <?echo$totalgeld;?>,-</b></td>
			</tr>
			<tr>
				<td width="40%">Total power:</td>
				<td width="5%" align="center"><img src="images/icons_gif/lightning.gif" border="0px"></td>
				<td><b> <?echo$totalpower;?></b></td>
			</tr>
	<tr>
				<td width="40%">Total game credits:</td>
				<td width="5%" align="center"><img src="images/icons_gif/telephone.gif" border="0px"></td>
				<td><b> <?echo$totalcallcredits;?></b></td>
			</tr>
	<tr>
				<td width="40%">Total vip days:</td>
				<td width="5%" align="center"><img src="images/icons_gif/user_green.gif" border="0px"></td>
				<td><b> <?echo$totalvipdays;?></b></td>
			</tr>
		</table>
				</td>

			<td width="50%">

		<table width="100%" class="mod_list">
			<tr>
				<td width="40%">Average money:</td>
				<td width="5%" align="center"><img src="images/icons_gif/money.gif" border="0px"></td>
				<td><b> <?echo$gemiddeldgeld;?>,-</b></td>
			</tr>
			<tr>
				<td width="40%">Average power:</td>
				<td width="5%" align="center"><img src="images/icons_gif/lightning.gif" border="0px"></td>
				<td><b><?echo$gemiddeldpower;?></b></td>
			</tr>
	<tr>
				<td width="40%">Average game credits:</td>
				<td width="5%" align="center"><img src="images/icons_gif/telephone.gif" border="0px"></td>
				<td><b><?echo$gemiddeldcallcredits;?></b></td>
			</tr>
	<tr>
				<td width="40%">Average vip days:</td>
				<td width="5%" align="center"><img src="images/icons_gif/user_green.gif" border="0px"></td>
				<td><b><?echo$gemiddeldvipdays;?></b></td>
			</tr>
		</table>
				</td>
		</tr>
		<tr>
			<td width="50%" valign="top">

		<table width="100%" class="mod_list">
			<tr>
				<td width="40%">Killed players:</td>
				<td width="5%" align="center"><img src="images/icons_gif/status_busy.gif" border="0px"></td>
				<td><b><?echo$dooien;?></b></td>
			</tr>
			<tr>
				<td width="40%">Active players:</td>
				<td width="5%" align="center"><img src="images/icons_gif/status_online.gif" border="0px"></td>
				<td><b><?echo$users;?></b></td>
			</tr>
	
<tr>
				<td width="40%">Newest players:</td>
				<td width="5%" align="center"><img src="images/icons_gif/status_online.gif" border="0px"></td>
				<td><b>3</b>
<?php

$query = mysql_query("SELECT id, login FROM users ORDER BY id DESC LIMIT 3");

echo '
	
';

	while($user = mysql_fetch_assoc($query)){

		echo '
			

			<td><a href="generalprofile.php?x=' . $user['id'] . '">' . $user['login'] . '</a></td>
			
		';

	}

echo "";
?>		
		</td>
			</tr>
	

		</table>

				</td>
			<td width="50%" valign="top">
				<table width="100%" class="mod_list"><tr>
						<td width="40%"><?php echo $city_1 ?>:</td>
						<td width="5%" align="center"><img src="images/icons_gif/status_online.gif" border="0px"></td>
						<td><b><?echo$turijn;?></b></td>
					</tr><tr>
						<td width="40%"><?php echo $city_2 ?>:</td>
						<td width="5%" align="center"><img src="images/icons_gif/status_online.gif" border="0px"></td>
						<td><b><?echo$palermo;?></b></td>
					</tr><tr>
						<td width="40%"><?php echo $city_3 ?>:</td>
						<td width="5%" align="center"><img src="images/icons_gif/status_online.gif" border="0px"></td>
						<td><b><?echo$milaan;?></b></td>
					</tr><tr>
						<td width="40%"><?php echo $city_4 ?>:</td>
						<td width="5%" align="center"><img src="images/icons_gif/status_online.gif" border="0px"></td>
						<td><b><?echo$rome;?></b></td>
					</tr><tr>
						<td width="40%"><?php echo $city_5 ?>:</td>
						<td width="5%" align="center"><img src="images/icons_gif/status_online.gif" border="0px"></td>
						<td><b><?echo$catania;?></b></td>
					</tr><tr>
						<td width="40%"><?php echo $city_6 ?>:</td>
						<td width="5%" align="center"><img src="images/icons_gif/status_online.gif" border="0px"></td>
						<td><b><?echo$corleone;?></b></td>
					</tr></table>			</td>
		</tr>
	</table>
	<span class="small"><i>* This overview is realtime</i></span>
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
