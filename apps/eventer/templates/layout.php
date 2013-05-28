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
			<p>Logged in with <?=$sf_user->getMelody('eventbrite')->getToken()->getTokenKey()?>! <?=link_to('Logout', 'sf_guard_signout') ?></p>
<?php endif ?>
		</div>

		<a id="logo" title="Tech Open Air Berlin 2013" href="/"></a>
	</div>

<?php if($sf_user->hasFlash('info') or $sf_user->hasFlash('notice') or $sf_user->hasFlash('error')): ?>
	<div id="flashMessage">
		<h2><?php print $sf_user->getFlash('info') . $sf_user->getFlash('notice') . $sf_user->getFlash('error') ?></h2>
	</div>
<?php endif ?>

<?php echo $sf_content ?>

 </div>

 <div id="footer">
	
	<div id="footer_menu">
		<p>TODO: footer menu styling</p>
	</div>

	<h1>Content of the<br />footer still to define</h1>
 </div>
</body></html>
