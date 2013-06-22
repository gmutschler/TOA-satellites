<?php // pagination computing

if(!isset($page)) $page = 0;
$page_next = $page + 1;
$page_prev = $page - 1;

// limit
if($page == 0) $page_prev = false;
if($page == intval(sfConfig::get('app_pagination_last_page'))) $page_next = false;

// categories
// ** pretty stupid logic as we may override unused stuff, but who cares anyway
$link_next = 'satellites/book?page=' . $page_next;
$link_prev = 'satellites/book?page=' . $page_prev;

if(isset($category) and $category !== null) {

	$link_next .= '&category=' . $category->getId();
	$link_prev .= '&category=' . $category->getId();
}

?>

<?php if(isset($type) and $type == 'upper'): ?>
<a href="<?=url_for('satellites/host')?>" class="button_black button_black_small fright" style="z-index: 10; margin-right: 1px;">&#43; Host your own</a>
<h1>Satellite Events</h1>
<?php endif ?>

<div class="listing_widget<?php if(isset($type) and !is_null($type)) print ' ' . $type ?>">

	<a class="listing_widget_next"<?php if($page_next === false) { ?> href="#" onclick="return false;"<?php } else { ?> href="<?=url_for($link_next)?>"<?php } ?>></a>
	<a class="listing_widget_prev"<?php if($page_prev === false) { ?> href="#" onclick="return false;"<?php } else { ?> href="<?=url_for($link_prev)?>"<?php } ?>></a>

	<div class="measure pos<?=isset($page) ? $page : 0?>"></div>
</div>
