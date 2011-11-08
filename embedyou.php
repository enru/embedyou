<?php

$js='';
if(isset($_REQUEST['url'])) {
	$url = parse_url($_REQUEST['url']);
	if(preg_match("/youtube.com$/", $url['host'])) {
		parse_str($url['query'], $qs);
		if(isset($qs['v'])) {
			$req = 'http://www.youtube.com/oembed?url='.urlencode($url['scheme'].'://'.$url['host'].'/watch?v='.$qs['v']);
			$res = file_get_contents($req);
			if($res) {
				$obj = 	json_decode($res);
				$js = "EmbedYou.load('embedyou_".$qs['v']."', '".$obj->html."')";
			}
		}
	}
}
header('Content-type: text/plain');
echo $js;
