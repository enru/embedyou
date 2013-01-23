embedyou
========

creates youtube embeds from links to youtube vids

[Permalink](http://embedyou.herokuapp.com/ "Permalink to embedyou by enru")

# embedyou by enru

# embedyou by [enru][1]

EmbedYou is some standalone JavaScript (&amp; a PHP script hosted on heroku or on your own server) which will change any standard (anchor) link that is on your web page linking to a [YouTube][2] or [Vimeo][3] video into the appropriate embed code to display the YouTube player. 

e.g.

it will change this:

    <a href="http://www.youtube.com/watch?v=CrU8maUDQ70"/></a>

...into this:

    <object width="459" height="344"><param name="movie" value="http://www.youtube.com/v/CrU8maUDQ70?version=3&feature=oembed"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube.com/v/CrU8maUDQ70?version=3&feature=oembed" type="application/x-shockwave-flash" width="459" height="344" allowscriptaccess="always" allowfullscreen="true"></embed></object>
    
**To use EmbedYou**, place the following code into your HTML somewhere after all of your YouTube links &amp; just before the closing  tag. 

    <script src="http://embedyou.herokuapp.com/embedyou.js" id="embedyou" ></script>

EmbedYou was inspired by [embedtweet][4] &amp; uses [oEmbed][5]. It comes with no warranty &amp; it supplied as is. EmbedYou has a git repo on [github][6].

 [1]: http://www.enru.co.uk
 [2]: http://youtube.com
 [3]: http://vimeo.com
 [4]: http://embedtweet.com/
 [5]: http://oembed.com/
 [6]: https://github.com/enru/embedyou  
