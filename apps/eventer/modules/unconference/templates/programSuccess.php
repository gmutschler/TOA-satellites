<div id="hero">

	<div id="hero_background">hero background</div>
	<div id="hero_foreground">
		<h1>hero foreground</h1>
	</div>
</div>

<div id="content" class="screen_unconference_program">

<?php include_partial('submenu') ?>

	<div class="textual">

		<h1>The Unconference (kater holzig - 9:00 to 18:00)</h1>

<?php if($programs and count($programs)): ?>
		<div class="program_wrapper">

			<ul class="program_rooms">

				<li class="first">The terrace</li>
				<li>The dock</li>
				<li>Heinz</li>
				<li>blah blah?</li>
			</ul>

			<div class="clear"></div>

			<div class="program_inside">
<?php	foreach($programs as $program): ?>

				<div class="program_item room_<?=$program->getRoomEscaped()?>" style="top: <?=$program->getPixelPositionTop()?>px; height: <?=$program->getPixelHeight()?>px">

					<h2><?=$program->getTitle()?> | <span><?=$program->getKind()?></span></h2>

					<a class="toggle_button">show more</a>
				</div>

<?php	endforeach // & programs loop ?>
			</div>
		</div>
<?php endif // & if programs ?>

	</div>
</div>
