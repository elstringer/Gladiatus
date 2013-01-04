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

  include("../_include-config2.php");

  $klikmissie = $data->kliklink;
?>


<?php /* ------------------------- */

  if(isset($_POST['login'],$_POST['pass'])) {
    $dbres				= mysql_query("SELECT `login`,`activated` FROM `users` WHERE `login`='{$_POST['login']}' AND `pass`=MD5('{$_POST['pass']}')");
    if(($data = mysql_fetch_object($dbres)) && $data->activated == 1) {
      $validate				= md5(rand(0,1000));
      setcookie("login",$data->login,time()+60*60*24,"/","");
      setcookie("validate",$validate,time()+60*60*24,"/","");
      mysql_query("REPLACE INTO `[online]`(`time`,`login`,`IP`,`validate`) values(NOW(),'{$_SERVER['REMOTE_ADDR']}','{$data->login}','$validate')");
      $_SESSION['login']		= $data->login;
      $_SESSION['IP']			= $_SERVER['REMOTE_ADDR'];
      $dbres				= mysql_query("SELECT *,UNIX_TIMESTAMP(`signup`) AS `signup` FROM `users` WHERE `login`='{$_SESSION['login']}'");
      $_SESSION['data']			= mysql_fetch_object($dbres);
    }
  }
  else if($_GET['x'] == "logout") {
    mysql_query("DELETE FROM `[online]` WHERE `login`='{$_COOKIE['login']}' AND `validate`='{$_COOKIE['validate']}' AND `IP`='{$_SERVER['REMOTE_ADDR']}'");
    setcookie("login",'',time()-24*60*60,"/","");
    setcookie("validate",'',time()-24*60*60,"/","");
    unset($_SESSION['login']);
    unset($_SESSION['IP']);
    unset($_SESSION['data']);
  }


/* ------------------------- */ ?>
<html>


<head>
<title></title>
<link rel="stylesheet" type="text/css" href="css.css">
<script language="javascript">
function showTxt(id) {
    document.getElementById(id).style.position		= "relative";
    document.getElementById(id).style.visibility	= "visible";
}
</script>
</head>


<body style="margin: 0px; overflow: hidden;">
<table align="center" class="2">
<?php /* ------------------------- */

  if($_GET['x'] == "lostpass") {
    print "\n";
    if(isset($_GET['id'],$_GET['code'])) {
      $dbres				= mysql_query("SELECT `login` FROM `[temp]` WHERE `id`='{$_GET['id']}' AND `code`='{$_GET['code']}' AND `area`='lostpass'");
      if($data = mysql_fetch_object($dbres)) {
        $dbres				= mysql_query("SELECT `login`,`email`,`pass` FROM `users` WHERE `login`='{$data->login}'");
        $data				= mysql_fetch_object($dbres);

        $newpass			= rand(100000,999999);
        mysql_query("UPDATE `users` SET `pass`=MD5('$newpass') WHERE `login`='{$data->login}'");
        mysql_query("DELETE FROM `[temp]` WHERE `id`='{$_GET['id']}'");
        mail("No-reply@mail.com","$page->sitetitle Password","Your password has been reset.

You can now login:   New Password = $newpass


Best Regards  

The Management

 ",


"From: [ The Game ] Services\n");
        print "  <tr><td class=\"mainTxt\">Your new password has been emailed to {$data->email}</td></tr>\n";
      }
    }
    else if(isset($_POST['email'],$_POST['login'])) {
      $dbres				= mysql_query("SELECT `login`,`email` FROM `users` WHERE `login`='{$_POST['login']}' AND `email`='{$_POST['email']}'AND `activated`=1");
      if($data = mysql_fetch_object($dbres)) {
        $code				= rand(100000,999999);
        mysql_query("INSERT INTO `[temp]`(`login`,`code`,`area`,`time`) values('{$data->login}',$code,'lostpass',NOW())");
        $id				= mysql_insert_id();
        mail("No-reply@mail.com","[ New Password ]","There has been a request to reset your password.

If you requested your password resetting, do not ignore this email.

Click on the Link:\n$sitelink/login.php?x=lostpass&id=$id&code=$code   

Want to get a better experience out of The Gangster Game? 

Why not purchase some VIP Credits from the website and have a look through the Credit Store.

Both options can be found in the top right panel of the website once logged in. 




¬ Thank You for being part of our website and we wish you success in the game.


Best Regards 

The Management

 ","From: [ The Game ] Services");
        print "  <tr><td class=\"mainTxt\">There has been an email sent to {$data->email} with further intructions, please check your bulk mail</td></tr>\n";
      }
      else
        print "  <tr><td class=\"mainTxt\">There is no such user with that login name and email.</td></tr>\n";
    }

    print <<<ENDHTML
  
 							<div class="title_bg">
			<div class="title">Reset your password</div>
		</div>

		<div style="background-color:#dbd2b7; padding:10px; padding-top:4px;">
		<table cellpadding="0" cellspacing="0" width="100%"><tr><td>


	<table width="100%" class="mod_list" cellspacing="2" cellpadding= "2">
		<tr class="top">
			<td align="center">
 	<div id="loginBox"> 
  

	    <tr><td class="mainTxt" width="100">
	<form method="post"><table align="center" class="2">
	  <tr><td width=100>Login:</td>		<td><input type="text" name="login" maxlength=16 style="width: 150;"></td></tr>
	  <tr><td width=100>Email:</td>	<td><input type="text" name="email" maxlength=16 style="width: 150;"></td></tr>
	  <tr><td></td><td style="position: relative; left: 25;"><input class="2" type="submit" name="submit" style="width: 150;" value="Receive Password"></td></tr>
	</table></form>
  </td></tr>

	  
	  
	  
	  
	  
	  
	</form></table></td></tr>
ENDHTML;
  }
  else if($data) {
      print "  <tr><td class=\"subTitle\"><b>Login</b></td></tr>\n";
if($data->klikmissie == 1) {
      print "  <tr><td class=\"mainTxt\" align=\"center\">
	  
							<div class=\"title_bg\">
			<div class=\"title\">Login to the game</div>
		</div>

		<div style=\"background-color:#dbd2b7; padding:10px; padding-top:4px;\">
		<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\"><tr><td>


	<table width=\"100%\" class=\"mod_list\" cellspacing=\"2\" cellpadding= \"2\">
		<tr class=\"top\">
			<td align=\"center\">
 	<div id=\"loginBox\">	 	  
	  
	  
	  You have now logged in!. Click <a href=\"../index2.php\" target=\"_parent\"><b>Here</b></a> to enter and play the game, or just to watch. <script language=\"javascript\">setTimeout('parent.window.location.href=\"../index2.php\"',1200)</script></td></tr>\n";
}
 else
      print "  <tr><td class=\"mainTxt\" align=\"center\">You have now logged in!. Click <a href=\"../index2.php\" target=\"_parent\"><b>Here</b></a> to enter and play the game, or just to watch.. <script language=\"javascript\">setTimeout('parent.window.location.href=\"../index2.php\"',1200)</script></td></tr>\n";
  }
  else {
    print "  \n";
    if(isset($_POST['login'],$_POST['pass']))
      print "  
	  
							<div class=\"title_bg\">
			<div class=\"title\">Login to the game</div>
		</div>

		<div style=\"background-color:#dbd2b7; padding:10px; padding-top:4px;\">
		<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\"><tr><td>


	<table width=\"100%\" class=\"mod_list\" cellspacing=\"2\" cellpadding= \"2\">
		<tr class=\"top\">
			<td align=\"center\">
 	<div id=\"loginBox\">	  
	  
	  
	  
	  
	  
	  <tr><td class=\"mainTxt\"><center><font color=\"red\">Wrong Login Name or Password</font></center></td></tr>\n";

    print <<<ENDHTML

  <tr><td class="mainTxt" width="300">
	<form method="post"><table class="2"><u><b><center>Second login check for extra security</u></b><br><br>
	
	</center>
	  <tr><td width=100>Login:</td>		<td><input type="text" name="login" maxlength=16 style="width: 150;"></td></tr>
	  <tr><td width=100>Password:</td>	<td><input type="password" name="pass" maxlength=16 style="width: 150;"></td></tr>
	  <tr><td></td><td style="position: relative; left: 25;"><input class="2" type="submit" name="submit" style="width: 100;" value="Login"></td></tr>
	</table></form>
  </td></tr>
  <tr><td class="mainTxt" width="100" align="center"><a href="../login.php?x=lostpass">Forgot Password?</a></td></tr>
ENDHTML;
  }


 if($_GET['x'] == "logout")

    print "  <link rel=\"stylesheet\" type=\"text/css\" href=\"<? echo $sitelink;?>/layout/crimestyle03/css/css.css\"><tr><td class=\"subTitle\"><b>Logout</b></td></tr>\n  <tr><td class=\"mainTxt\">You have now logged out\n	<script language=\"javascript\">setTimeout('parent.window.location.href=\"../index.php\"',1)</script></td></tr>\n";
 


/* ------------------------- */ ?>
</table>

</body>


</html>