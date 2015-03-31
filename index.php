<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>embedyou by enru</title>
<meta name="viewport" content="user-scalable=yes, width=device-width, maximum-scale=1.0" />
<meta name="author" content="Neill Russell" />
<meta name="keywords" content="embed youtube oembed javascript" />
<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet">
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="hero-unit">
			<h1>embedyou <abbr>by <a href="http://www.enru.co.uk">enru</a></abbr></h1>
		</div>
		<div class="content">
			<p>
			EmbedYou is some standalone JavaScript (&amp; a PHP script hosted here or on your own server) which will change any standard (anchor) link that is on your web page linking to a <a href="http://youtube.com">YouTube</a> or <a href="http://vimeo.com">Vimeo</a> video into the appropriate embed code to display the YouTube player.
			</p>
			<p>e.g.</p>
			<p>it will change this:</p>
<pre>
&lt;a href="http://www.youtube.com/watch?v=CrU8maUDQ70"/&gt;&lt;/a&gt;
</pre>
			<p>...into this:</p>
<pre>
&lt;object width=&quot;459&quot; height=&quot;344&quot;&gt;&lt;param name=&quot;movie&quot; value=&quot;http://www.youtube.com/v/CrU8maUDQ70?version=3&amp;feature=oembed&quot;&gt;&lt;/param&gt;&lt;param name=&quot;allowFullScreen&quot; value=&quot;true&quot;&gt;&lt;/param&gt;&lt;param name=&quot;allowscriptaccess&quot; value=&quot;always&quot;&gt;&lt;/param&gt;&lt;embed src=&quot;http://www.youtube.com/v/CrU8maUDQ70?version=3&amp;feature=oembed&quot; type=&quot;application/x-shockwave-flash&quot; width=&quot;459&quot; height=&quot;344&quot; allowscriptaccess=&quot;always&quot; allowfullscreen=&quot;true&quot;&gt;&lt;/embed&gt;&lt;/object&gt;
</pre>

<p>
You can add <code>width</code> and <code>height</code> parameters to the video URL to set the <strong>width</strong> and <strong>height</strong> properties on the resulting embed code.
</p>

			<p>
			<strong>To use EmbedYou</strong>, place the following code into your HTML somewhere after all of your YouTube links &amp; just before the closing &lt;/body&gt; tag.
			</p>
<pre>
&lt;script src="http://embedyou.enru.co.uk/embedyou.js" id="embedyou" &gt;&lt;/script&gt;
</pre>
			<p>
			EmbedYou was inspired by <a href="http://embedtweet.com/">embedtweet</a> &amp; uses <a href="http://oembed.com/">oEmbed</a>.
			It comes with no warranty &amp; it supplied as is.
			EmbedYou has a git repo on <a href="https://github.com/enru/embedyou">github</a>.
			</p>

		</div>
	</div>
	</body>
</html>


