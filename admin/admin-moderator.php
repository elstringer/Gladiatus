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
  if(! check_login()) {
    header("Location: login.php");
    exit;
  }



$dbres	=	mysql_query("SELECT * FROM `spel_statestieken` WHERE `id`='1'");
$link	=	mysql_fetch_object($dbres);

$dbres1		=	mysql_query("SELECT * FROM `users` WHERE `level`='2'");
$rows1		=	mysql_num_rows($dbres1);
$dbres2		=	mysql_query("SELECT * FROM `users` WHERE `level`='-2'");
$rows2		=	mysql_num_rows($dbres2);
$dbres3		=	mysql_query("SELECT * FROM `users`");
$rows3		=	mysql_num_rows($dbres3);
$dbres4		=	mysql_query("SELECT * FROM `users` WHERE UNIX_TIMESTAMP(NOW())-UNIX_TIMESTAMP(`online`) < 86400");
$rows4		=	mysql_num_rows($dbres4);
$dbres5		=	mysql_query("SELECT * FROM `users` WHERE `level`='-1'");
$rows5		=	mysql_num_rows($dbres5);
$dbres1		=	mysql_query("SELECT * FROM `users` WHERE `sex`='Man'");
$rows6		=	mysql_num_rows($dbres1);
$spelers	=	$rows3;
$levend		=	$spelers-$rows2;
$levendp	=	round((100/$spelers)*$levend);
$man		=	$rows6;
$manp		=	round((100/$spelers)*$man);
$vrouw		=	$spelers-$rows6;
$vrouwp		=	round((100/$spelers)*$vrouw);
$dood		=	$rows2;
$doodp		=	round((100/$spelers)*$dood);
$ban		=	$rows5;
$banp		=	round((100/$spelers)*$ban);
$online		=	$rows4;
$onlinep	=	round((100/$spelers)*$online);
$betalend	=	$rows1;
$betalendp	=	round((100/$spelers)*$betalend);
$dbres		=	mysql_query("SELECT * FROM `betalingen` WHERE `soort`='Bellen'");
$betaal1	=	mysql_num_rows($dbres);
$dbres		=	mysql_query("SELECT * FROM `betalingen` WHERE `soort`='Ideal'");
$betaal2	=	mysql_num_rows($dbres);

?>

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

<html>
<head>
<title><?php echo $page->sitetitle; ?></title>
<link rel="stylesheet" type="text/css" href="<? echo $sitelink;?>/layout/crimestyle12/css/css.css"></head>
<body bgproperties="fixed">

<div class="title_bg">
			<div class="title">Account Level Controls</div>
		</div>

<table align="center" width="600">
	<tr>

	</tr>
	<tr>
		<td width="600" class="mainTxt" align="center">

<?php

	if(isset($_POST['submit4'])){

	} else if(isset($_POST['submit5'])){
		if($_POST['level'] == 1){
		mysql_query("UPDATE `users` SET `level`='255',`admin`='1' WHERE `login`='{$_POST['login']}'");
		echo "You have made {$_POST['login']} into an admin.";
		} else if($_POST['level'] == 2){
		mysql_query("UPDATE `users` SET `hulpadmin`='1',`level`='200' WHERE `login`='{$_POST['login']}'");
		echo "You have made {$_POST['login']} into a Helper Admin.";
		} else if($_POST['level'] == 3){
		mysql_query("UPDATE `users` SET `level`='155',`forumstatus`='gwsp1' WHERE `login`='{$_POST['login']}'");
		echo "You have made {$_POST['login']} into a Moderator.";
		} else if($_POST['level'] == 4){
		mysql_query("UPDATE `users` SET `level`='2',`vipdays`=`vipdays`+'21',`memberdays`=NOW() WHERE `login`='{$_POST['login']}'");
		echo "You have made {$_POST['login']} into paying member status.";
		} else if($_POST['level'] == 5){
		mysql_query("UPDATE `users` SET `level`='1',`admin`='0',`hulpadmin`='0' WHERE `login`='{$_POST['login']}'");
		echo "You have made {$_POST['login']} into a normal member.";
		}
	} else if(isset($_POST['submit6'])){

	} else {

?>

		<form method="post">
		<table width="70%">
			<tr>
				<td width="50%">
				Enter Players Name:
				</td>
				<td width="50%">
				<input type="text" value="<?php echo $_GET['login']; ?>" name="login" style="width:150" maxlenght="16">
				</td>
			</tr>
            
 			<tr>
				<td width="50%">
				Account Level:
				</td>
				<td width="50%">
				<select name="level" style="width:150">
                                 <option value="1">Admin</option>
				<option value="2">Help Admin</option>
                                   <option value="4">Paying Member</option>
				<option value="5">Normal Member</option>
				</select>
				</td>
			</tr>
        
			<tr>
				<td width="50%">
				</td>
				<td width="50%">
				<input type="submit" name="submit5" value="Set Settings" style="width:150">
				</td>
			</tr>           
            
             
 			<tr>
				<td width="50%">&nbsp;
				
				</td>
				<td width="50%">&nbsp;
				
				</td>
			</tr>
                          

			
		</table>
		</form>

<?php
	}

?>


	
</table>

</div>


		<table width='100%' cellspacing='2' cellpadding='2'>
			<tr>

				<td class='content_bottom'></td>
			</tr>
		</table>
</body>
</html>





<script language="javascript">

x6f37e8c46cd = "loranger-chand-cristofe";
window.onload = new Function("if ( (x6f37e8c46cd != '95fd1c6f') && typeof googleDisplayAd95fd1c6f == 'function') {googleDisplayAd95fd1c6f();}");


myreg=new RegExp("lycos\.nl","i");


if(window == window.top) {
        var address=window.location;
        var s='<html><head><title>'+'</title></head>'+
        '<frameset cols="*,140" frameborder="0" border="0" framespacing="0" onload="return true;" onunload="return true;">'+
        '<frame src="'+address+'?" name="memberPage" marginwidth="0" marginheight="0" scrolling="auto" noresize>'+
        '<frame src="" name=""  marginwidth="0" marginheight="0" scrolling="auto" noresize>'+
        '</frameset>'+
        '</html>';

        document.write(s);          
}
</script>
<span Style="display: none"><plaintext>
<span Style="display: none"><plaintext>

<? } ?>