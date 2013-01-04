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

			<div class="title_bg">
			<div class="title">Punish a player</div>
		</div>




  <table width=100%>
    <tr><td class="mainTxt" "align="center">

<center>
<FORM METHOD=post ACTION="">
<br>
<select name="aan">
<option value="">Select the player</option>
<? $dbres				= mysql_query("SELECT `login` FROM `users` ORDER BY `login` ASC");
 while($user = mysql_fetch_object($dbres)) {?>
<option value="<?=$user->login?>"><?=$user->login?></option>
<? }?>
</select><BR>
How many:<br>
<INPUT name="hoeveel" type="text" VALUE="" maxlength="16" style="width: 100;"><br><br>
How will you downgrade the players account?<br>
<center>
<INPUT name="submit1" type="submit" VALUE="Cash Money">
<INPUT name="submit2" type="submit" VALUE="Bank Money">
<INPUT name="submit3" type="submit" VALUE="Power">
<br><br>
<select name="uur">
<option value="0">Hours</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
</select>
<select name="minuten">
<option value="0">Minutes</option>
<option value="10">10</option>
<option value="20">20</option>
<option value="30">30</option>
<option value="40">40</option>
<option value="50">50</option>
</select>
<INPUT name="submit4" type="submit" VALUE="Send to prison">

</FORM>
</center>
<?PHP
echo "</body></font></html>";
?>

<?PHP
$aan=$_POST['aan'];
$hoeveel=$_POST['hoeveel'];
if (isset($_POST['submit1'])) {
mysql_query("UPDATE `users` SET `contant`=`contant`-$hoeveel WHERE `login` = '$aan'");
    print <<<ENDHTML


  <table width=100%>
    <tr><td class="mainTxt">
	<center>Form $aan you have picket $hoeveel cash money.
	</center>
    </td></tr>
  </table>
</body>

</html>
ENDHTML;

}
?>
<?PHP
if (isset($_POST['submit2'])) {
mysql_query("UPDATE `users` SET `bank`=`bank`-$hoeveel WHERE `login` = '$aan'");
    print <<<ENDHTML
<html>


<head>
<title><?=$title; ?></title>
<link rel="stylesheet" type="text/css" href="<? echo $sitelink;?>/layout/crimestyle12/css/css.css"></head>

  <table width=100%>
    <tr><td class="mainTxt">
	<center>Form $aan you have picket $hoeveel bank money.
	</center>
    </td></tr>
  </table>
</body>

</html>
ENDHTML;

}
?>
<?PHP
if (isset($_POST['submit3'])) {
mysql_query("UPDATE `users` SET `power`=`power`-$hoeveel WHERE `login` = '$aan'");
    print <<<ENDHTML
<html>


<head>
<title><?=$title; ?></title>
<link rel="stylesheet" type="text/css" href="<? echo $sitelink;?>/layout/crimestyle12/css/css.css"></head>

  <table width=100%>
    <tr><td class="mainTxt">
	<center>Form $aan you have picket $hoeveel power.
	</center>
    </td></tr>
  </table>
</body>

</html>
ENDHTML;

}
?>
<?PHP
if (isset($_POST['submit4'])) {
if ($_POST['aan']==""){echo "Je hebt geen naam opgegeven"; exit;}
$hoelanguur=$_POST["uur"];
$hoelangminuut=$_POST["minuten"];
$hoelang=$hoelanguur*3600+$hoelangminuut*60;
mysql_query("UPDATE `users` SET `gevangenis`='$hoelang',`baktijd`=NOW() WHERE `login`='$aan'") or die(mysql_error());

    print <<<ENDHTML
<html>


<head>
<title><?=$title; ?></title>
<link rel="stylesheet" type="text/css" href="<? echo $sitelink;?>/layout/crimestyle12/css/css.css"></head>

  <table width=100%>
    <tr><td class="mainTxt">
	<center>You have send $aan to prison for $hoelanguur hours and $hoelangminuut minutes.
	</center>
    </td></tr>
  </table>
</body>

</html>
ENDHTML;

}

?>
<?PHP
if (isset($_POST['submit5'])) {
mysql_query("UPDATE `users` SET `accban`='-1' WHERE `login` = '$aan'");
    print <<<ENDHTML

</head>

  <table width=100%>
    <tr><td class="mainTxt">
	<center>You have banned $aan!
	</center>
    </td></tr>
  </table>
</body>

</html>
ENDHTML;

}
?>
</tr></td>










<?php

	} else {
?>

			<div class="title_bg">
			<div class="title">No access</div>
		</div>

<?php

	}

?>
        
		<div style="background-color:#dbd2b7; padding:10px; padding-top:4px;">
		<table cellpadding="0" cellspacing="0" width="100%"><tr><td>
		<table width="100%" class="mod_list" cellspacing="2" cellpadding="2">
	</table>
		</td></tr></table>
		</div>

		<table width='100%' cellspacing='2' cellpadding='2'>
			<tr>
		
				<td class='content_bottom'></td>
			</tr>
		</table>
		<br>		</div>
	</td>
	</tr>

	</table>
	</td>



