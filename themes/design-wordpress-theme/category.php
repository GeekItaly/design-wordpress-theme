<?php

get_header();

?>

<?php

echo '<h1>'.single_cat_title("", false).'</h1>';

?>

<?php

$entries = array();

$args = array(
    'posts_per_page' => -1,
    'post_type' => 'post',
    'category_name' => get_queried_object()->category_nicename
);

$the_query = new WP_Query( $args );

if($the_query->have_posts()){
	while($the_query->have_posts()){
		$the_query->the_post();
		
		
		
		$entries[get_the_ID()] = array(
			'title' => get_the_title(),
			'url' => get_the_permalink(),
			'img' => has_post_thumbnail() ? wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ) : array('0' => get_stylesheet_directory_uri().'/assets/img/no-image.png'),
			'date' => get_the_date(),
			'authorName' => get_the_author_meta('display_name'),
			'excerpt' => has_excerpt() ? get_the_excerpt() : limit_chars_entire_words(get_the_content(), 260).'...',
		);
		
		
		
		
	}
}

wp_reset_postdata();

?>

<?php
//echo '<pre>', print_r( $entries ), '</pre>';
//unset($entries[get_the_ID()]);
?>

<div class="grid">
	
	<ul>
	
	<!-- 
	<?php
		foreach($entries as $key => $val){
	?>
		 --><li><div>
			
			<div><?php echo $entries[$key]['title']; ?></div>
			<div><?php echo $entries[$key]['url']; ?></div>
			<div><?php echo $entries[$key]['img'][0]; ?></div>
			<div><?php echo $entries[$key]['date']; ?></div>
			<div><?php echo $entries[$key]['authorName']; ?></div>
			<div><?php echo $entries[$key]['excerpt']; ?></div>
			
		</div></li><!-- 
	<?php } ?>
	 -->
	
	</ul>
	
</div>



<?php

get_footer();

?>