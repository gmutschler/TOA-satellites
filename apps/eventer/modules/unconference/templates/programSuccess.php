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
					<li>Hütte</li>
					<li>The Terrace</li>
				</ul>

				<div class="clear"></div>

				<div class="program_inside">
<?php	foreach($programs as $program): ?>

					<div class="program_item room_<?=$program->getRoomEscaped()?>" style="top: <?=$program->getPixelPositionTop()?>px; height: <?=$program->getPixelHeight()?>px">
						<div class="program_padder">

							<h2><?=$program->getTitle()?> | <span><?=$program->getKind()?></span></h2>

							<div class="program_more" style="display: none;">

								<?=$program->getDescription()?>

								<?php // TODO: speakers and moderators as ul/li structure partials? ?>
							</div>

							<a class="toggle_button">show more</a>
						</div>
					</div>

<?php	endforeach // & programs loop ?>
					<div class="program_lunch">

						<h1>Lunch</h1>
					</div>

				</div>
			</div>
		</div>
<?php endif // & if programs ?>

	</div>
</div>
