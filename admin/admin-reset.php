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

<?
include "settings.php";


?>


<?
    $data2				= mysql_query("SELECT * FROM `users` WHERE `login`='$data->login'");
    $data				= mysql_fetch_object($data2);
	
	include("settings.php");
?>           
  
<?
if($data->login == $admin || $data->admin == 1) {
?>	         
  
<?


mysql_query("UPDATE `users` SET `contant`='20000'");
mysql_query("UPDATE `users` SET `bank`='100000'");
mysql_query("UPDATE `users` SET `killers`='0'");
mysql_query("UPDATE `users` SET `rank`='1'");
mysql_query("UPDATE `users` SET `health`='100'");
mysql_query("UPDATE `users` SET `bankleft`='15'");
mysql_query("UPDATE `users` SET `power`='0'");

mysql_query("UPDATE `users` SET `city`='1'");
mysql_query("UPDATE `users` SET `familie`=''");
mysql_query("UPDATE `users` SET `rankvord`='0'");
mysql_query("UPDATE `users` SET `safe`='12'");
mysql_query("UPDATE `users` SET `respect`='0'");
mysql_query("UPDATE `users` SET `geefeer`='0'");
mysql_query("UPDATE `users` SET `kogels`='0'");
mysql_query("UPDATE `users` SET `attwins`='0'");
mysql_query("UPDATE `users` SET `attlost`='0'");
mysql_query("UPDATE `users` SET `bankpas`='0'");
mysql_query("UPDATE `users` SET `kluis`='0'");
mysql_query("UPDATE `users` SET `zwitserse`='0'");
mysql_query("UPDATE `users` SET `deagle`='0'");
mysql_query("UPDATE `users` SET `pepperspray`='0'");
mysql_query("UPDATE `users` SET `knuppel`='0'");
mysql_query("UPDATE `users` SET `sigp`='0'");
mysql_query("UPDATE `users` SET `c4`='0'");
mysql_query("UPDATE `users` SET `m16`='0'");
mysql_query("UPDATE `users` SET `cornershot`='0'");
mysql_query("UPDATE `users` SET `pitbull`='0'");
mysql_query("UPDATE `users` SET `sniper`='0'");
mysql_query("UPDATE `users` SET `swatgun`='0'");
mysql_query("UPDATE `users` SET `bazooka`='0'");
mysql_query("UPDATE `users` SET `bodyguards`='0'");
mysql_query("UPDATE `users` SET `warboot`='0'");
mysql_query("UPDATE `users` SET `atoombom`='0'");
mysql_query("UPDATE `users` SET `tank`='0'");
mysql_query("UPDATE `users` SET `scud`='0'");
mysql_query("UPDATE `users` SET `satteliet`='0'");
mysql_query("UPDATE `users` SET `spacestation`='0'");
mysql_query("UPDATE `users` SET `hoerenhuis`='0'");
mysql_query("UPDATE `users` SET `switchblade`='0'");
mysql_query("UPDATE `users` SET `bezitiets`='0'");
mysql_query("UPDATE `users` SET `vermoord`='0'");
mysql_query("UPDATE `users` SET `vakantie`='0'");
mysql_query("UPDATE `users` SET `famlevel`='0'");
mysql_query("UPDATE `users` SET `hoofdwaarde`='0'");
mysql_query("UPDATE `users` SET `moordenaar`=''");
mysql_query("UPDATE `users` SET `moordpremie`=''");
mysql_query("UPDATE `users` SET `moorddatum`=''");
mysql_query("UPDATE `users` SET `vordering`='0'");
mysql_query("UPDATE `users` SET `killcount`='0'");
mysql_query("UPDATE `users` SET `drugsmax`='1'");
mysql_query("UPDATE `users` SET `nederwietupgr`='0'");
mysql_query("UPDATE `users` SET `paddoupgr`='0'");
mysql_query("UPDATE `users` SET `xtcupgr`='0'");
mysql_query("UPDATE `users` SET `lsdupgr`='0'");
mysql_query("UPDATE `users` SET `speedupgr`='0'");
mysql_query("UPDATE `users` SET `opiumupgr`='0'");
mysql_query("UPDATE `users` SET `nederwiet`='0'");
mysql_query("UPDATE `users` SET `paddo`='0'");
mysql_query("UPDATE `users` SET `xtc`='0'");
mysql_query("UPDATE `users` SET `lsd`='0'");
mysql_query("UPDATE `users` SET `speed`='0'");
mysql_query("UPDATE `users` SET `opium`='0'");
mysql_query("UPDATE `users` SET `kluisgeld`='0'");
mysql_query("UPDATE `users` SET `zwitsersegeld`='0'");
mysql_query("UPDATE `users` SET `zwitsersehalen`='50000000'");
mysql_query("UPDATE `users` SET `zwitsersestorten`='5000000'");
mysql_query("UPDATE `users` SET `aankomst`=''");
mysql_query("UPDATE `users` SET `draaitijd`='000-00-00 00:00:00'");
mysql_query("UPDATE `users` SET `hlronde`='1'");
mysql_query("UPDATE `users` SET `hltijd`='000-00-00 00:00:00'");
mysql_query("UPDATE `users` SET `roulette`='0'");
mysql_query("UPDATE `users` SET `bitchdiploma`='0'");
mysql_query("UPDATE `users` SET `bitches`='0'");
mysql_query("UPDATE `users` SET `bitcheswerkend`='0'");
mysql_query("UPDATE `users` SET `bitchmissie`='0'");
mysql_query("UPDATE `users` SET `bitchesgezocht`='0'");
mysql_query("UPDATE `users` SET `hoerentijd`='0'");
mysql_query("UPDATE `users` SET `riptijd`='0'");
mysql_query("UPDATE `users` SET `ripdeal`='0'");
mysql_query("UPDATE `users` SET `winkel`='0'");
mysql_query("UPDATE `users` SET `getawaytijd`='0'");
mysql_query("UPDATE `users` SET `winkeltijd`='0'");
mysql_query("UPDATE `users` SET `drank`='10'");
mysql_query("UPDATE `users` SET `zak`='10'");
mysql_query("UPDATE `users` SET `drankt`=''");
mysql_query("UPDATE `users` SET `xp`='1'");
mysql_query("UPDATE `users` SET `scooterjatten`='600'");
mysql_query("UPDATE `users` SET `scooterjattijd`='0000-00-00 00:00:00'");
mysql_query("UPDATE `users` SET `opgehaald`='0'");
mysql_query("UPDATE `loterij` SET `lotenverkoop`=''");
mysql_query("UPDATE `users` SET `info`=''");
mysql_query("UPDATE `users` SET `aangevallen`='0'");
mysql_query("UPDATE `users` SET `missionsfixed`=''");
mysql_query("OPTIMIZE FROM `users`");
mysql_query("DELETE FROM `autos`");
mysql_query("DELETE FROM `clicks`");
mysql_query("DELETE FROM `loterij`");
mysql_query("DELETE FROM `messages`");
mysql_query("DELETE FROM `contacts`");
mysql_query("DELETE FROM `chatlog`");
mysql_query("DELETE FROM `forumpolls`");
mysql_query("DELETE FROM `forumreplies`");
mysql_query("DELETE FROM `forumtopics`");
mysql_query("DELETE FROM `contacts` WHERE `owner`='' OR `person`=''");
mysql_query("DELETE FROM `contracten`");
mysql_query("DELETE FROM `families`");
mysql_query("DELETE FROM `gastenboek`");
mysql_query("DELETE FROM `hitlist`");
mysql_query("DELETE FROM `registered_ip`");
mysql_query("DELETE FROM `veilinglogs`");
mysql_query("UPDATE `station` SET `eigenaar`='', `laatstebod`='0', `laatstebieder`=''");
mysql_query("UPDATE `vliegveld` SET `eigenaar`='', `laatstebod`='0', `laatstebieder`=''");
mysql_query("UPDATE `hoeren` SET `eigenaar`='', `laatstebod`='0', `laatstebieder`=''");
mysql_query("UPDATE `haven` SET `eigenaar`='', `laatstebod`='0', `laatstebieder`=''");}

mysql_query("UPDATE `users` SET `woning`='0'");
mysql_query("UPDATE `users` SET `beurs1`='0'");
mysql_query("UPDATE `users` SET `beurs2`='0'");
mysql_query("UPDATE `users` SET `beurs3`='0'");
mysql_query("UPDATE `users` SET `beurs4`='0'");
mysql_query("UPDATE `users` SET `beursw1`='0'");
mysql_query("UPDATE `users` SET `beursw2`='0'");
mysql_query("UPDATE `users` SET `beursw3`='0'");
mysql_query("UPDATE `users` SET `beursw4`='0'");

mysql_query("UPDATE `[coffeshop]` SET `kogels`='0'");
mysql_query("UPDATE `[coffeshop]` SET `geld`='0'");
mysql_query("UPDATE `[coffeshop]` SET `lprijs`='0'");
mysql_query("DELETE FROM `[detective]`");
mysql_query("DELETE FROM `[donatelogs]`");
mysql_query("DELETE FROM `[garage]`");
mysql_query("UPDATE `[getallen]` SET `winst`='0'");
mysql_query("UPDATE `[getallen]` SET `aantalx`='0'");
mysql_query("DELETE FROM `[handdruk]`");
mysql_query("DELETE FROM `[hitlist]`");
mysql_query("DELETE FROM `[hogerlager]`");
mysql_query("UPDATE `[kogelfabriek]` SET `kogels`='0'");
mysql_query("UPDATE `[kogelfabriek]` SET `geld`='0'");
mysql_query("UPDATE `[kogelfabriek]` SET `lprijs`='0'");
mysql_query("UPDATE `[roulet]` SET `winst`='0'");
mysql_query("UPDATE `[roulet]` SET `aantalx`='0'");
mysql_query("DELETE FROM `[news]`");
mysql_query("DELETE FROM `[messages]`");
mysql_query("DELETE FROM `[auto]`");
mysql_query("DELETE FROM `[autorace]`");
mysql_query("DELETE FROM `[clans]`");
mysql_query("DELETE FROM `[moordlogs]`");
mysql_query("DELETE FROM `[orgcrime]`");
mysql_query("DELETE FROM `[tickets]`");
mysql_query("DELETE FROM `[veiling]`");
mysql_query("DELETE FROM `[donatelogs]`");
mysql_query("DELETE FROM `[weed]`");
mysql_query("DELETE FROM `[winkel]`");
mysql_query("DELETE FROM `[creditmarkt]`");
mysql_query("DELETE FROM `[eerpunten]`");
mysql_query("DELETE FROM `[getuige]`");
mysql_query("DELETE FROM `[hitlijst]`");
mysql_query("DELETE FROM `[nieuws]`");
mysql_query("DELETE FROM `[racen]`");
mysql_query("DELETE FROM `[beurs]`");

mysql_query("UPDATE `[stadowner]` SET `owner`='admin'");
mysql_query("UPDATE `[ziekenhuis]` SET `owner`='admin'");
mysql_query("UPDATE `[ziekenhuis]` SET `klanten`='0'");
mysql_query("UPDATE `[ziekenhuis]` SET `winst`='0'");
mysql_query("UPDATE `[ziekenhuis]` SET `verlies`='0'");
?>	  



		<div class="title_bg">
			<div class="title">Reset Game</div>
		</div>
		
		<div style="background-color:#dbd2b7; padding:10px; padding-top:4px;">
		<table cellpadding="0" cellspacing="0" width="100%"><tr><td>
		<table width="100%" border="0" cellspacing="2" cellpadding="2" class="mod_list">
	<tr>

The game is reset


	</tr>

	

</table>
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













