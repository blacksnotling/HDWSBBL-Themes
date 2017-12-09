<?php get_header(); ?>
	<?php if (have_posts()) : ?>
		<?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); ?>

		<h2><?php printf( __( 'Entries discussing %s', 'crownstar' ), '&quot;' . $term->name . '&quot;' ); ?></h2>

		<?php while (have_posts()) : the_post(); ?>
			<div class="entry">
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h2 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
					<p class="postdate"><?php crownstar_posted_on() ?></p>

					<?php the_excerpt(); ?>

					<?php wp_link_pages( array( 'before' => '<div class="subnav">' . __( 'Pages:', 'crownstar' ), 'after' => '</div>' ) ); ?>

					<p class="postmeta"><?php crownstar_posted_in() ?> <?php edit_post_link( __( 'Edit', 'crownstar' ), ' <strong>[</strong> ', ' <strong>]</strong> '); ?> <?php crownstar_comments_link(); ?></p>
				</div>
			</div>


		<?php endwhile; else: ?>
					<p><?php _e('Sorry, no posts have been posted under this topic.', 'crownstar'); ?></p>
		<?php endif; ?>

<?php if (  $wp_query->max_num_pages > 1 ) : ?>
				<div id="nav-below" class="subnav">
					<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&laquo;</span> Older Entries', 'crownstar' ) ); ?></div>
					<div class="nav-next"><?php previous_posts_link( __( 'Newer Entries <span class="meta-nav">&raquo;</span>', 'crownstar' ) ); ?></div>
				</div><!-- #nav-below -->
<?php endif; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
