<h3><?=$title?></h3>
<ul>
<?php foreach($people as $person): ?>
	<li>
		<span class="speaker-avatar-container">
			<?php if($person->getFace()) { ?><img src="/images/content/speakers-cms/<?=$person->getFace()?>" alt="<?=$person->getFirstName()?> <?=$person->getLastName()?>" /><? } ?>
		</span>
		<span class="speaker-infos-container">
            <span class="speaker-name"><?=$person->getFirstName()?> <?=$person->getLastName()?></span>
			<?php if($person->getCompany()) { ?> <span class="speaker-company"><?=$person->getCompany()?></span><? } ?>
			<?php if($person->getCompany() & $person->getCompanyPosition()) { ?><span class="speaker-company">&#124;</span><? } ?>
			<?php if($person->getCompanyPosition()) { ?> <span class="speaker-position"><?=$person->getCompanyPosition()?></span><? } ?>
		</span>
	</li>
<?php endforeach ?>
</ul>
