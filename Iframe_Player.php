<?php

/*
 ┌─────────────────────────────────────────────────────────────┐
 |  For More Modules Or Updates Stay Connected to Kodi dot AL  |
 └─────────────────────────────────────────────────────────────┘
 ┌───────────┬─────────────────────────────────────────────────┐
 │ Product   │ ipcamlive.com Stream Extractor By Alias [ID]    │
 │ Version   │ v1.0-FREE                                       │
 │ Provider  │ https://www.ipcamlive.com/                      │
 │ Support   │ Iframe Player by ID                             │
 │ Licence   │ MIT                                             │
 │ Author    │ Olsion Bakiaj                                   │
 │ Email     │ TRC4@USA.COM                                    │
 │ Author    │ Endrit Pano                                     │
 │ Email     │ INFO@ALBDROID.AL                                │
 │ Website   │ https://kodi.al                                 │
 │ Facebook  │ /albdroid.official/                             │
 │ Github    │ github.com/SxtBox/                              │
 │ Created   │ 16 November 2020                                │
 └─────────────────────────────────────────────────────────────┘
*/

/*
 TO GET STREAM REQUIRED ONLY THE Alias ID => ?id=+alias
 DIRECT LINK http://ipcamlive.com/player/player.php?alias=599eeee0b0b89
 DIFFERENT PLAYER HOST g1 g2 g3 ETC
 http://g1.ipcamlive.com/player/player.php?alias=5aea0a2674e5d
 http://g1.ipcamlive.com/player/player.php?alias=5aea0854caea0
*/

error_reporting(0);
date_default_timezone_set("Europe/Tirane");
$alias = isset($_GET['id']) && !empty($_GET['id']) ? $_GET['id'] : "599eeee0b0b89"; // << alias
$source = file_get_contents(trim('https://ipcamlive.com/player/player.php?alias='.$alias));
$debug = "&debug=0"; // 1 OR 0 DEFAULT IS ZERO
$autoplay = "autoplay=1"; // 1 OR ZERO
$token = "token="; // DO NOT TOUCH IT
$player_php = "https://ipcamlive.com/player/player.php?alias=";
		if(preg_match("/var alias = '(.*?)'/",$source,$alias_matches))
		{
			$streamid = $alias_matches[1];
		}
		if(preg_match("/var token = '(.*?)'/",$source,$token_matches))
		{
			$get_token = $token_matches[1];
		}
$stream_url = $player_php.$streamid."&".$autoplay."&".$token.$get_token.$debug;
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Albdroid Webcam Streaming</title>
<link rel="shortcut icon" href="https://www.ipcamlive.com/tpls2/img/ipcamlive_favicon_128.png"/>
<link rel="icon" href="https://www.ipcamlive.com/tpls2/img/ipcamlive_favicon_128.png"/>
</head>
<style type="text/css">
body,td,th {
	color: #0F0;
}
body {
	background-color: #000;
}
</style>
<iframe allowfullscreen="" frameborder="0" height="100%" src="<?php echo $stream_url; ?>" width="100%">
</iframe>
</html>