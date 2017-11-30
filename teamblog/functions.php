<?php
/** Tell WordPress to run crownstar_theme_setup() when the 'after_setup_theme' hook is run. */
add_action( 'after_setup_theme', 'crownstar_theme_setup' );

function crownstar_theme_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/twentysixteen
	 * If you're building a theme based on Twenty Sixteen, use a find and replace
	 * to change 'twentysixteen' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'oberwald' );
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
		'primary' => __( 'Primary Navigation', 'crownstar' ),
	) );

}

/**
 * Register widgetized areas,
 *
 * To override crownstar_widgets_init() in a child theme, remove the action hook and add your own
 * function tied to the init hook.
 *
 * @uses register_sidebar
 */
function crownstar_widgets_init() {
	register_sidebar(array(
		'name'=> __( 'sidebar-posts', 'crownstar' ),
		'id'=> 'sidebar-posts',
		'description' => __( 'Appears at the top of the sidebar area for all pages and posts.', 'crownstar' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	));
}

/** Register sidebars by running bblm_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'crownstar_widgets_init' );

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * To override this in a child theme, remove the filter and optionally add
 * your own function tied to the wp_page_menu_args filter hook.
 *
 */
function crownstar_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
};
add_filter( 'wp_page_menu_args', 'crownstar_page_menu_args' );

/**
 * Prints HTML with meta information for the current post—date/time and author.
 *
 * @since 1.0
 */
function teamtheme_posted_on() {
	printf( __( '<span class="%1$s">Posted on</span> %2$s <span class="meta-sep">by</span> %3$s', 'crownstar' ),
		'meta-prep meta-prep-author',
		sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
			get_permalink(),
			esc_attr( get_the_time() ),
			get_the_date()
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
			get_author_posts_url( get_the_author_meta( 'ID' ) ),
			sprintf( esc_attr__( 'View all posts by %s', 'crownstar' ), get_the_author() ),
			get_the_author()
		)
	);
}
/**
 * Prints HTML with meta information for the current post (category, tags and permalink).
 *
 * @since 1.0
 */
function teamtheme_posted_in() {
	// Retrieves tag list of current post, separated by commas.
	$tag_list = get_the_tag_list( '', ', ' );
	if ( $tag_list ) {
		$posted_in = __( 'This entry was posted in %1$s and tagged %2$s. ', 'crownstar' );
	} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
		$posted_in = __( 'This entry was posted in %1$s.', 'crownstar' );
	} else {
		$posted_in = __( '', 'crownstar' );
	}
	// Prints the string, replacing the placeholders.
	printf(
		$posted_in,
		get_the_category_list( ', ' ),
		$tag_list,
		the_title_attribute( 'echo=0' )
	);
}

// Custom callback to list comments in the theme style
// based off http://themeshaper.com/wordpress-theme-comments-template-tutorial/
function custom_comments($comment, $args, $depth) {
  $GLOBALS['comment'] = $comment;
        $GLOBALS['comment_depth'] = $depth;
  ?>
        <li id="comment-<?php comment_ID() ?>" <?php comment_class() ?>>
                <div class="comment-author vcard"><?php commenter_link() ?></div>
                <div class="comment-meta"><?php printf(__('Posted %1$s at %2$s <span class="meta-sep">|</span> <a href="%3$s" title="Permalink to this comment">Permalink</a>', 'crownstar'),
                                        get_comment_date(),
                                        get_comment_time(),
                                        '#comment-' . get_comment_ID() );
                                        edit_comment_link(__('Edit', 'crownstar'), ' <span class="meta-sep">|</span> <span class="edit-link">', '</span>'); ?></div>

	       		<div class="comment-content">
	                	<?php comment_text() ?>
	                </div>

                <?php // echo the comment reply link
                        if($args['type'] == 'all' || get_comment_type() == 'comment') :
                                comment_reply_link(array_merge($args, array(
                                        'reply_text' => __('Reply','crownstar'),
                                        'login_text' => __('Log in to reply.','crownstar'),
                                        'depth' => $depth,
                                        'before' => '<div class="comment-reply-link">',
                                        'after' => '</div>'
                                )));
                        endif;
?>

  				<?php if ($comment->comment_approved == '0') _e("\t\t\t\t\t<span class='info'>Your comment is awaiting moderation.</span>\n", 'crownstar') ?>



<?php } // end custom_comments

// Produces an avatar image with the hCard-compliant photo class
// http://themeshaper.com/wordpress-theme-comments-template-tutorial/
function commenter_link() {
        $commenter = get_comment_author_link();
        if ( ereg( '<a[^>]* class=[^>]+>', $commenter ) ) {
                $commenter = ereg_replace( '(<a[^>]* class=[\'"]?)', '\\1url ' , $commenter );
        } else {
                $commenter = ereg_replace( '(<a )/', '\\1class="url "' , $commenter );
        }
        $avatar_email = get_comment_author_email();
        $avatar = str_replace( "class='avatar", "class='photo avatar", get_avatar( $avatar_email, 38 ) );
        echo $avatar . ' <span class="fn n">' . $commenter . '</span>';
} // end commenter_link


?>
