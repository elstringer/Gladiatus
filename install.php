<?php

/**
 * @author CasTeaL
 * @copyright 2010
 */

$site = $_SERVER["SERVER_NAME"];

if($site == "localhost"){
    
    echo "<font color ='red'>This script not working localhost / Script Localhostta çalışmamaktadır..</font>";
 die();   
}

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
										<a class = "menuitem_aktive" href="#" title="Yeni Kayıt" target="_self">Step 1 - Install</a>
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
<div id="krieger">
	<h1 style="position:relative; top: 20px;">Database Config</h1>
	<div class="signup_form">
		<table width="100%" cellpadding="0" cellspacing="2" border="0" align="center">
		<tr class="alt">
			<td>Host Server:</td>

		</tr>
		<tr>
			<td><input class="input" type="text" name="server" size="30" MAXLENGTH="30" value=""></td>
		</tr>
        
        <tr class="alt">
			<td>E-Mail:</td>
		</tr>
				<tr>
			<td><input class="input" type="text" name="mail" size="30" MAXLENGTH="120" value=""></td>
		</tr>
</tr>
		<tr>
			<td>Database Name:</td>
		</tr>
		<tr>

			<td><input class="input" type="text" name="dbname" size="30" MAXLENGTH="30"  value=""></td>
		</tr>
		<tr class="alt">
			<td>Database Username:</td>
		</tr>
				<tr>
			<td><input class="input" type="text" name="dbuser" size="30" MAXLENGTH="120" value=""></td>
		</tr>
</tr>
				<tr class="alt">
			<td>Database Password:</td>
		</tr>
				<tr>
			<td><input class="input" type="password" name="dbpass" size="30" MAXLENGTH="120" value=""></td>
		</tr>
</tr>

<tr class="alt">
			<td>Admin Name:</td>
		</tr>
				<tr>
			<td><input class="input" type="text" name="admin" size="30" MAXLENGTH="120" value=""></td>
		</tr>
</tr>

<tr class="alt">
			<td>Admin Password:</td>
		</tr>
				<tr>
			<td><input class="input" type="password" name="apass" size="30" MAXLENGTH="120" value=""></td>
		</tr>
</tr>
		
		<tr><td style="padding-left:20px;"><br /><input type="submit" value="Install" class="button1"></td></tr>
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