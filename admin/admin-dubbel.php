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

	$UPDATE_DB                = 1;
	include("_include-config.php");
	if(! check_login()) {
		header("Location: login.php");
		exit;
	}


?>

<?
    $data2				= mysql_query("SELECT * FROM `users` WHERE `login`='$data->login'");
    $data				= mysql_fetch_object($data2);
	
	include("settings.php");
?>           
  
<?
if($data->login == $admin || $data->hulpadmin == 1 || $data->admin == 1) {
?>	
<link rel="stylesheet" type="text/css" href="<? echo $sitelink;?>/layout/crimestyle12/css/css.css"><center><TABLE width="90%">
<body margin: 0px">

<div class="title_bg">
			<div class="title">Check Multiple Accounts</div>
		</div>

	<TR>
		<TD class="subTitle" width="30%"><STRONG>Name 1</STRONG></TD>
		<TD class="subTitle" width="30%"><STRONG>Name 2</STRONG></TD>
		<TD class="subTitle" width="30%"><STRONG>IP</STRONG></TD>
        </tr>
        <tr>
		<TD class="subTitle" width="30%"><STRONG>Status</STRONG></TD>
		<TD class="subTitle" width="30%"><STRONG>By</STRONG></TD>
		<TD class="subTitle" width="30%"><STRONG>Date</STRONG></TD>
	</TR>
		
<?PHP

   if(isset($_GET['b'])) {
   if(isset($_GET['c'])) {

      $naam1 = $_GET['b'];
      $naam2 = $_GET['c'];
	  
	  mysql_query("INSERT INTO `messages`(`time`,`from`,`to`,`subject`,`message`) values(NOW(),'GG Aministrators','$naam1','Multiple Accounts','Hi $naam1,<br><br>We have found more than one account playing from your IP. We wont respond in an improper mannor, but we would like you to respond to this email with the truth as to why you have more than one account. The account we are talking about is <b>$naam2</b><br><br>')");
	  
      echo "<TD class=\"mainTxt\" colspan=\"3\">A message has been sent to <b>$naam1</b> and also the 2nd account, $naam2.</TD>";

      exit;

   }
   }

	$a = 0;
	$arr_ip = array();
	$arr_login = array();
	$qry = mysql_query("SELECT login,ip FROM `users`") or die(mysql_error());
	$num = mysql_num_rows($qry) or die(mysql_error());
	$max_per_page = 10;
	if($_GET['page']) {
		$begin = $_GET['page'] * $max_per_page;
	} 
	if($begin == 0) {
		$begin = 1;
	}
	$end = $begin + $max_per_page;
	$total_count = 0;
	while($rsl = mysql_fetch_array($qry))	{
		$arr_ip[$a] = $rsl["ip"];
		$arr_login[$a] = $rsl["login"];
		$a = $a+1;
	}
	for($b=0; $b <= $num; $b++)	{
		$d = $b + 1;
		for($c=$d; $c < $num; $c++)	{
			if($arr_ip["$b"] == $arr_ip["$c"])	{
				$total_count++;
				$query_ipc = mysql_query("SELECT ip_adres FROM `[admin_checked]` WHERE `ip_adres` = '".$arr_ip["$b"]."'") or die(mysql_error());
				$query_ipc_count = mysql_num_rows($query_ipc);
				if($query_ipc_count == 0) {
					mysql_query("INSERT INTO `[admin_checked]` (ip_adres,status,op) VALUES('".$arr_ip["$b"]."','<b>Not Checked</b>','0')") or die(mysql_error());
				}
				if($total_count >= $begin && $total_count < $end) {
					$query_ipc = mysql_query("SELECT * FROM `[admin_checked]` WHERE `ip_adres` = '".$arr_ip["$b"]."'") or die(mysql_error());
					$ipc_array = mysql_fetch_array($query_ipc);
					echo "<TR>
							<TD class=\"mainTxt\">". $arr_login["$b"] ."  </TD>
							<TD class=\"mainTxt\">". $arr_login["$c"] ." </TD>
							<TD class=\"mainTxt\">". $arr_ip["$b"] ."</TD>
						</TR>
                                                <TR>    <TD class=\"mainTxt\"></TD>
                                                        <TD class=\"mainTxt\"><u>". $ipc_array["door_admin"] ."</i></TD>
							<TD class=\"mainTxt\"><i>". $ipc_array["op"] ."</i></TD>
						</TR>";
					if($total_count < $end) { echo "<TR><TD class=\"mainTxt\" colspan='3'>&nbsp;</TD></TR>"; }
				}
			}
		}
	}
	echo "<tr><td class=\"mainTxt\" colspan='3'>";
	$page_count = $total_count / $max_per_page;
	$done = 0;
	while($done <= $page_count) {
		echo '<a href="admin-dubbel.php?page='.$done.'">';	$done++; echo $done."</a> ";
		if($done < $page_count) { echo " | "; }
	}
	echo "</td></tr>";

?>
</TABLE>

</div>


		<table width='100%' cellspacing='2' cellpadding='2'>
			<tr>

				<td class='content_bottom'></td>
			</tr>
		</table><? } ?>