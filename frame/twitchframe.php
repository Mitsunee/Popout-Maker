<?php
$err400="<h1>ERROR 400 - BAD REQUEST</h1>";
if(!isset($_GET['channel'])){http_response_code(400);die($err400);}
if(!isset($_GET['chat'])){http_response_code(400);die($err400);}
if(!in_array($_GET['chat'],array("none","left","right"))){http_response_code(400);die($err400);}
$channel=preg_replace("/[^a-z0-9_]+/i","",$_GET['channel']);
if($channel==""){http_response_code(400);die($err400);}
$chatoption=$_GET['chat'];
if($chatoption=="none") {$chat=false;}else{$chat=true;}
?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $channel;?> on twitch</title>
<link rel="icon" href="/assets/glitch.ico">
<link rel="shortcut icon" href="/assets/glitch.ico">
<style>
body,html{margin:0px;padding:0px;height:100%;width:100%;overflow:hidden;}
iframe{border:0px;margin:0px;padding:0px;}
#twitch-player{
	box-sizing:border-box;
	width:100%;
	height:100%;
}
#twitch-chat{
	height:100%;
	position:fixed;
	top:0px;
	width:340px;
}
#twitch-player.left{padding-left:340px;}
#twitch-chat.left{left:0px;}
#twitch-player.right{padding-right:340px;}
#twitch-chat.right{right:0px;}
</style>
</head>
<body>
<iframe src="https://player.twitch.tv/?channel=<?php echo $channel;?>" id="twitch-player"<?php if($chat) echo ' class="'.$chatoption.'"'; ?>></iframe>
<?php if($chat) echo '<iframe src="https://www.twitch.tv/'.$channel.'/chat?popout=" id="twitch-chat" class="'.$chatoption.'"></iframe>';?>
</body></html>