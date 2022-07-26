<?php
/**
 * UnderStrap functions and definitions
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// UnderStrap's includes directory.
$understrap_inc_dir = 'inc';

// Array of files to include.
$understrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker. Trying to get deeper navigation? Check out: https://github.com/understrap/understrap/issues/567.
	'/editor.php',                          // Load Editor functions.
	'/block-editor.php',                    // Load Block Editor functions.
	'/acf.php',                    // Load ACF stuff.	
	'/deprecated.php',                      // Load deprecated functions.
);

// Load WooCommerce functions if WooCommerce is activated.
if ( class_exists( 'WooCommerce' ) ) {
	$understrap_includes[] = '/woocommerce.php';
}

// Load Jetpack compatibility file if Jetpack is activiated.
if ( class_exists( 'Jetpack' ) ) {
	$understrap_includes[] = '/jetpack.php';
}

// Include files.
foreach ( $understrap_includes as $file ) {
	require_once get_theme_file_path( $understrap_inc_dir . $file );
}


function divh_home_posts($category){
	$args = array(
		'category_name' => $category,
		'posts_per_page' => '3'
	);
	$the_query = new WP_Query( $args );
	$clean_cat = sanitize_title($category);
// The Loop
	if ( $the_query->have_posts() ) :
	echo "<div class='row home-row {$clean_cat}-row'><h2 id='{$clean_cat}'>{$category}</h2>";
	while ( $the_query->have_posts() ) : $the_query->the_post();
	  // Do Stuff
		global $post;
		$post_id = $post->ID;
		$title = get_the_title();	
		$link = get_the_permalink();
		$excerpt = get_the_excerpt();
		$featured = divh_featured_img($post_id, $title);
		echo "<div class='col-md-4'><div class='home-box'>{$featured}<a href='{$link}'><h3>{$title}</h3></a>{$excerpt}</div></div>";
	endwhile;
	$cat_link = site_url() . "/category/{$category}/";
	echo "<div class='col-md-4 offset-md-4'><a href='$cat_link' class='home-button'>See all {$category}</a></div>";
	echo "</div>";
	endif;

	// Reset Post Data
	wp_reset_postdata();
}

function divh_featured_img($post_id, $title){
	if(has_post_thumbnail()){
		return get_the_post_thumbnail($post_id,'large');
	} else {
		$path = get_template_directory_uri();
		return "<img src='{$path}/imgs/default.png' alt='Featured image for {$title}.'>";
	}
}


function dh_custom_excerpt_length( $length ) {
	return 15;
}
add_filter( 'excerpt_length', 'dh_custom_excerpt_length', 999 );