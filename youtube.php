<!DOCTYPE html><?php $self="youtube";?>
<html>
<head>
<title>Popout-Maker YouTube</title>
<?php require '/assets/inc/head.php';?>
<script type="text/javascript">
function GeneratePopout() {
	//reset error divs
	document.getElementById("videoiderror").style.display="none";
	document.getElementById("playlistiderror").style.display="none";
	//Collect user input
	input = document.getElementById('popouturl').value;//Input URL
	doPlaylist = document.getElementById('playlisttrigger').checked;//Check Playlist option
	doAutoplay = document.getElementById('autoplayoption').checked;//Autoplay Option
	doAnnotations = document.getElementById('annotationsoption').checked;//Annotations Option
	doLooping = document.getElementById('loopoption').checked;//Looping Option
	inputWidth = document.getElementById('inputwidth').value;//Window width input
	inputHeight = document.getElementById('inputheight').value;//Window height input
	
	//
	popouturl = "http://www.youtube.com/embed/";
	//parse input
	inputVideoID = _GET("v",input);
	inputPlaylistID = _GET("list",input);
	//check if there is information missing
	if(!doPlaylist) {
		if(!Boolean(inputVideoID)) {
			document.getElementById("videoiderror").style.display="block";
			return false;
		}
	} else {
		if(!Boolean(inputPlaylistID)) {
			document.getElementById("playlistiderror").style.display="block";
			return false;
		}
	}
	//include video-ID if existent
	if(Boolean(inputVideoID)) popouturl += inputVideoID;
	//at least try to get fullscreen option :/
	popouturl += "?fs=1";
	//include playlist
	if(doPlaylist) popouturl += "&list=" + inputPlaylistID;
	//include other options: Autoplay, Annotations, Looping
	if(doAnnotations) {popouturl += "&iv_load_policy=1";}else{popouturl += "&iv_load_policy=3";}
	if(doAutoplay) {popouturl += "&autoplay=1";}else{popouturl += "&autoplay=0";}
	if(doLooping) {
		popouturl += "&loop=1";
		if(!doPlaylist) popouturl += "&playlist=" + inputVideoID;
	} else {
		popouturl += "&loop=0";
	}
	//generate the popout window
	popoutWindow = window.open(popouturl, "ytpopout", "width=" + inputWidth + ",height=" + inputHeight + ",status=no,scrollbars=yes,resizable=yes,location=no,menubar=no");
	popoutWindow.focus();
}
function _GET(needle,haystack) {//looks for variable needle in haystack (haystack is also a hopefully valid youtube link)
	needle += "=";
	LF = haystack.indexOf(needle);
	if(LF==-1) return 0;
	LFb = haystack.indexOf("&",LF);
	LFc = haystack.indexOf("#",LF);
	if(LFb!=-1) {
		stopAt = LFb;
	} else if(LFc!=-1) {
		stopAt = LFc;
	} else {
		stopAt = haystack.length;
	}
	startAt = LF + needle.length;
	return haystack.substring(startAt,stopAt);
}
</script>
</head>
<body>
<header><img src="/assets/icon64yt.png" alt="Icon"><span>Popout-Maker </span><img src="/assets/logo32yt.png" alt="YouTube"></header>
<?php require '/assets/inc/nav.php';?>
<hr style="clear:both;">
<main>
<noscript><div class="errorwrapper" id="noscripterror"><img src="/assets/warning.png" alt="!"><div>Javascript is disabled or not suppported by your browser</div></div></noscript>
<div class="errorwrapper" id="videoiderror" style="display:none;"><img src="/assets/warning.png" alt="!"><div>Couldn't find video ID.</div></div>
<div class="errorwrapper" id="playlistiderror" style="display:none;"><img src="/assets/warning.png" alt="!"><div>Couldn't find playlist ID. If there's no playlist in your url, please remove the checkmark below.</div></div>
<form action="javascript:void(0);" onsubmit="GeneratePopout();return false;">
	<p>Enter your youtube url here:<br>
	<input type="url" name="popouturl" value="" placeholder="http://www.youtube.com/watch?v=" id="popouturl"><br>
	<input type="checkbox" id="playlisttrigger" style="margin-top:8px;"><label for="playlisttrigger">Include Playlist</label></p>
	<div id="advanced_options_closed" style="display:block;"><input type="button" class="shadow-on-hover expand" value="More Options" onClick="OpenTextboxToggle('advanced_options_closed','advanced_options_open');"></div>
	<div id="advanced_options_open" style="display:none;">
		<input type="button" class="shadow-on-hover collapse" value="Less Options" onClick="OpenTextboxToggle('advanced_options_open','advanced_options_closed');">
		<p>
			<input type="checkbox" id="autoplayoption" checked="checked"><label for=autoplayoption">Enable Autoplay</label><br>
			<input type="checkbox" id="annotationsoption" checked="checked"><label for="annotationsoption">Enable Annotations</label><br>
			<input type="checkbox" id="loopoption"><label for="loopoption">Enable Looping </label><span class="note">*<br>
			Loops single video or the playlist. When looping a single video, youtube creates a temporary playlist with the same video two times.</span>
		</p>
		<table>
			<tr>
				<td>Window width:</td>
				<td><input type="number" name="width" id="inputwidth" min="100" value="1280" onChange="aspectratio(this,'inputheight','keep169option',16);"></td>
				<td rowspan="2"><input type="checkbox" id="keep169option" name="keep169option" checked="checked"><label for="keep169option">Keep 16:9 aspect ratio</label></td>
			</tr>
			<tr>
				<td>Window height:</td>
				<td><input type="number" name="height" id="inputheight" min="100" value="720" onChange="aspectratio(this,'inputwidth','keep169option',9);"></td>
			</tr>
		</table>
	</div>
	<p><input type="submit" value="Generate Popout"></p>
</form>
<?php require '/assets/inc/footer.php';?>