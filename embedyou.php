<?php

function url_ok($url) {

    $regexs = array(
            "/http(s)?:\/\/(www\.)?\youtube\.com\/watch\?.*v=([a-z0-9]+)/i"
            ,"/http(s)?:\/\/(www\.)?\youtu\.be\/([a-z0-9]+)/i"
            /* ignore embed urls
            ,"/http(s)?:\/\/(www\.)?\youtube\.com\/v/([a-z0-9]+)/i"
            ,"/http(s)?:\/\/(www\.)?\youtube\.com\/embed/([a-z0-9]+)/i"
            */
    );

    foreach($regexs as $re) {
        $matches = array();
        echo $re;
        echo "<br/>\n";
	    if(preg_match($re, $url, $matches)) return true;
    }

    return false;
}

$js='';
if(isset($_REQUEST['url'])) {
	$url = parse_url($_REQUEST['url']);
	//if(url_ok($url['host'])) {
    if(preg_match("/(youtube.com|youtu.be)$/", $url['host'])) {
		parse_str($url['query'], $qs);
		if(isset($qs['v'])) {
            $id = 'embedyou_'.$qs['v'];
            if(isset($_GET['id']) && preg_match("/^[a-zA-Z0-9_]+$/", $_GET['id'])) $id = $_GET['id'];
			$req = 'http://www.youtube.com/oembed?url='.urlencode($_GET['url']);
			$res = file_get_contents($req);
			if($res) {
				$obj = 	json_decode($res);
				$js = "EmbedYou.load('".$id."', '".$obj->html."')";
			}
		}
	}
}
header('Content-type: text/plain');
echo $js;
