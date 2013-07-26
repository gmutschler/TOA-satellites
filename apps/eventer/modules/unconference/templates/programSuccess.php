<?php /*
<div id="hero">

	<div id="hero_background">hero background</div>
	<div id="hero_foreground">
		<h1>hero foreground</h1>
	</div>
</div>
*/ ?>

<div id="content" class="screen_unconference_program">

<?php include_partial('submenu') ?>

	<div class="textual">

		<h1>The Unconference <span>(kater holzig - 9:00 to 18:00)</span></h1>

<?php if($programs and count($programs)): ?>
		<div class="program_wrapper">

			<div class="column left">
			</div>

			<div class="column right">

				<ul class="program_rooms">

					<li class="first">The Dock</li>
					<li>Rummel</li>
					<li>Heinz</li>
					<li>Gallery</li>
					<li class="room_htte_title">Hütte</li>
					<li>The Terrace</li>
					<li>Confession chair</li>
				</ul>

				<div class="clear"></div>
                
				<div class="program_inside">
                <div class="program_inside_bg"></div>
<?php	foreach($programs as $program): ?>
<?php		if($program->getRoom() != 'Fluxbau'): ?>
                    
                    <div class="program_lunch">
				        <h1>Lunch</h1>
				    </div>

					<div class="program_item room_<?=$program->getRoomEscaped()?> cat_<?=$program->getKindEscaped()?>" style="top: <?=$program->getPixelPositionTop()?>px; height: <?=$program->getPixelHeight()?>px">
						<div class="program_padder">

							<h2><?=$program->getTitle()?> | <span><?=$program->getKind()?></span></h2>

							<div class="program_more" style="display: none;">

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
		</div>
	</div>

	<div class="textual">

		<h1>The concerts <span>(fluxbau - 21:00 to 24:00)</span></h1>

		<div class="program_concerts">
<?php	foreach($programs as $program): ?>
<?php		if($program->getRoom() == 'Fluxbau'): ?>

			<div class="program_concert">

				<div class="program_concert_image" style="background-image: url('/images/content/program-cms/<?=$program->getPhoto()?>">

					<p class="time"><?=$program->getStartHourClean()?> - <?=$program->getEndHourClean()?></p>
				</div>

				<div class="program_concert_desc">

					<h2><?=$program->getTitle()?></h2>

					<?=$program->getRaw('description')?>

					<div class="speaker-links">
						<?php if($program->getTwitter()) { ?><span class="first-link twitter"><a href="http://www.twitter.com/<?=$program->getTwitter() ?>" target="_blank">@<?=$program->getTwitter() ?></a></span><? } ?>
						<?php if($program->getURL()) { ?><span class="website <?php if(!$program->getTwitter()) { ?>first-link<? } ?>" target="_blank"><a href="http://<?=$program->getURL() ?>"><?=$program->getURL() ?></a></span><? } ?>
						<?php if($program->getFacebook()) { ?><span class="facebook <?php if(!$program->getTwitter() && !$program->getURL()) { ?>first-link<? } ?>"><a href="http://www.facebook.com/<?=$program->getFacebook() ?>" target="_blank">facebook.com/<?=$program->getFacebook() ?></a></span><? } ?>
				</div>

				<div class="clear"></div>
			</div>
<?php		endif ?>
<?php	endforeach ?>
		</div>

<?php endif // & if programs ?>

	</div>
</div>
