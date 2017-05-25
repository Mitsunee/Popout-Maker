<!DOCTYPE html><?php $self="index";?>
<html>
<head>
<title>Popout-Maker</title>
<link rel="stylesheet" href="/assets/style.css" type="text/css">
<link rel="icon" href="/favicon.ico">
<link rel="shortcut icon" href="/favicon.ico">
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script type="text/javascript">
function GeneratePopout() {
	input = document.getElementById('popouturl').value.trim();
	if(input=="") return false;
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
<script src="assets/aspectratio.js"></script>
<script src="assets/radioValue.js"></script>
<script src="assets/OpenTextbox.js"></script>
</head>
<body>
<h1 id="title">Popout Maker</h1><hr>
<div id="main">
<p>Enter your url here:<br>
<input type="url" name="popouturl" value="" id="popouturl"></p>
<div id="advanced_options_closed" style="display:block;"><input type="button" style="background:url('assets/expand.gif') 0px 4px no-repeat;padding-left:15px;border:0px;" value="More Options" onClick="OpenTextboxToggle('advanced_options_closed','advanced_options_open');"></div>
<div id="advanced_options_open" style="display:none;">
	<input type="button" style="background:url('assets/collapse.gif') 0px 4px no-repeat;padding-left:15px;border:0px;" value="Less Options" onClick="OpenTextboxToggle('advanced_options_open','advanced_options_closed');">
	<table>
		<tr>
			<td>Window width:</td>
			<td><input type="number" name="width" id="inputwidth" min="100" value="1280" oninput="aspectratio(this,'inputheight','keep169option',16);"></td>
			<td rowspan="2"><input type="checkbox" id="keep169option" name="keep169option">Keep 16:9 aspect ratio</td>
		</tr>
		<tr>
			<td>Window height:</td>
			<td><input type="number" name="height" id="inputheight" min="100" value="720" oninput="aspectratio(this,'inputwidth','keep169option',9);"></td>
		</tr>
	</table>
	<p><label><input type="checkbox" id="scrollbarsoption" name="scrollbarsoption"> Disable Scrollbars </label><span class="note">Firefox & IE only</span></p>
	<p class="note">Note that all things changed in here, will still be applied, even if you hide these options again.</p>
</div>
<p><input type="button" onclick="GeneratePopout();" value="Generate Popout"></p>
<?php require '/assets/inc/footer.php';?>