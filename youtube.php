<!DOCTYPE html>
<html>
<head>
<title>Popout Maker - YouTube</title>
<link href="https://fonts.googleapis.com/css?family=Exo+2:400,300,700" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="/assets/style.css">
<link rel="icon" href="/favicon.ico">
<link rel="shortcut icon" href="/favicon.ico">
<script src="/assets/googleanalytics.js"></script>
<script type="text/javascript">
function GeneratePopout() {
	//reset error divs
	document.getElementById("videoiderror").style.display="none";
	document.getElementById("playlistiderror").style.display="none";
	//Collect user input
	input = document.getElementById('popouturl').value;//Input URL
	doPlaylist = document.getElementById('playlisttrigger').checked;//Check Playlist option
	if(doPlaylist) {
		playlistType = radioValue(document.dummyform.includeplaylist);//Check which Playlist option
	}
	doAutoplay = document.getElementById('autoplayoption').checked;//Autoplay Option
	doAnnotations = document.getElementById('annotationsoption').checked;//Annotations Option
	doLooping = document.getElementById('loopoption').checked;//Looping Option
	inputWidth = document.getElementById('inputwidth').value;//Window width input
	inputHeight = document.getElementById('inputheight').value;//Window height input
	
	//
	popouturl = "http://www.youtube.com/";
	//select embed type
	if(doPlaylist) { 
		if(playlistType == "Watch Later") {
			popouturl += "v/";//we need Watch Later, so we gotta use the old stuff...
		} else {
			popouturl += "embed/";
		}
	} else {
		popouturl += "embed/";
	}
	//parse input
	inputVideoID = _GET("v",input);
	inputPlaylistID = _GET("list",input);
	//check if there is information missing
	if(!doPlaylist) if(!Boolean(inputVideoID)) {document.getElementById("videoiderror").style.display="block";return false;}
	if(doPlaylist) {
		if(playlistType=="Watch Later") if(!Boolean(inputVideoID)) {document.getElementById("videoiderror").style.display="block";return false;}
		if(playlistType=="Standard Playlist") if(!Boolean(inputPlaylistID)) {document.getElementById("playlistiderror").style.display="block";return false;}
	}
	//include video-ID if existent
	if(Boolean(inputVideoID)) popouturl += inputVideoID;
	//at least try to get fullscreen option :/
	popouturl += "?fs=1";
	//include playlist
	if(doPlaylist) {
		if(playlistType=="Standard Playlist") popouturl += "&list=" + inputPlaylistID;
		if(playlistType=="Watch Later") popouturl += "&list=WL";
	}
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
function _GET(needle,haystack) {//looks for variable needle in haystack
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
<script src="../assets/aspectratio.js"></script>
<script src="../assets/radioValue.js"></script>
<script src="../assets/OpenTextbox.js"></script>
</head>
<body>
<h1 id="title">Popout Maker - <span style="font-weight:400;">You<span class="Tube">Tube</span></span></h1><hr>
<div id="main">
<div class="errorwrapper" id="videoiderror" style="display:none;"><img src="../assets/warning.png" alt="!"><div>Couldn't find video ID.</div></div>
<div class="errorwrapper" id="playlistiderror" style="display:none;"><img src="../assets/warning.png" alt="!"><div>Couldn't find playlist ID. If there's no playlist in your url, please remove the checkmark below.</div></div>
<p><label>Enter your youtube url here:<br>
<input type="url" name="popouturl" value="" id="popouturl"></label></p>
<label><input type="checkbox" id="playlisttrigger" onChange="OpenTextbox(this,'playlisttriggerbox');"> Include Playlist</label>
<div id="playlisttriggerbox" style="display:none;"><form name="dummyform">
<fieldset>
<label><input type="radio" id="playlist1" name="includeplaylist" value="Standard Playlist" checked="checked"> Standard Playlist (use this if your playlist is included in the url)</label><br>
<label><input type="radio" id="playlist2" name="includeplaylist" value="Watch Later"> Include Watch Later Playlist </label><span class="note">*<br>The Watch Later Popout window uses the old flash player embed page, as the new one doesn't support the watch later playlist. Fullscreen is sadly not supported all the time.</span>
</fieldset></form></div>
<div id="advanced_options_closed" style="display:block;"><input type="button" style="background:url('../assets/expand.gif') 0px 4px no-repeat;padding-left:15px;border:0px;" value="More Options" onClick="OpenTextboxToggle('advanced_options_closed','advanced_options_open');"></div>
<div id="advanced_options_open" style="display:none;"><input type="button" style="background:url('../assets/collapse.gif') 0px 4px no-repeat;padding-left:15px;border:0px;" value="Less Options" onClick="OpenTextboxToggle('advanced_options_open','advanced_options_closed');"><p><label><input type="checkbox" id="autoplayoption" checked="checked"> Enable Autoplay</label><br>
<label><input type="checkbox" id="annotationsoption" checked="checked"> Enable Annotations</label><br>
<label><input type="checkbox" id="loopoption"> Enable Looping </label><span class="note">*<br>Loops single video or the playlist. When looping a single video, youtube creates a temporary playlist with the same video two times.</span></p>
<table><tr><td>Window width:</td><td><input type="number" name="width" id="inputwidth" min="100" value="1280" onChange="aspectratio(this,'inputheight','keep169option',16);"></td><td rowspan="2"><input type="checkbox" id="keep169option" name="keep169option" checked="checked">Keep 16:9 aspect ratio</tr>
<tr><td>Window height:</td><td><input type="number" name="height" id="inputheight" min="100" value="720" onChange="aspectratio(this,'inputwidth','keep169option',9);"></td></tr></table></div>
<p><input type="button" onclick="GeneratePopout();" value="Generate Popout"></p>
<p>Also check out:<br>
<a href="/twitch" style="color:#aa00ff !important;text-decoration:none;">Popout Maker - <span style="font-weight:400;">Twitch</span></span></a></p>
<p class="note" style="font-size:14px !important">Tip: Try using an external program, to make your popout windows 'always on top'.</p></div>
<div id="footer">Made by <a href="http://twitter.com/Mitsunee">Mitsunee</a><span style="float:right;"><a href="/about" target="_blank">About</a> | Version: 1.0 (<a href="/changelog" target="_blank">changelog</a>)</span></div>
</body></html>