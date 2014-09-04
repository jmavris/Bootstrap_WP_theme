<?php

// Register Custom Navigation Walker
require_once('wp_bootstrap_navwalker.php');

//add CSS file paths
function theme_styles(){
	wp_enqueue_style( 'bootstrap_css', get_template_directory_uri() . '/css/bootstrap.min.css');
	wp_enqueue_style( 'main_css', get_template_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'theme_styles');


//add external Javascript scripts

function theme_js() {
	
	global $wp_scripts;
	
	wp_register_script('html5_shiv', 'https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js', '', '', false);
	wp_register_script('respond_js', 'https://oss.maxcdn.com/respond/1.4.2/respond.min.js', '', '', false);

	$wp_scripts->add_data('html5_shiv', 'conditional', 'lt IE 9');
	$wp_scripts->add_data('respond_js', 'conditional', 'lt IE 9');
	
	wp_enqueue_script('bootstrap_js', get_template_directory_uri() . '/js/bootstrap.min.js', array ('jquery'), '', true );
	wp_enqueue_script('theme_js', get_template_directory_uri() . '/js/theme.js', array ('jquery', 'bootstrap_js'), '', true );
}
 add_action('wp_enqueue_scripts', 'theme_js');

//turn off admin bar
//add_filter('show_admin_bar', '__return_false');

 add_theme_support('menus');
 add_theme_support('post-thumbnails');
 
 //enables shortcode in sidebar
 add_filter ('widget_text', 'do_shortcode'); 
 
 //create menu
 function register_theme_menus() {
 	register_nav_menus (
		array(
			'header-menu' => __( 'Header Menu' ),
		)
	);
}
 add_action('init', 'register_theme_menus');
 
 //create widget functionality for sidebar
 
 function create_widget( $name, $id, $description ) {

	register_sidebar(array(
		'name' => __( $name ),	 
		'id' => $id, 
		'description' => __( $description ),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));

}

//custom widgets
create_widget( 'Front Page Left', 'front-left', 'Displays on the left of the homepage' );
create_widget( 'Front Page Center', 'front-center', 'Displays in the center of the homepage' );
create_widget( 'Front Page Right', 'front-right', 'Displays on the right of the homepage' );
create_widget( 'Page Sidebar', 'page', 'Displays in the sidebar' );
create_widget( 'Blog Sidebar', 'blog', 'Displays in the blog sidebar' );

?>