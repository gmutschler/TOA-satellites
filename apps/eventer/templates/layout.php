<!DOCTYPE html>
<html lang="en"><head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>

<?php // load our fonts in forced manner (for now) ?>
    <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
</head><body>

 <div id="main">
	<div id="header">

		<div id="loginbox">

<?php if(!$sf_user->isAuthenticated()): ?>

			<p><a href="<?=url_for('home/login')?>">Log in with Eventbrite</a></p>
<?php else: ?>
			<p>Hello, <?=$sf_user->getGuardUser()->getEmailAddress()?>! <?=link_to('Logout', 'sf_guard_signout') ?></p>

<?php /* <p>Logged in with <?=$sf_user->getMelody('eventbrite')->getToken()->getTokenKey()?>! <?=link_to('Logout', 'sf_guard_signout') ?></p> */ ?>
<?php endif ?>
		</div>

		<a id="logo" title="Tech Open Air Berlin 2013" href="<?=$sf_request->getUriPrefix().$sf_request->getRelativeUrlRoot().$sf_request->getPathInfoPrefix()?>"></a>
	</div>

<?php if($sf_user->hasFlash('info') or $sf_user->hasFlash('notice') or $sf_user->hasFlash('error')): ?>
	<div id="flashMessage">
		<h2><?php print $sf_user->getFlash('info') . $sf_user->getFlash('notice') . $sf_user->getFlash('error') ?></h2>
	</div>
<?php endif ?>

<?php echo $sf_content ?>

 </div>

<?php // TODO: consider if not to grab footer_menu above footer_text in DOM structure for easier JavaScript fun ?>
 <div id="footer">
	
	<div id="footer_menu">

		<ul>
			<li><a href="<?=$sf_request->getUriPrefix().$sf_request->getRelativeUrlRoot().$sf_request->getPathInfoPrefix()?>"<?php if($sf_context->getModuleName() == 'home') { ?> class="selected"<?php } ?>>Home</a></li>
			<li><a href="<?=url_for('unconference/index')?>"<?php if($sf_context->getModuleName() == 'unconference') { ?> class="selected"<?php } ?>>The Unconference</a></li>
			<li><a href="<?=url_for('satellites/index')?>"<?php if($sf_context->getModuleName() == 'satellites') { ?> class="selected"<?php } ?>>The Satellites</a></li>
			<li><a href="<?=url_for('news/index')?>"<?php if($sf_context->getModuleName() == 'news') { ?> class="selected"<?php } ?>>News</a></li>
			<li><a href="<?=url_for('partners/index')?>"<?php if($sf_context->getModuleName() == 'partners') { ?> class="selected"<?php } ?>>Partners</a></li>
			<li><a href="<?=url_for('about/index')?>"<?php if($sf_context->getModuleName() == 'about') { ?> class="selected"<?php } ?>>About us</a></li>
			<li><a class="highlighted" href="#">Buy tickets</a></li>
		</ul>

		<div class="clear"></div>
	</div>

	<h1>Content of the<br />footer still to define</h1>
 </div>
</body></html>
