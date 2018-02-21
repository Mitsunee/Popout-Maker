<?php
$err400="<h1>ERROR 400 - BAD REQUEST</h1>";
if(!isset($_GET['v'])){http_response_code(400);die($err400);}
if(!isset($_GET['chat'])){http_response_code(400);die($err400);}
if(!in_array($_GET['chat'],array("none","left","right"))){http_response_code(400);die($err400);}

$videoid=preg_replace("/[^a-z0-9_-]+/i","",$_GET['v']);
if($videoid==""){http_response_code(400);die($err400);}

$chatoption=$_GET['chat'];
if($chatoption=="none") {
	$chat=false;
} else {
	$chat=true;
}

$thisDomain = "popoutmaker.mitsunee.com";
if(isset($_GET['dev'])) $thisDomain = "127.0.0.1";
?>
<!DOCTYPE html>
<html>
<head>
<title>YouTube Gaming</title>
<link rel="icon" href="/assets/ytg.ico">
<link rel="shortcut icon" href="/assets/ytg.ico">
<style>
body,html{margin:0px;padding:0px;height:100%;width:100%;overflow:hidden;}
iframe{border:0px;margin:0px;padding:0px;}
#ytg-player,#ytg-player > iframe{
	box-sizing:border-box;
	width:100% !important;
	height:100% !important;
}
#ytg-chat{
	height:100%;
	position:fixed;
	top:0px;
	width:402px;
}
#ytg-player.left{padding-left:402px;}
#ytg-chat.left{left:0px;}
#ytg-player.right{padding-right:402px;}
#ytg-chat.right{right:0px;}
</style>
</head>
<body>
<div id="ytg-player"<?php if($chat) echo ' class="'.$chatoption.'"'; ?>><iframe src="https://gaming.youtube.com/embed/<?php echo $videoid;?>?rel=0&fs=1&autoplay=1&loop=0" allow="autoplay; encrypted-media" allowfullscreen></iframe></div>

<!--<iframe width="1041" height="586" src="https://gaming.youtube.com/embed/-O2S1U-_Cik" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>-->

<?php
// chat: https://www.youtube.com/live_chat?v=$VIDEOID&is_popout=1
if($chat) {
	echo '<iframe src="https://www.youtube.com/live_chat?v='.$videoid.'&embed_domain='.$thisDomain.'" id="ytg-chat" class="'.$chatoption.'"></iframe>';
}
?>
</body></html>