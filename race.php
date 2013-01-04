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
if($_GET['x'] > 0){
$auto1 = mysql_query("SELECT * FROM `autos` WHERE `id`='{$_GET['x']}'");
$auto = mysql_fetch_object($auto1);
if($auto->schade > 59){$error = 4;}
if($auto->owner != $data->login){$error = 3;}
if($error != 3 && $error != 4){
if($auto->soort == 1){$level = 12;}
if($auto->soort == 2){$level = 1;}
if($auto->soort == 3){$level = 13;}
if($auto->soort == 4){$level = 5;}
if($auto->soort == 5){$level = 3;}
if($auto->soort == 6){$level = 2;}
if($auto->soort == 7){$level = 14;}
if($auto->soort == 8){$level = 4;}
if($auto->soort == 9){$level = 7;}
if($auto->soort == 10){$level = 17;}
if($auto->soort == 11){$level = 6;}
if($auto->soort == 12){$level = 11;}
if($auto->soort == 13){$level = 8;}
if($auto->soort == 14){$level = 9;}
if($auto->soort == 15){$level = 10;}
if($auto->soort == 16){$level = 15;}
if($auto->soort == 17){$level = 16;}
$otherlevel = rand(1,17);
$jatkans = rand(0,5);
if($level > $otherlevel){
$winst = rand(2000,6000);
$winst = $winst*$auto->soort;
$schade = rand(5,35);
$error = niks;
mysql_query("UPDATE `users` SET `contant`=`contant`+'$winst' WHERE `login`='$data->login'");
mysql_query("UPDATE `autos` SET `schade`=`schade`+'$schade' WHERE `id`='$auto->id'");
}
else{
$schade = rand(5,20);
$error = 1;
mysql_query("UPDATE `autos` SET `schade`=`schade`+'$schade' WHERE `id`='$auto->id'");
}
if($jatkans == 5){
$error = 2;
mysql_query("DELETE FROM `autos` WHERE `id`='$auto->id'");
}
}
}
if($error == 1){
?>
		<table width="100%">
	<tr>
		<td align="center">
			<br><br><br><br>
			<table class="div_popup" align="center">
				<tr>
					<td>
						You have lost! Your car has a lot of damage. Go to the garage to fix it!					</td>
				</tr>
				<tr>
					<td>
						<br><br>
							<a href="race.php" class="msg_ok">Click here if you do not automatically redirect.</a>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<script language="javascript">
	setTimeout("document.location.href='race.php'",(3000*2));
</script>
		</div>
	</td>
	</tr>

	</table>
	</td>
<?}
if($error == 3){
?>
			<table width="100%">
	<tr>
		<td align="center">
			<br><br><br><br>
			<table class="div_popup_error" align="center">
				<tr>
					<td style="color:red">
						<b>Error!</b><br><br>Cant find the car in your garage					</td>
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
if($error == 2){
?>
		<table width="100%">
	<tr>
		<td align="center">
			<br><br><br><br>
			<table class="div_popup" align="center">
				<tr>
					<td>
						You are arrested and the police have taken your car!					</td>
				</tr>
				<tr>
					<td>
						<br><br>
							<a href="race.php" class="msg_ok">Click here if you do not automatically redirect.</a>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<script language="javascript">
	setTimeout("document.location.href='race.php'",(3000*2));
</script>
		</div>
	</td>
	</tr>

	</table>
	</td>
<?}
if($error == 4){
?>
		<table width="100%">
	<tr>
		<td align="center">
			<br><br><br><br>
			<table class="div_popup" align="center">
				<tr>
					<td>Your car did not get away. You <u>dont</u> have any damage!				</td>
				</tr>
				<tr>
					<td>
						<br><br>
							<a href="race.php" class="msg_ok">Click here if you do not automatically redirect.</a>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<script language="javascript">
	setTimeout("document.location.href='race.php'",(3000*2));
</script>
		</div>
	</td>
	</tr>

	</table>
	</td>
<?}
if($error == niks){
?>
		<table width="100%">
	<tr>
		<td align="center">
			<br><br><br><br>
			<table class="div_popup" align="center">
				<tr>
					<td>
						You've won. Your price is: <?echo$winst;?>					</td>
				</tr>
				<tr>
					<td>
						<br><br>
							<a href="race.php" class="msg_ok">Click here if you do not automatically redirect.</a>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<script language="javascript">
	setTimeout("document.location.href='race.php'",(3000*2));
</script>
		</div>
	</td>
	</tr>

	</table>
	</td>
<?}if($error == ""){?>


        <div class="title_bg"><div style="font-size:17px; color:#1b1a17; margin-left:10px; padding-top:4px;">Race with your car</div></div>
        <div style="width:100%; height:auto; background:#c3b79d; font-family:arial; font-size:12px; color:#2a190e;">
            <div style="padding:5px; padding-bottom:10px;" align="left">
         Start a race with your stolen cars. But remember, your car may not exceed more then 60% damage and watch your back for the cops.
         
   
         
                   </div>
        </div>

        <script language="javascript">
            function openTab(pTabPage,pTab){
                                document.getElementById('drug_main').style.display = 'none';
                                document.getElementById('drug_explain').style.display = 'none';

                document.getElementById(pTabPage).style.display = 'block';

                                document.getElementById('tab1').style.background = '';
                document.getElementById('tab1').style.fontWeight = 'normal';
                                document.getElementById('tab2').style.background = '';
                document.getElementById('tab2').style.fontWeight = 'normal';
				document.getElementById('tab3').style.background = '';
				document.getElementById('tab3').style.fontWeight = 'normal';
				document.getElementById('tab4').style.background = '';
				document.getElementById('tab4').style.fontWeight = 'normal';

                document.getElementById(pTab).style.background = 'url(\'images/tab_info_arrow.gif\') bottom no-repeat';
                document.getElementById(pTab).style.fontWeight = 'bold';
            }
        </script>
        <div style="width:100%; height:25px; background:url('images/tab_info_bg.jpg') repeat-x; font-family:arial; font-size:12px; color:#2a190e;">
                                    <div id="tab1" style="float:left; height:26px; margin:0px; padding:0px; margin-left: 5px; bottom no-repeat; "><a href="crimestealcars.php" onClick="openTab('drug_main','tab1'); return false"><u>Steal a car</u></a></div>
                                    
                                    
  <div style="float:left; height:26px; margin:0px; padding:0px; margin-left: 5px;">|</div>
  

 <div id="tab3" style="float:left; height:26px; margin:0px; padding:0px; margin-left: 5px;"><a href="race.php" onClick="openTab('drug_sell','tab3'); return false"><u>Race with your car</u></a></div>  
  
  

												<div style="float:left; height:26px; margin:0px; padding:0px; margin-left: 5px;">|</div>
												<div id="tab4" style="float:left; height:26px; margin:0px; padding:0px; margin-left: 5px;"><a href="garage.php" onClick="openTab('drug_index','tab4'); return false"><u>Garage</u></a></div>                         
                                    
                                    

								</div>

		<div style="background-color:#dbd2b7; padding:10px; padding-top:4px;">
		<table cellpadding="0" cellspacing="0" width="100%"><tr><td>
        
<table width="100%" border="0" cellspacing="2" cellpadding="2" align="center" class="mod_list">
	<tr>
		<td><strong>Image</strong></td>
		<td><strong>Name</strong></td>
		<td><strong>Value</strong></td>
		<td><strong>Damage</strong></td>
		<td><strong>Race</strong></td>
	</tr>
<?
$dbres = mysql_query("SELECT * FROM `autos` WHERE `owner`='$data->login' ORDER BY `id`");
      while($list = mysql_fetch_object($dbres))
{
$plaatje = array("","mercedes.jpg","golf.jpg","phantom.jpg","seat.jpg","rover.jpg","lorean.jpg","v16.jpg","cadillac.jpg","pontiac.jpg","chrysler.jpg","audi.jpg","mustang.jpg","truck.jpg","hummer.jpg","rolls.jpg","viper.jpg","ferarri.jpg");
$naam = array("","Mercedes","Golfkar","Rolls Phantom","Seat Cordoba","Rover","DeLorean DMC","Cadillac V16","Cadillac","Pontiac Firebird","Chrysler","Audi R8","Mustang","GMC","Hummer","Rolls Royce","Dodge Viper","Ferrari Spyder");
$plaatje = $plaatje[$list->soort];
$naam = $naam[$list->soort];
$schade = $list->waarde/100;
$schadekosten = $list->schade*$schade;
$waarde = number_format($list->waarde-$schadekosten, 0, '.' , '.');
?>
					<tr>
					<td><img src="images/autos/<?echo$plaatje;?>" width="100"></td>
					<td><?echo$naam;?></td>
					<td>&euro; <?echo$waarde;?></td>
					<td><?echo$list->schade;?> %</td>
					<td>
													<?if($list->schade < 60){?><a href="race.php?x=<?echo$list->id;?>"><?}?><font class="mod_crim_race_<?if($list->schade > 59){?>not<?}?>available"><?if($list->schade > 59){?>Race<?}else{?>Race!<?}?></font><?if($list->schade < 60){?></a><?}?>
											</td>
				</tr>
<?}?>
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
<?}
if($error == niks){
$_SESSION['mission'] = "Win a race with a stolen car";
}
?>
