<?php
$js='';
if(isset($_REQUEST['url'])) {
	$url = parse_url($_REQUEST['url']);
    $matches = array();
    if(preg_match("/(youtube.com|youtu.be|vimeo.com)$/", $url['host'], $matches)) {
        $host = $matches[1];
        parse_str($url['query'], $qs);
        switch($host) {
            case 'youtu.be':
            case 'youtube.com':
                if(isset($qs['v'])) $id = 'embedyou_'.$qs['v'];
                $query = array('url' => $_GET['url']);
                if(isset($qs['width'])) $query['maxwidth'] = filter_var($qs['width'], FILTER_VALIDATE_INT);
                if(isset($qs['height'])) $query['maxheight'] = filter_var($qs['height'], FILTER_VALIDATE_INT);
                $req = 'http://www.youtube.com/oembed?'.http_build_query($query);
                break;
            case 'vimeo.com':
                $query = array('url' => $_GET['url']);
                if(isset($qs['width'])) $query['width'] = filter_var($qs['width'], FILTER_VALIDATE_INT);
                if(isset($qs['height'])) $query['height'] = filter_var($qs['height'], FILTER_VALIDATE_INT);
                $req = 'http://vimeo.com/api/oembed.json?'. http_build_query($query);
                break;
            default:
                break;
        }
        if(isset($_GET['id']) && preg_match("/^[a-zA-Z0-9_]+$/", $_GET['id'])) $id = $_GET['id'];
        if($req) {
			$res = file_get_contents($req);
			if($res) {
				$obj = 	json_decode($res);
				$js = "EmbedYou.load('".$id."', '".$obj->html."')";
			}
		}
	}
}
if(strlen($js) < 1) header("HTTP/1.0 404 Not Found"); 
else { header('Content-type: text/plain'); echo $js; }
exit;

