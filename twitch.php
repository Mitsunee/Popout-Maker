<!DOCTYPE html>
<html>
<head>
<title>Popout Maker - Twitch</title>
<link href="https://fonts.googleapis.com/css?family=Exo+2:400,300,700" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="/assets/style.css">
<link rel="icon" href="/favicon.ico">
<link rel="shortcut icon" href="/favicon.ico">
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script type="text/javascript">
function GeneratePopout() { // TODO:
	/*
	- if there's chat we need an extra 340px width
	- REMINDER that resizeTo resizes the full window, so you need to do some calc with outherwidth vs innerwidth
	- also save the current width and height in a var, so we now which one changed (needs to be biased for height or width because of diagonal resize)
	*/
	//get inputs
	input = document.getElementById('popouturl').value.toLowerCase().replace(/[^a-z0-9_]+/gi,"");
	if(input=="") return false;//nice input
	inputwidth = document.getElementById('inputwidth').value;
	inputheight = document.getElementById('inputheight').value;
	chatoption = document.getElementById('showchatchoice');
	if(chatoption.checked) inputwidth = +inputwidth + 340;//add space for chat, if enabled
	chatsideoption = $('input[name="chatsidechoice"]:checked').val();
	//piece together preferences
	popoutWindowpreferences = "width=" + inputwidth + ",height=" + inputheight + ",status=no,scrollbars=no,resizable=yes,location=no,menubar=no";
	/*DEBUG ONLY
	debug = "";
	debug += popoutWindowpreferences + "<br>";
	debug += input + " ";
	if(chatoption.checked) {debug += "with chat on " + chatsideoption + " side";} else {debug += "without chat";}
	document.getElementById('debugDIV').innerHTML = debug;
	*DEBUG END*/
	windowLink = "/frame/twitchframe.php?channel="+input+"&chat=";
	if(chatoption.checked) {
		windowLink = windowLink + chatsideoption;
	} else {
		windowLink = windowLink + "none";
	}
	popoutWindow = window.open(windowLink, "pmpopout", popoutWindowpreferences);
	popoutWindow.focus();
}
function ToggleChat(chatchoicedivvalue) {
	chatchoicediv = document.getElementById("chatsidediv");
	if(chatchoicedivvalue) {
		chatchoicediv.style.display="block";
	} else {
		chatchoicediv.style.display="none";
	}
}
</script>
<script src="assets/aspectratio.js"></script>
<script src="assets/radioValue.js"></script>
<script src="assets/OpenTextbox.js"></script>
</head>
<body>
<h1 id="title">Popout Maker - <span style="color:#aa00ff;font-weight:400;">Twitch</span></h1><hr>
<div id="main">
<p>Enter channel name here:<br>
<input type="text" name="popouturl" value="" id="popouturl" style="width:500px"></p>
<table>
	<tr>
		<td>Window width:</td>
		<td><input type="number" name="width" id="inputwidth" min="100" value="1280" oninput="aspectratio(this,'inputheight','keep169option',16);"></td>
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
	<input type="checkbox" name="showchatchoice" id="showchatchoice" onChange="ToggleChat(this.checked);" checked><label for="showchatchoice"> Show Chat</label>
	<div id="chatsidediv">
		<input type="radio" name="chatsidechoice" id="chatsideleft" value="left"><label for="chatsideleft"> Show chat on the left side</label><br>
		<input type="radio" name="chatsidechoice" id="chatsideright" value="right" checked><label for="chatsideright"> Show chat on the right side</label>
	</div>
</p>
<p>
	<input type="button" onclick="GeneratePopout();" value="Generate Popout"> frame.htm next
</p>
<p>Also check out:<br>
<a href="/youtube" style="color:inherit !important;text-decoration:none;">Popout Maker - <span style="font-weight:400;">You<span class="Tube">Tube</span></span></a></p>
<div id="debugDIV"></div>
<div id="footer">Made by <a href="http://twitter.com/Mitsunee">Mitsunee</a><span style="float:right;"><a href="/about" target="_blank">About</a> | Version: 1.0 (<a href="/changelog" target="_blank">changelog</a>)</span></div>
</body></html>