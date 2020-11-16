<?php

/*
 ┌─────────────────────────────────────────────────────────────┐
 |  For More Modules Or Updates Stay Connected to Kodi dot AL  |
 └─────────────────────────────────────────────────────────────┘
 ┌───────────┬─────────────────────────────────────────────────┐
 │ Product   │ ipcamlive.com Stream Extractor By Alias [ID]    │
 │ Version   │ v1.0-FREE                                       │
 │ Provider  │ https://www.ipcamlive.com/                      │
 │ Support   │ VLC Player by ID                                │
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
error_reporting(0);
date_default_timezone_set("Europe/Tirane");
$alias = isset($_GET['id']) && !empty($_GET['id']) ? $_GET['id'] : "599eeee0b0b89"; // << alias
$source = file_get_contents(trim('https://ipcamlive.com/player/player.php?alias='.$alias));
		if(preg_match("/var address = '(.*?)'/",$source,$match))
		{
			$stream = $match[1];
			$stream = str_replace('http','https',$stream);
		}
		if(preg_match("/var streamid = '(.*?)'/",$source,$streamid_match))
		{
			$streamid = $streamid_match[1];
		}
		if(preg_match("/title>(.*\w)</",$source,$title_match))
		{
			$title = $title_match[1];
		}
$stream_url = $stream."streams/".$streamid."/stream.m3u8";
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');
echo("#EXTM3U Albdroid Webcam Streaming"."\n");
echo "#EXTINF:-1," . $title . "\n";
echo $stream_url;
?>