<?php

get_header();

?>

<?php while(have_posts()): the_post(); ?>
	
	<?php
		global $post;
		
		if( is_front_page() ){
			get_template_part( 'template-parts/home/home-stuff' );
		}else{
			if( $post->post_name === 'pagina1' ){
				//echo('pagina1...');
				//get_template_part( 'pagina1' );
			}
			else if( $post->post_name === 'pagina2' ){
				//echo('pagina2...');
				//get_template_part( 'pagina2' );
			}
		}
	?>
	
<?php endwhile; ?>

<?php get_footer();
