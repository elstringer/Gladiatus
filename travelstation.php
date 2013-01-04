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
  
  if($_GET['a'] != jail){
$bajes2            = mysql_query("SELECT *,UNIX_TIMESTAMP(`baktijd`) AS `baktijd`,0 FROM `users` WHERE `login`='$data->login'");
$bajes1            = mysql_fetch_object($bajes2);
$datijd = $data->gevangenis;
$tijdverschil1        = $bajes1->baktijd-3600+$datijd-time();
if($bajes1->baktijd + $datijd > time()){
header("Location: $sitelink/jail.php");
}}
?>


<html>
<head>
<link rel="stylesheet" type="text/css" href="<? echo $sitelink;?>/layout/crimestyle12/css/css.css"></head>
<body style="margin: 0px;">

<?
$train = $_POST['train'];
$dituur = date(H);
$extrauur = $dituur+1;
if($extrauur > 24){$extrauur = "00";}
$uur = $extrauur;
if($train > 0){
if($data->contant >= 1500){
$error = niks;
$select = mysql_query("SELECT * FROM `station` WHERE `stad`='$train'");
$select2 = mysql_fetch_object($select);
mysql_query("UPDATE `users` SET `aankomst`='$uur',`vliegen`='0000-00-00 00:00:00',`contant`=`contant`-'1500',`aankomststad`='$train' WHERE `id`='$data->id'");
mysql_query("UPDATE `users` SET `stationkaarten`=`stationkaarten`+'1',`bank`=`bank`+'1500' WHERE `login`='$select2->eigenaar'");
$_SESSION['mission'] = "Travel to an other city";
}
else{$error = 1;}
}
if($_GET['f'] == cancel){
$error = annuleren;
mysql_query("UPDATE `users` SET `aankomst`='25' WHERE `id`='$data->id'");
?>
			<table width="100%">
	<tr>
		<td align="center">
			<br><br><br><br>
			<table class="div_popup" align="center">
				<tr>
					<td>
						Your trip is canceled					</td>
				</tr>
				<tr>
					<td>
						<br><br>
							<a href="travelstation.php" class="msg_ok">Click here if you do not automatically redirect.</a>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<script language="javascript">
	setTimeout("document.location.href='travelstation.php'",(2000*2));
</script>
		</div>
	</td>
	</tr>

	</table>
	</td>
<?}
if($error == niks){?>
			<table width="100%">
	<tr>
		<td align="center">
			<br><br><br><br>
			<table class="div_popup" align="center">
				<tr>
					<td>
						The ticket is booked, you will automatically go along with the next train				</td>
				</tr>
				<tr>
					<td>
						<br><br>
							<a href="travelstation.php" class="msg_ok">Click here if you do not automatically redirect.</a>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<script language="javascript">
	setTimeout("document.location.href='travelstation.php'",(4000*2));
</script>
		</div>
	</td>
	</tr>

	</table>
	</td>
<?}
if($error == 1){
?>
			<table width="100%">
	<tr>
		<td align="center">
			<br><br><br><br>
			<table class="div_popup_error" align="center">
				<tr>
					<td style="color:red">
						<b>Error!</b><br><br>You do not have enough money to make this trip				</td>
				</tr>
				<tr>
					<td>
						<br><br>
													<a href="#" onClick="history.go(-1); return false" class="error_ok">OK</a>
											</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
		</div>
	</td>
	</tr>

	</table>
	</td>
<?}
$dit1 = mysql_query("SELECT * FROM `station` WHERE `stad`='$data->city'");
$dit = mysql_fetch_object($dit1);
if($dit->eigenaar == ""){
$error = eigenaar;
?>
					         <div class="title_bg"><div style="font-size:17px; color:#1b1a17; margin-left:10px; padding-top:4px;">Airport</div></div>
        <div style="width:100%; height:auto; background:#c3b79d; font-family:arial; font-size:12px; color:#2a190e;">
            <div style="padding:5px; padding-bottom:10px;" align="left">
       Like to travel the world. Just select an airport, buy a ticket and fly away!
   
         
                   </div>
        </div>

    
        
        
        

		<div style="background-color:#dbd2b7; padding:10px; padding-top:4px;">
		<table cellpadding="0" cellspacing="0" width="100%"><tr><td>
		 	<br>
 	<img src='images/icons_gif/information.gif' align='top'>
 	<font color='#3673AF'>
 		<b>
 			This airport has no owner yet!<br>
 			Go to the auction to buy this airport! 		</b>
 	</font>
 	<br>
 	<br>
 	<input type="button" name="cancel" value="Buy the airport!" class="mod_submit" onClick="document.location.href = 'cityauction.php'"><br>

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
}
if($error == ""){
if($data->aankomst != 25 && $data->aankomststad != 0){
$error = aanhetreizen;
$next = array("","$city_1","$city_2","$city_3","$city_4","$city_5","$city_6");
$next = $next[$data->aankomststad];
?>
					         <div class="title_bg"><div style="font-size:17px; color:#1b1a17; margin-left:10px; padding-top:4px;">Airport</div></div>
        <div style="width:100%; height:auto; background:#c3b79d; font-family:arial; font-size:12px; color:#2a190e;">
            <div style="padding:5px; padding-bottom:10px;" align="left">
       Like to travel the world. Just select an airport, buy a ticket and fly away!
   
         
                   </div>
        </div>


        

		<div style="background-color:#dbd2b7; padding:10px; padding-top:4px;">
		<table cellpadding="0" cellspacing="0" width="100%"><tr><td>
		 	<br>
 	<img src='images/icons_gif/information.gif' align='top'>
 	<font color='#3673AF'>
 		<b>
 			You're waiting for next plane to <?echo$next;?>...<br>
 			This trip leaves in about <?echo$data->aankomst;?> minutes.		</b>
 	</font>
 	<br>
 	<br>
 	<input type="button" name="cancel" value="Cancel the trip!" class="mod_submit" onClick="document.location.href = 'travelstation.php?f=cancel'"><br>
 	<small>*Attention! You dont get back your money when you cancel</small>

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
<?}}
if($error == ""){
$stations1 = mysql_query("SELECT * FROM `station` WHERE `stad`='$data->city'");
$stations = mysql_fetch_object($stations1);
$station11 = mysql_query("SELECT * FROM `station` WHERE `stad`='1'");
$station1 = mysql_fetch_object($station11);
$station22 = mysql_query("SELECT * FROM `station` WHERE `stad`='2'");
$station2 = mysql_fetch_object($station22);
$station33 = mysql_query("SELECT * FROM `station` WHERE `stad`='3'");
$station3 = mysql_fetch_object($station33);
$station44 = mysql_query("SELECT * FROM `station` WHERE `stad`='4'");
$station4 = mysql_fetch_object($station44);
$station55 = mysql_query("SELECT * FROM `station` WHERE `stad`='5'");
$station5 = mysql_fetch_object($station55);
$station66 = mysql_query("SELECT * FROM `station` WHERE `stad`='6'");
$station6 = mysql_fetch_object($station66);

$turijn1 = mysql_query("SELECT * FROM `users` WHERE `city`='1'");
$turijn = mysql_num_rows($turijn1);
$palermo1 = mysql_query("SELECT * FROM `users` WHERE `city`='2'");
$palermo = mysql_num_rows($palermo1);
$milaan1 = mysql_query("SELECT * FROM `users` WHERE `city`='3'");
$milaan = mysql_num_rows($milaan1);
$rome1 = mysql_query("SELECT * FROM `users` WHERE `city`='4'");
$rome = mysql_num_rows($rome1);
$catania1 = mysql_query("SELECT * FROM `users` WHERE `city`='5'");
$catania = mysql_num_rows($catania1);
$corleone1 = mysql_query("SELECT * FROM `users` WHERE `city`='6'");
$corleone = mysql_num_rows($corleone1);
$turijn = number_format($turijn, 0, '.', '.');
$palermo = number_format($palermo, 0, '.', '.');
$milaan = number_format($milaan, 0, '.', '.');
$rome = number_format($rome, 0, '.', '.');
$catania = number_format($catania, 0, '.', '.');
$corleone = number_format($corleone, 0, '.', '.');


$stationowner11 = mysql_query("SELECT * FROM `users` WHERE `login`='$station1->eigenaar'");
$user1 = mysql_fetch_object($stationowner11);
$stationowner22 = mysql_query("SELECT * FROM `users` WHERE `login`='$station2->eigenaar'");
$user2 = mysql_fetch_object($stationowner22);
$stationowner33 = mysql_query("SELECT * FROM `users` WHERE `login`='$station3->eigenaar'");
$user3 = mysql_fetch_object($stationowner33);
$stationowner44 = mysql_query("SELECT * FROM `users` WHERE `login`='$station4->eigenaar'");
$user4 = mysql_fetch_object($stationowner44);
$stationowner55 = mysql_query("SELECT * FROM `users` WHERE `login`='$station5->eigenaar'");
$user5 = mysql_fetch_object($stationowner55);
$stationowner66 = mysql_query("SELECT * FROM `users` WHERE `login`='$station6->eigenaar'");
$user6 = mysql_fetch_object($stationowner66);
$online11 = mysql_query("SELECT * FROM `users` WHERE UNIX_TIMESTAMP(NOW())-UNIX_TIMESTAMP(`online`) < 300 AND `login`='$user1->login'");
$online22 = mysql_query("SELECT * FROM `users` WHERE UNIX_TIMESTAMP(NOW())-UNIX_TIMESTAMP(`online`) < 300 AND `login`='$user2->login'");
$online33 = mysql_query("SELECT * FROM `users` WHERE UNIX_TIMESTAMP(NOW())-UNIX_TIMESTAMP(`online`) < 300 AND `login`='$user3->login'");
$online44 = mysql_query("SELECT * FROM `users` WHERE UNIX_TIMESTAMP(NOW())-UNIX_TIMESTAMP(`online`) < 300 AND `login`='$user4->login'");
$online55 = mysql_query("SELECT * FROM `users` WHERE UNIX_TIMESTAMP(NOW())-UNIX_TIMESTAMP(`online`) < 300 AND `login`='$user5->login'");
$online66 = mysql_query("SELECT * FROM `users` WHERE UNIX_TIMESTAMP(NOW())-UNIX_TIMESTAMP(`online`) < 300 AND `login`='$user6->login'");
$online1 = mysql_num_rows($online11);
$online2 = mysql_num_rows($online22);
$online3 = mysql_num_rows($online33);
$online4 = mysql_num_rows($online44);
$online5 = mysql_num_rows($online55);
$online6 = mysql_num_rows($online66);
if($stations->eigenaar == ""){
$stations->eigenaar = niemand;
}
?>

					         <div class="title_bg"><div style="font-size:17px; color:#1b1a17; margin-left:10px; padding-top:4px;">Airport</div></div>
        <div style="width:100%; height:auto; background:#c3b79d; font-family:arial; font-size:12px; color:#2a190e;">
            <div style="padding:5px; padding-bottom:10px;" align="left">
       Like to travel the world. Just select an airport, buy a ticket and fly away!
   
         
                   </div>
        </div>

     
        
        
        

		<div style="background-color:#dbd2b7; padding:10px; padding-top:4px;">
		<table cellpadding="0" cellspacing="0" width="100%"><tr><td>

<table width='100%'>
	<tr>
		<td valign='top'>
			The owner of this airport is <b><?echo$stations->eigenaar;?></b>.<br /><br />
			At the airport you can travel to another city.<br /><br />
			If you are in a hurry then watch the time. The next airport will leave in about <?echo$uur;?> minutes<br /><br />	</td>
		<td>
			<img src='images/game/airport.gif' align='right' border='1'>
		</td>
	</tr>
</table>
<br>

<form method="POST" onsubmit="return checkError(this);">
	<input type="hidden" name="sel" id="sel" value="">
<table width='100%' class="mod_list" cellspacing='2' cellpadding='2'>
	<tr>
		<td></td>
		<td></td>
		<td align='center'><b>City</b></td>
		<td></td>
		<td align='center'><b>Costs</b></td>
		<td></td>
		<td align='center'><b>Inhabitants</b></td>
		<td></td>
		<td align='center'><b>Owner</b></td>
	</tr>
			<tr class='top'>
			<td align='center' width='5%'>
			<?if($data->city == 1){?>&nbsp;<?}?>
									<?if($data->city != 1){?><input type="radio" name="train" value="1" onClick="document.getElementById('sel').value = 'true'"><?}?>
							</td>
			<td align='center' width='5%'><img src='images/icons_gif/world.gif'></td>
			<td>&nbsp;<?php echo $city_1 ?></td>
			<td align='center' width='5%'><img src='images/icons_gif/money.gif'></td>
			<td align='center'>&euro; 1.500</td>
			<td align='center' width='5%'><img src='images/icons_gif/chart_bar.gif'></td>
			<td align='center'><?echo$turijn;?></td>
<?if($online1 > 0){?>
			<td align='center' width='5%'><img src='images/icons_gif/status_online.gif'></td>
<?}else{?>
			<td align='center' width='5%'><img src='images/icons_gif/status_offline.gif'></td>
<?}?>
			<td align='center'>
<?if($user1->login == ""){?>
									<a href="cityauction.php"><b>Buy</b></a>
<?}else{?>
      								<a href="generalprofile.php?x=<?echo$user1->id?>"><?echo$user1->login?></a>
<?}?>
							</td>
		</tr>
			<tr class='top'>
			<td align='center' width='5%'>
			<?if($data->city == 2){?>&nbsp;<?}?>
									<?if($data->city != 2){?><input type="radio" name="train" value="2" onClick="document.getElementById('sel').value = 'true'"><?}?>
							</td>
			<td align='center' width='5%'><img src='images/icons_gif/world.gif'></td>
			<td>&nbsp;<?php echo $city_2 ?></td>
			<td align='center' width='5%'><img src='images/icons_gif/money.gif'></td>
			<td align='center'>&euro; 1.500</td>
			<td align='center' width='5%'><img src='images/icons_gif/chart_bar.gif'></td>
			<td align='center'><?echo$palermo;?></td>
<?if($online2 > 0){?>
			<td align='center' width='5%'><img src='images/icons_gif/status_online.gif'></td>
<?}else{?>
			<td align='center' width='5%'><img src='images/icons_gif/status_offline.gif'></td>
<?}?>
			<td align='center'>
<?if($user2->login == ""){?>
									<a href="cityauction.php"><b>Buy</b></a>
<?}else{?>
      								<a href="generalprofile.php?x=<?echo$user2->id?>"><?echo$user2->login?></a>
<?}?>
							</td>
		</tr>
			<tr class='top'>
			<td align='center' width='5%'>
			<?if($data->city == 3){?>&nbsp;<?}?>
									<?if($data->city != 3){?><input type="radio" name="train" value="3" onClick="document.getElementById('sel').value = 'true'"><?}?>
							</td>
			<td align='center' width='5%'><img src='images/icons_gif/world.gif'></td>
			<td>&nbsp;<?php echo $city_3 ?></td>
			<td align='center' width='5%'><img src='images/icons_gif/money.gif'></td>
			<td align='center'>&euro; 1.500</td>
			<td align='center' width='5%'><img src='images/icons_gif/chart_bar.gif'></td>
			<td align='center'><?echo$milaan;?></td>
<?if($online3 > 0){?>
			<td align='center' width='5%'><img src='images/icons_gif/status_online.gif'></td>
<?}else{?>
			<td align='center' width='5%'><img src='images/icons_gif/status_offline.gif'></td>
<?}?>
			<td align='center'>
<?if($user3->login == ""){?>
									<a href="cityauction.php"><b>Buy</b></a>
<?}else{?>
      								<a href="generalprofile.php?x=<?echo$user3->id?>"><?echo$user3->login?></a>
<?}?>
							</td>
		</tr>
			<tr class='top'>
			<td align='center' width='5%'>
			<?if($data->city == 4){?>&nbsp;<?}?>
									<?if($data->city != 4){?><input type="radio" name="train" value="4" onClick="document.getElementById('sel').value = 'true'"><?}?>
							</td>
			<td align='center' width='5%'><img src='images/icons_gif/world.gif'></td>
			<td>&nbsp;<?php echo $city_4 ?></td>
			<td align='center' width='5%'><img src='images/icons_gif/money.gif'></td>
			<td align='center'>&euro; 1.500</td>
			<td align='center' width='5%'><img src='images/icons_gif/chart_bar.gif'></td>
			<td align='center'><?echo$rome;?></td>
<?if($online4 > 0){?>
			<td align='center' width='5%'><img src='images/icons_gif/status_online.gif'></td>
<?}else{?>
			<td align='center' width='5%'><img src='images/icons_gif/status_offline.gif'></td>
<?}?>
			<td align='center'>
<?if($user4->login == ""){?>
									<a href="cityauction.php"><b>Buy</b></a>
<?}else{?>
      								<a href="generalprofile.php?x=<?echo$user4->id?>"><?echo$user4->login?></a>
<?}?>
							</td>
		</tr>
			<tr class='top'>
			<td align='center' width='5%'>
			<?if($data->city == 5){?>&nbsp;<?}?>
         <?if($data->city != 5){?><input type="radio" name="train" value="5" onClick="document.getElementById('sel').value = 'true'"><?}?>
							</td>
			<td align='center' width='5%'><img src='images/icons_gif/world.gif'></td>
			<td>&nbsp;<?php echo $city_5 ?></td>
			<td align='center' width='5%'><img src='images/icons_gif/money.gif'></td>
			<td align='center'>&euro; 1.500</td>
			<td align='center' width='5%'><img src='images/icons_gif/chart_bar.gif'></td>
			<td align='center'><?echo$catania;?></td>
<?if($online5 > 0){?>
			<td align='center' width='5%'><img src='images/icons_gif/status_online.gif'></td>
<?}else{?>
			<td align='center' width='5%'><img src='images/icons_gif/status_offline.gif'></td>
<?}?>
			<td align='center'>
<?if($user5->login == ""){?>
									<a href="veiling"><b>Buy</b></a>
<?}else{?>
      								<a href="generalprofile.php?x=<?echo$user5->id?>"><?echo$user5->login?></a>
<?}?>
							</td>
		</tr>
			<tr class='top'>
			<td align='center' width='5%'>
									<?if($data->city == 6){?>&nbsp;<?}?>
          <?if($data->city != 6){?><input type="radio" name="train" value="6" onClick="document.getElementById('sel').value = 'true'"><?}?>
                            </td>
			<td align='center' width='5%'><img src='images/icons_gif/world.gif'></td>
			<td>&nbsp;<?php echo $city_6 ?></td>
			<td align='center' width='5%'><img src='images/icons_gif/money.gif'></td>
			<td align='center'>&euro; 1.500</td>
			<td align='center' width='5%'><img src='images/icons_gif/chart_bar.gif'></td>
			<td align='center'><?echo$corleone;?></td>
<?if($online6 > 0){?>
			<td align='center' width='5%'><img src='images/icons_gif/status_online.gif'></td>
<?}else{?>
			<td align='center' width='5%'><img src='images/icons_gif/status_offline.gif'></td>
<?}?>
			<td align='center'>
<?if($user6->login == ""){?>
									<a href="cityauction.php"><b>Buy</b></a>
<?}else{?>
      								<a href="generalprofile.php?x=<?echo$user6->id?>"><?echo$user6->login?></a>
<?}?>
							</td>
		</tr>
		<tr height='20px'>
		<td colspan='9'>
			<input type='submit' name='koop' value='Buy a ticket' class="mod_submit">
		</td>
	</tr>
</table>
		</td></tr></table>
		</div>

		<table width='100%' cellspacing='2' cellpadding='2'>
			<tr>

				<td class='content_bottom'></td>
			</tr>
		</table>


<script language="javascript">
	function checkError(pForm){
		var errormsg = '';

		if(pForm.sel.value != 'true') errormsg += 'You did not select an airport!<br>';

		if(errormsg != ''){
			showError(errormsg);
			return false;
		}
		return true;
	}
</script>		</div>
	</td>
	</tr>

	</table>
	</td>
<?}?>
