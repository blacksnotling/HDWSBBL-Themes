<?php
/** Tell WordPress to run everlong_theme_setup() when the 'after_setup_theme' hook is run. */
add_action( 'after_setup_theme', 'everlong_theme_setup' );

function everlong_theme_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/twentysixteen
	 * If you're building a theme based on Twenty Sixteen, use a find and replace
	 * to change 'twentysixteen' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'everlong' );
	// This theme styles the visual editor with editor-style.css to match the theme style.
	//add_editor_style();

	// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );
	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'everlong' ),
	) );
}

/**
 * Register widgetized areas,
 *
 * To override everlong_widgets_init() in a child theme, remove the action hook and add your own
 * function tied to the init hook.
 *
 * @uses register_sidebar
 */
function everlong_widgets_init() {
	register_sidebar(array(
		'name'=> __( 'sidebar-posts', 'everlong' ),
		'id'=> 'sidebar-posts',
		'description' => __( 'Appears at the top of the sidebar area when it is displayed.', 'everlong' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	));
	register_sidebar(array(
		'name'=> __( 'footer-main', 'everlong' ),
		'id'=> 'footer-main',
		'description' => __( 'Appears in the footer - the bigger area', 'everlong' ),
    'before_widget' => '<div id="%1$s" class="footer-main-dynamic %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  ));
  register_sidebar(array(
    'name'=> __( 'footer-sub', 'everlong' ),
    'id'=> 'footer-sub',
    'description' => __( 'Appears in the footer - the smaller area', 'everlong' ),
    'before_widget' => '<div id="%1$s" class="footer-sub-dynamic %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  ));
}

/** Register sidebars by running everlong_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'everlong_widgets_init' );

?>
