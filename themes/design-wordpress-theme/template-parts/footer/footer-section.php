<?php if(has_nav_menu('menu-footer-social-left')): ?>
	<nav class="menu-footer-social-left">
		<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-footer-social-left'
			) );
		?>
	</nav>
<?php endif; ?>

<div class="site-info">
	<p class="credits">credits...</p>
</div>
