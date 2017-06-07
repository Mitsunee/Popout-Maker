<!DOCTYPE html><?php $self="youtube";
if(isset($_GET['link'])) $robotNoIndex = TRUE;?>
<html>
<head>
<title>Popout-Maker YouTube</title>
<?php require 'assets/inc/head.php';?>
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
	//enable fullscreen, disable autoplaying "related" videos
	popouturl += "?fs=1&rel=0";
	//include playlist
	if(doPlaylist) popouturl += "&listType=playlist&list=" + inputPlaylistID;
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
<?php require 'assets/inc/nav.php';?>
<hr style="clear:both;">
<main>
<noscript><div class="errorwrapper" id="noscripterror"><img src="/assets/warning.png" alt="!"><div>Javascript is disabled or not suppported by your browser</div></div></noscript>
<div class="errorwrapper" id="apilinkerror" style="display:none;"><img src="/assets/warning.png" alt="!"><div>API request made, but couldn't find valid youtube video or playlist URL.</div></div>
<div class="errorwrapper" id="videoiderror" style="display:none;"><img src="/assets/warning.png" alt="!"><div>Couldn't find video ID.</div></div>
<div class="errorwrapper" id="playlistiderror" style="display:none;"><img src="/assets/warning.png" alt="!"><div>Couldn't find playlist ID. If there's no playlist in your url, please remove the checkmark below.</div></div>
<form action="javascript:void(0);" onsubmit="GeneratePopout();return false;"><?php
//Prepare form values
$advOptions=FALSE;
if(isset($_GET['link'])) { //check if there is any input
	if(substr($_SERVER['REQUEST_URI'],0,9)=="/youtube/" && stripos($_SERVER['REQUEST_URI'],"/http") !== false) { //using rewritten URL
		$link = urldecode(substr($_SERVER['REQUEST_URI'],stripos($_SERVER['REQUEST_URI'],"/http")+1));//extracted youtube-URL
	} elseif(substr($_SERVER['REQUEST_URI'],0,13)=="/youtube.php?" && stripos($_SERVER['REQUEST_URI'],"=http") !== false) { //using direct file access
		$link = urldecode(substr($_SERVER['REQUEST_URI'],stripos($_SERVER['REQUEST_URI'],"=http")+1));//extracted youtube-URL
	} else {$link=false;}
	if($link) {//if there's an actual link, validate it
		if(stripos($link,"youtube.com") !== false) {//check if the url has youtube.com
			if(stripos($link,"?v=") !== false || stripos($link,"list=") !== false) {//check if there's either a video-ID or playlist-ID
				$_API_REQUEST['link'] = str_replace("\"","",$link);//insert valid url with removed double quotation marks
				if(stripos($link,"?v=" === false)&&stripos($link,"list=" !== false)) $_API_REQUEST['playlist']=true;//if link has a playlist, but no video, auto-enable playlists
			} else {$link=false;}
		} else {$link=false;}
	}
	if($link&&isset($_API_REQUEST)) {//check if a valid API-Request exists
		if(isset($_GET['popWidth'])&&isset($_GET['popHeight'])) {//check if width and height are given
			if(is_numeric($_GET['popWidth'])&&$_GET['popWidth']>=100&&is_numeric($_GET['popHeight'])&&$_GET['popHeight']>=100) {//check if given width and height are valid
				$_API_REQUEST['width']=$_GET['popWidth'];
				$_API_REQUEST['height']=$_GET['popHeight'];
				$advOptions=TRUE;
			}
		}
		if(isset($_GET['advOptions'])) {//check if options are given
			if(strpos($_GET['advOptions'],"A") !== false) $_API_REQUEST['advOptions']['autoplay']=true;
			if(strpos($_GET['advOptions'],"i") !== false) $_API_REQUEST['advOptions']['annotations']=true;
			if(strpos($_GET['advOptions'],"P") !== false) $_API_REQUEST['playlist']=true;
			if(strpos($_GET['advOptions'],"L") !== false) $_API_REQUEST['advOptions']['looping']=true;
			if(isset($_API_REQUEST['advOptions'])) $advOptions=TRUE;
		}
	}
}
?>	<p>Enter your youtube url here:<br>
	<input type="url" name="popouturl" value="<?php if(isset($_API_REQUEST['link'])) echo $_API_REQUEST['link'];?>" placeholder="http://www.youtube.com/watch?v=" id="popouturl"><br>
	<input type="checkbox" id="playlisttrigger" style="margin-top:8px;"<?php if(isset($_API_REQUEST)&&isset($_API_REQUEST['playlist'])) echo " checked"; ?>><label for="playlisttrigger">Include Playlist</label></p>
	<div id="advanced_options_closed" style="display:<?php if($advOptions==false) {echo "block";} else {echo "none";}?>;"><input type="button" class="shadow-on-hover expand" value="More Options" onClick="OpenTextboxToggle('advanced_options_closed','advanced_options_open');"></div>
	<div id="advanced_options_open" style="display:<?php if($advOptions==true) {echo "block";} else {echo "none";}?>;">
		<input type="button" class="shadow-on-hover collapse" value="Less Options" onClick="OpenTextboxToggle('advanced_options_open','advanced_options_closed');">
		<p>
			<input type="checkbox" id="autoplayoption"<?php if(isset($_API_REQUEST)&&!isset($_API_REQUEST['advOptions']['autoplay'])) echo " checked"; ?>><label for="autoplayoption">Enable Autoplay</label><br>
			<input type="checkbox" id="annotationsoption"<?php if(isset($_API_REQUEST)&&!isset($_API_REQUEST['advOptions']['annotations'])) echo " checked"; ?>><label for="annotationsoption">Enable Annotations</label><br>
			<input type="checkbox" id="loopoption"<?php if(isset($_API_REQUEST)&&isset($_API_REQUEST['advOptions']['looping'])) echo " checked"; ?>><label for="loopoption">Enable Looping </label><span class="note">*<br>
			Loops single video or the playlist. When looping a single video, youtube creates a temporary playlist with the same video two times.</span>
		</p>
		<table>
			<tr>
				<td>Window width:</td>
				<td><input type="number" name="width" id="inputwidth" min="100" value="<?php if(isset($_API_REQUEST['width'])) {echo $_API_REQUEST['width'];} else {echo 1280;} ?>" onChange="aspectratio(this,'inputheight','keep169option',16);"></td>
				<td rowspan="2"><input type="checkbox" id="keep169option" name="keep169option"<?php if(!isset($_API_REQUEST['width'])) echo " checked"; ?>><label for="keep169option">Keep 16:9 aspect ratio</label></td>
			</tr>
			<tr>
				<td>Window height:</td>
				<td><input type="number" name="height" id="inputheight" min="100" value="<?php if(isset($_API_REQUEST['height'])) {echo $_API_REQUEST['height'];} else {echo 720;} ?>" onChange="aspectratio(this,'inputwidth','keep169option',9);"></td>
			</tr>
		</table>
	</div>
	<p><input type="submit" value="Generate Popout"></p>
</form>
<?php require 'assets/inc/footer.php';?>