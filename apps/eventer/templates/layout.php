<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"><head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
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

		<div id="logo">
			<h1><a href="/">TOA Berlin</a></h1>
		</div>
	</div>

<?php if($sf_user->hasFlash('info') or $sf_user->hasFlash('notice') or $sf_user->hasFlash('error')): ?>
	<div id="flashMessage">
		<h2><?php print $sf_user->getFlash('info') . $sf_user->getFlash('notice') . $sf_user->getFlash('error') ?></h2>
	</div>
<?php endif ?>

<?php echo $sf_content ?>
 </div>
</body></html>
