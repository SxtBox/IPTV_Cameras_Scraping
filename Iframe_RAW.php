<?php

/*
 ┌─────────────────────────────────────────────────────────────┐
 |  For More Modules Or Updates Stay Connected to Kodi dot AL  |
 └─────────────────────────────────────────────────────────────┘
 ┌───────────┬─────────────────────────────────────────────────┐
 │ Product   │ ipcamlive.com Stream Extractor By Alias [ID]    │
 │ Version   │ v1.0-FREE                                       │
 │ Provider  │ https://www.ipcamlive.com/                      │
 │ Support   │ Iframe RAW by ID                                │
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
$debug = "&debug=0"; // 1 or 0 default is zero
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
echo $stream_url;
?>