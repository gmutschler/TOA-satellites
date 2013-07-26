<h3><?=$title?></h3>
<ul>
<?php foreach($people as $person): ?>
	<li><img src="/images/content/speakers-cms/<?=$person->getFace()?>" alt="<?=$person->getFirstName()?> <?=$person->getLastName()?>" /><?=$person->getFirstName()?> <?=$person->getLastName()?></li>
<?php endforeach ?>
</ul>
