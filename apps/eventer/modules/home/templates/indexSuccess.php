<div id="content" class="screen_home">

	<div id="hero">

		<div id="hero_background"></div>
		<div id="hero_foreground">caroussel to come. But what to display in it ?</div>
	</div>

	<div class="textual">
        <h2>A Two-day Tech, Music, Art & Science festival</h2>
		
        <div class="tcenter bicolumn">
	            <a class="column fleft">
	            	<img src="/images/content/micro.jpg">
	            	<h3>Unconference at Kater Holzig</h3>
	                <p>A first day to connect with creators across various fields, countries and disciplines at a magical location. More than 50 top‑class artists, scientists and entrepreneurs speaking about what keeps their inner flame burning and what they truly aspire to change.</p>
                    <span href="/unconference/index" class="seemore">More about the unconference &rsaquo;</span>
	            </a>
	            
	            <a class="column fright">
	            	<img src="/images/content/satellite_sponso.jpg">
	            	<h3>Satellite Events across the city</h3>
	                <p>On the second day, the ecosystem takes over and self‑organizes events all over the city. Attendees will get the opportunity to visit startup offices, enjoy corporate perks, participate in workshops and network with smart people at meet‑ups and memorable parties.</p>
                    <span href="/satellites/book" class="seemore">See all the satellite events &rsaquo;</span>
	            </a>
                <div class="clear"></div>
	    	</div>
        
	</div>
    
    <div class="textual slider-container">
        
    <script type="text/javascript">  
        function scrollDiv(divId, depl) {
            var scroll_container = document.getElementById(divId);
            scroll_container.scrollLeft -= depl;
        }
        function launchScroll(divId, depl) {
            var time = 0
            for (i=0; i<241; i++) {
                setTimeout('scrollDiv("'+divId+'", '+depl+')', time);
                time++;
            }
        }
    </script>
        
        <div id="slider0" class="swipe contentbox" style="overflow: hidden; visibility: visible; ">
            <div style="width: 4800px; transition: 100ms; -webkit-transition: 100ms; white-space: nowrap;">
                <div class="slide"><blockquote><img src="/images/content/presslogo/TheWallStreetJournal_logo.png" class="presslogo"><p>Even by the standards of alternative festivals, Tech Open Air is unusual... it is an interesting experiment!</p><footer>The Wallstreet Journal</footer></blockquote></div>
                <div class="slide"><blockquote><img src="/images/content/presslogo//TechCrunch_logo.png" class="presslogo"><p>One Of The Best Annual Tech Startup Events In Europe!</p><footer>TechCrunch</footer></blockquote></div>
                <div class="slide"><blockquote><img src="/images/content/presslogo/venturevillage_logo.jpg" class="presslogo"><p>Berlin's answer to SXSW</p><footer>Venture Village</footer></blockquote></div>
                <div class="slide"><blockquote><img src="/images/content/presslogo/DieWelt_logo.png" class="presslogo"><p>Das ist die Elite der Start-Ups.</p><footer>Die Welt</footer></blockquote></div>
                <div class="slide"><blockquote><img src="/images/content/presslogo/TheIrishTimes_logo.png" class="presslogo"><p>A sort of mini-Electric Picnic for the city’s booming chic geek set!</p><footer>The Irish Times</footer></blockquote></div>
            </div> 
        </div>
        <div class="swipecontrol">
            <a href="#" onclick="launchScroll('slider0', 4);return false;" class="slider_nav slider_previous"></a>
            <a href="#" onclick="launchScroll('slider0', -4);return false;" class="slider_nav slider_next"></a>
        </div>
        <div class="clear"></div>
        <a href="/about/press/" class="seemore">All the press clippings ›</a>
    </div>

    <div class="textual">
        <h2>latest News</h2>
        <div class="tumblr-posts">
        <?php
            $raw = file_get_contents('http://api.tumblr.com/v2/blog/toaberlin.tumblr.com/posts?api_key=bEFkbJ3aXNgg22wVMbVGvUTNe4hxdp5tpENAk7S7aMDgNYIVZR&tag=featured&limit=3');
            $postsobj = json_decode ($raw);
    
            foreach ( $postsobj->response->posts as $post ) {
                echo "<div class='three-columns blog-entry'>";
                echo "<div class='post-content'>{$post->body}</div>";
                echo "<a href='{$post->post_url}' class='post-title'><span class='post-overlay'></span><h1>{$post->title}</h1></a>";
                echo "</div>";
            }
                
        ?>
        <div class="clear"></div>
        <a href="blog.toaberlin.com" class="seemore">Read more news ›</a>
        </div>
    </div>

</div>
