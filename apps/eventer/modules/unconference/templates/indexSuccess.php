<div id="hero">

        <div id="hero_background"><img src="/images/content/ill-2013-v2.jpg" /></div>
        <div id="hero_foreground"><h1><span>Reset Tomorrow!</span><br><span>An ode to retro-futurism</span></h1></div>
</div>

<div id="content" class="screen_unconference_index">

<?php include_partial('submenu') ?>

	<div class="textual">
        
		<h1>The Unconference<span>&nbsp; August 1, 2013</span></h1>
    
        <div id="about-2013">
			<p class="lead">The theme of this year is called “Reset tomorrow!” and will build upon the concept of <a href="http://blog.toaberlin.com/post/54461948015/this-years-theme-reset-tomorrow">retrofuturism</a>.</p> 
			
            <h2>What to expect</h2>
            <!--<div id="theme-description">
            	<p>At this year’s unconference on Day 1 we want to take a critical view of what Technology has achieved over the last decades and whether the expectations we had when we were little kids watching Blade Runner were actually met.<br>
In some areas technology has clearly over-delivered, but in other areas it still falls short. Not that it should be considered a sign of ultimate human achievement, but isn’t it crazy that 20 years ago we were able to fly across the Atlantic in half the time. And why the hell do cars still use four wheels to get us from A to B.</p>

				<p>Dude, where is my Hover-board?</p>

				<p>It also seems that more and more people are beginning to question whether applied science will achieve its earlier promise that life would inevitably improve through technological progress. Many start to feel that the desired or expected future has failed to materialise and are increasingly keen on switching off and living off the grid.<br>
				Join us for a day where we'll get smart thinkers and doers together to look at both the alienating and empowering effects of technology.</p>

				<p>If you would like to highlight a specific angle of technology in a talk or would like to recommend someone, please get in touch with us.<break>
				We can't wait to see you at the unconference.</p>

				<p>And no worries, you’ll be able to park your hover-boards outside!</p>
            </div>
            
            <div id="sidebar-expect">
                <h3 class="tupper">What to expect</h3>
                <ul>
                    <li>Inspiring Talks</li>
                    <li>GrowShop</li>
                    <li>Debates</li>
                    <li>Pitches</li>
                    <li>VC Confession Chair</li>
                    <li>Pillow Talk</li>
                    <li>Art Installation</li>
                    <li>Live Music & DJ Sets</li>
                    <li>BBQ</li>
                </ul>
            </div>-->
            
            <div class="activity-column first">
				<div class="activity">
					<h3>Panel sessions</h3>	
					<p>Panels are constructed with a view to discussing controversial issues with differing opinions on these issues presented by a good mix of panel members.</p>
					<div class="activity_meta"><span><strong>Where:</strong> The Gallery</span><span><strong>How Long:</strong> 25 or 45 minutes</span></div>
				</div>
				
				<div class="activity">
					<h3>Pitch Clinic</h3>
					<p>Pitch your product or service in just 1:30min in front of a high end jury. The prizes include coveted wildcard spots at Berlin’s most prestigious accelerators (Telekom Hubraum & Axel Springer PlugnPlay) as well as $60K worth of Google App Packages. We put the pitch first!</p>
					<p><a href="https://docs.google.com/a/toaberlin.com/forms/d/1nxeHtvLDGhysoabhV_jQxwQh8p2BZe5S1fqci7cN0xc/viewform" target="_blank" style="text-transform: uppercase; color: #e9ddc5; background: #231f20; text-decoration: none; padding: 2px 6px; font-size: 15px;">Apply here</a></p>
					<div class="activity_meta"><span><strong>Where:</strong> The Dock</span><span><strong>When:</strong> 16:45 to 17:45</span></div>
				</div>
					
            </div>
            
           <div class="activity-column">
				<div class="activity">
					<h3>Ignite Talks</h3>
					<p>Speakers will deliver ‘ignite style’ talks which are inspiring and energetic. Don’t worry, no sales presentations and no bullet points.</p>
					<div class="activity_meta"><span><strong>Where:</strong> Rummel</span><span><strong>How long:</strong> 5 or 15 minutes</span></div>
				</div>
				
				<div class="activity">
					<h3>Pillow Talk sessions</h3>
					<p>Well, not what you think! :-) Pillow talk sessions consist of conversations between thought 
leaders in a circle on Kater Holzig’s Terrace. The idea is to get people who are knowledgeable about a topic to discuss it in depth, with those surrounding able to chime in and contribute.</p>
					<div class="activity_meta"><span><strong>Where:</strong> The Terrace</span><span><strong>How long:</strong>45 minutes</span></div>
				</div>
				
				<div class="activity">
					<h3>Open Capital</h3>
					<p>Founders meet funders on the terrace for refreshing one on one conversations. Meet a select group of top VCs and start the dialogue. It’s never too early!</p>
					<div class="activity_meta"><span><strong>Where:</strong> The Terrace</span><span><strong>When:</strong> 14:00 to 15:00 </span></div>
				</div>
				
			</div>
            
            <div class="activity-column last">
   				<div class="activity">
					<h3>Crowdfunding Stage</h3>
					<p>Artists and entrepreneurs unite. Here we give crowdfunding campaigners the stage to promote and amplify their idea to the crowd offline. Hear from the latest and greatest ideas that are searching for support from the crowd, live and unplugged!</p>
					<div class="activity_meta"><span><strong>Where:</strong> The Dock</span><span><strong>When:</strong> 12:30 to 13:00</span></div>
				</div>            
				
	            <div class="activity">
					<h3>Knowshop</h3>
					<p>Knowshops are delivered by those who have seen and done it all. Through interactive sessions, people will come out with concrete learnings.</p>
					<div class="activity_meta"><span><strong>Where:</strong> Heinz</span><span><strong>How Long:</strong> 25 minutes</span></div>
				</div>

				<div class="activity">
					<h3>Ask me Anything</h3>
					<p>Ask me anything sessions allow you to ask ‘the big guys’ anonymous questions in a confession chair that you’d be otherwise shy to ask! Anything goes here, really!</p>
					<div class="activity_meta"><span><strong>Where:</strong> Confession booth</span><span><strong>How Long:</strong> 30 minutes</span></div>
				</div>
								

			</div>
            
            <div class="clear"></div>
        </div>
        
        
        
        <div class="program_concerts textual">
        <h2>Performances</h2>
<?php	foreach($programs as $program): ?>
<?php		if($program->getKind() == 'Performance'): ?>

			<div class="program_concert">

				<div class="program_concert_image" style="background-image: url('/images/content/program-cms/<?=$program->getPhoto()?>">

					<p class="time"><?=$program->getStartHourClean()?> - <?=$program->getEndHourClean()?>
                        <?php if($program->getRoom() == 'Fluxbau'): ?>
                            <span class="venue">Fluxbau</span>
                        <?php else: ?>
                            <span class="venue">Kater Holzig</span>
                        <?php endif ?>
                    </p>
				</div>

				<div class="program_concert_desc">

					<h2><?=$program->getTitle()?></h2>

					<?=$program->getRaw('description')?>

				</div>
                
                <div class="perf-social-icons">
                    <?php if($program->getTwitter()) { ?><a href="http://www.twitter.com/<?=$program->getTwitter() ?>" target="_blank"  class="first-link twitter-link"></a><? } ?>
                    <?php if($program->getURL()) { ?><a href="http://<?=$program->getURL() ?>" class="website-link <?php if(!$program->getTwitter()) { ?>first-link<? } ?>" target="_blank"></a><? } ?>
                    <?php if($program->getFacebook()) { ?><a href="http://www.facebook.com/<?=$program->getFacebook() ?>" class="facebook-link <?php if(!$program->getTwitter() && !$program->getURL()) { ?>first-link<? } ?>" target="_blank"></a><? } ?>
                </div>
                
				<div class="clear"></div>
			</div>
<?php		endif ?>
<?php	endforeach ?>
		</div>
    
        <div id="locations-2013" class="textual">
            <h2>The Locations</h2>
            <div class="location">
                <div class="location-illustration">
                    <img src="/images/content/kater.jpg">
                    <div class="location-address">
                        <h3>Kater Holzig</h3><p>Michaelkirchstr. 23<br>(U-Bahn: Jannowitzbrücke)<br>10179 Berlin</p>
                    </div>
                </div>
                <div class="location-description">
                    <p>Located in a ancient soap factory on the banks of the Spree, the <a href="http://www.katerholzig.de/" target="_blank">Kater Holzig</a> is the epitome of an alternative Berlin club. Founded by the people behind  <a href="http://www.youtube.com/watch?v=HQpZQj3TY80&amp;hd=1" target="_blank">the infamous Bar25</a>, a club credited with building the famous Berlin techno scene. This is a wonderland where people from all over the world dance the nights AND days away.</p>
                    <p>If you are the kind of person who likes to enjoy good times in a cool atmosphere, this venue alone should be enough to convince you to snap up your ticket.</p>
                </div>
            </div>
    
            <div class="location even">
                <div class="location-illustration">
                    <img src="/images/content/fluxbau.jpg">
                    <div class="location-address">
                        <h3>FluxBau</h3><p>Pfuelstr. 5, zweiter Hofeingang<br>(U-Bahn: Schlesisches Tor)<br>10997 Berlin</p>
                    </div>
                </div>
                <div class="location-description">
                    <p>Since its opening last summer, FluxBau has become a popular hangout for Berlin’s creative scene and has hosted numerous art exhibitions, readings, club nights and exclusive concerts by the likes of Passenger and We Are Augustines.</p>
                        <p>Stunningly located on the banks of the Spree, FluxBau offers tasty drinks at fair prices, excellent dining and a terrace with great views of the TV Tower and the Oberbaumbrücke.</p>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
