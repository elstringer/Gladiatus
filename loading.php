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
  include("_include-gevangenis.php");
    $data2				= mysql_query("SELECT * FROM `users` WHERE `login`='{$_SESSION['login']}'");
    $data				= mysql_fetch_object($data2);

$boot1	                  	= array("GEEN","Canoe","Rubber Dingy","Cigarette Boat","Sailing Boat","Fishermans Boot","Yacht");
$boot = $boot1[$data->boot];
$boot2 = $data->boot;
$bootwapens = $data->m60b+$data->krieg550b+$data->sig552b+$data->m16b+$data->ak47b+$data->c4b;

if($boot2 == 0) {
$maxwapens = 0;
} else if($boot2 == 1) {
$maxwapens = 15;
} else if($boot2 == 2) {
$maxwapens = 35;
} else if($boot2 == 3) {
$maxwapens = 100;
} else if($boot2 == 4) {
$maxwapens = 300;
} else if($boot2 == 5) {
$maxwapens = 1000;
} else if($boot2 == 6) {
$maxwapens = 6000;
}

	$ak47 		= $data->ak47;
	$m16		= $data->m16;
	$m60		= $data->m60;
	$krieg550	= $data->krieg550;
	$sig552		= $data->sig552;
	$c4		= $data->c4;

?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="<? echo $sitelink;?>/layout/crimestyle12/css/css.css">
</head>
<body style="margin: 0px;">
<?
if(! isset($_GET[id]))
{ 

echo "
<table width=\"100%\" align=\"center\">
<tr><td class=subTitle colspan=2><b>WeaponsHandling - Options</b></td>
<tr><td class=\"mainTxt\" colspan=2><center><form method=\"post\">
<select onchange=\"location.href=''+this.options[this.selectedIndex].value\">
<option value=\"\">Select a Weapons Handling Option</option>
<option value=\"sail.php\">Sailing</option>
<option value=\"wepshandling.php\">Weapon Handling</option>
<option value=\"loading.php\">Loading</option>
</select>
</table>
";
}
?> 

<BODY onLoad="movein()">
<table align="center" width="60%">
<tr><td class="subTitle" colspan="2">Weapons Loading</td></tr>
<?
if($data->eilanden == 0) {
?>
<tr><td class="mainTxt" colspan="2" align="center">You are not on the islands</td></tr>
<?
} else if($data->eilanden == 1) {
?>
<tr><td class="mainTxt" width="50%">Boat:</td><td class="mainTxt"><?=$boot?></td></tr>
<tr><td class="mainTxt" width="50%">Max. Weapons:</td><td class="mainTxt"><?=$maxwapens?></td></tr>
<tr><td class="mainTxt" width="50%">Weapons on the Boat:</td><td class="mainTxt"><?=$bootwapens?></td></tr>

<form method="POST">
<tr><td class="mainTxt" colspan="2" align="center"><b>Weapons Loading</b></td></tr>
<tr><td class="mainTxt">M60's:</td><td class="mainTxt"><input type="text" name="m60" value="0"></td></tr>
<tr><td class="mainTxt">KRIEG 550's:</td><td class="mainTxt"><input type="text" name="krieg550" value="0"></td></tr>
<tr><td class="mainTxt">SIG 552's:</td><td class="mainTxt"><input type="text" name="sig552" value="0"></td></tr>
<tr><td class="mainTxt">M16's:</td><td class="mainTxt"><input type="text" name="m16" value="0"></td></tr>
<tr><td class="mainTxt">Ak 47's:</td><td class="mainTxt"><input type="text" name="ak47" value="0"></td></tr>
<tr><td class="mainTxt">C4:</td><td class="mainTxt"><input type="text" name="c4" value="0"></td></tr>
<tr><td class="mainTxt" colspan="2" align="center"><input type="submit" name="inladen" value="Load On"></td></tr>
</form>
<?
  if(isset($_POST['inladen'])) {
if($_POST['m60'] < 0) {
    print " <tr><td class=\"mainTxt\" colspan=\"3\" align=\"center\">You must fill the boat with a positive number of weapons.</td></tr>\n";
} else if($_POST['krieg550'] < 0) {
    print " <tr><td class=\"mainTxt\" colspan=\"3\" align=\"center\">You must fill the boat with a positive number of weapons.</td></tr>\n";
} else if($_POST['sig552'] < 0) {
    print " <tr><td class=\"mainTxt\" colspan=\"3\" align=\"center\">You must fill the boat with a positive number of weapons.</td></tr>\n";
} else if($_POST['m16'] < 0) {
    print " <tr><td class=\"mainTxt\" colspan=\"3\" align=\"center\">You must fill the boat with a positive number of weapons.</td></tr>\n";
} else if($_POST['ak47'] < 0) {
    print " <tr><td class=\"mainTxt\" colspan=\"3\" align=\"center\">You must fill the boat with a positive number of weapons.</td></tr>\n";
} else if($_POST['c4'] < 0) {
    print " <tr><td class=\"mainTxt\" colspan=\"3\" align=\"center\">You must fill the boat with a positive number of weapons.</td></tr>\n";
} else if($_POST['m60'] > $m60) {
    print " <tr><td class=\"mainTxt\" colspan=\"3\" align=\"center\">You dont have enough M60('s).</td></tr>\n";
} else if($_POST['krieg550'] > $krieg550) {
    print " <tr><td class=\"mainTxt\" colspan=\"3\" align=\"center\">You dont have enough KRIEG 550('s).</td></tr>\n";
} else if($_POST['sig552'] > $sig552) {
    print " <tr><td class=\"mainTxt\" colspan=\"3\" align=\"center\">You dont have enough SIG 552('s).</td></tr>\n";
} else if($_POST['m16'] > $m16) {
    print " <tr><td class=\"mainTxt\" colspan=\"3\" align=\"center\">You dont have enough M16('s).</td></tr>\n";
} else if($_POST['ak47'] > $ak47) {
    print " <tr><td class=\"mainTxt\" colspan=\"3\" align=\"center\">You dont have enough Ak 47('s).</td></tr>\n";
} else if($_POST['c4'] > $c4) {
    print " <tr><td class=\"mainTxt\" colspan=\"3\" align=\"center\">JYou dont have enough kilo C4.</td></tr>\n";
} else if($_POST['c4']+$_POST['ak47']+$_POST['m16']+$_POST['sig552']+$_POST['krieg550']+$bootwapens > $maxwapens) {
    print " <tr><td class=\"mainTxt\" colspan=\"3\" align=\"center\">You dont have enough room on the boat.</td></tr>\n";
} else {
    mysql_query("UPDATE `users` SET `m60b`=`m60b`+{$_POST['m60']}, `m60`=`m60`-{$_POST['m60']} WHERE `login`='{$data->login}'");
    mysql_query("UPDATE `users` SET `krieg550b`=`krieg550b`+{$_POST['krieg550']}, `krieg550`=`krieg550`-{$_POST['krieg550']} WHERE `login`='{$data->login}'");
    mysql_query("UPDATE `users` SET `sig552b`=`sig552b`+{$_POST['sig552']}, `sig552`=`sig552`-{$_POST['sig552']} WHERE `login`='{$data->login}'");
    mysql_query("UPDATE `users` SET `m16b`=`m16b`+{$_POST['m16']}, `m16`=`m16`-{$_POST['m16']} WHERE `login`='{$data->login}'");
    mysql_query("UPDATE `users` SET `ak47b`=`ak47b`+{$_POST['ak47']}, `ak47`=`ak47`-{$_POST['ak47']} WHERE `login`='{$data->login}'");
    mysql_query("UPDATE `users` SET `c4b`=`c4b`+{$_POST['c4']}, `c4`=`c4`-{$_POST['c4']} WHERE `login`='{$data->login}'");
    print " <tr><td class=\"mainTxt\" colspan=\"3\" align=\"center\">Offload Weapons.<script language=\"javascript\">setTimeout('self.window.location.href=\"loading.php\"',600)</script></td></tr>\n";
}
}
?>
<tr><td class="mainTxt" colspan="2" align="center"><b>Weapons you have offloaded onto the islands</b></td></tr>
<tr><td class="mainTxt">M60's:</td><td class="mainTxt"><?=$m60?></td></tr>
<tr><td class="mainTxt">KRIEG 550's:</td><td class="mainTxt"><?=$krieg550?></td></tr>
<tr><td class="mainTxt">SIG 552's:</td><td class="mainTxt"><?=$sig552?></td></tr>
<tr><td class="mainTxt">M16's:</td><td class="mainTxt"><?=$m16?></td></tr>
<tr><td class="mainTxt">Ak 47's:</td><td class="mainTxt"><?=$ak47?></td></tr>
<tr><td class="mainTxt">C4:</td><td class="mainTxt"><?=$c4?></td></tr>
<?
}
?>