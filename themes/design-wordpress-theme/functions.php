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
	
	if( !is_object($post) ){
		// not found
	}
	else if( is_front_page() ){
		
	}
	else if( is_single() ){
		
	}
	
	wp_enqueue_style( 'font-family', 'https://fonts.googleapis.com/css?family=Titillium+Web:400,400italic,700', false, false );
	wp_enqueue_style( 'design_wordpress_theme-style', get_theme_file_uri( '/build/build.css' ), array(), false );
	wp_enqueue_script( 'modernizr.js', get_theme_file_uri( '/build/vendor/modernizr.js' ), array(), false, false );
	wp_enqueue_script( 'respond.min.js', get_theme_file_uri( '/build/vendor/respond.min.js' ), array(), false, true );
    wp_script_add_data( 'respond.min.js', 'conditional', 'IE 8' );
    wp_enqueue_script( 'rem.min.js', get_theme_file_uri( '/build/vendor/rem.min.js' ), array(), false, true );
    wp_script_add_data( 'rem.min.js', 'conditional', 'IE 8' );
    wp_enqueue_script( 'selectivizr.js', get_theme_file_uri( '/build/vendor/selectivizr.js' ), array(), false, true );
    wp_script_add_data( 'selectivizr.js', 'conditional', 'IE 8' );
    wp_enqueue_script( 'slice.js', get_theme_file_uri( '/build/vendor/slice.js' ), array(), false, true );
    wp_script_add_data( 'slice.js', 'conditional', 'IE 8' );
    wp_enqueue_script( 'polyfill.min.js', get_theme_file_uri( '/build/vendor/polyfill.min.js' ), array(), false, true );
    wp_script_add_data( 'polyfill.min.js', 'conditional', 'lt IE 9' );
	wp_enqueue_script( 'public_path', get_theme_file_uri( '/assets/js/public_path.js' ), array(), false, true );
	wp_enqueue_script( 'IWT.min.js', get_theme_file_uri( '/build/IWT.min.js' ), array('jquery'), false, true );
	
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










abstract class WPOrg_Meta_Box
{
    public static function add()
    {
        $screens = ['post', 'page'];
        foreach ($screens as $screen) {
            add_meta_box(
                'wporg_box_id',          // Unique ID
                'Custom Meta Box Title', // Box title
                [self::class, 'html'],   // Content callback, must be of type callable
                $screen,                  // Post type
                'advanced'
            );
        }
    }
    
    public static function remove_meta_box()
    {
        $screens = ['post', 'page'];
        foreach ($screens as $screen) {
            remove_meta_box('wporg_box_id', $screen, 'advanced'); 
        }
    }
 
    public static function save($post_id)
    {
        if (array_key_exists('wporg_field', $_POST)) {
            update_post_meta(
                $post_id,
                '_wporg_meta_key',
                $_POST['wporg_field']
            );
        }
    }
 
    public static function html($post)
    {
        $value = get_post_meta($post->ID, '_wporg_meta_key', true);
        
        if($value === ''){
	        delete_post_meta($post->ID, '_wporg_meta_key');
        }
        
        ?>
        <label for="wporg_field">Description for this field</label>
        <select name="wporg_field" id="wporg_field" class="postbox">
            <option value="">-</option>
            <option value="something" <?php selected($value, 'something'); ?>>Something</option>
            <option value="else" <?php selected($value, 'else'); ?>>Else</option>
        </select>
        <?php
	    get_template_part('_sortable');
    }
}
 
add_action('add_meta_boxes', ['WPOrg_Meta_Box', 'add']);
//add_action('do_meta_boxes', ['WPOrg_Meta_Box', 'remove_meta_box']);
add_action('save_post', ['WPOrg_Meta_Box', 'save']);





