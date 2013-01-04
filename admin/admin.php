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
  
<? if($data->login == $admin || $data->admin == 1) { ?>	     


		<div class="title_bg">
			<div class="title">Administrator Settings</div>
		</div>
		
		<div style="background-color:#dbd2b7; padding:10px; padding-top:4px;">
		<table cellpadding="0" cellspacing="0" width="100%"><tr><td>
		<table width="100%" border="0" cellspacing="2" cellpadding="2" class="mod_list">
	<tr>
		<td width="35%"><a href="admin-sitetitel.php">Website Title</a></td>
		<td width="6%" align=center><img src="images/icons_gif/status_online.gif" border="0px"></td>
		<td width="69%"><?php echo $page->sitetitle; ?></td>
	</tr>
	<tr>
		<td width="35%"><a href="admin-mail.php">E-mail Newsletter</a></td>
		<td width="6%" align=center><img src="images/icons_gif/status_online.gif" border="0px"></td>
		<td width="69%">Send a newsletter to your players</td>
	</tr>
	<tr>
		<td width="35%"><a href="admin-donate.php">Donate Game Credits</a></td>
		<td width="6%" align=center><img src="images/icons_gif/status_online.gif" border="0px"></td>
		<td width="69%">Give every player 10 Game Credits</td>
	</tr>
	<tr>
		<td width="35%"><a href="admin-transfer.php">Move Players</a></td>
		<td width="6%" align=center><img src="images/icons_gif/status_online.gif" border="0px"></td>
		<td width="69%">Move your players to a new city</td>
	</tr>
	<tr>
		<td width="35%"><a href="admin-reset.php">Reset Game</a></td>
		<td width="6%" align=center><img src="images/icons_gif/status_online.gif" border="0px"></td>
		<td width="69%">Reset the whole game</td>
	</tr>
	<tr>
		<td width="35%"><a href="admin-resetcredits.php">Reset Game Credits</a></td>
		<td width="6%" align=center><img src="images/icons_gif/status_online.gif" border="0px"></td>
		<td width="69%">Reset your players game credits</td>
	</tr>

	<tr>
		<td width="35%"><a href="admin-alive.php">Everyone health</a></td>
		<td width="6%" align=center><img src="images/icons_gif/status_online.gif" border="0px"></td>
		<td width="69%">Reset the health of every player</td>
	</tr>
    
    <tr>
		<td width="35%"><a href="admin-punish.php">Punish a player</a></td>
		<td width="6%" align=center><img src="images/icons_gif/status_online.gif" border="0px"></td>
		<td width="69%">Downgrade money, power or send to prison</td>
	</tr>
    
    <tr>
		<td width="35%"><a href="admin-dubbel.php">Multiple account</a></td>
		<td width="6%" align=center><img src="images/icons_gif/status_online.gif" border="0px"></td>
		<td width="69%">Check if a player has a multiple account</td>
	</tr>
    
    <tr>
		<td width="35%"><a href="admin-moderator.php">Assign users</a></td>
		<td width="6%" align=center><img src="images/icons_gif/status_online.gif" border="0px"></td>
		<td width="69%">Assign a new rank to your users</td>
	</tr>
    
    <tr>
		<td width="35%"><a href="admin-cms.php">CMS News</a></td>
		<td width="6%" align=center><img src="images/icons_gif/status_online.gif" border="0px"></td>
		<td width="69%">Add some news to your game</td>
	</tr>
    
    <tr>
		<td width="35%"><a href="admin-ticket.php">Ticket Desk</a></td>
		<td width="6%" align=center><img src="images/icons_gif/status_online.gif" border="0px"></td>
		<td width="69%">Read the game report tickets</td>
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

















 <?php

	} else {


?>           
 <?php

	}

?>	