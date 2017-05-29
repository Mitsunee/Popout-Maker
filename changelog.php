<!DOCTYPE html><?php $self="changelog";?>
<html>
<head>
<title>Popout-Maker Changelog</title>
<link href='https://fonts.googleapis.com/css?family=Exo+2:400,300,700' rel='stylesheet' type='text/css'>
<link rel="icon" href="/favicon.ico">
<link rel="shortcut icon" href="/favicon.ico">
<style>
h2 {
	font-weight:400;
	margin-bottom:2px;
}
.description,.date {
	font-style:italic;
	font-weight:300;
	font-size:14px;
}
.date {
	margin-bottom:10px;
}
</style>
</head>
<body>
<h1 id="title">Popout Maker - Changelog</h1>
<div id="main">
<h2>1.1+</h2>
<div class="date">2017</div>
<div class="description">Changelog moved to Github</div>
<ul>
	<li><a href="https://github.com/Mitsunee/Popout-Maker/commits/master">https://github.com/Mitsunee/Popout-Maker/commits/master</a></li>
</ul>
<h2>1.0</h2>
<div class="date">04-13-2016</div>
<div class="description">Finally got the new domain.</div>
<h2>RC1</h2>
<div class="date">04-02-2016</div>
<div class="description">Implementing the last few things I wanted the Popoutmaker to have and more improvements suggested by beta-testers</div>
<ul>
	<li>completly remade the youtube version and it now supports playlist links without any video-id in it, unless it's the watch later playlist<ul><li>Sadly the reason it doesn't work with the watch later playlist is google's fault, because none of the embed player support the playlist, unless opened together with a valid video-id</li></ul></li>
	<li>&quot;lol nice idea&quot; is very good feedback</li>
	<li>Added &lt;label&gt; tags</li>
	<li class="note" style="font-size:14px !important;">Planned:<ul><li>Support for presetting options via GET variables</li></ul></li>
</ul>
<h2>beta Version 1.2</h2>
<div class="date">03-27-2016</div>
<div class="description">First major upgrade (and hopefully the last closed beta patch)</div>
<ul>
	<li>Added Option to disable scrollbars in the general purpose version</li>
	<li>Added checks that prevent errors, when no url was given</li>
	<li>Fixed typo in the link to the script for Google Analytics</li>
	<li>Moved functions that where used in both version to their own *.js-files</li>
	<li>Added an optinal function to keep 16:9 aspect ratio, when setting the window size.</li>
	<li>Advanced options are now hidden on default. They will always apply, even when changed and hidden again!</li>
	<li>Started a list of apps and programs, that work well together with Popout Maker in the About section</li>
	<li>Added a favicon</li>
</ul>
<h2>beta Version 1.1.3</h2>
<div class="date">03-26-2016</div>
<div class="description">I accidentally overwrote the line that opens the popout window in the youtube version with the one from the standalone version, when I added the window size options. This update should fix that.</div>
<ul>
	<li>Fixed YouTube Popout Maker opening the standard watch page instead of what it's supposed to do</li>
	<li>Removed Herobrine</li>
</ul>
<h2>beta Version 1.1.2</h2>
<div class="date">03-26-2016</div>
<div class="description">Added Google Analytics and About section</div>
<ul>
	<li>Added Google Analytics</li>
	<li>Added About page</li>
	<li>Removed Herobrine</li>
</ul>
<h2>beta Version 1.1.1</h2>
<div class="date">03-26-2016</div>
<span class="description">Another quick update that added the standalone version for general usage and adjustable window width and height (Note that the popout are always spawned with resizable=yes)</span>
<ul>
	<li>Added Standalone version for general use<ul>
		<li>This version automatically adds &quot;http://&quot;, when neither &quot;http://&quot; nor &quot;https://&quot; where entered.</li></ul></li>
	<li>Added link to the YouTube version to the page of the general usage version</li>
	<li>Added inputs for window width and height</li>
</ul>
<h2>beta Version 1.1</h2>
<div class="date">03-25-2016</div>
<span class="description">This version was released in the closed beta and has one improvement suggested by a tester.</span>
<ul>
	<li>Added Option for disabling Autoplay</li>
	<li>Added Changelog</li>
	<li>Removed Herobrine</li>
</ul>
<h2>beta Version 1.0</h2>
<div class="date">03-24-2016</div>
<span class="description">Intial release of the YouTube Popout Maker</span>
<ul>
	<li>Added input field</li>
	<li>Added Options for including playlists
	<ul>
		<li>Options for including playlists are 'Standard Playlists' and 'Watch Later'<ul>
			<li>Watch Later uses the old flash-player embed page, due to the new page not supporting the feature properly.</li>
		</ul></li>

	</ul></li>
	<li>Removed Herobrine</li>
</ul>
</div>
</body>
</html>