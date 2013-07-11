<!DOCTYPE html>
<html lang="en"><head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico?v=2" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>

<?php // load our fonts in forced manner (for now) ?>
    <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
</head><body>

 <div id="main">
	<div id="header">

		<div id="loginbox" style="-webkit-transform: translate3d(0px, 0px, 0px)">
        <div id="login-bg"></div>

<?php if(!$sf_user->isAuthenticated()): ?>

			<p><strong><a href="<?=url_for('home/login')?>">Log in with Eventbrite</a></strong></p>
<?php else: ?>

			<p><?=link_to('Hi, '.$sf_user->getGuardUser()->getFirstName(), 'user/index')?> | <?=link_to('Logout', 'sf_guard_signout') ?></p>
<?php endif ?>
		</div>

		<a id="logo" title="Tech Open Air Berlin 2013" href="<?=$sf_request->getUriPrefix().$sf_request->getRelativeUrlRoot().$sf_request->getPathInfoPrefix()?>"></a>
        <div id="header_menu" style="-webkit-transform: translate3d(0px, 0px, 0px)">
            <div class="menu-container">
                <a id="bottom-logo" title="Tech Open Air Berlin 2013" href="<?=$sf_request->getUriPrefix().$sf_request->getRelativeUrlRoot().$sf_request->getPathInfoPrefix()?>"></a>
    
                <ul>
                    <li><a href="<?=$sf_request->getUriPrefix().$sf_request->getRelativeUrlRoot().$sf_request->getPathInfoPrefix()?>"<?php if($sf_context->getModuleName() == 'home') { ?> class="selected"<?php } ?>>Home</a></li>
                    <li><a href="<?=url_for('unconference/index')?>"<?php if($sf_context->getModuleName() == 'unconference') { ?> class="selected"<?php } ?>>The Unconference</a></li>
                    <li><a href="<?=url_for('satellites/index')?>"<?php if($sf_context->getModuleName() == 'satellites') { ?> class="selected"<?php } ?>>The Satellites</a></li>
                    <li><a href="http://blog.toaberlin.com">News</a></li>
                    <li><a href="<?=url_for('partners/index')?>"<?php if($sf_context->getModuleName() == 'partners') { ?> class="selected"<?php } ?>>Supporters</a></li>
                    <li><a href="<?=url_for('about/index')?>"<?php if($sf_context->getModuleName() == 'about') { ?> class="selected"<?php } ?>>About us</a></li>
                    <li><a class="highlighted" href="http://toaberlin2013-TOAWebsite.eventbrite.com" target="_blank">Buy tickets</a></li>
                </ul>
        
            <div class="clear"></div>
            </div>
        </div>
        
	</div>

<?php if($sf_user->hasFlash('info') or $sf_user->hasFlash('notice') or $sf_user->hasFlash('error')): ?>
	<div id="flashMessage">
        <?php 
            echo '<div class="flashMessage_container';
            if ( $sf_user->getFlash('error') ) {
                echo ' error';
            } elseif ( $sf_user->getFlash('notice') ) {
                echo ' notice';
            } elseif ( $sf_user->getFlash('info') ) {
                echo ' info';
            }
            echo '">';
        ?>
		  <?php print $sf_user->getFlash('info') . $sf_user->getFlash('notice') . $sf_user->getFlash('error') ?>
        </div>
	</div>
<?php endif ?>

<?php echo $sf_content ?>

 </div>

 <div id="footer">
    <div id="footer-sitemap">
        <div class="footer-column">
            <h4>The Festival</h4>
            <ul>
                <li><a href="<?=$sf_request->getUriPrefix().$sf_request->getRelativeUrlRoot().$sf_request->getPathInfoPrefix()?>">Home</a></li>
                <li><a href="<?=url_for('unconference/index')?>">The Unconference</a></li>
                <li><a href="<?=url_for('satellites/index')?>">The Satellite Events</a></li>
                <li><a href="http://toaberlin2013.eventbrite.com/" target="_blank">Buy your ticket</a></li>
            </ul>
        </div>
        <div class="footer-column">
            <h4>Tech Open Air</h4>
            <ul>
                <li><a href="<?=url_for('about/index')?>">About Us</a></li>
                <!--<li><a href="<?=url_for('about/team')?>">The Team</a></li>-->
                <li><a href="<?=url_for('about/contact')?>">Contact</a></li>
                <li><a href="<?=url_for('home/colophon')?>">Colophon</a></li>
                <li><a href="<?=url_for('home/privacy')?>">Terms & Condition</a></li>
                <li><a href="<?=url_for('home/privacy#privacy-policy')?>">Privacy Policy</a></li>
            </ul>
        </div>
        <div class="footer-column">
            <h4>For the Pros</h4>
            <ul>
                <li><a href="<?=url_for('about/press')?>">Press</a></li>
                <li><a href="<?=url_for('partners/supportus')?>">Become a supporter</a></li>
                <li>Developer API (to come)</li>
            </ul>
        </div>
        <div class="footer-column">
            <h4>Follow us</h4>
            <ul>
                <li><a href="http://blog.toaberlin.com">Blog</a></li>
                <li><a href="http://www.facebook.com/TechOpenAir">Facebook</a></li>
                <li><a href="http://twitter.com/TOABerlin/">Twitter</a></li>
                <li><a href="http://vimeo.com/channels/toaberlin">Vimeo</a></li>
            </ul>
        </div>
        <div class="clear"></div>
        
		<form action="http://toaberlin.us5.list-manage.com/subscribe/post?u=d09d20f085f76107f0ba5e78e&amp;id=1271478ca6" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="nl-form single-field" novalidate="">
				<label for="mailing-list-email">Subscribe to our Newsletter</label>
		        <input id="mailing-list-email" class="email" name="EMAIL" type="email" placeholder="Enter your email"><button id="mailing-list-submit" class="signup-submit">→</button>
		</form>
		     
     </div>
     
 </div>
</body></html>