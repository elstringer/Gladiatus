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


		
		<div class="title_bg">
			<div class="title">Buy Game Credits</div>
		</div>
		
		<div style="background-color:#dbd2b7; padding:10px; padding-top:4px;">
		<table cellpadding="0" cellspacing="0" width="100%"><tr><td>
		<table width="100%" border="0" cellspacing="2" cellpadding="2" class="mod_list">
	<tr>
		<td width="100%">
        
        
        
<form action="https://www.paypal.com/cgi-bin/webscr" target="_blank" method="post">
<input type="hidden" name="cmd" value="_xclick"> 
<input type="hidden" name="business" value="<? echo $paypal;?>"> 
<input type="hidden" name="item_name" value="300 Game Credits"> 
<input type="hidden" name="item_number" value="300 Game Credits"> 
<input type="hidden" name="amount" value="10.00">
<input type="hidden" name="no_shipping" value="1"> 
<input type="hidden" name="no_note" value="1"> 
<input type="hidden" name="currency_code" value="USD"> 
<input type="hidden" name="notify_url" value="<? echo $sitelink;?>/success.php"> 
<input type="hidden" name="return" value="<? echo $sitelink;?>/success.php"> 
<input type="hidden" name="cancel_return" value="<? echo $sitelink;?>">        
        
      
      
<img border=0 src=images/game/paypal.jpg border=0><BR><BR>

You can purchase <b>300</b> Game Credits via Paypal. The price is $10.00 and you will receive your credits automatically after the payment is sent. <br><br> If you send an E-Check, this will take a few days to clear and you wont receive your credits automatically.
<br>
<br>
<b>WARNING: You need to Click "Return to Merchant" Button after you have sent the payment, otherwise your credits wont be credited to your account!</b>
<br><br>

<input type="submit" border="0" class="button" name="submit" value="Purchase"> </b><BR><BR>

 </form>  
        
        
        
        
        </td>

	</tr>











</table>
		</td></tr></table>
		</div>





		<div style="background-color:#dbd2b7; padding:10px; padding-top:4px;">
		<table cellpadding="0" cellspacing="0" width="100%"><tr><td>
		<table width="100%" border="0" cellspacing="2" cellpadding="2" class="mod_list">
	<tr>
		<td width="100%">
        
        
        
<b>Buy Credits with your Phone</b><br /><br />
You can purchase <b>20</b> Game Credits via your Phone. You will receive your credits automatically after the payment is sent. <br><br> 


<!--  START CHANGE PHONE PAYMENT SCRIPT 123TICKET.COM  -->

<iframe name="123TicketIframe" src="http://www.123ticket.com/Public_IA/iframe/payzone.php?IDS=29738&IDD=38316&login=5093027&brokerid=&extlogin=&my_var_p=&my_var_1=&my_var_2=&my_var_3=&my_var_4=&my_var_5=&ret_pin=1&target=_blank" BGCOLOR="white" width=403 height=320 marginWidth=0 marginHeight=0  frameBorder=0 scrolling="no"></iframe>

<!--  END CHANGE PHONE PAYMENT SCRIPT 123TICKET.COM  -->
        
        
        
        
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
		



		<br>		</div>
	</td>
	</tr>

	</table>
	</td>
