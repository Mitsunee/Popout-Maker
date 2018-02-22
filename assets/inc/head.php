<meta charset="utf-8">
<meta name="author" content="Mitsunee">
<meta name="description" content="<?php
$metaDescription = "Popout-Maker";
if($self=="twitch") $metaDescription .= " Twitch";
if($self=="youtube") $metaDescription .= " YouTube";
if($self=="ytg") $metaDescription .= " YouTube Gaming";
$metaDescription .= " is a small utility made to have an easy way to open a ";
if($self=="index") $metaDescription .= "page";
if($self=="youtube") $metaDescription .= "youtube video";
if($self=="ytg") $metaDescription .= "youtube livestream";
if($self=="twitch") $metaDescription .= "twitchTV livestream";
$metaDescription .= " inside of a popup window.";
echo $metaDescription;
?>">
<?php if(isset($robotNoIndex)) echo "<meta name=\"robots\" content=\"NOINDEX\">".PHP_EOL;?>
<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="Popout-Maker<?php
	if($self=="twitch") echo" Twitch";
	if($self=="youtube") echo " YouTube";
	if($self=="ytg") echo " YouTube Gaming";
?>">
<meta name="twitter:description" content="<?php echo $metaDescription;?>">
<meta name="twitter:image" content="/assets/icon64.png">
<meta name="twitter:creator" content="@Mitsunee">
<meta property="og:title" content="Popout-Maker<?php
	if($self=="twitch") echo" Twitch";
	if($self=="youtube") echo " YouTube";
	if($self=="ytg") echo " YouTube Gaming";
?>">
<meta property="og:image" content="/assets/icon64.png">
<meta property="og:description" content="<?php echo $metaDescription;?>">
<link rel="stylesheet" href="/assets/style.css" type="text/css">
<link rel="icon" href="/favicon.ico">
<link rel="shortcut icon" href="/favicon.ico">
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="/assets/aspectratio.js"></script>
<script src="/assets/ToggleDarkmode.js"></script>
<?php
if($self=="twitch"||$self=="ytg") echo "<script src=\"/assets/radioValue.js\"></script>\n";
if($self=="index"||$self=="youtube") echo "<script src=\"/assets/OpenTextbox.js\"></script>\n"; 
if($self=="youtube"||$self=="ytg") echo "<script src=\"/assets/_GET.js\"></script>\n";?>