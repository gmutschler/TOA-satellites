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
        <h1>Graphic Ressource</h1>
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
        
        <h2>The 2013 Illustration</h2>
            <a href="http://files.toaberlin.com/TOA13-illustration.jpg" download="" class="simple-image-dl"><img src="/images/content/press/TOA13-illustration.jpg" alt="2013 Edition official illustration"><div class="button" style="right: 25px; left: auto">↓ Download</div></a>
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
