			<li><a class="big_link" href="<?=$big_link?>">
					<span class="photo" style="background-image: url('<?=$image?>')">
						<span><?=$start_hour?></span>
					</span>

					<span class="data">
						<span class="title"><?=$title?></span>
						<span class="hosted">Hosted by <b onclick="window.location.href = '<?=$org_link?>'; return false"><?=$org_name?></b></span>
						<span class="desc"><?=truncate_text($desc, 175)?></span>
						<span class="address"><?=$ven_name?><br /><?=$ven_addr?><br /><?=$ven_post?> <?=$ven_city?></span>
						<span class="time"><?=$start_hour?> - <?=$end_hour?></span>
					</span>

					<span class="clear"></span>
			</a></li>
