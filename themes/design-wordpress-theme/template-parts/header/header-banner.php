<header>
	
	<div>
		<div class="logo"><?php the_custom_logo(); ?></div>
		
		<?php $description = get_bloginfo( 'description', 'display' ); if($description): ?>
			<p class="description"><?php echo $description; ?></p>
		<?php endif; ?>
	</div>
	
	<?php if(has_nav_menu('menu-left')): ?>
		<?php get_template_part('template-parts/navigation/navigation', 'menu-left'); ?>
	<?php endif; ?>
	
	<?php if(has_nav_menu('menu-left-social')): ?>
		<?php get_template_part('template-parts/navigation/navigation', 'menu-left-social'); ?>
	<?php endif; ?>
	
</header>