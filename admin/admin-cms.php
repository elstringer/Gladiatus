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

ob_start();
  include("_include-config.php");
  if(! check_login()) {
    header("Location: login.php");
    exit;
  }



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
if($data->login == $admin || $data->hulpadmin == 1 || $data->admin == 1) {
?>	

<html>
<head>
<title><?php echo $page->sitetitle; ?></title>
<link rel="stylesheet" type="text/css" href="<? echo $sitelink;?>/layout/crimestyle12/css/css.css"> 
</head>
<body bgproperties="fixed">

<div class="title_bg">
			<div class="title">CMS News | Click on the page you wish to edit</div>
		</div>

<?php

	if(isset($_POST['submit'])){

?>

<table align="center" width="600">
	<tr>
		<td class="subTitle" colspan="2" align="center">Changeing Text</td>
	</tr>
	<tr>
		<td width="600" class="mainTxt" align="center">

<?php

	$dbres		=	mysql_query("SELECT * FROM `cms` WHERE `soort`='{$_POST['subject']}'");
	$controlle	=	mysql_num_rows($dbres);
		if($controlle != 0){
		mysql_query("UPDATE `cms` SET `cms`='{$_POST['message']}' WHERE `soort`='{$_POST['subject']}'");
		echo "Page Changed.<meta http-equiv=\"refresh\" content=\"3\">";
		} 

?>

		</td>
	</tr>
</table>

<?php

	exit;
	} if($_GET['actie'] == "delete"){

?>

<table align="center" width="600">
	<tr>
		<td class="subTitle" colspan="2">Text Page Management</td>
	</tr>
	<tr>
		<td width="600" class="mainTxt" align="center">

<?php

	mysql_query("DELETE FROM `cms` WHERE `id`='{$_GET['id']}'");
	echo "Page Removed.<meta http-equiv=\"refresh\" content=\"3\">";

?>

		</td>
	</tr>
</table>

<?php

	exit;
	}

$dbres	=	mysql_query("SELECT * FROM `cms` WHERE `soort`='{$_GET['soort']}'");
$cms	=	mysql_fetch_object($dbres);

?>

<form name="form1" method="POST" onSubmit="return submitForm(this.SEND);">
<table align="center" width="600">

	<tr>
		<td class="mainTxt" width="50%">Subject</td>
		<td class="mainTxt" width="50%"><input type="text" name="subject" value="<?php echo $cms->soort; ?>" maxlength=20 size="40"></td>
	</tr>
	<tr>
		<td class="maintxt" align="center" colspan="2"><textarea name="message" cols=65 rows=10><?php echo $cms->cms; ?></textarea></td>
	</tr>
	<tr>
		<td class="maintxt" width="100%" colspan="2" align="center"><input type="submit" name="submit" value="Submit" style="width: 200;"></td>
	</tr>
</table>
</form>
<br>
<table align="center" width="600">

	<tr>
		<td>
		<table width=100%>
			<tr>
				<td class="subTitle" style="letter-spacing: normal;" align="left" width=90%>
				<b>Name</b> - HINT: Use HTML Codes for the text format
				</td>
				<td class="subTitle" style="letter-spacing: normal;" align="center" width=10%>
				<b>Active</b>
				</td>
			</tr>

<?php

$dbres		=	mysql_query("SELECT * FROM `cms`");
	while($cms = mysql_fetch_object($dbres)){
?>

			<tr onMouseOver="this.style.backgroundColor='#6F5E4A';" onMouseOut="this.style.backgroundColor='#4B3D32';" style="background-color: #4B3D32;">
				<td align="left" class="justborderS" width="90%"><a href="admin-cms.php?soort=<?php echo $cms->soort; ?>"><?php echo $cms->soort; ?></a></td>
				<td align="center" class="justborderS" width="10%"><img src="images/overige/icons/vink.jpg" border=0 width="16" height="16"></td>
			</tr>

<?php

	}

?>


		</table>
		</td>
	</tr>
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