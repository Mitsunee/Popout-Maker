<!DOCTYPE html><?php $self="ytg";
if(isset($_GET['v'])) $robotNoIndex = TRUE;?>
<html>
<head>
<title>Popout-Maker YouTube Gaming</title>
<?php require 'assets/inc/head.php';?>
<script type="text/javascript">
function GeneratePopout() { 
	//reset error div
	document.getElementById("videoidemptyerror").style.display="none";
	//get inputs
	input = document.getElementById('popouturl').value;
	if(input=="") {document.getElementById("videoidemptyerror").style.display="block";return false;};//nice input
	inputVideoID = _GET("v",input);
	if(inputVideoID=="") {document.getElementById("videoidemptyerror").style.display="block";return false;};//nice input
	inputwidth = document.getElementById('inputwidth').value;
	inputheight = document.getElementById('inputheight').value;
	chatoption = radioValue("chatsidechoice");
	if(chatoption!="none") inputwidth = +inputwidth + 402;//add space for chat, if enabled
	//piece together preferences
	popoutWindowpreferences = "width=" +inputwidth+ ",height=" +inputheight+ ",status=no,scrollbars=no,resizable=yes,location=no,menubar=no";
	windowLink = "/frame/ytgframe.php?v="+inputVideoID+"&chat="+chatoption;
	popoutWindow = window.open(windowLink, "pmpopout", popoutWindowpreferences);
	popoutWindow.focus();
}
function ToggleChat(radioNum) {
	chatsizenote = document.getElementById("chatsizenote");
	if(radioValue("chatsidechoice")=="none"){
		chatsizenote.style.visibility="hidden";
	} else {
		chatsizenote.style.visibility="visible";	
	}
	document.getElementById("chatsidebg").className=radioNum;
}
</script>
<style>
#chatsidediv{width:642px;margin-top:16px;}
#chatsidediv .radio-bg{width:212px;}
.radio-1 .radio-bg {margin-left:0px;}
.radio-2 .radio-bg {margin-left:214px;}
.radio-3 .radio-bg {margin-left:428px;}
input[type='radio']+label.is-radio{width:200px;}
</style>
</head>
<body>
<header>Popout-Maker <span>for YouTube Gaming</span></header>
<?php require 'assets/inc/nav.php';?>
<main>
<noscript><div class="errorwrapper" id="noscripterror"><img src="/assets/warning.png" alt="!"><div>Javascript is disabled or not suppported by your browser</div></div></noscript>
<div class="errorwrapper" id="videoidemptyerror" style="display:none;"><img src="/assets/warning.png" alt="!"><div>Video ID cannot be empty</div></div>
<form action="javascript:void(0);" onsubmit="GeneratePopout();return false;"><?php
//Prepare form values
if(isset($_GET['v'])) {
	$_API_REQUEST['v']=preg_replace("/[^a-z0-9_]+/i","",$_GET['v']);//if a channel was set remove all non-valid characters
} else {$_API_REQUEST['v']="";}
if(isset($_GET['h'])) {
	$_API_REQUEST['h']=intval(preg_replace("/[^0-9]+/i","",$_GET['h']));//if a height was set remove all non-number characters and convert to int
	$_API_REQUEST['w']=intval($_API_REQUEST['h']/9*16);//pre-calculate the initial width for 16:9 aspectratio
} else {$_API_REQUEST['w']=1280;$_API_REQUEST['h']=720;}
$_API_REQUEST['chat']=3;
if(isset($_GET['chat'])&&$_GET['chat']=="left") $_API_REQUEST['chat']=1;
if(isset($_GET['chat'])&&$_GET['chat']=="nochat") $_API_REQUEST['chat']=2;
?>	<p>Enter video url here:<br>
		<input type="text" name="popouturl" value="<?php echo $_API_REQUEST['v'];?>" id="popouturl" style="width:500px" autofocus></p>
	<table>
		<tr>
			<td>Window width:</td>
			<td><input type="number" name="width" id="inputwidth" min="100" value="<?php echo $_API_REQUEST['w'];?>" oninput="aspectratio(this,'inputheight','keep169option',16);"><span id="chatsizenote" class="note">+402</span></td>
		</tr>
		<tr>
			<td>Window height:</td>
			<td><input type="number" name="height" id="inputheight" min="100" value="<?php echo $_API_REQUEST['h'];?>" oninput="aspectratio(this,'inputwidth','keep169option',9);"></td>
		</tr>
		<tr>
			<td class="note" colspan="2">If activated space for chat will automatically be added<input type="checkbox" id="keep169option" name="keep169option" style="display:none;" checked></td>
		</tr>
	</table>
		<div id="chatsidediv">
			<input type="radio" name="chatsidechoice" id="chatsideleft" value="left" onChange="ToggleChat('radio-1');"<?php if($_API_REQUEST['chat']==1) echo " checked";?>><label for="chatsideleft" class="is-radio"> Show chat on the left</label>
			<input type="radio" name="chatsidechoice" id="chatsidenone" value="none" onChange="ToggleChat('radio-2');"<?php if($_API_REQUEST['chat']==2) echo " checked";?>><label for="chatsidenone" class="is-radio"> Don't show chat</label>
			<input type="radio" name="chatsidechoice" id="chatsideright" value="right" onChange="ToggleChat('radio-3');"<?php if($_API_REQUEST['chat']==3) echo " checked";?>><label for="chatsideright" class="is-radio"> Show chat on the right</label>
			<div style="clear:both;" class="radio-<?php echo $_API_REQUEST['chat'];?>" id="chatsidebg"><div class="radio-bg"></div></div>
		</div>
	<p><input type="submit" value="Generate Popout"></p>
</form>
<?php require 'assets/inc/footer.php';?>