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
if(isset($_POST['first'])){
if($data->callcredits >= 8){
mysql_query("UPDATE `users` SET `callcredits`=`callcredits`-'8', `vipdays`=`vipdays`+'15' WHERE `login`='$data->login'");
mysql_query("INSERT INTO ccshoplogs(login,ip,date,wat,credits) values('" . $data->login . "','" . $_SERVER['REMOTE_ADDR'] . "',NOW(),'15 days VIP','8')");
   header("Location: $sitelink/vipbuycredits.php?p=shop");
}
}
if(isset($_POST['second'])){
if($data->callcredits >= 15){
mysql_query("UPDATE `users` SET `callcredits`=`callcredits`-'15', `vipdays`=`vipdays`+'30' WHERE `login`='$data->login'");
mysql_query("INSERT INTO ccshoplogs(login,ip,date,wat,credits) values('" . $data->login . "','" . $_SERVER['REMOTE_ADDR'] . "',NOW(),'30 days VIP','15')");
   header("Location: $sitelink/vipbuycredits.php?p=shop");
}
}
if(isset($_POST['third'])){
if($data->callcredits >= 8){
mysql_query("UPDATE `users` SET `callcredits`=`callcredits`-'8', `bank`=`bank`+'3000000' WHERE `login`='$data->login'");
mysql_query("INSERT INTO ccshoplogs(login,ip,date,wat,credits) values('" . $data->login . "','" . $_SERVER['REMOTE_ADDR'] . "',NOW(),'3.000.000 bank money','8')");
   header("Location: $sitelink/vipbuycredits.php?p=shop");
}
}
if(isset($_POST['fourth'])){
if($data->callcredits >= 15){
mysql_query("UPDATE `users` SET `callcredits`=`callcredits`-'15', `bank`=`bank`+'6000000' WHERE `login`='$data->login'");
mysql_query("INSERT INTO ccshoplogs(login,ip,date,wat,credits) values('" . $data->login . "','" . $_SERVER['REMOTE_ADDR'] . "',NOW(),'6.000.000 bank money','15')");
   header("Location: $sitelink/vipbuycredits.php?p=shop");
}
}
if(isset($_POST['fifth'])){
if($data->callcredits >= 4){
mysql_query("UPDATE `users` SET `callcredits`=`callcredits`-'4', `bankstandard`=`bankstandard`+'5' WHERE `login`='$data->login'");
mysql_query("INSERT INTO ccshoplogs(login,ip,date,wat,credits) values('" . $data->login . "','" . $_SERVER['REMOTE_ADDR'] . "',NOW(),'5x more deposits','4')");
   header("Location: $sitelink/vipbuycredits.php?p=shop");
}
}
if(isset($_POST['sixth'])){
if($data->callcredits >= 7){
mysql_query("UPDATE `users` SET `callcredits`=`callcredits`-'7', `dagenrente`=`dagenrente`+'15' WHERE `login`='$data->login'");
mysql_query("INSERT INTO ccshoplogs(login,ip,date,wat,credits) values('" . $data->login . "','" . $_SERVER['REMOTE_ADDR'] . "',NOW(),'Extra interest','7')");
   header("Location: $sitelink/vipbuycredits.php?p=shop");
}
}
if(isset($_POST['seventh'])){
if($data->callcredits >= 9){
mysql_query("UPDATE `users` SET `callcredits`=`callcredits`-'9', `maffia`=`maffia`+'24' WHERE `login`='$data->login'");
mysql_query("INSERT INTO ccshoplogs(login,ip,date,wat,credits) values('" . $data->login . "','" . $_SERVER['REMOTE_ADDR'] . "',NOW(),'24 hours protection','9')");
   header("Location: $sitelink/vipbuycredits.php?p=shop");
}
}
if(isset($_POST['eighth'])){
if($data->callcredits >= 13){
mysql_query("UPDATE `users` SET `callcredits`=`callcredits`-'13', `maffia`=`maffia`+'48' WHERE `login`='$data->login'");
mysql_query("INSERT INTO ccshoplogs(login,ip,date,wat,credits) values('" . $data->login . "','" . $_SERVER['REMOTE_ADDR'] . "',NOW(),'48 hours protection','13')");
   header("Location: $sitelink/vipbuycredits.php?p=shop");
}
}
if(isset($_POST['nineth'])){
if($data->callcredits >= 8){
mysql_query("UPDATE `users` SET `callcredits`=`callcredits`-'8', `maffia`=`maffia`+'12', `power`=`power`+'1500', `bank`=`bank`+'1000000' WHERE `login`='$data->login'");
mysql_query("INSERT INTO ccshoplogs(login,ip,date,wat,credits) values('" . $data->login . "','" . $_SERVER['REMOTE_ADDR'] . "',NOW(),'12 hours protection','8')");
   header("Location: $sitelink/vipbuycredits.php?p=shop");
}
}
if(isset($_POST['tenth'])){
if($data->callcredits >= 15){
mysql_query("UPDATE `users` SET `callcredits`=`callcredits`-'15', `power`=`power`+'75000' WHERE `login`='$data->login'");
mysql_query("INSERT INTO ccshoplogs(login,ip,date,wat,credits) values('" . $data->login . "','" . $_SERVER['REMOTE_ADDR'] . "',NOW(),'75.000 power','15')");
   header("Location: $sitelink/vipbuycredits.php?p=shop");
}
}
if(isset($_POST['eleventh'])){
if($data->callcredits >= 28){
mysql_query("UPDATE users SET health='100', vermoord='0' WHERE login='" . $data->login . "'");
mysql_query("INSERT INTO ccshoplogs(login,ip,date,wat,credits) values('" . $data->login . "','" . $_SERVER['REMOTE_ADDR'] . "',NOW(),'100 % life','28')");
   header("Location: $sitelink/vipbuycredits.php?p=shop");
}
}
if(isset($_POST['twelveth'])){
if($data->callcredits >= 7){
mysql_query("UPDATE `users` SET `callcredits`=`callcredits`-'7' WHERE `login`='$data->login'");
mysql_query("UPDATE `clicks` SET `active`='0' WHERE `login`='$data->login'");
mysql_query("INSERT INTO ccshoplogs(login,ip,date,wat,credits) values('" . $data->login . "','" . $_SERVER['REMOTE_ADDR'] . "',NOW(),'Secret Link Cleaner','7')");
   header("Location: $sitelink/vipbuycredits.php?p=shop");
}
}
if(isset($_POST['thirteenth'])){
if($data->callcredits >= 7){
mysql_query("UPDATE `users` SET `callcredits`=`callcredits`-'7', `kogels`=`kogels`+'150' WHERE `login`='$data->login'");
mysql_query("INSERT INTO ccshoplogs(login,ip,date,wat,credits) values('" . $data->login . "','" . $_SERVER['REMOTE_ADDR'] . "',NOW(),'150 Attack Coins','7')");
   header("Location: $sitelink/vipbuycredits.php?p=shop");
}
}
if(isset($_POST['fourteenth'])){
if($data->callcredits >= 15){
mysql_query("UPDATE `registered_ip` SET `max`=`max`+'1' WHERE `ip`='$data->IP'");
mysql_query("UPDATE `users` SET `callcredits`=`callcredits`-'15' WHERE `login`='$data->login'");
mysql_query("INSERT INTO ccshoplogs(login,ip,date,wat,credits) values('" . $data->login . "','" . $_SERVER['REMOTE_ADDR'] . "',NOW(),'Extra Account','15')");
   header("Location: $sitelink/vipbuycredits.php?p=shop");
}
}
?>
					<script language="javascript">
	function handleTabs(pTab){

		var tabblad;
		var tabbladen = new Array();
		tabbladen[0] = 'buy';
		tabbladen[1] = 'info';
		tabbladen[2] = 'shop';

		for(i=0;i<tabbladen.length;i++){
			document.getElementById('tab_' + tabbladen[i]).style.backgroundImage = 'url(images/game/tab_dark.jpg)';
			document.getElementById('page_' + tabbladen[i]).style.display = 'none';
		}

		document.getElementById('tab_' + pTab).style.backgroundImage = 'url(images/game/tab_light.jpg)';
		document.getElementById('page_' + pTab).style.display = 'block';
	}
</script>
<h1 id="ajax_targetpay" style="display:none">AJAX MENU</h1>

		<div class="title_bg">
			<div class="title">Game Credit Shop</div>
		</div>

		<div style="background-color:#dbd2b7; padding:10px; padding-top:4px;">
		<table cellpadding="0" cellspacing="0" width="100%"><tr><td>
		<table cellpadding="0" cellspacing="0" border="0">
	<tr>
		<td>
			<div id="tab_buy" style="float:left; width:130px; height:35px; background: url(images/game/tab_dark.jpg) no-repeat;">
				<div style="margin-left:15px; margin-top:8px;"><img src="images/icons/money.png" align="bottom">
					<a style="font-size:16px; color:black" href="vipgamecredits.php">Buy</a>
				</div>
			</div>
			<div id="tab_info" style="float:left; width:130px; height:35px; background: url(images/game/tab_dark.jpg) no-repeat; margin-left:10px;">
				<div style="margin-left:15px; margin-top:8px;"><img src="images/icons_gif/information.gif" align="bottom">
					<a style="font-size:16px; color:black" href="javascript:handleTabs('info')">Info</a>
				</div>
			</div>
			<div id="tab_shop" style="float:right; width:130px; height:35px; background: url(images/game/tab_dark.jpg) no-repeat; margin-left:10px;">
				<div style="margin-left:15px; margin-top:8px;"><img src="images/icons_gif/basket.gif" align="bottom">
					<a style="font-size:16px; color:black" href="javascript:handleTabs('shop')">Credit Shop</a>
				</div>
			</div>
		</td>
	</tr><?if($data->vermoord > 0){?>
							<div id="page_nl" style="display:none;">
					<table border="0px" cellpadding="0px" cellspacing="0px" width="100%" bgcolor="#e5dfd3" style="margin-top:0px;">
												<tr>
							<td width="100%" colspan="2">
								<div id="js_msg"  style="width:100%; background:url(images/js_msg/bg.gif) repeat-y; margin-top:10px; margin-left:2px;margin-right:2px;">
									<table cellpadding="0" cellspacing="0" border="0" align="center" width="575">
										<tr>
											<td colspan="4" height="4px"><img src="images/js_msg/top.gif"></td>
										</tr>
										<tr>
											<td width="2px">&nbsp;</td>
											<td align="center" valign="middle" style="padding-top:0; padding-left:3px"  bgcolor="#FFFFFF">
												<table cellspacing="5">
													<tr>
														<td>
															<img src="images/js_msg/exl_big_red.gif">
														</td>
													</tr>
												</table>
											</td>
											<td width="556px" bgcolor="#FFFFFF">
												<div id="text_shop" style="display:block; line-height:135%; font-size:12px; font-weight:bold">
											    	<font color='black' id="js_msg_msg">
											    		<table width="100%">
														<tr>

															<td width="100%">
																<b style="font-size:18px">Unfortunately, you are killed...</b><br>
																<br>
																To get back to life you have use Game Credits. <br>
																<br>
																In addition to the 100% life, you even get <b>28</b> callcredits!															</td>
															<td>
																<img src="images/game/dood.jpg" align="left" width="200px">
															</td>
														</tr>
													</table>
											    	</font>
												</div>
											</td>
											<td width="2px"></td>
										</tr>
										<tr>
											<td colspan="4" height="13px"><img src="images/js_msg/bottom.gif"></td>
										</tr>
									</table>

								</div>


							</td>
						</tr><?}?>
	<tr>
		<td>
			<div id="page_buy" style="display:none;">
				<table border="0px" cellpadding="0px" cellspacing="0px" width="100%" bgcolor="#e5dfd3" style="margin-top:0px;">
										<tr>
						<td width="400" colspan="2">
							<div id="alerter" style="width:575px; height: 65px; background:url(images/game/alert_balloon.jpg) no-repeat; margin-top:10px;">
								<div id="text_nl" style="position:absolute; height:65px; margin-left:35px; margin-top: 8px; line-height:135%; font-size:14px;">
									To buy things in the Call Shop you need Game Credits.<br>
									To receive<b>28 Game Credits</b> you have to do this:
								</div>
							</div>
						</td>
					</tr>
<?
echo $error;
?>
										<tr>
						<td colspan="2">
							<form method="GET">
							<table border="0px" cellpadding="0px" cellspacing="0px" width="100%" bgcolor="#e5dfd3">
								<tr>
									<td background="images/game/subheader_bg.jpg" style="background-repeat:no-repeat;" height="40">
										<div style="margin-left:10px; font-family:Verdana; font-size:16px; font-weight:bold;">What to do</div>

									</td>

									<td rowspan="6" valign="top" align="right" style="padding-right:10px;">
										<div style="width:160px; height:100px; background: url('images/game/callcredits_stamp_bottom.jpg') no-repeat bottom; text-align:center;">
											<img id="stamp" src="images/game/callcredits_stamp.jpg" border="0px"><a href="javascript:handleTabs('info')" style="color:#6b5e40; margin-top:3px; display:block">What are Game Credits?</a><br>
										</div>
									</td>
								</tr>

								<tr>

									<td colspan=2>
										<br>
										<div style="margin-left:10px; font-family:Verdana; font-size:14px;">Instructions</div>
										<br><br>
									</td>
								</tr>

								<tr>
									<td background="images/game/subheader_bg.jpg" style="background-repeat:no-repeat;" width="395px" height="40">

										<div style="margin-left:10px; font-family:Verdana; font-size:16px; font-weight:bold;">Step 2</div>
									</td>
								</tr>

								<tr>
									<td>
										<br>
										<div style="margin-left:10px; font-family:Verdana; font-size:12px;">
Choose your country:<br />
    <table>
    <tr>
    <td><a href="vipbuycredits.php?c=31"></a></td>
    <td><a href="vipbuycredits.php?c=31">Country name</a></td>
    <td width="10"> </td>
    <td><a href="vipbuycredits.php?c=32"></a></td>
    <td><a href="vipbuycredits.php?c=32">Country name</a></td>
    </tr>
    </table>
    <br />

<br />
										</div>
										<br><br>
									</td>
								</tr>

								<tr>
									<td background="images/game/subheader_bg.jpg" style="background-repeat:no-repeat;" width="395px" height="40">
										<div style="margin-left:10px; font-family:Verdana; font-size:16px; font-weight:bold;">Step 3</div>

									</td>
								</tr>

								<tr>
									<td>
										<br>
										<div style="margin-left:10px; font-family:Verdana; font-size:12px;width:370px">
fff
											<!--<center><img src="ajax/loading.gif" align="middle"></center>-->
										</div>
										<br><br>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
				</form>
			</div>
			<div id="page_info" style="display:none">
				<table border="0px" cellpadding="0px" cellspacing="0px" width="100%" bgcolor="#e5dfd3" style="margin-top:0px;">
										<tr>
						<td width="400" colspan="2">
							<div id="alerter" style="width:575; height: 65px; background:url(images/game/alert_balloon.jpg) no-repeat; margin-top:10px;">
								<div id="text_be" style="position:absolute; height:65px; margin-left:35px; margin-top: 8px; line-height:135%; font-size:14px;">
         Here you find all information about the Game Credits:
								</div>
							</div>
						</td>
					</tr>
										<tr>
						<td colspan="2">
							<form method="GET">
								<input type="hidden" name="a" value="buycredits">
								<input type="hidden" name="f" value="phone_be">
								<table border="0px" cellpadding="0px" cellspacing="0px" width="100%" bgcolor="#e5dfd3">
									<tr>
										<td background="images/game/subheader_bg.jpg" style="background-repeat:no-repeat;" width="395" height="40">
											<div style="margin-left:10px; font-family:Verdana; font-size:16px; font-weight:bold;">Information</div>
										</td>

									</tr>

									<tr>
										<td>
											<br>
											<div style="margin-left:10px; font-family:Verdana; font-size:14px;">Game Credits will give you special options<br>Highly recommended is the paid account. This is a great <BR> combination of benefits. <br><br> You also get <b><u>2</b></u> call credits each week. <BR>
                                            
                                          </div>

											<br><br>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</form>
			</div>


			<div id="page_shop" style="display:none">
				<table border="0px" cellpadding="0px" cellspacing="0px" width="100%" bgcolor="#e5dfd3" style="margin-top:0px;">
					<tr>
						<td width="400" colspan="2">
							<div id="alerter" style="width:575px; height: 65px; background:url(images/game/alert_balloon.jpg) no-repeat; margin-top:10px;">
								<div id="text_be" style="position:absolute; height:65px; margin-left:35px; margin-top: 8px; line-height:135%; font-size:14px;">
									<a style="color:black" href="vipgamecredits.php">You have <b><?echo $data->callcredits;?></b> Game Credits, 	
click here to buy more!</a>
								</div>
							</div>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<table width="100%" border="0" cellspacing="2" cellpadding="2" class="mod_list" bgcolor="#e5dfd3">
								<tr>
									<td align="center" width="3%" class="subtable">&nbsp;</td>
									<td class="subtable"><strong>Item</strong></td>
									<td class="subtable" align="center"><strong>Credits</strong></td>
									<td align="center" width="6%" class="subtable"><strong>Buy</strong></td>
								</tr>
	<form method="POST">
																<tr class="top">
									<td align="center" width="6%" class="subtable"><img width="16" src='images/icons_gif/star_big.gif' alt='15 days paid account' border='0'></td>
									<td class="subtable">
										15 days paid account
																				</td>
									<td class="subtable">8 Credits</td>
									<td align="center" width="6%" class="subtable">
<?if($data->callcredits < 8){?>
																					<font class="callshop_kopen_no">&nbsp;Buy&nbsp;</font>
<?}else{?>				<input type="submit" class="mod_submit" value="&nbsp;Buy&nbsp;" name="first"><?}?>
																			</td>
								</tr>
																<tr class="top">
									<td align="center" width="6%" class="subtable"><img width="16" src='images/icons_gif/star_big.gif' alt='30 days paid account' border='0'></td>
									<td class="subtable">
										30 days paid account
																				</td>
									<td class="subtable">15 Credits</td>
									<td align="center" width="6%" class="subtable">
<?if($data->callcredits < 15){?>
																					<font class="callshop_kopen_no">&nbsp;Buy&nbsp;</font>
<?}else{?>				<input type="submit" class="mod_submit" value="&nbsp;Buy&nbsp;" name="second"><?}?>
																			</td>
								</tr>
																<tr class="top">
									<td align="center" width="6%" class="subtable"><img width="16" src='images/icons_gif/money.gif' alt='Extra money: &euro; 3.000.000' border='0'></td>
									<td class="subtable">
										Extra money: &euro; 3.000.000																				</td>
									<td class="subtable">8 Credits</td>
									<td align="center" width="6%" class="subtable">
<?if($data->callcredits < 8){?>
																					<font class="callshop_kopen_no">&nbsp;Buy&nbsp;</font>
<?}else{?>				<input type="submit" class="mod_submit" value="&nbsp;Buy&nbsp;" name="third"><?}?>
																			</td>
								</tr>
																<tr class="top">
									<td align="center" width="6%" class="subtable"><img width="16" src='images/icons_gif/money.gif' alt='Extra money: &euro; 6.000.000' border='0'></td>
									<td class="subtable">
										Extra money: &euro; 6.000.000																				</td>
									<td class="subtable">15 Credits</td>
									<td align="center" width="6%" class="subtable">
<?if($data->callcredits < 15){?>
																					<font class="callshop_kopen_no">&nbsp;Buy&nbsp;</font>

<?}else{?>				<input type="submit" class="mod_submit" value="&nbsp;Buy&nbsp;" name="fourth"><?}?>
																			</td>
								</tr>
																<tr class="top">
									<td align="center" width="6%" class="subtable"><img width="16" src='images/icons_gif/money.gif' alt='5 times more deposits at the bank' border='0'></td>
									<td class="subtable">
										5 times more deposits at the bank																				</td>
									<td class="subtable">4 Credits</td>
									<td align="center" width="6%" class="subtable">
<?if($data->callcredits < 4){?>
																					<font class="callshop_kopen_no">&nbsp;Buy&nbsp;</font>
<?}else{?>				<input type="submit" class="mod_submit" value="&nbsp;Buy&nbsp;" name="fifth"><?}?>
																			</td>
								</tr>
																<tr class="top">
									<td align="center" width="6%" class="subtable"><img width="16" src='images/icons_gif/money.gif' alt='15 days 10% interests' border='0'></td>
									<td class="subtable">
										15 days 10% interests																				</td>
									<td class="subtable">7 Credits</td>
									<td align="center" width="6%" class="subtable">
<?if($data->callcredits < 7){?>
																					<font class="callshop_kopen_no">&nbsp;Buy&nbsp;</font>
<?}else{?>				<input type="submit" class="mod_submit" value="&nbsp;Buy&nbsp;" name="sixth"><?}?>
																			</td>
								</tr>
																<tr class="top">
									<td align="center" width="6%" class="subtable"><img width="16" src='images/icons_gif/shield.gif' alt='24 hours protection' border='0'></td>
									<td class="subtable">
										24 hours protection																				</td>
									<td class="subtable">9 Credits</td>
									<td align="center" width="6%" class="subtable">
<?if($data->callcredits < 9){?>
																					<font class="callshop_kopen_no">&nbsp;Buy&nbsp;</font>
<?}else{?>				<input type="submit" class="mod_submit" value="&nbsp;Buy&nbsp;" name="seventh"><?}?>
																			</td>
								</tr>
																<tr class="top">
									<td align="center" width="6%" class="subtable"><img width="16" src='images/icons_gif/shield.gif' alt='48 hours protection' border='0'></td>
									<td class="subtable">
										48 hours protection																				</td>
									<td class="subtable">13 Credits</td>
									<td align="center" width="6%" class="subtable">
<?if($data->callcredits < 13){?>
																					<font class="callshop_kopen_no">&nbsp;Buy&nbsp;</font>
<?}else{?>				<input type="submit" class="mod_submit" value="&nbsp;Buy&nbsp;" name="eighth"><?}?>
																			</td>
								</tr>
																<tr class="top">
									<td align="center" width="6%" class="subtable"><img width="16" src='images/icons_gif/shield.gif' alt='&euro; 1.000.000, 12 hours protection and 1.500 power' border='0'></td>
									<td class="subtable">
										&euro; 1.000.000, 12 hours protection and 1.500 power																			</td>
									<td class="subtable">8 Credits</td>
									<td align="center" width="6%" class="subtable">
<?if($data->callcredits < 8){?>
																					<font class="callshop_kopen_no">&nbsp;Buy&nbsp;</font>
<?}else{?>				<input type="submit" class="mod_submit" value="&nbsp;Buy&nbsp;" name="nineth"><?}?>
																			</td>
								</tr>
																<tr class="top">
									<td align="center" width="6%" class="subtable"><img width="16" src='images/icons_gif/lightning.gif' alt='75000 extra power' border='0'></td>
									<td class="subtable">
										75000 extra power																				</td>
									<td class="subtable">15 Credits</td>
									<td align="center" width="6%" class="subtable">
<?if($data->callcredits < 15){?>
																					<font class="callshop_kopen_no">&nbsp;Buy&nbsp;</font>
<?}else{?>				<input type="submit" class="mod_submit" value="&nbsp;Buy&nbsp;" name="tenth"><?}?>
																			</td>
								</tr>
																<tr class="top">
									<td align="center" width="6%" class="subtable"><img width="16" src='images/icons_gif/heart.gif' alt='Full health (100%)' border='0'></td>
									<td class="subtable">
										Full health (100%)																				</td>
									<td class="subtable">28 Credits</td>
									<td align="center" width="6%" class="subtable">
<?if($data->callcredits < 28){?>
																					<font class="callshop_kopen_no">&nbsp;Buy&nbsp;</font>
<?}else{?>				<input type="submit" class="mod_submit" value="&nbsp;Buy&nbsp;" name="eleventh"><?}?>
																			</td>
								</tr>
																<tr class="top">
									<td align="center" width="6%" class="subtable"><img width="16" src='images/icons_gif/delete.gif' alt='Secret Link Cleaner' border='0'></td>
									<td class="subtable">
										Secret Link Cleaner																				</td>
									<td class="subtable">7 Credits</td>
									<td align="center" width="6%" class="subtable">
<?if($data->callcredits < 7){?>
																					<font class="callshop_kopen_no">&nbsp;Buy&nbsp;</font>
<?}else{?>				<input type="submit" class="mod_submit" value="&nbsp;Buy&nbsp;" name="twelveth"><?}?>
																			</td>
								</tr>
																<tr class="top">
									<td align="center" width="6%" class="subtable"><img width="16" src='images/icons_gif/brick.gif' alt='150 attack coins' border='0'></td>
									<td class="subtable">
										150 attack coins																				</td>
									<td class="subtable">7 Credits</td>
									<td align="center" width="6%" class="subtable">
<?if($data->callcredits < 7){?>
																					<font class="callshop_kopen_no">&nbsp;Buy&nbsp;</font>
<?}else{?>				<input type="submit" class="mod_submit" value="&nbsp;Buy&nbsp;" name="thirteenth"><?}?>
																			</td>
								</tr>
																<tr class="top">
									<td align="center" width="6%" class="subtable"><img width="16" src='images/icons_gif/status_offline.gif' alt='Extra account' border='0'></td>
									<td class="subtable">
										Extra account
																				</td>
									<td class="subtable">15 Credits</td>
									<td align="center" width="6%" class="subtable">
<?if($data->callcredits < 15){?>
																					<font class="callshop_kopen_no">&nbsp;Buy&nbsp;</font>
<?}else{?>				<input type="submit" class="mod_submit" value="&nbsp;Buy&nbsp;" name="fourteenth"><?}?>
																			</td>
								</tr>
															</table>
        </form>
						</td>
					</tr>
				</table>
			</div>



					</td>
	</tr>
</table>
<?if($_GET['p'] == shop){
?>
	<script language="javascript">
		handleTabs('shop');
	</script>
<?}
if($_GET['p'] != shop){
?>
	<script language="javascript">
		handleTabs('buy');
	</script>
<?}?>

		</td></tr></table>
		</div>

				</div>
	</td>
	</tr>

	</table>
	</td>