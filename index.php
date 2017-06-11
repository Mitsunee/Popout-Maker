<!DOCTYPE html><?php $self="index";
if(isset($_GET['link'])) $robotNoIndex = TRUE;?>
<html>
<head>
<title>Popout-Maker</title>
<?php require 'assets/inc/head.php';?>
<script type="text/javascript">
function GeneratePopout() {
	//reset error divs
	document.getElementById("linkemptyerror").style.display="none";
	//get input
	input = document.getElementById('popouturl').value.trim();
	if(input==""||input=="http://"||input=="https://") {
		document.getElementById("linkemptyerror").style.display="block";
		return false;
	}
	httpcheck = input.substring(0,7);
	httpscheck = input.substring(0,8);
	inputwidth = document.getElementById('inputwidth').value;
	inputheight = document.getElementById('inputheight').value;
	scrollbarsoption = document.getElementById('scrollbarsoption');
	if (httpcheck != "http://") if (httpscheck != "https://") input = "http://" + input;
	if (scrollbarsoption.checked == true) {
		scrollbars = "no";
	}else{
		scrollbars = "yes";
	}
	popoutWindowpreferences = "width=" + inputwidth + ",height=" + inputheight + ",status=no,scrollbars=" + scrollbars + ",resizable=yes,location=no,menubar=no";
	//document.getElementById('debugDIV').innerHTML = popoutWindowpreferences;
	popoutWindow = window.open(input, "pmpopout", popoutWindowpreferences);
	popoutWindow.focus();
}
</script>
</head>
<body>
<header><img src="/assets/icon64.gif" alt="Icon"><span>Popout-Maker</span></header>
<?php require 'assets/inc/nav.php';?>
<hr style="clear:both;">
<main>
<noscript><div class="errorwrapper" id="noscripterror"><img src="/assets/warning.png" alt="!"><div>Javascript is disabled or not suppported by your browser</div></div></noscript>
<div class="errorwrapper" id="linkemptyerror" style="display:none;"><img src="/assets/warning.png" alt="!"><div>You must enter a URL to open.</div></div>
<form action="javascript:void(0);" onsubmit="GeneratePopout();return false;"><?php
//Prepare form values
if(isset($_GET['link'])) {
	require 'assets/inc/fixGETlink.php';
	$_API_REQUEST = fixGETlink($_GET);
	if(substr($_SERVER['REQUEST_URI'],0,5)=="/link" && strpos($_SERVER['REQUEST_URI'],"?") !== false) //was rewritten and is missing data in $_GET
		$_API_REQUEST['link'] = urldecode(substr($_SERVER['REQUEST_URI'],stripos($_SERVER['REQUEST_URI'],"/http")+1)); //replacing 'link' with the correct version taken from the REQUEST_URI
}
?>	<p>Enter your url here:<br>
		<input type="text" name="popouturl" value="<?php if(isset($_API_REQUEST['link'])) echo str_replace("\"","",$_API_REQUEST['link']);?>" placeholder="http://" id="popouturl" style="width:500px" autofocus></p>
	<div id="advanced_options_closed" style="display:<?php if(!isset($_API_REQUEST)) {echo "block";} else {echo "none";}?>;"><input type="button" class="shadow-on-hover expand" value="More Options" onClick="OpenTextboxToggle('advanced_options_closed','advanced_options_open');"></div>
	<div id="advanced_options_open" style="display:<?php if(isset($_API_REQUEST)) {echo "block";} else {echo "none";}?>;">
		<input type="button" class="shadow-on-hover collapse" value="Less Options" onClick="OpenTextboxToggle('advanced_options_open','advanced_options_closed');">
		<table>
			<tr>
				<td>Window width:</td>
				<td><input type="number" name="width" id="inputwidth" min="100" value="<?php if(isset($_API_REQUEST)&&isset($_API_REQUEST['popWidth'])&&is_numeric($_API_REQUEST['popWidth'])&&$_API_REQUEST['popWidth']>=100) {echo $_API_REQUEST['popWidth'];}else{;echo 1280;}?>" oninput="aspectratio(this,'inputheight','keep169option',16);"></td>
				<td rowspan="2"><input type="checkbox" id="keep169option" name="keep169option"><label for="keep169option">Keep 16:9 aspect ratio</label></td>
			</tr>
			<tr>
				<td>Window height:</td>
				<td><input type="number" name="height" id="inputheight" min="100" value="<?php if(isset($_API_REQUEST)&&isset($_API_REQUEST['popHeight'])&&is_numeric($_API_REQUEST['popHeight'])&&$_API_REQUEST['popHeight']>=100) {echo $_API_REQUEST['popHeight'];}else{;echo 720;}?>" oninput="aspectratio(this,'inputwidth','keep169option',9);"></td>
			</tr>
		</table>
		<p><input type="checkbox" id="scrollbarsoption" name="scrollbarsoption"<?php if(isset($_API_REQUEST)&&isset($_API_REQUEST['noscroll'])) echo " checked"; ?>><label for="scrollbarsoption">Disable Scrollbars </label><span class="note">Firefox &amp; IE only</span></p>
		<p class="note">Note that all things changed in here, will still be applied, even if you hide these options again.</p>
	</div>
	<p><input type="submit" value="Generate Popout"><!-- <input type="button" value="Generate Preset" class="like-submit" style="display:inline-block;" onclick="this.style.display='none';return false;">--></p>
</form>
<?php require 'assets/inc/footer.php';?>