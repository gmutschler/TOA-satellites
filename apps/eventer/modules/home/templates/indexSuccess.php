<div id="hero" class="home-hero">

    <div id="hero_background">
        <div id="slider1" class="swipe" style="overflow: hidden; ">
            <div style="width: 3840px; transition: 100ms; -webkit-transition: 100ms; white-space: nowrap;">
                <div class="slide"><img src="/images/content/homeslider/ronnen.jpg" /></div>
                <div class="slide"><img src="/images/content/homeslider/blogpost-reset.jpg" /></div>
                <div class="slide"><img src="/images/content/homeslider/speaker-grid.jpg" /></div>
                <div class="slide"><img src="/images/content/homeslider/video-ill.jpg" /></div>
            </div>
        </div>
    </div>
    <div id="hero_foreground">
        <div id="slider2" class="swipe" style="overflow: hidden; ">
            <div style="width: 3840px; transition: 100ms; -webkit-transition: 100ms; white-space: nowrap;">
                <div class="slide"><a href="http://toaberlin2013-toawebsite.eventbrite.com/" target="_blank"><h1><span>August 1-2, 2013</span><br><span>Two days of Tech, Music, Art & Science</span><br><span class="readmore red_readmore">Buy your ticket now!</span></h1></a><span class="photo_credit" style="left: 10px; text-align: left;">Photo by <a href="http://ailineliefeld.com/" target="_blank">Ailine Lefield</a></span></div>
                <div class="slide"><h3>Blog Post</h3><a href="http://blog.toaberlin.com/post/54461948015/this-years-theme-reset-tomorrow"><h1><span>This year's theme: Reset tomorrow!</span><br><span class="readmore">Read More &rarr;</span></h1></a><span class="photo_credit" style="left: 10px; text-align: left;">Illustration by <a href="http://www.retro-futurismus.de/buergle.htm" target="_blank">Klaus Bürgle</a></span></div>
                <div class="slide"><h3>Speakers</h3><a href="/unconference/speakers"><h1><span>First Speakers announced</span><br><span class="readmore">See all speakers &rarr;</span></h1></a></div>
                <div class="slide"><h3>2012 Edition</h3><a href="/about#last-year-video"><h1><span>Want to see what happened last year?</span><br><span class="readmore">See the video &rarr;</span></h1></a><span class="photo_credit" style="left: 10px; text-align: left;">Photo by <a href="http://ailineliefeld.com/" target="_blank">Ailine Lefield</a></span></div>
            </div>
        </div>
        <div class="swipecontrol">
            <a href="javascript:;" class="slider_nav slider_previous" id="hero_previous"></a>
            <a href="javascript:;" class="slider_nav slider_next" id="hero_next"></a>
        </div>
    </div>
</div>

<div id="content" class="screen_home">

	<div class="textual">
        <!--<h2>A Two-day Tech, Music, Art & Science festival</h2>-->
		
        <div class="tcenter bicolumn">
	            <a class="column fleft"  href="/unconference">
	            	<img src="/images/content/micro.jpg">
	            	<h3>Unconference at Kater Holzig</h3>
	                <p>A first day to connect with creators across various fields, countries and disciplines at a magical location. More than 50 top‑class artists, scientists and entrepreneurs speaking about what keeps their inner flame burning and what they truly aspire to change.</p>
                    <span href="/unconference/index" class="seemore">More about the unconference &rsaquo;</span>
	            </a>
	            
	            <a class="column fright" href="/satellites/book">
	            	<img src="/images/content/satellite_sponso.jpg">
	            	<h3>Satellite Events across the city</h3>
	                <p>On the second day, the ecosystem takes over and self‑organizes events all over the city. Attendees will get the opportunity to visit startup offices, enjoy corporate perks, participate in workshops and network with smart people at meet‑ups and memorable parties.</p>
                    <span href="/satellites/book" class="seemore">See all the satellite events &rsaquo;</span>
	            </a>
                <div class="clear"></div>
	    	</div>
        
	</div>
    
    <div class="textual slider-container">
        
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
            <a href="javascript:;" class="slider_nav slider_previous" id="slider0_previous"></a>
            <a href="javascript:;" class="slider_nav slider_next" id="slider0_next"></a>
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
        <a href="http://blog.toaberlin.com" class="seemore">Read more news ›</a>
        </div>
    </div>

</div>
