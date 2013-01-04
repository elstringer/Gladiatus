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
<link rel="stylesheet" type="text/css" href="<? echo $sitelink;?>/layout/crimestyle12/css/css.css"><link rel="stylesheet" type="text/css" href="<? echo $sitelink;?>/layout/crimestyle12/css/forum.css">
</head>
<body style="margin: 0px;">

<?
  session_start();
if($_GET['t'] == ""){header("Location: $sitelink/viewforum.php?f={$_GET['f']}");}
$topic2 = mysql_query("SELECT * FROM `forumtopics` WHERE `id`='{$_GET['t']}'");
$topic = mysql_fetch_object($topic2);
$totalvotes = 0;
if($_POST['vote_id_1'] == 1){$totalvotes++; $vote1 = 1;}
if($_POST['vote_id_2'] == 2){$totalvotes++; $vote2 = 1;}
if($_POST['vote_id_3'] == 3){$totalvotes++; $vote3 = 1;}
if($_POST['vote_id_4'] == 4){$totalvotes++; $vote4 = 1;}
if($_POST['vote_id_5'] == 5){$totalvotes++; $vote5 = 1;}
if($_POST['vote_id_6'] == 6){$totalvotes++; $vote6 = 1;}
if($_POST['vote_id_7'] == 7){$totalvotes++; $vote7 = 1;}
if($_POST['vote_id_8'] == 8){$totalvotes++; $vote8 = 1;}
if($_POST['vote_id_9'] == 9){$totalvotes++; $vote9 = 1;}
if($_POST['vote_id_10'] == 10){$totalvotes++; $vote10 = 1;}
$poll1 =  mysql_query("SELECT * FROM `forumpolls` WHERE `topic`='$topic->id'");
$poll = mysql_fetch_object($poll1);
if(preg_match("/\b$data->id\b/i", "$poll->geantwoord")){$error = dubbelsubmit;}
if($totalvotes > $poll->opties){$error = teveel;}
if($error == ""){
$antwoord = "$poll->geantwoord $data->id";
if(isset($_POST['vote_id'])){$num = $_POST['vote_id']; mysql_query("UPDATE `forumpolls` SET `answers$num`=`answers$num`+'1' WHERE `topic`='$poll->topic'"); $error = dubbelsubmit;}
if($totalvotes > 0 || isset($_POST['vote_id'])){mysql_query("UPDATE `forumpolls` SET `geantwoord`='$antwoord' WHERE `topic`='$poll->topic'");}
if($vote1 == 1){mysql_query("UPDATE `forumpolls` SET `answers1`=`answers1`+'1' WHERE `topic`='$poll->topic'");}
if($vote2 == 1){mysql_query("UPDATE `forumpolls` SET `answers2`=`answers2`+'1' WHERE `topic`='$poll->topic'");}
if($vote3 == 1){mysql_query("UPDATE `forumpolls` SET `answers3`=`answers3`+'1' WHERE `topic`='$poll->topic'");}
if($vote4 == 1){mysql_query("UPDATE `forumpolls` SET `answers4`=`answers4`+'1' WHERE `topic`='$poll->topic'");}
if($vote5 == 1){mysql_query("UPDATE `forumpolls` SET `answers5`=`answers5`+'1' WHERE `topic`='$poll->topic'");}
if($vote6 == 1){mysql_query("UPDATE `forumpolls` SET `answers6`=`answers6`+'1' WHERE `topic`='$poll->topic'");}
if($vote7 == 1){mysql_query("UPDATE `forumpolls` SET `answers7`=`answers7`+'1' WHERE `topic`='$poll->topic'");}
if($vote8 == 1){mysql_query("UPDATE `forumpolls` SET `answers8`=`answers8`+'1' WHERE `topic`='$poll->topic'");}
if($vote9 == 1){mysql_query("UPDATE `forumpolls` SET `answers9`=`answers9`+'1' WHERE `topic`='$poll->topic'");}
if($vote10 == 1){mysql_query("UPDATE `forumpolls` SET `answers10`=`answers10`+'1' WHERE `topic`='$poll->topic'");}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="nl-nl" xml:lang="nl-nl">
<head>

<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<meta http-equiv="content-language" content="nl-nl" />
<meta http-equiv="content-style-type" content="text/css" />
<meta http-equiv="imagetoolbar" content="no" />
<meta name="resource-type" content="document" />
<meta name="distribution" content="global" />

<?
if($_GET['f'] == 6){
$text = "Questions about the Game";
$categorietext = "Game and Support";
$categorie = 10;
}
if($_GET['f'] == 12){
$text = "Place your secret links here";
$categorietext = "Game and Support";
$categorie = 10;
}
if($_GET['f'] == 5){
$text = "Errors &amp; Bugs";
$categorietext = "Game and Support";
$categorie = 10;
}
if($_GET['f'] == 4){
$text = "Tips &amp; Ideas";
$categorietext = "Game and Support";
$categorie = 10;
}
if($_GET['f'] == 8){
$text = "News and Updates";
$categorietext = "Game and Support";
$categorie = 10;
}
if($_GET['f'] == 3){
$text = "General Forum";
$categorietext = "Forums";
$categorie = 9;
}
if($_GET['f'] == 7){
$text = "The Cafe";
$categorietext = "Forums";
$categorie = 9;
}
if($_GET['st'] == ""){$_GET['st'] = 0;}
$sk = $_POST['sk'];
$sd = $_POST['sd'];
if($_POST['sk'] == ""){$sk = t;}
if($_POST['sd'] == ""){$sd = d;}
if($_GET['sk'] != ""){$sk = $_GET['sk'];}
if($_GET['sd'] != ""){$sd = $_GET['sd'];}
if($_GET['start'] == ""){$_GET['start'] = 0;}
if($error == mark){?><meta http-equiv="refresh" content="3;url=<?echo$sitelink;?>/viewforum.php?f=<?echo$_GET['f'];?>" /><?}?>
<title><?php echo $page->sitetitle; ?></title>

<link rel="stylesheet" href="forum/ubuntu/layout/stylesheet.css" type="text/css" />
<link rel="stylesheet" href="layout/crimestyle12/css/style.css" type="text/css" />

<script type="text/javascript" src="js/prototype-1.6.0.2.js"></script>

	</head>




<script language="javascript">
// <![CDATA[

function popup(url, width, height, name)
      {
       if (!name)
       {
          name = '_popup';
       }

       window.open(url.replace(/&amp;/g, '&'), name, 'height=' + height + ',resizable=yes,scrollbars=yes,width=' + width);
         return false;
      }


function jumpto()
{
<?
$dbres = mysql_query("SELECT * FROM `forumreplies` WHERE `topic`='$topic->id'");
$num = mysql_num_rows($dbres);
$dezepagina = $_GET['start']/10+1;
$pages = floor($num/10)+1;
?>
	var page = prompt('Enter the page number where you want to go to:', '<?echo$dezepagina;?>');
	var perpage = '10';
	var maxpages = '<?echo$pages;?>';
	var base_url = '<?=$sitelink?>/';

	if (page !== null && !isNaN(page) && page > 0 && page <= maxpages)
	{
		document.location.href = base_url.replace(/&amp;/g, '&') + '<?echo"viewtopic.php?f={$_GET['f']}&amp;t=$topic->id&amp;"?>start=' + ((page - 1) * perpage);
	}
}

/**
* Find a member
*/
function find_username()
      {
       popup(url, 760, 570, '_usersearch');
         return false;
      }

/**
* Mark/unmark checklist
* id = ID of parent container, name = name prefix, state = state [true/false]
*/
function marklist(id, name, state)
{
	var parent = document.getElementById(id);
	if (!parent)
	{
		eval('parent = document.' + id);
	}

	if (!parent)
	{
		return;
	}

	var rb = parent.getElementsByTagName('input');

	for (var r = 0; r < rb.length; r++)
	{
		if (rb[r].name.substr(0, name.length) == name)
		{
			rb[r].checked = state;
		}
	}
}
// ]]>
</script>
<body class="ltr">



<div align="center">

<table border=0px border-color=yellow cellspacing=0px cellpadding=0px width=1000px>

<tr>

<?$topic2 = mysql_query("SELECT * FROM `forumtopics` WHERE `id`='{$_GET['t']}'");
$topic = mysql_fetch_object($topic2);
if($data->login == $admin | $data->login == $moderator) {
if($_GET['lock'] == "true"){mysql_query("UPDATE `forumtopics` SET `locked`='1' WHERE `id`='$topic->id'");$topic->locked = 1;}
if($_GET['lock'] == "false"){mysql_query("UPDATE `forumtopics` SET `locked`='0' WHERE `id`='$topic->id'");$topic->locked = 0;}
if($_GET['stick'] == "true"){mysql_query("UPDATE `forumtopics` SET `categorie`='sticky' WHERE `id`='$topic->id'");$topic->categorie = sticky;}
if($_GET['stick'] == "false"){mysql_query("UPDATE `forumtopics` SET `categorie`='topic' WHERE `id`='$topic->id'");$topic->categorie = topic;}

if($_GET['announce'] == "true"){mysql_query("UPDATE `forumtopics` SET `categorie`='announce' WHERE `id`='$topic->id'");$topic->categorie = announce;}}
?>
<a name="top"></a>
<div id="wrapheader" style="width:620px">

		<div class="title_bg" style="width:100%;">
			<div class="title_medium" style="width:100%" nowrap align="left">
			<a href="./forum.php">Forum Overview</a>
			 &#187; <a  href="./viewforum.php?f=<?echo$_GET['f'];?>"><?echo$text;?></a> <span id="phpbb_show_topic" style="display:none;">&#187; <?echo$topic->title;?></span>
			</div>
		</div>


		<div style="width:100%; height:35px; background:url('../images/tab_info_bg.jpg') bottom repeat-x #c3b79d; font-family:arial; font-size:12px; color:#2a190e;">

			<div style="float:left; margin-top:8px;">

						<div id="" style="float:left; height:20px; margin:0px; padding:0px; margin-left: 5px;"><a href="./forummiscfaq.php">Help</a></div>

													<div id="" style="float:left; height:20px; margin:0px; padding:0px; margin-left: 5px;">|</div>
							<div id="" style="float:left; height:20px; margin:0px; padding:0px; margin-left: 5px;"><a href="leaders.php">The Team</a></div>

			</div>

		</div>


</div>
<?
if($topic->lastreply != $data->login){mysql_query("UPDATE `forumtopics` SET `read`='1' WHERE `id`='$topic->id'");}
$poll1 =  mysql_query("SELECT * FROM `forumpolls` WHERE `topic`='$topic->id'");
$poll = mysql_fetch_object($poll1);
$user2 = mysql_query("SELECT * FROM `users` WHERE `login`='$topic->auteur'");
$user = mysql_fetch_object($user2);
$replace = $topic->content;
$replace 		= htmlspecialchars($replace);
$replace 		= nl2br($replace);
if($topic->ubb == 1){
include("incl_ubb.php");
}
if($topic->smiles == 1){
include("incl_smilies.php");
}
$alles = $poll->answers1+$poll->answers2+$poll->answers3+$poll->answers4+$poll->answers5+$poll->answers6+$poll->answers7+$poll->answers8+$poll->answers9+$poll->answers10;
$pr1 = round($poll->answers1/$alles*100);
$pr2 = round($poll->answers2/$alles*100);
$pr3 = round($poll->answers3/$alles*100);
$pr4 = round($poll->answers4/$alles*100);
$pr5 = round($poll->answers5/$alles*100);
$pr6 = round($poll->answers6/$alles*100);
$pr7 = round($poll->answers7/$alles*100);
$pr8 = round($poll->answers8/$alles*100);
$pr9 = round($poll->answers9/$alles*100);
$pr10 = round($poll->answers10/$alles*100);
$totalpercent = $pr1+$pr2+$pr3+$pr4+$pr5+$pr6+$pr7+$pr8+$pr9+$pr10;
$eraf = $totalpercent-100;
if($totalpercent > 100){$pr1 = $pr1-$eraf;}
if($_GET['start'] < 1){
?>
<div id="wrapcentre" style="width:590px;">
	<table class="tablebg" width="100%" cellspacing="1">

		<tr>
			<th colspan="2">
				<table width="100%" cellpadding="0" cellspacing="0">
					<tr>
						<td>
							<a href="generalprofile.php?x=<?echo$user->id;?>"><b><?if($data->login == $admin){?><FONT color='red'><?}if($data->login == $moderator){?><FONT color='#FF6600'><?}echo$user->login; if($data->login == $admin | $data->login == $moderator){?></FONT><?}?></b></a>
						</td>
						<td align="right">
							<img src="forum/N.Design/imageset/icon_post_target.gif" width="12" height="9" alt="Message" title="Message" /><b>Placed:</b> <?echo$topic->date;?>&nbsp;
						</td>
					</tr>

				</table>
			</th>
		</tr>
<?
if($poll->vraag != ""){
?>
	<tr>
		<td class="row2" colspan="2" align="center"><br clear="all" />
			<table cellspacing="0" cellpadding="4" border="0" align="center">
<?if($error == teveel){?><tr><td><FONT color=red>You may only fill in <?echo$poll->opties;?> answers!</FONT></td></tr><?}?>
			<tr>
				<td align="center"><span class="gen"><b><?echo$poll->vraag;?></b></span><br /><span class="gensmall"></span></td>
			</tr>
			<tr>
				<td align="center">
					<table cellspacing="0" cellpadding="2" border="0">
<form method="POST">
<?if($poll->vraag != ""){?>
											<tr>
							<?if($error != dubbelsubmit){?><td>
															<input type="<?if($poll->opties > 1){?>checkbox<?}else{?>radio<?}?>" class="radio" name="vote_id<?if($poll->opties > 1){?>_1<?}?>" value="1" />
														</td><?}?>
							<td><?if($error == dubbelsubmit){echo"<b>$pr1%</b> - ";}?><span class="gen"><?=$poll->optie1?></span></td>
						</tr>
<?}if($poll->optie2 != "" && $poll->optie1 != ""){?>
											<tr>
							<?if($error != dubbelsubmit){?><td>
															<input type="<?if($poll->opties > 1){?>checkbox<?}else{?>radio<?}?>" class="radio" name="vote_id<?if($poll->opties > 1){?>_2<?}?>" value="2" />
														</td><?}?>
							<td><?if($error == dubbelsubmit){echo"<b>$pr2%</b> - ";}?><span class="gen"><?=$poll->optie2?></span></td>
						</tr>
<?}if($poll->optie3 != "" && $poll->optie2 != ""){?>
											<tr>
							<?if($error != dubbelsubmit){?><td>
															<input type="<?if($poll->opties > 1){?>checkbox<?}else{?>radio<?}?>" class="radio" name="vote_id<?if($poll->opties > 1){?>_3<?}?>" value="3" />
														</td><?}?>
							<td><?if($error == dubbelsubmit){echo"<b>$pr3%</b> - ";}?><span class="gen"><?=$poll->optie3?></span></td>
						</tr>
<?}if($poll->optie4 != "" && $poll->optie3 != ""){?>
											<tr>
							<?if($error != dubbelsubmit){?><td>
															<input type="<?if($poll->opties > 1){?>checkbox<?}else{?>radio<?}?>" class="radio" name="vote_id<?if($poll->opties > 1){?>_4<?}?>" value="4" />
														</td><?}?>
							<td><?if($error == dubbelsubmit){echo"<b>$pr4%</b> - ";}?><span class="gen"><?=$poll->optie4?></span></td>
						</tr>
<?}if($poll->optie5 != "" && $poll->optie4 != ""){?>
											<tr>
							<?if($error != dubbelsubmit){?><td>
															<input type="<?if($poll->opties > 1){?>checkbox<?}else{?>radio<?}?>" class="radio" name="vote_id<?if($poll->opties > 1){?>_5<?}?>" value="5" />
														</td><?}?>
							<td><?if($error == dubbelsubmit){echo"<b>$pr5%</b> - ";}?><span class="gen"><?=$poll->optie5?></span></td>
						</tr>
<?}if($poll->optie6 != "" && $poll->optie5 != ""){?>
											<tr>
							<?if($error != dubbelsubmit){?><td>
															<input type="<?if($poll->opties > 1){?>checkbox<?}else{?>radio<?}?>" class="radio" name="vote_id<?if($poll->opties > 1){?>_6<?}?>" value="6" />
														</td><?}?>
							<td><?if($error == dubbelsubmit){echo"<b>$pr6%</b> - ";}?><span class="gen"><?=$poll->optie6?></span></td>
						</tr>
<?}if($poll->optie7 != "" && $poll->optie6 != ""){?>
											<tr>
							<?if($error != dubbelsubmit){?><td>
															<input type="<?if($poll->opties > 1){?>checkbox<?}else{?>radio<?}?>" class="radio" name="vote_id<?if($poll->opties > 1){?>_7<?}?>" value="7" />
														</td><?}?>
							<td><?if($error == dubbelsubmit){echo"<b>$pr7%</b> - ";}?><span class="gen"><?=$poll->optie7?></span></td>
						</tr>
<?}if($poll->optie8 != "" && $poll->optie7 != ""){?>
											<tr>
							<?if($error != dubbelsubmit){?><td>
															<input type="<?if($poll->opties > 1){?>checkbox<?}else{?>radio<?}?>" class="radio" name="vote_id<?if($poll->opties > 1){?>_8<?}?>" value="8" />
														</td><?}?>
							<td><?if($error == dubbelsubmit){echo"<b>$pr8%</b> - ";}?><span class="gen"><?=$poll->optie8?></span></td>
						</tr>
<?}if($poll->optie9 != "" && $poll->optie8 != ""){?>
											<tr>
							<?if($error != dubbelsubmit){?><td>
															<input type="<?if($poll->opties > 1){?>checkbox<?}else{?>radio<?}?>" class="radio" name="vote_id<?if($poll->opties > 1){?>_9<?}?>" value="9" />
														</td><?}?>
							<td><?if($error == dubbelsubmit){echo"<b>$pr9%</b> - ";}?><span class="gen"><?=$poll->optie9?></span></td>
						</tr>
<?}if($poll->optie10 != "" && $poll->optie9 != ""){?>
											<tr>
							<?if($error != dubbelsubmit){?><td>
															<input type="<?if($poll->opties > 1){?>checkbox<?}else{?>radio<?}?>" class="radio" name="vote_id<?if($poll->opties > 1){?>_10<?}?>" value="10" />
														</td><?}?>
							<td><?if($error == dubbelsubmit){echo"<b>$pr10%</b> - ";}?><span class="gen"><?=$poll->optie10?></span></td>
						</tr>
<?}?>
										</table>
				</td>
			</tr>
<?if($error != dubbelsubmit){?>
            <tr>
				<td align="center"><span class="gensmall">You may select <strong><?echo$poll->opties;?></strong> option<?if($poll->opties > 1){?>s<?}?> </span></td>
			</tr>
			<tr>
				<td align="center"><span class="gensmall"><input type="submit" class="mod_submit" name="submit" value="Vote!" /></span></td>
			</tr>
<?}?>
				</form>
			</table>
		</td>
	</tr>
<?}?>


<tr class="row1">

			<td valign="top" class="profile">
				<table cellspacing="4" align="center" width="50">
				<tr>
<td>
<a href="generalprofile.php?x=<?echo$user->id;?>"><img src="forum/N.Design/imageset/nl/icon_user_profile.gif" alt="Profile" title="Profile" /></a> <br>

</td>
</tr>
				</table>

			</td>
			<td valign="top" width="100%">
				<table width="100%" cellspacing="5">
				<tr>
					<td>

						<div class="postbody"><?echo$replace;?></div>

					<br clear="all" /><br />					</td>
				</tr>
				</table>
			</td>
		</tr>

		<tr class="row1">
			<td class="profile"><strong><a href="#wrapheader">Top</a></strong></td>
			<td>
				<div class="gensmall" style="float: left">
					<?if($topic->auteur == $data->login || $admin || $moderator){?><a href="./posting.php?mode=delete&amp;f=<?echo$_GET['f'];?>&amp;t=<?echo$_GET['t'];?>"><img src="forum/N.Design/imageset/nl/icon_post_delete.gif" alt="Delete this post" title="Delete this post" /></a><?}if($data->login == $topic->auteur || $admin || $moderator){?><a href="./edit_forum.php?f=<?echo$_GET['f'];?>&amp;t=<?echo$_GET['t'];?>"><img src="forum/N.Design/imageset/nl/icon_topic_edit.gif" alt="Edit message" title="Edit message" /></a><?}?>				</div>
<?if($topic->locked != 1){?>				<div class="gensmall" style="float: right"><a href="./posting.php?mode=quote&amp;f=<?echo$_GET['f'];?>&amp;t=<?echo$topic->id;?>"><img src="forum/N.Design/imageset/nl/icon_post_quote.gif" alt="Quote the post" title="Quote the post" /></a> &nbsp;</div><?}?>
			</td>
		</tr>
		</table>
<br />

<?
}
if($_GET['start'] == ""){
$start = 0;
}
else{$start = $_GET['start'];}
$reply2 = mysql_query("SELECT * FROM `forumreplies` WHERE `topic`='{$_GET['t']}' ORDER BY `id` LIMIT $start,10");
while($reply = mysql_fetch_object($reply2)){
$replace = $reply->content;
$replace 		= htmlspecialchars($replace);
$replace 		= nl2br($replace);
$user2 = mysql_query("SELECT * FROM `users` WHERE `login`='$reply->auteur'");
$user = mysql_fetch_object($user2);
if($reply->ubb == 1){
include("incl_ubb.php");
}
if($reply->smiles == 1){
include("incl_smilies.php");
}
?>
	<table class="tablebg" width="100%" cellspacing="1">

		<tr>
			<th colspan="2">
				<table width="100%" cellpadding="0" cellspacing="0">
					<tr>
						<td>
							<a href="generalprofile.php?x=<?echo$user->id;?>"><b><?if($data->login == $admin){?><FONT color='red'><?}if($data->login == $moderator){?><FONT color='#FF6600'><?}echo$user->login; if($data->login == $admin || $data->login == $moderator){?></FONT><?}?></b></a>
						</td>
						<td align="right">
							<img src="forum/N.Design/imageset/icon_post_target.gif" width="12" height="9" alt="Message" title="Message" /><b>Placed:</b> <?echo$reply->date;?>&nbsp;
						</td>
					</tr>

				</table>
			</th>
		</tr>


<tr class="row1">

			<td valign="top" class="profile">
				<table cellspacing="4" align="center" width="50">
				<tr>
<td>
<a href="generalprofile.php?x=<?echo$user->id;?>"><img src="forum/N.Design/imageset/nl/icon_user_profile.gif" alt="Profile" title="Profile" /></a> <br>

</td>
</tr>
				</table>

			</td>
			<td valign="top" width="100%">
				<table width="100%" cellspacing="5">
				<tr>
					<td>

						<div class="postbody"><?echo$replace;?></div>

					<br clear="all" /><br />					</td>
				</tr>
				</table>
			</td>
		</tr>

		<tr class="row1">
			<td class="profile"><strong><a href="#wrapheader">Top</a></strong></td>
			<td>
				<div class="gensmall" style="float: left">
					<?if($reply->auteur == $data->login || $admin || $moderator){?><a href="./posting.php?mode=delete&amp;f=<?echo$_GET['f'];?>&amp;p=<?echo$reply->id;?>"><img src="forum/N.Design/imageset/nl/icon_post_delete.gif" alt="Delete this post" title="Delete this post" /></a><?}if($data->login == $topic->auteur || $admin || $moderator){?><a href="./edit_forum.php?f=<?echo$_GET['f'];?>&amp;p=<?echo$reply->id;?>"><img src="forum/N.Design/imageset/nl/icon_topic_edit.gif" alt="Edit message" title="Edit message" /></a><?}?>				</div>
<?if($topic->locked != 1){?>				<div class="gensmall" style="float: right"><a href="./posting.php?mode=quote&amp;f=<?echo$_GET['f'];?>&amp;p=<?echo$reply->id;?>"><img src="forum/N.Design/imageset/nl/icon_post_quote.gif" alt="Quote the post" title="Quote the post" /></a> &nbsp;</div><?}?>
			</td>
		</tr>

		</table>
<br />

<?}?>

	<table width="100%" cellspacing="1" class="tablebg">
	<tr align="center">
	</tr>
	</table>

	<table width="100%" cellspacing="1">
	<tr>
		<td align="left" valign="middle" nowrap="nowrap">
<?if($topic->locked != 1){?>		<a href="./posting.php?mode=reply&amp;f=<?echo$_GET['f'];?>&amp;t=<?echo$topic->id;?>"><img src="forum/N.Design/imageset/nl/button_topic_reply.gif" alt="Reply to topic" title="Reply to topic" /></a><?}
else{?><img src="forum/N.Design/imageset/nl/button_topic_locked.gif" alt="Topic closed" title="Topic closed" /><?}?>		</td>
					<td class="gensmall" width="100%" align="right" nowrap="nowrap"><b><?
$next = $_GET['start']+10;
$begin = $_GET['start'];
$dbres = mysql_query("SELECT * FROM `forumreplies` WHERE `topic`='$topic->id'");
$num = mysql_num_rows($dbres)-1;
$stop = 0;
$pages = floor($num/10);
if($pages > 0){
?><a href="#" onClick="jumpto(); return false;" title="Click to go to the page ...">Go to page</a><?
  if(mysql_num_rows($dbres) > -1) {
$j=0;
$i=0;
while($i < 3000) {
$i = $j*10;
$j++;
$pagina2 = $begin/10;
$pagina = $pagina2+1;
if($pagina == $j){?><strong><?echo$j;?></strong><?}
if($pagina != $j && $j < 6 && $i <= $num){?><a href="./viewtopic.php?f=<?=$_GET['f']?>&amp;t=<?=$topic->id?>&amp;start=<?=$i?>"><?=$j?></a><?}if($j*10 <= $num){echo'<span class="page-sep">, </span>';}
    }
if($j == 5){$start = $pages*10;echo" ... <a href=\"./viewtopic.php?f={$_GET['f']}&amp;t=$topic->id&amp;start=$start\">$pages</a>";}

    if($begin+10 > mysql_num_rows($dbres)-1) {
      print " Next";
	  }
    else {
      ?><a href="./viewtopic.php?f=<?=$_GET['f']?>&amp;t=<?=$topic->id?>&amp;start=<?=$next?>"> Next</a><?
  }
  }
  }
?></b></td>
			</tr>
	</table>
<?if($data->login == $admin | $data->login == $moderator){
if($topic->categorie == sticky){$cat = stick;}else{$cat = $topic->categorie;}
if($topic->categorie != topic){?><a href="./viewtopic.php?f=<?echo$_GET['f'];?>&amp;t=<?echo$topic->id;?>&stick=false"><img src="forum/N.Design/imageset/nl/icon_topic_un<?echo$cat;?>.gif" alt="Name subject to normal topic" title="Name subject to normal topic" /></a><?}?>
<?if($topic->locked != 1){?><a href="./viewtopic.php?f=<?echo$_GET['f'];?>&amp;t=<?echo$topic->id;?>&lock=true"><img src="forum/N.Design/imageset/nl/icon_topic_lock.gif" alt="Close topic" title="Close topic" /></a><?}
else{?><a href="./viewtopic.php?f=<?echo$_GET['f'];?>&amp;t=<?echo$topic->id;?>&lock=false"><img src="forum/N.Design/imageset/nl/icon_topic_unlock.gif" alt="Open topic" title="Open topic" /></a><?}?>
<?if($topic->categorie != sticky){?><a href="./viewtopic.php?f=<?echo$_GET['f'];?>&amp;t=<?echo$topic->id;?>&stick=true"><img src="forum/N.Design/imageset/nl/icon_topic_stick.gif" alt="Name subject to sticky topic" title="Name subject to sticky topic" /></a><?}
if($topic->categorie != announce){?><a href="./viewtopic.php?f=<?echo$_GET['f'];?>&amp;t=<?echo$topic->id;?>&announce=true"><img src="forum/N.Design/imageset/nl/icon_topic_announce.gif" alt="Promote topic to communicate" title="Promote topic to communicate" /></a><?}}?>
</div>

<div id="pagefooter"></div>

<br clear="all" />


<br clear="all" />

<script language="javascript">
	document.getElementById('phpbb_show_topic').style.display = '';
</script>

</div>
	<table width='100%' cellspacing='2' cellpadding='2'>
		<tr>
			<td class='content_bottom'></td>
		</tr>
	</table>
<br/>

		</div>
	</td>
	</tr>

	</table>
	</td>

