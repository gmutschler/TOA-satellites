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

<?php // TODO: use component here! ?>
<?php echo Eventbrite::loginWidget(array(

	'app_key'	=> sfConfig::get('app_oauth_key'),
	'client_secret'	=> sfConfig::get('app_oauth_secret')
)) ?>
			<a href="<?=url_for('oauth/index')?>">sfUser not authenticated</a>
<?php endif?>
		</div>

		<div id="logo">
			<h1><a href="/">TOA Berlin</a></h1>
		</div>
	</div>

<?php echo $sf_content ?>
 </div>
</body></html>
