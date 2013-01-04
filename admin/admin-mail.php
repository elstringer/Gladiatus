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
if($data->login == $admin || $data->hulpadmin == 1 || $data->admin == 1) {
?>	 


<?php

  
  if (isset($_POST['mailing'])) 
  {

    $rMember = mysql_query("SELECT login, email FROM `users`");
    while ($aMember = mysql_fetch_assoc($rMember)) 
    {

      $sBericht = str_replace('{naam}', $aMember['login'], $_POST['mailing']);

      @mail($aMember['email'], $_POST['titel'], $sBericht, 'From: $sitetitle <norelpy@noreply.com>');
      echo 'Sent!!..';

    }

  }
  else
  {


?>




		<div class="title_bg">
			<div class="title">E-mail Newsletter</div>
		</div>
		
		<div style="background-color:#dbd2b7; padding:10px; padding-top:4px;">
		<table cellpadding="0" cellspacing="0" width="100%"><tr><td>
		<table width="100%" border="0" cellspacing="2" cellpadding="2" class="mod_list">
	<tr>
<form method="post" action="" name="">
Subject: <input type="text" name="titel" value="<? echo $title ?> Email Subject">
Email:<br>
<textarea cols=40 rows=10 name="mailing">
Dear {naam} 



</textarea><p />

<input type="submit" value="Send Email" name="submit">

</form>
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



<?
if($_GET['killed'])
{
mysql_query("UPDATE `users` SET `vermoord`='0' WHERE `login`='naamnaarkeuze'");
}
?>


<?php

  }
  
  mysql_close($db);

?>



 <?php

	} else {


?>           
 <?php

	}

?>	