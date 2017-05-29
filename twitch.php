<!DOCTYPE html><?php $self="twitch";?>
<html>
<head>
<title>Popout-Maker Twitch</title>
<?php require '/assets/inc/head.php';?>
<script type="text/javascript">
function GeneratePopout() { 
	//reset error div
	document.getElementById("channelnameemptyerror").style.display="none";
	//get inputs
	input = document.getElementById('popouturl').value.toLowerCase().replace(/[^a-z0-9_]+/gi,"");
	if(input=="") {document.getElementById("channelnameemptyerror").style.display="block";return false;};//nice input
	inputwidth = document.getElementById('inputwidth').value;
	inputheight = document.getElementById('inputheight').value;
	chatoption = radioValue("chatsidechoice");
	if(chatoption!="none") inputwidth = +inputwidth + 340;//add space for chat, if enabled
	//piece together preferences
	popoutWindowpreferences = "width=" + inputwidth + ",height=" + inputheight + ",status=no,scrollbars=no,resizable=yes,location=no,menubar=no";
	windowLink = "/frame/twitchframe.php?channel="+input+"&chat="+chatoption;
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
#chatsidediv{width:642px;}
#chatsidediv .radio-bg{width:212px;}
.radio-1 .radio-bg {margin-left:0px;}
.radio-2 .radio-bg {margin-left:214px;}
.radio-3 .radio-bg {margin-left:428px;}
input[type='radio']+label.is-radio{width:200px;}
</style>
</head>
<body>
<h1 id="title">Popout Maker - <span style="color:#6441a5;">Twitch</span></h1><hr>
<div id="main">
<noscript><div class="errorwrapper" id="noscripterror"><img src="/assets/warning.png" alt="!"><div>Javascript is disabled or not suppported by your browser</div></div></noscript>
<div class="errorwrapper" id="channelnameemptyerror" style="display:none;"><img src="/assets/warning.png" alt="!"><div>Channel name cannot be empty</div></div>
<p>Enter channel name here:<br>
<input type="text" name="popouturl" value="" id="popouturl" style="width:500px"></p>
<table>
	<tr>
		<td>Window width:</td>
		<td><input type="number" name="width" id="inputwidth" min="100" value="1280" oninput="aspectratio(this,'inputheight','keep169option',16);"><span id="chatsizenote" class="note">+340</td>
	</tr>
	<tr>
		<td>Window height:</td>
		<td><input type="number" name="height" id="inputheight" min="100" value="720" oninput="aspectratio(this,'inputwidth','keep169option',9);"></td>
	</tr>
	<tr>
		<td class="note" colspan="2">If activated space for chat will automatically be added<input type="checkbox" id="keep169option" name="keep169option" style="display:none;" checked></td>
	</tr>
</table>
<p>
	<div id="chatsidediv">
		<input type="radio" name="chatsidechoice" id="chatsideleft" value="left" onChange="ToggleChat('radio-1');"><label for="chatsideleft" class="is-radio"> Show chat on the left side</label>
		<input type="radio" name="chatsidechoice" id="chatsidenone" value="none" onChange="ToggleChat('radio-2');"><label for="chatsidenone" class="is-radio"> Don't show chat</label>
		<input type="radio" name="chatsidechoice" id="chatsideright" value="right" onChange="ToggleChat('radio-3');" checked><label for="chatsideright" class="is-radio"> Show chat on the right side</label>
		<div style="clear:both;" class="radio-3" id="chatsidebg"><div class="radio-bg"></div></div>
	</div>
</p>
<p><input type="button" onclick="GeneratePopout();" value="Generate Popout"></p>
<?php require '/assets/inc/footer.php';?>