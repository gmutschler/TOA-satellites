<?php
    $colorhash = '#'.$color;
?>
            <li><a class="big_link" href="<?=$big_link?>">
                    <span class="photo">
                        <span class="bg-color" style='background:<?php if ($color) { echo $color;} else {echo "#DC142A";} ?>'></span>
                        <?php if($image): ?>
                        <img src='<?=$image?>' />
                        <?php endif ?>
						<span class="time"><?=$start_hour?></span>
					</span>

					<span class="data">
						<span class="title"><?=$title?></span>
						<span class="hosted">Hosted by <b onclick="window.location.href ='<?=$org_link?>'; return false"><?=$org_name?></b></span>
						<span class="desc"><?=truncate_text($desc, 175)?></span>
						<span class="address"><?=$ven_name?><br /><?=$ven_addr?><br /><?=$ven_post?> <?=$ven_city?></span>
						<span class="time"><?=$start_hour?> - <?=$end_hour?></span>
					</span>

					<span class="clear"></span>
			</a></li>
