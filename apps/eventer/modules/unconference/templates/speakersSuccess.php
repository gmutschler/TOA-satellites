<div id="content" class="screen_unconference_speakers">

<?php include_partial('submenu') ?>

	<div class="textual">

<?php if(isset($speakers) and count($speakers)): ?>
		<div class="speakers-list">
<?php	foreach($speakers as $speaker): ?>
            <div class="speaker-item">
                <div class="speaker-container">
                    <img src="/images/content/speakers-cms/<?=$speaker->getFace()?>" alt="<?=$speaker->getFirstName()?> <?=$speaker->getLastName()?> portrait" />
                    <div class="speaker-meta">
                        <h3><?=$speaker->getFirstName()?> <?=$speaker->getLastName()?></h3>
                        <span class="speaker-position"><?=$speaker->getCompanyPosition()?><?php if($speaker->getCompany()) { ?> - <?=$speaker->getCompany()?><? } ?></span>
                    </div>
                    <div class="speaker-cursor" style="display: none;"></div>
                </div>

		      	<div class="speaker-description" style="display: none;">
                    <h1><?=$speaker->getFirstName()?> <?=$speaker->getLastName()?></h1>
                    <?php if($speaker->getCompany()) { ?> <span class="speaker-company"><?=$speaker->getCompany()?></span><? } ?>
                    <?php if($speaker->getCompany() & $speaker->getCompanyPosition()) { ?><span class="speaker-company">&#124;</span><? } ?>
                    <?php if($speaker->getCompanyPosition()) { ?> <span class="speaker-position"><?=$speaker->getCompanyPosition()?></span><? } ?>
                    <?php if($speaker->getDescription()) { ?><p><?=$speaker->getDescription() ?></p><? } ?>
                    <div class="speaker-links">
                    <?php if($speaker->getTwitter()) { ?><span class="first-link twitter"><a href="http://www.twitter.com/<?=$speaker->getTwitter() ?>" target="_blank">@<?=$speaker->getTwitter() ?></a></span><? } ?>
                    <?php if($speaker->getURL()) { ?><span class="website <?php if(!$speaker->getTwitter()) { ?>first-link<? } ?>"><a href="http://<?=$speaker->getURL() ?>" target="_blank"><?=$speaker->getURL() ?></a></span><? } ?>
                    <?php if($speaker->getFacebook()) { ?><span class="facebook <?php if(!$speaker->getTwitter() && !$speaker->getURL()) { ?>first-link<? } ?>"><a href="http://www.facebook.com/<?=$speaker->getFacebook() ?>" target="_blank">facebook.com/<?=$speaker->getFacebook() ?></a></span><? } ?>
                    </div>
			     </div>
                    
            </div>

<?php	endforeach ?>
		    <div class="speaker-item more">
                <div class="speaker-container">
		            <h3>More to be announced<br>...</h3>
	            </div>
		    </div>
		    
		<div class="clear"></div>
		</div>
<?php endif // & if speakers ?>
	</div>
</div>
