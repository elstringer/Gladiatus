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

include '_include-config.php';
?><head>
<title>Registration</title>
</head>


<div id="index">
  <div id="indexContent">
  
    <div id="group"></div>
    <h1 class="logo en"><span>Game Registeration</span></h1>
    <h2 class="violator en"><span></span></h2>
	
	<div id="loginBox">
			
		<ul class="inlineLinks">



					</ul>
	</div>
	<!-- Bouton register -->
    <div id="registerBox">
     <!-- <h3>Story</h3>-->
      <p class="inlineLinks">
	  




<?php /* ------------------------- */
$newpass			= rand(100000,999999);
  $login					= $_POST['login'];
  $city						= $_POST['stad'];
  $email					= $_POST['email'];
  $recruiter					= $rec;
 $ctype						= $_POST['ctype'];
  ${"select$ctype"}				= "selected";


  if(isset($_POST['submit'])) {
    $message					= Array(
	"<b>Your login may only contain: A-Z, a-z, 0-9, _  - </b><BR><BR>",
	"<b>Fill in a valid Email-Address</b><BR><BR>",
	"<b>Select a Criminal Type</b><BR><BR>",
	"<b>That login already exists in the database</b><BR><BR>",
	"<b>That email already exists in the database</b><BR><BR>",
	"<b>The Recruiter name can only contain A-Z, a-z, 0-9, _  - </b><BR><BR>", 

    $msgnum					= -1;
  
    if(preg_match('/^.+@.+\..+$/',$email) == 0)
      $msgnum					= 2;
    else {
      $dbres					= mysql_query("SELECT `id` FROM `users` WHERE `login`='{$login}'");
      if(mysql_num_rows($dbres) > 0)
        $msgnum					= 4;
      $dbres					= mysql_query("SELECT `id` FROM `users` WHERE `email`='{$email}'");
      if(mysql_num_rows($dbres) > 0)
    $msgnum					= 5;
    if(preg_match('/^[a-zA-Z0-9_\-]+$/',$login) == 0)
        $msgnum					= 6;
     
	 

	  
      if(mysql_num_rows($dbres) > 0)
        $msgnum                                 = 7;                 

      if($msgnum == -1) {


        mysql_query("UPDATE `users` SET `recruits`=`recruits`+'1' WHERE `login`='{$recruiter}'");
        mysql_query("UPDATE `users` SET `contant`=`contant`+'1000000' WHERE `login`='{$recruiter}'");
if($rec != "") {
        mysql_query("INSERT INTO `messages`(`time`,`from`,`to`,`subject`,`message`,`outbox`) values(NOW(),'$page->sitetitle','$recruiter','Referral','Welldone! You have referred a member to the site... You are rewarded with ;1,000,000!','0')");
}

$newpass			= rand(100000,999999);
       
       

        mysql_query("INSERT INTO `users`(signup,login,pass,IP,email,land,ctype) values(NOW(),'$login',MD5('$newpass'),'$IP','$email','$city','$ctype')");
    

       

        $id					= mysql_insert_id();
        mail("$email","[Extreme Mobster] - Account","[Extreme Mobster] - Account.

Dear $login

Your account details are as follows:

Login          = $login
E-mail address = $email
Password       = $newpass

Keep your account information safe and DO NOT give it to amyone under any circumstances.

If you need any support, feel free to contact us via the support ticket on the site, or using the Game Forums.

DO NOT:

-Spam. Spamming is against the rules. Spamming not only annoys the admins, but annoys everybody else too.
 
-Threaten or insult anyone during your time on The Gangster Game. We know its a gangster game and people can get carried away, but do refrain from using abusive behaviour.

-Use proxies. This will result in a permenant ban from your IP.

-Create and Use multiple accounts. All the accounts will be banned. If you have a brother, sister etc take this up with the Admins.

-Do not advertise your own stuff on our site. We appreciate you wouldnt like it if we did it on your site, so dont do it on our site.

If you find a bug in the game. Report it to an Admin EMMEDIATELY. Although finding of a bug is not a bannable offence.
But abusing the bug is, and you will be caught and banned!

Abusing or not Obeying any of these rules will result in a permenant and emmediate ban. No second chances. You have been Warned!



Kind Regards,

Get Respect... Get Loyalty... Get Wealthy...


","From: [Extreme Mobster]");
      }
    }
  }

/* ------------------------- */ ?>



<?php /* ------------------------- */

  if(isset($_GET['id'],$_GET['code'])) {
    print "  <tr><td class=\"subTitle\"><b>Activated</b></td></tr>\n";

    $id						= $_GET['id'];
    $code					= $_GET['code'];
    $dbres					= mysql_query("SELECT `login` FROM `[temp]` WHERE `area`='signup' AND `id`='$id' AND `code`='$code'");
    if($data = mysql_fetch_object($dbres)) {
	$acti = 1;
	mysql_query("UPDATE `users` SET `activated`=1,`signup`=NOW() WHERE `login`='{$login}'");
      mysql_query("DELETE FROM `[temp]` WHERE `id`='{$id}'");
      print "  <tr><td class=\"mainTxt\">Activated Account, You can now loggin</td></tr>\n";
    }
    else
      print "  <tr><td class=\"mainTxt\">Incorrect activation-code...</td></tr>\n";
  }
  else {
    if($msgnum != -1) {
      if(isset($msgnum) && $msgnum != -1)
        print "{$message[$msgnum]}\n";
        $rec = $_GET['rec'];
    print "  <tr><td class=\"subTitle\">
		 <b>Welcome to 'The Gangster Game' Registration.<br><br> Its quiick and simple, best of all FREE!</b><BR>
</td></tr>\n"; print <<<ENDHTML

      
<div id="regBox">
  <tr><td class="mainTxt">
	<form method="post" id="regForm" name="regForm" ><table align="center" class="2">
 	  <tr><td width=100><font size="2"><b>Username:</b><font color=red>*</td>		<td><input type="text" name="login" maxlength=16 style="width: 150;" value="$login"></td></tr>
          <tr><td width=100><font size="2"><b>E-Mail:</b><font color=red>*</td>	<td><input type="text" name="email" maxlength=64 style="width: 150;" value="$email"></td></tr>
          <tr><td width=100><font size="2"><b>Starting Country:<font color=red>*</td>		<td><select name="stad" style="width: 150;">
	  			<option value="1">Netherlands</option>
	  			<option value="2">France</option>
	  			<option value="3">Cuba</option>
	  			<option value="4">Russia</option>
	  			<option value="5">Australia</option>
	  			<option value="6">USA</option>
<option value="7">Germany</option>
<option value="8">Belgium</option>
<option value="9">England</option>
<option value="10">Ireland</option>
						</select></td></tr>


  <tr><td width=100><font size="2"><b>Criminal<font color=red>*</font> Character:<a href="javascript: //" onClick="window.open('crimtype.php')">[?]</a></td><td><select name="ctype" style="width: 150;">
							<option value="1" $select1>Drugdealer</option>
							<option value="2" $select2>Thug</option>
							<option value="3" $select3>Pretty Boy</option>
<option value="4" $select4>Officer</option>
<option value="5" $select5>Gangster Wanabee</option>
<option value="6" $select6>Hired Gun</option>
<option value="7" $select7>Ho</option>
<option value="8" $select8>Hustler</option>
<option value="9" $select9>Playa</option>
<option value="10" $select10>Original Gangster</option>
<option value="11" $select11>Rude boy</option>
<option value="12" $select12>Peacekeeper</option>
<option value="13" $select13>Street Doll</option>
<option value="14" $select14>Gangster Bitch</option>
<option value="15" $select15>Drug Runner</option>
<option value="16" $select16>Hoodie</option>
<option value="17" $select17>Criminal</option>
<option value="18" $select18>Lady Bitch</option>
<option value="19" $select19>Royal Thug</option>
<option value="20" $select20>Avenger</option>
<option value="21" $select21>Mugger</option>
<option value="22" $select22>Capone</option>
<option value="23" $select23>Thief</option>
<option value="24" $select24>PiMP</option>
<option value="25" $select25>Pretty Women</option>
<option value="26" $select26>WiseGuy</option>
<option value="27" $select27>Mobster</option>
<option value="28" $select28>Hooligan</option>
<option value="29" $select29>Gangster Girl</option>
<option value="30" $select30>The Daddy</option>
						</select> 



	  <tr><td width=100><font size="2"><b>Recruiter:<a href="javascript: //" onClick="window.open('help.php')">[?]</a></b></td>	<td><input type="text" CONTENTEDITABLE ="false" name="recruiter" maxlength=64 style="width: 150;" value="$rec"></td></tr>

 <tr><td colspan="2">
	<span class="error"> * </span>
	<span class="">User agreement:</span>
	<div style="width:80%; height:100px; overflow:auto; background:#000000; color:#ffffff;margin:0;clear:both;padding:0.3em;margin:1em;">
		
<p align="left">

<html>
<body>
<b>
USER AGREEMENT AND TERMS OF SERVICE/CONDITIONS
</b>
<br>
<br>
<b>
  "WE at The Gangster Game do not condone the use of drugs, Illegal weapons or weapons in general, abusive language, criminal behaviour, gang like behaviour, street crime, vandalism, killing, drug dealing, prostitution, street racing or any other kind of criminal activity. By under no means do we want our members here at our game to follow the behaviour shown in this game. Its inhumane, illegal and anti-social. If any persons reported on the site of re-enacting content shown in The Gangster Game, they will be immediately struck from the website and further action will be taken to ensure the saftely of others around them."
    </b>
   <br>
<br>
<b>
   HEREBY REGISTERING TO THE SITE, TAKES INTO ACCOUNT YOU FULLY UNDERSTAND THIS LEGAL DOCUMENT AND WILL ABIDE BY IT AT ALL TIMES. UNDER NO CIRCUMSTANCES MUST ANY OF THE RULES OR TERMS SHOWN, BE BROKEN.
</b>
<br>
<br>


1. AGREEMENT AMENDMENTS: We may amend this Agreement at any time in our sole discretion. Amendments shall be communicated to You at the time You log into Your Account. Such amendments shall be effective whenever we make the notification available for Your review.
<br>
<br>
2. GRANT OF LICENSE: Subject to the terms of this Agreement, we hereby grant to You a non-exclusive license to playing the Game via a single authorized Account, providing You are eligible for an account. Accounts are only available to adults over 18 years of age or, in their discretion, their minor child of the age of 16 years or higher. If You are a minor, Your parent(s) or guardian(s) must complete the registration process, in which case the parent(s) or guardian(s) will take full responsibility for all obligations under this Agreement. By clicking the submit button You represent that You are an adult and are either accepting this Agreement on behalf of yourself or your child. You may not transfer or share Your Account with anyone, except that if You are a parent or guardian, You may permit one child to use the Account instead of You (in which case You may not use that Account). You are only allowed to play a single account, and You are not allowed to share Your login information with anyone. You are liable for all activities conducted through the Account, and parents or guardians are liable for the activities of their child. Corporations and other entities are not eligible to procure Accounts.
<br>
<br>
3. REQUIREMENTS: To play the Game, You must (a) register on our Register page for an ACCOUNT and (b) have an active Internet connection (which we do not provide) to access Your Account. In addition to any fees described herein, You are responsible for paying all applicable taxes (including those we are not required to collect) and for all hardware, software, service and other costs You incur to access Your Account. Neither this Agreement nor Your Account entitles You to any subsequent releases of the Game, nor to any ancillary products. You understand that we may update or otherwise enhance the Game at any time and in doing so incur no obligation to furnish such updates to You pursuant to this Agreement. You shall comply with all applicable laws regarding Your access to Your Account and Your playing of the Game.
<br>
<br>
4. SERVICES: All services herein are offered by our game. Current rates for optional account upgrades may be obtained from our game and such rates are subject to change at any time.
<br>
<br>
5. PASSWORD DISCLOSURE: During registration You will be asked to set a password. You may not disclose Your password to any third party. We never ask You for Your password by telephone or email, and You should not disclose it this way if someone asks You to do so. Although we may offer a feature that allows You to "save" Your password on Your accessing "device" (such as a home computer), note that third parties may be able to access Your device and thus Your Account.
<br>
<br>
6. LIMITATIONS: You may not reverse engineer, decompile, or disassemble the Game, except and only to the extent that such activity is expressly permitted by applicable law not withstanding this limitation. You may not copy, distribute, rent, lease, loan, modify or create derivative works, adapt, translate, perform, display, sublicense or transfer any content of the Game. You may not copy any of the written materials accompanying the Game or the other websites managed by Licensor. You may not use our intellectual property rights contained in the Game or the websites controlled by Licensor to create or provide any other means through which the Game may be played by others, as through server emulators. You may not take any action which imposes an unreasonable or disproportionately large load on our infrastructure. You may not access the Game or the Account through other software than standard browsers, WAP phones and other non automated technologies. The use of automated programs, "bots", scripts, or any other access method that does not require human intervention is strictly prohibited, and not allowed under this agreement.
<br>
<br>
7. TERMINATION: We may terminate this Agreement (including Your Account) immediately and without notice if You breach this Agreement or infringe any third party intellectual property rights, or if we are unable to verify or authenticate any information You provide to us, or upon game play, chat or any player activity whatsoever which is, in our sole discretion. If we terminate this Agreement under these circumstances, You will lose access to Your Account for the balance of any prepaid period or services without any refund.
<br>
<br>
8. GAME CHEATING: Cheating is a violation of this agreement and will result in the termination of this agreement and the account as per section 7 of this agreement (TERMINATION). Cheating is explicitly defined, but not limited to, the following:Multiple Accounts. You may only access a single game account for which you are responsible. It is a violation of this agreement to (a) utilise more than a single account, (b) use any account for which you (or in the case of a minor a parent(s) or guardian(s)) are not responsible, and (c) grant anyone else besides yourself access to your account."Farming". You may not freely allow your own score to be reduced to the direct gain of another player. An example of this would be "attack", where an in game attacker and defender have consented in advance to let the attacker steal resource objects or kill the defender with reduced or no risk to the attacker.Automated Accesses: You may only access the account yourself. The use of any automatic self written or third party software, scripts, or any other automated process that occurs without your explicit control at the point in time the game access is made is strictly prohibited.Licensor is the sole judge in determining whether or not an account has been cheating. On detection of a cheating account, the account will be "suspended". A suspended account can no longer be accessed, or interacted with within the Game. An email will be sent to the registered owner of the suspended account with a brief explanation of the action. The account owner will be given 7 days to appeal the decision, by which time the account with either be reopened, or deleted and this agreement terminated as per section 7 of this agreement (TERMINATION). Licensor's decision is final with any account suspension.
<br>
<br>
9. INTELLECTUAL PROPERTY RIGHTS: All title and intellectual property rights in and to the Game (including but not limited to any images, photographs, animations, video, audio, music, text, and "applets" incorporated into the Game), and any copies of the Game are owned by Licensor or its suppliers. All title and intellectual property rights in and to the content that is not contained in the Game, but may be accessed through use of the Game, is the property of the respective content owners and may be protected by applicable copyright or other intellectual property laws and treaties. This Agreement grants You no rights to use such content. Licensor and our suppliers shall retain ownership of all intellectual property rights relating to or residing in the Game and websites controlled by Licensor. All data stored on our servers are considered property of Licensor, and we may alter such data at any time.
<br>
<br>
10. USER CONTENT: As part of your Account, You can upload content to our servers in various forms, such as, but not limited to, the selections you make for the Game and in chat rooms and similar user-to-user areas, the base banner, content on the forums, and in game messages (collectively, Your "Content"). Your Content shall not: (a) infringe any third party intellectual property, other proprietary or publicity/privacy rights; (b) violate any law or regulation; (c) be defamatory, obscene, pornographic or harmful to minors; or (d) contain any viruses, trojan horses, worms, time bombs, cancelbots or other computer programming routines that are intended to damage, detrimentally interfere with, surreptitiously intercept or expropriate any system, data or personal information. We may take any action with respect to your Content if we believe it may create liability for us or may cause us to lose (in whole or in part) the services of our ISPs or other suppliers. You hereby grant to us a worldwide, perpetual, irrevocable, royalty-free, sublicense able (through multiple tiers) right to exercise all intellectual property rights, in any media now known or not currently known, associated with your Content. You accept that due to the real-time nature of the Game, any content in violation of this agreement may not be dealt with immediately. To obtain an Account, You will be required to choose both a login name and a player name. While You are encouraged to use a pseudonym, especially if You are a minor, You may not pick a name that violates anyone's trademarks, publicity rights, other proprietary rights, or names that can be found to be insulting. Login names, base names and player names are subject to the same content restrictions as all other user content documented in this paragraph. We will determine, in our sole discretion, if a name is unsuitable, and may choose to rename Your account to a more suitable name.
<br>
<br>
11. DISCLAIMER OF WARRANTIES: WE PROVIDE THE ACCOUNT, THE Game AND ALL OTHER SERVICES "AS IS." WE AND OUR SUPPLIERS EXPRESSLY DISCLAIM ALL WARRANTIES OR CONDITIONS OF ANY KIND, EXPRESS, IMPLIED OR STATUTORY, INCLUDING WITHOUT LIMITATION THE IMPLIED WARRANTIES OF TITLE, NONINFRINGEMENT, MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE. Without limiting the foregoing, we do not ensure continuous, error-free or secure operation of the Game or Your Account. Some states/countries do not allow the disclaimer of implied warranties, so the foregoing disclaimer may not apply to You. This warranty gives You specific legal rights and You may also have other legal rights which vary from region to region. We are not liable for any delay or failure to perform resulting from any causes beyond our reasonable control. Further, we cannot and do not promise or ensure that You will be able to access Your Account whenever You want, and there may be extended periods of time when You cannot access Your Account.
<br>
<br>
12. INFORMATION DISCLOSURE: We cannot ensure that your private communications and other personally identifiable information will not be disclosed to third parties. For example, we may be forced to disclose information to the government or third parties under certain circumstances, or third parties may unlawfully intercept or access transmissions or private communications. Additionally, we can (and You authorize us to) disclose any information about You to private entities, law enforcement or other government officials as we, in our sole discretion, believe necessary or appropriate to investigate or resolve possible problems or inquiries. You agree that we may communicate with You via email and any similar technology for any purpose relating to the Game and any services or software which may in the future be provided by us or on our behalf. Solely for the purpose of patching and updating the Game, You hereby grant us permission to (i) upload Game file information from the appropriate directory and (ii) download Game files to You.
<br>
<br>
13. GOVERNING LAW: This Agreement is governed in all respects by the laws of North America, as such laws are applied to agreements entered into and to be performed entirely within America between American residents.Both parties submit to personal jurisdiction within the North America and further agree that any cause of action relating to this Agreement shall be brought in a court in North America. If any provision of this Agreement is held to be invalid or unenforceable, such provision shall be struck and the remaining provisions shall be enforced. Our failure to act with respect to a breach by You or others does not waive our right to act with respect to subsequent or similar breaches. You may not assign or transfer this Agreement or Your rights here under, and any attempt to the contrary is void. This Agreement sets forth the entire understanding and agreement between us and You with respect to the subject matter hereof.
<br>
<br>
16. EXCLUSION OF INCIDENTAL, CONSEQUENTIAL AND CERTAIN OTHER DAMAGES: TO THE MAXIMUM EXTENT PERMITTED BY APPLICABLE LAW, IN NO EVENT SHALL MICROSOFT OR ITS SUPPLIERS BE LIABLE TO YOU OR TO ANY THIRD PARTY FOR ANY SPECIAL, INCIDENTAL, INDIRECT, OR CONSEQUENTIAL DAMAGES WHATSOEVER (INCLUDING, BUT NOT LIMITED TO, DAMAGES FOR LOSS OF PROFITS OR CONFIDENTIAL OR OTHER INFORMATION, FOR BUSINESS INTERRUPTION, FOR PERSONAL INJURY, FOR LOSS OF PRIVACY, FOR FAILURE TO MEET ANY DUTY INCLUDING OF GOOD FAITH OR OF REASONABLE CARE, FOR NEGLIGENCE, AND FOR ANY OTHER PECUNIARY OR OTHER LOSS WHATSOEVER) ARISING OUT OF OR IN ANY WAY RELATED TO THE USE OF OR INABILITY TO USE THE SOFTWARE, THE PROVISION OF OR FAILURE TO PROVIDE SUPPORT SERVICES, OR OTHERWISE UNDER OR IN CONNECTION WITH ANY PROVISION OF THIS EULA, EVEN IN THE EVENT OF THE FAULT, TORT (INCLUDING NEGLIGENCE), STRICT LIABILITY, BREACH OF CONTRACT OR BREACH OF WARRANTY OF MICROSOFT OR ANY SUPPLIER, AND EVEN IF MICROSOFT OR ANY SUPPLIER HAS BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES. Some regions do not allow the foregoing limitations of liability, so they may not apply to You.
<br>
<br>
15. REFUND POLICY: No refunds will be issued for any products and services
<br>
<br>
16. USER GROUP: Extreme Mobster is only limited to adults over 18 years old or, as above, their child of age 16 years or older.



</p>
<p align="left">
&nbsp;<br>
</p>	</div>
	</td></tr>
	<tr><td colspan="2">
	<input size="5" name="user_agreement" type="checkbox" value="1" tabindex=""/>&nbsp;
	I hereby agree with the Terms and Conditions, and User Agreement.	</td></tr>
	<tr><td colspan="2">
    <input type="hidden" name="refer" value="" />
    <input type="hidden" name="action" value="register_submit" />
	<p class="clear"></p>
	</td></tr>
  <tr><td></td><td align="center"> <input class="2" type="submit" name="submit" style="width: 100;" value="Register"></td></tr>

				</div>
					</td>



	</table></form><br>

ENDHTML;
    }
    else
      print "<tr><td class=\"subTitle\">Register</td></tr>
<tr><td class=\"mainTxt\" align=center>Success<br><br>
Congratulations and Welcome to <b>The Gangster Game</b>. You can now retreive your password, then login and start a world of drugdealing, murder, corruption, gambling and many other crimes that comes along with being a Mob Boss... or on the other hand, a simple drug runner! You decide!<br><br> <b>PLEASE CHANGE YOUR PASSWORD WHEN YOU FIRST LOGIN > GO TO EDIT PROFILE!</td></tr>\n";
  }

/* ------------------------- */ ?>





		<ul class="inlineLinks">

					</ul>
	</div>
    </div>
  </div>
  <p id="footer"> 
<br>
 <a HREF="login.php?x=lostpass">Forgotten your password? Click here to Reset it.</a><br><br>
 	
<?php
//Copyright variabelen instellen
$beginjaar = '2007'; // Beginjaar van je site
$jaar = date ("Y");  //Ophalen systeemjaar
$jaar2 = $jaar + 1;  //jaar2 = jaar + 1
$bedrijfsnaam = ''; //Bedrijfsnaam website
$rechten = ''; //Neerzetten rechten
$gc = ''; //
echo ' &copy' . ' ' . $beginjaar . ' - ' . $jaar . ' - ' . $bedrijfsnaam . ' ' . $gc;
?> <?php echo $page->sitetitle; ?>
	
	
	  </p>
</div>
</body>
</html>