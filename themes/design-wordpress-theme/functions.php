<?php

function design_wordpress_theme_setup() {

	add_theme_support( 'title-tag' ); // adds and handles the <title> in the <head>
	add_theme_support( 'post-thumbnails'); // enables featured image feature
	add_theme_support( 'custom-logo', array(
		'flex-width' => true,
	) );
	
	register_nav_menus( array(
		'menu-left'               => 'Menu Left',
		'menu-left-social'        => 'Menu Left Social',
		'menu-footer-social-left' => 'Menu Footer Social Left',
	) );
}
add_action( 'after_setup_theme', 'design_wordpress_theme_setup' );



function design_wordpress_theme_scripts() {
	
	global $post;
	
	//wp_enqueue_style( 'font-family-Roboto', 'https://fonts.googleapis.com/css?family=Roboto', false, '1.0' );
	//wp_enqueue_style( 'font-awesome', get_theme_file_uri( '/assets/font-awesome/css/font-awesome.min.css' ), false, '4.7.0' );
	
	if( !is_object($post) ){
		// not found
	}
	else if( is_front_page() ){
		//wp_enqueue_style( 'owl.carousel.min.css', get_theme_file_uri( '/assets/css/owl.carousel.min.css' ), false, '2.2.1' );
		//wp_enqueue_style( 'owl.theme.default.min.css', get_theme_file_uri( '/assets/css/owl.theme.default.min.css' ), false, '2.2.1' );
		
		//wp_enqueue_script( 'owl.carousel.js', get_theme_file_uri( '/assets/js/owl.carousel.js' ), array('jquery'), '2.2.1', true );
		//wp_enqueue_script( 'owl.carousel.home.js', get_theme_file_uri( '/assets/js/owl.carousel.home.js' ), array('jquery'), '1.0', true );
	}
	else if( is_single() ){
		//wp_enqueue_script( 'comments.js', get_theme_file_uri( '/assets/js/comments.js' ), array('jquery'), '1.0', true );
	}
	
	wp_enqueue_style( 'design_wordpress_theme-style', get_stylesheet_uri(), false, WP_DEBUG ? time() : false );
	
	wp_enqueue_script( 'client.js', get_theme_file_uri( '/assets/js/client.js' ), array('jquery'), WP_DEBUG ? time() : '1.0', true );
	
}
add_action( 'wp_enqueue_scripts', 'design_wordpress_theme_scripts' );



function my_deregister_scripts_wpembed(){
	wp_deregister_script( 'wp-embed' );
}
add_action( 'wp_footer', 'my_deregister_scripts_wpembed' );



function limit_chars_entire_words($string, $limit){
	$string = substr($string, 0, $limit);
    $string = substr($string, 0, strripos($string, " "));
    $string = trim(preg_replace( '/\s+/', ' ', $string));
    return $string;
}




