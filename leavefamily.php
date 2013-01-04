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
  
  if($_GET['a'] != jail){
$bajes2            = mysql_query("SELECT *,UNIX_TIMESTAMP(`baktijd`) AS `baktijd`,0 FROM `users` WHERE `login`='$data->login'");
$bajes1            = mysql_fetch_object($bajes2);
$datijd = $data->gevangenis;
$tijdverschil1        = $bajes1->baktijd-3600+$datijd-time();
if($bajes1->baktijd + $datijd > time()){
header("Location: $sitelink/jail.php");
}}
?>


<html>
<head>
<link rel="stylesheet" type="text/css" href="<? echo $sitelink;?>/layout/crimestyle12/css/css.css"></head>
<body style="margin: 0px;">

<?php /* ------------------------- */
$familie1 = mysql_query("SELECT * FROM `families` WHERE `naam`='$data->familie'");
$familie = mysql_fetch_object($familie1);
if($familie->owner == $data->login){
mysql_query("UPDATE `users` SET `familie`='',`famlevel`='0' WHERE `familie`='$familie->naam'");
mysql_query("DELETE FROM `families` WHERE `id`='$familie->id'");
}
mysql_query("UPDATE `families` SET `power`=`power`-'$data->power' WHERE `naam`='$data->familie'");
mysql_query("UPDATE `users` SET `familie`='',`famlevel`='0' WHERE `login`='$data->login'");
header("Location: $sitelink/index.php");
/* ------------------------- */ ?>
			<table width="100%">
	<tr>
		<td align="center">
			<br><br><br><br>
			<table class="div_popup" align="center">
				<tr>
					<td>
						You left your family!					</td>
				</tr>
				<tr>
					<td>
						<br><br>
							Refresh your browser of press F5 to return to the original game menu.
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
