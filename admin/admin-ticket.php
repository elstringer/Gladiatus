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

  $OMNILOG				= 1;
  include("_include-config.php");
  if(! check_login()) {
    header("Location: login.php");
    exit;
  }




  mysql_query("UPDATE `users` SET `online`=NOW() WHERE `login`='{$data->login}'");

/* ------------------------- */ ?>

<?
include "settings.php";


?>


<?
    $data2				= mysql_query("SELECT * FROM `users` WHERE `login`='$data->login'");
    $data				= mysql_fetch_object($data2);
	
	include("settings.php");
?>           
  
<?
if($data->login == $admin || $data->hulpadmin == 1 || $data->admin == 1) {
?>	
<html>


<head>

<link rel="stylesheet" type="text/css" href="<? echo $sitelink;?>/layout/crimestyle12/css/css.css"></head>
<body>


<BODY onLoad="movein()">
<div class="title_bg">
			<div class="title">Ticket Desk</div>
		</div>
<?php

if($_GET['bekijk']){
print'<table width="90%" border=1 align="center">
<tr><td class="subTitle" width="30%">Date<td class="subTitle" width="40%">Subject <td class="subTitle" width="30%">Message';
$mijntickets = mysql_query("SELECT * FROM tickets");
while($mijnticket = mysql_fetch_object($mijntickets)){
print '<tr><td class="mainTxt" width="30%">'.$mijnticket->datum.'<td class="mainTxt" width="40%">'.$mijnticket->onderwerp.' ( '.$mijnticket->afzender.' )<td class="mainTxt" width="30%"><a href="admin-ticket.php?bekijk=ja&&show='.$mijnticket->id.'"> Message </a>';
}
print '</table>';

if($_GET['show']){
print "";
$showen = mysql_query("SELECT * FROM tickets WHERE id='{$_GET['show']}'");
$showa = mysql_fetch_object($showen);

print '<table width="90%" border=1 align="center"><tr><td class="subTitle">
Message<tr><td class="mainTxt">'.$showa->bericht.'</table> ';

print '<table width="90%" border=1 align="center"><tr><td class="subTitle">
Reply
<tr><td class="mainTxt">'.$showa->antwoord.' </table></div>


		<table width="100%" cellspacing="2" cellpadding="2">
			<tr>

				<td class="content_bottom"></td>
			</tr>
		</table>';

}

exit;
}





$tickets = mysql_query("SELECT * FROM `tickets` WHERE antwoord='' ORDER BY `datum` DESC");
print '<table width="90%" border=1 align="center">';
print '<tr><td class="subTitle" width="20%">Subject<td class="subTitle" width="20%">Date<td class="subTitle" width="20%"> From <td class="subTitle" width="20%"> Offencive Player <td class="subTitle" width="20%"> Option';
while($ticket = mysql_fetch_object($tickets)){


if($ticket->antwoord == ""){
$bold = '<b>';
$bold1 = '</b>';
}

if($ticket->ban == "on"){
$image = '<img src="_.bmp">';
}

print '<tr><td class="MainTxt" width="20%">'.$image.'<a href="admin-ticket.php?edit='.$ticket->id.'">'.$ticket->onderwerp.'<td class="MainTxt" width="20%">'.$ticket->datum.'<td class="MainTxt" width="20%">'.$ticket->afzender.'<td class="MainTxt" width="20%">'.$ticket->naam.'<td class="mainTxt" width="20%">'.$ticket->optie.'';

}
print '</table>';

if($_GET['edit']){
$antwoorden = mysql_query("SELECT * FROM tickets WHERE id='{$_GET['edit']}'");
$antwoord = mysql_fetch_object($antwoorden);
print '<table width="90%" align="center" border="1"><tr><td class="mainTxt">'.$antwoord->bericht.'
<tr><td class="mainTxt">
<form method="post">
<textarea cols=40 rows=10 name="antwoor">
</textarea><br>
<input type="submit" name="antwoord" value="Reply">
</form>
</table>
';
if($_POST['antwoord']){
print 'You have replied to the ticket';
             mysql_query("INSERT INTO `[messages]`(`time`,`IP`,`from`,`to`,`subject`,`message`) values(NOW(),'{$_SERVER['REMOTE_ADDR']}','$page->sitetitle','{$antwoord->afzender}','Ticket','Enter your reply in here!')");
$antwoor = $_POST['antwoor'];
mysql_query("UPDATE `tickets` SET ban='off',antwoord='$antwoor' WHERE id='$antwoord->id'");
}
}
print '<table width="90%" border=1 align="center"><tr><td class="mainTxt"><a href="admin-ticket.php?bekijk=ja" >Click Here to view all messages</a> </table>';
print ' </table>';




?>
</div>


		<table width='100%' cellspacing='2' cellpadding='2'>
			<tr>

				<td class='content_bottom'></td>
			</tr>
		</table>
</body>
</html>
<? } ?>