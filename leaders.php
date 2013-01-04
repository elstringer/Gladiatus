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
<link rel="stylesheet" type="text/css" href="<? echo $sitelink;?>/layout/crimestyle12/css/css.css"><link rel="stylesheet" type="text/css" href="<? echo $sitelink;?>/layout/crimestyle12/css/forum.css">
</head>
<body style="margin: 0px;">

<?
  session_start();
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


<a name="top"></a>
<div id="wrapheader" style="width:620px">

		<div class="title_bg" style="width:100%;">
			<div class="title_medium" style="width:100%" nowrap align="left">
			<a href="./forum.php">Forum Overview</a>
			<span id="phpbb_show_topic" style="display:none;"> </span>
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

<div id="wrapcentre" style="width:590px;">
<form method="post" action="">

<table class="tablebg" width="100%" cellspacing="1">
<tr>
	<th nowrap="nowrap" width="20%" align="left">Username</th>
	<th nowrap="nowrap" width="25%" align="left">Forums</th>
	<th nowrap="nowrap" width="20%" align="left">Primary group</th>
	<th nowrap="nowrap" width="15%" align="left">Rank</th>
	<th nowrap="nowrap" width="11%" align="left">Send message</th>
</tr>
<tr class="row3">
	<td colspan="5" align="left"><b class="gensmall">Administrators</b></td>
</tr>
<tr class="row2">
	<td class="gen" align="left"><strong><? echo $admin ?></strong></td>
	<td class="gensmall" align="left">&nbsp;</td>
	<td class="gensmall" align="left" nowrap="nowrap">&nbsp;
					<FONT color=red><b>Administrators</b></FONT>
			&nbsp;</td>
	<td class="gen" align="left">Managers</td>
	<td class="gen" align="left">&nbsp;&nbsp;</td>
</tr>

<tr class="row3">
	<td colspan="5" align="left"><b class="gensmall">Moderators</b></td>
</tr>


</table>

</form>

<br clear="all" />


<br clear="all" />

<div style="float: right;"></div>

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

