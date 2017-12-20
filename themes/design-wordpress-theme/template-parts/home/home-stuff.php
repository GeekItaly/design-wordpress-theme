<div>

<?php

$entries = array();

$args = array(
    'posts_per_page' => -1,
    'post_type' => 'post',
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

$first_entries = array_slice($entries,-0,4,true);

foreach($first_entries as $key => $val){ ?>
				
		<div class="item">
			<img src="<?php echo $first_entries[$key]['img'][0]; ?>">			
			<h4><a href="<?php echo $first_entries[$key]['url']; ?>"><?php echo $first_entries[$key]['title']; ?></a></h4>
		</div>
			
<?php } ?>

</div>







<div class="grid">
	
	<h5>latest posts:</h5>
	
	<ul>
	
	<!-- 
	<?php
		$last_entries = array_slice($entries,4,count($entries),true);
		foreach($last_entries as $key => $val){
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