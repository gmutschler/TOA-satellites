<div id="content" class="screen_unconference_program">

<?php include_partial('submenu') ?>

	<div class="textual">

		<h1>The Unconference <span>(kater holzig - 9:00 to 18:00)</span></h1>

<?php if($programs and count($programs)): ?>
		<div class="program_wrapper">

			<div class="column left">
                <div class="left_arrow">&#9668;<br />&#9668;<br />&#9668;<br />&#9668;<br />&#9668;</div>
			</div>

			<div class="column right">
                <div class="program_breakfast program_aside"><h1>Breakfast</h1></div>
                <div class="program_lunch program_aside"><h1>Lunch</h1></div>
                <div class="program_bbq program_aside"><h1>BBQ</h1></div>

				<ul class="program_rooms">

					<li class="first">The Dock</li>
					<li>Rummel</li>
					<li>Heinz</li>
					<li>Gallery</li>
					<li class="room_htte_title">Hütte<span>(sponsored stage)</span></li>
					<li>The Terrace</li>
					<li>Confession chair</li>
				</ul>

				<div class="clear"></div>
                
				<div class="program_inside">
                <div class="program_inside_bg"></div>
                <div class="program_breakfast_bg program_aside_bg"></div>
                <div class="program_lunch_bg program_aside_bg"></div>
                <div class="program_bbq_bg program_aside_bg"></div>
<?php	foreach($programs as $program): ?>
<?php		if($program->getRoom() != 'Fluxbau'): ?>
                    

					<div class="program_item room_<?=$program->getRoomEscaped()?> cat_<?=$program->getKindEscaped()?>" style="top: <?=$program->getPixelPositionTop()?>px; height: <?=($program->getPixelHeight())-1?>px; min-height: <?=($program->getPixelHeight())-1?>px;">
						<div class="program_padder">

							<h2><?=$program->getTitle()?><?php if ($program->getKind() !="Other" ) { ?> | <span><?=$program->getKind()?></span><? } ?></h2>

							<div class="program_more" style="display: none;">
                                
                                <?php if ($program->getPhoto()) { ?><img src="/images/content/program-cms/<?=$program->getPhoto()?>" width="320" alt="<?=$program->getTitle()?>" class="program_illustration" /><? } ?>
								<?=$program->getRaw('description')?>

								<?php if($moderators = $program->getModerators() and count($moderators)) include_partial('programPeople', array('title' => 'Moderator', 'people' => $moderators)) ?>

								<?php if($speakers = $program->getSpeakers() and count($speakers)) include_partial('programPeople', array('title' => 'Speakers', 'people' => $speakers)) ?>
							</div>

							<a class="toggle_button">Show more</a>
						</div>
					</div>

<?php		endif ?>
<?php	endforeach // & programs loop ?>

				</div>
			</div>
			
			<div class="column ex_right"><div class="right_arrow">&#9658;<br />&#9658;<br />&#9658;<br />&#9658;<br />&#9658;</div></div>
		</div>
	</div>

	<div class="textual">

		<h1>The concerts <span>(fluxbau - 21:00 to 24:00)</span></h1>

		<div class="program_concerts">
<?php	foreach($programs as $program): ?>
<?php		if($program->getRoom() == 'Fluxbau'): ?>

			<div class="program_concert">

				<div class="program_concert_image" style="background-image: url('/images/content/program-cms/<?=$program->getPhoto()?>')">

					<p class="time"><?=$program->getStartHourClean()?> - <?=$program->getEndHourClean()?></p>
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

<?php endif // & if programs ?>

	</div>
</div>
while