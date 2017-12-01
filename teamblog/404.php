<?php get_header(); ?>
		<div class="entry">
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<h2 class="entry-title"><?php _e( 'Turnover!', 'crownstar' ); ?></h2>

				<p><?php _e( 'It looks like the page you are looking for has moved or the link you where given was incorrect. Please feel free to use the search box below to find what you are looking for:' , 'crownstar' ) ?></p>
				<p><?php get_search_form(); ?></p>

				<p class="postmeta"></p>
			</div>
		</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
