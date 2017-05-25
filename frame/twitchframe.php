<?php
$err400="<h1>ERROR 400 - BAD REQUEST</h1>";
if(!isset($_GET['channel'])){http_response_code(400);die($err400);}
if(!isset($_GET['chat'])){http_response_code(400);die($err400);}
if(!in_array($_GET['chat'],array("none","left","right"))){http_response_code(400);die($err400);}
$channel=preg_replace("/[^a-z0-9_]+/i","",$_GET['channel']);
if($channel==""){http_response_code(400);die($err400);}
$chatoption=$_GET['chat'];
?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $channel;?> on twitch</title>
</head>
<body>
<iframe src="https://player.twitch.tv/channel=<?php echo $channel;?>"></iframe>
</body></html>