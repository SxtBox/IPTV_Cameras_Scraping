<?php

/*
 ┌─────────────────────────────────────────────────────────────┐
 |  For More Modules Or Updates Stay Connected to Kodi dot AL  |
 └─────────────────────────────────────────────────────────────┘
 ┌───────────┬─────────────────────────────────────────────────┐
 │ Product   │ ipcamlive.com Stream Extractor By Alias [ID]    │
 │ Version   │ v1.0-FREE                                       │
 │ Provider  │ https://www.ipcamlive.com/                      │
 │ Support   │ Clappr Player by ID                             │
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
		if(preg_match("/var address = '(.*?)'/",$source,$match))
		{
			$stream = $match[1];
			$stream = str_replace('http','https',$stream);
		}
		if(preg_match("/var streamid = '(.*?)'/",$source,$streamid_match))
		{
			$streamid = $streamid_match[1];
			$streamid = str_replace('','',$streamid);
		}
$stream_url = $stream."streams/".$streamid."/stream.m3u8";
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Albdroid Webcam Streaming</title>
<link rel="shortcut icon" href="https://www.ipcamlive.com/tpls2/img/ipcamlive_favicon_128.png"/>
<link rel="icon" href="https://www.ipcamlive.com/tpls2/img/ipcamlive_favicon_128.png"/>
<script src="https://cdn.jsdelivr.net/clappr/latest/clappr.min.js"></script>
</head>
<style type="text/css">
body,td,th {
	color: #0F0;
}
body {
	background-color: #000;
}
</style>
<body>
        <div id="player" style="width:100%; height:100%">
            </div>
            <script>
                var player = new Clappr.Player({
                        source: "<?php echo ($stream_url) ?>",
                        parentId: "#player",
                        width:'100%',
                        height:'100%',
                        autoPlay: false,
                });
            </script>
    </body>
</html>