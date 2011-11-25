var EmbedYou = {
	regex: [
        /http(s)?:\/\/(www\.)?vimeo\.com\/([a-z0-9]+)/i
        ,/http(s)?:\/\/(www\.)?youtube\.com\/watch\?.*v=([a-z0-9]+)/i
        ,/http(s)?:\/\/(www\.)?youtu\.be\/([a-z0-9]+)/i
        /* ignore embed urls
        ,/http(s)?:\/\/(www\.)?youtube\.com\/v/([a-z0-9]+)/i
        ,/http(s)?:\/\/(www\.)?youtube\.com\/embed/([a-z0-9]+)/i
        */
	]
	,initCSS: function(url) {
		var head = document.getElementsByTagName("head")[0];
		var css = document.createElement("link");
		css.rel = 'stylesheet';
		css.href = this.embedUrl+"/embedyou.css";
		head.appendChild(css)
	}
    ,initPath: function() {
        var src = document.getElementById('embedyou').getAttribute('src');
        var path = src.split('/').slice(0,-1).join('/');
        if(path.length == 0) {
            path = document.URL.split('/').slice(0,-1).join('/');
        }
        this.embedUrl = path;
    }
	,init: function(embedUrl) {
        this.initPath();
		this.initCSS();
		var anchors = document.getElementsByTagName('a');
		for(var i=0; i < anchors.length; i++) {
			var a = anchors[i];
			for(var j=0; j<this.regex.length; j++) {
				var matches = a.href.match(this.regex[j]);
				if(matches) this.handle(a, "embedyou_"+matches[3]+"_"+i)
			}
		}
	}
	,handle: function(anchor, id) {
		this.append(anchor.href, id);
		anchor.id = id
	}
	,load: function(id, code) {
		var a = document.getElementById(id);
		var html = document.createElement('div');
		html.setAttribute('class', 'embedyou_wrapper');
		html.innerHTML = code;
		a.style.display = 'none';
		a.parentNode.insertBefore(html, a);
		var head = document.getElementsByTagName("head")[0];
		var script = document.getElementById(id+"_script");
		head.removeChild(script);
	}
	,append: function(url, id) {
		var head = document.getElementsByTagName("head")[0];
        	var script  = document.createElement("script");
			script.id = id+"_script";
        	script.type = "text/javascript";
        	script.src = this.embedUrl+"/embedyou.php?url="+encodeURIComponent(url)+"&id="+encodeURIComponent(id);
        	head.appendChild(script)
	}
}
EmbedYou.init();

