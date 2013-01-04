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

  $UPDATE_DB                                = 1; 
  include("_include-config.php"); 
  
  if(! check_login) { 
    header("Location: login.php"); 
    exit; 
  } 

  mysql_query("UPDATE `users` SET `online`=NOW() WHERE `login`='{$data->login}'"); 

    $data2				= mysql_query("SELECT * FROM `users` WHERE `login`='{$_SESSION['login']}'");
    $data				= mysql_fetch_object($data2);

?>
<html>


<head>
<title><?php echo $page->sitetitle; ?></title>
<link rel="stylesheet" type="text/css" href="<? echo $sitelink;?>/layout/crimestyle12/css/css.css"></head>


<body style=" margin: 0px;"> 
<div class="title_bg">
			<div class="title">Ticket System</div>
		</div>
<?php

if($_GET['bekijk']){
print'<table width="90%" align="center">
<tr><td class="subTitle" width="30%">Date<td class="subTitle" width="40%">Subject <td class="subTitle" width="30%">Read';
$mijntickets = mysql_query("SELECT * FROM tickets WHERE afzender='$data->login' ORDER BY datum DESC");
while($mijnticket = mysql_fetch_object($mijntickets)){
print '<tr><td class="mainTxt" width="30%">'.$mijnticket->datum.'<td class="mainTxt" width="40%">'.$mijnticket->onderwerp.'<td class="mainTxt" width="30%"><a href="ticket.php?bekijk=ja&&show='.$mijnticket->id.'"> Read </a>';
}
print '</table>';

if($_GET['show']){
$showen = mysql_query("SELECT * FROM tickets WHERE id='{$_GET['show']}'");
$showa = mysql_fetch_object($showen);
if($showa->afzender != $data->login){
exit;
}else{
print '<table width="90%" align="center"><tr><td class="subTitle">
Message
<tr><td class="mainTxt">'.$showa->bericht.'</table> ';

print '<table width="90%" align="center"><tr><td class="subTitle">
Reply
<tr><td class="mainTxt">'.$showa->antwoord.' </table>
</div>


		<table width="100%" cellspacing="2" cellpadding="2">
			<tr>

				<td class="content_bottom"></td>
			</tr>
		</table>

';
}
}

exit;
}




if($_POST['check']){
print '<table width="90%" align="center"><tr><td class="mainTxt">';
$naam = $_POST['naam'];
$afzender = $data->login;
$bericht = $_POST['reden'];
$ban = $_POST['ban'];
$optie = $_POST['optie'];
$onderwerp = $_POST['onderwerp'];
if($bericht == ""){
print 'Type Message';
}elseif($optie == 'Chosen' && $naam == ""){
print 'Enter Name.';
}elseif($onderwerp == ""){
print 'You must enter a subject';
}else{

mysql_query("INSERT INTO tickets (naam,afzender,bericht,datum,optie,ban,onderwerp) VALUES ('$naam','$afzender','$bericht',NOW(),'$optie','$ban','$onderwerp')");
print "Your Ticket has been Sent!<br>You will receive an answer as soon as posible.";
}
print '</table>';
}

print<<<ENDHTML
<table width="90%" align="center">
<tr><td class="subTitle">
Ticket Systeem
<tr><td class="mainTxt">
<form method="post">
<table>
<tr><td width="120">Your Name:</td><td width="200">{$data->login}</td></tr>
<tr><td width="120">Subject:</td><td width="200"><input type="text" name="onderwerp"></td></tr>
<tr><td width="120">Options:</td><td width="200"><select name="optie">
<option value="abuse">Report Abusive Player</option>
<option value="idea">Ideas/Tip</option>
<option value="bug">Report mistake in the site (bug) </option>
<option value="spam">A Spammer</option>
<option value="cheat">Cheater</option>
</select></td></tr>
<tr><td width="120">Abusive Player's Name:</td><td width="500"><input type="text" name="naam"></td></tr>
<tr><td width="120">Message:</td></tr>
<tr><td width="400" colspan="20"><textarea name="reden" rows="10" cols="40">
</textarea></td></tr>

<tr><td width="400" colspan="20"><input type="checkbox" name="check">I understand the consequences for abusing the ticket system.</td></tr>
<tr><td width="400" colspan="20"><input type="submit" name="verzend" value="Submit Ticket"></td></tr>

</form>
</table>
</table>
<table width="90%" align="center"><tr><td class="mainTxt">
<center><a href="ticket.php?bekijk=ja"> View Your Tickets </a></center>
</table>
ENDHTML;



?>

</div>


		<table width='100%' cellspacing='2' cellpadding='2'>
			<tr>

				<td class='content_bottom'></td>
			</tr>
		</table>
</body>
</html>