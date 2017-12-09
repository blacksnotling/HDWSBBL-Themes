<?php
/** Tell WordPress to run vonlipwig_theme_setup() when the 'after_setup_theme' hook is run. */
add_action( 'after_setup_theme', 'vonlipwig_theme_setup' );

function vonlipwig_theme_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/twentysixteen
	 * If you're building a theme based on Twenty Sixteen, use a find and replace
	 * to change 'twentysixteen' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'vonlipwig' );
	// This theme styles the visual editor with editor-style.css to match the theme style.
	//add_editor_style();

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
		'primary' => __( 'Primary Navigation', 'vonlipwig' ),
	) );

}

/**
 * Register widgetized areas,
 *
 * To override vonlipwig_widgets_init() in a child theme, remove the action hook and add your own
 * function tied to the init hook.
 *
 * @uses register_sidebar
 */
function vonlipwig_widgets_init() {
	register_sidebar(array(
		'name'=> __( 'sidebar-posts', 'vonlipwig' ),
		'id'=> 'sidebar-posts',
		'description' => __( 'Appears at the top of the sidebar area for all pages and posts.', 'vonlipwig' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	));
}

/** Register sidebars by running bblm_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'vonlipwig_widgets_init' );

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * To override this in a child theme, remove the filter and optionally add
 * your own function tied to the wp_page_menu_args filter hook.
 *
 */
function vonlipwig_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
};
add_filter( 'wp_page_menu_args', 'vonlipwig_page_menu_args' );

/**
 * Returns a "Continue Reading" link for excerpts
 *
 * @return string "Continue Reading" link
 */
function vonlipwig_continue_reading_link() {
	return '<p class="readmorelink">Continue reading <a href="'. get_permalink() . '">'.get_the_title().' &raquo;</a></p>';
}

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and vonlipwig_continue_reading_link().
 *
 * To override this in a child theme, remove the filter and add your own
 * function tied to the excerpt_more filter hook.
 *
 * @return string An ellipsis
 */
function vonlipwig_auto_excerpt_more( $more ) {
	return ' &hellip;' . vonlipwig_continue_reading_link();
}
add_filter( 'excerpt_more', 'vonlipwig_auto_excerpt_more' );

/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 *
 * To override this link in a child theme, remove the filter and add your own
 * function tied to the get_the_excerpt filter hook.
 *
 * @return string Excerpt with a pretty "Continue Reading" link
 */
function vonlipwig_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= vonlipwig_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'vonlipwig_custom_excerpt_more' );

/**
 * Prints HTML with meta information for the current post date/time and author.
 *
 */
function vonlipwig_posted_on() {
	printf( __( 'Posted on %1$s', 'vonlipwig' ),
		sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
			get_permalink(),
			esc_attr( get_the_time() ),
			get_the_date()
		)
	);
}

/**
 * Prints HTML with meta information for the current post (category, tags and permalink).
 *
 */
function vonlipwig_posted_in() {
global $post;
	// Retrieves tag list of current post, separated by commas.
	$tag_list = get_the_tag_list( '', ', ' );

	if ( $tag_list ) {
		$posted_in = __( 'This entry was posted in %1$s and tagged %2$s. &lt;<a href="%3$s" title="Permalink to %4$s" rel="bookmark">Permalink</a>&gt;.', 'vonlipwig' );
	} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
		$posted_in = __( 'This entry was posted in %1$s. &lt;<a href="%3$s" title="Permalink to %4$s" rel="bookmark">Permalink</a>&gt;.', 'vonlipwig' );
	} else {
		$posted_in = __( '&lt;<a href="%3$s" title="Permalink to %4$s" rel="bookmark">Permalink</a>&gt;.', 'vonlipwig' );
	}
	// Prints the string, replacing the placeholders.
	printf(
		$posted_in,
		get_the_category_list( ', ' ),
		$tag_list,
		get_permalink(),
		the_title_attribute( 'echo=0' )
	);
}

/**
 * A simple wrapper function to display the number of comments.
 * A wrapper function is used so that if the text needs to be updated in the future I only hve to change it in one place.
 *
 */
function vonlipwig_comments_link() {
	comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;');
}

?>
