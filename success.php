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
include("settings.php");
if(!(@mysql_connect("$host","$user","$pass") && @mysql_select_db("$tablename"))) {echo"No database connection";}
session_start();
$dbres				= mysql_query("SELECT *,UNIX_TIMESTAMP(`signup`) AS `signup`,UNIX_TIMESTAMP(`online`) AS `online` FROM `users` WHERE `login`='{$_SESSION['user']}'");
$data				= mysql_fetch_object($dbres);
if(isset($data->login) || isset($_SESSION['login'])){
  session_start();

?>




<?
$ref=@$HTTP_REFERER;


$site="paypal.com"; // ok here to need to define the allowed site paypal of course.

$pos1 = stripos($ref, $site);
$errormess="You are not authorized to view this page";// you may want put this in the language file //this is for cheaters


if ($pos1 === false) {
    echo "$errormess";// not authorized message
}


if ($pos1 !== false) {
 
// this section is for legal hits and processes the credits.  


echo " 

 <tr><td class=\"mainTxt\" align=\"left\"><font color=green><b><center>Payment Completed!</b></font>

<br>

<br>
Thank you for your payment. Your game credits are immediately credited to your players account. <br>
You may now close this window.
</td></tr>";
mysql_query("UPDATE `users` SET `callcredits`=`callcredits`+300 where `login`='$data->login'");
exit;
}?>


</center>


</div>

</body>
</html>
 