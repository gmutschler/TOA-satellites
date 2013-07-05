<div id="hero">

        <div id="hero_background"><img src="/images/content/metropolis-press.jpg" /></div>
        <div id="hero_foreground">
            <div class="press-release">
            <h3>Press Release</h3>
            <h2>Europe’s most inspiring interdisciplinary technology festival unveils speakers and partners from all over the world.</h2>
                <a href="https://docs.google.com/a/toaberlin.com/document/d/1CpMF5ci0tGnXgUq2P9hOxMlF5eCZolhjsQJ1aKMFVdk" target="_blank">Read it in english &rarr;</a>
                <a href="https://docs.google.com/a/toaberlin.com/document/d/1rnP5QgPr8Bo4oHCq73XcY8jBNd1N1yzprOh6hv43LLY" target="_blank">Auf deutsch lesen &rarr;</a>
            </div>
            <span class="photo_credit">Metropolis, 1927 - Fritz Lang</span>
        </div>
</div>

<div id="content" class="screen_about_press">

<?php include_partial('submenu') ?>

	<div class="textual">
        <div class="press-publications">
            <div class="press-review">
                <div class="press-review-header">
                    <img src="/images/content/press_review.jpg" alt="press-review" />
                    <h2>Press review</h2>
                </div>
                
                <div class="press-review-content"> 
<?php if($releases and count($releases)) foreach($releases as $release): ?>

			<div class="press-coverage">
				<a href="<?=$release->getUrl()?>" target="_blank"><h3><?=$release->getTitle()?></h3><div class="date"><?=$release->getRaw('dateHtmlFormatted')?><?=$release->getMedia()?></div></a>
			</div>
<?php endforeach ?>

<?php /*
                    <div class="press-coverage">
                        <a href="http://startup-termine.de/ai1ec_event/tech-open-air-berlin-2013/?instance_id=" target="_blank"><h3>Tech Open Air Berlin 2013</h3><div class="date">Startup-Termine</div></a>
                    </div>
                    
                    <div class="press-coverage">
                        <a href="http://fueled.com/blogpost/5-of-the-worlds-most-inspiring-tech-events-youve-never-heard-of/" target="_blank"><h3>5 of the World’s Most Inspiring Tech Events You’ve Never Heard of</h3><div class="date">Jun 14<sup>st</sup>, 2013 - Fueled.com</div></a>
                    </div>
                    
                    <div class="press-coverage">
                        <a href="http://berlinwebweek.de/2013/04/22/tech-open-air-berlin-2013-1-8-2013/?lang=de" target="_blank"><h3>TECH OPEN AIR BERLIN 2013 – 1.8.2013</h3><div class="date">Jun 14<sup>th</sup>, 2013 - Fueled.com</div></a>
                    </div>
                    
                    <div class="press-coverage">
                        <a href="http://www.deutsche-startups.de/events/676/tech-open-air-berlin-berlin/" target="_blank"><h3>Tech Open Air Berlin</h3><div class="date">deutsche startups</div></a>
                    </div>
                                       
                    <div class="press-coverage">
                        <a href="http://www.youtube.com/watch?v=fkijAku7gng" target="_blank"><h3>Open Mic: Niko Woischnik Announcing Tech Open Air 2013(Video)</h3><div class="date">May 13<sup>th</sup>, 2013 - Friday at Six</div></a>
                    </div>
                    
                    <div class="press-coverage">
                        <a href="http://venturevillage.eu/tech-open-air-returns" target="_blank"><h3>Tech Open Air Berlin returns this summer for two days of startups, music and ar</h3><div class="date">Apr 23<sup>rd</sup>, 2013 - Venture Village</div></a>
                    </div>
                    
                    <div class="press-coverage">
                        <a href="http://www.trendsonline.co/news/tech-open-air-festival-in-berlin-try-something-different/" target="_blank"><h3>Tech Open Air Festival in Berlin, try something different</h3><div class="date">Apr 23<sup>rd</sup>, 2013 - Trendsonline.co</div></a>
                    </div>
                    
                    <div class="press-coverage">
                        <a href="http://siliconallee.com/events/2013/04/22/tech-meets-music-and-art-toa-berlin-to-return-in-2013" target="_blank"><h3>Tech Meets Music and Art: TOA Berlin to Return in 2013</h3><div class="date">Apr 22<sup>nd</sup>, 2013 - Sillicon Allee</div></a>
                    </div>
                                             
                    <div class="press-coverage">
                        <a href="http://www.gruenderszene.de/allgemein/tech-open-air-berlin-2013" target="_blank"><h3>Raus aus den Büros, es ist Sommer!</h3><div class="date">Apr 22<sup>nd</sup>, 2013 - Gruenderszene</div></a>
                    </div>
                    
                    <div class="press-coverage">
                        <a href="http://berlinstartupacademy.com/video/interview-with-nikolas-woischnik-organizer-of-toa-berlin-techberlin-jobslike-me-ahoy-berlin-2" target="_blank"><h3>Interview with Nikolas Woischnik – Organizer of TOA Berlin</h3><div class="date">Apr 1<sup>st</sup>, 2013 - Berlin Startup Academy</div></a>
                    </div>
                    
                    <div class="press-coverage">
                        <a href="http://www.tagesspiegel.de/wirtschaft/south-by-southwest-2013-dont-panic-berlin-ist-nicht-deutschland/7917648.html" target="_blank"><h3>Don't panic – Berlin ist nicht Deutschland</h3><div class="date">Mar 13<sup>th</sup>, 2013 - Berlin Startup Academy</div></a>
                    </div>
                    
                    <div class="press-coverage">
                        <a href="http://www.huffingtonpost.fr/elie-chevignard/berlin-tech-innovation_b_1846831.html" target="_blank"><h3>Berlin, la Mecque des Techs?</h3><div class="date">Sep 3<sup>rd</sup>, 2012 - Le Huffington Post</div></a>
                    </div>
                    
                    <div class="press-coverage">
                        <a href="http://www.irishtimes.com/newspaper/finance/2012/0903/1224323531855.html" target="_blank"><h3>Berlin's buzzing with tech start-ups</h3><div class="date">Sep 3<sup>rd</sup>, 2012 - Irish Times</div></a>
                    </div>
                    
                    <div class="press-coverage">
                        <a href="http://www.adzine.de/de/site/artikel/7494/online-vermarktung/2012/08/premiere-der-tech-open-air-berlin" target="_blank"><h3>Premiere der Tech Open Air Berlin</h3><div class="date">Aug 30<sup>th</sup>, 2012 - AdZine</div></a>
                    </div>
                    
                    <div class="press-coverage">
                        <a href="http://techcrunch.com/2012/08/29/tweek-preps-new-algorithmic-version-of-its-social-tv-guide-tctv/" target="_blank"><h3>Tweek Preps New Algorithmic Version Of Its Social TV Guide [TCTV]</h3><div class="date">Aug 29<sup>th</sup>, 2012 - Techcrunch</div></a>	
                    </div>
                    
                    <div class="press-coverage">
                        <a href="http://www.freshmilk.tv/events/609/" target="_blank"><h3>Tech Open Air</h3><div class="date">Aug 27<sup>th</sup>, 2012 - Freshmilk.tv (German)</div></a>
                    </div>
                    
                    <div class="press-coverage">
                        <a href="http://www.dailymotion.com/video/xt1jsv_berlin-s-outdoor-tech-festival_travel" target="_blank"><h3>Berlin's Outdoor Tech Festival</h3><div class="date">Aug 25<sup>th</sup>, 2012 - 5minTravel</div></a>
                    </div>
                    
                    <div class="press-coverage">
                        <a href="/assets/images/press/DWK_int_2408_1_026_027.pdf" target="_blank"><h3>Unternehmensgründer mit Studenten-Lifestyle</h3><div class="date">Aug 24<sup>th</sup>, 2012 - Welt Kompakt (German)</div></a>
                    </div>
                    
                    <div class="press-coverage">
                        <a href="http://siliconallee.com/events/2012/08/24/only-in-berlin-a-great-success-for-toaberlin" target="_blank"><h3>Only In Berlin: A Great Success for TOABerlin</h3><div class="date">Aug 24<sup>th</sup>, 2012 - Sillicon Allee</div></a>
                    </div>
                    
                    <div class="press-coverage">
                        <a href="http://mediacenter.dw.de/german/video/item/619805/Berlin_junge_Startups_treffen_Investoren/" target="_blank"><h3>Berlin: junge Startups treffen Investoren</h3><div class="date">Aug 24<sup>th</sup>, 2012 - Deutsche Welle (German)</div></a>
                    </div>
                    
                    <div class="press-coverage">
                        <a href="http://statigr.am/businesspunkmag" target="_blank"><h3>Instagram Live Ticker</h3><div class="date">Aug 24<sup>th</sup>, 2012 - BusinessPunk</div></a>
                    </div>
                    
                    <div class="press-coverage">
                        <a href="/assets/images/press/DWK_int2308_1_027_026.pdf" target="_blank"><h3>Das ist die Elite der Start-ups</h3><div class="date">Aug 23<sup>rd</sup>, 2012 - Welt Kompakt (German) —</div></a>
                    </div>
                    
                    <div class="press-coverage">
                        <a href="http://blogs.wsj.com/tech-europe/2012/08/23/berlin-tech-festival-mashes-art-and-start-ups/" target="_blank"><h3>Berlin Tech Festival Mashes Art and Start-Ups</h3><div class="date">Aug 23<sup>rd</sup>, 2012 - Wall Street Journal</div></a> 
                    </div>
                    
                    <div class="press-coverage">
                        <a href="http://www.welt.de/print/welt_kompakt/webwelt/article108749585/Das-ist-die-Elite-der-Start-ups.html" target="_blank"><h3>Das ist die Elite der Start-ups</h3><div class="date">Aug 23<sup>rd</sup>, 2012 - Welt Online (German)</div></a>
                    </div>
                    
                    <div class="press-coverage">
                        <a href="http://venturevillage.eu/tech-open-air-berlin-2012" target="_blank"><h3>“Failure’s OK in Berlin”, but “Aim for a billion-dollar company” – Tech Open Air opens to lively Berlin startup debates</h3><div class="date">Aug 23<sup>rd</sup>, 2012 - Venture Village</div></a>
                    </div>
                    
                    <div class="press-coverage">
                        <a href="http://www.welt.de/print/welt_kompakt/webwelt/article108706249/Gruenderfestival-in-Berlin-Wir-verlosen-fuenf-Tickets.html" target="_blank"><h3>Gründerfestival in Berlin: Wir verlosen fünf Tickets</h3><div class="date">Aug 21<sup>st</sup>, 2012 - Welt Online (German)</div></a>
                    </div>
                    
                    <div class="press-coverage">
                        <a href="http://netzwertig.com/2012/08/21/vamos-der-bessere-mobile-wegweiser-fuer-facebook-events/" target="_blank"><h3>Vamos: Der bessere mobile Wegweiser für Facebook-Events</h3><div class="date">Aug 21st, 2012 - Netzwertig (German)</div></a>
                    </div>
                    
                    <div class="press-coverage">
                        <a href="http://atelier-medias.org/tech-entrepreneuriat-et-innovation-quand-les-villes-s-animent/" target="_blank"><h3>Tech, entrepreneuriat et innovation : quand les villes s'animent</h3><div class="date">Aug 20<sup>th</sup>, 2012 - L'Atelier des médias (French)</div></a>
                    </div>
                    
                    <div class="press-coverage">
                        <a href="http://mambiznes.pl/artykuly/czytaj/id/4976/tworcy_startupow_spotkaja_sie_tech_open_air" target="_blank"><h3>Developers meet startups at Tech Open Air</h3><div class="date">Aug 20<sup>th</sup>, 2012 - Mambiznes (Polish)</div></a>
                    </div>
                    
                    <div class="press-coverage">
                        <a href="http://www.ibusiness.de/termine/tm/2728826368.html" target="_blank"><h3>Tech Open Air</h3><div class="date">Aug 19<sup>th</sup>, 2012 - iBusiness</div></a>
                    </div>
                    
                    <div class="press-coverage">
                        <a href="http://www.deutsche-startups.de/events/518/" target="_blank"><h3>Ende August steigt das erste Tech Open Air Berlin.</h3><div class="date">Aug 19<sup>th</sup>, 2012 - Deutsche Startups</div></a>
                    </div>
                    
                    <div class="press-coverage">
                        <a href="http://www.weave.de/weblog/toa_interview_nikolas" target="_blank"><h3>Interview mit Nikolas Woischnik zum ersten Tech Open Air Berlin</h3><div class="date">Aug 18<sup>th</sup>, 2012 - Weave</div></a>
                    </div>
                    
                    <div class="press-coverage">
                        <a href="http://www.startupolic.com/post/28846215941/grab-the-opportunity-to-dive-into-berlins-startup" target="_blank"><h3>Grab the opportunity to dive into Berlin's startup scene</h3><div class="date">Aug 17<sup>th</sup>, 2012 - Startupolic</div></a>
                    </div>
                    
                    <div class="press-coverage">
                        <a href="http://www.page-online.de/emag/szene/artikel/tech-open-air-berlin" target="_blank"><h3>Startups, Künstler, Musiker und Entwickler kommen nächste Woche in Berlin zum ersten TOA zusammen</h3><div class="date">Aug 15<sup>th</sup>, 2012 - Page Online</div></a>
                    </div>
                    
                    <div class="press-coverage">
                        <a href="http://batukhtina.ru/1221" target="_blank"><h3>Tech Open Air Berlin: knowledge stream</h3><div class="date">Aug 15<sup>th</sup>, 2012 - Batukhtina</div></a>
                    </div>
                    
                    <div class="press-coverage">
                        <a href="http://venturevillage.eu/tech-open-air-berlin" target="_blank"><h3>TOA Berlin gathers momentum… and satellite events</h3><div class="date">Aug 9<sup>th</sup>, 2012 - Venture Village</div></a>
                    </div>
                    
                    <div class="press-coverage">
                        <a href="http://www.webkomunikacja.pl/wydarzenia/muzyka-sztuka-i-technologie-juz-23-sierpnia-w-berlinie-mam-dla-was-tansze-bilety/" target="_blank"><h3>Muzyka, sztuka i … technologie, juz 23 sierpnia w Berlinie. Mam dla Was tansze bilety!</h3><div class="date">Aug 9<sup>th</sup>, 2012 - Web Komunikacja</div></a>
                    </div>
                    
                    <div class="press-coverage">
                        <a href="http://www.tvb.de/newsmeldung/datum/2012/08/01/fruehcafe-talk-mit-den-initiatoren-des-techopenair-01082012.html" target="_blank"><h3>Nikolas Woischnik &amp; Lutz Vilallba at Frühcafé</h3><div class="date">Aug 1<sup>st</sup>, 2012 - TV Berlin</div></a>
                    </div>
                    
                    <div class="press-coverage">
                        <a href="http://techcrunch.com/2012/07/24/the-best-annual-tech-startup-events-in-europe/" target="_blank"><h3>The Best Annual Tech Startup Events In Europe</h3><div class="date">Jul 24<sup>th</sup>, 2012 - Tech Crunch</div></a>
                    </div>
                    
                    <div class="press-coverage">
                        <a href="http://www.page-online.de/emag/szene/artikel/tech-open-air-berlin-steigt-ende-august" target="_blank"><h3>Tech Open Air steigt Ende August</h3><div class="date">Jul 19<sup>th</sup>, 2012 - Page Online</div></a>
                    </div>
                    
                    <div class="press-coverage">
                        <a href="http://www.fluxfm.de/programm/netzwelt-tech-open-air-berlin-und-quantum-conundrum/" target="_blank"><h3>Tech Open Air at FluxFM</h3><div class="date">Jul 15<sup>th</sup>, 2012 - Flux FM</div></a>
                    </div>
                    
                    <div class="press-coverage">
                        <a href="http://veranstaltungen.meinestadt.de/berlin/event-detail/29254111?xtmc=home-suche_tech_open_air&amp;xtcr=1" target="_blank"><h3>Tech Open Air Berlin</h3><div class="date">Jul 10<sup>th</sup>, 2012 - Meine Stadt</div></a>
                    </div>
                    
                    <div class="press-coverage">
                        <a href="http://berlin.prinz.de/termine/veranstaltungen/tech-open-air-berlin-special-events-stadtleben,1455100,1,EventSchedule.html" target="_blank"><h3>Tech Open Air Berlin</h3><div class="date">Jul 10<sup>th</sup>, 2012 - PRINZ</div></a>
                    </div>
                    
                    <div class="press-coverage">
                        <a href="http://venturevillage.eu/tech-open-air-berlin-makes-crowdfunding-deadline" target="_blank"><h3>Tech Open Air Berlin makes EUR20,000 KissKissBankBank Deadline In Nick Of Time</h3><div class="date">Jul 6<sup>th</sup>, 2012 - Venture Village</div></a>
                    </div>
                    
                    <div class="press-coverage">
                        <a href="http://siliconallee.com/events/2012/07/05/judgement-day-for-toa-crowd-funding" target="_blank"><h3>Judgment Day for TOA Crowd Funding</h3><div class="date">Jul 5<sup>th</sup>, 2012 - Silicon Allee</div></a>
                    </div>
                    
                    <div class="press-coverage">
                        <a href="http://techcrunch.com/2012/07/04/london-paris-berlin-and-beyond-a-plea-for-europes-tech-events-to-sync/" target="_blank"><h3>London - Paris - Berlin And Beyond - A Plea For Europe's Tech Events To Synch</h3><div class="date">Jul 4<sup>th</sup>, 2012 - TechCrunch</div></a>
                    </div>
                    
                    <div class="press-coverage">
                        <a href="http://www.gruenderszene.de/interviews/tech-open-air-berlin-2" target="_blank"><h3>Tech Open Air Berlin: "Wir wollen den maximalen Wissensaustausch."</h3><div class="date">Jun 29<sup>th</sup>, 2012 - Gründerszene (German)</div></a>
                    </div>
                    
                    <div class="press-coverage">
                        <a href="http://venturevillage.eu/amano-party-by-tech-open-air-team-tonight" target="_blank"><h3>Tonight: Rooftop Vodka Shots - Courtesy of KissKissBankBank and TOA</h3><div class="date">Jun 22<sup>th</sup>, 2012 - Venture Village</div></a>
                    </div>
                    
                    <div class="press-coverage">
                        <a href="http://www.gruenderszene.de/allgemein/tech-open-air-berlin" target="_blank"><h3>Das Tech Open Air am 23. August 2012 in Berlin</h3><div class="date">Jun 22<sup>th</sup>, 2012 - Gründerszene (German)</div></a>
                    </div>
                    
                    <div class="press-coverage">
                        <a href="http://siliconallee.com/events/2012/06/18/gidsy-and-dailydeal-ceos-to-speak-at-toa-berlin" target="_blank"><h3>Gidsy and DailyDeal CEOs to speak at TOA Berlin</h3><div class="date">Jun 18<sup>th</sup>, 2012 - Silicon Allee</div></a>
                    </div>
                    
                    <div class="press-coverage">
                        <a href="http://www.techberlin.com/post/25157744445/toa-berlin-festival-first-speakers-satellite-events" target="_blank"><h3>TOA Berlin Festival: First Speakers &amp; Satellite Events Announced</h3><div class="date">Jun 15<sup>th</sup>, 2012 - TechBerlin</div></a>
                    </div>
                    
                    <div class="press-coverage">
                        <a href="http://www.techberlin.com/post/20054538206/tech-open-air-berlin-2012-a-ka-working-with-the-piwws" target="_blank"><h3>Tech Open Air Berlin 2012 a.k.a. Working with the PIWWs</h3><div class="date">Mar 28<sup>th</sup>, 2012 - TechBerlin</div></a>
                    </div>
                    
                    <div class="press-coverage">
                        <a href="http://venturevillage.eu/tech-open-air-berlins-own-sxsw-set-to-launch-this-summer" target="_blank"><h3>Tech Open Air - A Startup Festival Without Walls</h3><div class="date">Mar 22<sup>nd</sup>, 2012 - Venture Village</div></a>
                    </div>
*/ ?>
                </div>
                <div class="clear"></div>
            </div>
            
            <div class="sidebar-contact">
                <h3 class="tupper">Contact &amp; Accreditations</h3>
                <h2><small>Kerstin Bock</small></h2>
                <p>
                    (+49) 160-9466-2108<br />
                    <a href="mailto:press@toaberlin.com" target="_blank">press@toaberlin.com</a><br />
                    <a href="http://twitter.com/KerstinKolumna" target="_blank">@KerstinKolumna</a><br />
                    <a href="http://de.linkedin.com/in/kerstinbock" target="_blank">Linkedin</a>
                </p>
            </div>
            <div class="clear"></div>
        </div>
    </div><!--END TEXTUAL-->
    
    <div class="textual" id="logos">
        <h1>Graphic Ressources</h1>
        <h2>Logos</h2>
        <div class="logo-download first">
            <img src="/images/content/press/TOA_logo-small.png" style="" alt="TOA Berlin Logo - Color">
            <h3><small>TOA Logo - Black</small></h3>
            <a href="http://files.toaberlin.com/TOA-logo.png" class="button_black button_black_small" download>&darr; PNG Version (600x324)</a><a href="http://files.toaberlin.com/TOA-logo.eps" class="button_black button_black_small" download>&darr; Vector Version</a>
        </div>
        <div class="logo-download">
            <img src="/images/content/press/TOA_logo-black-small.png" style="" alt="TOA Berlin Logo - Dark">
            <h3><small>TOA Logo - Black</small></h3>
            <a href="http://files.toaberlin.com/TOA-logo-black.png" class="button_black button_black_small" download>&darr; PNG Version (600x324)</a><a href="http://files.toaberlin.com/TOA-logo-black.eps" class="button_black button_black_small" download>&darr; Vector Version</a>
        </div>
        <div class="logo-download last">
            <img src="/images/content/press/TOA_logo-white-small.png" class="black" alt="TOA Berlin Logo - Light">
            <h3><small>TOA Logo - White</small></h3>
            <a href="http://files.toaberlin.com/TOA-logo-white.png" class="button_black button_black_small" download>&darr; PNG Version (600x324)</a><a href="http://files.toaberlin.com/TOA-logo-white.eps" class="button_black button_black_small" download>&darr; Vector Version</a>
        </div>
        <div class="clear"></div>
        
        <hr>
        
        <h2>2012 Photo Gallery</h2>
        <div class="photo_gallery">
            <a href="http://files.toaberlin.com/_MG_0339.jpg" download=""><img src="/images/content/press/photos_2012/_MG_0339_thumb.jpg" alt="2012 Edition photo"><div class="button">↓ Download</div></a>
            <a href="http://files.toaberlin.com/_MG_0393.jpg" download=""><img src="/images/content/press/photos_2012/_MG_0393_thumb.jpg" alt="2012 Edition photo"><div class="button">↓ Download</div></a>
            <a href="http://files.toaberlin.com/_MG_0434.jpg" class="third" download=""><img src="/images/content/press/photos_2012/_MG_0434_thumb.jpg" alt="2012 Edition photo"><div class="button">↓ Download</div></a>
            <a href="http://files.toaberlin.com/_MG_0613.jpg" download=""><img src="/images/content/press/photos_2012/_MG_0613_thumb.jpg" alt="2012 Edition photo"><div class="button">↓ Download</div></a>
            <a href="http://files.toaberlin.com/_MG_0701.jpg" download=""><img src="/images/content/press/photos_2012/_MG_0701_thumb.jpg" alt="2012 Edition photo"><div class="button">↓ Download</div></a>
            <a href="http://files.toaberlin.com/_MG_0794.jpg" class="third" download=""><img src="/images/content/press/photos_2012/_MG_0794_thumb.jpg" alt="2012 Edition photo"><div class="button">↓ Download</div></a>
            <a href="http://files.toaberlin.com/_MG_0796.jpg" download=""><img src="/images/content/press/photos_2012/_MG_0796_thumb.jpg" alt="2012 Edition photo"><div class="button">↓ Download</div></a>
            <a href="http://files.toaberlin.com/_MG_0797.jpg" download=""><img src="/images/content/press/photos_2012/_MG_0797_thumb.jpg" alt="2012 Edition photo"><div class="button">↓ Download</div></a>
            <a href="http://files.toaberlin.com/_MG_0833.jpg" class="third" download=""><img src="/images/content/press/photos_2012/_MG_0833_thumb.jpg" alt="2012 Edition photo"><div class="button">↓ Download</div></a>
            <a href="http://files.toaberlin.com/_MG_0852.jpg" download=""><img src="/images/content/press/photos_2012/_MG_0852_thumb.jpg" alt="2012 Edition photo"><div class="button">↓ Download</div></a>
            <a href="http://files.toaberlin.com/_MG_0878.jpg" download=""><img src="/images/content/press/photos_2012/_MG_0878_thumb.jpg" alt="2012 Edition photo"><div class="button">↓ Download</div></a>
            <a href="http://files.toaberlin.com/_MG_1061.jpg" class="third" download=""><img src="/images/content/press/photos_2012/_MG_1061_thumb.jpg" alt="2012 Edition photo"><div class="button">↓ Download</div></a>
            <a href="http://files.toaberlin.com/_MG_1118.jpg" download=""><img src="/images/content/press/photos_2012/_MG_1118_thumb.jpg" alt="2012 Edition photo"><div class="button">↓ Download</div></a>
            <a href="http://files.toaberlin.com/_MG_1126.jpg" download=""><img src="/images/content/press/photos_2012/_MG_1126_thumb.jpg" alt="2012 Edition photo"><div class="button">↓ Download</div></a>
            <a href="http://files.toaberlin.com/_MG_1132.jpg" class="third" download=""><img src="/images/content/press/photos_2012/_MG_1132_thumb.jpg" alt="2012 Edition photo"><div class="button">↓ Download</div></a>
            <a href="http://files.toaberlin.com/_MG_1154.jpg" download=""><img src="/images/content/press/photos_2012/_MG_1154_thumb.jpg" alt="2012 Edition photo"><div class="button">↓ Download</div></a>
            <a href="http://files.toaberlin.com/_MG_1219.jpg" download=""><img src="/images/content/press/photos_2012/_MG_1219_thumb.jpg" alt="2012 Edition photo"><div class="button">↓ Download</div></a>
            <a href="http://files.toaberlin.com/_MG_1240.jpg" class="third" download=""><img src="/images/content/press/photos_2012/_MG_1240_thumb.jpg" alt="2012 Edition photo"><div class="button">↓ Download</div></a>
            <a href="http://files.toaberlin.com/_MG_1241.jpg" download=""><img src="/images/content/press/photos_2012/_MG_1241_thumb.jpg" alt="2012 Edition photo"><div class="button">↓ Download</div></a>
            <a href="http://files.toaberlin.com/_MG_1307.jpg" download=""><img src="/images/content/press/photos_2012/_MG_1307_thumb.jpg" alt="2012 Edition photo"><div class="button">↓ Download</div></a>
            <a href="http://files.toaberlin.com/_MG_1310.jpg" class="third" download=""><img src="/images/content/press/photos_2012/_MG_1310_thumb.jpg" alt="2012 Edition photo"><div class="button">↓ Download</div></a>
        </div>
        <div class="clear"></div>
        <a href="http://files.toaberlin.com/2012-photos.zip" class="button_black button_black_small fright" download>&darr; Download all</a>
        
        <!--<h2>2013 Edition Illustrations</h2>-->
    
    </div><!--END TEXTUAL-->

</div><!--END CONTENT-->
