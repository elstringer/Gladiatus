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
if($data->power <= 1000){
$maxuren = 48;
$kosten = 5000;}
if($data->power > 1000){
$maxuren = 36;
$kosten = 10000;}
if($data->power > 10000){
$maxuren = 24;
$kosten = 20000;}
if($data->power > 50000){
$maxuren = 12;
$kosten = 40000;}
if($data->power > 200000){
$maxuren = 6;
$kosten = 60000;}
if($data->power > 500000){
$maxuren = 0;
$kosten = 0;}
if($data->city == 3){
$kosten = $kosten/2;
}
$uren = $maxuren-$data->maffia;
if($uren < 0){
$uren = 0;
}
$number = $_POST['number'];
$cost = number_format($kosten, 0, '.', '.');
if($_POST['item'] == -1){
if($data->contant >= $kosten){
if($_POST['number'] > 0){
if($data->maffia+$_POST['number'] <= $maxuren){
mysql_query("UPDATE `users` SET `maffia`=`maffia`+'$number',`contant`=`contant`-'$kosten' WHERE `login`='$data->login'");
mysql_query("INSERT INTO shoplogs(login,ip,date,wat,hoeveel,power,geld) values('" . $data->login . "','" . $_SERVER['REMOTE_ADDR'] . "',NOW(),'bescherming','" . $number . "','0','" . $cost . "')");
}else{$error = 10;}
}else{$error = 2;}
}else{$error = 1;}
}
if($_POST['item'] == 2){
if($data->contant >= 250*$number){
if($_POST['number'] > 0){
if($number+$data->bankpas < 2){
$betaald = 250*$number;
mysql_query("UPDATE `users` SET `bankpas`=`bankpas`+'$number' WHERE `login`='$data->login'");
mysql_query("INSERT INTO shoplogs(login,ip,date,wat,hoeveel,power,geld) values('" . $data->login . "','" . $_SERVER['REMOTE_ADDR'] . "',NOW(),'bankpas','" . $number . "','0','" . $betaald . "')");
$_SESSION['mission'] = "Buy a bankcard";
}else{$error = 9;}
}else{$error = 2;}
}else{$error = 1;}
}
if($_POST['item'] == 1){
if($data->contant >= 8000*$number){
if($_POST['number'] > 0){
if($number+$data->satteliet < 2){
$power = $number*225;
$betaald = 8000*$number;
mysql_query("UPDATE `users` SET `satteliet`=`satteliet`+'$number',`power`=`power`+'$power' WHERE `login`='$data->login'");
mysql_query("INSERT INTO shoplogs(login,ip,date,wat,hoeveel,power,geld) values('" . $data->login . "','" . $_SERVER['REMOTE_ADDR'] . "',NOW(),'Satelliet','" . $number . "','" . $power . "','" . $betaald . "')");
}else{$error = 9;}
}else{$error = 2;}
}else{$error = 1;}
}
if($_POST['item'] == 23){
if($data->contant >= 500000*$number){
if($_POST['number'] > 0){
if($number+$data->spacestation < 2){
$power = $number*30000;
$betaald = 500000*$number;
mysql_query("UPDATE `users` SET `spacestation`=`spacestation`+'$number',`power`=`power`+'$power' WHERE `login`='$data->login'");
mysql_query("INSERT INTO shoplogs(login,ip,date,wat,hoeveel,power,geld) values('" . $data->login . "','" . $_SERVER['REMOTE_ADDR'] . "',NOW(),'Space Station','" . $number . "','" . $power . "','" . $betaald . "')");
}else{$error = 9;}
}else{$error = 2;}
}else{$error = 1;}
}
if($_POST['item'] == 24){
if($data->contant >= 250000*$number){
if($_POST['number'] > 0){
if($number+$data->hoerenhuis < 6){
$betaald = 250000*$number;
mysql_query("UPDATE `users` SET `hoerenhuis`=`hoerenhuis`+'$number' WHERE `login`='$data->login'");
mysql_query("INSERT INTO shoplogs(login,ip,date,wat,hoeveel,power,geld) values('" . $data->login . "','" . $_SERVER['REMOTE_ADDR'] . "',NOW(),'Hoerenhuis','" . $number . "','" . $power . "','" . $betaald . "')");
}else{$error = 9;}
}else{$error = 2;}
}else{$error = 1;}
}
if($_POST['item'] == 3){
if($data->contant >= 100000*$number){
if($_POST['number'] > 0){
$betaald = 100000*$number;
mysql_query("UPDATE `users` SET `kluis`=`kluis`+'$number' WHERE `login`='$data->login'");
mysql_query("INSERT INTO shoplogs(login,ip,date,wat,hoeveel,power,geld) values('" . $data->login . "','" . $_SERVER['REMOTE_ADDR'] . "',NOW(),'Kluis','" . $number . "','" . $power . "','" . $betaald . "')");
$_SESSION['mission'] = "Buy a safe";
}else{$error = 2;}
}else{$error = 1;}
}
if($_POST['item'] == 4){
if($data->contant >= 100000*$number){
if($_POST['number'] > 0){
if($number+$data->zwitserse < 2){
$betaald = 100000*$number;
mysql_query("UPDATE `users` SET `zwitserse`=`zwitserse`+'$number' WHERE `login`='$data->login'");
mysql_query("INSERT INTO shoplogs(login,ip,date,wat,hoeveel,power,geld) values('" . $data->login . "','" . $_SERVER['REMOTE_ADDR'] . "',NOW(),'Zwitserse rekening','" . $number . "','" . $power . "','" . $betaald . "')");
$_SESSION['mission'] = "Open a Swiss account";
}else{$error = 9;}
}else{$error = 2;}
}else{$error = 1;}
}
if($_POST['item'] == -2){
if($data->contant >= 250000*$number){
if($_POST['number'] > 0){
$betaald = 250000*$number;
mysql_query("DELETE FROM `clicks` WHERE `login`='$data->login'");
mysql_query("UPDATE `users` SET `contant`=`contant`-'$betaald' WHERE `login`='$data->login'");
mysql_query("INSERT INTO shoplogs(login,ip,date,wat,hoeveel,power,geld) values('" . $data->login . "','" . $_SERVER['REMOTE_ADDR'] . "',NOW(),'Secret Link Cleaner','" . $number . "','0','" . $betaald . "')");
}else{$error = 2;}
}else{$error = 1;}
}
if($_POST['item'] == 5){
if($data->contant >= 500*$number){
if($_POST['number'] > 0){
$power = $number*25;
$betaald = 500*$number;
mysql_query("UPDATE `users` SET `deagle`=`deagle`+'$number',`power`=`power`+'$power' WHERE `login`='$data->login'");
mysql_query("INSERT INTO shoplogs(login,ip,date,wat,hoeveel,power,geld) values('" . $data->login . "','" . $_SERVER['REMOTE_ADDR'] . "',NOW(),'Desert Eagle','" . $number . "','" . $power . "','" . $betaald . "')");
}else{$error = 2;}
}else{$error = 1;}
}
if($_POST['item'] == 6){
if($data->contant >= 950*$number){
if($_POST['number'] > 0){
$power = $number*40;
$betaald = 950*$number;
mysql_query("UPDATE `users` SET `pepperspray`=`pepperspray`+'$number',`power`=`power`+'$power' WHERE `login`='$data->login'");
mysql_query("INSERT INTO shoplogs(login,ip,date,wat,hoeveel,power,geld) values('" . $data->login . "','" . $_SERVER['REMOTE_ADDR'] . "',NOW(),'Pepperspray','" . $number . "','" . $power . "','" . $betaald . "')");
}else{$error = 2;}
}else{$error = 1;}
}
if($_POST['item'] == 12){
if($data->contant >= 1000*$number){
if($_POST['number'] > 0){
$power = $number*45;
$betaald = 1000*$number;
mysql_query("UPDATE `users` SET `knuppel`=`knuppel`+'$number',`power`=`power`+'$power' WHERE `login`='$data->login'");
mysql_query("INSERT INTO shoplogs(login,ip,date,wat,hoeveel,power,geld) values('" . $data->login . "','" . $_SERVER['REMOTE_ADDR'] . "',NOW(),'Knuppel','" . $number . "','" . $power . "','" . $betaald . "')");
}else{$error = 2;}
}else{$error = 1;}
}
if($_POST['item'] == 7){
if($data->contant >= 1400*$number){
if($_POST['number'] > 0){
$power = $number*55;
$betaald = 1400*$number;
mysql_query("UPDATE `users` SET `sigp`=`sigp`+'$number',`power`=`power`+'$power' WHERE `login`='$data->login'");
mysql_query("INSERT INTO shoplogs(login,ip,date,wat,hoeveel,power,geld) values('" . $data->login . "','" . $_SERVER['REMOTE_ADDR'] . "',NOW(),'Sig P','" . $number . "','" . $power . "','" . $betaald . "')");
}else{$error = 2;}
}else{$error = 1;}
}
if($_POST['item'] == 8){
if($data->contant >= 1500*$number){
if($_POST['number'] > 0){
$aantal = $number*5;
$betaald = 1500*$number;
mysql_query("UPDATE `users` SET `kogels`=`kogels`+'$aantal' WHERE `login`='$data->login'");
mysql_query("INSERT INTO shoplogs(login,ip,date,wat,hoeveel,power,geld) values('" . $data->login . "','" . $_SERVER['REMOTE_ADDR'] . "',NOW(),'Attack Coins','" . $aantal . "','" . $power . "','" . $betaald . "')");
}else{$error = 2;}
}else{$error = 1;}
}
if($_POST['item'] == 9){
if($data->contant >= 3000*$number){
if($_POST['number'] > 0){
$power = $number*75;
$betaald = 3000*$number;
mysql_query("UPDATE `users` SET `c4`=`c4`+'$number',`power`=`power`+'$power' WHERE `login`='$data->login'");
mysql_query("INSERT INTO shoplogs(login,ip,date,wat,hoeveel,power,geld) values('" . $data->login . "','" . $_SERVER['REMOTE_ADDR'] . "',NOW(),'C4','" . $number . "','" . $power . "','" . $betaald . "')");
}else{$error = 2;}
}else{$error = 1;}
}
if($_POST['item'] == 10){
if($data->contant >= 5000*$number){
if($_POST['number'] > 0){
$power = $number*150;
$betaald = 5000*$number;
mysql_query("UPDATE `users` SET `m16`=`m16`+'$number',`power`=`power`+'$power' WHERE `login`='$data->login'");
mysql_query("INSERT INTO shoplogs(login,ip,date,wat,hoeveel,power,geld) values('" . $data->login . "','" . $_SERVER['REMOTE_ADDR'] . "',NOW(),'M16','" . $number . "','" . $power . "','" . $betaald . "')");
}else{$error = 2;}
}else{$error = 1;}
}
if($_POST['item'] == 11){
if($data->contant >= 5000*$number){
if($_POST['number'] > 0){
$power = $number*150;
$betaald = 5000*$number;
mysql_query("UPDATE `users` SET `cornershot`=`cornershot`+'$number',`power`=`power`+'$power' WHERE `login`='$data->login'");
mysql_query("INSERT INTO shoplogs(login,ip,date,wat,hoeveel,power,geld) values('" . $data->login . "','" . $_SERVER['REMOTE_ADDR'] . "',NOW(),'Corner Shot','" . $number . "','" . $power . "','" . $betaald . "')");
}else{$error = 2;}
}else{$error = 1;}
}
if($_POST['item'] == 13){
if($data->contant >= 9500*$number){
if($_POST['number'] > 0){
$power = $number*180*$number;
$betaald = 9500*$number;
mysql_query("UPDATE `users` SET `switchblade`=`switchblade`+'$number',`power`=`power`+'$power' WHERE `login`='$data->login'");
mysql_query("INSERT INTO shoplogs(login,ip,date,wat,hoeveel,power,geld) values('" . $data->login . "','" . $_SERVER['REMOTE_ADDR'] . "',NOW(),'Switch Blade','" . $number . "','" . $power . "','" . $betaald . "')");
}else{$error = 2;}
}else{$error = 1;}
}
if($_POST['item'] == 14){
if($data->contant >= 12500*$number){
if($_POST['number'] > 0){
$power = $number*250;
$betaald = 12500*$number;
mysql_query("UPDATE `users` SET `pitbull`=`pitbull`+'$number',`power`=`power`+'$power' WHERE `login`='$data->login'");
mysql_query("INSERT INTO shoplogs(login,ip,date,wat,hoeveel,power,geld) values('" . $data->login . "','" . $_SERVER['REMOTE_ADDR'] . "',NOW(),'Pitbull','" . $number . "','" . $power . "','" . $betaald . "')");
}else{$error = 2;}
}else{$error = 1;}
}
if($_POST['item'] == 15){
if($data->contant >= 20000*$number){
if($_POST['number'] > 0){
$power = $number*450*$number;
$betaald = 20000*$number;
mysql_query("UPDATE `users` SET `sniper`=`sniper`+'$number',`power`=`power`+'$power' WHERE `login`='$data->login'");
mysql_query("INSERT INTO shoplogs(login,ip,date,wat,hoeveel,power,geld) values('" . $data->login . "','" . $_SERVER['REMOTE_ADDR'] . "',NOW(),'Sniper','" . $number . "','" . $power . "','" . $betaald . "')");
}else{$error = 2;}
}else{$error = 1;}
}
if($_POST['item'] == 17){
if($data->contant >= 37500*$number){
if($_POST['number'] > 0){
$power = $number*625;
$betaald = 37500*$number;
mysql_query("UPDATE `users` SET `swatgun`=`swatgun`+'$number',`power`=`power`+'$power' WHERE `login`='$data->login'");
mysql_query("INSERT INTO shoplogs(login,ip,date,wat,hoeveel,power,geld) values('" . $data->login . "','" . $_SERVER['REMOTE_ADDR'] . "',NOW(),'SWAT Gun','" . $number . "','" . $power . "','" . $betaald . "')");
}else{$error = 2;}
}else{$error = 1;}
}
if($_POST['item'] == 16){
if($data->contant >= 50000*$number){
if($_POST['number'] > 0){
$power = $number*950;
$betaald = 50000*$number;
mysql_query("UPDATE `users` SET `bazooka`=`bazooka`+'$number',`power`=`power`+'$power' WHERE `login`='$data->login'");
mysql_query("INSERT INTO shoplogs(login,ip,date,wat,hoeveel,power,geld) values('" . $data->login . "','" . $_SERVER['REMOTE_ADDR'] . "',NOW(),'Bazooka','" . $number . "','" . $power . "','" . $betaald . "')");
}else{$error = 2;}
}else{$error = 1;}
}
if($_POST['item'] == 18){
if($data->contant >= 50000*$number){
if($_POST['number'] > 0){
$power = $number*950;
$betaald = 50000*$number;
mysql_query("UPDATE `users` SET `bodyguards`=`bodyguards`+'$number',`power`=`power`+'$power' WHERE `login`='$data->login'");
mysql_query("INSERT INTO shoplogs(login,ip,date,wat,hoeveel,power,geld) values('" . $data->login . "','" . $_SERVER['REMOTE_ADDR'] . "',NOW(),'Bodyguards','" . $number . "','" . $power . "','" . $betaald . "')");
}else{$error = 2;}
}else{$error = 1;}
}
if($_POST['item'] == 19){
if($data->contant >= 150000*$number){
if($_POST['number'] > 0){
$power = $number*10000;
$betaald = 150000*$number;
mysql_query("UPDATE `users` SET `warboot`=`warboot`+'$number',`power`=`power`+'$power' WHERE `login`='$data->login'");
mysql_query("INSERT INTO shoplogs(login,ip,date,wat,hoeveel,power,geld) values('" . $data->login . "','" . $_SERVER['REMOTE_ADDR'] . "',NOW(),'War boot','" . $number . "','" . $power . "','" . $betaald . "')");
}else{$error = 2;}
}else{$error = 1;}
}
if($_POST['item'] == 20){
if($data->contant >= 200000*$number){
if($_POST['number'] > 0){
$power = $number*15000;
$betaald = 200000*$number;
mysql_query("UPDATE `users` SET `atoombom`=`atoombom`+'$number',`power`=`power`+'$power' WHERE `login`='$data->login'");
mysql_query("INSERT INTO shoplogs(login,ip,date,wat,hoeveel,power,geld) values('" . $data->login . "','" . $_SERVER['REMOTE_ADDR'] . "',NOW(),'Atoom bom','" . $number . "','" . $power . "','" . $betaald . "')");
}else{$error = 2;}
}else{$error = 1;}
}
if($_POST['item'] == 21){
if($data->contant >= 240000*$number){
if($_POST['number'] > 0){
$power = $number*15500;
$betaald = 240000*$number;
mysql_query("UPDATE `users` SET `tank`=`tank`+'$number',`power`=`power`+'$power' WHERE `login`='$data->login'");
mysql_query("INSERT INTO shoplogs(login,ip,date,wat,hoeveel,power,geld) values('" . $data->login . "','" . $_SERVER['REMOTE_ADDR'] . "',NOW(),'Tank','" . $number . "','" . $power . "','" . $betaald . "')");
}else{$error = 2;}
}else{$error = 1;}
}
if($_POST['item'] == 22){
if($data->contant >= 450000*$number){
if($_POST['number'] > 0){
$power = $number*25000;
$betaald = 450000*$number;
mysql_query("UPDATE `users` SET `scud`=`scud`+'$number',`power`=`power`+'$power' WHERE `login`='$data->login'");
mysql_query("INSERT INTO shoplogs(login,ip,date,wat,hoeveel,power,geld) values('" . $data->login . "','" . $_SERVER['REMOTE_ADDR'] . "',NOW(),'Scud Raket','" . $number . "','" . $power . "','" . $betaald . "')");
}else{$error = 2;}
}else{$error = 1;}
}
$shop = array("","Weapon shop","Weapon shop","Secret shop","Spy shop","Estate dealer","Bank shop");
$shop = $shop[$data->city];
if($_POST['item'] != "" && $error == ""){
$error = niks;
}
if($_POST['item'] > 0 && $error == niks){
mysql_query("UPDATE `users` SET `bezitiets`='1',`contant`=`contant`-'$betaald' WHERE `login`='$data->login'");
}
mysql_query("UPDATE `families` SET `power`=`power`+'$power' WHERE `naam`='$data->familie'");
if($error == niks){
?>
            <table width="100%">
    <tr>
        <td align="center">
            <br><br><br><br>
            <table class="div_popup" align="center">
                <tr>
                    <td>
                        The subject is bought and placed in your inventory                   </td>
                </tr>
                <tr>
                    <td>
                        <br><br>
                            <a href="shop.php" class="msg_ok">Click here if you do not automatically redirect.</a>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

<script language="javascript">
    setTimeout("document.location.href='shop.php'",(4000*2));
</script>
        </div>
    </td>
    </tr>

    </table>
    </td>
<?}
if($error == 10){
?>
<table width="100%">
    <tr>
        <td align="center">
            <br><br><br><br>
            <table class="div_popup_error" align="center">
                <tr>
                    <td style="color:red">
                        <b>Error!</b><br><br>You want to buy more protection hours than you may buy!                 </td>
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
if($error == 9){
?>
<table width="100%">
    <tr>
        <td align="center">
            <br><br><br><br>
            <table class="div_popup_error" align="center">
                <tr>
                    <td style="color:red">
                        <b>Error!</b><br><br>When your buy that much, you will exceed the maximum                    </td>
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
            <table class="div_popup_error" align="center">
                <tr>
                    <td style="color:red">
                        <b>Error!</b><br><br>This is not a valid number                   </td>
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
if($error == 1){
?>
<table width="100%">
    <tr>
        <td align="center">
            <br><br><br><br>
            <table class="div_popup_error" align="center">
                <tr>
                    <td style="color:red">
                        <b>Error!</b><br><br>You dont have enough cash money to do this!                 </td>
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
if($error == ""){?>


                    <div class="title_bg">
            <div class="title">Shop</div>
        </div>

        <div style="background-color:#dbd2b7; padding:10px; padding-top:4px;">
        <table cellpadding="0" cellspacing="0" width="100%"><tr><td>

    <img src="images/shop.jpg" align="right" border="0px" style="margin-left:10px;">
    Welcome in the <b><?echo$shop;?>!</b><br /><br />

    Each city has its own shops:<br>
    The <b>Weapon shop</b> can be found in <?php echo $city_1 ?> and <?php echo $city_2 ?><br>
    The <b>Secret shop</b> can be found in <?php echo $city_3 ?><br>
    The <b>Spy shop</b> can be found in <?php echo $city_4 ?><br>
    The <b>Estate dealer</b> can be found in <?php echo $city_5 ?><br>
    The <b>Bank shop</b> can be found in <?php echo $city_6 ?>
    <br><br>

    NOTE: Shops only accept cash money.
    <br /><br />
<?if($data->city != 3){?>
    <table width=100% cellspacing="2px" cellpadding="2px" class="mod_list">
        <form method="POST">
                <input type="hidden" name="item" value="-1">
        <tr>
            <td colspan=3 style="font-size:14px; font-weight:bold; color:#402810; padding-left:8px;">Mafia Protection</td>
        </tr>
        <tr>
            <td rowspan=6 width="110px" height="110px" valign="middle" align="center"><img src="images/shop/maffiabescherming.gif"></td>
        </tr>
        <tr>
            <td width="18px" align="center" valign="middle"><img src="images/icons_gif/money.gif"></td>
            <td>Price: <b> <?echo$cost;?></b> (Each hour)</td>
        </tr>
        <tr>
            <td width="18px" align="center" valign="middle"><img src="images/icons_gif/lightning.gif"></td>
            <td>Power: <b>0</b></td>
        </tr>
        <tr>
            <td width="18px" align="center" valign="middle"><img src="images/icons_gif/wand.gif"></td>
            <td valign="middle"><form method="post" style="display: inline;">Number: <input type="text" name="number" class="input" size="5" /> <input type="hidden" name="type" value="14"><input type="submit" value="Buy!" class="mod_submit"></form></td>
        </tr>
        <tr>
            <td width="18px" align="center" valign="middle"><img src="images/icons_gif/information.gif"></td>
            <td>

                You may still buy <?echo$uren;?> hours protection!<br>
                <b>Buy this protection for half the price in <?php echo $city_3 ?>!</b><br><br>

                <div id="vid_description_short" style="display: block;"><a class="small_black" href="javascript:SwitchDiv_real('vid_description_short', 'vid_description_long')">Click here for some extra information!</a></div>

                <div id="vid_description_long" style="display: none;">
                The costs of protection dependent on:<br>
                <i><ul>
                <li>0-1.000 power = maximum 48 hours (5.000)<br></li>
                <li>1.000-10.000 power = maximum 36 hours (10.000)<br></li>
                <li>10.000-50.000 power = maximum 24 hours (20.000)<br></li>
                <li>50.000-200.000 power = maximum 12 hours (40.000)<br></li>
                <li>200.000-500.000 power = maximum 6 hours (60.000)<br></li>
                <li>500.000 or more power = maximum 0 hours<br><small><a href="vipbuycredits.php?p=shop">(In the Game Credit Shop you can buy protection all the time!</a></small><br></li>
                </ul>
                </i>
                <br><br><a class="small_black" href="javascript:SwitchDiv_real('vid_description_short', 'vid_description_long')">Click here to hide this information.</a>
                </div>
            </td>
        </tr>
        </form>
    </table>

    <script language="javascript" type="text/javascript">

        function SwitchDiv_real(pId,pId2){
            if(document.getElementById(pId).style.display == 'none'){
                document.getElementById(pId).style.display = 'block';
                document.getElementById(pId2).style.display = 'none';
            }else{
                document.getElementById(pId).style.display = 'none';
                document.getElementById(pId2).style.display = 'block';
            }
        }

    </script>
    <br><?}?>

            <table width=100% cellspacing="2px" cellpadding="2px" class="mod_list">
            <form method="POST">
                <input type="hidden" name="item" value="2">
            <tr>
                <td colspan=3 style="font-size:14px; font-weight:bold; color:#402810; padding-left:8px;">Bankcard</td>
            </tr>
            <tr>
                <td rowspan=6 width="110px" height="110px" valign="middle" align="center">
                                            <img src="images/shop/bankpas.gif">
                                    </td>
            </tr>
            <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/money.gif"></td>
                <td>Price: <b> 250</b></td>
            </tr>
            <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/lightning.gif"></td>
                <td>Power: <b>0</b></td>
            </tr>
                        <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/wand.gif"></td>
                <td valign="middle"><form method="post" style="display: inline;">Number: <input type="text" name="number" class="input" size="5">&nbsp;<input type="submit" value="Buy!" class="mod_submit"></form></td>
            </tr>
                        <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/information.gif"></td>
                <td>Allows you to deposit money in the bank and take it away</td>
            </tr>
                        <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/asterisk_orange.gif"></td>
                <td valign="middle" >
                                            Maximum <b>1</b> allowed,
                                        you have <b><?echo$data->bankpas;?></b>              </td>
            </tr>
            </form>
                    </table>

        <br>
<?if($data->city == 3){?>
    <table width=100% cellspacing="2px" cellpadding="2px" class="mod_list">
        <form method="POST">
                <input type="hidden" name="item" value="-1">
        <tr>
            <td colspan=3 style="font-size:14px; font-weight:bold; color:#402810; padding-left:8px;">Mafia Protection</td>
        </tr>
        <tr>
            <td rowspan=6 width="110px" height="110px" valign="middle" align="center"><img src="images/shop/Maffiabescherming.gif"></td>
        </tr>
        <tr>
            <td width="18px" align="center" valign="middle"><img src="images/icons_gif/money.gif"></td>
            <td>Price: <b> <?echo$cost;?></b> (Each hour)</td>
        </tr>
        <tr>
            <td width="18px" align="center" valign="middle"><img src="images/icons_gif/lightning.gif"></td>
            <td>Power: <b>0</b></td>
        </tr>
        <tr>
            <td width="18px" align="center" valign="middle"><img src="images/icons_gif/wand.gif"></td>
            <td valign="middle"><form method="post" style="display: inline;">Number: <input type="text" name="number" class="input" size="5" /> <input type="hidden" name="type" value="14"><input type="submit" value="Buy!" class="mod_submit"></form></td>
        </tr>
        <tr>
            <td width="18px" align="center" valign="middle"><img src="images/icons_gif/information.gif"></td>
            <td>

                You can still buy 24 hour protection!<br>
                <b>Buy this protection for half the price in <?php echo $city_3 ?>!</b><br><br>

                <div id="vid_description_short" style="display: block;"><a class="small_black" href="javascript:SwitchDiv_real('vid_description_short', 'vid_description_long')">This is too much information, click here if you want to know more!</a></div>

                <div id="vid_description_long" style="display: none;">
                The hours that you can buy protection depending on your power. The costs of protection are dependent on:<br>
                <i><ul>
                <li>0-1.000 power = maximum 48 hours (5.000)<br></li>
                <li>1.000-10.000 power = maximum 36 hours (10.000)<br></li>
                <li>10.000-50.000 power = maximum 24 hours (20.000)<br></li>
                <li>50.000-200.000 power = maximum 12 hours (40.000)<br></li>
                <li>200.000-500.000 power = maximum 6 hours (60.000)<br></li>
                <li>500.000 or more power = maximum 0 hours<br><small><a href="vipbuycredits.php?p=shop">(Here you can buy protection all the time!</a></small><br></li>
                </ul>
                </i>
                Take the protection of the mafia so you cant be attacked for 1 hour. <br> <br>
                NOTE: Every hour you will lose a protection. For example you dont must buy your protection on something like 14.50, because at 3 am one hour you will lose 1 protection hour!
                <br><br><a class="small_black" href="javascript:SwitchDiv_real('vid_description_short', 'vid_description_long')">Click here for more information.</a>
                </div>
            </td>
        </tr>
        </form>
    </table>

    <script language="javascript" type="text/javascript">

        function SwitchDiv_real(pId,pId2){
            if(document.getElementById(pId).style.display == 'none'){
                document.getElementById(pId).style.display = 'block';
                document.getElementById(pId2).style.display = 'none';
            }else{
                document.getElementById(pId).style.display = 'none';
                document.getElementById(pId2).style.display = 'block';
            }
        }

    </script>
    <br><?}
if($data->city == 4){
?>
            <table width=100% cellspacing="2px" cellpadding="2px" class="mod_list">
            <form method="POST">
                <input type="hidden" name="item" value="1">
            <tr>
                <td colspan=3 style="font-size:14px; font-weight:bold; color:#402810; padding-left:8px;">Satellite</td>
            </tr>
            <tr>
                <td rowspan=6 width="110px" height="110px" valign="middle" align="center">
                                            <img src="images/shop/satteliet.gif">
                                    </td>
            </tr>
            <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/money.gif"></td>
                <td>Price: <b> 8000</b></td>
            </tr>
            <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/lightning.gif"></td>
                <td>Power: <b>225</b></td>
            </tr>
                        <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/wand.gif"></td>
                <td valign="middle"><form method="post" style="display: inline;">Number: <input type="text" name="number" class="input" size="5">&nbsp;<input type="submit" value="Buy!" class="mod_submit"></form></td>
            </tr>
                        <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/information.gif"></td>
                <td>The Space Station gives you the opportunity to see everyone and the cities where they are!</td>
            </tr>
                        <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/asterisk_orange.gif"></td>
                <td valign="middle" >
                                            Maximum <b>1</b> allowed,
                                        you have <b><?echo$data->satteliet;?></b>                </td>
            </tr>
            </form>
                    </table>

        <br>
            <table width=100% cellspacing="2px" cellpadding="2px" class="mod_list">
            <form method="POST">
                <input type="hidden" name="item" value="23">
            <tr>
                <td colspan=3 style="font-size:14px; font-weight:bold; color:#402810; padding-left:8px;">Space Station</td>
            </tr>
            <tr>
                <td rowspan=6 width="110px" height="110px" valign="middle" align="center">
                                            <img src="images/shop/spacestation.gif">
                                    </td>
            </tr>
            <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/money.gif"></td>
                <td>Price: <b> 500000</b></td>
            </tr>
            <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/lightning.gif"></td>
                <td>Power: <b>30000</b></td>
            </tr>
                        <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/wand.gif"></td>
                <td valign="middle"><form method="post" style="display: inline;">Number: <input type="text" name="number" class="input" size="5">&nbsp;<input type="submit" value="Buy!" class="mod_submit"></form></td>
            </tr>
                        <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/information.gif"></td>
                <td>The Space Station gives you the opportunity to see everyone and the cities where they are!</td>
            </tr>
                        <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/asterisk_orange.gif"></td>
                <td valign="middle" >
                                            Maximum <b>1</b> allowed,
                                        you have <b><?echo$data->spacestation;?></b>                 </td>
            </tr>
            </form>
                    </table>
<?}
if($data->city == 5){?>
            <table width=100% cellspacing="2px" cellpadding="2px" class="mod_list">
            <form method="POST">
                <input type="hidden" name="item" value="24">
            <tr>
                <td colspan=3 style="font-size:14px; font-weight:bold; color:#402810; padding-left:8px;">Whore house</td>
            </tr>
            <tr>
                <td rowspan=6 width="110px" height="110px" valign="middle" align="center">
                                            <img src="images/shop/hoerenhuis.gif">
                                    </td>
            </tr>
            <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/money.gif"></td>
                <td>Price: <b> 250000</b></td>
            </tr>
            <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/lightning.gif"></td>
                <td>Power: <b>0</b></td>
            </tr>
                        <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/wand.gif"></td>
                <td valign="middle"><form method="post" style="display: inline;">Number: <input type="text" name="number" class="input" size="5">&nbsp;<input type="submit" value="Buy!" class="mod_submit"></form></td>
            </tr>
                        <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/information.gif"></td>
                <td>Get 500 each hour while others work late! Not more than 5 houses each player.</td>
            </tr>
                        <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/asterisk_orange.gif"></td>
                <td valign="middle" >
                                            Maximum <b>5</b> allowed,
                                        you have <b><?echo$data->hoerenhuis;?></b>               </td>
            </tr>
            </form>
                    </table>
<?}
if($data->city == 6){
?>
            <table width=100% cellspacing="2px" cellpadding="2px" class="mod_list">
            <form method="POST">
                <input type="hidden" name="item" value="3">
            <tr>
                <td colspan=3 style="font-size:14px; font-weight:bold; color:#402810; padding-left:8px;">Safe</td>
            </tr>
            <tr>
                <td rowspan=6 width="110px" height="110px" valign="middle" align="center">
                                            <img src="images/shop/kluis.gif">
                                    </td>
            </tr>
            <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/money.gif"></td>
                <td>Price: <b> 100000</b></td>
            </tr>
            <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/lightning.gif"></td>
                <td>Power: <b>0</b></td>
            </tr>
                        <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/wand.gif"></td>
                <td valign="middle"><form method="post" style="display: inline;">Number: <input type="text" name="number" class="input" size="5">&nbsp;<input type="submit" value="Buy!" class="mod_submit"></form></td>
            </tr>
                        <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/information.gif"></td>
                <td>Notes: In the safe your money is always safe, even if you will be attacked and killed. Also, no one can see how much money you have in your safe. A safe can hold up to 50.000.000. However you will get no interest on the money in your safe.
                </td>
            </tr>
                        <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/asterisk_orange.gif"></td>
                <td valign="middle" >
                                           Unlimited number allowed,
                                        you have <b><?echo$data->kluis;?></b>                </td>
            </tr>
            </form>
                    </table>

        <br>
            <table width=100% cellspacing="2px" cellpadding="2px" class="mod_list">
            <form method="POST">
                <input type="hidden" name="item" value="4">
            <tr>
                <td colspan=3 style="font-size:14px; font-weight:bold; color:#402810; padding-left:8px;">Swiss account</td>
            </tr>
            <tr>
                <td rowspan=6 width="110px" height="110px" valign="middle" align="center">
                                            <img src="images/shop/zwitserserekening.gif">
                                    </td>
            </tr>
            <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/money.gif"></td>
                <td>Price: <b> 100000</b></td>
            </tr>
            <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/lightning.gif"></td>
                <td>Power: <b>0</b></td>
            </tr>
                        <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/wand.gif"></td>
                <td valign="middle"><form method="post" style="display: inline;">Number: <input type="text" name="number" class="input" size="5">&nbsp;<input type="submit" value="Buy!" class="mod_submit"></form></td>
            </tr>
                        <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/information.gif"></td>
                <td>Notes: The Swiss bank account can be used to place your illegal money. Nobody can see the money on that account! You can deposit up to 5 million every day and take up to 50 million. On your Swiss account you will get 2% interest every day.           </td>
            </tr>
                        <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/asterisk_orange.gif"></td>
                <td valign="middle" >
                                            Maximum <b>1</b> allowed,
                                        you have <b><?echo$data->zwitserse;?></b>                </td>
            </tr>
            </form>
                    </table>
<?}
if($data->city == 3){
?>
    <table width=100% cellspacing="2px" cellpadding="2px" class="mod_list">
        <form method="POST">
                <input type="hidden" name="item" value="-2">
        <tr>
            <td colspan=3 style="font-size:14px; font-weight:bold; color:#402810; padding-left:8px;">Secret Link Cleaner</td>
        </tr>
        <tr>
            <td rowspan=6 width="110px" height="110px" valign="middle" align="center"><font size="5"><b>?</b></font></td>
        </tr>
        <tr>
            <td width="18px" align="center" valign="middle"><img src="images/icons_gif/money.gif"></td>
            <td>Price: <b> 250.000</b></td>
        </tr>
        <tr>
            <td width="18px" align="center" valign="middle"><img src="images/icons_gif/lightning.gif"></td>
            <td>Power: <b>0</b></td>
        </tr>
        <tr>
            <td width="18px" align="center" valign="middle"><img src="images/icons_gif/wand.gif"></td>
            <td valign="middle"><form method="post" style="display: inline;">Number: <input type="text" name="number" class="input" size="5" /> <input type="hidden" name="type" value="21"><input type="submit" value="Buy!" class="mod_submit"></form></td>
        </tr>
        <tr>
            <td width="18px" align="center" valign="middle"><img src="images/icons_gif/information.gif"></td>
            <td>Everyone can click on your secret link again!</td>
        </tr>
        </form>
    </table>
<?}?>

<?if($data->city <= 2){?>
            <table width=100% cellspacing="2px" cellpadding="2px" class="mod_list">
            <form method="POST">
                <input type="hidden" name="item" value="5">
            <tr>
                <td colspan=3 style="font-size:14px; font-weight:bold; color:#402810; padding-left:8px;">Desert Eagle</td>
            </tr>
            <tr>
                <td rowspan=6 width="110px" height="110px" valign="middle" align="center">
                                            <img src="images/shop/deserteagle.gif">
                                    </td>
            </tr>
            <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/money.gif"></td>
                <td>Price: <b> 500</b></td>
            </tr>
            <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/lightning.gif"></td>
                <td>Power: <b>25</b></td>
            </tr>
                        <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/wand.gif"></td>
                <td valign="middle"><form method="post" style="display: inline;">Number: <input type="text" name="number" class="input" size="5">&nbsp;<input type="submit" value="Buy!" class="mod_submit"></form></td>
            </tr>
                        <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/information.gif"></td>
                <td>None</td>
            </tr>
                        <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/asterisk_orange.gif"></td>
                <td valign="middle" >
                                            Unlimited number allowed,
                                        you have <b><?echo$data->deagle;?></b>               </td>
            </tr>
            </form>
                    </table>

        <br>
            <table width=100% cellspacing="2px" cellpadding="2px" class="mod_list">
            <form method="POST">
                <input type="hidden" name="item" value="6">
            <tr>
                <td colspan=3 style="font-size:14px; font-weight:bold; color:#402810; padding-left:8px;">Pepperspray</td>
            </tr>
            <tr>
                <td rowspan=6 width="110px" height="110px" valign="middle" align="center">
                                            <img src="images/shop/pepperspray.gif">
                                    </td>
            </tr>
            <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/money.gif"></td>
                <td>Price: <b> 950</b></td>
            </tr>
            <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/lightning.gif"></td>
                <td>Power: <b>40</b></td>
            </tr>
                        <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/wand.gif"></td>
                <td valign="middle"><form method="post" style="display: inline;">Number: <input type="text" name="number" class="input" size="5">&nbsp;<input type="submit" value="Buy!" class="mod_submit"></form></td>
            </tr>
                        <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/information.gif"></td>
                <td>None</td>
            </tr>
                        <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/asterisk_orange.gif"></td>
                <td valign="middle" >
                                            Unlimited number allowed,
                                        you have <b><?echo$data->pepperspray;?></b>              </td>
            </tr>
            </form>
                    </table>

        <br>
            <table width=100% cellspacing="2px" cellpadding="2px" class="mod_list">
            <form method="POST">
                <input type="hidden" name="item" value="12">
            <tr>
                <td colspan=3 style="font-size:14px; font-weight:bold; color:#402810; padding-left:8px;">Bat</td>
            </tr>
            <tr>
                <td rowspan=6 width="110px" height="110px" valign="middle" align="center">
                                            <img src="images/shop/knuppel.gif">
                                    </td>
            </tr>
            <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/money.gif"></td>
                <td>Price: <b> 1000</b></td>
            </tr>
            <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/lightning.gif"></td>
                <td>Power: <b>45</b></td>
            </tr>
                        <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/wand.gif"></td>
                <td valign="middle"><form method="post" style="display: inline;">Number: <input type="text" name="number" class="input" size="5">&nbsp;<input type="submit" value="Buy!" class="mod_submit"></form></td>
            </tr>
                        <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/information.gif"></td>
                <td>None</td>
            </tr>
                        <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/asterisk_orange.gif"></td>
                <td valign="middle" >
                                            Unlimited number allowed,
                                        you have <b><?echo$data->knuppel;?></b>              </td>
            </tr>
            </form>
                    </table>

        <br>
            <table width=100% cellspacing="2px" cellpadding="2px" class="mod_list">
            <form method="POST">
                <input type="hidden" name="item" value="7">
            <tr>
                <td colspan=3 style="font-size:14px; font-weight:bold; color:#402810; padding-left:8px;">Sig P228</td>
            </tr>
            <tr>
                <td rowspan=6 width="110px" height="110px" valign="middle" align="center">
                                            <img src="images/shop/sigp228.gif">
                                    </td>
            </tr>
            <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/money.gif"></td>
                <td>Price: <b> 1400</b></td>
            </tr>
            <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/lightning.gif"></td>
                <td>Power: <b>55</b></td>
            </tr>
                        <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/wand.gif"></td>
                <td valign="middle"><form method="post" style="display: inline;">Number: <input type="text" name="number" class="input" size="5">&nbsp;<input type="submit" value="Buy!" class="mod_submit"></form></td>
            </tr>
                        <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/information.gif"></td>
                <td>None</td>
            </tr>
                        <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/asterisk_orange.gif"></td>
                <td valign="middle" >
                                            Unlimited number allowed,
                                        you have <b><?echo$data->sigp;?></b>                 </td>
            </tr>
            </form>
                    </table>

        <br>
            <table width=100% cellspacing="2px" cellpadding="2px" class="mod_list">
            <form method="POST">
                <input type="hidden" name="item" value="8">
            <tr>
                <td colspan=3 style="font-size:14px; font-weight:bold; color:#402810; padding-left:8px;">Attack Coins</td>
            </tr>
            <tr>
                <td rowspan=6 width="110px" height="110px" valign="middle" align="center">
                                            <img src="images/shop/attackcoins.gif">
                                    </td>
            </tr>
            <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/money.gif"></td>
                <td>Price: <b> 1500</b></td>
            </tr>
            <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/lightning.gif"></td>
                <td>Power: <b>0</b></td>
            </tr>
                        <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/wand.gif"></td>
                <td valign="middle"><form method="post" style="display: inline;">Number: <input type="text" name="number" class="input" size="5">&nbsp;<input type="submit" value="Buy!" class="mod_submit"></form></td>
            </tr>
                        <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/information.gif"></td>
                <td>Get 5 attack coins to attack peoples.</td>
            </tr>
                        <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/asterisk_orange.gif"></td>
                <td valign="middle" >
                                            Unlimited number allowed,
                                        you have <b><?echo$data->kogels;?></b>               </td>
            </tr>
            </form>
                    </table>

        <br>
            <table width=100% cellspacing="2px" cellpadding="2px" class="mod_list">
            <form method="POST">
                <input type="hidden" name="item" value="9">
            <tr>
                <td colspan=3 style="font-size:14px; font-weight:bold; color:#402810; padding-left:8px;">C4 Bom</td>
            </tr>
            <tr>
                <td rowspan=6 width="110px" height="110px" valign="middle" align="center">
                                            <img src="images/shop/c4.gif">
                                    </td>
            </tr>
            <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/money.gif"></td>
                <td>Price: <b> 3000</b></td>
            </tr>
            <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/lightning.gif"></td>
                <td>Power: <b>75</b></td>
            </tr>
                        <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/wand.gif"></td>
                <td valign="middle"><form method="post" style="display: inline;">Number: <input type="text" name="number" class="input" size="5">&nbsp;<input type="submit" value="Buy!" class="mod_submit"></form></td>
            </tr>
                        <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/information.gif"></td>
                <td>None</td>
            </tr>
                        <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/asterisk_orange.gif"></td>
                <td valign="middle" >
                                            Unlimited number allowed,
                                        you have <b><?echo$data->c4;?></b>               </td>
            </tr>
            </form>
                    </table>

        <br>
            <table width=100% cellspacing="2px" cellpadding="2px" class="mod_list">
            <form method="POST">
                <input type="hidden" name="item" value="10">
            <tr>
                <td colspan=3 style="font-size:14px; font-weight:bold; color:#402810; padding-left:8px;">Machine Gun</td>
            </tr>
            <tr>
                <td rowspan=6 width="110px" height="110px" valign="middle" align="center">
                                            <img src="images/shop/m16.gif">
                                    </td>
            </tr>
            <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/money.gif"></td>
                <td>Price: <b> 5000</b></td>
            </tr>
            <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/lightning.gif"></td>
                <td>Power: <b>150</b></td>
            </tr>
                        <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/wand.gif"></td>
                <td valign="middle"><form method="post" style="display: inline;">Number: <input type="text" name="number" class="input" size="5">&nbsp;<input type="submit" value="Buy!" class="mod_submit"></form></td>
            </tr>
                        <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/information.gif"></td>
                <td>None</td>
            </tr>
                        <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/asterisk_orange.gif"></td>
                <td valign="middle" >
                                            Unlimited number allowed,
                                        you have <b><?echo$data->m16;?></b>              </td>
            </tr>
            </form>
                    </table>

        <br>
            <table width=100% cellspacing="2px" cellpadding="2px" class="mod_list">
            <form method="POST">
                <input type="hidden" name="item" value="11">
            <tr>
                <td colspan=3 style="font-size:14px; font-weight:bold; color:#402810; padding-left:8px;">Corner Shot</td>
            </tr>
            <tr>
                <td rowspan=6 width="110px" height="110px" valign="middle" align="center">
                                            <img src="images/shop/cornershot.gif">
                                    </td>
            </tr>
            <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/money.gif"></td>
                <td>Price: <b> 5000</b></td>
            </tr>
            <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/lightning.gif"></td>
                <td>Power: <b>150</b></td>
            </tr>
                        <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/wand.gif"></td>
                <td valign="middle"><form method="post" style="display: inline;">Number: <input type="text" name="number" class="input" size="5">&nbsp;<input type="submit" value="Buy!" class="mod_submit"></form></td>
            </tr>
                        <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/information.gif"></td>
                <td>None</td>
            </tr>
                        <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/asterisk_orange.gif"></td>
                <td valign="middle" >
                                            Unlimited number allowed,
                                        you have <b><?echo$data->cornershot;?></b>               </td>
            </tr>
            </form>
                    </table>

        <br>
            <table width=100% cellspacing="2px" cellpadding="2px" class="mod_list">
            <form method="POST">
                <input type="hidden" name="item" value="13">
            <tr>
                <td colspan=3 style="font-size:14px; font-weight:bold; color:#402810; padding-left:8px;">Switch Blade</td>
            </tr>
            <tr>
                <td rowspan=6 width="110px" height="110px" valign="middle" align="center">
                                            <img src="images/shop/switchblade.gif">
                                    </td>
            </tr>
            <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/money.gif"></td>
                <td>Price: <b> 9500</b></td>
            </tr>
            <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/lightning.gif"></td>
                <td>Power: <b>180</b></td>
            </tr>
                        <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/wand.gif"></td>
                <td valign="middle"><form method="post" style="display: inline;">Number: <input type="text" name="number" class="input" size="5">&nbsp;<input type="submit" value="Buy!" class="mod_submit"></form></td>
            </tr>
                        <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/information.gif"></td>
                <td>None</td>
            </tr>
                        <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/asterisk_orange.gif"></td>
                <td valign="middle" >
                                            Unlimited number allowed,
                                        you have <b><?echo$data->switchblade;?></b>              </td>
            </tr>
            </form>
                    </table>

        <br>
            <table width=100% cellspacing="2px" cellpadding="2px" class="mod_list">
            <form method="POST">
                <input type="hidden" name="item" value="14">
            <tr>
                <td colspan=3 style="font-size:14px; font-weight:bold; color:#402810; padding-left:8px;">Pitbull</td>
            </tr>
            <tr>
                <td rowspan=6 width="110px" height="110px" valign="middle" align="center">
                                            <img src="images/shop/pitbull.gif">
                                    </td>
            </tr>
            <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/money.gif"></td>
                <td>Price: <b> 12500</b></td>
            </tr>
            <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/lightning.gif"></td>
                <td>Power: <b>250</b></td>
            </tr>
                        <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/wand.gif"></td>
                <td valign="middle"><form method="post" style="display: inline;">Number: <input type="text" name="number" class="input" size="5">&nbsp;<input type="submit" value="Buy!" class="mod_submit"></form></td>
            </tr>
                        <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/information.gif"></td>
                <td>None</td>
            </tr>
                        <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/asterisk_orange.gif"></td>
                <td valign="middle" >
                                            Unlimited number allowed,
                                        you have <b><?echo$data->pitbull;?></b>              </td>
            </tr>
            </form>
                    </table>

        <br>
            <table width=100% cellspacing="2px" cellpadding="2px" class="mod_list">
            <form method="POST">
                <input type="hidden" name="item" value="15">
            <tr>
                <td colspan=3 style="font-size:14px; font-weight:bold; color:#402810; padding-left:8px;">Sniper</td>
            </tr>
            <tr>
                <td rowspan=6 width="110px" height="110px" valign="middle" align="center">
                                            <img src="images/shop/sniper.gif">
                                    </td>
            </tr>
            <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/money.gif"></td>
                <td>Price: <b> 20000</b></td>
            </tr>
            <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/lightning.gif"></td>
                <td>Power: <b>450</b></td>
            </tr>
                        <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/wand.gif"></td>
                <td valign="middle"><form method="post" style="display: inline;">Number: <input type="text" name="number" class="input" size="5">&nbsp;<input type="submit" value="Buy!" class="mod_submit"></form></td>
            </tr>
                        <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/information.gif"></td>
                <td>None</td>
            </tr>
                        <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/asterisk_orange.gif"></td>
                <td valign="middle" >
                                            Unlimited number allowed,
                                        you have <b><?echo$data->sniper;?></b>               </td>
            </tr>
            </form>
                    </table>

        <br>
            <table width=100% cellspacing="2px" cellpadding="2px" class="mod_list">
            <form method="POST">
                <input type="hidden" name="item" value="17">
            <tr>
                <td colspan=3 style="font-size:14px; font-weight:bold; color:#402810; padding-left:8px;">S.W.A.T. Gun</td>
            </tr>
            <tr>
                <td rowspan=6 width="110px" height="110px" valign="middle" align="center">
                                            <img src="images/shop/swatgun.gif">
                                    </td>
            </tr>
            <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/money.gif"></td>
                <td>Price: <b> 37500</b></td>
            </tr>
            <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/lightning.gif"></td>
                <td>Power: <b>625</b></td>
            </tr>
                        <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/wand.gif"></td>
                <td valign="middle"><form method="post" style="display: inline;">Number: <input type="text" name="number" class="input" size="5">&nbsp;<input type="submit" value="Buy!" class="mod_submit"></form></td>
            </tr>
                        <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/information.gif"></td>
                <td>None</td>
            </tr>
                        <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/asterisk_orange.gif"></td>
                <td valign="middle" >
                                            Unlimited number allowed,
                                        you have <b><?echo$data->swatgun;?></b>              </td>
            </tr>
            </form>
                    </table>

        <br>
            <table width=100% cellspacing="2px" cellpadding="2px" class="mod_list">
            <form method="POST">
                <input type="hidden" name="item" value="16">
            <tr>
                <td colspan=3 style="font-size:14px; font-weight:bold; color:#402810; padding-left:8px;">Bazooka</td>
            </tr>
            <tr>
                <td rowspan=6 width="110px" height="110px" valign="middle" align="center">
                                            <img src="images/shop/bazooka.gif">
                                    </td>
            </tr>
            <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/money.gif"></td>
                <td>Price: <b> 50000</b></td>
            </tr>
            <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/lightning.gif"></td>
                <td>Power: <b>950</b></td>
            </tr>
                        <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/wand.gif"></td>
                <td valign="middle"><form method="post" style="display: inline;">Number: <input type="text" name="number" class="input" size="5">&nbsp;<input type="submit" value="Buy!" class="mod_submit"></form></td>
            </tr>
                        <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/information.gif"></td>
                <td>None</td>
            </tr>
                        <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/asterisk_orange.gif"></td>
                <td valign="middle" >
                                            Unlimited number allowed,
                                        you have <b><?echo$data->bazooka;?></b>              </td>
            </tr>
            </form>
                    </table>

        <br>
            <table width=100% cellspacing="2px" cellpadding="2px" class="mod_list">
            <form method="POST">
                <input type="hidden" name="item" value="18">
            <tr>
                <td colspan=3 style="font-size:14px; font-weight:bold; color:#402810; padding-left:8px;">Bodyguards</td>
            </tr>
            <tr>
                <td rowspan=6 width="110px" height="110px" valign="middle" align="center">
                                            <img src="images/shop/bodyguards.gif">
                                    </td>
            </tr>
            <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/money.gif"></td>
                <td>Price: <b> 50000</b></td>
            </tr>
            <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/lightning.gif"></td>
                <td>Power: <b>950</b></td>
            </tr>
                        <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/wand.gif"></td>
                <td valign="middle"><form method="post" style="display: inline;">Number: <input type="text" name="number" class="input" size="5">&nbsp;<input type="submit" value="Buy!" class="mod_submit"></form></td>
            </tr>
                        <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/information.gif"></td>
                <td>None</td>
            </tr>
                        <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/asterisk_orange.gif"></td>
                <td valign="middle" >
                                            Unlimited number allowed,
                                        you have <b><?echo$data->bodyguards;?></b>               </td>
            </tr>
            </form>
                    </table>

        <br>
            <table width=100% cellspacing="2px" cellpadding="2px" class="mod_list">
            <form method="POST">
                <input type="hidden" name="item" value="19">
            <tr>
                <td colspan=3 style="font-size:14px; font-weight:bold; color:#402810; padding-left:8px;">War Ship</td>
            </tr>
            <tr>
                <td rowspan=6 width="110px" height="110px" valign="middle" align="center">
                                            <img src="images/shop/warboot.gif">
                                    </td>
            </tr>
            <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/money.gif"></td>
                <td>Price: <b> 150000</b></td>
            </tr>
            <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/lightning.gif"></td>
                <td>Power: <b>10000</b></td>
            </tr>
                        <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/wand.gif"></td>
                <td valign="middle"><form method="post" style="display: inline;">Number: <input type="text" name="number" class="input" size="5">&nbsp;<input type="submit" value="Buy!" class="mod_submit"></form></td>
            </tr>
                        <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/information.gif"></td>
                <td>None</td>
            </tr>
                        <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/asterisk_orange.gif"></td>
                <td valign="middle" >
                                            Unlimited number allowed,
                                        you have <b><?echo$data->warboot;?></b>              </td>
            </tr>
            </form>
                    </table>

        <br>
            <table width=100% cellspacing="2px" cellpadding="2px" class="mod_list">
            <form method="POST">
                <input type="hidden" name="item" value="20">
            <tr>
                <td colspan=3 style="font-size:14px; font-weight:bold; color:#402810; padding-left:8px;">Atomic Bomb</td>
            </tr>
            <tr>
                <td rowspan=6 width="110px" height="110px" valign="middle" align="center">
                                            <img src="images/shop/atoombom.gif">
                                    </td>
            </tr>
            <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/money.gif"></td>
                <td>Price: <b> 200000</b></td>
            </tr>
            <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/lightning.gif"></td>
                <td>Power: <b>15000</b></td>
            </tr>
                        <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/wand.gif"></td>
                <td valign="middle"><form method="post" style="display: inline;">Number: <input type="text" name="number" class="input" size="5">&nbsp;<input type="submit" value="Buy!" class="mod_submit"></form></td>
            </tr>
                        <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/information.gif"></td>
                <td>None</td>
            </tr>
                        <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/asterisk_orange.gif"></td>
                <td valign="middle" >
                                            Unlimited number allowed,
                                        you have <b><?echo$data->atoombom;?></b>                 </td>
            </tr>
            </form>
                    </table>

        <br>
            <table width=100% cellspacing="2px" cellpadding="2px" class="mod_list">
            <form method="POST">
                <input type="hidden" name="item" value="21">
            <tr>
                <td colspan=3 style="font-size:14px; font-weight:bold; color:#402810; padding-left:8px;">Tank</td>
            </tr>
            <tr>
                <td rowspan=6 width="110px" height="110px" valign="middle" align="center">
                                            <img src="images/shop/tank.gif">
                                    </td>
            </tr>
            <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/money.gif"></td>
                <td>Price: <b> 240000</b></td>
            </tr>
            <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/lightning.gif"></td>
                <td>Power: <b>15500</b></td>
            </tr>
                        <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/wand.gif"></td>
                <td valign="middle"><form method="post" style="display: inline;">Number: <input type="text" name="number" class="input" size="5">&nbsp;<input type="submit" value="Buy!" class="mod_submit"></form></td>
            </tr>
                        <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/information.gif"></td>
                <td>None</td>
            </tr>
                        <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/asterisk_orange.gif"></td>
                <td valign="middle" >
                                            Unlimited number allowed,
                                        you have <b><?echo$data->tank;?></b>                 </td>
            </tr>
            </form>
                    </table>

        <br>
            <table width=100% cellspacing="2px" cellpadding="2px" class="mod_list">
            <form method="POST">
                <input type="hidden" name="item" value="22">
            <tr>
                <td colspan=3 style="font-size:14px; font-weight:bold; color:#402810; padding-left:8px;">Scud Rocket</td>
            </tr>
            <tr>
                <td rowspan=6 width="110px" height="110px" valign="middle" align="center">
                                            <img src="images/shop/scudraket.gif">
                                    </td>
            </tr>
            <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/money.gif"></td>
                <td>Price: <b> 450000</b></td>
            </tr>
            <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/lightning.gif"></td>
                <td>Power: <b>25000</b></td>
            </tr>
                        <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/wand.gif"></td>
                <td valign="middle"><form method="post" style="display: inline;">Number: <input type="text" name="number" class="input" size="5">&nbsp;<input type="submit" value="Buy!" class="mod_submit"></form></td>
            </tr>
                        <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/information.gif"></td>
                <td>None</td>
            </tr>
                        <tr>
                <td width="18px" align="center" valign="middle"><img src="images/icons_gif/asterisk_orange.gif"></td>
                <td valign="middle" >
                                            Unlimited number allowed,
                                        you have <b><?echo$data->scud;?></b>                 </td>
            </tr>
            </form>
                    </table>

        <br>
<?}?>



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
<?}?>
