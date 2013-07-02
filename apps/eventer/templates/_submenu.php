<?php /*
	Hero Submenu partial

	We should pass here:
	- submenu title
	- submenu items

	LATER: think of non-internal links; maybe check if they're prefixed with http(s)?:// ?
	LATER: check if local route works if we got more filtering
*/

// Some pre-defined vars
$local_route = $sf_context->getRouting()->getCurrentInternalUri();

?>
<?php if(isset($submenu_title) and isset($links)): ?>
	<div id="hero_submenu">
        <div id="submenu-bg"></div>
        <div id="submenu-content">
            <h3 id="sect"><?=$submenu_title?></h3>
    <?php	if(isset($links) and count($links)): ?>
            <ul>
    <?php		foreach($links as $link_title => $link_route): ?>

    <?php			// highlighted logic hack	** HARDCODED
		    		$highlighted = false;
				if(($link_route == $local_route) or ($link_route == 'satellites/book' and preg_match('/^satellites\/event/', $local_route)))
					$highlighted = true;
    ?>

                <li><a href="<?=url_for($link_route)?>"<?php if($highlighted) { ?> class="selected"<?php } ?>><?=$link_title?></a></li>
    <?php		endforeach ?>
            </ul>
    <?php 	endif ?>
        </div>
    </div>
<?php endif ?>
