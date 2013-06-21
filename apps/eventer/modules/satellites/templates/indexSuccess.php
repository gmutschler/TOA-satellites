<div id="content" class="screen_satellites">

        <div id="hero">

                <div id="hero_background">
                <img src="/images/content/satellite-home-hero-bg.jpg" />
                <span  class="photo_credit">Photo by Thomas Charbit</span>
                </div>
                <div id="hero_foreground">
                    <h1><span>Discover more than 50 events</span><br /><span>all around the city</span></h1>
                </div>
        </div>

<?php include_partial('submenu') ?>

	<div class="textual">
        <p class="lead">On the second day, TOA becomes a platform for the Berlin ecosystem to build upon.<br />
        <small>Showcase your product, gather likeminded people over coffe or throw a party. The format is up to you, we help you along the way.</small></p>
    </div>
    
    <div class="textual">
        <script type="text/javascript">   
        var timer1;
        function scrollDiv(divId, depl) {
          var scroll_container = document.getElementById(divId);
          scroll_container.scrollLeft -= depl;
          timer1 = setTimeout('scrollDiv("'+divId+'", '+depl+')', 10);
        }
        </script>
        <h2>Our partner locations</h2>
        <div class="location_slider">
            <div id="scrollarea1" class="slider_content">
                <a href="http://agoracollective.org/" target="_blank"><img src="/images/content/locations/agora.jpg"></a>
                <a href="http://www.ahoyberlin.com/" target="_blank"><img src="/images/content/locations/ahoy.jpg"></a>
                <a href="http://betahaus.de/" target="_blank"><img src="/images/content/locations/betahaus.jpg"></a>
                <a href="http://www.sanktoberholz.de/" target="_blank"><img src="/images/content/locations/oberholz.jpg"></a>
                <a href="http://www.amanogroup.de/en/hotels/amano/" target="_blank"><img src="/images/content/locations/amano.jpg"></a>
            </div>
            <a class="slider_nav slider_previous" onmouseover="scrollDiv('scrollarea1', 4)" onmouseout="clearTimeout(timer1)" onmousedown="scrollDiv('scrollarea1', 8)" onmouseup="clearTimeout(timer1)"></a>
            <a class="slider_nav slider_next" onmouseover="scrollDiv('scrollarea1', -4)" onmouseout="clearTimeout(timer1)" onmousedown="scrollDiv('scrollarea1', -8)" onmouseup="clearTimeout(timer1)"></a>
        </div>
   
        <hr>
        
        <h2>What to expect</h2>
        <p><big>Have a look at some ideas below or come up with yours.</big></p>
        <div class="table">
            <div class="three-columns first">
                <div class="three-columns-header">
                    <img src="/images/content/networking.jpg" alt="networking address book">
                    <h3>Networking</h3>
                </div>
                <div class="content-box-inner">
                    <p>Share memorable moments to connect with your audience!</p>
                    <ul>
                        <li>Breakfast, Lunch or Dinner Meetups</li>
                        <li>Open Office Hours</li>
                        <li>Recruiting Events</li>
                        <li>Cocktails Receptions, Pup Crawls</li>
                        <li>BBQ's, Picknicks</li>
                        <li>Parties</li>
                        <li>...</li>
                    </ul>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="three-columns">
                <div class="three-columns-header">
                    <img src="/images/content/making.jpg" alt="kitchen accessories">
                    <h3>Making</h3>
                </div>
                <div class="content-box-inner">
                    <p>When people from different disciplines put their though into action, an innovation is born!</p>
                    <ul>
                        <li>Hackathons</li>
                        <li>DIY Workshops</li>
                        <li>Art Installations</li>
                        <li>Jam Sessions</li>
                        <li>...</li>
                    </ul>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="three-columns last">
                <div class="three-columns-header">
                    <img src="/images/content/learning.jpg" alt="Old schooldesk">
                    <h3>Learning</h3>
                </div>
                <div class="content-box-inner">
                    <p>Share your knowledge and Karma will be your friend!</p>
                    <ul>
                        <li>Workshops</li>
                        <li>Talks and Panels</li>
                        <li>User Meetups</li>
                        <li>...</li>
                    </ul>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
        <a href="/satellites/book" class="seemore">See all the satellites events &rsaquo;</a>
        <div class="tcenter"><h3 class="tupper"><big>Your Idea ?</big></h3><a  href="/satellites/host" class="button_black">&#43; Host your own</a></div>
    </div>
</div>

